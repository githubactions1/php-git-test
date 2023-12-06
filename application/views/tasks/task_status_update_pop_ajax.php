 <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel"> Task Status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
		
          <form class="needs-validation"id="task_status_form" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label"><b>Order No </b><br>
                 <?php 
				 echo $task_details->task_no;?></label>
                </div>
              </div>
			  
			  
				 <?php if(!empty($task_hardware_used_data)){
					  $required="required";
						 if($task_hardware_used_data[0]->hw_partcode == '0'){
							 $required="";
						 }
					 ?>
			  <div class="col-md-12">
                  <p class="b-heafd" ><b>Approve Hardware Used</b> &nbsp &nbsp <input type="checkbox" name="approved_hw_used" class="checkbox" id="select_all" value="1" title="Hardware Approved" <?php echo $required?>></p>
				   <div class="row">
                    <div class="col-md-4">
                      <p class="b-heafd" ><b>Hardware Code</b></p>
                    </div>
                    <div class="col-md-4">
                      <p class="b-heafd" ><b>Description</b></p>
                    </div>
                    <div class="col-md-4">
                      <p class="b-heafd" ><b>used units</b></p>
                    </div>
                  </div>
						<?php 
					

						if(!empty($task_hardware_used_data)){
						foreach($task_hardware_used_data as $tas_key=>$task_hardware){
							if($task_hardware->hw_partcode != '0'){
						?>
                  <div class="row">
                    <div class="col-md-4">
                      <p title="<?php echo $task_hardware->hw_desc;?>"> <?php echo $task_hardware->hw_partcode;?></p>
                    </div>
                    <div class="col-md-4">
                      <p> <?php echo $task_hardware->hw_desc;?></p>
                    </div>
                    <div class="col-md-3">
                      <p><?php echo $task_hardware->no_of_units_used;?></p>
                    </div>
				
                  </div>
					<?php } } } ?>
					
					
				  
                </div>
			  <?php } ?>
			  
			  
			  
			  
			  
			  
				<input type="hidden" id="task_id" name="task_id" value="<?php echo $task_id;?>" >
				<input type="hidden" id="perent_task_id" name="perent_task_id" value="<?php echo $task_details->parent_id;?>" >
				<input type="hidden" id="call_attend_by" name="call_attend_by" value="<?php echo $task_details->call_attend_by;?>" >
				<input type="hidden" id="primary_flag" name="primary_flag" value="<?php echo $task_details->primary_flag;?>" >
				<input type="hidden" id="page_type" name="page_type" value="<?php echo $page_type;?>" >
				<input type="hidden" id="issue_found" name="issue_found" value="" >
			  
			   <div class="col-12">
                    <label class="form-label">Task Status</label>
                    <select class="form-control" id="task_status" name="task_status" required>
					<option value="" >Select Type</option>
					<?php 
					if(!empty($task_status_list)){
					foreach($task_status_list as $key=>$taskstatus1){ ?> 
					
						<?php if($task_details->task_status == 217 &&  $taskstatus1->sub_cat_id == 218){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
					
						<?php if($task_details->task_status == 218 && ($taskstatus1->sub_cat_id == 219 || $taskstatus1->sub_cat_id == 271)){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
						
						<?php if($task_details->task_status == 219 && ($taskstatus1->sub_cat_id == 220 || $taskstatus1->sub_cat_id == 271)){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
						
						<?php if($task_details->task_status == 220 && ($taskstatus1->sub_cat_id == 221 || $taskstatus1->sub_cat_id == 271)){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
					
						<?php if($task_details->task_status == 221 && ($taskstatus1->sub_cat_id == 222 || $taskstatus1->sub_cat_id == 272)){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
					
						<?php if($task_details->task_status == 222 && ($taskstatus1->sub_cat_id == 224 || $taskstatus1->sub_cat_id == 226 || $taskstatus1->sub_cat_id == 272 || $taskstatus1->sub_cat_id == 223)){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
					
						<?php if($task_details->task_status == 223 && ($taskstatus1->sub_cat_id == 225)){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
						
						<?php if($task_details->task_status == 224 && ($taskstatus1->sub_cat_id == 225 || $taskstatus1->sub_cat_id == 226)){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
					
						<?php if($task_details->task_status == 225 && ($taskstatus1->sub_cat_id == 224 || $taskstatus1->sub_cat_id == 226 || $taskstatus1->sub_cat_id == 272)){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
					
						<?php if($task_details->task_status == 226 && ($taskstatus1->sub_cat_id == 227 || $taskstatus1->sub_cat_id == 272 || $taskstatus1->sub_cat_id == 416)){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
						
						
						<?php if($task_details->task_status == 402 && ($taskstatus1->sub_cat_id == 227 || $taskstatus1->sub_cat_id == 272)){ ?>  
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
						
						
						<?php if($task_details->task_status == 227){ ?> 
						
						<?php }  ?>
						<?php if($task_details->task_status == 271 && $taskstatus1->sub_cat_id == 227){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
						
						<?php if($task_details->task_status == 272 && $taskstatus1->sub_cat_id == 227){ ?> 
						<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>
						<?php }  ?>
						
					
					
					
						<!--<option value="<?php echo $taskstatus1->sub_cat_id;?>"><?php echo $taskstatus1->sub_cat_name?></option>-->

					<?php } } ?>
					</select>
                  </div> 
			  <div class="col-12">
                    <label class="col-form-label">Comments <span>*</span></label>
                    <textarea name="remarks" id="remarks" rows="4" class="form-control" placeholder="Enter Remarks" ></textarea>
                   
                  </div>
            </div>
            <div class="row mt-2"> 
              <!--
              <div class="col-9">
                <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
              </div>
-->
              <div class="col-12 text-end"> 
                <!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
                <button type="submit" id="task_status_submit_btn" class="btn btn-success" id="btn-save-event">Update </button>
              </div>
            </div>
          </form>
        </div>
		
		
<script>

		$(document).ready(function(){
			$('.js-example-basic-multiple').select2();
			$("#task_status_form").on("submit", function(e){
				e.preventDefault();		
				   
					$("#task_status_submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
				$("#task_status_submit_btn").attr("disabled",true);
				$.ajax({
					type: "post",
					url:"<?php echo base_url()?>Tasks/task_status_submit_form_ajax",
					data:$("#task_status_form").serialize(),
					success:function(result)
					{		
						var jsondata=jQuery.parseJSON(result);	

						if(jsondata['status']==1)
						{
							$("#task_status_form")[0].reset();
							$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
							if(jsondata['page_type']==1)
							{
							setTimeout(function(){ window.location = "<?php echo base_url(); ?>Tasks/update_task/"+jsondata['task_id']; }, 1000);
							}else{
								//setTimeout(function(){ window.location = "<?php echo base_url(); ?>Tasks/task_list"; }, 1000);
								$("#task_status_submit_btn").html('Assign <i class="flaticon-right-arrow-1"></i> ');
								$("#task_status_submit_btn").attr("disabled",false);							
								$('.bs-example-modal-change_status').modal('hide');
								get_tasks_list();
								
								
							}
						}
						else
						{
							$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							$("#task_status_submit_btn").html('Submit <i class="flaticon-right-arrow-1"></i> ');
							$("#task_status_submit_btn").attr("disabled",false);		
						}
					}
				});	
			});	
			
			
			
			
		});	


	
	</script>