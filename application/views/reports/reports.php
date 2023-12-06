<div class="main-content">
<div class="page-content">
<div class="container-fluid"> 

<!-- start page title -->
<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
<h4>Reprts</h4>
</div>
</div>
</div>
<!-- end page title -->
<form action="<?php echo base_url()?>Reports/get_employeereports" method="post">
<div class="row">
<div class="col-xl-8">
<div class="card">
<div class="accordion">
<div class="accordion-item">
<h2 class="accordion-header" id="headingOne">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Filters </button>
</h2>
<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
<div class="accordion-body">
<div class="mb-3 row">
<div class="col-md-12">
<h4 class="set_report">Employee Details</h4>
<div class="form-group typebtn"> 
<!-- <label for="input-datalist">Type<span>*</span></label>-->
<select class="form-select" aria-label="Default select example" name="report_type" id="report_type">
<!--<option selected>Attendence History Report</option>-->
<option value="1">Employee Reports</option>
<option value="2">Attendence Reports</option>
</select>
<p>Employee Daily Attendence History </p>
</div>
</div>
</div>
<!-- end row -->

<div class="mb-3 row">
<div class="col-md-12">
<h4 class="set_report">Report Criteria</h4>
<p>Report By : </p>
<div class="form-group typebtn">
<div class="mb-3 row">
<label for="example-text-input" class="col-md-2 col-form-label">Member Name <span>*</span></label>
<div class="col-md-10">
<select class="form-select" aria-label="Default select example" name="emp_id" <?php if(isset($_REQUEST['emp_id']) && $_REQUEST['emp_id']!='');?>>
<option  value="">Not Selected</option>
<?php
foreach($employees_list as $employeeslist)
{
?>

<option value="<?php echo $employeeslist->emp_id; ?>" <?php if ($_POST['emp_id']==$employeeslist->emp_id){
echo 'selected="selected"';
}?>><?php echo $employeeslist->emp_name; ?></option>

<?php
}
?>
</select>
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
<input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
<label class="form-check-label" for="formRadios1"> Last Day </label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
<label class="form-check-label" for="formRadios2"> Last Month </label>
</div>
</div>
</div>
<div class="col-md-4">
<div>
<div class="form-check">
<input class="form-check-input" type="radio" name="formRadios" id="formRadios3" checked="">
<label class="form-check-label" for="formRadios3"> Last Week </label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="formRadios" id="formRadios4">
<label class="form-check-label" for="formRadios4"> Advance </label>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="example-datetime-local-input" class="col-form-label">From Date</label>
<input class="form-control" type="date"  id="example-datetime-local-input"name="fdate" <?php if(isset($_REQUEST['fdate']) && $_REQUEST['fdate']!=''){?> value="<?php echo $_REQUEST['fdate']; ?>" <?php } ?>>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="example-datetime-local-input" class="col-form-label">To Date</label>
<input class="form-control" type="date"  id="example-datetime-local-input" name="tdate" <?php if(isset($_REQUEST['tdate']) && $_REQUEST['tdate']!=''){?> value="<?php echo $_REQUEST['tdate']; ?>" <?php } ?>>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- end row -->

<div class="mb-3 mt-3 row">
<div class="col-md-12">
<div class="d-flex flex-wrap gap-2">
<input type="submit" name="show" value="Show" class="btn btn-success waves-effect waves-light">
<!--<button type="button" class="btn btn-success waves-effect waves-light" id="details_show">Show</button>-->
<button type="button" class="btn btn-success waves-effect waves-light" id="export_details">Export Excel</button>
<button type="button" class="btn btn-success waves-effect waves-light">Cancel</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- end col --> 
</div>
</form>
<!-- end row --> 

</div>
<!-- container-fluid --> 
</div>

</div>
<?php
if(isset($_POST['show']) && $_POST['show']!="" && $_POST['report_type']==1 ){
?>
<div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
				
                 <tr>
                    <th>S No</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Shift Name</th>
					<th>Leaves</th>
					<th>Employment Type</th>
                    <th>Vendor Code</th>
					<th>Vendor Name</th>
                    <th>User Name</th>
                    <th>Address</th>
                    <th>Skills</th>
                    <th>Onboarding Date</th>
					<th>City Name</th>
                  </tr>
				  
                </thead>
                <tbody>
				<?php
				$i=1;
				foreach($employeedata as $employeedetails){
					
				?>
                 <tr>
<td><?php echo $i++;;?></td>
<td><?php echo $employeedetails->Name;?></td>
<td><?php echo $employeedetails->Mobile_Number;?></td>
<td><?php echo $employeedetails->Email_Id;?></td>
<td><?php echo $employeedetails->Designation;?></td>
<td><?php echo $employeedetails->Shift_Name;?></td>
<td><?php echo $employeedetails->Leaves;?></td>
<td><?php echo $employeedetails->Employment_Type;?></td>
<td><?php echo $employeedetails->Vendor_Code;?></td>
<td><?php echo $employeedetails->Vendor_Name;?></td>
<td><?php echo $employeedetails->User_Name;?></td>
<td><?php echo $employeedetails->Address;?></td>
<td><?php echo $employeedetails->Skills;?></td>
<td><?php echo $employeedetails->Onboarding_Date;?></td>
<td><?php echo $employeedetails->City_Name;?></td>
</tr>
				  <?php
				}
				  ?>
                
                 
                </tbody>
              </table>
              <div class="col-md-12">
			          
                <!--<button type="submit" class="btn btn-success total">Add</button>
				<button type="button" class="btn btn-success total" data-bs-toggle="modal" data-bs-target="#add_vendor">
				Add</button>-->
                
              </div>
            </div>
          </div>
        </div>
        <!-- end col --> 
      </div>
    </div>
    <!-- container-fluid --> 
  </div>
  <?php
}
  ?>
<?php
if(isset($_POST['show']) && $_POST['show']!="" && $_POST['report_type']==2 ){
?>
<div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
				
                 <tr>
                    <th>S No</th>
                    <th>Name</th>
                    <th>Shift Name</th>
					<th>Shift Start</th>
                    <th>Punch IN Time</th>
                    <th>Shift End</th>
                    <th>Punch Out Time</th>
					<th>Timedate</th>
					<th>Status</th>
					<th>In Time Status</th>
                    <th>IN Time</th>
					<th>Out Time</th>
                    <th>Workinghours</th>
                    <th>Punch In locn</th>
                    <th>Punch In Km</th>
                    <th>Punch Out Km</th>
					<th>Coordinates</th>
                  </tr>
				  
                </thead>
                <tbody>
				<?php
				$i=1;
				foreach($employeedata as $employeedetails){
					
				?>
                 <tr>
<td><?php echo $i++;;?></td>
<td><?php echo $employeedetails->emp_name;?></td>
<td><?php echo $employeedetails->shift_name;?></td>
<td><?php echo $employeedetails->shift_start;?></td>
<td><?php echo $employeedetails->punch_in_time;?></td>
<td><?php echo $employeedetails->shift_end;?></td>
<td><?php echo $employeedetails->punch_out_time;?></td>
<td><?php echo $employeedetails->timedate;?></td>
<td><?php echo $employeedetails->status;?></td>
<td><?php echo $employeedetails->in_time;?></td>
<td><?php echo $employeedetails->in_time_sts;?></td>
<td><?php echo $employeedetails->out_time;?></td>
<td><?php echo $employeedetails->workinghours;?></td>
<td><?php echo $employeedetails->punch_in_locn;?></td>
<td><?php echo $employeedetails->punch_in_km;?></td>
<td><?php echo $employeedetails->punch_out_km;?></td>
<td><?php echo $employeedetails->coordinates;?></td>
</tr>
				  <?php
				}
				  ?>
                
                 
                </tbody>
              </table>
              <div class="col-md-12">
			          
                <!--<button type="submit" class="btn btn-success total">Add</button>
				<button type="button" class="btn btn-success total" data-bs-toggle="modal" data-bs-target="#add_vendor">
				Add</button>-->
                
              </div>
            </div>
          </div>
        </div>
        <!-- end col --> 
      </div>
    </div>
    <!-- container-fluid --> 
  </div>
  <?php
}
  ?>
<!-- container-fluid --> 



<script>
$(document).ready(function(){
	//$("#show_details").hide();
	$("#details_show").on("click",function(){
	var type= $("#report_type").val();	
	$.ajax({
type: "post",
url: "<?php echo base_url()?>Reports/get_employeereports",
data: {type:type},
success: function(data){
	alert(data);
	$("#show_details").html(data);

}
});
	
	});
});
</script>
	
	
	