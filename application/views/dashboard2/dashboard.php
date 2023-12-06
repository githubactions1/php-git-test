<style>
<link rel="shortcut icon" href="http://sifydev.digitalrupay.com:8008/dev/assets/images/favicon.png">

<!-- Bootstrap Css -->
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/css/icons.min.css" rel="stylesheet" type="text/css">
<!-- App Css -->
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
<!-- Custom Css -->
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/css/custom.css" rel="stylesheet" type="text/css">


<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

		<link rel="stylesheet" href="http://sifydev.digitalrupay.com:8008/dev/assets/css/jquery.toast.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
	 <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
</style>
<style> 
button.dshExitFullScreenButton {
    display: none !important;
}
</style>
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><script type="text/javascript" charset="UTF-8" src="https://maps.google.com/maps-api-v3/api/js/54/9/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.google.com/maps-api-v3/api/js/54/9/util.js"></script></head>

<div class="main-content">
    <div class="page-content">
       <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <h4>Dashboard</h4>
            </div>
          </div>
        </div>
	   <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="accordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Filters </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
          <form class="needs-validation" id="date_filters_form" enctype="multipart/form-data">

                      <div class="mb-3 row">
                        <div class="col-md-3">
                          <div class="form-group typebtn">
                            <label for="input-datalist">Type<span>*</span></label>
                            <select class="form-select" aria-label="Default select example" name="search_type" id="search_type">
                              <option value="1">Today's Summary</option>
                              <!--<option value="2">Attendance </option>-->
                              <option value="3" selected=""><a href="<?php echo base_url()?>dashboard2/attendance_list" >Productivity</a></option>
			
							                                <option value="4"><a href="<?php echo base_url()?>dashboard2/attendance_list1">API Request Data</a></option>
							                               <option value="5">Active Users Reports</option>
														   <option value="5">Active Users Reports</option>
                            </select>
                          </div>
                        </div>
                         <div class="col-md-3">
                          <div class="form-group">
                            <label for="example-datetime-local-input" class="col-form-label">From Date</label>
                            <input class="form-control" type="date" name="frmdate" <?php if(isset($_GET['frmdate']) && $_GET['frmdate']!=''){?> value="<?php echo $_GET['frmdate'];?>" <?php }else{ ?> value="<?php echo date("Y-m-d", strtotime("-1 day")); }?>" id="frmdate" max="<?php echo date("Y-m-d");?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="example-datetime-local-input" class="col-form-label">To Date</label>
                            <input class="form-control" type="date" name="todate"  <?php if(isset($_GET['todate']) && $_GET['todate']!=''){?> value="<?php echo $_GET['todate'];?>" <?php }else{ ?>value="<?php echo date("Y-m-d");}?>" id="todate"  max="<?php echo date('Y-m-d');?>">  <!-- min="<?php echo date("Y-m-01",strtotime("-2 month"));?>"-->
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <button type="submit" id="search" name="search" class="btn btn-success waves-effect waves-light gobtn">Go</button>
                          </div>
                        </div>
                      </div>
                      </form>
                      <!-- end row --> 
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- end col --> 
        </div>
        <!-- end row -->
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body"> 
            <!-- Nav tabs -->
			 <?php if($this->session->userdata['user']->emp_role == 1){ ?>
           <!--a href="<?php echo base_url()?>Managers/add" class="btn btn-success waves-effect waves-light text-right"><i class="mdi mdi-plus-circle-outline"></i> Add Manager</a-->
			 <?php } ?>
            <!-- Tab panes -->
			<h2>PAN India Productivity Report</h2>
            <div class="tab-content">
              <div class="tab-pane active" id="home-1" role="tabpanel">
                <div class="row">
                  <div class="col-12">
                    <div class="panel">
                      <div class="panel-body" style="height: 900px; overflow-y: scroll;">
					  
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
						  <tr>
	  <th rowspan="3" style="background-color: #c9df8a;color: black; text-align:center; font-size: 15px;">Zones</th>
      <th rowspan="3" style="background-color: #c9df8a; color: black; text-align:center; font-size: 15px;">Circle</th>
      <th colspan="5" style="background-color: #FED8B1; color: black; text-align:center; font-size: 15px;">Manpower Count</th>
      <th colspan="5" style="background-color: #C6FCFF; color: black; text-align:center; font-size: 15px;">Present Man Days</th>
      <th colspan="5" style="background-color: #FED8B1; color: black; text-align:center; font-size: 15px;">Tasks Completed</th>
      <th colspan="5" style="background-color: #C6FCFF; color: black; text-align:center; font-size: 15px;">Avg Task/Day</th>
	  
    </tr>
	
                            <tr>
                             
                              <th style="background-color: #FED8B1; color: black;">Total</th>
                              <th style="background-color: #FED8B1; color: black;">T1</th>
                              <th style="background-color: #FED8B1; color: black;"> T2</th>
                              <th style="background-color: #FED8B1; color: black;">T3</th>
							  <th style="background-color: #FED8B1; color: black;">T4</th>
							  <th style="background-color: #C6FCFF; color: black;">Total</th>
                              <th style="background-color: #C6FCFF; color: black;">T1</th>
                              <th style="background-color: #C6FCFF; color: black;">T2</th>
                              <th style="background-color: #C6FCFF; color: black;">T3</th>
							  <th style="background-color: #C6FCFF; color: black;">T4</th>
							  <th style="background-color: #FED8B1; color: black;">Total</th>
                              <th style="background-color: #FED8B1; color: black;">T1</th>
                              <th style="background-color: #FED8B1; color: black;">T2</th>
                              <th style="background-color: #FED8B1; color: black;">T3</th>
							  <th style="background-color: #FED8B1; color: black;">T4</th>
							  <th style="background-color: #C6FCFF; color: black;">Total</th>
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
							    <td ><?php echo $value->total_emplyee;?></td>
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
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- container-fluid --> 
  </div>
  
  
