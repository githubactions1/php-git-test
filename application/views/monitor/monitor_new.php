
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

.popover > .arrow:after {
    border-width: 10px;
    content: "";
}
</style>
  <div class="main-content-scroll-dash">
    <div class="page-content">
    
      <div class="row d-none" id="livetrck">
	  
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
                  <div class="col-md-12">
                <form action="" method="post">
                <div class="mb-1">
                  <div class="input-group">
                   <input type="date" class="form-control" name="frmdate" <?php if(isset($frmdate) && $frmdate!=''){?> value="<?php echo $frmdate;?>" <?php } ?> >
                   <input type="date" class="form-control" name="todate" <?php if(isset($todate) && $todate!=''){?> value="<?php echo $todate;?>" <?php } ?> >
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button> </div>
                </div>
                </form>
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
                    
					
					 <li class="timeline-inverted active-line highlight_div2">
                      <div class="timeline-date-left text-inverse font-size-16">
                        <div class="font-size-14"  title="<?php echo date('d-M-Y',strtotime($moitor_details->tl_date_created));?>" ><i class="ion ion-md-time"></i> <?php echo date('H:i:A',strtotime($moitor_details->tl_date_created));?></div>
                      </div>
                      <div class="timeline-badge info icon-color icon-moving highlight_div1"> <em class="fa <?php if($key >= 0) { echo "fa-check"; } ?> font-size-10 highlight_div"></em> </div>
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
				  <h5 class="text-center  text-danger" >Location Not Available</h5>
                  <?php }   ?>
                    
                  </ul>
                </div>
				
				
              </div>
            </div>
          </div>
        </div>
		
		
<?php
	$gpsTrack='';
	$id=1;
	foreach($moitorempdetails as $key => $resEMP)
	{
		$gpsLat=$resEMP->task_log_lat;
		$gpsLang=$resEMP->task_log_long;
		$service_no=$resEMP->service_no;
		$task_status_name=$resEMP->task_status_name;
		$locDate=date("d-m-Y h:i:s A",strtotime($resEMP->tl_date_created));
		$locName='';
		$empName=$resEMP->name;
		$latPos='lat:'."$gpsLat";
		$lngPos='lng:'."$gpsLang";
		//$title='title:'."'$locDate'";
		$desc='title:'.'"Status : '.$task_status_name.' <br> Task Id : '.$service_no.'<br> Date & Time : '.$locDate.'<br>'.$locName.'"';
		$icon='"icon":'."'http://sify.digitalrupay.com:8080/assets/images/travel.png'";
		$gpsTrack.='{'.$latPos.",".$lngPos.",".$desc.'},';
		$lastGpLat=$gpsLat;
		$lastGpLang=$gpsLang;
		$id=$id+1;
	}
?>
<?php 	//echo '<pre>';print_r($gpsTrack);exit;
 ?>
        <div class="col-md-9">
          
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAZQKuLhE2KG_ZXIY7bydMgFdcTt_jsNwE&sensor=false" type="text/javascript"></script>
<div id="map"  style="height: 100%; width:100%;"></div>
<script type="text/javascript">
    var coordinates = [<?php echo $gpsTrack; ?>];
  
  
  
  const titles = coordinates.map(coord => `${coord.title}`);

  let map, polyline, markers = [], infoBox;

  function initializeMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: coordinates[0],
      zoom: 16,
    });

    infoBox = new google.maps.InfoWindow();

    animatePolyline(0);
  }
	
	
	
  function animatePolyline(index) {
    if (index >= coordinates.length) {
      return;
    }
	
	var lastindex=coordinates.length-1; 
		if(index == 0){
		var icon1= "http://sify.digitalrupay.com:8080/assets/images/start_marker.png";
		}else if(lastindex == index){
		var icon1= "http://sify.digitalrupay.com:8080/assets/images/end_marker.png";
		}else{
		var icon1= "http://sify.digitalrupay.com:8080/assets/images/travel.png";
		}
		
    const currentCoordinate = coordinates[index];

    const marker = new google.maps.Marker({
      position: currentCoordinate,
      map: map,
      title: titles[index],
      icon: icon1,
    });

    google.maps.event.addListener(marker, 'click', () => {
      infoBox.setContent(titles[index]);
      infoBox.open(map, marker);
    });

    markers.push(marker);

    if (polyline) {
      polyline.setMap(null); // Remove the previous segment
    }

    polyline = new google.maps.Polyline({
      path: coordinates.slice(0, index + 1),
      geodesic: true,
      strokeColor: '#23bd8f',
      strokeOpacity: 1,
      strokeWeight: 2,
      map: map,
      icon: icon1,
    });

    map.panTo(currentCoordinate);

    setTimeout(() => {
      animatePolyline(index + 1);
    }, 2000); // Adjust the interval (in milliseconds) between each step
  }
  
  google.maps.event.addDomListener(window, 'load', initializeMap);

</script>
        </div>
     
      </div>
    </div>
    <!-- container-fluid --> 
  </div>
  <script>
function removeChild_window() {
let existingInfoWindows = document.querySelectorAll(".info-window");
existingInfoWindows.forEach((window) => {
window.parentNode.removeChild(window);
});

}

</script>