
<style>
button.dshExitFullScreenButton {
    display: none !important;
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
                              <option value="3" selected>Productivity</option>
							  <?php if($this->session->userdata['user']->emp_role == 1){ ?>
                              <option value="4">API Request Data</option>
							  <?php } ?>
                             <option value="5">Active Users Reports</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="example-datetime-local-input" class="col-form-label">From Date</label>
                            <input class="form-control" type="date" name="frmdate" value="<?php echo $frmdate;?>" id="example-datetime-local-input"  max="<?php echo date('Y-m-d');?>"  min="<?php echo date("Y-m-01",strtotime("-2 month"));?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="example-datetime-local-input" class="col-form-label">To Date</label>
                            <input class="form-control" type="date" name="todate"  value="<?php echo $todate;?>" id="example-datetime-local-input"  max="<?php echo date('Y-m-d');?>"  min="<?php echo date("Y-m-01",strtotime("-2 month"));?>">
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
          <div class="card" id="preview_data" >
             
           
          </div>
          </div>
        </div>
		
		
		
		
		
        
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






	$(document).ready(function(){
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
					$.ajax({
						type: "post",
						url:"<?php echo base_url()?>Dashboard/dashboard_performance_data",
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
				
				if(search_type == 5){
					$.ajax({
						type: "post",
						url:"<?php echo base_url()?>Dashboard/dashboard_active_users_reports_data",
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
			
			
		});	
</script>