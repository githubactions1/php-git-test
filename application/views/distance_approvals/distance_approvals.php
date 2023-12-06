<div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title-box">
            <h4>Distance Approvals</h4>
            <ol class="breadcrumb m-0">
            </ol>
          </div>
        </div>
      </div>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body"> 
            <!-- Nav tabs -->
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="home-1" role="tabpanel">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th>S.no</th>
                              <th>Date Created</th>
                              <th>Zone</th>
                              <th>Circle</th>
                              <th>FSM</th>
                              <th>Employee Details</th>
                              <th>Task Details</th>
                              <th>Task Main Distance</th>
                              <th>Employee Reported  Distance</th>
                              <th>Approved Distance</th>
                              <th>Emp Remarks</th>
                              <th>Mangr Remarks</th>
                              <th>Status</th>
                              <th>Approved/Rejected By </th>
                            </tr>
                          </thead>
                          <tbody>
								<?php 
								if(!empty($distance_approvals_list)){
								foreach($distance_approvals_list as $key=>$distance){
								?> 
								<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo Datetimeconversion($distance->i_ts); ?> </td>
								<td><?php echo $distance->zone_name; ?></td>
								<td><?php echo $distance->state_name; ?></td>
								<td><?php echo $distance->cluster_name; ?></td>
								
								<td><?php echo $distance->emp_name; ?></td>
								<td><?php echo $distance->service_no; ?><br><?php echo $distance->task_no; ?></td>
								<td><?php 
								if($distance->cal_dist !='' || $distance->cal_dist !='0'){
								echo $distance->cal_dist/1000; }else { echo "0"; } ?></td>
								<td><?php echo $distance->actual_dist; ?></td>
								<td>
								
								<?php 
								if($distance->mgr_approve_dist !=''){
								echo $distance->mgr_approve_dist; }else { echo "0"; } ?>
								
								</td>
								<td><?php echo $distance->emp_remarks; ?></td>
								<td><?php echo $distance->mgr_remarks; ?></td>
								<td>
								
								<?php if($distance->status==0){ ?>
								<a href='javascript:void(0);' class="waves-effect waves-light" 
								data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick='get_single_distance_approvals_details("<?php echo $distance->task_id;?>")'><i class="far fa-edit"></i>
								</a> 
								<?php }  ?>	
								
								<br>
								<?php if($distance->status==0){ ?>
								<a class="btn-sm btn-warning waves-effect waves-light">Pending</a>
								<?php } else if($distance->status==1){ ?>
								
								<a class="btn-sm btn-success waves-effect waves-light">Approved</a>
								<?php } else if($distance->status==2){ ?>
								
								<a class="btn-sm  btn-danger waves-effect waves-light">Rejected</a>
								<?php }  ?>
								
								</td>
								<td>
									<div>
								<?php if($distance->status==1 & $distance->mgr_apprved_by_nm != ''){ ?>
								
								<?php echo $distance->mgr_apprved_by_nm; ?>
								<?php } else if($distance->status==2 & $distance->mgr_apprved_by_nm != ''){ ?>
								
								<?php echo $distance->mgr_apprved_by_nm; ?>
								<?php }else {  ?>
								  -- 
								<?php } ?>
								
								</div>
								</td>
                             
                            </tr>
							<?php } } ?>
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
  
  

<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel">Approvals Distance</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
			        <form class="needs-validation" role="form" method="post" autocomplete="off" action="<?php echo base_url();?>Distance_approvals/update_distance_approvals" enctype="multipart/form-data"> 


            <div class="row">
			<div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Employee Name</label>
                 <input class="form-control" placeholder="Employee Name" type="text" name="emp_name" id="emp_name" readonly value="" />
                 
				   <input  type="hidden" name="task_id" id="task_id"  />
                </div>
              </div>
			    <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Task Details</label>
                 <input class="form-control" placeholder="Task Details" type="text" name="task_details" id="task_details" readonly value="" />
                </div>
              </div>
			  <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Task Main Distance (KM)</label>
                 <input class="form-control" placeholder="Task Distance" type="text" name="cal_dist" id="cal_dist" readonly value="" />
                </div>
              </div>
            
			  <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Employee Reported Distance (KM)</label>
                 <input class="form-control" placeholder="Employee Distance" type="text" name="actual_dist" id="actual_dist" readonly value="" />
                </div>
              </div>

			  <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Employee Remarks</label>
                 <textarea class="form-control" rows="3" cols="3" placeholder="Employee Remarks" type="text" name="emp_remarks" id="emp_remarks" readonly value="" /></textarea>
                </div>
              </div>

			  <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Travel Date</label>
                 <input class="form-control" placeholder="Travel Date" type="text" name="travel_date" id="travel_date" readonly value="" />
                </div>
              </div>
				
			  <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Travel Start Address </label>
			  <textarea class="form-control" rows="5" cols="5" placeholder="Travel Start Address" type="text" name="start_address" id="start_address" readonly value="" /></textarea>
                </div>
              </div>
			  <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Travel End Address </label>
			  <textarea class="form-control" rows="5" cols="5" placeholder="Travel End Address" type="text" name="end_address" id="end_address" readonly value="" /></textarea>

				 
				 
                </div>
              </div>


				<div class="col-md-4">
				<div class="form-check mb-3">
				
				  <label class="form-label"> Approve/Reject</label>
				  <select class="form-select" aria-label="Default select example" name="updated_status" id="updated_status" onchange="get_change_status_update()" required>
				<option value="">Select</option>
				<option value="1"> Approve</option>
				<option value="2"> Reject</option>
				</select>
				</div>
				</div>
			  
			  <div class="col-4" id="mgr_approve_dist_div" >
                <div class="mb-3">
                  <label class="form-label">Approved Distance (KM)</label>
                 <input class="form-control" placeholder="Approved Distance" type="text" name="mgr_approve_dist" id="mgr_approve_dist"  value="" />
                </div>
              </div>
			  
			  
			  <div class="col-4">
                <div class="mb-3">
                  <label class="form-label">Remarks</label>
                 <textarea class="form-control" placeholder="Remarks" type="text" name="mgr_remarks" id="mgr_remarks"  value=""required /></textarea>
                </div>
              </div>
			  
			  
            </div>
            <div class="row mt-2">
              <div class="col-3">
              </div>
              <div class="col-6 text-end" id="check_approve_status_div">
                <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal">Close</button>
			<input type="submit" name="submit" id="submit_btn" value=" " class="btn btn-success w-md">

              </div>
			   <div class="col-6 text-center" id="check_error_div" style="display:none">
			 <h4> <span class="text-danger"><b>Approval SLA Is Breached...</b><span></h4>
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

<script>

		
function get_change_status_update(){

	var updated_status=$("#updated_status").val();
	if(updated_status == 1){

		$('#mgr_approve_dist_div').show();
		$('#mgr_approve_dist').attr("required",true);
		}else{
		$('#mgr_approve_dist_div').hide();
		$('#mgr_approve_dist').attr("required",false);
		
	}

}
function get_single_distance_approvals_details(task_id){	
		
			if(task_id != ''){
				$.ajax({
				url:"<?php echo base_url()?>Distance_approvals/get_single_distance_approvals_id_data",
				method:"POST",
				data:{task_id:task_id},
				success:function(data)
				{
				data = JSON.parse(data);
				if(data.msg==true || data.msg=='true')
				{
					var response = data.response;
					$('#emp_name').val(response.emp_name);
					$('#task_details').val(response.task_details);
					$('#task_id').val(response.task_id);
					$('#cal_dist').val(response.cal_dist);
					$('#actual_dist').val(response.actual_dist);
					$('#emp_remarks').val(response.emp_remarks);
					$('#emp_id').val(response.emp_id);
					$('#travel_date').val(response.travel_date);
					$('#start_address').val(response.start_address);
					$('#end_address').val(response.end_address);
						$('#check_approve_status_div').hide();
						$('#check_error_div').show();
					if(response.check_approve_status == 1){
						$('#check_approve_status_div').show();
						$('#check_error_div').hide();
						$('#submit_btn').val('Update');
					}
					
					
					}

				}
				});

			}
		}
		
	
		
</script>