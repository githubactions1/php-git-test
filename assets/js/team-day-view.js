var Team_URL = {
    getEmployeeDetailsList: "web-api/api/team/attendance/summary/details",
	getEmployeeDailyStatusCount: "web-api/api/team/attendance/summary",
	getLatestLocAndTask: contextPathPrefix + "team/teamEmployee/getAllWorkOrders",
    getLineChartUrl: contextPathPrefix + "team/teamEmployee/getLineChartBaseUrl",
    getEmployeeInfo: contextPathPrefix + "getUserProfile",
    reasonmsg: "/web-api/api/task-status",
    availability: "web-api/api/employees/availability",
    getDiagnosticList: "/web-api/api/employees/diagnostics",
    exportTeamMembers: "/web-api/api/team/export"
};

var map,
    emp_marker_img = "images/theme-images/marker/employee_icon.png", empID, empUid, empMap = {};

var statusMap = {
    'Punched-In': 'Punched-In',
    'Not-Dispatched': 'Not-Dispatched',
    'Absent': 'Absent',
    'Punched-Out': 'Punched-Out',
    'On Leave': 'On Leave',
    "Holiday": "Holiday",
    "Weekly Off": "Weekly Off"
};

var leaveStatusMap = {
    true: 'text-green',
    false: 'text-danger',
    null: 'text-danger'
};
var leaveStatusTextMap = {
    true: 'Approved',
    false: 'Rejected',
    null: 'Approval Pending'
};

function load_map() {
    map = loadMap("teamMapView");
}

function getDataForLineChart() {
    var customerId = $('#customerId').val();

    $.ajax({
        url: Team_URL.getLineChartUrl + "?customerId=" + customerId,
        type: 'POST',
        data: {customerId: customerId},
        cache: false,
        dataType: 'json',
        success: function (data) {
            var baseUrl = data.baseUrl;
            console.log("BaseUrl::" + baseUrl);
            $('#task-frame').attr('src', baseUrl);

        },
        error: function (xhr, err) {
        }
    });
}

function PostRequestDate(fromdate) {
    var RequestDate = fromdate.toString();
    var GMT = RequestDate.search("GMT");
    var DateIso = new Date(fromdate.getTime() - fromdate.getTimezoneOffset() * 60000).toISOString();
    var resultDate = DateIso.substring(0, 23) + RequestDate.substring(GMT + 3, GMT + 6) + ":" + RequestDate.substring(GMT + 6, GMT + 9);
    return resultDate.trim();
}

function getDiagnosticData(event) {
    const data = $(event).attr('data');
    const parseData = JSON.parse(data);
    const shiftStartDate = moment();
    const shiftEndDate = moment();
    var isShiftAvailable = false;
    if (parseData.shiftStartTime !== undefined) {
        isShiftAvailable = true;
        var shiftStartTimeArray = parseData.shiftStartTime.split(':');
        var shiftEndTimeArray = parseData.shiftEndTime.split(':');

        shiftStartDate.set({
            hour: shiftStartTimeArray[0],
            minute: shiftStartTimeArray[1],
            second: shiftStartTimeArray[2]
        });

        shiftEndDate.set({
            hour: shiftEndTimeArray[0],
            minute: shiftEndTimeArray[1],
            second: shiftEndTimeArray[2]
        });
    }

    $("#diagnosticHistory-" + parseData.uid).hide();
    var requestData = {
        fromDate: isShiftAvailable ? PostRequestDate(new Date(shiftStartDate.format("YYYY-MM-DDTHH:mm:ss.SSSZ"))) : PostRequestDate(new Date(moment().format("YYYY-MM-DDT06:00:00.SSSZ"))),
        toDate: isShiftAvailable ? PostRequestDate(new Date(shiftEndDate.format("YYYY-MM-DDTHH:mm:ss.SSSZ"))) : PostRequestDate(new Date()),
        employeeUid: parseData.uid
    };


    var ajaxOptions = {
        url: Team_URL.getDiagnosticList,
        type: 'POST',
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        data: requestData,
        success: function (data) {
            var diagnosticData = data.result.deviceDiagnostics;
            getDiagonsticHistoryDropdownHtml(diagnosticData, parseData.uid);
        }
    };
    ajaxCall(ajaxOptions);
}

function getDiagonsticHistoryDropdownHtml(diagnosticData, uid) {
    var diagnosticHtml = "";
    if (diagnosticData.length === 0) {
        $("#diagnosticHistory-" + uid).html("<span class='align-content-center'>" + $.i18n.prop("jsp.no.result.found") + "</span>");
    } else {
        diagnosticData.map(function (diagnosticHistory) {
            var diagnosticRecord = diagnosticHistory.diagnostic;
            var deviceSettingsIconFunc = new getDeviceSettingsIcon();
            diagnosticHtml += "<div class='history-record-wrap'><div>" + diagnosticRecord.timestamp + "</div>" +
                getDeviceSettingsIcon('highAccuracy', diagnosticRecord['highAccuracy'], diagnosticRecord) +
                getDeviceSettingsIcon('batteryOptimize', diagnosticRecord['batteryOptimize'], diagnosticRecord) +
                getDeviceSettingsIcon('gpsStatus', diagnosticRecord['gpsStatus'], diagnosticRecord) +
                getDeviceSettingsIcon('network', diagnosticRecord['network'], diagnosticRecord) +
                deviceSettingsIconFunc.storagePermission(diagnosticRecord) + "</div>";
        });
        $("#diagnosticHistory-" + uid).html(diagnosticHtml);
    }
    $(".dropdown-after-active,.dropdown-after").hide();
    $("#dropdown-after-active-" + uid + ", #dropdown-after-" + uid).show();
    $("#diagnosticHistory-" + uid).show();
}

function mapLeftClickHandler() {

}

function mapRightClickHandler(latitude, longitude) {

}

function resizeMap() {
    map.resize();
}

function reloadTeamTableByEvent(event) {
    var value = event.value;
    var query = "event=" + value;
	loadDailyStatus(' ');
    load_team_day_view(query);
}

function load_team_day_view() {
    var userId = $("#userId").val(),
        event = $("#attendenceId").val() == "undefined" || $("#attendenceId").val() == undefined ? "" : $("#attendenceId").val();
    jQuery.fn.dataTableExt.oPagination.iFullNumbersShowPages = 3;

    var teamTable = $('#teamTable')
        .on('preXhr.dt', function (e, settings, data) {
            $("#empLoading").show();
        }).dataTable({
            "dom": '<<"custom-fields-table"> fit<lp>> ',
            "bServerSide": true,
            "sAjaxSource": Team_URL.getEmployeeDetailsList + "?event=" + event,
            "bProcessing": true,
            "bPaginate": true,
            "sServerMethod": "POST",
            "bDestroy": true,
            "sAjaxDataProp": "result.employeeAttendanceDTOS",
            "sPaginationType": "simple_numbers",
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": false,
            "sScrollY": '500px',
            "bDeferRender": true,
            "bScrollCollapse": true,
            "iDisplayStart": 0,
            "iDisplayLength": 10,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "sSortDir_0": 'ASC',
            "iSortCol_0": 0,
            "sSearch": "",
            "fnServerParams": function (aoData) {
                aoData.push({"name": "filter_name_1", "value": "locationGroup.uid"});
                aoData.push({
                    "name": "filter_value_1",
                    "value": jsTreeInstance ? jsTreeInstance.get_checked().join("|") : ''
                });
            },
            aoColumns: [
                {'mData': "firstName", 'sWidth': '33%', "bSortable": true},
                {'mData': "type", 'sWidth': '7%', "bSortable": true},
                {'mData': "event", 'sWidth': '10%', "bSortable": false},
                {'mData': "pendingTaskCount", 'sWidth': '20%', "bSortable": false},
                {'mData': "batteryState", 'sWidth': '15%', "visible": true, "bSortable": true},
                {'mData': "availibility", 'sWidth': '15%', "visible": true, "bSortable": false}
            ],
            "oLanguage": {
                "sSearch": "",
                "sLengthMenu": "_MENU_" + $.i18n.prop('lanug.text.recod'),
                "sEmptyTable": $.i18n.prop('no.result.found.err'),
                "sProcessing": "<div style='margin-top: 15px;'>" +
                    "<div class='load_img'><img src='images/sites_loading.gif'/></div>" +
                    "<span class='load_text'>" + $.i18n.prop('lanug.text.loading') + "</span>" +
                    "</div>"

            },
            "aoColumnDefs": [
                {
                    "mRender": function (data, type, row) {
                        var empObject = row;
                        empMap[empObject.employeeId] = empObject.employeeUid;
                        var name;
                        if (empObject.firstName.length > 30) {
                            name = empObject.firstName.substring(0, 35);
                        } else {
                            name = empObject.firstName;
                        }

                        var shiftHtml = "<div class='shift-color-class' title='Shift " + empObject.shiftName + "'>" + empObject.shiftName + "</div>";
                        var breakflag = "";
                        breakflag = empObject.employeeOnBreak ? "" : "dn";
                        var breakDuration = empObject.employeeOnBreak ? timeConvertToBreak(empObject.breakStartTimestamp) : 0;
                        name += empObject.lastName ? ' ' + empObject.lastName : '';
                        var textStr = shiftHtml + "<a onclick=\"getEmployeeProfile(" + empObject.employeeId + ")\" class=\"text-theme text-underline font-size-16 cursor-pointer word-break\" title='" + empObject.firstName + "' >" + name + "</a><span class='font-size-16'>&nbsp;(" + empObject.bpId + ")</span><span class='fa fa-coffee break-icon " + breakflag + "' title='Break Time : " + breakDuration + "'></span><br /><span class='font-size-16'>" + empObject.mobileNumber + "</span>";
                        var html = "<div>" + textStr + '</div>';
                        return html;
                    },
                    "aTargets": [0],

                },
                {

                    "mRender": function (data, type, row) {
                        var available = row.employeeAvailable;
                        var isAbsentDisabled = row.event == "Absent" ? 'disabled' : '';
                        if (available) {
                            var btnClass = 'btn-success';
                            var status = $.i18n.prop('jsp.availability');
                            var name = row.firstName;
                            html = "<div class='pull-left dropdown'><button class='btn btn-xs dropdown-toggle " + btnClass + "'  data-toggle='dropdown' type='button' id='" + row.employeeUid + "''>" + status + "</button>" +
                                "<div class='dropdown-menu'><option onclick='availableNotavailableFn(\"" + row.employeeUid + "\",\"" + name + "\",\"" + 2 + "\")'>" + $.i18n.prop('jsp.notavailability') + "</option>" +
                                "<option  "+isAbsentDisabled + " onclick='availableNotavailableFn(\"" + row.employeeUid + "\",\"" + name + "\",\"" + 3 + "\")'>" + $.i18n.prop('jsp.mark.absent') + "</option></div></div>";
                        } else if (!available) {
                            var btnClass = 'btn-danger';
                            var status = $.i18n.prop('jsp.notavailability');
                            var name = row.firstName;
                            html = "<div class='pull-left dropdown'><button class='btn btn-xs dropdown-toggle " + btnClass + "'  data-toggle='dropdown' type='button' id='" + row.employeeUid + "''>" + status + "</button>" +
                                "<div class='dropdown-menu'><option onclick='availableNotavailableFn(\"" + row.employeeUid + "\",\"" + name + "\",\"" + 1 + "\")'>" + $.i18n.prop('jsp.availability') + "</option>" +
                                "<option  "+isAbsentDisabled + " onclick='availableNotavailableFn(\"" + row.employeeUid + "\",\"" + name + "\",\"" + 3 + "\")'>" + $.i18n.prop('jsp.mark.absent') + "</option></div></div>";
                        }
                        var commentsAvailable = row.comments && row.comments.trim().length > 0 ? "<i class='fa fa-comments pull-left ml-md mt-xs' comment='" + row.comments + "'  onclick='showComment()'></i>" : "";
                        return html + commentsAvailable;
                    },
                    aTargets: [5]
                },
                {

                    "mRender": function (data, type, row) {
                        var html = '';
                        switch (row.employmentType) {
                            case 0:
                                html += "-";
                                break;
                            case 1:
                                html += $.i18n.prop("member.type.on_roll");
                                break;
                            case 2:
                                html += $.i18n.prop("member.type.Outsourced");
                                break;
                            case 3:
                                html += $.i18n.prop("member.type.Contract");
                                break;
                            default:
                                html += ""
                        }

                        return html;
                    },
                    aTargets: [1]
                },
                {

                    "mRender": function (data, type, row) {

                        var empObject = row;
                        var html = "";
                        if ((empObject.event !== undefined) && (empObject.event !== "")) {
                            if (empObject.event === "Punched-In") {
                                html = "<span class='" + (statusMap[empObject.event].toLowerCase().replace(" ", "-")) + "-text font-size-16'>" + statusMap[empObject.event] + "</span>" + "<span><br>" + punchIntimeConvert(empObject.punchedInTime) + "</span>";
                            } else if (empObject.event === "Punched-Out") {
                                html = "<span class='" + (statusMap[empObject.event].toLowerCase().replace(" ", "-")) + "-text font-size-16'>" + statusMap[empObject.event] + "</span>" + "<span><br>" + punchIntimeConvert(empObject.punchedOutTime) + "</span>";
                            } else {
                                html = "<span class='" + (statusMap[empObject.event].toLowerCase().replace(" ", "-")) + "-text font-size-16'>" + statusMap[empObject.event] + "</span>";
                            }
                            if (empObject.event === "Punched-In") {
                                if ((empObject.punchedInStatus !== undefined) && (empObject.punchedInStatus !== "")) {
                                    if (empObject.punchedInStatus === "Late") {
                                        var onTime = latetimeConvert(Math.abs(empObject.lateDuration), empObject.punchedInStatus);
                                        if (onTime === " (On Time) ") {
                                            html += "<br /><span class='late'>" + onTime + "</span>";
                                        } else {
                                            html += "<br /><span class='late'>" + empObject.punchedInStatus + "</span>" + "<span><br>" + onTime + "</span>";
                                        }
                                    }
                                    if (empObject.awayPunchedIn) {
                                        empObject.distanceFromPlace = parseFloat(empObject.distanceFromPlace).toFixed(2);
                                        var distance = empObject.distanceFromPlace + " " + $.i18n.prop("jsp.msg.meters.away");
                                        html += empObject.punchedInStatus === "Late" ? "<span>, </span>" : "</br>";
                                        html += "<span class='late' title='" + distance + "'>" + $.i18n.prop("jsp.msg.outside.base.address") + "</span>";
                                    }
                                }
                            }
                            if (empObject.event === "Punched-Out") {
                                if ((empObject.punchedOutStatus !== undefined) && (empObject.punchedOutStatus !== "")) {
                                    if (empObject.punchedOutStatus === "Early") {
                                        var onTime = earlyTimeConvert(Math.abs(empObject.earlyDuration));
                                        if (onTime === " (On Time) ") {
                                            html += "<br /><span class='early'>" + onTime + "</span>";
                                        } else {
                                            html += "<br /><div class='early-punch-out'><span class='early'>" + empObject.punchedOutStatus + "</span>" + " " + onTime + "</div>";
                                        }
                                    } else {
                                        html += "<br /><span class='early'>" + empObject.punchedOutStatus + "</span>";
                                    }
                                }
                            }
                        } else {
                            html = "-";
                        }
                        return html;
                    },
                    "aTargets": [2]
                },
                {
                    "mRender": function (data, type, row) {
                        var empObject = row;
                        var html = "";
                        if ((empObject.taskCompleteCount !== undefined) && (empObject.taskCompleteCount !== "")) {
                            html = "<span class='font-size-16'>" + $.i18n.prop('jsp.dashboard.maintenance.complete') + " - " + empObject.taskCompleteCount + "/" + empObject.taskAssignCount + "</span>";
                        } else {
                            html = "<span class='font-size-16'>" + $.i18n.prop('jsp.dashboard.maintenance.complete') + " - 0</span>";

                        }

                        if ((empObject.taskAssignCount !== undefined) && (empObject.taskAssignCount !== "")) {
                            html += "<br /><span class='font-size-16'>Assigned - " + empObject.taskAssignCount + "/" + empObject.minimumTask + "</span>";
                        } else {
                            html += "<br /><span class='font-size-16'>Assigned - 0</span>";
                        }

                        if ((empObject.pendingTaskCount !== undefined) && (empObject.pendingTaskCount !== "")) {
                            html += "<br /><span class='font-size-16'>" + $.i18n.prop('jsp.team.previous_date') + " - " + empObject.pendingTaskCount + "</span>";
                        } else {
                            html = "<span class='font-size-16'>" + $.i18n.prop('jsp.team.previous_date') + " - 0</span>";

                        }
                        return html;
                    },
                    "aTargets": [3]
                },
                {
                    "mRender": function (data, type, row) {
                        var stateOfBattery = row.batteryState;
                        if (!stateOfBattery) {
                            return "<span>-</span>";
                        }
                        var battery_state = "";

                        if (stateOfBattery <= 0) {
                            battery_state = "fa-battery-empty";
                        } else if (stateOfBattery <= 30 && stateOfBattery > 0) {
                            battery_state = "fa-battery-quarter text-danger";
                        } else if (stateOfBattery > 30 && stateOfBattery <= 50) {
                            battery_state = "fa-battery-half text-warning";
                        } else if (stateOfBattery > 50 && stateOfBattery < 90) {
                            battery_state = "fa-battery-three-quarters text-success";
                        } else if (stateOfBattery >= 90) {
                            battery_state = "fa-battery-full text-success";
                        }

                        var diagnosticTimeStamp = row.deviceDiagnostic ? row.deviceDiagnostic.timestamp : '';

                        var html = "<span class='font-size-14 diagnostic-history-after'> <span class='fa " + battery_state + "'> " + stateOfBattery + "%, </span><span> " + diagnosticTimeStamp + " </span>";

                        /**
                         * Below code is used to display Build version and device settings.
                         * @type {string}
                         */
                        var mobileSettingLocationHtml = "", mobileSettingBatteryHtml = "", buildVersionHtml = "",
                            mobileSettingHtml = "";
                        if (!row.hasOwnProperty("buildVersion") && !row.hasOwnProperty("isBatteryOptimisationOn") && !row.hasOwnProperty("isHighAccuracySettingOn")) {
                            return "<span>-</span>";
                        }
                        if (row.buildVersion && row.buildVersion !== "") {
                            buildVersionHtml = "<div>" + $.i18n.prop("team.app.status.build.version") + " - " + row.buildVersion + "</div>";
                        }
                        var deviceDiagnostic = row.deviceDiagnostic || {}, refreshBtnHtml = "";
                        if (Object.keys(deviceDiagnostic).length !== 0) {
                            const refreshData = {
                                uid: row.employeeUid,
                                shiftStartTime: row.shiftStartTime,
                                shiftEndTime: row.shiftEndTime
                            };
                            refreshBtnHtml = "<div class='dropdown diagnostic-history-dropdown-wraper' data-toggle='tooltip' data-placement='top' title='" + $.i18n.prop("title.view.diagnostic.history") + "'>" +
                                "<div class='dropdown-after-active dn' id='dropdown-after-active-" + row.employeeUid + "'></div>" +
                                "<div class='dropdown-after dn' id='dropdown-after-" + row.employeeUid + "'></div>" +
                                "<div class='diagnostic-history dropdown-toggle' data-toggle='dropdown' data='" + JSON.stringify(refreshData) + "' onclick='getDiagnosticData(this)'></div>" +
                                "<div class='dropdown-menu diagnostic-dropdown' id='diagnosticHistory-" + row.employeeUid + "'>" +
                                "</div>" +
                                "</div>";
                        }
                        var deviceSettingsIconFunc = new getDeviceSettingsIcon();
                        return html + "<div class='diagnostic-container'><div class='margin-top-05 pre-wrapped'>" +
                            getDeviceSettingsIcon('highAccuracy', deviceDiagnostic['highAccuracy'], deviceDiagnostic) +
                            getDeviceSettingsIcon('batteryOptimize', deviceDiagnostic['batteryOptimize'], deviceDiagnostic) +
                            getDeviceSettingsIcon('gpsStatus', deviceDiagnostic['gpsStatus'], deviceDiagnostic) +
                            getDeviceSettingsIcon('network', deviceDiagnostic['network'], deviceDiagnostic) +
                            deviceSettingsIconFunc.storagePermission(deviceDiagnostic)
                            + "</div>" + refreshBtnHtml + '</div>' + buildVersionHtml;
                    },
                    "aTargets": [4]
                }
            ],
            "fnInitComplete": function (oSettings, json) {
                $("#empLoading").hide();
                $('#teamViewButton').click();
                $('.dataTables_filter input').attr("placeholder", "Search");
                // loadPanelTeam(json);
                $('#totalTblRecords').html(oSettings.fnRecordsDisplay());
                $("#teamViewWrapper").show();
                $(document).click(function () {
                    $(".dropdown-after-active,.dropdown-after").hide();
                });
            },
            "fnDrawCallback": function (oSettings) {
                $("#empLoading").hide();
                $("#team-count").removeClass('dn');
                $('#totalTblRecords').html(oSettings.fnRecordsDisplay());
            }
        });
    $('#custom-feilds').removeClass('dn');

    $('#teamTable_filter input')
        .unbind('keyup')
        .bind('keyup', function (e) {
            if ($(this).val().length === 0 && e.keyCode === 8) {
                $('#teamTable').dataTable().fnFilter("");
            }
            if ($(this).val().length < 3 && e.keyCode !== 13) {
                return;
            }
            $('#teamTable').dataTable().fnFilter($(this).val());
        });
}

function getDeviceSettingsIcon(key, value, diagnosticData) {
    const classNames = {
        'battery-optimize-active': 'battery-optimize-active',
        'battery-optimize-deactive': 'battery-optimize-deactive',
        'gps-active': 'gps-active',
        'gps-deactive': 'gps-deactive',
        'network-active': 'network-active',
        'network-deactive': 'network-deactive',
        'accuracy-active': 'accuracy-active',
        'accuracy-deactive': 'accuracy-deactive',
        'storage-active': 'storage-active',
        'storage-deactive': 'storage-deactive'
    };
    var span = "";
    var className = '';
    var title = '';
    var tooltipContent = "";

    this.storagePermission = function (diagnosticData) {

        if (diagnosticData == undefined) {
            return '';
        }
        if (!diagnosticData.hasOwnProperty('locationPermission') && !diagnosticData.hasOwnProperty('storagePermission')) {
            return '';
        }

        var className = diagnosticData['locationPermission'] && diagnosticData['storagePermission'] ? classNames["storage-active"] : classNames["storage-deactive"];
        var title = '';
        if (!diagnosticData['locationPermission'] && !diagnosticData['storagePermission']) {
            title = $.i18n.prop("title.location.and.storage.permission_refused");
        } else if (diagnosticData['locationPermission'] && !diagnosticData['storagePermission']) {
            title = $.i18n.prop("title.storage.permission_refused");
        } else if (!diagnosticData['locationPermission'] && diagnosticData['storagePermission']) {
            title = $.i18n.prop("title.location.permission_refused");
        } else if (diagnosticData['locationPermission'] && diagnosticData['storagePermission']) {
            title = $.i18n.prop("title.location.and.storage.permission_granted");
        }
        ;

        const _spanElem = "<span class='device-settings-icon " + className + "' ></span>";
        tooltipContent = '<span class="storage-permission"><span data-toggle="tooltip" data-placement="left"  title="' + title + '" >' + _spanElem + '</span></span>';
        span = tooltipContent;

        return span;
    };

    if (value == undefined) {
        return '';
    }

    switch (key) {
        case 'batteryOptimize' : {
            className = value ? classNames["battery-optimize-active"] : classNames["battery-optimize-deactive"];
            title = $.i18n.prop("title.device.battery.setting.is") + ' ' + (value ? $.i18n.prop("title.device.setting.on") : $.i18n.prop("title.device.setting.off"));
            break;
        }
        case 'highAccuracy' : {
            className = value ? classNames["accuracy-active"] : classNames["accuracy-deactive"];
            title = $.i18n.prop("title.device.accuracy.setting.is") + ' ' + (value ? $.i18n.prop("title.device.setting.on") : $.i18n.prop("title.device.setting.off"));
            break;
        }
        case 'network' : {
            className = value ? classNames["network-active"] : classNames["network-deactive"];
            title = $.i18n.prop("title.device.network.is") + ' ' + (value ? $.i18n.prop("title.device.setting.on") : $.i18n.prop("title.device.setting.off"));
            break;
        }
        case 'gpsStatus' : {
            className = value ? classNames["gps-active"] : classNames["gps-deactive"];
            title = $.i18n.prop("title.device.gps.is") + ' ' + (value ? $.i18n.prop("title.device.setting.on") : $.i18n.prop("title.device.setting.off"));
            if (diagnosticData.satelliteFound != undefined && diagnosticData.satelliteFixed != undefined) {
                title = title + "(" + $.i18n.prop("title.satellite.fixed") + ' ' + diagnosticData.satelliteFixed + '/' + diagnosticData.satelliteFound + ")";
            }
            break;
        }
    }

    const _spanElem = "<span class='device-settings-icon " + className + "' ></span>";
    tooltipContent = '<span data-toggle="tooltip" data-placement="top"  title="' + title + '" >' + _spanElem + '</span>';
    span = tooltipContent;

    return span;
}

function latetimeConvert(n, status) {

    var num = n;
    var hours = (num / 60);
    var rhours = Math.floor(hours);
    var minutes = (hours - rhours) * 60;
    var rminutes = Math.round(minutes);
    if (rhours === 0 && rminutes === 0) {
        return ' (' + $.i18n.prop('msg.ontime') + ') ';
    } else if (rhours === 0) {
        return $.i18n.prop('msg.by') + ' ' + rminutes + ' ' + $.i18n.prop('msg.minutes');
    } else {
        return $.i18n.prop('msg.by') + ' ' + rhours + ":" + rminutes + ' ' + $.i18n.prop('msg.hours');
    }
}

function punchIntimeConvert(time) {
    var timeString = time;
    var H = +timeString.substr(0, 2);
    var h = (H % 12) || 12;
    var ampm = H < 12 ? " am" : " pm";
    timeString = h + timeString.substr(2, 3) + ampm;
    return timeString
}

function EmployeeList(data) {
    this.infowindow_template = new Template($("#emp_marker_infowindow").html());
    this.order_infowindow_template = new Template($("#order-infowindow").html());
    this.data = data;
    this.employeeMarkers = null;
    this.summaries = {};
    this.selectedValues = "";
    this.cluster_infowindow = "";
    this.employeeList = {};
}

// Get latest location and all task of selected employee
function get_location(empId) {
    // clear all markers from map
    map.clear();

    $.ajax({
        url: Team_URL.getLatestLocAndTask + "?employeeId=" + empId,
        type: 'POST',
        data: {empId: empId},
        cache: false,
        dataType: 'json',
        success: function (data) {
            var employee_list = new EmployeeList(data).show_employee(data);

        },
        error: function (xhr, err) {
        }
    });
}

EmployeeList.prototype.show_employee = function (data) {

    var employee = new Employee(this, data, {
        infowindow_template: this.infowindow_template,
        order_infowindow_template: this.order_infowindow_template
    });

    employee.build();

};

function Employee(parent, data, options) {
    this.parent = parent;
    this.infowindow_template = options.infowindow_template;
    this.order_infowindow_template = options.order_infowindow_template;
    this.data = data;
    this.last_marker = null;
    this.last_order_marker = null;
    this.defaultZoomLevel = 11;
    this.emp_marker = null;
    this.order_marker_array = [];
}

Employee.prototype.build = function () {
    this.create_emp_marker();
    this.create_order_marker();
    this.add_order_markers();

};

Employee.prototype.build_emp_infowindow_data = function () {
    var data = this.data.empObject;

    return {
        empID: data.bpId,
        empName: data.empName,
        empAddress: data.latestLocationAddress,
        empTime: data.latestLocationTimestamp,
        taskCompleted: data.completed,
        totalTask: data.totalTask,
        taskVisit: data.yetToVisit
    }
};

Employee.prototype.build_order_infowindow_data = function (task_obj) {
    return {
        taskType: task_obj.taskType,
        taskName: task_obj.name,
        custName: task_obj.customerName,
        custMobile: task_obj.mobileNo,
        custAddress: task_obj.address,
        expTime: task_obj.expDate,
        status: task_obj.status
    }
};

Employee.prototype.create_emp_marker = function () {
    var _this = this,
        data = this.data.empObject,
        $infowindow = this.$infowindow = $(this.infowindow_template.build(this.build_emp_infowindow_data(data))),
        marker = map.createMarker(
            {
                latitude: data.lat,

                longitude: data.lon,
                image: emp_marker_img,
                content: $infowindow[0],
                width: 30,
                height: 36,
                eventHandlers: {
                    click: function (latitude, longitude) {
                        if (_this.last_marker) {
                            _this.last_marker.closeInfoWindow();
                            delete _this.last_marker;
                        }
                        _this.last_marker = this;
                        this.openInfoWindow();
                    }
                }
            });
    this.emp_marker = marker;
    this.add_emp_marker_to_map();
};

Employee.prototype.add_emp_marker_to_map = function () {
    var data = this.data.empObject;
    this.emp_marker.addToMap();
    this.emp_marker.openInfoWindow();
    map.panTo(data.lat, data.lon);
    map.setCenter(data.lat, data.lon, this.defaultZoomLevel);
};

Employee.prototype.create_order_marker = function () {
    var _this = this, task_array = this.data.taskArray;

    if (task_array != null) {
        for (var i = 0, j = task_array.length; i < j; i++) {
            var task_obj = task_array[i],
                $infowindow = this.$infowindow = $(this.order_infowindow_template.build(this.build_order_infowindow_data(task_obj))),
                marker = map.createMarker(
                    {
                        latitude: task_obj.lat,
                        longitude: task_obj.lon,
                        image: emp_marker_img,
                        content: $infowindow[0],
                        width: 30,
                        height: 36,
                        eventHandlers: {
                            click: function (latitude, longitude) {
                                if (_this.last_order_marker) {
                                    _this.last_order_marker.closeInfoWindow();
                                    delete _this.last_order_marker;
                                }
                                _this.last_order_marker = this;
                                this.openInfoWindow();
                            }
                        }
                    });

            this.order_marker_array.push(marker);
        }
    }

};

Employee.prototype.add_order_markers = function () {
    var order_marker_array = this.order_marker_array, order_marker;

    if (order_marker_array) {
        for (var i = 0, j = order_marker_array.length; i < j; i++) {
            order_marker = order_marker_array[i];

            order_marker.addToMap();

        }
    }
};
EmployeeList.prototype.change_view = function (view) {
    switch (view) {
        case "adjust-zoom": {
            map.setCenter();
        }
        case "only-one-employee" : {

        }
        case "all-employees" : {

        }
        case "all-emp-and-orders" : {

        }
    }
};


function viewEmployeeStatus() {
    $('#employeeProfile').hide();
    $('#teamStatus').fadeIn();
}


function loadPanelTeam(reponse) {

    var dataObj = {
        totalTeamMember: reponse.result.dto.totalEmployeeCount,
        onTime: reponse.result.dto.onTimeCount,
        late: reponse.result.dto.lateCount,
        totalPunchIn: reponse.result.dto.punchInCount,
        absent: reponse.result.dto.absentCount,
        onLeave: reponse.result.dto.onLeaveCount,
        notDispatched: reponse.result.dto.notDispatchCount,
        taskNotAssign: reponse.result.dto.notAssignedCount,
        punchedOut: reponse.result.dto.punchOutCount,
        punchedIn: reponse.result.dto.punchInCount - reponse.result.dto.punchOutCount,
        idle: reponse.result.dto.idleCount
    };

    var team_panel_template = new Template($("#total-team-member-template").html());
    $('#panelTeamMember').html(team_panel_template.build(dataObj));

}

function loadDailyStatus(uuids)
{
	$.ajax({
		url: Team_URL.getEmployeeDailyStatusCount + "?uuid=" + uuids,
		type: "POST",
		cache: false,
		dataType: "json",
		success: function (data)
		{
			setTeamCountData(data);
		},
		error: function (xhr, err)
		{
			console.error(xhr, err);
		}
	});
}

function setTeamCountData(reponse)
{
	$("#totalMemberHead").text(reponse.result.totalEmployeeCount === undefined ? "0" : reponse.result.totalEmployeeCount);
	var dataObj = {
		totalPunchIn: reponse.result.punchInCount === undefined ? "0" : reponse.result.punchInCount,
		onTime: reponse.result.onTimeCount === undefined ? "0" : reponse.result.onTimeCount,
		late: reponse.result.lateCount === undefined ? "0" : reponse.result.lateCount,
		onLeave: reponse.result.onLeaveCount === undefined ? "0" : reponse.result.onLeaveCount,
		absent: reponse.result.absentCount === undefined ? "0" : reponse.result.absentCount,
		notDispatched: reponse.result.notDispatchCount === undefined ? "0" : reponse.result.notDispatchCount,
		punchedOut: reponse.result.punchOutCount === undefined ? "0" : reponse.result.punchOutCount,
		punchedIn: reponse.result.punchInCount - reponse.result.punchOutCount === undefined ? "0" : reponse.result.punchInCount - reponse.result.punchOutCount,
		idle: reponse.result.idleCount === undefined ? "0" : reponse.result.idleCount,
		todayState: moment(reponse.result.currentTimeStamp).format("DD MMM YYYY")
	};

	var teamDailyStatus = new Template($("#teamDailyStatus-template").html());
	$("#teamDailyStatus").html(teamDailyStatus.build(dataObj));
}

function loadUserPerformance() {
    var dataObj = {
        punchedIn: '80',
        absent: '5',
        hours: '8',
        arrival: '80',
        firstTimeResolution: '70',
        withInTime: '50'
    };
    var performance_template = new Template($("#performance-template").html());
    $('#performance').html(performance_template.build(dataObj));
}

window.onhashchange = function (e) {
    if (window.location.hash === "#" || window.location.hash === "") {
        viewEmployeeStatus();
    }
};

function availableNotavailablecall(id, statusType, comment) {

    var req = {
        "uid": id,
        "statusType": statusType,
        "comment": comment|| ''

    };
    $.ajax({
        url: Team_URL.availability,
        type: "POST",
        cache: false,
        async: false,
        contentType: "application/json",
        dataType: 'json',
        data: JSON.stringify(req),
        statusCode: {
            200: function (response) {
                load_team_day_view();
            }
        }
    });
}

function showComment() {
    var target = $(event.target);
    swal({
        title: '',
        text: $(target).attr('comment'),
        type: "info",
        html: true,
        closeOnCancel: true
    });
}

//function for availibility event
function availableNotavailableFn(id, name, statusType) {
    if(restrictVendorAction(VENDOR_RESTRICTION_FEATURE.TEAM)){
        return;
    }
    var statusMsg = $.i18n.prop("jsp.msg.availability") + " " + name + '?';
    swal({
        title: '',
        text: statusMsg,
        type: "warning",
        html: true,
        showCancelButton: true,
        closeOnConfirm: true,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
            if (statusType == 2) {
                $('#availabilityreason').val('');
                reasonblock(id, statusType);
            }else if(statusType == 3){
                $('#availabilityAbsentreason').val('');
                absentReasonBlock(id, statusType);
            } else {
                $('#availabilityreason').val('');
                availableNotavailablecall(id, statusType, $('#availabilityreason').val());
            }
        }
    });
}

function reasonblock(id, statusType) {
    $('#Reasonpopup').modal('show');
    $("#confirmation").click(function () {
        availableNotavailablecall(id, statusType, $('#availabilityreason').val());
    });
}

function absentReasonBlock(id, statusType) {
    $('#absentReasonpopup').modal('show');
    $("#absentConfirmation").click(function () {
        if($("#availabilityAbsentreason").val().trim() === ""){
            $('#absentErrorMsg').show();
            setTimeout(function(){
                $('#absentErrorMsg').hide();
            },2500)
            return false;
        }
        availableNotavailablecall(id, statusType, $('#availabilityAbsentreason').val());
        $('#absentReasonpopup').modal('hide');
    });
}


function timeConvertToBreak(breakStartTimestamp) {
    var breakTime = "";
    if (breakStartTimestamp === undefined || breakStartTimestamp === null) {
        return breakTime;
    }
    var currentTime = new Date();
    var differrenceInMinutes = (currentTime.getHours() - moment(breakStartTimestamp).format("HH")) * 60 + currentTime.getMinutes() - moment(breakStartTimestamp).format("mm");
    var hours = (differrenceInMinutes / 60);
    var rhours = Math.floor(hours);
    var minutes = (hours - rhours) * 60;
    var rminutes = Math.round(minutes);
    return breakTime += rhours === 0 ? rminutes + ' ' + $.i18n.prop('msg.minutes') : rminutes < 10 ? rhours + ":0" + rminutes + ' ' + $.i18n.prop('msg.hours') : rhours + ":" + rminutes + ' ' + $.i18n.prop('msg.hours');
}

function earlyTimeConvert(earlyDuration) {
    var earlyTime = "";
    if (earlyDuration === undefined || earlyDuration === null) {
        return earlyTime;
    }
    var hours = (earlyDuration / 60);
    var rhours = Math.floor(hours);
    var minutes = (hours - rhours) * 60;
    var rminutes = Math.round(minutes);
    if (rhours === 0 && rminutes === 0) {
        earlyTime += " (" + $.i18n.prop("msg.ontime") + ") ";
    } else if (rhours === 0) {
        earlyTime += $.i18n.prop("msg.by") + " " + rminutes + " " + $.i18n.prop("msg.minutes");
    } else {
        if (rminutes < 10) {
            rminutes = "0" + rminutes;
        }
        earlyTime += $.i18n.prop("msg.by") + " " + rhours + ":" + rminutes + " " + $.i18n.prop("msg.hours");
    }
    return earlyTime;
}

function exportTeamMembers() {

    var organizationUnit = $(".multi-filter").jstree("get_selected");
    var status = $('#attendenceId').val();
    var data = {};

    if(organizationUnit.length > 0){
        data['locationGroupUids'] = organizationUnit.join(',');
    }
    if(status.trim() != ""){
        data['status'] = status;
    }
    downloadFile(Team_URL.exportTeamMembers, data, "form", "Attachment-Name");
}
