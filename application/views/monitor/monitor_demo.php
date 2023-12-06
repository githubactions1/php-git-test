
<style>
.uat {
    position: absolute;
    z-index: 999;
    left: 385px;
    width: 250px;
    background: #fff;
    padding: 10px;
    border-radius: 10px;
    overflow-y: auto;
    top: 10px;
}

.info-window {
    position: absolute;
    left: 385px;
    top: 10px;
    width: 300px;
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, .2);
    max-height: 337px;
    overflow: auto;
    border-radius: 10px;
    z-index: 999;
}


.close-btn {
  position: absolute;
  top:3px;
  right: 8px;
}
.timeline-inverted .icon-moving {
    background-color: #23bd8f !important;
    color: #FFF !important;
}
.timeline-inverted .icon-color {
    background-color: #999 !important;
    color: #FFF !important;
}

.active-line.timeline-inverted:after {
    border-right: 3px solid #23bd8f;
}
.active-line.timeline-inverted:before {
    border-right: 3px solid #23bd8f;
}

.timeline:before, .timeline-alt:before {
    position: absolute;
    top: 0;
    bottom: 0;
    content: " ";
    width: 1px;
    background-color: transparent;
    left: 18px;
    height: 95%;
}
.timeline:before {
    left: 69px;
    margin-left: 22px;
}

.popover > .arrow, .popover > .arrow:after {
    position: absolute;
    display: block;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
}

.timeline .popover.right > .arrow:after, .timeline-alt .popover.right > .arrow:after {
    border-right-color: #fff;
}
.popover > .arrow:after {
    border-width: 10px;
    content: "";
}
</style>
  <div class="main-content-scroll-dash">
    <div class="page-content">
    
      <div class="row d-none" id="livetrck">
	   <script>(g => { var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window; b = b[c] || (b[c] = {}); var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => { await (a = m.createElement("script")); e.set("libraries", [...r] + ""); for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]); e.set("callback", c + ".maps." + q); a.src = `https://maps.${c}apis.com/maps/api/js?` + e; d[q] = f; a.onerror = () => h = n(Error(p + " could not load.")); a.nonce = m.querySelector("script[nonce]")?.nonce || ""; m.head.append(a) })); d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)) })
          ({ key: "AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI", v: "weekly" });</script> 
         
	  </div><?php $total_distance=0;?>
        <div class="row" id="playback"> 
        <!-- <div>{{playPerson}}</div> -->
		<div class="col-md-3 col-sm-12">
		<div class="time-line-container">
         <div class="panel">
              <div class="panel-body">
                <div class="heading-container"> 
              
                  <div class="row">
                    <div class="col-md-8">
                      <h4>Location History</h4>
                    </div>
                    <div class="col-md-4 back"> <a href="<?php echo base_url();?>Monitor" class="back-btn" id="locationBackBtn">Back</a> </div>
                  </div>
                </div>
              
<div class="row uat">
<div class="statuses-summary" id="765"> 
<span class="fa fa-circle " style="color:#4d6071 "></span>
<span style="color:#4d6071 " class="status-summary-font"> Assigned &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#4d6071"><?php echo $task_status_tabs_cpount->Assigned_218;?>  </span>
</div>


<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#5095d3 "></span>
<span style="color:#5095d3 " class="status-summary-font"> Acknowledged &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#5095d3"><?php echo $task_status_tabs_cpount->Acknowledged_219;?></span>
</div>


<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#d7c316 "></span>
<span style="color:#d7c316 " class="status-summary-font"> Travel &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#d7c316"><?php echo $task_status_tabs_cpount->Travel_220;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#ff8a00 "></span>
<span style="color:#ff8a00 " class="status-summary-font"> Onsite - Waiting for Access &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#ff8a00"><?php echo $task_status_tabs_cpount->Onsite_Waiting_for_Access_221;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#9ada1d "></span>
<span style="color:#9ada1d " class="status-summary-font"> Access Available - WIP &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#9ada1d"><?php echo $task_status_tabs_cpount->Access_Available_WIP_222;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:##f36666 "></span>
<span style="color:##f36666 " class="status-summary-font"> UAT &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:##f36666"><?php echo $task_status_tabs_cpount->UAT_223;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#1d6dda "></span>
<span style="color:#1d6dda " class="status-summary-font"> Checklist Submited &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#1d6dda"><?php echo $task_status_tabs_cpount->Checklist_Submited_224;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#f36666 "></span>
<span style="color:#f36666 " class="status-summary-font"> UAT-Success &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#f36666"><?php echo $task_status_tabs_cpount->UAT_Accepted_225;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#00c0ff"></span>
<span style="color:#00c0ff" class="status-summary-font"> Completed &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#00c0ff"><?php echo $task_status_tabs_cpount->Complete_226;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#1fceab"></span>
<span style="color:#1fceab" class="status-summary-font"> Approved &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#1fceab"><?php echo $task_status_tabs_cpount->Approved_227;?></span>
</div>

<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#f36666"></span>
<span style="color:#f36666" class="status-summary-font"> Field Cancelled &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#f36666"><?php echo $task_status_tabs_cpount->Field_Cancel_271;?></span>
</div>


<div class="statuses-summary" id="765">
<span class="fa fa-circle " style="color:#931ce7"></span>
<span style="color:#931ce7" class="status-summary-font"> Incomplete &nbsp;- &nbsp;</span> 
<span style="display:inline-block;position: absolute;color:#931ce7"><?php echo $task_status_tabs_cpount->Incomplete_272;?></span>
</div>
</div>
<?php if(!empty($emplyee_gps_tasks)) { ?>
<div class="row info-window">
<h2 style="padding-bottom: 5px; margin-bottom: 5px; border-bottom:1px solid #c9c1c1; font-size: 15px;"><?php echo count($emplyee_gps_tasks);?> Task Assigned to <span style="color:blue;"><?php echo $emplyee_gps_tasks[0]->call_attend_by_name;?></span> &nbsp <a href="javascript:void(0)" onclick="removeChild_window()" class="close-btn fa fa-times"></a></h2> 
<?php if(!empty($emplyee_gps_tasks)) { 
    foreach($emplyee_gps_tasks as $emplyee_gps)
    {
    ?>
<p><span class="bg-primary prority"><?php echo $emplyee_gps->task_priority;?></span>Task Id</span> <span class="appnt"> Appointment</span></p>
<p style="margin-bottom: 5px;"><span><strong><?php echo $emplyee_gps->service_no;?></strong></span><span class="appnt"> <?php echo $emplyee_gps->task_appointment_date;?></span></p>

<div><?php echo $emplyee_gps->task_other_issue;?></div>
<div><?php echo $emplyee_gps->cluster_name;?></div>


<div class="font-size-11 text-bold white-space-wrap-default-width" title="<?php echo $emplyee_gps->taskAddress?>"><?php echo $emplyee_gps->taskAddress?>
</div>
<table class="cts bg-light">
					<tr class="ord">
					<?php 
					$emp_list=explode(',',$emplyee_gps->call_attended_name);
					$sub_task_status_names=explode(',',$emplyee_gps->sub_task_status_name);
					 
					if(!empty($emp_list)){
					foreach($emp_list as $key=>$call_attended_name){ ?>
					<tr class="ord">
					<td> <?php echo $call_attended_name;?> <?php if($call_attended_name == $emplyee_gps->primary_name) { echo '*'; }?></td>
					<td><strong>
					<?php echo $sub_task_status_names[$key];?></strong> 
					</td>
					</tr>
					<?php } } ?>
					</tr>


					</table>
<hr>
<?php } } ?>
     
</div><?php } ?>
              
              
               <ul id="personList" class="emp-heading-container mb-1"><li style="line-height: 1rem;"><div style="color: white; font-size: 20px; padding: 2px; font-size: 20px; font-weight: bold;"><strong><?php echo $moitorempdetails[0]->name?></strong></div> <p>Emp Id - <?php echo $moitorempdetails[0]->emp_code?><span class="appnt"><?php echo $moitorempdetails[0]->total_tasks_count?> Tasks Assigned </span></p></li></ul>
			   
			      <div class="row">
                  <div class="col-md-8">
                <form action="" method="post">
                <div class="mb-1">
                  <div class="input-group">
                   <input type="date" class="form-control" name="frmdate" <?php if(isset($frmdate) && $frmdate!=''){?> value="<?php echo $frmdate;?>" <?php } ?> >
                   <input type="date" class="form-control" name="todate" <?php if(isset($todate) && $todate!=''){?> value="<?php echo $todate;?>" <?php } ?> >
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button> </div>
                </div>
                </form>
                  </div>
                  <div class="col-md-4">
                <div class="media-icons">	
                      <div id="prevAction" onclick="startpAutoScroll()"><i class="fa fa-chevron-circle-left mr-2" aria-hidden="true"></i></div>
                      <div id="playAction" class="playAction" style="display: none;" onclick="startpAutoScroll()"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                      <div id="pauseAction" style="display: block;" onclick="stopAutoScroll()"><i class="fa fa-pause-circle" aria-hidden="true"></i></div>
                      <div id="nextAction" onclick="startpAutoScroll()"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></div>
                    </div>
                    </div>
                    </div>
				<?php
					if(!empty($moitorempdetails)){
					foreach($moitorempdetails as $moitor_details)
					{
					$total_distance =$total_distance+$moitor_details->total_distance;
					
					}} 
					?>
				<div class="display-day-container clear text-center">
				<h3 class="text-left-with-margin location-history-date-separator" id="selectTimelineDay"><?php if(isset($frmdate) && $frmdate!=''){ echo date('d-M-Y',strtotime($frmdate));} ?> to <?php if(isset($todate) && $todate!=''){ echo date('d-M-Y',strtotime($todate));} ?></h3>
				<h6 class="text-left-with-margin col-xs-12 no-padding"> <span class="text-bold">Total distance :</span> <span class="text-bold" id="totalDistanceTraveled"><?php echo $total_distance;?> km</span> </h6>
				</div>
				
				
				 <!--<div class="timeline">
					<?php
					if(!empty($moitorempdetails)){
					foreach($moitorempdetails as $moitor_details)
					{
					?>
                  <div class="timeline-item">
                    <div class="timeline-content">
                      <h2 class="timeline-title"><?php echo $moitor_details->service_no;?></h2>
                      <p class="timeline-text" style="color: #b12525;"><?php echo $moitor_details->task_status_name;?></p>
                    </div>
                    <div class="timeline-track">
                      <h3><i class="ion ion-md-time"></i> <?php echo date('H:i:A',strtotime($moitor_details->tl_date_created));?></h3>
                      <h6> <?php echo date('d-M-Y',strtotime($moitor_details->tl_date_created));?></h6>
                    </div>
                  </div>
                  <?php } } ?>
                </div>-->
                   
                 
             
                <div class="time-line-container clear" id="listContainer">
                  <ul class="timeline pb0" id="myList" >
				  <?php
					if(!empty($moitorempdetails)){
					foreach($moitorempdetails as $key=>$moitor_details)
					{
					?>
                    
					
					 <li class="timeline-inverted highlight_div2">
                      <div class="timeline-date-left text-inverse font-size-16">
                        <div class="font-size-14"  title="<?php echo date('d-M-Y',strtotime($moitor_details->tl_date_created));?>" ><i class="ion ion-md-time"></i> <?php echo date('H:i:A',strtotime($moitor_details->tl_date_created));?></div>
                      </div>
                      <div class="timeline-badge info icon-color highlight_div1"> <em class="fa <?php if($key == 0) { echo "fa-check"; } ?> font-size-10 highlight_div"></em> </div>
                      <div class="timeline-panel">
                        <div class="popover right">
                          <div class="arrow"></div>
                          <div class="popover-content p0">
                            <div class="table-grid table-grid-align-middle">
                              <div class="col col-sm p">
                                <div class="col-lg-12 pr0 pl0 text-inverse font-size-12"> <span><b><?php echo $moitor_details->service_no;?></b></span> <br> <span class="" style="color:<?php echo $moitor_details->status_colour_code;?>;<?php if($moitor_details->task_status_id == '221'){ ?>font-size: 11px;<?php } ?>" ><?php if($moitor_details->task_status_name == 'Travel'){ ?><i class="fa fa-bus"></i><?php } ?><?php echo $moitor_details->task_status_name;?></span> <span class="pull-right">
								<?php if($moitor_details->task_status_name == 'Travel'){ ?>
								<img class="idle-source-type-static" src="<?php echo site_url(); ?>assets/images/gps_available.png" alt="" title="GPS" >
								<?php }else { ?>
								<img class="idle-source-type-static" src="<?php echo site_url(); ?>assets/images/network-location.png" alt="" title="Network Location" >
								<?php } ?>
								
								</span></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php } }else{  ?>
				  <h5 class="text-center" >Location Not Available</h5>
                  <?php }   ?>
                    
                  </ul>
                </div>
				
				
              </div>
            </div>
          </div>
        </div>
		
		
<?php
	$gpsTrack='';
	$gpsTrack1='';
	$id=1;
	foreach($moitorempdetails as $key=> $resEMP)
	{
		$key1=$key;
		$gpsLat=$resEMP->task_log_lat;
		$gpsLang=$resEMP->task_log_long;
		$service_no=$resEMP->service_no;
		$locDate=date("d-m-Y h:i:s A",strtotime($resEMP->tl_date_created));
		$locName='';
		$empName=$resEMP->name;
		$latPos='lat:'."$gpsLat";
		$lngPos='lng:'."$gpsLang";
		$desc=''.'No'.$key1.' & '.$locDate.'';
		$title="title: '".$desc."'";
		$icon='"icon":'."'http://sify.digitalrupay.com:8080/assets/images/travel.png'";
		$gpsTrack.='{'.$title.",".$latPos.",".$lngPos.",".$icon.",".$desc.'},';
	
		$gpsTrack1.='{'.$latPos.",".$lngPos.",".$title.'},';

		$lastGpLat=$gpsLat;
		$lastGpLang=$gpsLang;
		$id=$id+1;
	}
	
	
	
		// echo '<pre>';print_r($gpsTrack1);exit;

?>


        <div class="col-md-9">
          
<!--<script src="https://maps.google.com/maps/api/js?key=AIzaSyAqQWGy7yl4hgFiEOyN4Ec5ohsDLe7T7zM&sensor=false" type="text/javascript"></script> -->
<div id="map"  style="height: 100%; width:100%;"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&callback=initMap" async defer></script> 
<script>
function removeChild_window() {
let existingInfoWindows = document.querySelectorAll(".info-window");
existingInfoWindows.forEach((window) => {
window.parentNode.removeChild(window);
});

}
	 
// Global variables
var map;
var linePath;
var markers = [];
var markerIndex = 0;
var animationTimeout ;
var lineCoordinates = [<?php echo $gpsTrack1;?>];

// Initialize the map
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 9,
    center: lineCoordinates[0],
  });

  // Start animating the line
  animateLine();
}

// Animate the line and show markers at each coordinate
function animateLine() {
  if (markerIndex >= lineCoordinates.length) {
    return; // Stop animating when reaching the end
  }

  var nextCoordinate = lineCoordinates[markerIndex];
	var lastindex=lineCoordinates.length-1; 
  if(markerIndex == 1){
	var icon1= "http://sify.digitalrupay.com:8080/assets/images/idel.png";
	}else if(lastindex == markerIndex){
	var icon1= "http://sify.digitalrupay.com:8080/assets/images/idel.png";
	}else{
	var icon1= "http://sify.digitalrupay.com:8080/assets/images/travel.png";
	}
  // Create a marker
  var marker = new google.maps.Marker({
    position: nextCoordinate,
    map: null, // Initially hide the marker
    title: nextCoordinate.title,
	icon: icon1,
	
  });

  markers.push(marker);
	map.setZoom(19);
  // Show the marker
  setTimeout(function () {
    marker.setMap(map);
	map.setZoom(22);
  }, 2000); // Adjust the duration as needed

  // Move to the next coordinate and smoothly pan the map
  markerIndex++;
  map.panTo(nextCoordinate);

  // Create a polyline segment
  var segmentCoordinates = lineCoordinates.slice(0, markerIndex);
  if (linePath) {
    linePath.setMap(null); // Hide the existing polyline
  }
  
  if(markerIndex == 1){
	var icon1= "http://sify.digitalrupay.com:8080/assets/images/idel.png";
	}else if(lastindex == markerIndex){
	var icon1= "http://sify.digitalrupay.com:8080/assets/images/idel.png";
	}else{
	var icon1= "http://sify.digitalrupay.com:8080/assets/images/travel.png";
	}
  linePath = new google.maps.Polyline({
    path: segmentCoordinates,
    geodesic: true,
    strokeColor: '#23bd8f',
    strokeOpacity: 1.0,
    strokeWeight: 3,
    title: nextCoordinate.title,
	icon:icon1,
    map: map,
  });

		// Smoothly animate the line movement
		var animationSpeed = 20000; // Adjust this value to control the speed (in milliseconds)
		var numSteps = 5; 
  //animationTimeout=setTimeout(animateLine, 3000); // Adjust the duration as needed
  animationTimeout=setTimeout(animateLine, animationSpeed / numSteps); // Adjust the duration as needed
  
  
}

	  // Stop the polyline animation
	function stopPolyline() {
		console.log('stop');
	clearTimeout(animationTimeout);
	}

	// Stop the polyline animation
	function startPolyline() {
		console.log('start');
		animateLine();
	}
	
	  
	  window.onload = function() {
  initMap();
};

	  





var myList = document.getElementById("myList");
    var lis = myList.getElementsByTagName("li");
	var divs = document.getElementsByClassName('highlight_div');
	var divs1 = document.getElementsByClassName('highlight_div1');
	var divs2 = document.getElementsByClassName('highlight_div2');
    var currentIndex = 0;

    // Initially highlight the first li tag
    //lis[currentIndex].classList.add("highlighted");
		  divs1[currentIndex].classList.add('icon-moving');
		  divs[currentIndex].classList.add('fa-check');
		  divs2[currentIndex].classList.add('active-line');

    function scrollToNextLi() {
      // Remove the current highlight
      //lis[currentIndex].classList.remove("highlighted");
		divs1[currentIndex].classList.remove('icon-color');	

      // Calculate the center line position of the viewport
      var viewportCenter = myList.offsetHeight / 2;

      // Get the bounding rectangle of the current li
      var rect = lis[currentIndex].getBoundingClientRect();

      // Calculate the center line position of the current li
      var liCenter = rect.top + rect.height / 2;

      // Scroll to the next li if it's below the center line
      if (liCenter > viewportCenter) {
        currentIndex++;
      }

      // Highlight the next li
      if (currentIndex < lis.length) {
       // lis[currentIndex].classList.add("highlighted");
		  divs1[currentIndex].classList.add('icon-moving');
		  divs[currentIndex].classList.add('fa-check');
		  divs2[currentIndex].classList.add('active-line')

        // Calculate the target scroll position for the highlighted li
        var targetScrollTop = myList.scrollTop + lis[currentIndex].getBoundingClientRect().top - myList.getBoundingClientRect().top - (myList.offsetHeight / 2) + (lis[currentIndex].offsetHeight / 2);

        // Smooth scroll to the target position
        scrollToSmoothly(targetScrollTop, 1000); // Adjust the duration (in milliseconds) for desired scroll speed
      }
    }

    // Call the scrollToNextLi function repeatedly
    var intervalId = setInterval(scrollToNextLi, 1000);

    // Stop the auto-scrolling when the user interacts with the page
   
    // Helper function for smooth scrolling
    function scrollToSmoothly(scrollTop, duration) {
      var start = myList.scrollTop;
      var currentTime = 0;
      var increment = 25;

      function animateScroll() {
        currentTime += increment;
        var easing = Math.easeInOutQuad(currentTime, start, scrollTop - start, duration);
        myList.scrollTop = easing;
        if (currentTime < duration) {
          setTimeout(animateScroll, increment);
        }
      }

      animateScroll();
    }

    // Easing function for smooth scrolling
    // Math.easeInOutQuad = function (t, b, c, d) {
      // t /= d / 2;
      // if (t < 1) return c / 2 * t * t + b;
      // t--;
      // return -c / 2 * (t * (t - 2) - 1) + b;
    // };

    function stopAutoScroll() {
	clearInterval(animationTimeout);	
      clearInterval(intervalId); // Clear the auto scroll interval
	  $("#playAction").show();
	  $("#pauseAction").hide();
    }
	
    function startpAutoScroll() {
		animateLine();
      setInterval(scrollToNextLi, 1000); // Clear the auto scroll interval
	  $("#playAction").hide();
	  $("#pauseAction").show();
    }
	
	
	
	  </script>
        </div>
     
      </div>
    </div>
    <!-- container-fluid --> 
  </div>