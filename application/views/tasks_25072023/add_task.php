<div class="main-content">
    <div class="page-content">
      <div class="container-fluid"> 
        
        <!-- start page title -->
        <div class="row">
          <div class="col-sm-8">
            <div class="page-title-box">
              <h4><?php echo $page_name;?>Add Task</h4>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="page-title-box">
              <ol class="breadcrumb add-rgt">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Task</a></li>
                <li class="breadcrumb-item active"><?php echo $page_name;?> Add Task</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
			  <form  class="needs-validation" role="form" method="post" autocomplete="off" action="" enctype="multipart/form-data"> 
                <div class="mb-2 row">
                  
				  <div class="col-md-4 mt-2">
                    <label class="form-label">Circuit Id</label>
                    <select class="form-control select2" id="circuit_id" name="circuit_id"  required>
                      <option value="" >Select Circuits</option>
					  <?php 
						if(!empty($users_list)){
						foreach($users_list as $key1=>$user){
						?> 
						<option value="<?php echo $user->circuit_id;?>" ><?php echo $user->company_name?>(<?php echo $user->user_name?>)</option>
						<?php } } ?>
					  </select>
                  </div>
				  
				   <div class="col-md-4">
                    <label class="col-form-label">Call Attend By</label>
                    <select class="form-control select2" id="call_attend_by" name="call_attend_by" >
						<option value="">select</option>
						<?php 
						if(!empty($employees_list)){
						foreach($employees_list as $key=>$employee){
						?> 
						<option value="<?php echo $employee->emp_id;?>" ><?php echo $employee->emp_name?>(<?php echo $employee->emp_username?>)</option>
						<?php } } ?>
					  </select>
                  </div>
				  
				  
                  <div class="col-md-4 mt-2">
                    <label class="form-label">Call Type</label>
                    <select class="form-control select2" id="call_type" name="call_type"   required>
                      <option value="" >Select Type</option>
						 <option value="Customer-Complaint" >Customer Complaint</option>
						 <option value="Request" >Request</option>
						 <option value="Public-complaint" >Public complaint</option>
                    </select>
                  </div>
				  
                  <div class="col-md-4 mt-2">
                    <label class="form-label">Task Category </label>
                    <select class="form-control select2" id="task_category" name="task_category" onchange="Get_task_type_list()"  required>
                      <option value="" >Select </option>
						<?php 
						if(!empty($task_main_categories)){
						foreach($task_main_categories as $key=>$task_main_cat){
						?> 
						<option value="<?php echo $task_main_cat->sub_cat_id;?>" ><?php echo $task_main_cat->sub_cat_name?></option>
						<?php } } ?>
                    </select>
                  </div>
				  	  <div class="col-md-4 mt-2">
                    <label class="form-label">Task Type</label>
                    <select class="form-control select2" id="task_type" name="task_type" >
					<option value="" >Select Type</option>
					<?php 
					if(!empty($task_type_list)){
					foreach($task_type_list as $key=>$task_cat){
					?> 
					<option value="<?php echo $task_cat->comp_cat_id;?>" ><?php echo $task_cat->comp_cat_name?></option>
					<?php } } ?>
					</select>
                  </div>
				  
                  <div class="col-md-4">
                    <label class="col-form-label">If Other Issues</label>
                    <input class="form-control" type="text" name="task_other_issue" id="task_other_issue"  placeholder="Other Issues" >
                  </div>
				  
				  
                  <div class="col-md-4 mt-2">
                    <label class="form-label">Task Priority</label>
                    <select class="form-control select2" id="task_priority" name="task_priority" required>
                    <option value="">Search</option>
                    <option value="P1">P1</option>
                    <option value="P2">P2</option>
                    <option value="P3">P3</option>
                    <option value="P4">P4</option>
                  </select>
                  </div>

					<div class="col-md-4">
						<label class="col-form-label">Task Owner</label>
						<select class="form-control select2" id="task_owner" name="task_owner" required>
						<option value="">select</option>
						<?php 
						if(!empty($employees_list)){
						foreach($employees_list as $key=>$employee){
						?> 
						<option value="<?php echo $employee->emp_id;?>" ><?php echo $employee->emp_name?>(<?php echo $employee->emp_username?>)</option>
						<?php } } ?>
					  </select>
					  </div>

				   
               
				  
				   
					<div class="col-md-4">
					<label class="col-form-label">Remarks</label>
					<textarea name="task_message"  id="task_message" class="form-control" required  placeholder="Task Remarks"></textarea>
					</div>



                 
                 
                </div>
				  
				  
				  
				  
				  
              
                <!-- end row -->
                
                <!-- end row -->
                
                <div class="mb-2 row">
                  <div class="col-md-12 text-center m-2">
				  
				  
					<input type="submit" name="submit" value="Add Task" class="btn btn-success w-md">
				 

                  </div>
                </div>
                <!-- end row --> 
                
					</form>
              </div>
            </div>
          </div>
          <!-- end col --> 
        </div>
      </div>
      <!-- container-fluid --> 
    </div>
    <!-- End Page-content --> 
    
  </div>	
  
  
  <script  type="text/javascript">
   
   
   
   function Get_task_type_list(){
	var task_category=$("#task_category").val();
	$.ajax({  
		type: "POST",
		url: '<?php echo base_url();?>Tasks/get_task_type_list', 
		data: "task_category="+task_category,
		complete: function(dd){  
			var op = dd.responseText.trim();
			$("#task_type").html(op);
		}
	});
}
</script>