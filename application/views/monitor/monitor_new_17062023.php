
<style>


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
              
              
              
               <ul id="personList" class="emp-heading-container mb-1"><li style="line-height: 1rem;"><div style="color: white; font-size: 20px; padding: 2px; font-size: 20px; font-weight: bold;"><strong><?php echo $moitorempdetails[0]->name?></strong></div> <p>Emp Id - <?php echo $moitorempdetails[0]->emp_code?><span class="appnt"><?php echo $moitorempdetails[0]->total_tasks_count?> Tasks Assigned </span></p></li></ul>
			   
			   
                <form action="" method="post">
                <div class="mb-1">
                  <div class="input-group">
                   <input type="date" class="form-control" name="frmdate" <?php if(isset($frmdate) && $frmdate!=''){?> value="<?php echo $frmdate;?>" <?php } ?> >
                   <input type="date" class="form-control" name="todate" <?php if(isset($todate) && $todate!=''){?> value="<?php echo $todate;?>" <?php } ?> >
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button> </div>
                </div>
                </form>
               
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
				
               
                <div class="time-line-container clear">
                  <ul class="timeline pb0">
				  <?php
					if(!empty($moitorempdetails)){
					foreach($moitorempdetails as $moitor_details)
					{
					?>
                    
					
					 <li class="timeline-inverted active-line">
                      <div class="timeline-date-left text-inverse font-size-16">
                        <div class="font-size-14"  title="<?php echo date('d-M-Y',strtotime($moitor_details->tl_date_created));?>" ><i class="ion ion-md-time"></i> <?php echo date('H:i:A',strtotime($moitor_details->tl_date_created));?></div>
                      </div>
                      <div class="timeline-badge info icon-color icon-moving"> <em class="fa fa-check font-size-10"></em> </div>
                      <div class="timeline-panel">
                        <div class="popover right highlight-timeiline-popover">
                          <div class="arrow"></div>
                          <div class="popover-content p0">
                            <div class="table-grid table-grid-align-middle">
                              <div class="col col-sm p">
                                <div class="col-lg-12 pr0 pl0 text-inverse font-size-12"> <span class="traveling-status"><i class="fa fa-bus"></i> <?php echo $moitor_details->task_status_name;?></span> <span class="pull-right"><img class="idle-source-type-static" src="<?php echo site_url(); ?>assets/images/gps_available.png" alt="" title="GPS" ></span></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php } } ?>
                    
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
		$locDate=date("d-m-Y h:i:s A",strtotime($resEMP->tl_date_created));
		$locName='';
		$empName=$resEMP->name;
		$latPos='"lat":'."'$gpsLat'";
		$lngPos='"lng":'."'$gpsLang'";
		$title='"title": "Date & Time : '.$locDate.'"';
		$desc='"description":'.'"Location : '.$id.' <br> Task Id : '.$service_no.'<br> Date & Time : '.$locDate.'<br>'.$locName.'"';
		$icon='"icon":'."'http://sify.digitalrupay.com:8080/assets/images/travel.png'";
		$gpsTrack.='{'.$title.",".$latPos.",".$lngPos.",".$icon.",".$desc.'},';
		$lastGpLat=$gpsLat;
		$lastGpLang=$gpsLang;
		$id=$id+1;
	}
?>
        <div class="col-md-9">
          
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&sensor=false" type="text/javascript"></script>
<!--<script src="https://maps.google.com/maps/api/js?key=AIzaSyAqQWGy7yl4hgFiEOyN4Ec5ohsDLe7T7zM&sensor=false" type="text/javascript"></script> -->
<div id="dvMap"  style="height: 100%; width:100%;"></div>
<script type="text/javascript">
    var markers = [<?php echo rtrim($gpsTrack,","); ?>];
    window.onload = function () {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 11,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var lat_lng = new Array();
        var latlngbounds = new google.maps.LatLngBounds();
        for (i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            lat_lng.push(myLatlng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title,
                icon:data.icon
            });
            latlngbounds.extend(marker.position);
            
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);
            if(data.icon=='http://sify.digitalrupay.com:8080/assets/images/travel.png'){
            	infoWindow.setContent(data.description);
                infoWindow.open(map, marker);
            }
        }
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
        //***********ROUTING****************//
        //Initialize the Path Array
        var path = new google.maps.MVCArray();
 
        //Initialize the Direction Service
        var service = new google.maps.DirectionsService();
 
        //Set the Path Stroke Color
        var poly = new google.maps.Polyline({ map: map, strokeColor: '#23bd8f' });
 
        //Loop and Draw Path Route between the Points on MAP
        for (var i = 0; i < lat_lng.length; i++) {
            if ((i) < lat_lng.length) {
                var src = lat_lng[i];
                var des = lat_lng[i-1];
                if(des){
                path.push(src);
                poly.setPath(path);
                service.route({
                    origin: src,
                    destination: des,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                }, function (result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                            path.push(result.routes[0].overview_path[i]);
                        }
                    }
                });
            }
            }
        }
    }
</script>
        </div>
     
      </div>
    </div>
    <!-- container-fluid --> 
  </div>