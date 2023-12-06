
<style>

.timeline-track {
  width: 100%;
  position: absolute;
  right: 90px;
  top: 0px;
}
.timeline-track h3 {
  font-size: 14px;
}

.timeline-item {
    margin-bottom: 0px;
    padding: 0 0 20px 0;
    position: relative;
    border-left: 2px dotted #ccc;
}

.timeline {
    position: relative;
    margin: 20px 0 0 0;
    padding: 0;
    list-style-type: none;
    padding-bottom: 1.5rem;
    /* border-left: 2px dotted #ccc; */
    padding-left: 90px;
    margin-left: 10px;
    list-style: none;
}


</style>
<div class="main-content">
    <div class="page-content">
    
      <div class="row d-none" id="livetrck">
	   <script>(g => { var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window; b = b[c] || (b[c] = {}); var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => { await (a = m.createElement("script")); e.set("libraries", [...r] + ""); for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]); e.set("callback", c + ".maps." + q); a.src = `https://maps.${c}apis.com/maps/api/js?` + e; d[q] = f; a.onerror = () => h = n(Error(p + " could not load.")); a.nonce = m.querySelector("script[nonce]")?.nonce || ""; m.head.append(a) })); d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)) })
          ({ key: "AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI", v: "weekly" });</script> 
         
	  </div>
        <div class="row" id="playback"> 
        <!-- <div>{{playPerson}}</div> -->
        <div class="col-md-4 col-sm-12">
          <div id="sidebar">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <h5 class="loc">Location History</h5>
                  </div>
                  <div class="col-md-4 back"> <a href="<?php echo base_url();?>Monitor" class="btn btn-success text-right"><i class="fa fa-arrow-left"></i> Back</a> </div>
                </div>
                <ul id="personList" style="background: #4897b7; color: #fff;">
                </ul>
                <div class="mb-3">
                  <div class="input-group">
                   <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d');?>"  >
                    <a href="javascript:void(0)" class="input-group-text"><i class="fa fa-search"></i></a> </div>
                </div>
                <div class="loc_date">
                  <p><strong><?php echo date('d');?>,<?php echo date('M');?>,<?php echo date('Y');?></strong> </p>
                  <hr>
                  <p>Total distance : 26.42 km</p>
                </div>
                <div class="timeline">
					<?php
					if(!empty($moitorempdetails)){
					foreach($moitorempdetails as $moitor_details)
					{
					?>
                  <div class="timeline-item">
                    <div class="timeline-content">
                      <div class="count"><i class="fa fa-podcast text-success"></i></div>
                      <h2 class="timeline-title"><?php echo $moitor_details->service_no;?></h2>
                      <p class="timeline-text" style="color: #b12525;"><?php echo $moitor_details->task_status_name;?></p>
                    </div>
                    <div class="timeline-track">
                      <h3><i class="ion ion-md-time"></i> <?php echo date('H:i:A',strtotime($moitor_details->tl_date_created));?></h3>
                    </div>
                  </div>
                  <?php } } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div id="map2" style="height: 20%; width:100%;"></div>
        </div>
        <script>
      let map2;

      async function initMap2() {
        //@ts-ignore
        const { Map } = await google.maps.importLibrary("maps");

        map2 = new Map(document.getElementById("map2"), {
          center: { lat: <?php echo $moitorempdetails[0]->task_log_lat;?>, lng: <?php echo $moitorempdetails[0]->task_log_long;?> },
          zoom: 7,
        });
        displayPlayback();
      }

      initMap2();
      function displayPlayback() {
        const playbackPath = [
		<?php
		if(!empty($moitorempdetails)){
		foreach($moitorempdetails as $moitor_details)
		{
			$gps_lat=$moitor_details->task_log_lat;
			$gps_long=$moitor_details->task_log_long;
		?>
		{
		//"place": "Hyderabad",
		"lat": <?php echo $gps_lat;?>,
		"lng": <?php echo $gps_long;?>
		},
		<?php } } ?>
];
 for (let i = 0; i < playbackPath.length; i++) {
          
            var marker = new google.maps.Marker({
              map: map2,
              position: new google.maps.LatLng(playbackPath[i].lat, playbackPath[i].lng)
            });
			}

        const playbackLine = new google.maps.Polyline({
          path: playbackPath,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        playbackLine.setMap(map2);

      }
      const toggleBtn = document.querySelector('#toggleBtn');
      const playback = document.querySelector('#playback');
      const livetrck = document.querySelector('#livetrck');

      toggleBtn.addEventListener('click', () => {
        playback.style.display = 'none'; // hide current div
        livetrck.style.display = 'block'; // show new div
      });

      function gotosecond(per) {
        const playPerson = per;
        const personList = document.querySelector("#personList");
        personList.innerHTML = ""; // clear previous list items

        // create a new li element for each key-value pair in the playPerson object
        // for (const [key, value] of Object.entries(playPerson)) {
        const li = document.createElement("li");
        li.innerHTML = '<div style="color: white; font-size: 20px; padding: 2px; font-size: 20px; font-weight: bold;">' + playPerson.name + '</div> <p>Emp Id - ' + playPerson.emp_id + '<span class="appnt">' + playPerson.tasks + ' Tasks Assigned </span></p>'
        li.style.lineHeight='1rem';
		personList.appendChild(li);
        // }
      }
    </script> 
      </div>
    </div>
    <!-- container-fluid --> 
  </div>