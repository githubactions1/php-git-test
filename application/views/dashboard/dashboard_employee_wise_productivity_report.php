<style>
<link rel="shortcut icon" href="http://sifydev.digitalrupay.com:8008/dev/assets/images/favicon.png">


<!-- Bootstrap Css -->
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css -->
<link href="<?php echo base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<!-- Custom Css -->
<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />


<link href="<?php echo base_url();?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.toast.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</style>
<style> 
button.dshExitFullScreenButton {
    display: none !important;
}
</style>

				<div class="row">
				<div class="col-md-2"> </div> 
				<div class="col-md-4">  
				<h3 class="text-center">Employee Wise Productivity Report</h3>
				</div>
				<div class="col-md-6"> 
				<a href="<?php echo base_url()?>Dashboard/employee_wise_productivity_reports_download/<?php echo $frmdate;?>/<?php echo $todate;?>" class="btn btn-success waves-effect waves-light pull-right"><i class="mdi mdi-download-circle-outline"></i> Export All Data</a>
				</div> </div>

				 <div class="row">
                    <div class="col-12">
                    <div class="panel">
                      <div class="panel-body" style="height: 751px; overflow-y: scroll;">
                          <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
						 	
                            <tr>
                             
                              <td style="background-color: #FED8B1; color: black;">Employee Name</td>
                              <td style="background-color: #C6FCFF; color: black;">Employee Code</td>
                              <td style="background-color: #FED8B1; color: black;">FSM Group</td>
                              <th style="background-color: #C6FCFF; color: black;">Circle</th>
							  <th style="background-color: #FED8B1; color: black;">Region</th>
							  <th style="background-color: #C6FCFF; color: black;">Task Completed</th>
							  <th style="background-color: #FED8B1; color: black;">Present Days</th>
							  <th style="background-color: #C6FCFF; color: black;">Productivity</th>
                             
                            </tr>
	 
                            
                          </thead>
                          <tbody>
						 

							<?php 
							if (!empty($emp_wise_productivity_list)) {
								//print_r($emp_wise_productivity_list);exit;
	$combined_data = [];	
foreach ($emp_wise_productivity_list->emplyeecnt as $employee) {
    $emp_id = $employee->emp_id;

    // Initialize the combined data for this emp_id
    $combined_data[$emp_id] = [
        'employee' => $employee,
        'attndcnt' => null,
        'taskcnt' => null,
        'avrgcnt' => null,
    ];
}

				
foreach ($emp_wise_productivity_list->attndcnt as $attndcnt) {
    $emp_id = $attndcnt->emp_id;
    if (isset($combined_data[$emp_id])) {
        $combined_data[$emp_id]['attndcnt'] = $attndcnt;
    }
}

foreach ($emp_wise_productivity_list->taskcnt as $taskcnt) {
    $emp_id = $taskcnt->emp_id;
    if (isset($combined_data[$emp_id])) {
        $combined_data[$emp_id]['taskcnt'] = $taskcnt;
    }
}

foreach ($emp_wise_productivity_list->avrgcnt as $avrgcnt) {
    $emp_id = $avrgcnt->emp_id;
    if (isset($combined_data[$emp_id])) {
        $combined_data[$emp_id]['avrgcnt'] = $avrgcnt;
    }
}

	

	//print_r($combined_data);exit;
    foreach ($combined_data as $emp_id => $data) {
    $employee = $data['employee'];
    $attndcnt = $data['attndcnt'];
    $taskcnt = $data['taskcnt'];
    $avrgcnt = $data['avrgcnt'];
	
				
        ?>
        
							<tr>
            <td><?php echo $employee->emp_name; ?></td>
            <td><?php echo $employee->emp_code; ?></td>
            <td><?php echo $employee->cluster_name; ?></td>
            <td><?php echo $employee->zone_name; ?></td>
            <td><?php echo $employee->state_name; ?></td>
            <td><?php echo $taskcnt->total_task; ?></td>
            <td><?php echo $attndcnt->total_attnd; ?></td>
            <td><?php echo $avrgcnt->total_AVGTASK_per_DAY; ?></td>
        </tr>
							<?php } }?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- end col --> 
                </div>
           

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
<script src="<?php echo base_url();?>assets/libs/select2/js/select2.min.js"></script> 


<!--<script src="<?php echo base_url();?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> -->

<script src="<?php echo base_url();?>assets/libs/spectrum-colorpicker2/spectrum.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/pages/form-advanced.init.js"></script> 

<!-- Datatable init js --> 
<script src="<?php echo base_url();?>assets/js/pages/datatables.init.js"></script> 

<!--new js -->