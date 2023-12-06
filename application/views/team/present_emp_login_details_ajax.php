   <form class="needs-validation" method="post" action="<?php echo base_url();?>Team/update_emp_current_attendence_status" enctype="multipart/form-data">
            <div class="row">
               <div class="col-12">
                <div class="mb-3">
                
                    <label class="form-label">Update Attendance Status</label>
                    <div class="form-group mb-0" data-select2-id="78">
											
					<select class="form-control" name="emp_present_status" id="emp_present_status"   style="width:100%;color: black;" required>
						<option value="">select</option>
						<option value="0" > Punched-In</option>
						<?php if($attendence_id != 0){  ?>
						<option value="10"> Punched-Out</option>
						<?php } ?>
						<option value="1" > Absent</option>
						<option value="2"> Weekly Off</option>
						<option value="4" > On Leave</option>
						<option value="5" > Comp-off</option>
						<option value="6" > Holiday</option>
					

						</select>
                    </div>
                 
                </div>
              </div>
				<input type="hidden" id="emp_id" name="emp_id" value="<?php echo $emp_id;?>" >
				<input type="hidden" id="attendence_id" name="attendence_id" value="<?php echo $attendence_id;?>" >
				<input type="hidden" id="username" name="username" value="<?php echo $team_details->emp_username;?>" >
           
			 
             
			  
			
            </div>
            <div class="row mt-2"> 
              <!--
              <div class="col-9">
                <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
              </div>
-->
              <div class="col-12 text-end"> 
             <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-success" id="btn-save-event">Update</button>
              </div>
            </div>
          </form>