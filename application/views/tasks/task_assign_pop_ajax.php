<style>

.select2-results__option { color:#23b7e5;}

.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    list-style: none;
    color: black;
}
</style>

 <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel">Assign Task </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
		
          <form class="needs-validation"id="task_assgn_form" enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Order No <br>
                 <?php 
				 echo $task_details->task_no;?></label>
                </div>
              </div>
				<input type="hidden" id="task_id" name="task_id" value="<?php echo $task_id;?>" >
				<input type="hidden" id="page_type" name="page_type" value="<?php echo $page_type;?>" >
				<input type="hidden" id="call_attend_by_old" name="call_attend_by_old" value="<?php echo $task_details->secondary_member;?>" >
				<input type="hidden" id="mngr" name="mngr" value="<?php echo $task_details->mngr;?>" >
				<input type="hidden" id="call_attend_by_primary_old" name="call_attend_by_primary_old" value="<?php echo $task_details->primary_member;?>" >
			  <input type="hidden" id="service_no" name="service_no" value="<?php echo $task_details->service_no;?>" >

              <div class="col-12">
                <div class="mb-3">
				<?php if(empty($task_details->task_appointment_date)){  $task_details->task_appointment_date =date('Y-m-d H:i:s');}?>
                  <label class="form-label">Appointment Time Slot</label>
                  <input class="form-control"  name="task_appointment_date" type="datetime-local" value="<?php echo date('Y',strtotime($task_details->task_appointment_date))?>-<?php echo date('m',strtotime($task_details->task_appointment_date))?>-<?php echo date('d',strtotime($task_details->task_appointment_date))?>T<?php echo date('H',strtotime($task_details->task_appointment_date))?>:<?php echo date('i',strtotime($task_details->task_appointment_date))?>:00" id="example-datetime-local-input" min="<?php echo date('Y',strtotime($task_details->task_appointment_date))?>-<?php echo date('m',strtotime($task_details->task_appointment_date))?>-<?php echo date('d',strtotime($task_details->task_appointment_date))?>T<?php echo date('H',strtotime($task_details->task_appointment_date))?>:<?php echo date('i',strtotime($task_details->task_appointment_date))?>:00"  required>
                  <div class="invalid-feedback">Please provide a valid event name</div>
                </div>
              </div>
              <!--<div class="col-12">
                <div class="mb-3">
                
                    <label class="form-label">Assigned To</label>
                    <div class="form-group mb-0" data-select2-id="78">
						<?php echo $task_details->call_attended_name;?>
                    </div>
                 
                </div>
              </div>-->
			     <?php 
			  // $disabled_st='';
			  // if($task_details->task_status != '217'){
			  // if($task_details->task_status >= '220'){
			  // $disabled_st='disabled';
					// }
			  // }
			  ?>
             <div class="col-12">
                <div class="mb-3">
                
                    <label class="form-label">Select Primary</label>
                    <div class="form-group mb-0" data-select2-id="78">
											
					<select class="form-control" name="call_attend_by_primary" id="call_attend_by_primary"   onchange="get_employees_sub()"  <?php echo $disabled_st;?> style="width:100%;color: black;" required>

						<option value="">select</option>
						<?php 
						if(!empty($employees_list)){
						foreach($employees_list as $key=>$employee){
							$attendence_color="";
							if($employee->attendence_status == 0){
								$attendence_color="#23b7e5";
							}
							
							if($employee->attendence_status == 1){
								$attendence_color="#DE2121";
							}
							
							if($employee->emp_role==2 || $employee->emp_role==3){ 
						?> 
						<option value="<?php echo $employee->emp_id;?>" <?php if($employee->emp_id==$task_details->primary_member){ echo "selected";}?> style="color:<?php echo $attendence_color;?>;" > <?php echo $employee->emp_name?>(<?php echo $employee->emp_code?>) - <?php echo $employee->task_count?> Tasks</option>
						<?php }  ?>
						<?php } } ?>

						</select>
                    </div>
                 
                </div>
              </div>
			 
              <div class="col-12">
                <div class="mb-3">
                
                    <label class="form-label">Select Members</label>
                    <div class="form-group mb-0" data-select2-id="78">
											
					<select class="form-control select2" id="call_attend_by"  name="call_attend_by[]" multiple style="width:100%" >
						<?php 
							$attendence_color=""; ?>
						<option value="">select</option>
						<?php 
						if(!empty($employees_list)){
						foreach($employees_list as $key=>$employee){
							
							if($employee->attendence_status == 0){
								//$attendence_color="#23b7e5";
								$attendence_color='';
							}
							
							if($employee->attendence_status == 1){
								$attendence_color='';
							}
							
							if($employee->emp_role==2 || $employee->emp_role==3){ 
							if($employee->emp_id != $task_details->primary_member){
						?> 
						<option value="<?php echo $employee->emp_id;?>" <?php if(in_array($employee->emp_id,explode(",",$task_details->secondary_member))) { echo "selected";}?>><?php echo $attendence_color;?> <?php echo $employee->emp_name?>(<?php echo $employee->emp_code?>) - <?php echo $employee->task_count?> Tasks</option>
						
						<?php } } ?>
						<?php } } ?>

						</select>
                    </div>
                 
                </div>
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
                <button type="submit" id="task_assign_submit_btn" class="btn btn-success" id="btn-save-event">Assign</button>
              </div>
            </div>
          </form>
        </div>
		
		
<script>
$(function() {
	$('.select2').select2();
});
		$(document).ready(function(){
			$('.js-example-basic-multiple').select2();
			$("#task_assgn_form").on("submit", function(e){
				e.preventDefault();		
				   
					$("#task_assign_submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
				$("#task_assign_submit_btn").attr("disabled",true);
				$.ajax({
					type: "post",
					url:"<?php echo base_url()?>Tasks/task_assign_submit_form_ajax",
					data:$("#task_assgn_form").serialize(),
					success:function(result)
					{		
						var jsondata=jQuery.parseJSON(result);	

						if(jsondata['status']==1)
						{
							$("#task_assgn_form")[0].reset();
							$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
							if(jsondata['page_type']==1)
							{
							setTimeout(function(){ window.location = "<?php echo base_url(); ?>Tasks/update_task/"+jsondata['task_id']; }, 1000);
							}else{
								// setTimeout(function(){ window.location = "<?php echo base_url(); ?>Tasks/task_list"; }, 1000);
									
								$("#task_assign_submit_btn").html('Assign <i class="flaticon-right-arrow-1"></i> ');
								$("#task_assign_submit_btn").attr("disabled",false);							
								$('.bs-example-modal-md2').modal('hide');
								get_tasks_list();
								
							}
						}
						else
						{
							$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							$("#task_assign_submit_btn").html('Assign <i class="flaticon-right-arrow-1"></i> ');
							$("#task_assign_submit_btn").attr("disabled",false);							
							$('.bs-example-modal-md2').modal('hide');
								if(jsondata['page_type']==1)
							{
							setTimeout(function(){ window.location = "<?php echo base_url(); ?>Tasks/update_task/"+jsondata['task_id']; }, 1000);
							}else{
								get_tasks_list();
							}
								
						}
					}
				});	
			});	
			
			
			
			
		});	


	
	</script>
	
	
  <script  type="text/javascript">
   
   
   
   function get_employees_sub(){
	var task_id=$("#task_id").val();
	var call_attend_by_primary=$("#call_attend_by_primary").val();
			$.ajax({    
			type: "POST",    
			dataType: "html",    
			url: "<?php echo base_url('Tasks/get_employees_primary_sub_list'); ?>",    
			data: {call_attend_by_primary: call_attend_by_primary,task_id: task_id }})
			.done(function(data) { 
			$('#call_attend_by').html(data);
			});
}
</script> 