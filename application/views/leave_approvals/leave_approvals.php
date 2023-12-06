<div class="main-content">
<div class="page-content">
<div class="row">
<div class="col-sm-6">
<div class="page-title-box">
<h4>Leave Approvals</h4>
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="<?php echo base_url()?>Leave_approvals">Leave Approvals</a></li>
</ol>
</div>
</div>
</div>
<input type="hidden" id="tuid" value="<?php echo $teamdetails->emp_id; ?>">


<div class="col-xl-12">
<div class="card">
<div class="card-body"> 

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
<th>Employee</th>
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
foreach($leave_approvals_list as $team_leavedetails){

?>
<tr>
<td><?php echo $team_leavedetails->emp_name;?></td>
<td><?php echo $team_leavedetails->leave_reason;?></td>

<td><?php echo Datetimeconversion($team_leavedetails->date_Created);?></td>
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
<button type="button" class="btn btn-success approve" id="<?php echo $team_leavedetails->l_req_id.'~'.$team_leavedetails->emp_id;?>" >Approve</button>
<button type="button" class="btn btn-danger rejected" id="<?php echo $team_leavedetails->l_req_id.'~'.$team_leavedetails->emp_id;?>">Reject</button>
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
	  var emp_details=$(this).attr('id');
	var empdetails = emp_details.split('~');
	  var emp_id=empdetails[0];
	var tuid=empdetails[1];
	
	
	$.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Leave_approvals/approve_leave",
                   data : { emp_id : emp_id, tuid : tuid },
                    success: function(data)
                    {	
var jsondata=jQuery.parseJSON(data);	

				if(jsondata['status']==1)
				{
					
					$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
					setTimeout(function(){ window.location = "<?php echo base_url(); ?>Leave_approvals" }, 1000);
				}
				else
				{
					$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							
				}                    }
              });
});

$('.rejected').on('click',function(){
	 var emp_details=$(this).attr('id');
	var empdetails = emp_details.split('~');
	  var emp_id=empdetails[0];
	var tuid=empdetails[1];
	$.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Leave_approvals/rejected_leave",
                   data : { emp_id : emp_id, tuid : tuid },
                    success: function(data)
                    {	
                    var jsondata=jQuery.parseJSON(data);	

				if(jsondata['status']==1)
				{
					
					$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
					setTimeout(function(){ window.location = "<?php echo base_url(); ?>Leave_approvals" }, 1000);
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