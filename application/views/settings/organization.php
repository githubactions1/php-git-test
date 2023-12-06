<style type="text/css">
#map {
width: 100%;
height: 400px;
border: 1px solid black;
}
</style>
<div class="main-content">
<div class="page-content">
<div class="row">
<div class="col-sm-6">
<div class="page-title-box">
<h4>Add Organization Unit</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
<li class="breadcrumb-item"><a href="javascript: void(0);">Organization Set Up</a></li>
<li class="breadcrumb-item active">Add Organization Unit</li>
</ol>
</div>
</div>
</div>
<div class="col-xl-12">
<div class="card">
<div class="card-body">
<form class="needs-validation" name="event-form" novalidate method="post" action="<?php echo base_url()?>Settings/add_organization">
<div class="row">
<p>Fields marked with * are mandatory</p>
<div class="col-6">
<div class="mb-3">
<label class="form-label">Organization Unit ID <span class="text-danger">*</span></label>
<input class="form-control" placeholder="Enter Organization Unit ID"
type="text" name="org_uid" required value="" />
<div class="invalid-feedback">Please provide a valid Organization Unit ID</div>
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label class="form-label">Organization Unit Type <span class="text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="org_utype">
<option value=""> Organization Unit Type</option>
<option value="1">Cluster</option>
<option value="2">Zone</option>
<option value="3">State</option>

</select>
<!--<div class="invalid-feedback">Please select a valid Organization Unit Type</div>-->
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label class="form-label">Organization Unit Name <span class="text-danger">*</span></label>
<input class="form-control" placeholder="Enter Organization Unit Name"
type="text" name="org_uname" required value="" />
<!--<div class="invalid-feedback">Please provide a valid Organization Unit Name</div>-->
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label class="form-label">Parent Organization Unit <span class="text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="org_unit" id="zone_id1">
<option value=""> Select any one</option>
<?php
if(!empty($zones_list)){
foreach($zones_list as $zoneslist){
?>	
<option value="<?php echo $zoneslist->zone_id;?>"><?php echo $zoneslist->zone_name;?></option>
	
<?php
}
}
?>

</select>
<!--<div class="invalid-feedback">Please select a valid Parent Organization Unit</div>-->
</div>
</div>

<div class="col-6">
<div class="mb-3">
<label class="form-label">Address <span class="text-danger">*</span></label>
<textarea name="address" id="" rows="2" class="form-control" placeholder="Enter Address"></textarea>
<div class="invalid-feedback">Please Enter Address</div>
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label class="form-label">Select State <span class="text-danger">*</span></label>
<select class="form-select" aria-label="Default select example" name="state_id" id="state_id1">
<option value=""> Select any one</option>

</select>
<!--<div class="invalid-feedback">Please select a valid Parent Organization Unit</div>-->
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label class="form-label">Pin Codes <span class="text-danger">*</span></label>
<textarea name="pincode" id="" rows="2" class="form-control" placeholder="Enter Pin Code"></textarea>
<div class="invalid-feedback">Please Enter Pin Code</div>
</div>
<div class="mb-3">
<label class="form-label">Latitude <span class="text-danger">*</span></label>
<input class="form-control" placeholder="Enter Latitude"
type="text" name="lat" id="lat" required value="" readonly />
<div class="invalid-feedback">Please provide a valid Latitude</div>
</div>
<div class="mb-3">
<label class="form-label">Longitude <span class="text-danger">*</span></label>
<input class="form-control" placeholder="Enter Longitude"
type="text" name="long" id="lang" required value="" readonly />
<div class="invalid-feedback">Please provide a valid Longitude</div>
</div>
<div class="mb-3">
<label class="form-label">Minimum Tasks Per Team Member / Day <span class="text-danger">*</span></label>
<input class="form-control" placeholder=""
type="text" name="min_task_emp" required value="" />
<div class="invalid-feedback">Please provide a valid </div>
</div>
</div>


<div class="col-6">
<div class="mb-3">
<p>Drag and drop marker to set address</p>
<div id="map"></div>
</div>
</div>
</div>
<div class="row mt-2">
<div class="col-6">
<input type="submit" name="save" value="Save" class="btn btn-success">
<!--<button type="button" class="btn btn-success">Save</button>-->
<button type="button" class="btn btn-success">Cancel</button>
</div>
<div class="col-6 text-end"></div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- container-fluid --> 
</div>
<script>
function initMap() {
var myLatLng = {lat: 22, lng: 77};

var map = new google.maps.Map(document.getElementById('map'), {
center: myLatLng,
zoom: 4
});

var marker = new google.maps.Marker({
position: myLatLng,
map: map,
title: 'Google Maps',
draggable: true
});

google.maps.event.addListener(marker, 'dragend', function(marker) {
var latLng = marker.latLng;
document.getElementById('lat-span').innerHTML = latLng.lat();
document.getElementById('lon-span').innerHTML = latLng.lng();
});
google.maps.event.addListener(map, 'click', function( event ){
  //alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() ); 
  var lat=event.latLng.lat();
  var lang=event.latLng.lng();

$('#lat').val(lat); 
$('#lang').val(lang);  
 //document.getElementById('lat').innerHTML =lat();
//document.getElementById('lon-span').innerHTML = latLng.lng(); 
  
  
});
}
$("#zone_id1").on("change",function(){
	var z_id = $('#zone_id1').val();
	//alert(z_id);
	
$.ajax({
type: "post",
url: "<?php echo base_url()?>Settings/getstatebyzoneid",
data: {z_id:z_id},
success: function(data){
	//alert(data);
$('#state_id1').html(data);
}
});	
	
});

</script> 
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>