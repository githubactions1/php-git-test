
<style>
button.dshExitFullScreenButton {
    display: none !important;
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

.accordion-body {
    padding: 0.25rem 1.05rem !important;
}
.card {
    margin-bottom: 5px;
}
</style>
 <div class="main-content">
    <div class="page-content">
      <div class="container-fluid"> 
        
        <!-- start page title -->
        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <h4>Dashboard</h4>
            </div>
          </div>
        </div>
        <!-- end page title -->
        
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
                            <select class="form-select" aria-label="Default select example" name="search_type"  id="search_type" >
                              <option value="1">Today's Summary</option>
                              <!--<option value="2">Attendance </option>-->
                               <option value="3" >Productivity</option><a href="<?php echo base_url()?>dashboard2/attendance_list" class="btn btn-success waves-effect waves-light text-right"></i> Add Manager</a>
			<?php if($this->session->userdata['user']->emp_role == 1){ ?>
                              <option value="4">API Request Data</option>
							  <?php } ?>
                             <option value="5" >Active Users Reports</option>
							 <option value="6" selected="">Employee Wise Productivity Report</option>
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
                            <button type="submit" id="date_filters_submit_btn" class="btn btn-success waves-effect waves-light gobtn">Go</button>
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
        
     
		
		
		
		
		 <div class="row" >
          <div class="col-xl-12">
		  <div  id="load_div" style="display:none;"> </div>
          <div class="card" id="preview_data" >
		  
			<h3 class="text-center">Employee Wise Productivity Report</h3>
				 <div class="row">
                    <div class="col-12">
                    <div class="panel">
                      <div class="panel-body" style="height: 751px; overflow-y: scroll;">
                          <table id="datatable" class="table table-bordered dt-responsive nowrap"
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

				
	// Fill in the combined_data array with data from other arrays
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
	//print_r($combined_data[$emp_id]);exit;		

//echo '<pre>';print_r($combined_data);exit;
	

	//print_r($combined_data);exit;
    foreach ($combined_data as $emp_id => $data) {
    $employee = $data['employee'];
    $attndcnt = $data['attndcnt'];
    $taskcnt = $data['taskcnt'];
    $avrgcnt = $data['avrgcnt'];
	
				
        ?>
        



						
                            <!--tr>
							
							    <td><?php echo $value->emp_name;?></td>
								<td><?php echo $value->emp_code;?></td>
							    <td ><?php echo $value->cluster_name;?></td>
								<td><?php echo $value->zone_name; ?></td>
								<td><?php echo $value->state_name; ?></td>
								<td><?php echo $taskcnt_list1[$key]->total_task; ?></td>
								<td><?php echo $attndcnt_list1[$key]->total_attnd; ?></td>
						
							    <td><?php echo $avrgcnt_list1[$key]->total_AVGTASK_per_DAY; ?></td>
								
                            </tr-->
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
           
          </div>
          </div>
        </div>
		
		
		
		
		
		
		
        
        <!--<div class="row">
          <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tasks and Assign</h4>
                <p class="card-title-desc">Alerts are available for any length of text, as well as an optional dismiss button. For proper styling, use one of the four <strong>required</strong> contextual classes For inline dismissal, use the alerts jQuery plugin.</p>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-sm-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Assignment Status</h4>
                <div class="assign">
                  <ul>
                    <li><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Approved</li>
                    <li><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Field Cancelled</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">TAT Travel Time Queue Delay Execution Time</h4>
                <div class="row">
                  <div class="col-4">
                    <h5 class="mb-0 font-size-20 text-truncate">86541</h5>
                    <p class="text-muted text-truncate">Activated</p>
                  </div>
                  <div class="col-4">
                    <h5 class="mb-0 font-size-20 text-truncate">86541</h5>
                    <p class="text-muted text-truncate">Pending</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>-->
        
        <!-- end row -->
        
        <div class="col-sm-6 col-md-3 mt-4"> 
          <!--  Modal content for the above example -->
          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title mt-0" id="myLargeModalLabel">Modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" name="event-form" id="form-event" novalidate>
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Event Name</label>
                          <input class="form-control" placeholder="Insert Event Name"
                                                            type="text" name="title" id="event-title" required value="" />
                          <div class="invalid-feedback">Please provide a valid event name</div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Category</label>
                          <select class="form-control custom-select" name="category"
                                                            id="event-category">
                            <option selected> --Select-- </option>
                            <option value="bg-danger">Danger</option>
                            <option value="bg-success">Success</option>
                            <option value="bg-primary">Primary</option>
                            <option value="bg-info">Info</option>
                            <option value="bg-dark">Dark</option>
                            <option value="bg-warning">Warning</option>
                          </select>
                          <div class="invalid-feedback">Please select a valid event category</div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-6">
                        <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                      </div>
                      <div class="col-6 text-end">
                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
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
      </div>
      <!-- container-fluid --> 
    </div>
    <!-- End Page-content --> 
    
  </div>


  
  <script  type="text/javascript">
   
   
   
	   function Get_state_list(){
		var zone_id = $('#zone_id1').val();
		$.ajax({
		type: "post",
		url: "<?php echo base_url()?>Settings/getstatebyzoneid",
		data: {z_id:zone_id},
		success: function(data){
		$('#state_id1').html(data);
		}
		});
	}


	function Get_clusters_list(){
		var state_id = $('#state_id1').val();
		var zone_id = $('#zone_id1').val();
		$.ajax({
		type: "post",
		url: "<?php echo base_url()?>Dashboard/getclusters_by_state_id",
		data: {zone_id:zone_id,state_id:state_id},
		success: function(data){
		$('#cluster_id1').html(data);
		}
		});
	}






/*	$(document).ready(function(){
			$("#date_filters_form").on("submit", function(e){
				e.preventDefault();		
		var search_type = $('#search_type').val();
				   
					$("#date_filters_submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
				$("#date_filters_submit_btn").attr("disabled",true);
				if(search_type == 2){
					$.ajax({
						type: "post",
						url:"<?php echo base_url()?>Dashboard/dashboard_attendance",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							var jsondata=JSON.parse(result); 
							
							$('#preview_data').html(jsondata['dashboard_ajax_div']);
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
				if(search_type == 1){
					$.ajax({
						type: "post",
						url:"<?php echo base_url()?>Dashboard/dashboard_today_summary",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							var jsondata=JSON.parse(result); 
							$('#preview_data').html(jsondata['dashboard_ajax_div']);
							
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
					if(search_type == 3){
						$('#load_div').show();
					$.ajax({
						type: "post",
						url:"<?php echo base_url()?>Dashboard/dashboard_performance_data",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							$('#load_div').hide();
							var jsondata=JSON.parse(result); 
							//$('#preview_data').html(jsondata['dashboard_ajax_div']);
							$('#preview_data').html(jsondata['dashboard_ajax_div1']);
							
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
				
				if(search_type == 4){
					$.ajax({
						type: "post",
						url:"<?php echo base_url()?>Dashboard/dashboard_api_requests_data",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							var jsondata=JSON.parse(result); 
							$('#preview_data').html(jsondata['dashboard_ajax_div']);
							
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
				if(search_type == 6){
					$.ajax({
						type: "post",
						url:"<?php echo base_url()?>Dashboard2/get_emp_wise_Productivity_list",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							var jsondata=JSON.parse(result); 
							$('#preview_data').html(jsondata['dashboard_ajax_div']);
							
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
			});	
			
			
		});	*/
</script>