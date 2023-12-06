<style>
.filter-tabs {
white-space: nowrap !important;
overflow-x: auto !important;
display: block !important;
}	

.filter-tabs li {
display: inline-block !important;
float: none !important;
width: auto !important;
}

#load_div {
  position: fixed;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 50px;
  height: 50px;
  margin: 36px 0 0 36px;
  border: 8px solid #96be31;
  border-radius: 50%;
  border-top: 8px solid #f3f3f3;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

.bg-load{   
 background-color: rgb(0 0 0 / 48%);
    opacity: 0.7;
}
</style>
<div class="main-content">
<div class="page-content">
<div class="container-fluid"> 

<div  id="load_div"  style="display:none">
</div>
<!-- start page title -->
<!--<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
<h4>Task</h4>
</div>
</div>
</div>-->
<!-- end page title -->

<div class="panel">
<div class="panel-body">
<div class="row">
<div class="col-sm-4"> 
<?php 
$fromDate=date('Y-m-d', strtotime(' -1 day'));
$toDate=date('Y-m-d');
if(isset($_POST['from_date']) && $_POST['from_date']!='')
{
	$fromDate=$_POST['from_date'];
}
if(isset($_POST['to_date']) && $_POST['to_date']!='')
{
	$toDate=$_POST['to_date'];
}
$cluster_id="";
$fromDate=$this->session->userdata('f_fromDate')=='' ? $fromDate:$this->session->userdata('f_fromDate');	
$toDate=$this->session->userdata('f_toDate')=='' ? $toDate:$this->session->userdata('f_toDate');	
$cluster_ids=$this->session->userdata('f_cluster_id')=='' ? $cluster_id:$this->session->userdata('f_cluster_id');	


?>
<!-- <h6 class="ftr-txt"><a href="#"><i class="mdi mdi-filter"></i> Filter <span class="badge bg-primary rounded-pill">3</span></a></h6>-->
<input type="hidden" id="from_date_input" value="<?php echo date('Y-m-d',strtotime($fromDate))?>" >
<input type="hidden" id="to_date_input"  value="<?php echo date('Y-m-d',strtotime($toDate))?>" >
<input type="hidden" id="cluster_id_input" value="<?php echo $cluster_ids;?>"  >
<button type="button" class="btn btn-success"
data-bs-toggle="modal" data-bs-target=".bs-example-modal-md1"><i class="mdi mdi-filter"></i> Filter <span class="badge bg-warning rounded-pill"></span></button>
</div>

<div class="col-sm-3">
<div id="btnContainer">
<button class="btn active" onclick="list_grid_view_div_load(1)"><i class="fa fa-th-large"></i> Grid</button>  
<button class="btn" onclick="list_grid_view_div_load(0)"><i class="fa fa-bars"></i> List </button>  
</div>

<!--
<div class="row">
<div class="column" style="background-color:#aaa;">
<h2>Column 1</h2>
<p>Some text..</p>
</div>
<div class="column" style="background-color:#bbb;">
<h2>Column 2</h2>
<p>Some text..</p>
</div>
</div>
<div class="row">
<div class="column" style="background-color:#ccc;">
<h2>Column 3</h2>
<p>Some text..</p>
</div>
<div class="column" style="background-color:#ddd;">
<h2>Column 4</h2>
<p>Some text..</p>
</div>
</div>
--> 
</div>
<div class="col-sm-3">

<input type="search" class="form-control" placeholder="Search" id="search_like" onkeyup="get_search_like_tasks_list()" onmouseover="get_search_like_tasks_list()" onmouseout="get_search_like_tasks_list()"  >

<!--<a href="<?php echo base_url()?>Tasks/add" class="btn btn-success waves-effect waves-light text-right mb-2"><i class="mdi mdi-plus-circle-outline"></i> Add Task</a>-->

</div>
<div class="col-sm-2">
<div class="form-check pull-right">
<?php if($this->session->userdata['auto_Refresh_on']){
$value_ref =$this->session->userdata['auto_Refresh_on'];
$checked_value_ref ='checked';
} else {
$value_ref= '0'; 
$checked_value_ref= ''; 
}?>
<input class="form-check-input" type="checkbox" value="<?php echo $value_ref;?>" id="auto_Refresh" name="auto_Refresh" onclick="get_refresh_active()"  <?php echo $checked_value_ref;?>>
<label class="form-check-label" for="defaultCheck1"> Auto Refresh </label>
</div>
</div>
</div>
</div>
</div>
<!-- end page title -->

<!-- removable-chips start here -->
<div class="col-sm-12 pl0 removable-chips-wrapper-parent-class">
<div class="col-sm-10 removable-chips-wrapper-class horizontal-scroll pl0"> <span class="removable-chips"> <span class="removableChips-title" id="session_filter_dates"><?php echo $fromDate;?> <b>to</b> <?php echo $toDate;?></span> &nbsp; <span class="removable-chips-remove-class"> x </span> </span> </div>
</div>
<!-- removable-chips end here -->



<div class="tabbable boxed parentTabs">
<ul class="nav nav-tabs  filter-tabs"  id="category_tabs_count_ajax_div" >
<li class="active">
<a href="javascript:void(0)" onclick="get_tasks_category_id_set(0)"  class="nav-link active">All <sup><span class="badge bg-success rounded-pill"> <?php echo $task_main_categories[0]->total_task_counts;?></span></sup></a> </li>

</ul> 
<div class="tab-content">
<div class="tab-pane fade in active show" id="set1">
<div class="tabbable">
<ul class="nav nav-tabs filter-tabs" id="status_tabs_count_ajax_div" >
<li class="active"><a href="javascript:void(0)" onclick="get_tasks_status_set(0)" class="nav-link <?php if($task_status == 0) { echo 'active'; }?>">All</a> </li>

</ul>

<input type="hidden" id="task_category_id" value="<?php echo $task_category_id;?>" >
<input type="hidden" id="task_status" value="<?php echo $task_status;?>" >
<div class="tab-content" id="" >
<div class="tab-pane fade in active show list_div_show" id="list_data_div"  style="display:none" >

</div>



<div class="tab-pane fade in active show grid_div_show">

<div class="card">
<div class="card-body">	
<div class="row"  id="grid_data_div">


</div>
</div>
</div>
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
<!-- Filters start here -->
<div class="col-sm-6 col-md-3 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-md1" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title mt-0">Filters</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"
aria-hidden="true"></button>
</div>
<div class="modal-body">
<form class="needs-validation" id="filters_form" enctype="multipart/form-data">
<div class="row">
<div class="col-6">
<div class="mb-3">

<label class="form-label">From Date</label>
<input class="form-control" type="date" id="from_date" name="from_date"  value="<?php echo $fromDate;?>" required>
<div class="invalid-feedback">Please provide a valid event name</div>
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label class="form-label">To Date</label>
<input class="form-control" type="date"  id="to_date" name="to_date" value="<?php echo $toDate;?>" required>
<div class="invalid-feedback">Please provide a valid event name</div>
</div>
</div>
<div class="col-6">
<div class="form-group">
<label for="input-datalist">Filter On</label>
<select class="form-select" aria-label="Default select example" name="column_name" required>
<option value="task_created_date">Creation Date</option>
<option value="task_assigned_date">Assigned Date</option>
</select>
</div>
</div>
<div class="col-6">
<div class="row">
<label for="input-datalist">Order By</label>
<div class="col-md-3">
<div class="form-check mb-3">
<input class="form-check-input" type="radio" name="order_by" id="formRadios1"  value="asc">
<label class="form-check-label" for="formRadios1"> Asc </label>
</div>
</div>
<!-- end col -->

<div class="col-md-9">
<div class="form-check">
<input class="form-check-input" type="radio" name="order_by" id="formRadios2" checked value="desc">
<label class="form-check-label" for="formRadios2"> Desc </label>
</div>
</div>
<!-- end col --> 
</div>
</div>

<input type="hidden" name="task_category_id" id="task_category_id_f" value="<?php echo $task_category_id;?>" >
<input type="hidden" name="task_status"  id="task_status_f" value="<?php echo $task_status;?>" >

<div class="col-12">
<div class="mb-3">
<div class="form-group">
<label for="input-datalist">Organization Unit</label>
<select class="form-select" aria-label="Default select example" name="cluster_id" id="cluster_id" >
<option value="">select</option>
<?php 
if(!empty($clusters_list)){
foreach($clusters_list as $key=>$cluster){
?> 
<option value="<?php echo $cluster->cluster_id;?>" ><?php echo $cluster->cluster_name?></option>
<?php } } ?>
</select>
</div>
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label for="input-datalist">Assigned To</label>
<select class="form-select" aria-label="Default select example" name="call_attend_by" >
<option value="">select</option>
<?php 
if(!empty($employees_list)){
foreach($employees_list as $key=>$employee){
if($employee->emp_role==2 || $employee->emp_role==3){ 
?> 
<option value="<?php echo $employee->emp_id;?>" ><?php echo $employee->emp_name?>(<?php echo $employee->emp_username?>)</option>
<?php } } } ?>

</select>
</div>
</div>
<div class="col-6">
<div class="mb-3">
<label for="input-datalist">Priority</label>
<select class="form-select" aria-label="Default select example" name="task_priority" >
<option value="">Search</option>
<option value="P1">P1</option>
<option value="P2">P2</option>
<option value="P3">P3</option>
<option value="P4">P4</option>
</select>
</div>
</div>
</div>
<div class="row mt-2">
<div class="col-6">
<button type="submit" id="submit_btn" class="btn btn-success">Apply <i class="flaticon-right-arrow-1"></i>

</div>
<!--
<div class="col-6 text-end">
<button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-success">Apply</button>
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
<!-- Filters end here --> 


<!--Add Note / Document start here -->
<div class="col-sm-6 col-md-3 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-md3" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title mt-0">Add  Document</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"
aria-hidden="true"></button>
</div>
<div class="modal-body">
<form class="needs-validation" action="<?php echo base_url();?>Tasks/add_notes_data/0" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
<div class="row">
<div class="col-md-4">
<div class="form-check mb-3">
<input class="form-check-input" type="radio" name="internal_type" id="formRadios1" checked="" value="0"  required>
<label class="form-check-label" for="formRadios1"> Internal </label>
</div>
</div>
<!-- end col -->
<input class="form-control" type="hidden" name="note_type" id="note_type"  value="0" >
<input class="form-control" type="hidden" name="task_id" id="task_id_new"  value="" >

<div class="col-md-8">
<div class="form-check">
<input class="form-check-input" type="radio" name="internal_type" id="formRadios2" value="1" >
<label class="form-check-label" for="formRadios2"> External </label>
</div>
</div>
<!-- end col -->
<input class="form-control" type="hidden" name="note" id="note"  value="" >

<!-- end col -->

<div class="col-12">
<div class="card">
<div class="card-body">
<div>

<div class="dz-message needsclick">
<div class="mb-3 text-center"> <i class="mdi mdi-cloud-upload-outline text-muted display-4"></i> </div>
<h4>Drop files here or click to upload.</h4>
</div>
</div>
<div class="text-center mt-4">
<input name="attachment" id="attachment" type="file" required>

</div>
</div>
</div>
</div>
<!-- end col --> 

</div>
</div>
</div>
<div class="row mt-2">
<div class="col-6"> 
<!--                <button type="button" class="btn btn-success">Submit</button>--> 
</div>
<div class="col-6 text-end"> 
<!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
<button type="submit" id="notes_add_btn"  class="btn btn-success">Submit</button>
</div>
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
<!-- Assign Task start here -->





<!--Add Note / Document start here -->
<div class="col-sm-6 col-md-3 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-notes_add" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title mt-0">Add Note </h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"
aria-hidden="true"></button>
</div>
<div class="modal-body">
<form class="needs-validation" action="<?php echo base_url();?>Tasks/add_notes_data/0" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
<div class="row">
<div class="col-md-4">
<div class="form-check mb-3">
<input class="form-check-input" type="radio" name="internal_type" id="formRadios1" checked="" value="0"  required>
<label class="form-check-label" for="formRadios1"> Internal </label>
</div>
</div>
<!-- end col -->
<input class="form-control" type="hidden" name="note_type" id="note_type"  value="1" >
<input class="form-control" type="hidden" name="task_id" id="task_id_new1"  value="" >
<input class="form-control" type="hidden" name="attachment" id="attachment"  value="" >

<div class="col-md-8">
<div class="form-check">
<input class="form-check-input" type="radio" name="internal_type" id="formRadios2" value="1" >
<label class="form-check-label" for="formRadios2"> External </label>
</div>
</div>
<!-- end col -->

<div class="col-md-12">
<textarea name="note" id="note" rows="4" class="form-control" placeholder="Note text" required></textarea>
</div>
<!-- end col -->


<!-- end col --> 

</div>
</div>
</div>
<div class="row mt-2">
<div class="col-6"> 
<!--                <button type="button" class="btn btn-success">Submit</button>--> 
</div>
<div class="col-6 text-end"> 
<!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
<button type="submit" id="notes_add_btn"  class="btn btn-success">Submit</button>
</div>
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
<!-- Add Note / Document end here --> 





<input type="hidden" id="set_old_pagno" value="0" >


<div class="col-sm-6 col-md-3 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-md2" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
<div class="modal-dialog modal-md2">
<div class="modal-content" id="assign_task_list_div">

</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 
</div>



<div class="col-sm-6 col-md-3 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-change_status" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
<div class="modal-dialog modal-change_status">
<div class="modal-content" id="status_task_list_div">

</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 
</div>




<div class="col-sm-6 col-md-3 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-notes_sow" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
<div class="modal-dialog modal-dialog-scrollable">
<div class="modal-content" id="notes_sow_list_div">

</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 
</div>

<div class="col-sm-6 col-md-3 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-md22" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
<div class="modal-dialog modal-md2">
<div class="modal-content" id="assign_task_emplist_div">

</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 
</div>

<link href="<?php echo site_url(); ?>assets/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!-- datatable start here --> 
<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery-3.5.1.js"></script> 
<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/dataTables.bootstrap5.min.js"></script>

<script>
function list_grid_view_div_load(type)
{	
console.log(type);
if(type == 1){
$('.grid_div_show').show();
$('.list_div_show').hide();
}else{
$('.list_div_show').show();
$('.grid_div_show').hide();
}
}




function get_tasks_status_set(task_status)
{
$('#task_status').val(task_status);
get_tasks_list();
}

function get_tasks_category_id_set(task_category_id)
{
$('#task_category_id').val(task_category_id);
get_tasks_list()
}



function get_search_like_tasks_list()
{
var search_like=$("#search_like").val();
console.log(search_like);
console.log(search_like.length);
if(search_like.length >= 3){
get_tasks_list();
}else if(search_like.length == 0){
get_tasks_list();
}
}



function get_tasks_status_tabs_list()
{	

var category_id=$("#task_category_id").val();
var task_status=$("#task_status").val();
var from_date=$("#from_date_input").val();
var to_date=$("#to_date_input").val();
var cluster_id=$("#cluster_id_input").val();
var search_like=$("#search_like").val();
$.ajax({
type: "post",
url:"<?php echo site_url(); ?>Tasks/get_tasks_status_tabs_count_list",
data:{"task_category_id":category_id,"task_status":task_status,"from_date":from_date,"to_date":to_date,"search_like":search_like,"cluster_id":cluster_id},
success:function(result)
{
var jsondata=JSON.parse(result); 
$('#status_tabs_count_ajax_div').html(jsondata['status_tabs_count_ajax_div']);
}
});
}	

function get_tasks_category_tabs_list()
{	

var category_id=$("#task_category_id").val();
var task_status=$("#task_status").val();
var from_date=$("#from_date_input").val();
var to_date=$("#to_date_input").val();
var search_like=$("#search_like").val();
var cluster_id=$("#cluster_id_input").val();
$.ajax({
type: "post",
url:"<?php echo site_url(); ?>Tasks/get_tasks_category_tabs_count_list",
data:{"task_category_id":category_id,"task_status":task_status,"from_date":from_date,"to_date":to_date,"search_like":search_like,"cluster_id":cluster_id},
success:function(result)
{
var jsondata=JSON.parse(result); 
$('#category_tabs_count_ajax_div').html(jsondata['category_tabs_count_ajax_div']);
}
});
}	




function get_tasks_list()
{	

get_tasks_status_tabs_list();
get_tasks_category_tabs_list();
var task_status=$("#task_status").val();
var category_id=$("#task_category_id").val();

var search_like=$("#search_like").val();
var from_date=$("#from_date_input").val();
var to_date=$("#to_date_input").val();
var cluster_id=$("#cluster_id_input").val();
$('#load_div').show();
// alert(category_id);
// alert(task_status);
$.ajax({
type: "post",
url:"<?php echo site_url(); ?>Tasks/get_tasks_list_ajax",
data:{"task_category_id":category_id,"task_status":task_status,"from_date":from_date,"to_date":to_date,"search_like":search_like,"cluster_id":cluster_id},
success:function(result)
{
$("#pagno").val(1);	
var jsondata=JSON.parse(result); 
$('#list_data_div').html(jsondata['list_ajax_div']);
$('#grid_data_div').html(jsondata['grid_ajax_div']);

$('#task_status').val(jsondata['task_status']);
$('#task_category_id').val(jsondata['task_category_id']);

$('#task_status_f').val(jsondata['task_status']);
$('#task_category_id_f').val(jsondata['task_category_id']);
$('#session_filter_dates').html(jsondata['session_filter_date']);
get_refresh_page(); 
$('#load_div').hide();
}
});
}	



$(document).ready(function(){
get_tasks_list();
$("#filters_form").on("submit", function(e){
e.preventDefault();		

$('#load_div').show();
$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
$("#submit_btn").attr("disabled",true);
$.ajax({
type: "post",
url:"<?php echo base_url()?>Tasks/task_search_filter_ajax",
data:$("#filters_form").serialize(),
success:function(result)
{		
var jsondata=JSON.parse(result); 
$.toast({heading: 'Success',text: 'Submitted successfully',showHideTransition: 'fade',position: 'top-right',icon: 'success'});
$("#submit_btn").html('Submit <i class="flaticon-right-arrow-1"></i> ');
$("#submit_btn").attr("disabled",false);
$('.bs-example-modal-md1').modal('hide');
$('#list_data_div').html(jsondata['list_ajax_div']);
$('#grid_data_div').html(jsondata['grid_ajax_div']);

$('#task_status').val(jsondata['task_status']);
$('#task_category_id').val(jsondata['task_category_id']);

$('#task_status_f').val(jsondata['task_status']);
$('#task_category_id_f').val(jsondata['task_category_id']);
$('#session_filter_dates').html(jsondata['session_filter_date']);
$('#from_date_input').val(jsondata['session_from_date']);
$('#to_date_input').val(jsondata['session_to_date']);
$('#cluster_id_input').val(jsondata['session_cluster_id']);

get_tasks_category_tabs_list();
get_tasks_status_tabs_list();
// $("#filters_form")[0].reset();
$('#load_div').hide();

}
});	
});	


});	




function getAssign_task_pop(task_id){	
page_type=0;
if(task_id != ''){
$.ajax({
type: "POST",    
dataType: "html",    
url: "<?php echo site_url(); ?>Tasks/get_task_assign_ajax",    
data: {task_id:task_id,page_type:page_type }})
.done(function(data){

$('#assign_task_list_div').html(data);
});
}
}




function getCHange_task_status_pop(task_id){	
page_type=0;
if(task_id != ''){
$.ajax({
type: "POST",    
dataType: "html",    
url: "<?php echo site_url(); ?>Tasks/get_task_status_update_ajax",    
data: {task_id:task_id,page_type:page_type }})
.done(function(data){

$('#status_task_list_div').html(data);
});
}
}


function getNotes_task_show_pop(task_id,note_type){	
if(task_id != ''){
$.ajax({
type: "POST",    
dataType: "html",    
url: "<?php echo site_url(); ?>Tasks/get_task_notes_sow_list_ajax",    
data: {task_id:task_id,note_type:note_type }})
.done(function(data){

$('#notes_sow_list_div').html(data);
});
}
}



function getTask_section_id_details(task_id){	

if(task_id != ''){			
$('#task_id_new').val(task_id);
$('#task_id_new1').val(task_id);
}
}	


function get_refresh_active(){	
var auto_Refresh=$("#auto_Refresh").val();
$.ajax({
type: "POST",    
dataType: "html",    
url: "<?php echo site_url(); ?>Tasks/get_task_auto_Refresh_ajax",    
data: {auto_Refresh:auto_Refresh }})
.done(function(data){
$('#auto_Refresh').val(data);
});

alert("Auto Refresh Changed Successfully");

window.location.reload(1);
}	



function get_refresh_page(){	
var auto_Refresh=$("#auto_Refresh").val();
if(auto_Refresh == '1'){
setTimeout(function(){
window.location.reload(1);
},5000);
}
}



function get_more_task_emp(task_id){	
page_type=0;
//alert(task_id);
if(task_id != ''){
$.ajax({
type: "POST",    
dataType: "html",    
url: "<?php echo site_url(); ?>Tasks/get_task_assign_ajax",    
data: {task_id:task_id,page_type:page_type }})
.done(function(data){

$('#assign_task_emplist_div').html(data);
});
}
}




function get_tasks_status_uat_retry(task_id)
{
	
			$page_type=0;
		$('#load_div').show();
			if(task_id != ''){
			$.ajax({
			type: "POST",    
			dataType: "html",    
			url: "<?php echo site_url(); ?>Tasks/get_tasks_status_new_uat_retry_update",    
			data: {task_id:task_id}})
			.done(function(data){

				console.log(data);
				get_tasks_list();
				$('#load_div').hide();
			});
			}
}

</script>
 
