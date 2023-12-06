<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/combo.css">

<div class="main-content">
<div class="page-content">
<div class="container-fluid"> 

<!-- start page title -->
<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
<h4>Reports</h4>
</div>
</div>
</div>
<!-- end page title -->

<div class="row" id="reports_search_div" >
<div class="col-xl-8">
<div class="card">
<div class="accordion">
<div class="accordion-item">
<h2 class="accordion-header" id="headingOne">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Filters </button>
</h2>
<form action="<?php echo base_url()?>Reports/reports_download_ajax" method="post"  id="filters_form"  onsubmit="reports_download_form()">

<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
<div class="accordion-body">
<div class="mb-3 row">
<div class="col-md-12">
<h4 class="set_report">Employee Details</h4>
<div class="form-group typebtn"> 
<!-- <label for="input-datalist">Type<span>*</span></label>-->
<select class="form-select" aria-label="Default select example"  name="report_type" id="report_type" onChange="Get_reports_wise_div()">
<option value="1" >Attendance History Report</option>
<option value="4">Task Dump Report</option>
</select>
<p>All Reports History </p>
</div>
</div>
</div>
<!-- end row -->

<div class="mb-3 row">
<div class="col-md-12">
<h4 class="set_report">Report Criteria</h4>
<p>Report By : </p>
<div class="form-group typebtn">

<div class="mb-3 row"  id="employees_div1">
<label for="example-text-input" class="col-md-2 col-form-label">Member Names <span></span></label>
<div class="col-md-10">
<input type="text" name="employee_ids"  class="form-control" id="justAnInputBox11" placeholder="Select" autocomplete="off" />
<input type="hidden" name="employee_id" class="form-control" id="employee_id_ids_hidden"  >
</div>
</div>


<div class="mb-3 row" id="managers_div1" style="display:none" >
<label for="example-text-input" class="col-md-2 col-form-label">Managers<span></span></label>
<div class="col-md-10">
<input type="text" name="managers_ids" class="form-control" id="justAnInputBox_M" placeholder="Select" autocomplete="off"/>
<input type="hidden" name="managers_id" class="form-control" id="manager_ids_hidden"  >
</div>
</div>

<div class="mb-3 row" id="clusters_div1">
<label for="example-text-input" class="col-md-2 col-form-label">Organizations<span></span></label>
<div class="col-md-10">
<input type="text" name="cluster_ids" class="form-control" id="justAnInputBox1" placeholder="Select" autocomplete="off"/>
<input type="hidden" name="cluster_id" class="form-control" id="cluster_id_ids_hidden"  >
</div>
</div>






<div class="mb-3 row">
<div class="row">
<div class="col-md-2">
<label for="example-text-input" class="col-form-label">Report Duration</label>
</div>
<div class="col-md-4">
<div>
<div class="form-check">
<input class="form-check-input" type="radio" name="form_date_type" id="formRadios1" value="1" onChange="get_export_dates_value(1)" >
<label class="form-check-label" for="formRadios1"> Last Day </label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="form_date_type" id="formRadios2" value="3"  onChange="get_export_dates_value(3)">
<label class="form-check-label" for="formRadios2"> Last Month </label>
</div>
</div>
</div>
<div class="col-md-4">
<div>
<div class="form-check">
<input class="form-check-input" type="radio" name="form_date_type" id="formRadios3"  value="2"  onChange="get_export_dates_value(2)">
<label class="form-check-label" for="formRadios3"> Last Week </label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="form_date_type" id="formRadios4" checked=""  value="4"  onChange="get_export_dates_value(4)">
<label class="form-check-label" for="formRadios4"> Advance </label>
</div>
</div>
</div>
</div>
</div>
<div class="row" id="advance_div" >
<div class="col-md-6">
<div class="form-group">
<label for="example-datetime-local-input" class="col-form-label">From Date</label>
<input class="form-control" type="date" name="fdate"  id="fdate" value="<?php echo date('Y');?>-<?php echo date('m')?>-<?php echo date('d')?>"   max="<?php echo date('Y-m-d');?>"  min="<?php echo date("Y-m-01",strtotime("-3 month"));?>" onChange="get_date_deff()">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="example-datetime-local-input" class="col-form-label">To Date</label>
<input class="form-control" type="date"  name="tdate"  id="tdate"  value="<?php echo date('Y');?>-<?php echo date('m')?>-<?php echo date('d')?>"   max="<?php echo date('Y-m-d');?>"  min="<?php echo date("Y-m-01",strtotime("-3 month"));?>" onChange="get_date_deff()">
</div>
</div>
</div>
</div>
</div>
</div>
<!-- end row -->
<span id="date_deff_ajax_div" class="text-danger"></span>
<input type="hidden" id="check_status" value="1" >
<div class="mb-3 mt-3 row">
<div class="col-md-12">
<div class="d-flex flex-wrap gap-2">
<a href="javascript:void(0)" onclick="get_view_reports_pdf_new()" data-bs-toggle="modal" data-bs-target=".bs-example-modal-pdf_reports_sow"   class="btn btn-success waves-effect waves-light">Show</a>
<button type="submit" id="submit_btn" class="btn btn-success waves-effect waves-light">Export Excel</button>
<a href="<?php echo base_url();?>Reports/reports_new" class="btn btn-success waves-effect waves-light">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<!-- end col --> 
</div>
<!-- end row --> 



<div class="row">
<div class="card">
<div class="card-body" id="task_attendance_pdf_div1" style="display:none" >
<iframe id="preview_data" src="<?php echo base_url();?>Reports/task_attendance_report_pdf" height="600px" width="100%" title="Dashboard"></iframe>
</div>


<div class="card-body" id="task_cluster_performance_report_pdf_div11" style="display:none" >
<iframe id="preview_data" src="<?php echo base_url();?>Reports/task_cluster_performance_report_pdf" height="600px" width="100%" title="Dashboard"></iframe>
</div>



</div>
</div>

</div>
<!-- container-fluid --> 
</div>
<!-- End Page-content --> 

</div>


<div class="col-sm-12 col-md-12 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-pdf_reports_sow" >
<div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
<div class="modal-content" id="pdf_reports_list_div">

</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 
</div>


<script src="<?php echo base_url();?>assets/js/comboTreePlugin.js"  type="text/javascript"></script> 
<script type="text/javascript">

function get_export_dates_value(date_type) {

var check_status=$("#check_status").val();
if(date_type == 4){
$("#advance_div").show();
if(check_status == 1){
$("#submit_btn").attr("disabled",false);	
}else {
$("#submit_btn").attr("disabled",true);
}
}else {
$("#advance_div").hide();	
$("#submit_btn").attr("disabled",false);	
}
}


function get_date_deff() {
var start=$("#fdate").val();
var end=$("#tdate").val();
console.log(start);
console.log(end);


$.ajax({
type: "post",
url:"<?php echo site_url(); ?>Reports/get_date_deff_details",
data:{"start":start,"end":end},
success:function(result)
{
var jsondata=JSON.parse(result); 
if(jsondata['diff_status'] == 1){
$("#submit_btn").attr("disabled",false);

}else if(jsondata['diff_status'] == 2){
alert('Date range is invalid');
//$("#fdate").val(jsondata['start_date']);
//$("#tdate").val(jsondata['end_date']);
$("#submit_btn").attr("disabled",true);
}else {
alert('Date range should not be greater than one month');
//$("#fdate").val(jsondata['start_date']);
//$("#tdate").val(jsondata['end_date']);
$("#submit_btn").attr("disabled",true);
}
$("#check_status").val(jsondata['diff_status']);

}
});

}




function reports_download_form() {
$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
$("#submit_btn").attr("disabled",true);

setTimeout(function(){
$("#submit_btn").html('Export Excel');
$("#submit_btn").attr("disabled",false);

;}, 10000);
}



function Get_reports_wise_div(){

$('#task_cluster_performance_report_pdf_div').hide();
$('#task_attendance_pdf_div').hide();

var report_type=$("#report_type").val();
if(report_type == 5){
$('#clusters_div1').hide();
$('#employees_div1').hide();
$('#managers_div1').show();
// $('#justAnInputBox1').attr('required',true);
// $('#justAnInputBox11').attr('required',false);
}else{
$('#clusters_div1').show();
$('#employees_div1').show();
$('#managers_div1').hide();
// $('#justAnInputBox11').attr('required',true);
// $('#justAnInputBox1').attr('required',false);

}
}


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


var SampleJSONData2 = [
<?php 
if(!empty($employees_list)){
foreach($employees_list as $key1=>$employee){
if($employee->emp_role == 2 || $employee->emp_role == 3){ 
?> 
{
id: <?php echo $employee->emp_id;?>,
title: '<?php echo $employee->emp_name?>',
},
<?php }  ?>
<?php } } ?>
];


var SampleJSONData3 = [
<?php 
if(!empty($managers_list)){
foreach($managers_list as $key1=>$employee){
if($employee->emp_role != 2 || $employee->emp_role != 3){ 
?> 
{
id: <?php echo $employee->emp_id;?>,
title: '<?php echo $employee->emp_name?>',
},
<?php }  ?>
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
});




comboTree4 = $('#justAnInputBox11').comboTree({
source : SampleJSONData2,
isMultiple: true,
cascadeSelect: true,
withSelectAll: true
});
comboTree4.onChange(function(){
console.log(comboTree4.getSelectedIds());
$('#employee_id_ids_hidden').val(comboTree4.getSelectedIds());
});

comboTree5 = $('#justAnInputBox_M').comboTree({
source : SampleJSONData3,
isMultiple: true,
cascadeSelect: true,
withSelectAll: true
});
comboTree5.onChange(function(){
console.log(comboTree5.getSelectedIds());
$('#manager_ids_hidden').val(comboTree5.getSelectedIds());
});






});


function get_view_reports_pdf_new(){	
$.ajax({
type: "post",
url:"<?php echo base_url()?>Reports/get_view_reports_pdf_new",
data:$("#filters_form").serialize(),
success:function(data)
{		
var jsondata=JSON.parse(data); 

$('#pdf_reports_list_div').html(jsondata['reports_ajax_div']);
}
});	
}


function get_view_reports_pdf(){	
var report_type=$("#report_type").val();
if(report_type == 1){
$.ajax({
type: "post",
url: "<?php echo site_url(); ?>Reports/task_attendance_report_pdf",    
data:$("#filters_form").serialize(),
success:function(data)
{
//$('#reports_search_div').hide();
$('#task_attendance_pdf_div').show();
$('#task_cluster_performance_report_pdf_div').hide();
}
});
}else if(report_type == 3){
$.ajax({
type: "post",
url: "<?php echo site_url(); ?>Reports/task_cluster_performance_report_pdf",    
data:$("#filters_form").serialize(),
success:function(data)
{
//$('#reports_search_div').hide();
$('#task_cluster_performance_report_pdf_div').show();
$('#task_attendance_pdf_div').hide();
}
});
}


}


</script>