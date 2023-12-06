


<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.toast.js"></script>
<link href="<?php echo base_url();?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/combo.css">
<div class="main-content">
<div class="page-content">

<div class="row">
<div class="col-sm-6">
<div class="page-title-box">
<h4>Team</h4>
</div>
</div>
</div>
<div class="row mb-4">
<div class="col-lg-12" id="teamDailyStatus">
<div class="panel widget mb0">
<div class="row row-table row-flush">
<div class="col-xs-6">
<div class="row row-table row-flush  bg-gray-light text-center">
<div class="col-xs-12">
<div class="panel-body pt0 pb0">
<div class="text-inverse">Today</div>
<div class="text-inverse font-size-16"><?php echo date('d M Y');?></div>
</div>
</div>
</div>
</div>
<div class="col-xs-6">
<div class="row row-table row-flush">
<div class="col-xs-12">
<div class="panel-body pt0 pb0 br">
<h2 class="mt0 mb0 text-success"><?php echo $tpicount+$tpocount;?></h2>
<p class="mb0 text-success font-size-16">Today's Attendance</p>
</div>
</div>
</div>
</div>
<div class="col-xs-6">
<div class="row row-table row-flush">
<div class="col-xs-12">
<div class="panel-body pt0 pb0 br">
<h2 class="mt0 mb0 text-success"><?php echo $tpicount;?></h2>
<p class="mb0 text-success font-size-16">Punched-In</p>
</div>
</div>
</div>
</div>
<div class="col-xs-6  pt-sm pb-sm ">
<div class="row row-table row-flush br">
<div class="col-xs-12">
<div class="panel-body pt0 pb0">
<div class="text-inverse bb font-size-16"><?php echo $ontimecount;?> <span>On Time</span></div>
<div class="text-inverse font-size-16"><?php echo $latecount;?> <span>Late</span></div>
</div>
</div>
</div>
</div>
<div class="col-xs-6 pt-sm pb-sm ">
<div class="row row-table br row-flush">
<div class="col-xs-12">
<div class="panel-body pt0 pb0">
<h2 class="mt0 mb0 text-inverse"><?php echo $tpocount;?></h2>
<p class="mb0 text-inverse font-size-16">Punched Out</p>
</div>
</div>
</div>
</div>
<div class="col-xs-6 pt-sm pb-sm">
<div class="row row-table  br row-flush">
<div class="col-xs-12">
<div class="panel-body pt0 pb0">
<h2 class="mt0 mb0 absent-text"><?php echo $tabsount;?></h2>
<p class="mb0 absent-text font-size-16">Absent</p>
</div>
</div>
</div>
</div>
<div class="col-xs-6 pt-sm pb-sm ">
<div class="row row-table br row-flush">
<div class="col-xs-12">
<div class="panel-body pt0 pb0">
<h2 class="mt0 mb0 text-yellow"><?php echo $icount;?></h2>
<p class="mb0 text-yellow font-size-16">Idle</p>
</div>
</div>
</div>
</div>
<div class="col-xs-6">
<div class="row row-table row-flush">
<div class="col-xs-12">
<div class="panel-body pt0 pb0">
<h2 class="mt0 mb0 text-muted"><?php echo $olcount==''?0:$olcount?></h2>
<p class="mb0 text-muted font-size-16">On leave</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
//$grtotal=$tpicount+$icount+$tabsount+$olcount;
$grtotal=count($team_details);
?>
<!-- <div class="col-xl-12">
<div class="card">
<div class="card-body"> -->
<!-- Nav tabs -->







<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<form action="<?php echo base_url();?>Team" method="post">
<div class="mb-3 row"> 

<div class="col-md-2">
<div class="form-group">
<label for="input-datalist">Status</label>
<select class="form-control select2" id="status_id" name="status_id" >
<option value="" >All</option>
<!--<option value="2" <?php if (2== $_POST['status_id']){
echo 'selected="selected"';
}?>>Today Attendance</option>-->

<option value="5"<?php if (5== $_POST['status_id']){
echo 'selected="selected"';
}?> >Punched In</option>

<option value="4"<?php if (4== $_POST['status_id']){
echo 'selected="selected"';
}?> >Punched Out</option>

<option value="6" <?php if (6== $_POST['status_id']){
echo 'selected="selected"';
}?>>Absent</option>
<option value="3"  <?php if (3== $_POST['status_id']){
echo 'selected="selected"';
}?>>Idle</option>
<option value="7"  <?php if (7== $_POST['status_id']){
echo 'selected="selected"';
}?>>On Leave</option>

</select></div>
</div>
<div class="col-md-4">
<label class="form-label">Organization Unit</label>
                    <input type="text" name="cluster_ids" class="form-control" id="justAnInputBox1" placeholder="Select" autocomplete="off"/>
                    <input type="hidden" name="type_id" class="form-control" id="cluster_id_ids_hidden"  >

</div>
<div class="col-md-1">
<div class="form-group">
<label for="input-datalist"></label>
<button type="submit" name="submit" style="border: none;margin-top:35px"><i class="fa fa-search"></i>
</div>
</div>
<div class="col-md-2 mt-4">
<!--<button type="button" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md2"><i class="fa fa-envelope" aria-hidden="true"></i> Send SMS</button>-->
</div>
<div class="col-md-2 mt-4">
<button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target=".bs-example-modal-md2"><i class="fa fa-envelope" aria-hidden="true"></i> Send SMS</button>

<h5 class="pull-right mt-1">Total : <?php echo $grtotal;?></h5>
</div>
</div>
</form>

<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
style="border-collapse: collapse; border-spacing: 0; width: 100%;">

<thead>
<tr>
<th>Name</th>
<th>Type</th>
<th>Status</th>
<th>Tasks</th>
<th>Device Status</th>
<th>Availability</th>
</tr>
</thead>
<tbody>
<?php
foreach($team_details as $teamdetails)
{
//print_r (json_decode($teamdetails->app_permissions));
$permission_details=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $teamdetails->app_permissions), true );
$lat=$permission_details['Lat'];
$lang=$permission_details['Long'];

?>
<tr>
<td><div class="sourced">
<h6><a href="<?php echo base_url();?>Team/team_user/<?php echo $teamdetails->emp_id;?>"> <span class="badge rounded-pill bg-success">S1</span> <?php echo $teamdetails->emp_username;?></a> (<?php echo $teamdetails->emp_name;?>)</h6>
<!--<a href="#"><span class="badge rounded-pill bg-success">S1</span> <?php echo $teamdetails->emp_username;?></a>--></div>
<p>(<?php echo $teamdetails->emp_code;?>) <?php echo $teamdetails->emp_mobile;?></p>
<!--<div>(<?php echo $teamdetails->emp_cod;?>) <?php echo $teamdetails->emp_mobile;?></div>-->
</td>
<td><?php echo $teamdetails->member_type_name;?></td>
<td>

<div class="sourced">
<p>



<span><?php 
//echo "Punched-In";
//echo $teamdetails->emp_sts;
if($type_n==0){
if($teamdetails->emp_sts==1){
	echo "Absent";
	$emp_sts_name="Not Available";
}else if($teamdetails->punch_status==1 && $teamdetails->emp_sts==0){
echo "Punched-In";	
	$emp_sts_name="Available";
}
elseif($teamdetails->punch_status==0 && $teamdetails->emp_sts==0)
{
	echo "Punched-Out";
	$emp_sts_name="Not Available";
}
else if($teamdetails->emp_sts==4)
{
	echo "On Leave";
	$emp_sts_name="Not Available";
}
else{
	echo"Present ";
	$emp_sts_name="Available";
}
?>

<?php 
}
else{

if($type_n == 3){
	echo"Idle ";
	$emp_sts_name="Available";
}
else if($type_n == 4){
	echo"Punched Out ";
	$emp_sts_name="Not Available";
}
else if($type_n == 5){
	echo"Punched In ";
	$emp_sts_name="Available";
}
else if($type_n == 6){
	echo"Absent ";
	$emp_sts_name="Not Available";
}
else if($type_n == 7){
	echo"On Leave ";
	$emp_sts_name="Not Available";
}
}
?>

</span>
</p>
<?php
if($type_n !=6 && $type_n !=3){
if($teamdetails->punch_status==1 && $teamdetails->emp_sts==0){
?>
<p title="<?php echo $teamdetails->punch_in_time;?>" ><?php echo Timeconversion($teamdetails->punch_in_time);?></p>
<p><?php echo $teamdetails->punch_in_location;?></p>
<!--<p><?php echo $teamdetails->Status;?></p>-->
<?php
}
?>

<?php
if($teamdetails->punch_status==0 && $teamdetails->emp_sts==0){
?>
<p title="<?php echo $teamdetails->punch_out_time;?>" ><?php echo Timeconversion($teamdetails->punch_out_time);?></p>
<?php
}

?>
<?php
}

?>

</div>


</td>
<td><div class="sourced"><p>Complete - <?php echo $teamdetails->complete;?>/<?php echo $teamdetails->complete;?></p>
<p>Assigned - <?php echo $teamdetails->assigned;?>/<?php echo $teamdetails->assigned;?></p>
<p>Previous Date - <?php echo $teamdetails->previous_date_tasks;?></p></div></td>




<td>
<div class="space-bott1">
<?php
if($permission_details['battery']>50){
?>
<span class="fa fa-battery-three-quarters text-success">
<?php	
}
else{
	?>
	<span class="fa fa-battery-three-quarters text-danger">
	<?php
}
?>
 <?php echo $permission_details['battery'];?>%, </span>


<?php echo Datetimeconversion($teamdetails->punch_in_time);?></div>

<div class="diagnostic-container">
<div class="margin-top-05 pre-wrapped"><span data-toggle="tooltip" data-placement="top" title="High accuracy setting is on"><span class="device-settings-icon accuracy-active"></span></span><span data-toggle="tooltip" data-placement="top" title="Battery optimization setting is on"><span class="device-settings-icon battery-optimize-active"></span></span><span data-toggle="tooltip" data-placement="top" title="GPS is on"><span class="device-settings-icon gps-active"></span></span><span data-toggle="tooltip" data-placement="top" title="Network is on"><span class="device-settings-icon network-active"></span></span><span class="storage-permission"><span data-toggle="tooltip" data-placement="left" title="Location and Storage permission is granted."><span class="device-settings-icon storage-active"></span></span></span></div>
<div class="dropdown diagnostic-history-dropdown-wraper" data-toggle="tooltip" data-placement="top" title="View diagnostic history">
<div class="dropdown-after-active dn" id="dropdown-after-active" style="display: block;"></div>
<div class="dropdown-after dn" id="dropdown-after" style="display: block;"></div>
<div class="diagnostic-history dropdown-toggle" data-toggle="dropdown" data="" aria-expanded="true"  onclick="myfunctiononclick('<?php echo $teamdetails->emp_id;?>')"></div>
<div class="dropdown-menu diagnostic-dropdown" id="diagnosticHistory" style="">

<div class="history-record-wrap">
<!--<div>1684143953314</div>

<span data-toggle="tooltip" data-placement="top" title="High accuracy setting is on">
<span class="device-settings-icon accuracy-active"></span></span>
<span data-toggle="tooltip" data-placement="top" title="Battery optimization setting is on">
<span class="device-settings-icon battery-optimize-active">
</span></span>
<span data-toggle="tooltip" data-placement="top" title="GPS is on">
<span class="device-settings-icon gps-active">
</span></span>
<span data-toggle="tooltip" data-placement="top" title="Network is on">
<span class="device-settings-icon network-active">
</span></span>
<span class="storage-permission"><span data-toggle="tooltip" data-placement="left" title="Location and Storage permission is granted.">
<span class="device-settings-icon storage-active">
</span></span>
</span>-->
</div>




<!--  -->
</div>
</div>
</div>





<div>Build Version -  <?php echo $teamdetails->app_version;?></div></td>
<td>
<section class="center">
<div id="popover_html" hidden>
<p>p_image</p>
</div>
<div class="avilable">
<ul>
<li id="<?php echo $teamdetails->emp_id.'~'.$teamdetails->Status;?>" class="btn btn-success hover">
<?php

echo $emp_sts_name;	

?></li>

<li class="sa-title2"><i class="fas fa-comments" style="font-size:13px"></i></li></ul>
</div>
</section>
</td>
</tr>
<?php
}
?>
<!--<tr>
<td><div><a href="#"><span class="badge rounded-pill bg-success">S1</span> Abdul Afsar Mohammad</a></div>
<div>(55934_VJA_AB) 9989123456</div></td>
<td>Outsourced</td>
<td><div><a href="#">Punched-In</a></div>
<div>8:47 am</div>
<div>Away from base location</div></td>
<td><div>Complete -1/1</div>
<div>Assigned -1/5</div>
<div>Previous Date -0 </div></td>
<td><div><span class="battery"><i class="mdi mdi-battery-medium"></i> 69%</span>, Apr-1, 20223, 2:14:19 PM</div>
<div><span><i class="fas fa-map-marker-alt"></i></span> <span><i class="mdi mdi-battery-medium"></i></span> <span><i class="mdi mdi-marker"></i></span> <span><i class="mdi mdi-hotspot"></i></span> </div>
<div>Build Version - 3.1.065</div></td>
<td><button type="button" class="btn btn-success">Avilable</button>
<a href="#"><i class="fas fa-comments" style="font-size:20px"></i> </a></td>
</tr>-->
</tbody>
</table>

</div>
</div>
</div>
<!-- end col --> 
</div>
<!-- </div>
</div>
</div>-->
</div>
<!-- container-fluid --> 
</div>



<div class="col-sm-6 col-md-3 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-md2" tabindex="-1" role="dialog"
      aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md2">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title mt-0" id="myLargeModalLabel">Send SMS</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-hidden="true"></button>
</div>
<div class="modal-body">
<form class="needs-validation" name="event-form" id="form-event" novalidate action="<?php echo base_url();?>Team/sendsms()">
<div class="row">
<div class="col-12">
<div class="mb-2">
<label class="form-label">Your Message*</label>
<textarea required="" class="form-control" placeholder="Type here" rows="3"></textarea>
</div>
</div>


<!--<div class="col-md-12 mt-2">
                    <label class="form-label">Select Organization Unit</label>
                    <input type="text" name="cluster_ids" class="form-control" id="justAnInputBox1" placeholder="Select" autocomplete="off"/>
                    <input type="hidden" name="cluster_id" class="form-control" id="cluster_id_ids_hidden"  >

				  </div>-->
				  
<div class="col-md-12 mt-2">
<label class="form-label">Employee </label>
<select class="form-control select2" id="employee_name" name="employee_name"  required>
<option value="" >Select </option>
</select>
</div>
				  

</div>
<div class="row mt-2">
<div class="col-9">
<button type="button" class="btn btn-success">Send</button>
<button type="button" class="btn btn-success me-1" data-bs-dismiss="modal">Cancel</button>
</div>
<!--
<div class="col-12 text-end"> 
  <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-success" id="btn-save-event">Assign</button>
</div>
--> 
</div>
</form>
</div>
</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 
</div>
<!-- Assign Task end here --> 

<script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script> 

<!-- App js --> 
<script src="<?php echo base_url();?>assets/js/app.js"></script> 
<!--<script src="<?php echo base_url();?>assets/js/ajax.js"></script> -->




<!--<script type="text/javascript" src="<?php echo base_url()?>assets/js/avilable.js"></script>-->


<script src="<?php echo base_url();?>assets/libs/sweetalert2/sweetalert2.min.js"></script> 

<!-- Sweet alert init js--> 
<script src="<?php echo base_url();?>assets/js/pages/sweet-alerts.init.js"></script> 

<script src="<?php echo base_url();?>assets/js/comboTreePlugin.js"  type="text/javascript"></script> 


<script>


$(document).ready(function() {
$(document).on("click", ".emp_avialble", function() {
var emp_id=$(this).attr('id');

//alert(emp_id);
	 $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Team/edit_empstatus_avilable",
                   data:'emp_id='+emp_id,
                    success: function(data)
                    {					
                    location.reload();
                    }
              });
});

$(document).on("click", ".emp_absent", function() {
  var emp_id=$(this).attr('id');
	//alert(emp_id);
	 $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Team/edit_empstatusabsent",
                   data:'emp_id='+emp_id,
                    success: function(data)
                    {					
                    location.reload();
                    }
              });
});


$(document).on("click", ".emp_notavialble", function() {
  var emp_id=$(this).attr('id');
  //alert(emp_id);
	 $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Team/edit_empstatus_notavilable",
                   data:'emp_id='+emp_id,
                    success: function(data)
                    {	
 
                    location.reload();
                    }
              });
});


});




	 

//popover js code

jQuery(document).ready(function(){ 	
	jQuery('.hover').popover({  
		title: popoverContent,  
		html: true,  
		placement: 'right',  
		trigger: 'click'
	});    
	function popoverContent() {  
		var content = '';  
		//var element = $(this);  
		var ids = $(this).attr("id");
             var details=ids.split("~");
             var id=details[0];
             var empid=details[1];
//alert(empid);
		$.ajax({  
			url: "<?php echo base_url();?>Team/status_popover",  
			method: "POST",  
			async: false,  	
			data:{	
				id : id,empid:empid
			},  
			//dataType: "JSON",
			success:function(data){ 
			
				content = $("#popover_html").html();				
				content = content.replace(/p_image/g, data);	
					
			}  
		});  
		return content;  
	}  
});


// organazation unit drop down 

var SampleJSONData = [
<?php 
	if(!empty($zones_states_and_clusters_list)){
	foreach($zones_states_and_clusters_list as $keys=>$cluster_zone){
	?>
   {
		id: '99999',
        title: '<?php echo $cluster_zone->zone;?>',
			<?php 
			if(!empty($cluster_zone)){
				foreach($cluster_zone as $ss2=>$cluster_states){
			?>
        subs: [
			<?php 
						if(!empty($cluster_states)){
						foreach($cluster_states as $ss3=>$clusters){
				?>
             {
				// id: '<?php echo $clusters->state_id;?>',
				title: '<?php echo $clusters->state;?>',
                subs: [
					<?php 
							if(!empty($clusters->state_name[0])){
							foreach($clusters->state_name[0] as $ss4=>$cluster){
					?>
                    {
						id: '<?php echo $cluster->cluster_id;?>',
						title: '<?php echo $cluster->cluster_name;?>',
                    }, 
					<?php
							}
						}  
					?>
					
                ]
            },
			<?php
				}
			}  
		?>
        ],
		<?php
				}
			}  
		?>
		
    },
	<?php } } ?>
	

];




var SampleJSONData1 = [
	<?php 
	if(!empty($clusters_list)){
	foreach($clusters_list as $key1=>$cluster){
	?> 
   {
        id: '<?php echo $cluster->cluster_id;?>',
        title: '<?php echo $cluster->cluster_name?>',
    },
	<?php } } ?>
];

var SampleJSONData2 = [
	<?php 
	if(!empty($task_type_list)){
	foreach($task_type_list as $key=>$task_cat){
	?> 
   {
        id: <?php echo $task_cat->comp_cat_id;?>,
        title: '<?php echo $task_cat->comp_cat_name?>',
    },
	<?php } } ?>
];

var SampleJSONData3 = [
	<?php 
	if(!empty($skill_type_list)){
	foreach($skill_type_list as $key11=>$skill){
	?> 
   {
        id: <?php echo $skill->sub_cat_id;?>,
        title: '<?php echo $skill->sub_cat_name?>',
    },
	<?php } } ?>
];


jQuery(document).ready(function($) {
	
		comboTree3 = $('#justAnInputBox1').comboTree({
			source : SampleJSONData,
			isMultiple: true,
			cascadeSelect: true,
			collapse:true
		});
		comboTree3.onChange(function(){
		console.log(comboTree3.getSelectedIds());
		$('#cluster_id_ids_hidden').val(comboTree3.getSelectedIds());
				Get_cluster_wsie_emp_list();
				
		});
		
		comboTree4 = $('#justAnInputBox2').comboTree({
			source : SampleJSONData2,
			isMultiple: true,
			cascadeSelect: true,
			withSelectAll: true
		});
		comboTree4.onChange(function(){
		console.log(comboTree4.getSelectedIds());
		$('#comp_cat_id_ids_hidden').val(comboTree4.getSelectedIds());
		});
		
		
		comboTree5 = $('#justAnInputBox3').comboTree({
			source : SampleJSONData3,
			isMultiple: true,
			cascadeSelect: false,
			withSelectAll: true,
			collapse: false
		});
		
		
		comboTree5.onChange(function(){
		console.log(comboTree5.getSelectedIds());
		$('#skill_type_ids_hidden').val(comboTree5.getSelectedIds());
		});
		
		
		
		
});
 function Get_cluster_wsie_emp_list(){
	var cluster_ids=$("#cluster_id_ids_hidden").val();
	$.ajax({  
		type: "POST",
		url: '<?php echo base_url();?>Team/Get_cluster_wsie_emp_list', 
		data: "cluster_ids="+cluster_ids,
		complete: function(dd){  
			var op = dd.responseText.trim();
			$("#employee_name").html(op);
		}
	});
	}
	
	function myfunctiononclick(empid){
	$.ajax({  
		type: "POST",
		url: '<?php echo base_url();?>Team/Get_emp_app_permissions', 
		data: "empid="+empid,
		success: function(data){ 
		//alert(data);
			$(".history-record-wrap").html(data);
		}
	});
		
		
	}
</script> 
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<!--<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script> -->
<script src="<?php echo base_url();?>assets/js/team-day-view.js"></script> 
<script src="<?php echo base_url();?>assets/js/common-utils.js"></script> 



<!--<script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script> -->
<script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script> 
<!--<script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script> 
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script> -->

<!-- App js --> 
<!--<script src="<?php echo base_url();?>assets/js/app.js"></script> -->

<script src="<?php echo base_url();?>assets/js/header_chart.js"></script> 
<script src="<?php echo base_url();?>assets/js/nav-tabs.js"></script> 
<script src="<?php echo base_url();?>assets/js/list_view.js"></script> 
<script src="<?php echo base_url();?>assets/js/scroller.js"></script> 

<script src="<?php echo base_url();?>assets/js/comboTreePlugin.js"  type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/js/multiselect-dropdown.js" ></script> 



<!-- Required datatable js --> 
<script src="<?php echo base_url();?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script> 
<!-- Buttons examples --> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/jszip/jszip.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/pdfmake/build/pdfmake.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/pdfmake/build/vfs_fonts.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script> 
<!-- Responsive examples --> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script> 

<!-- Datatable init js --> 
<script src="<?php echo base_url();?>assets/js/pages/datatables.init.js"></script>