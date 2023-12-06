 <div class="mb-3" id="call_attend_by_ajax_div">
                
                    <label class="form-label">Select Members</label>
                    <div class="form-group mb-0" data-select2-id="78">
											
					<select class="form-control select2" id="call_attend_by"  name="call_attend_by[]" multiple style="width:100%" required>

						<option value="">select</option>
						<?php 
						if(!empty($employees_list)){
						foreach($employees_list as $key=>$employee){
							if($employee->emp_role==2 || $employee->emp_role==3){ 
						?> 
						<option value="<?php echo $employee->emp_id;?>" ><?php echo $employee->emp_name?>(<?php echo $employee->emp_username?>)</option>
						<?php }  ?>
						<?php } } ?>

						</select>
                    </div>
                 
                </div>