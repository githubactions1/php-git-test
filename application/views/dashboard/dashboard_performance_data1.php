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
			<h3 class="text-center">PAN India Productivity Report</h3>
         </div>
                    <div class="col-md-6"> 
            <a href="<?php echo base_url()?>Dashboard/pan_india_productivity_download_reports/<?php echo $frmdate;?>/<?php echo $todate;?>" class="btn btn-success waves-effect waves-light pull-right"><i class="mdi mdi-download-circle-outline"></i> Export All Data</a>
		   </div> </div>
				<div class="row">
                    <div class="col-12">
                    <div class="panel">
                      <div class="panel-body" style="height: 751px; overflow-y: scroll;">
                       
							
						<table id="datatable-buttons" class="table table-striped table-bordered  nowrap"
						style="border-collapse: collapse; border-spacing: 0; width: 100%;">	
                          <thead>
						 	  <tr>
	  <th  style="background-color: #c9df8a;color: black; text-align:center; font-size: 15px;">Zones</th>
      <th style="background-color: #c9df8a; color: black; text-align:center; font-size: 15px;">Circle</th>
	  
                             
                              <th style="background-color: #FED8B1; color: black;">Total Manpower</th>
                              <th style="background-color: #FED8B1; color: black;">T1</th>
                              <th style="background-color: #FED8B1; color: black;"> T2</th>
                              <th style="background-color: #FED8B1; color: black;">T3</th>
							  <th style="background-color: #FED8B1; color: black;">T4</th>
							  <th style="background-color: #C6FCFF; color: black;">Total PresentMan Days</th>
                              <th style="background-color: #C6FCFF; color: black;">T1</th>
                              <th style="background-color: #C6FCFF; color: black;">T2</th>
                              <th style="background-color: #C6FCFF; color: black;">T3</th>
							  <th style="background-color: #C6FCFF; color: black;">T4</th>
							  <th style="background-color: #FED8B1; color: black;">Total Tasks Completed</th>
                              <th style="background-color: #FED8B1; color: black;">T1</th>
                              <th style="background-color: #FED8B1; color: black;">T2</th>
                              <th style="background-color: #FED8B1; color: black;">T3</th>
							  <th style="background-color: #FED8B1; color: black;">T4</th>
							  <th style="background-color: #C6FCFF; color: black;">Total Avg Task/Day</th>
                              <th style="background-color: #C6FCFF; color: black;">T1</th>
                              <th style="background-color: #C6FCFF; color: black;">T2</th>
                              <th style="background-color: #C6FCFF; color: black;">T3</th>
							  <th style="background-color: #C6FCFF; color: black;">T4</th>
                            </tr>
                          </thead>
                          <tbody>
						 

							<?php 
							
							if(!empty($emplyeecnt_list)){
						
	
foreach ($emplyeecnt_list as $key=>$value) {
				
        ?>
        
  

						
                            <tr>
							
							    <td><?php echo $value->zone_name;?></td>
								<td><?php echo $value->state_name;?></td>
							    <td><?php echo $value->total_emplyee;?></td>
								<td><?php echo $value->T1_emplyee_count; ?></td>
								<td><?php echo $value->T2_emplyee_count; ?></td>
								<td><?php echo $value->T3_emplyee_count; ?></td>
								<td><?php echo $value->T4_emplyee_count; ?></td>
						
							    <td><?php echo $attndcnt_list[$key]->total_attnd; ?></td>
								<td><?php echo $attndcnt_list[$key]->T1_attnd_count; ?></td>
								<td><?php echo $attndcnt_list[$key]->T2_attnd_count; ?></td>
								<td><?php echo $attndcnt_list[$key]->T3_attnd_count; ?></td>
								<td><?php echo $attndcnt_list[$key]->T4_attnd_count; ?></td>
							
					           <td><?php echo $taskcnt_list[$key]->total_task; ?></td>
								<td><?php echo $taskcnt_list[$key]->T1_task_count; ?></td>
								<td><?php echo $taskcnt_list[$key]->T2_task_count; ?></td>
								<td><?php echo $taskcnt_list[$key]->T3_task_count; ?></td>
								<td><?php echo $taskcnt_list[$key]->T4_task_count; ?></td>
							
							     <td><?php echo $avrgcnt_list[$key]->total_AVGTASK_per_DAY;?></td>
								<td><?php echo $avrgcnt_list[$key]->T1_AVGTASK_per_DAY_count; ?></td>
								<td><?php echo $avrgcnt_list[$key]->T2_AVGTASK_per_DAY_count; ?></td>
								<td><?php echo $avrgcnt_list[$key]->T3_AVGTASK_per_DAY_count; ?></td>
								<td><?php echo $avrgcnt_list[$key]->T4_AVGTASK_per_DAY_count; ?></td>
							
								
                            </tr>
							<?php } }?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- end col --> 
                </div>
             
			 


<!-- JAVASCRIPT --> 
<script>
</script>

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