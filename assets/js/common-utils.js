//Global variable
var countryRestrict = {'country': 'ID'}; // country search BD
var timeZoneText = "UTC+07:00";  // country Timezone UTC+07:00 GMT + 6:00
var timeZoneValue = "Asia/Jakarta"; // Asia/Jakarta  Dhaka
var locationGroupId,routeCoordinates,centerData, loginZoneId, loginCityId, loginAreaId, loginStateId,polyPoints=[],isOnTaskPage = false,isTerritoryPage=false;
var commonURL = {
    getZones: 'lg/locationGroupAction/locationdetails'
};

var VENDOR_RESTRICTION_FEATURE = {
    "TASK": "task",
    "TEAM": "team",
    "MONITOR": "monitor",
}

const TASK_EVENT_ID = {
	"Open": 10,
	"Acknowledge": 11,
	"Rejected": 12,
	"Approve": 13,
	"TravelStarted": 14,
	"ChecklistSubmitted": 20,
	"Assign": 22,
	"Onsite": 30,
	"Incomplete": 40,
	"Completed": 50,
	"AccessNotAvailable": 60,
	"JobStarted": 80,
	"FieldCancelled": 90,
	"RequestForReschedule": 120,
	"RejectedByServiceNow": 150,
	"UserAcceptanceTest": 16,
	"UATSuccess": 17
};

const approveTaskStatusArray = [TASK_EVENT_ID.Completed, TASK_EVENT_ID.FieldCancelled, TASK_EVENT_ID.RequestForReschedule];

var selectedCenterId;
var selectedCenterNameLabel = "Select Area";
var selectedCenterName = selectedCenterNameLabel;
var jsSearch;
var currentLoginManagerUid = [];
var locationGroupDetails =[];
var targetId = [];
var targetNodeValue = []

// Defining RegEx to be used throughout the application
var regEx = {
    letter : /^[a-zA-Z ]*$/,
    letter_underscore : /^[a-zA-Z_ ]*$/,
    alpha : /^[a-zA-Z0-9 ]*$/,
    pincode : /^[0-9]{1,6}$/,
    _alpha : /^[a-zA-Z0-9 _]*$/,
    alpha_num : /^[a-zA-Z0-9 -]*$/,
    pincode_alpha: /^[a-zA-Z0-9 -]{3,10}$/,
    regExEmailId: /^[_A-Za-z0-9-\+]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,4})$/,
    regExStateCity: /^[a-zA-Z\s\.]+$/,
    regExMobNoPrefix: new RegExp("^([0-9]{7,13})$"),
    regExClientname: /^[a-zA-Z0-9\s\.\']+$/,
    regExForEmpName: new RegExp("^[a-zA-Z\\s\\-\\.\\']+$"),
    checkEmail: /^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+\.)+([a-z]{2,3})$/i,
    address: new RegExp('^[^\\;\\"\\\\]+$'),
    regExName: new RegExp("^[0-9a-zA-Z\\-\\_ ]+$"),
    regExContactNumber: /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/,
    regExForImei: new RegExp("^[0-9a-zA-Z\\-]+$"),
    alpha_num_special : /^[a-zA-Z0-9 \-._]*$/,
    checkSpecialCh : /^[ _.-]*$/,
    regExPin : new RegExp('^[a-zA-Z0-9- ]{3,10}$'),
    forIds : /^[a-zA-Z0-9_]*$/,
};

/**
 * This enum to used to map with Integration source type, which we have to display USER in Task related Details.
 * @type {{"1": string, "2": string, "3": string, "4": string}}
 */
var INTEGRATION_SOURCE_MAP = {
    1: 'Local',
    2: 'CBS',
    3:'ServiceNow',
    4: 'BMC'
};

var url = {
    getSelect: "/web-api/api/location-groups/hierarchy/details"
};
var isOrganazationHierachy ="";
var menuOptions =  {"results":[
    {
    "name":"Dashboard",
    "url":"/dashboardAction.do?action=viewDashboard",
    "uid":"1",
    "id":"1",
    "class":"",
    "icon":"",
    },
    {
        "name":"Admin",
        "url":"/employee.do?action=view",
        "uid":"2",
        "id":"2",
        "class":"",
        "icon":"",
    },
    {
        "name":"Team Setup",
        "url":"/employee.do?action=view",
        "uid":"21",
        "id":"21",
        "class":"",
        "icon":"",
        "parent": {
            "name":"Admin",
            "url":"/employee.do?action=view",
            "uid":"2",
            "class":"",
            "icon":"",
        }
    },
    {
        "name":"Device",
        "url":"/device.do?action=view",
        "uid":"22",
        "id":"22",
        "class":"",
        "icon":"",
        "parent": {
            "name":"Admin",
            "url":"/employee.do?action=view",
            "uid":"2",
            "class":"",
            "icon":"",
        }
    },
    {
        "name":"Organization Struture",
        "url":"/organization.do?action=viewOrganization",
        "uid":"23",
        "id":"23",
        "class":"",
        "icon":"",
        "parent": {
            "name":"Admin",
            "url":"/employee.do?action=view",
            "uid":"2",
            "class":"",
            "icon":"",
        }
    },
    {
        "name":"Organization Struture1",
        "url":"/organization.do?action=viewOrganization",
        "uid":"24",
        "id":"24",
        "class":"",
        "icon":"",
        "parent":{
            "name":"Organization Struture",
            "url":"/organization.do?action=viewOrganization",
            "uid":"23",
            "class":"",
            "icon":"",
            "parent": {
                "name":"Admin",
                "url":"/employee.do?action=view",
                "uid":"2",
                "class":"",
                "icon":"",
            }
        }
    },
    {
        "name":"Job Type",
        "url":"/organization.do?action=viewOrganization",
        "uid":"25",
        "id":"25",
        "class":"",
        "icon":"",
        "parent":{
            "name":"Organization Struture",
            "url":"/organization.do?action=viewOrganization",
            "uid":"23",
            "class":"",
            "icon":"",
            "parent": {
                "name":"Admin",
                "url":"/employee.do?action=view",
                "uid":"2",
                "class":"",
                "icon":"",
            }
        }
    },
    {
        "name":"Job Action",
        "url":"/organization.do?action=viewOrganization",
        "uid":"26",
        "id":"26",
        "class":"",
        "icon":"",
        "parent":{
            "name":"Organization Struture",
            "url":"/organization.do?action=viewOrganization",
            "uid":"23",
            "class":"",
            "icon":"",
            "parent": {
                "name":"Admin",
                "url":"/employee.do?action=view",
                "uid":"2",
                "class":"",
                "icon":"",
            }
        }
    },

]};

var imageExtension = [ 'jpg','jpeg','png','gif'];

function ajaxCall(options)
{
	$.ajax(options);
}

// initalize autocomplete functionality
function setAutoCompelete()
{
    initializePlaceAutocomplete();
}

/* for center manager login load territory data */

function getCenterID() {
    var options = {
        url: commonURL.getZones,
        type: "GET",
        cache: false,
        dataType: "json",
        contentType: "application/json",
        async: false,
        success: function (response) {
            if (200 === response.code) {
                var c_data = _.filter(response.response, {'type': 'servicecentre'}); //ladash js call
                if(c_data.length) {
                    centerData = c_data;
                    loginZoneId = _.filter(response.response, {'type': 'zone'});
                    loginStateId = _.filter(response.response, {'type': 'state'});
                    loginCityId = _.filter(response.response, {'type': 'city'});
                    loginAreaId = _.filter(response.response, {'type': 'area'});
                    locationGroupId = c_data[0].uid;
                    centerIdsArray = [c_data[0].uid];
                    return c_data[0].id;
                }
            }
        },
        error: function (response) {
        }
    };
    ajaxCall(options);
}

function createMemberFilter(data, $select, isSelect, setSelect, isPage) {
    $select.html("");
    var $opt = $("<option />", {
        value: "",
        html: $.i18n.prop('Not.Selected.Text')
    });
    if(isSelect) {
        $select.append($opt);
    }

    if (data !== null && data !== undefined && data.length !== 0) {
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label, bpid = obj.bpid,name,value;
            name = obj.name ? obj.name : obj.firstName;
            if (bpid !== undefined) {

                label = name + "-" + bpid ;
            }
            else {
                label = name;
            }

            isPage === 'isMonitor' ? value = obj.id : value = obj.bpid;

            $opt = $("<option />", {
                value: value,
                html: label
            });

            $select.append($opt);
            $select.multipleSelect("refresh");
        }
    }else{
        $select.multipleSelect("refresh");
        $select.append($opt);
    }

    if(isSelect) {
        $select.multipleSelect("uncheckAll");
    }else{
        $select.multipleSelect("checkAll");
    }

    if(setSelect){
        $select.multipleSelect("setSelects", setSelect);
    }
}

function createMemberFilterGeofence(data, $select, isSelect, setSelect) {
    $select.html("");
    if(isSelect) {
        var $opt = $("<option />", {
            value: "",
            html: $.i18n.prop('Not.Selected.Text')
        });
        $select.append($opt);
    }

    if (data !== null && data !== undefined) {
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label, bpid = obj.bpid;
            if (bpid) {
                label = obj.fullName + "-" + bpid;
            }
            else {
                label = obj.fullName;
            }
            $opt = $("<option />", {
                value: obj.bpid,
                html: label
            });

            $select.append($opt);
            $select.multipleSelect("refresh");
        }
    }
    if(!isSelect) {
        $select.multipleSelect("uncheckAll");
    }

    if(setSelect){
        $select.multipleSelect("setSelects", setSelect);
    }
}

function createClientFilter(data, $select, isSelect, setSelect) {
    $select.html("");
    var $opt = $("<option />", {
        value: "",
        html: $.i18n.prop('Not.Selected.Text')
    });
    if(isSelect) {
        $select.append($opt);
    }

    if (data !== null && data !== undefined && data.length !== 0) {
        $select.multipleSelect('updateCount', [data.length]);
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label, id = obj.clientId,lastname;
            lastname = obj.lastName !== undefined ? obj.lastName : '';
            if (id !== undefined) {
	            var name = obj.firstName + " " + lastname;
	            label = name + ' (' + obj.clientId + ')';
            }

            $opt = $("<option />", {
                value: obj.clientId,
                html: label
            });

            $select.append($opt);
        }
        $select.multipleSelect("refresh");
    }else{
        $select.multipleSelect("refresh");
        $select.append($opt);
    }


    if(isSelect) {
        $select.multipleSelect("uncheckAll");
    }else{
        $select.multipleSelect("checkAll");
    }

    if(setSelect){
        $select.multipleSelect("setSelects", setSelect);
    }
}

function createZoneFilter(data, $select, isSelect) {
    $select.html("");
        var $opt = $("<option />", {
            value: "",
            html: "Select "+zoneValue[1]
        });
        $select.append($opt);

    if (data !== null && data !== undefined) {
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label, id = obj.id;
            if(obj.type === "zone") {

                if (id !== undefined) {
                    label = obj.name;
                }
                $opt = $("<option />", {
                    value: obj.id,
                    html: label
                });

                $select.append($opt);
            }
        }
    }
    if(!isSelect)
        $select.multipleSelect("refresh");
}

function createGeofenceFilter(data, $select, isSelect, setSelect) {
    $select.html("");
    if(isSelect) {
        var $opt = $("<option />", {
            value: "",
            text: $.i18n.prop('geofence.dropdown.placeholder')
        });
        $select.append($opt);
    }
    if (data !== null && data !== undefined) {
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label, id = obj.id;

                if (id !== undefined) {
                    label = obj.name;
                }
                $opt = $("<option />", {
                    value: obj.id,
                    html: label
                });

                $select.append($opt);
                if(!isSelect)
                    $select.multipleSelect("refresh");
        }
    }
    if(!isSelect) {
        $select.multipleSelect("uncheckAll");
    }
    if(!isSelect) {
        if (setSelect) {
            $select.multipleSelect("setSelects", setSelect);
        }
    }else{
        if (setSelect) {
            $select.val(setSelect);
            //$select.multipleSelect("setSelects", setSelect);
        }
    }
}

function createCustomerTypeFilter(data, $select, isSelect, setSelect) {
    $select.html("");
    if(isSelect) {
        var $opt = $("<option />", {
            value: "",
            html: $.i18n.prop('Not.Selected.Text')
        });
        $select.append($opt);
    }


    if (data !== null && data !== undefined) {
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label, id = obj.uid;
            if (id !== undefined) {
                label = obj.name + ' (' + obj.typeId + ')';
            }

            $opt = $("<option />", {
                value: obj.uid,
                html: label
            });

            $select.append($opt);
            $select.multipleSelect("refresh");
        }
    }
    if(!isSelect) {
        $select.multipleSelect("uncheckAll");
    }

    if(setSelect){
        $select.multipleSelect("setSelects", setSelect);
    }
}

function createTerritoryFilter(data, $select, isSelect, setSelect) {
    $select.html("");
    if(!isSelect) {
        var $opt = $("<option />", {
            value: "",
            html: $.i18n.prop('Not.Selected.Text')
        });
        $select.append($opt);
        $select.multipleSelect("refresh");
    }


    if (data !== null && data !== undefined && data.length !== 0) {
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label, id = obj.uid;
            if (id !== undefined) {
                label = obj.name;
            }

            $opt = $("<option />", {
                value: obj.uid,
                html: label
            });

            $select.append($opt);
            $select.multipleSelect("refresh");
        }
    }else{
        $select.multipleSelect("refresh");
        $select.append($opt);
    }
    if(!isSelect) {
        $select.multipleSelect("uncheckAll");
    }else{
        $select.multipleSelect("checkAll");
    }

    if(setSelect){
        $select.multipleSelect("setSelects", [setSelect]);
    }
}

function getTerritoryData(ids, salesTask) {

    if (ids === undefined || ids === "" || ids == null)
    {
	    createTerritoryFilter([], $("#filter-territory"), true);
	    createClientFilter([], $("#filter-customer"), false);
	    createMemberFilter([], $("#filter-employee"), false);
        return;
    }

}

function createAssignFilter(data, $select, isSelect, setSelect) {
    $select.html("");
    if(isSelect) {
        var $opt = $("<option />", {
            value: "",
            html: $.i18n.prop('Not.Selected.Text')
        });
        $select.append($opt);
    }

    if (data !== null && data !== undefined) {
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label, bpid = obj.bpid;
            if (bpid) {
                label = obj.firstName + "-" + bpid;
            }
            else {
                label = obj.firstName;
            }
            $opt = $("<option />", {
                value: obj.bpid,
                html: label
            });

            $select.append($opt);
            $select.multipleSelect("refresh");
        }
    }
    if(!isSelect) {
        $select.multipleSelect("uncheckAll");
    }

    if(setSelect){
        $select.multipleSelect("setSelects", setSelect);
    }
}

function createCenterFilter(data, $select, isSelect, setSelect) {
    $select.html("");
    if(isSelect) {
        var $opt = $("<option />", {
            value: "",
            html: $.i18n.prop('Not.Selected.Text')
        });
        $select.append($opt);
    }

    if (data !== null && data !== undefined) {
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label;
            if (obj.clientId) {
                label = obj.name + "(" + obj.clientId + ')';
            }
            else {
                label = obj.name;
            }
            $opt = $("<option />", {
                value: obj.id,
                html: label
            });

            $select.append($opt);
            if(!isSelect)
                $select.multipleSelect("refresh");
        }
    }
    if(!isSelect) {
        $select.multipleSelect("uncheckAll");
    }

    if(setSelect){
        $select.multipleSelect("setSelects", setSelect);
    }
}



// territory by name filter(get name as a value of select )
function createTerritoryFilterName(data, $select, isSelect, setSelect) {
    $select.html("");
    if(!isSelect) {
        var $opt = $("<option />", {
            value: "",
            html: $.i18n.prop('Not.Selected.Text')
        });
        $select.append($opt);
        $select.multipleSelect("refresh");
    }


    if (data !== null && data !== undefined) {
        for (var i = 0, j = data.length; i < j; i++) {
            var obj = data[i], label, id = obj.uid;
            if (id !== undefined) {
                label = obj.name;
            }

            $opt = $("<option />", {
                value: id,
                html: label
            });

            $select.append($opt);
            $select.multipleSelect("refresh");
        }
    }

    if(!isSelect) {
        $select.multipleSelect("uncheckAll");
    }else{
        $select.multipleSelect("checkAll");
    }

    if(setSelect){
        $select.multipleSelect("setSelects", [setSelect]);
    }
}

function calcRoute(coOrdinates,map) {

    var nPoints = 10,start = 0,end = coOrdinates.length,allPath = [],waypts = [],lastElement=nPoints,i;
    var request = {
        optimizeWaypoints: false,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };



    if(coOrdinates.length < nPoints){
        request['origin'] = coOrdinates[0];
        request['destination'] = coOrdinates[coOrdinates.length - 1];
        waypts = [];
        for (i = 1; i < coOrdinates.length - 1; i++) {
            waypts.push({
                location: coOrdinates[i],
                stopover: true
            });
        }
        request['waypoints'] = waypts;
        callDirectionService(request,true);
     }else{

        rollBack(start,lastElement);
    }

    function rollBack(start,lastElement){
        request['origin'] = coOrdinates[start];
        request['destination'] = coOrdinates[lastElement - 1];
        waypts = [];
        for (i = start + 1; i < lastElement - 1; i++) {
            waypts.push({
                location: coOrdinates[i],
                stopover: true
            });
        }
        request['waypoints'] = waypts;
        if(lastElement === end) {
            callDirectionService(request,true);
            return;
        }
        start = lastElement -1;
        lastElement = lastElement + nPoints;
        if(lastElement > end){
            var diff = lastElement - end;
            lastElement = lastElement -diff;
        }
        callDirectionService(request,false,start,lastElement);
    }


  // createPolyline(allPath,map);

   function callDirectionService(request,isDraw,start,end){
       directionsService.route(request, function (response, status) {
           if (status === google.maps.DirectionsStatus.OK) {
               // directionsDisplay.setDirections(response); display route using direction service
               //map.map.fitBounds(response.routes[0].bounds);
               $.merge(allPath,response.routes[0].overview_path);
               if(isDraw) createPolyline(allPath,map);
               else rollBack(start,end);

           }else if(status === google.maps.DirectionsStatus.MAX_WAYPOINTS_EXCEEDED){
               notify('Route Max Waypoints Exceeded.','info');
               $('#saveRouteButton').attr('disabled',true);
           }
           else if(status === google.maps.DirectionsStatus.ZERO_RESULTS){
               notify('Error in creating routes with ZERO_RESULTS.','info');
               $('#saveRouteButton').attr('disabled',true);
           }
       });
    }
}

function createPolyline(point,map) {
    var options = {
        strokeColor: '#2929eb',
        strokeOpacity: 0.7,
        strokeWeight: 4
    };
    polyPoints = [];
    for(var i=0;i<point.length;i++){
        if(routeCoordinates){
            routeCoordinates.push({"x": point[i].lat(), "y": point[i].lng()});
            polyPoints.push({"latitude" :point[i].lat() ,"longitude":point[i].lng() });
        }else {
            if (onMonitorRoute)
                polyPoints.push({"latitude": point[i].lat(), "longitude": point[i].lng()});
            else
                polyPoints.push({"latitude": point[i].x, "longitude": point[i].y});
        }
    }

    routeObj  = map.createRoute(polyPoints,options);
    routeObj.addToMap();
}



// set map zoom level
function mapZoom(map,zoom){
    // Map default view set to Maldives
    /* map.fitToViewPort([
         {lat: 26.533235, lon: 88.384508},
         {lat: 21.706775, lon: 89.099210}
     ]);

     map.setZoomLevel(zoom);*/
    map.setCenter(application_configurations.lat, application_configurations.lng, zoom);
}

function getMonthIndex() {
    var d = new Date();
    return   d.getMonth();
}

//function for month date range
function getMonthRange(sDate, monthRange) {
    const date = moment(sDate).format();
    const lastDate = moment(new Date(moment(date).year(), moment(date).month()+monthRange, moment(date).date())).format();
    return lastDate;
}

// function for changing url hash
function changeHash(hash){
    if(hash == undefined){
        window.history.pushState('', '/', window.location.pathname);
    }else{
        window.location.hash = hash;
    }
}

// multiselect filter for add and modify forms
var selectedJsTreeNode = [], selectedJsTreeNodeText = [], locationDetailsList = [], isCommonJstreeLoaded;

function  loadMultiSelect(option) {
    var option = option || {};
    const optionList =  JSON.parse(JSON.stringify(menuOptions));
    // const optionList =  menuOptions;
    isOrganazationHierachy  = option;
    var ajaxOptions = {
        url        :  url.getSelect ,
        type       : 'get',
        contentType: "application/json; charset=utf-8",
        dataType   : 'json',
        catch :false,
        statusCode : {
            200: function (response) {
                response = typeof option === "object" ? response :optionList;
                userLocationGroup = typeof userLocationGroup === "string" ? userLocationGroup.replace('[','').replace(']','') : userLocationGroup;
                userLocationGroup = typeof userLocationGroup === "string" ? userLocationGroup.split(",") : userLocationGroup;
                /*response.result && response.result.map(function(d) {
                    for(var i = 0;i < userLocationGroup.length; i++){
                        if(userLocationGroup[i].trim() === d.uid && d.uid !== undefined){
                            currentLoginManagerUid.push(d.uid);
                        }
                    }

                });*/
              /* if(response.results[0].parent && response.results[0].parent ==="#" ){
               }else {
                   response.results.map(function (d) {
                       d.text = d.name;
                       d.parent = !d.parent ? d.parent = "#" : d.parent.uid;
                       !d.parent ? d.parent = "#" : d.parent.uid;
                       d.id = d.uid;
                   });
               }*/
              locationDetailsList = response.result;
                jsSearch =  $('.multi-filter-add');

                jsSearch.bind('ready.jstree', function (e, data) {

                    var jsTreeInstance = $(".multi-filter-add").jstree(true);

                    currentLoginManagerUid && currentLoginManagerUid.forEach(function (val) {
                            var departmentId = val;
                            departmentId = departmentId.trim();
                            var node = jsTreeInstance.get_node(departmentId);
                            if(typeof (keepCurrentDepartmentsEnabled) === 'undefined') {
                                jsTreeInstance.disable_node(departmentId);
                            }
                            node.parents.forEach(function (value) {
                                if(value !== '#') {
                                    jsTreeInstance.disable_node(value);
                                }
                            });
                        });
                        isCommonJstreeLoaded = true;
                }).jstree({
                    'core': {
                        //'multiple': false,
                        'data': response.result,
                        "worker": false,
                        "expand_selected_onload": false,
                        'themes': {
                            "icons": false
                        }
                    },
                    "search": {
                    "case_insensitive": false,
                        "show_only_matches" : true,
                        "show_only_matches_children" : true
                },
                'plugins': ['checkbox', 'wholerow','search'],
                    'checkbox': {
                        "three_state": true,
                        "whole_node": true,
                        "keep_selected_style": true,
                        "cascade": ""
                    }
                });

                var to = false;
                jsSearch.on('select_node.jstree', function (node, data, e) {
                    if(typeof isOrganazationHierachy==="string") {
                        selectedJsTreeNode = data.selected;
                        var selectedText = [];
                        optionList.results.map(function(result){
                            for (var i = 0; i <= data.selected.length; i++) {
                                if (result.uid === data.selected[i]) {
                                    selectedText.push(result.text);
                                }
                            }
                        });
                        selectedJsTreeNodeText = selectedText;
                        targetId = node.target.id;
                        targetNodeValue = data.selected;
                    }else {
                        selectedJsTreeNode.push(data.node.id);
                        selectedJsTreeNodeText.push(data.node.text);
                    }
                    $(this).parents().siblings(".selectZoneDropdownTreeBtn").find("span").first().text(selectedJsTreeNodeText);
                    $("#tree_search").val("");

					if(typeof(updateShiftsDataFn) === 'function') {
                        updateShiftsDataFn();
                    }
					if(typeof(updateVendorsDataFn) === 'function') {
						updateVendorsDataFn();
					}
                });
                jsSearch.on('deselect_node.jstree', function (node, data, e) {
                    if(typeof isOrganazationHierachy==="string") {
                        selectedJsTreeNodeText = arrayRemove(selectedJsTreeNodeText,data.node.text);
                        $(this).parents().siblings(".selectZoneDropdownTreeBtn").find("span").first().text(selectedJsTreeNodeText);
                        targetId = node.target.id;
                        targetNodeValue = data.selected;

                    }else if(selectedJsTreeNode.length > 0 && selectedJsTreeNode.indexOf(data.node.id) > -1) {
                        selectedJsTreeNode.splice(selectedJsTreeNode.indexOf(data.node.id), 1);
                        selectedJsTreeNodeText.splice(selectedJsTreeNodeText.indexOf(data.node.text), 1);
                        $("#selectedCenterId").text(selectedJsTreeNodeText);
                    }
                        $("#tree_search").val("");
                        if(typeof(updateShiftsDataFn) === 'function') {
                            updateShiftsDataFn();
                        }
						if(typeof(updateVendorsDataFn) === 'function') {
						updateVendorsDataFn();
						}
                });
                jsSearch.on('changed.jstree', function (e, data) {
					if (data.node && data.node.children.length === 0 && data.node.parents.length >= 5)
					{
						selectedCenterId = data.selected[0];
						selectedCenterName = data.node.text ? data.node.text : selectedCenterNameLabel;
						$("#tree_search").val(selectedCenterName);
						/** Load All Territory DropDown on Center Select */
						if (profileName !== 'robi_erl' && typeof(appClient) !== 'undefined')
						{
							appClient.loadTerritory();
						}

                        if (isTerritoryPage){
                            if (uid) {
                                callForMember(uid.territoryType);
                            }
                            else {
                                callForMember(isset);
                            }
                         }

                         if(isOnTaskPage){
                             var $opt = $("<option />", {
                                 value: "",
                                 html: $.i18n.prop('Not.Selected.Text')
                             });

                             getTerritorries(selectedCenterId);
                             $("#filter-clients,#employeeId").html("");
                             $("#filter-clients,#employeeId").append($opt);
                         }


                    }else{
                        selectedCenterName = selectedCenterNameLabel;
                    }

                });

            },
            400: function (response) {
                console.log(response)
            },
            404: function (response) {
                console.log(response)
            },
            500: function (response) {
                console.log(response)
            }
        }
    };
    ajaxCall(ajaxOptions);
}

function arrayRemove(arr, value) {

    return arr.filter(function(ele){
        return ele != value;
    });

}

/*
   Add Value from select to text box;
 */
function addValueToText($this){
   $($this).siblings('input').val($($this).children('option:selected').text().trim());
   callFilters($this.id);
}


function addSelectedValue($this) {
    $($this).siblings('input').val($($this).children('option:selected').text().trim());
}


/*
   Calling Center Levels Filter
 */

function callFilters(id) {
    if(id === 'filter-zone') {
        Centre_UI.loadFilters("zone", 'changeFilter');
        $('#filter-state,#filter-city,#filter-area').html('');
        $('#filter-state,#filter-city,#filter-area').siblings('input').val('');

    }else if(id === 'filter-state'){
        Centre_UI.loadFilters("state", 'changeFilter');
        $('#filter-city,#filter-area').html('');
    }
    else if(id === 'filter-city'){
        Centre_UI.loadFilters("city");
        $('#filter-area').html('');
    }
    else if(id === 'filter-area'){
        Centre_UI.loadFilters("area");
    }
}

/*
    Show error
 */

    function showError(_this, message)
    {
        _this.addClass('has-error');
        if (_this.next().is('label')) {
            _this.next('label').text(message);
        } else {
            _this.after('<label class="text-danger">' + message + '</label>');
        }

        setTimeout(function(){
            $(_this).removeClass('has-error').nextAll('label').remove();
        },5000);
    }

/*
      Validate image File
*/

function  validateImageFile(id)
{
    var imageFile = document.getElementById(id).value,
        extension = imageFile.substring(imageFile.lastIndexOf('.') + 1, imageFile.length),
        msg;

    if (imageFile != null && (extension === "png" || extension === "jpg" || extension === "jpeg"))
    {
        return true;
    }
    else
    {
        if (imageFile === "" || imageFile === undefined)
        {
            msg = 'Please select .jpg,.jpeg,.png file only.';
        }
        else if (extension !== "png" || extension !== "jpg")
        {
            msg = 'Please select .jpg,.jpeg,.png file only.';
        }

        //Display message
        showError($('#'+id).siblings('div.bootstrap-filestyle'), msg);
        return false;
    }
}

/*
    Url validation
 */

function is_url(str)
{
    regexp =  /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
    if (regexp.test(str))
    {
        return true;
    }
    else
    {
        return false;
    }
}

/*
*
*   function to check url is absolute image url
*
*/



function is_imgUrl(str){
    var strRev = str.lastIndexOf('.');
    var ext = str.substr(strRev + 1,str.len);
    return imageExtension.indexOf(ext) !== -1;
}

/**
 *  This function will flaten all nested array within objects.
 * @param array
 * @returns {*[]}
 */
function flat(array) {
    var result = [];
    array.forEach(function (a) {
        result.push(a);
        if (Array.isArray(a.children)) {
            result = result.concat(flat(a.children));
        }
    });
    return result;
}


function loadSmsOrganizationFilter(data, $filterElementClass, $searchElementId, nodeSelectionString, callback){
    $('.'+$filterElementClass).bind('ready.jstree', function () {}).jstree({
        'core': {
            'data': data,
            "worker": false,
            "expand_selected_onload": false,
            'themes': {
                "icons": false
            }
        },
        'plugins': ['checkbox', 'wholerow', 'search'],
        'checkbox': {
            "three_state": typeof jstreeThreeState !== 'undefined' ? jstreeThreeState : false,
            "whole_node": true,
            "keep_selected_style": true,
            "cascade": typeof jstreeThreeCascade !== 'undefined' ? jstreeThreeCascade : ''
        },
        "search": {
            "case_insensitive": false,
            "show_only_matches": true,
            "show_only_matches_children": true
        }
    }).jstree(nodeSelectionString, false, callback ? callback.call() : null);
}

function restrictVendorAction(feature){
    if(parseInt(userRoleId) === 15){
        var msg = "";
        if(feature === VENDOR_RESTRICTION_FEATURE.MONITOR){
            msg = $.i18n.prop('monitor.restrict.action.perform');
        }else if(feature === VENDOR_RESTRICTION_FEATURE.TEAM){
            msg = $.i18n.prop('team.restrict.action.perform');
        }else{
            msg = $.i18n.prop('task.restrict.action.perform');
        }
        swal({
            title: "",
            text: msg,
            type: "info",
            timer: 3600,
        });

        return true;
    }
    return false;
}