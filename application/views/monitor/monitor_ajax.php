
<style>



.info-window {
    position: absolute;
    left: 30%;
    top: 13%;
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, .2);
    max-height: 337px;
    overflow: auto;
}


#sidebar li > a {
    color: #333;
    font-weight: bold;
    font-size: 15px;
}


.close-btn {
  position: absolute;
  top: 12px;
  right: 10px;
}
</style>
<!-- Begin page -->
<div id="layout-wrapper">

  
  <div class="main-content-scroll-dash">
    <div class="page-content">
     
      <div class="row" id="livetrck">
        <div class="col-md-3 col-sm-12">
          <div id="sidebar">
					 <div class="panel">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-sm-8 col-xs-8">
                    <form>
                      <input type="text" id="searchInput" onkeyup="searchNames()" placeholder="Search for names..." class="form-control form-control-md">
                    </form>
                  </div>
                  <!--<div class="col-md-2 col-sm-4 col-xs-4">
                    <button type="button" class="btn btn-default pull-right"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-md1"><i class="mdi mdi-filter"></i></button>
                  </div>-->
                </div>
                <div class="assign-btn">
                  <div class="row bg-info">
                    <div class="col-md-8 col-sm-6">
                      <h5 class="loc text-white"><i class="fa fa-book" aria-hidden="true"></i> <?php echo $moitorlist[0]->unassigned_open_task;?> Unassigned Tasks</h5>
                    </div>
                    <div class="col-md-4 col-sm-6 mt-2">
                      <button type="button" class="btn btn-success pull-right"><span class="text-white">Assign</span></button>
                    </div>
                  </div>
                </div>
                <ul id="peopleList">
                </ul>
                <div class="list-footer">
                  <div class="page-size-select"> Show
                    <select id="page-size">
                      <option value="5">5</option>
                      <option value="10" selected="selected">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                  </div>
                  <span class="page-nav">
                  <button class="first page-button" title="First" disabled="disabled"> &nbsp;</button>
                  <button class="previous page-button" title="Previous" disabled="disabled">&nbsp;</button>
                  <span class="page-button-container">
                  <button class="mediumButton">1</button>
                  <button class="page-button">2</button>
                  <button class="page-button">3</button>
                  </span>
                  <button class="next page-button" title="Next"> &nbsp;</button>
                  <button class="last page-button" title="Last"> &nbsp;</button>
                  </span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-12">
          <div id="map" style="height: 100%; width:100%"></div>
          
          <!-- prettier-ignore AIzaSyAZQKuLhE2KG_ZXIY7bydMgFdcTt_jsNwE--> 
          <script>(g => { var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window; b = b[c] || (b[c] = {}); var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => { await (a = m.createElement("script")); e.set("libraries", [...r] + ""); for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]); e.set("callback", c + ".maps." + q); a.src = `https://maps.${c}apis.com/maps/api/js?` + e; d[q] = f; a.onerror = () => h = n(Error(p + " could not load.")); a.nonce = m.querySelector("script[nonce]")?.nonce || ""; m.head.append(a) })); d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)) })
            ({ key: "AIzaSyAZQKuLhE2KG_ZXIY7bydMgFdcTt_jsNwE", v: "weekly" });
	  </script> 
          <script>

          let map;
		
          async function initMap1(z_check) {
            
            const { Map } = await google.maps.importLibrary("maps");
				map = new Map(document.getElementById("map"), {
				  center: { lat: 15.8281, lng: 78.0373 },
				  zoom:5,
				  minZoom: 3,
				});
          }
          async function initMap(z_check) {
            //@ts-ignore
            const { Map } = await google.maps.importLibrary("maps");
				
            map = new Map(document.getElementById("map"), {
              center: { lat: 15.8281, lng: 78.0373 },
              zoom:5,
              minZoom: 3,
            });
            displayOnMap();

              if(z_check == 1){
            map.setZoom(map.getZoom() - 1); // Zoom out one level

            // Gradually zoom out to show all coordinates
            var zoomInterval = setInterval(function() {
            if (map.getZoom() < 7) { // Minimum zoom level to stop the animation
            map.setZoom(map.getZoom() + 3);
            } else {
            clearInterval(zoomInterval); // Stop the animation
            }
            }, 1000); // Interval in milliseconds between each zoom step
            }
          }

          //initMap(0);
          const people = [
						  
				<?php

				$a="1";
				$data="";
				foreach($moitorlist as $moitorlists)
				{
				$name=$moitorlists->name;
				$ename=$moitorlists->name;
				$emp_code=$moitorlists->emp_code;
				$emp_id=$moitorlists->emp_id;
				$tasks=$moitorlists->total_tasks_count;
				$completetask=$moitorlists->completetask;
				$emp_role=$moitorlists->emp_role;
				
				if($moitorlists->Address == null || $moitorlists->Address == ''){
				$last_loc_date_time="";
				$lat=$moitorlists->base_lat;
				$lng=$moitorlists->base_long;
				$lat_addreess="";
				}else {
					$lat_addd=explode(',',$moitorlists->Address);
					$last_loc_date_time=$lat_addd[0];
					$lat=$lat_addd[1];
					$lng=$lat_addd[2];
					$lat_addreess="";
				}
				
				$emp_dsgn=$moitorlists->emp_designation;
				$task_id=$moitorlists->task_id;
				$emp_mobile=$moitorlists->emp_mobile;
				if($moitorlists->shift_name==null){
					$shift_name='S';
				}else{
					$shift_name=substr($moitorlists->shift_name,0,2);
				}
				$service_no=$moitorlists->service_no;
				$full_addr=$moitorlists->taskAddress;
				$task_list=$moitorlists->task_list;
				if($moitorlists->task_created_date != null){
				$task_created_date=date('d-M-Y H:i:A',strtotime($moitorlists->task_created_date));
				}else {
				$task_created_date='';	
				}

        if($moitorlists->punch_status == 1){
			  	$punch_status_icon="<i class='fas fa-check-circle text-success tick' title='Punch In' ></i> ";
        }else if($moitorlists->punch_status == 0){
			  	$punch_status_icon="<i class='fas fa-minus-circle text-danger tick' title='Punch Out' ></i> ";
        }else{
			  	$punch_status_icon="<i class='fas fa-window-close-circle text-danger tick' title='Not Punch In' ></i> ";
        }




          if($moitorlists->battery_percent >= 50){
			    	$btry_icon="<i class='fas fa-battery-full text-success' title='".$moitorlists->battery_percent."' ></i>";
          }else if($moitorlists->battery_percent < 50){
            $btry_icon="<i class='fas fa fa-battery-half text-danger' title='".$moitorlists->battery_percent."' ></i>";
          }else{
            $btry_icon="<i class='fas fa fa-battery-quarter text-danger'></i>";
          }




				$marker_icon="<i class='fas fa-map-marker-alt text-success'></i> ";
				$data .='{name:"<strong>'.$name.'</strong>",ename:"'.$ename.'",emp_code:"'.$emp_code.'",tasks:"'.$tasks.'",lat:"'.$lat.'",lng:"'.$lng.'",emp_dsgn:"'.$emp_dsgn.'",locatn:"'.$marker_icon.'",btry_icon:"'.$btry_icon.'",emp_mobile:"'.$emp_mobile.'",emp_id:"'.$emp_id.'",service_no:"'.$service_no.'",completetask:"'.$completetask.'",task_created_date:"'.$task_created_date.'",task_list:"'.$task_list.'",punch_status_icon:"'.$punch_status_icon.'",shift_name:"'.$shift_name.'",last_loc_date_time:"'.$last_loc_date_time.'",emp_role:"'.$emp_role.'"},';
				$a++;
				}

				$main_data=substr($data, 0, -1);

				echo $main_data;

				?>
			
            // { name: '<strong>A.Vethapthagar Clarance</strong>', "emp_id": "29812_MAD_KK", "tasks": 3, lat: 22.7196, lng: 75.8577, emp_dsgn: 'Digger', locatn: "<i class='fas fa-map-marker-alt text-success'></i> ", btry_icon: "<i class='fas fa-battery-full text-success'></i>"  },
			// { name: '<strong>A.Vethapthagar Clarance</strong>', "emp_id": "29812_MAD_KK", "tasks": 3, lat: 22.7196, lng: 75.8577, emp_dsgn: 'Digger', locatn: "<i class='fas fa-map-marker-alt text-success'></i> ", btry_icon: "<i class='fas fa-battery-full text-success'></i>"  },
          ];
          
          const peopleList = document.getElementById("peopleList");

          function displayPeople() {
            let cardContainer = document.getElementById("card-container");

            peopleList.innerHTML = "";

            for (let i = 0; i < people.length; i++) {
              let li = document.createElement("li");
              let person = people[i];
				const date_visible = new Date();
				let date =person.task_created_date;
				// let time =person.task_created_date;

			  
			  
              li.innerHTML = '<a href="javascript:void(0)" onclick="get_tasks_list('+person.emp_id+','+person.tasks+')" ><span class="bg-primary prority">'+person.shift_name+'</span>'+ person.name + '<div class="count"> ' + person.locatn + person.btry_icon + "</div>" + '<br>' + person.punch_status_icon + '' + person.emp_code + '<br> <div class="name"> ' + person.completetask + "/"  + person.tasks + "Tasks Completed </div></a>";
              // peopleList.appendChild(li);
              li.addEventListener("click", () => {
                console.log(person);

                // remove previous highlights
                let highlighted = document.querySelector(".highlight");
                if (highlighted) {
                  highlighted.classList.remove("highlight");
                }
                // add highlight to clicked item
                li.classList.add("highlight");
				  
				  
                // create the info window element

              const people_task1= `<div id="monitor_status_count_list" >
              
<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#3E929F "></span>
<span style="color:#3E929F " class="status-summary-font"> Assigned &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#3E929F"><?php echo $task_status_tabs_cpount->Assigned_218;?></span>
</div>


<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#41ACED "></span>
<span style="color:#41ACED " class="status-summary-font"> Acknowledged &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#41ACED"><?php echo $task_status_tabs_cpount->Acknowledged_219;?></span>
</div>


<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#9E9C9C "></span>
<span style="color:#9E9C9C " class="status-summary-font"> Travel &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#9E9C9C"><?php echo $task_status_tabs_cpount->Travel_220;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#F80808 "></span>
<span style="color:#F80808 " class="status-summary-font"> Onsite - Waiting for Access &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#F80808"><?php echo $task_status_tabs_cpount->Onsite_Waiting_for_Access_221;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#88F808 "></span>
<span style="color:#88F808 " class="status-summary-font"> Access Available - WIP &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#88F808"><?php echo $task_status_tabs_cpount->Access_Available_WIP_222;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#b4f808 "></span>
<span style="color:#b4f808 " class="status-summary-font"> UAT &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#b4f808"><?php echo $task_status_tabs_cpount->UAT_223;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#B9F417AB "></span>
<span style="color:#B9F417AB " class="status-summary-font"> Checklist Submited &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#B9F417AB"><?php echo $task_status_tabs_cpount->Checklist_Submited_224;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#B9F417AB "></span>
<span style="color:#B9F417AB " class="status-summary-font"> UAT-Success &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#B9F417AB"><?php echo $task_status_tabs_cpount->UAT_Accepted_225;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#15C8E3 "></span>
<span style="color:#15C8E3 " class="status-summary-font"> Completed &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#15C8E3"><?php echo $task_status_tabs_cpount->Complete_226;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#15C8E3 "></span>
<span style="color:#15C8E3 " class="status-summary-font"> Approved &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#15C8E3"><?php echo $task_status_tabs_cpount->Approved_227;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#dd4a4a "></span>
<span style="color:#dd4a4a " class="status-summary-font"> Field Cancelled &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#dd4a4a"><?php echo $task_status_tabs_cpount->Field_Cancel_271;?></span>
</div>
               </div>`;

              const people_task= `<div id="monitor_tasks_list" >
               
<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#3E929F "></span>
<span style="color:#3E929F " class="status-summary-font"> Assigned &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#3E929F"><?php echo $task_status_tabs_cpount->Assigned_218;?></span>
</div>


<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#41ACED "></span>
<span style="color:#41ACED " class="status-summary-font"> Acknowledged &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#41ACED"><?php echo $task_status_tabs_cpount->Acknowledged_219;?></span>
</div>


<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#9E9C9C "></span>
<span style="color:#9E9C9C " class="status-summary-font"> Travel &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#9E9C9C"><?php echo $task_status_tabs_cpount->Travel_220;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#F80808 "></span>
<span style="color:#F80808 " class="status-summary-font"> Onsite - Waiting for Access &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#F80808"><?php echo $task_status_tabs_cpount->Onsite_Waiting_for_Access_221;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#88F808 "></span>
<span style="color:#88F808 " class="status-summary-font"> Access Available - WIP &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#88F808"><?php echo $task_status_tabs_cpount->Access_Available_WIP_222;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#b4f808 "></span>
<span style="color:#b4f808 " class="status-summary-font"> UAT &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#b4f808"><?php echo $task_status_tabs_cpount->UAT_223;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#B9F417AB "></span>
<span style="color:#B9F417AB " class="status-summary-font"> Checklist Submited &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#B9F417AB"><?php echo $task_status_tabs_cpount->Checklist_Submited_224;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#B9F417AB "></span>
<span style="color:#B9F417AB " class="status-summary-font"> UAT-Success &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#B9F417AB"><?php echo $task_status_tabs_cpount->UAT_Accepted_225;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#15C8E3 "></span>
<span style="color:#15C8E3 " class="status-summary-font"> Completed &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#15C8E3"><?php echo $task_status_tabs_cpount->Complete_226;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#15C8E3 "></span>
<span style="color:#15C8E3 " class="status-summary-font"> Approved &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#15C8E3"><?php echo $task_status_tabs_cpount->Approved_227;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#dd4a4a "></span>
<span style="color:#dd4a4a " class="status-summary-font"> Field Cancelled &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#dd4a4a"><?php echo $task_status_tabs_cpount->Field_Cancel_271;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#931ce7  "></span>
<span style="color:#931ce7  " class="status-summary-font"> Incomplete &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#931ce7 "><?php echo $task_status_tabs_cpount->Incomplete_272;?></span>
</div>
              </div>`;


                let infoWindow1 = document.createElement("div");
                infoWindow1.classList.add("info-window");
                
                if(person.tasks != 0){
                  // alert('Yes');
                infoWindow1.innerHTML = people_task;
                }else{
                  // alert('No');
                infoWindow1.innerHTML = people_task1;
                }

                // remove any existing info windows
                let existingInfoWindows = document.querySelectorAll(".info-window");
                existingInfoWindows.forEach((window) => {
                  window.parentNode.removeChild(window);
                });

                // append the info window to the document body
                document.body.appendChild(infoWindow1);
    //                     // create the card element
    //                     let card = document.createElement("div");
    //                     card.classList.add("card");
    //                     card.innerHTML = `<h2 style="border-bottom:1px solid #c9c1c1;">Task Assigned to <span style="color:blue;">${person.name}</span>  <a href="javascript:void(0)" onclick="removeChild_window()" class="close-btn fa fa-times"></a></h2>
    //             <p><span style="padding: 44px 112px 1px 1px;">Task Id   </span><span> Appointment</span></p>

    //   <p style="border-bottom:1px solid #c9c1c1;"><span style="padding: 44px 81px 1px 1px;">STT2050176</span><span > ${date} ${time}</span></p>
    //    <div>CS-LINK DOWN</div>
    //     <div>FSM_DEL</div>

    //     <p>Sarojini Nagara HPO ,Near police station <br>
    //        New Delhi 110023, New Delhi-  <br> 110023,Delhi...,Sarojini Nagar HP..</p>
    //       <p style="background-color: #c9c1c1;"><span style="padding: 44px 112px 1px 1px;">${person.name}</span><span style="color:green"> Approve</span></p>
    //  `;


                        // // remove previous card
                        // cardContainer.innerHTML = "";

                        // // append the card to the container
					// cardContainer.appendChild(card);
				
          if(person.emp_role == 2){
				icon='http://sify.digitalrupay.com:8080/assets/images/mark_blue.png';
			  }else{
				icon='http://sify.digitalrupay.com:8080/assets/images/mark_pink.png';
			  }

        var markerIcon1 = {
        url: icon, // Replace with the path to your normal icon
        scaledSize: new google.maps.Size(50, 50)
        };

        if(person.emp_role == 2){
			  markerIcon='http://sify.digitalrupay.com:8080/assets/images/mark_blue-ani.gif';
			  }else{
			  markerIcon='http://sify.digitalrupay.com:8080/assets/images/mark_pink-ani.gif';
			  } 

        var markerHoverIcon = {
        url: markerIcon, // Replace with the path to your hover icon
        scaledSize: new google.maps.Size(50, 50)
        };
          
          var empname=person.ename;
                var marker = new google.maps.Marker({					
                  map: map,
                  icon:markerIcon1,
                 title:empname,
                  position: new google.maps.LatLng(people[i].lat, people[i].lng)
                });

                  marker.addListener('mouseover', function() {
                marker.setIcon(markerHoverIcon);
                });
                marker.addListener('mouseout', function() {
                marker.setIcon(markerIcon1);
                });

                var bounds = new google.maps.LatLngBounds();

                bounds.extend(marker.getPosition(), 1);
                map.fitBounds(bounds);
                var content = document.createElement('div'), button;
                content.innerHTML = '<span class="bg-primary prority">'+ person.shift_name + '</span> ' + person.name + '<br/>' +
                'Employee ID:  ' + person.emp_code + '<br/>' + 'Designation: ' + person.emp_dsgn + '<br/>'
                + '<i class="fas fa-phone-alt"></i> ' + person.emp_mobile + '<br/>' + '<i class="fas fa-map-marker-alt"></i> ' + person.lat + ',' + person.lng + '<br>' + '<i class="ion ion-md-time"></i> ' + person.last_loc_date_time + '<br/>'
                ;
              button = content.appendChild(document.createElement('input'));
              button.type = 'button';
              button.value = 'Location History';
              button.style = "color: #fff; border: none!important; background: #98cc2e; margin: 4px; padding: 4px; border-radius: 3px;" 

                var infowindow = new google.maps.InfoWindow();

                // google.maps.event.addListener(marker, 'click', function () {
					if(person.emp_role == 2){
					icon='http://sify.digitalrupay.com:8080/assets/images/mark_blue.png';
					}else{
					icon='http://sify.digitalrupay.com:8080/assets/images/mark_pink.png';
					}
          
          var empname=person.ename;
                infowindow.setOptions({
                  content: content,
                  map: map,
                  icon:icon,
                  title:empname,
                  position: new google.maps.LatLng(people[i].lat, people[i].lng),
                  pixelOffset: new google.maps.Size(0, -45)
                });
                // });
                infowindow.open(map);

                google.maps.event.addDomListener(button, 'click', function () {
                  goToLocation(person);
                })
              });

              peopleList.appendChild(li);


            }
          }

          function searchNames() {
            let input = document.getElementById("searchInput");
            let filter = input.value.toUpperCase();
            let lis = peopleList.getElementsByTagName("li");
            for (let i = 0; i < lis.length; i++) {
              let name = lis[i].innerHTML.toUpperCase();
              if (name.indexOf(filter) > -1) {
                lis[i].style.display = "";
              } else {
                lis[i].style.display = "none";
              }
            }
          }

          displayPeople();

          const markers = [];

          function displayOnMap() {
            // create a marker for each person
            var currentDate = new Date();

            
            var infowindow = new google.maps.InfoWindow();
                people.forEach((person) => {
              //const person = people[i];
              console.log(person)
			  if(person.emp_role == 2){
				icon='http://sify.digitalrupay.com:8080/assets/images/mark_blue.png';
			  }else{
				icon='http://sify.digitalrupay.com:8080/assets/images/mark_pink.png';
			  }

        var markerIcon1 = {
        url: icon, // Replace with the path to your normal icon
        scaledSize: new google.maps.Size(50, 50)
        };

        if(person.emp_role == 2){
			  markerIcon='http://sify.digitalrupay.com:8080/assets/images/mark_blue-ani.gif';
			  }else{
			  markerIcon='http://sify.digitalrupay.com:8080/assets/images/mark_pink-ani.gif';
			  } 

        var markerHoverIcon = {
        url: markerIcon, // Replace with the path to your hover icon
        scaledSize: new google.maps.Size(50, 50)
        };

        var empname=person.ename;
              var marker = new google.maps.Marker({
                map: map,
                icon:markerIcon1,
                title:empname,
                position: new google.maps.LatLng(person.lat, person.lng)
              });

              marker.addListener('mouseover', function() {
              marker.setIcon(markerHoverIcon);
              });
              marker.addListener('mouseout', function() {
              marker.setIcon(markerIcon1);
              });

              var content = document.createElement('div'), button;
              content.innerHTML = '<span class="bg-primary prority">'+ person.shift_name + '</span> ' + person.name + '<br/>' +
                'Employee ID:  ' + person.emp_code + '<br/>' + 'Designation: ' + person.emp_dsgn + '<br/>'
                + '<i class="fas fa-phone-alt"></i> ' + person.emp_mobile + '<br/>' + '<i class="fas fa-map-marker-alt"></i> ' + person.lat + ',' + person.lng + ' <i class="typcn typcn-th-menu"></i> <br/>' + '<i class="ion ion-md-time"></i> '+ person.last_loc_date_time  + '<br/>'
                ;
              button = content.appendChild(document.createElement('input'));
              button.type = 'button';
              button.value = 'Location History';
              button.style = "color: #fff; border: none!important; background: #98cc2e; margin: 4px; padding: 4px; border-radius: 3px;"


              google.maps.event.addListener(marker, 'click', function (marker, i) {

                infowindow.setOptions({
                  content: content,
                  map: map,
                  position: new google.maps.LatLng(person.lat, person.lng),
                  pixelOffset: new google.maps.Size(0, -45)
                });
                infowindow.open(map);
              });

              google.maps.event.addDomListener(button, 'click', function () {
            livetrck.style.display = 'none'; // hide current div
                goToLocation(person);
              })

            });
          }

          function goToLocation(per) {
            // console.log(per);
            const playPerson = per
            const livetrck = document.querySelector('#livetrck');
            const playback = document.querySelector('#playback');
            livetrck.style.display = 'none'; // hide current div
            playback.style.display = 'block'; // show new div 
			location.href="<?php echo site_url(); ?>Monitor/monitor_view/"+playPerson.emp_id;
            gotosecond(per)
          }
        </script> 
        </div>
      </div>
      <div class="row d-none" id="playback"> 
        <!-- <div>{{playPerson}}</div> -->
        
      </div>
    </div>
    <!-- container-fluid --> 
  </div>
</div>
<div class="rightbar-overlay"></div>

<!-- Gmaps file --> 
<script src="assets/libs/gmaps/gmaps.min.js"></script> 
<script>

  function get_tasks_list(emp_id,t_count){
      $.ajax({
      type: "post",
      url:"<?php echo site_url(); ?>Monitor/get_monitor_tasks_list_ajax",
      data:{"emp_id":emp_id },
      success:function(result)
      {
        var jsondata=JSON.parse(result); 
          if(t_count == 0){
            $('#monitor_status_count_list').html(jsondata['monitor_status_list_ajax_div']);
          }else{
          $('#monitor_tasks_list').html(jsondata['monitor_tasks_list_ajax_div']);
          }
      }
      });
  }
  
  
  setTimeout(function(){	
  initMap(1);
  
  },1000);
  
  
  
  function removeChild_window() {
let existingInfoWindows = document.querySelectorAll(".info-window");
existingInfoWindows.forEach((window) => {
window.parentNode.removeChild(window);
});

}
</script>