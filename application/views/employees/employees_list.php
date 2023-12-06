<div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title-box">
            <h4>Team Setup</h4>
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
              <li class="breadcrumb-item active">Team Setup</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="mb-3 row">
                <div class="col-md-3">
                  <div class="form-group typebtn">
                    <label for="input-datalist">Filter<span>*</span></label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected="">All</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3 total">
                  <!--<h5 class="count">Total : <?php echo $employees_count;?></h5>-->
				  <h5 class="count">Total : 49</h5>

                </div>
              </div>
              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Vendor</th>
                    <th>Organization Unit</th>
                    <th>Base Address</th>
                    <th>Member Status</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                    <th>Task Type</th>
                  </tr>
                </thead>
                <tbody>
				<?php 
							if(!empty($employees_list)){
							foreach($employees_list as $key=>$employee){
								
								if($employee->member_type == '1'){
									$member_type='On Roll';
								}else if($employee->member_type == '2'){
									$member_type='Outsource';
								}else{
									$member_type='Contract';
								}
							?> 
                  <tr class="odd">
                    <td><div class="form-check">
                        <input class="form-check-input" name="valueCheckbox" type="radio" name="formRadios" id="formRadios1" checked="" value="<?php echo $employee->emp_id.'~'.$employee->emp_status;?>">
                        <label class="form-check-label" for="formRadios1"></label>
                      </div></td>
                    <td><div><?php echo $employee->emp_name; ?>	 <a href="#"><i class="mdi mdi-account-edit"></i></a></div>
                      <div>{<?php echo $employee->emp_code; ?>} </div>
                      <div>Engineer(<?php echo $member_type; ?>) </div></td>
                    <td><?php echo $employee->vendor_name; ?></td>
                    <td><?php echo $employee->cluster_name; ?></td>
                    <td><?php echo $employee->address; ?></td>
                    <td>
					
					<div><?php if($employee->memberstatus == "online"){?>
					<i class="fas fa-check-circle text-success"></i>
					<?php
					}
					else{ ?>
					<i class="fas fa-dot-circle text-danger"></i>
					<?php }?>
					</div>
                      <div><?php if($employee->memberstatus=="online"){echo "Online";} else{ echo "Offline";}?></div></td>
                    <td><?php echo $employee->emp_mobile; ?></td>
                    <td>
					<a href="<?php echo base_url()?>Employees/reinvite/<?php echo $employee->emp_id; ?>"><button type="button" class="btn btn-success mb-1"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-md">Re-Invite</button></a>
					<a class="<?php echo $employee->emp_status==1?'btn btn-success waves-effect waves-light':'btn btn-danger mb-1 waves-effect waves-light'; ?> confirm_alert"   href="<?php echo base_url()?>Employees/update_employee_status/<?php echo $employee->emp_status; ?>/<?php echo $employee->emp_id; ?>"><?php echo $employee->emp_status==1?'Lock':'Un-Lock'; ?></a>
					<br>
					<br>
					<?php if($employee->device_id != "" || $employee->device_id != null){ ?>
								<a href="<?php echo base_url()?>Employees/reset_imei_update/<?php echo $employee->emp_id ?>" class="btn btn-primary waves-effect waves-light">Reset
								</a>
								<?php } else{  ?>
												
								<?php }   ?>
					</td>
                              
					
					
					
					<!--<button type="button" class="btn btn-success mb-1"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-md">Re-Invite</button>
                      <button type="button" class="btn btn-success"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-md">Lock</button>-->
										
										</td>
                    <td>FT-SBI-Field Survey, CS-DoP-Tower Installation</td>
                  </tr>
				<?php } } ?>
                  
                </tbody>
              </table>
			 <?php if($this->session->userdata['user']->emp_role == 1){ ?>
              <div class="col-md-12">
                <button type="submit" class="btn btn-success total">Import from Excel</button>
				<a href="<?php echo base_url()?>Employees/add" class="btn btn-success total"><i class="mdi mdi-plus-circle-outline"></i> Add </a>
                <button class="btn btn-success total" onclick="myfunctionedit()" id="modify1">Modify</button>
                <button type="button" class="btn btn-success total" id="sa-warning" onclick="myfunctiondelete()" >Delete</button>
                <button type="submit" class="btn btn-success total">Registration Password</button>
              </div>
				<?php }  ?>
            </div>
          </div>
        </div>
        <!-- end col --> 
      </div>
    </div>
    <!-- container-fluid --> 
  </div>
  <script>
 function myfunctionedit(){
	var checkboxes = document.getElementsByName("valueCheckbox");
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedValueId = checkboxes[i].value;
				
				var selectval=selectedValueId.split('~');
				var selectval_id=selectval[0];
				
                //alert(selectedValueId);
				 //alert(selectval_id);
				
				 var url = '<?php echo base_url()?>Employees/edit/' + selectval_id;

  // Redirect to the second page with the data in the URL
  window.location.href = url;
				
				
            }
        }
	 
	 
 } 


function myfunctiondelete(){
	
	
var checkboxes = document.getElementsByName("valueCheckbox");
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedValueId = checkboxes[i].value;
				
				var selectval=selectedValueId.split('~');
				var selectval_id=selectval[0];
				var selectval_sts=selectval[1];
				
               // alert(selectedValueId);
				 //alert(selectval_id);
				
				 var url = '<?php echo base_url()?>Employees/update_employee_status/' + selectval_sts + '/' + selectval_id;

  // Redirect to the second page with the data in the URL
  window.location.href = url;
				
				
            }
        }	
	
	
	
	
	
}

 
  
  
  
  </script>