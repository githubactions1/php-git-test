<style>

.geo-window {
  position: absolute;
  left: 38%;
  top: 8%;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, .2);
  z-index: 9999;
  border-radius: 5px;
  width: 300px;
}
.geo-window h2 {
  margin: 0;
  font-size: 18px;
  font-weight: bold;
}
.geo-window p {
  margin: 0;
  font-size: 14px;
  line-height: 1.5;
}

</style>
  <!-- Left Sidebar End -->
  
  <div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title-box">
            <h4>Geofence</h4>
            <!--
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
              <li class="breadcrumb-item active">Lookup Photos</li>
            </ol>
--> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <div id="sidebar">
            <ul id="peopleList">
            </ul>
          </div>
        </div>
        <div class="col-9">
          <div id="map"></div>
        </div>
      </div>
    </div>
    <!-- container-fluid --> 
  </div>
</div>
<!-- End Page-content -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<script>
        var drawingManager;
        var map;
        var polygonCoordinates = [];
        var circleCoordinates = {};
        var all_overlays = [];
        var newShape = [];
        var selectedmarkers = [];
        var finarray = []; var seleced = null;


        function initMap() {
            polygonCoordinates = [];
            circleCoordinates = {};
            // Initialize map
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: { lat: 17.90099, lng: 81.89666 }
            });
            const clearButton = document.createElement("button");
            const finishButton = document.createElement("button");

            clearButton.textContent = "Clear Geofences(Circle/Polygon)";
            finishButton.textContent = "Finish";

            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(clearButton);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(finishButton);

            // Initialize drawing manager
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: null,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: ['marker', 'polygon', 'circle']
                },
                polygonOptions: {
                    editable: true
                },
                circleOptions: {
                    editable: true
                }
            });
            drawingManager.setMap(map);
            // Save polygon and circle coordinates
            google.maps.event.addListener(drawingManager, 'overlaycomplete', function (event) {

                if (event.overlay) {
                    newShape.push(event.overlay);
                }
                if (event.type === 'circle') {
                    circleCoordinates = {
                        center: { lat: event.overlay.getCenter().lat(), lng: event.overlay.getCenter().lng() },
                        radius: event.overlay.getRadius()
                    };
                }
                else if (event.type === 'marker') {
                    // console.log('Markers:', event.overlay.getPosition().lat(),event.overlay.getPosition().lng());
                    selectedmarkers.push({ lat: event.overlay.getPosition().lat(), lng: event.overlay.getPosition().lng() });
                }
                else {
                    polygonCoordinates = event.overlay.getPath().getArray().map(function (latLng) {
                        return { lat: latLng.lat(), lng: latLng.lng() };
                    });
                }
                // add click listener to overlay
                google.maps.event.addListener(event.overlay, 'click', function () {
                    seleced = null;
                    // do something when the overlay is clicked
                    console.log('Overlay clicked:', event);
                    // remove overlay from map
                    seleced = event.overlay;
                    this.setOptions({ fillColor: 'red', strokeColor: 'red' });
                });



            });


            clearButton.addEventListener("click", () => {
                deleteShapes();

            });
            finishButton.addEventListener("click", () => {
                finarray = [];
                finarray.push({
                    'polygon': polygonCoordinates,
                    'circle': circleCoordinates,
                    'markers': selectedmarkers
                });
                console.log(finarray);
            });
        }
        // Function to delete the polygon and circle
        function deleteShapes() {
            console.log(newShape)
            if (seleced) {
                seleced.setMap(null);
                seleced = null
            } else {

                for (var i = 0; i < newShape.length; i++) {
                    newShape[i].setMap(null);

                }
                newShape = [];
            }
            // assuming you have a google.maps.Map object called "map"
            // and a google.maps.drawing.DrawingManager object called "drawingManager"

            // set the drawing mode to null to disable further drawing
            // drawingManager.setDrawingMode(null);
            // drawingManager.map(null);

            // // get the map's overlay array
            // const overlays = map.getOverlays();

            // // iterate over all overlays in the array
            // overlays.forEach(function (overlay) {
            //     // remove the overlay from the map
            //     overlay.setMap(null);
            // });

            // clear the drawing manager's internal array of overlays
            // drawingManager.get('overlays').clear();


        }

        const people = [{
            "address": "Mumbai",
            "location": "307, Sant Mukabai Marg, Neel Ashish Housing Society, Navpada, ville parle, Mumbai, Maharashtra 400057, India",
            "asgnd_cls": "Assigned To....",
            "rds_cls": "Radius-19547.09 cm"
        },
        {
            "address": "Vasai, Virar, Borivali",
            "location": "Unnamed road, Vasai East Salt Plant, Vasai East, Vasai-Vira, Maharashtra                          4012018, India",
            "asgnd_cls": "Assigned To....",
            "rds_cls": "Radius-19395.58 cm"
        },
        {
            "address": "Besa",
            "location": "No Address found",
            "asgnd_cls": "Assigned To....",
            "rds_cls": "Radius-3684.98 cm"
        },
        {
            "address": "Palghar, Boisar, Dahanu",
            "location": "Unnamed Road, Maharashtra, 401501, India",
            "asgnd_cls": "Assigned To....",
            "rds_cls": "Radius-17277.39cm"
        },
        {
            "address": "Jama Masjid",
            "location": "New Delhi, Delhi",
            "asgnd_cls": "Assigned To....",
            "rds_cls": "Radius-1875.09 cm"
        },
        {
            "address": "123 Main Street, Bangalore, Karnataka",
            "location": "307, sant mukabai Marg, Neel Ashish Housing Society, navpada, ville parle, mumbai",
            "asgnd_cls": "Assigned To....",
            "rds_cls": "Radius-1548.09 cm"
        },
        {
            "address": "456 Park Avenue, Mumbai, Maharashtra",
            "location": "307, sant mukabai Marg, Neel Ashish Housing Society, navpada, ville parle, mumbai",
            "asgnd_cls": "Assigned To....",
            "rds_cls": "Radius-1548.09 cm"
        },
        {
            "address": "789 Beach Road, Chennai, Tamil Nadu",
            "location": "307, sant mukabai Marg, Neel Ashish Housing Society, navpada, ville parle, mumbai",
            "asgnd_cls": "Assigned To....",
            "rds_cls": "Radius-1548.09 cm"
        },
        {
            "address": "321 Main Boulevard, Kolkata, West Bengal",
            "location": "307, sant mukabai Marg, Neel Ashish Housing Society, navpada, ville parle, mumbai",
            "rds_cls": "Radius-1548.09 cm"
        },
        {
            "address": "654 Hill Street, Hyderabad, Telangana",
            "location": "307, sant mukabai Marg, Neel Ashish Housing Society, navpada, ville parle, mumbai",
            "rds_cls": "Radius-1548.09 cm"
        }];

        const peopleList = document.getElementById("peopleList");
        function displayPeople() {
            peopleList.innerHTML = "";

            for (let i = 0; i < people.length; i++) {
                let li = document.createElement("li");
                let loctn = people[i];
                li.innerHTML = `<div class="address">${loctn.address}</div>
                        <div class="location">${loctn.location}
                        </div>
                        <div class="asgnd_cls">Assigned To....</div>
                        <div class="rds_cls">${loctn.rds_cls}
                        </div>
                        <button class="edit-btn">Edit</button>
                        <button class="update-btn">Update</button>`;
                li.addEventListener("click", () => {
                    console.log(loctn);
                    // remove previous highlights
                    let highlighted = document.querySelector(".highlight");
                    if (highlighted) {
                        highlighted.classList.remove("highlight");
                    }
                    // add highlight to clicked item
                    li.classList.add("highlight");
                    // create the info window element
                    let infoWindow1 = document.createElement("div");
                    infoWindow1.classList.add("geo-window");
                    infoWindow1.innerHTML = `<h2 style="background: #ecf1f2; padding: 10px; border: solid 1px #dfe5e6;
    border-radius: 3px; margin-bottom: 5px; font-size: 15px;"><span>${loctn.address}</span></h2>
                <p><span style="color:blue; word-break: break-all;">${loctn.location} </span></p>

        <div style="font-weight: bold; margin-bottom: 5px;">Assign to</div>
        <input type=text class="form-control" placeholder="Select Team Member(s)"> </input>
        <div style="font-weight: bold; margin-top: 5px; margin-bottom: 5px;">Event On</div>
        <form>
		<label>
			<input type="checkbox" name="In" value="In" checked>
			In
		</label>
		<label>
			<input type="checkbox" name="Out" value="Out" checked>
			Out
		</label>
        <div style="font-weight: bold; margin-bottom: 5px;">Sent Events On</div>
        <form>
		<label>
			<input type="checkbox" name="In" value="In" checked>
			SMS
		</label>
		<label>
			<input type="checkbox" name="Out" value="Out" checked>
			Email
		</label>
        </form>
        <button class="edit-btn">save</button>
                        <button class="edit-btn">cancel</button>

      `;

                    // remove any existing info windows
                    let existingInfoWindows = document.querySelectorAll(".geo-window");
                    existingInfoWindows.forEach((window) => {
                        window.parentNode.removeChild(window);
                    });

                    // append the info window to the document body
                    document.body.appendChild(infoWindow1);

                });

                peopleList.appendChild(li);

            }
        }
        displayPeople();

    </script> 
	<!-- Gmaps file --> 
<script src="<?php echo base_url();?>assets/libs/gmaps/gmaps.min.js"></script> 

<!-- demo codes --> 
<script src="<?php echo base_url();?>assets/js/pages/gmaps.init.js"></script> 
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&libraries=drawing&callback=initMap"
        async defer></script>
</body>
</html>