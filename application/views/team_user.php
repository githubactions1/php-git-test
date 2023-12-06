<div class="main-content">
<div class="page-content">
<div class="row">
<div class="col-sm-6">
<div class="page-title-box">
<h4>Team User</h4><?php
foreach($team_details as $teamdetails){
	
	
}


?>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="<?php echo base_url()?>Team">Team</a></li>
<li class="breadcrumb-item active"><?php echo $teamdetails->emp_username;?></li>
</ol>
</div>
</div>
</div>
<input type="hidden" id="tuid" value="<?php echo $teamdetails->emp_id; ?>">

<div class="col-xl-12">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-4">
<div class="row">
<div class="col-md-6">
<p class="text-center"><img src="<?php echo base_url()?>assets/images/users/user-4.jpg" alt=""></p>
</div>
<div class="col-md-6">
<div class="t_user">
<h6><?php echo $teamdetails->emp_username;?></h6>
<p><?php echo $teamdetails->emp_code;?></p>
<p><?php echo $teamdetails->sub_cat_name;?></p>
<!--<p><span>Punched In At <?php echo $teamdetails->punch_in_time;?></span></p>-->
<p><i class="fa fa-mobile" aria-hidden="true"></i> Build Version -<?php echo $teamdetails->app_version;?></p>
</div>
</div>
</div>
</div>
<div class="col-md-3">
<div class="ava">
<ul>
<li>Mobile </li>
<li><span>+91 <?php echo $teamdetails->emp_mobile;?></span></li>
<li>Email</li>
<li><span><?php echo $teamdetails->emp_email;?></span></li>
<li>Address</li>
<li><span><?php echo $teamdetails->address;?></span></li>
</ul>
</div>
</div>
<div class="col-md-5">
<div class="row mb-4">
<div class="col-md-6">
<form autocomplete="off">
<div class="flex-row d-flex justify-content-center">
<div class="col-xl-12 col-lg-12 col-md-12">
<!--<div class="input-group input-daterange">
<input  class="form-control" type="text" name="daterange" value="01/06/2023 - 15/06/2023" />
</div>-->
</div>
</div>
</form>
</div>
</div>
<div class="row">
<div class="col-md-6">
<p class="mb-0">Productvity</p>
<h1 class="text-success">100%</h1>
<p class="mb-0">Task Complete 1/1</p>
</div>
<div class="col-md-6">
<p class="mb-0">Utilization</p>
<h1 class="text-primary">25%</h1>
<p class="mb-0">Hrs Utilized 0:77/3:03</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--<div class="row">
<div class="col-xl-6">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-4">
<form autocomplete="off">
<div class="flex-row d-flex justify-content-center">
<div class="col-xl-12 col-lg-12 col-md-12">
<div class="input-group input-daterange">
<input  class="form-control" type="text" name="daterange" value="01/06/2023 - 15/06/2023" />
</div>
</div>
</div>
</form>
</div>
<div class="col-md-8">
<h5 class="pull-right">Average time taken to complete task <br>
<span class="text-pink">Benchmark 0.90 hrs</span></h5>
</div>				
<div class="col-xl-12 pt-3 pb-3">                   
<div id="chart_div"></div>
</div>				
</div>
</div>
</div>
</div>
<div class="col-xl-6">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-4">
<form autocomplete="off">
<div class="flex-row d-flex justify-content-center">
<div class="col-xl-12 col-lg-12 col-md-12">
<div class="input-group input-daterange">
<input  class="form-control" type="text" name="daterange" value="01/06/2023 - 15/06/2023"/>
</div>
</div>
</div>
</form>
</div>
<div class="col-md-8">
<h5 class="pull-right">Assigned vs Complete Task</h5>
</div>
<div class="col-xl-12 pt-3 pb-3"> 
<div id="chart_div1"></div>
</div>
</div>
</div>
</div>
</div>
</div>-->
<div class="col-xl-12">
<div class="card">
<div class="card-body"> 
<!-- Nav tabs -->
<div class="col-xl-3">
<ul class="nav nav-pills nav-justified" role="tablist">
<li class="nav-item waves-effect waves-light"> <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab" onclick='homechnage()'> <span class="d-block d-sm-none"><i class="fas fa-home"></i></span> <span class="d-none d-sm-block">Leaves</span> </a> </li>
<li class="nav-item waves-effect waves-light"> <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab" onclick='profilechnage()'> <span class="d-block d-sm-none"><i class="far fa-user"></i></span> <span class="d-none d-sm-block">Occupancy Calender</span> </a> </li>
</ul>
</div>
<div class="row">
<div class="taken">
<ul>
<li>Total-<?php echo $total_leaves;?></li>
<li>Taken-<?php echo $taken;?></li>
<li>Balance-<?php echo $balance;?></li>
<li>Applied-<?php echo $applied;?></li>
<li>Rejected-<?php echo $rejected;?></li>

</ul>
</div>
</div>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane active p-3" id="home-1" role="tabpanel">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
style="border-collapse: collapse; border-spacing: 0; width: 100%;">
<thead>
<tr>
<th>Leave</th>
<th>Applied On</th>
<th>Leave Date</th>
<th>Total Days</th>
<th>Details</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
foreach($team_leave_details as $team_leavedetails){

?>
<tr>
<td><?php echo $team_leavedetails->leave_reason;?></td>

<td><?php echo Datetimeconversion($team_leavedetails->dateCreated);?></td>
<td><?php echo Dateconversion($team_leavedetails->leave_from_date);?> to <?php echo Dateconversion($team_leavedetails->leave_to_date);?></td>

<td><?php echo $team_leavedetails->no_of_days;?></td>
<td><?php echo $team_leavedetails->leave_reason;?></td>
<td><div class="specf">
<h6><?php 
if($team_leavedetails->leave_status==0){
	
	echo "Applied";
}
elseif($team_leavedetails->leave_status==1){
	echo "Approved";
}
else{
	echo "Rejected";
}
?></h6>

<?php if($team_leavedetails->leave_status!=0){ ?>
<p>by</p>
<p><span><?php echo $team_leavedetails->approved_by_name;?></span></p>
<?php } ?>

</div></td>
<td>
<?php 
if($team_leavedetails->leave_status==0){
	?>
<button type="button" class="btn btn-success approve" id="<?php echo $team_leavedetails->l_req_id;?>" >Approve</button>
<button type="button" class="btn btn-danger rejected" id="<?php echo $team_leavedetails->l_req_id;?>">Reject</button>
<?php
}
elseif($team_leavedetails->leave_status==1)
{
?>
<button type="button" class="btn btn-success" id="" >Approved</button>

<?php

}
else{
	?>
<button type="button" class="btn btn-danger" id="">Rejected</button>
 
	<?php
}
?>

</td>
</tr>

<?php
}
?>


</tbody>
</table>
</div>
</div>
</div>
<!-- end col --> 
</div>
</div>
<div class="tab-pane p-3" id="profile-1" role="tabpanel">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<!--<table id="datatable-buttons1" class="table table-striped table-bordered dt-responsive nowrap"
style="border-collapse: collapse; border-spacing: 0; width: 100%;">
<thead>
<tr>
<th>Leave</th>
<th>Applied On</th>
<th>Leave Date</th>
<th>Total Days</th>
<th>Details</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>Personal Leave</td>
<td>19 Apr 2023</td>
<td>21 Apr 2023 to 21 Apr 2023</td>
<td>1</td>
<td>-</td>
<td><div class="specf">
<h6>Apporved</h6>
<p>by</p>
<p><span>Naresh Babu KV</span></p>
</div></td>
<td><button type="button" class="btn btn-success">Approve</button>
<button type="button" class="btn btn-danger">Reject</button></td>
</tr>
<tr>
<td>Marriage Leave</td>
<td>01 Feb 2023</td>
<td>02 Feb 2023 to 02 Feb</td>
<td>1</td>
<td>-</td>
<td><div class="specf">
<p>Not Specified</p>
</div></td>
<td><button type="button" class="btn btn-danger">Reject</button></td>
</tr>
<tr>
<td>Marriage Leave</td>
<td>01 Feb 2023</td>
<td>04 Feb 2023 to 04 Feb</td>
<td>1</td>
<td>-</td>
<td><div class="specf">
<p>Not Specified</p>
</div></td>
<td><button type="button" class="btn btn-success">Approve</button>
<button type="button" class="btn btn-danger">Reject</button></td>
</tr>
<tr>
<td>Personal Leave</td>
<td>19 Apr 2023</td>
<td>21 Apr 2023 to 21 Apr 2023</td>
<td>1</td>
<td>-</td>
<td><div class="specf">
<h6>Apporved</h6>
<p>by</p>
<p><span>Ramesh Babu </span></p>
</div></td>
<td><button type="button" class="btn btn-success">Approve</button></td>
</tr>
<tr>
<td>Personal Leave</td>
<td>19 Apr 2023</td>
<td>21 Apr 2023 to 21 Apr 2023</td>
<td>1</td>
<td>-</td>
<td><div class="specf">
<h6>Apporved</h6>
<p>by</p>
<p><span>Rajesh</span></p>
</div></td>
<td><button type="button" class="btn btn-success">Approve</button>
<button type="button" class="btn btn-danger">Reject</button></td>
</tr>
</tbody>
</table>-->
</div>
</div>
</div>
<!-- end col --> 
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- container-fluid --> 
</div>
</div>
<!-- End Page-content -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.toast.js"></script>


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT --> 
<script>	
$(document).ready(function(){
	$('#profile-1').hide();
	$('#home-1').show();
	$('.taken').show();
$(function() {
$('input[name="daterange"]').daterangepicker({
"startDate": "01/05/2023",
"endDate": "28/05/2023",
opens: 'center',
locale: {
format: 'DD/MM/YYYY'
}
});
});
});
</script> 
<!-- daterangepicker js -->



<!-- chart_div js start here ---> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
<script>

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

var data = new google.visualization.DataTable();
data.addColumn('timeofday', '');
data.addColumn('number', '');

data.addRows([
[{v: [17, 0, 0], f: ''}, 1],
]);

var options = {
title: '',
hAxis: {
title: 'Friday',
format: '',
viewWindow: {
min: [17, 30, 0],
max: [17, 30, 0]
}
},
vAxis: {
title: ''
}
};

var chart = new google.visualization.ColumnChart(
document.getElementById('chart_div'));

chart.draw(data, options);
}
</script> 

<!-- chart_div js end here ---> 

<!-- chart_div1 js start here ---> 
<script>	
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMaterial);

function drawMaterial() {
var data = new google.visualization.DataTable();
data.addColumn('timeofday', 'Friday');
data.addColumn('number', 'Assiged');
data.addColumn('number', 'Complete');

data.addRows([
[{v: [17, 0, 0], f: ''}, 1, 1],
]);

var options = {
title: '',
hAxis: {
title: '',
format: '',
viewWindow: {
min: [0, 0, 0],
max: [0, 0, 0]
}
},
vAxis: {
title: 'Rating (scale of 0-1)'
}
};

var materialChart = new google.charts.Bar(document.getElementById('chart_div1'));
materialChart.draw(data, options);
}


$('.approve').on('click',function(){
	  var emp_id=$(this).attr('id');
	  var tuid=$('#tuid').val();
	
	$.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Team/approve_leave",
                   data : { emp_id : emp_id, tuid : tuid },
                    success: function(data)
                    {	
var jsondata=jQuery.parseJSON(data);	

				if(jsondata['status']==1)
				{
					
					$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
					setTimeout(function(){ window.location = "<?php echo base_url(); ?>Team/team_user/" +tuid; }, 1000);
				}
				else
				{
					$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							
				}                    }
              });
});

$('.rejected').on('click',function(){
	  var emp_id=$(this).attr('id');
	var tuid=$('#tuid').val();
	$.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Team/rejected_leave",
                   data : { emp_id : emp_id, tuid : tuid },
                    success: function(data)
                    {	
                    var jsondata=jQuery.parseJSON(data);	

				if(jsondata['status']==1)
				{
					
					$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
					setTimeout(function(){ window.location = "<?php echo base_url(); ?>Team/team_user/" +tuid; }, 1000);
				}
				else
				{
					$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							
				}
                    }
              });
});

function profilechnage(){
	
$('#profile-1').show();
	$('#home-1').hide();
$('.taken').hide();
	
}
function homechnage(){
	
$('#profile-1').hide();
	$('#home-1').show();	
$('.taken').show();	
}

</script> 
<!-- chart_div1 js end here --->

</body>
</html>