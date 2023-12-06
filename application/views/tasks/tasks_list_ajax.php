  <div class="tab-pane fade in active show" id="">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                              <tr>
                                <th>Task Information</th>
                                <th>Priority</th>
                                <th>Address</th>
                                <th>Owner/Dispatcher</th>
                                <th>Assign To</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
							
                            <tbody>
								<?php 
								if(!empty($task_list)){
								foreach($task_list as $key2=>$task_row){
									
																	
									$primary_task_status_2=explode(',',$task_row->primary_task_status);
									$primary_task_status=$primary_task_status_2[0];
									$status_bg_colour=$primary_task_status_2[1];
									$bg_color='';
									if($status_bg_colour == ''){
									$bg_color= 'bg-success';
									}
								?>
							
                              <tr>
                                <td><div>Service No <a href="<?php echo base_url();?>Tasks/update_task/<?php echo $task_row->task_id;?>">-<?php echo $task_row->task_no;?></a>
								<!--<a href="#"><img src="assets/images/clock.png" alt="" class="clok"></a>-->
								
								
								</div>
                                  <div>Order No - <?php echo $task_row->service_no;?></div>
                                  <div><?php echo $task_row->task_type_name;?></div>
                                  <div><?php echo $task_row->task_main_category_name;?></div>
                                  <div><?php echo Datetimeconversion($task_row->task_created_date);?></div></td>
                                <td><?php echo $task_row->task_priority;?></td>
                                <td><span title="<?php echo $task_row->taskAddress?>" ><?php echo substr($task_row->taskAddress,'0','40')?></span></td>
                                <td><?php echo $task_row->task_owner_name;?> </td>
                                 <td>
								<table class="cts bg-light">

								<?php 
								$emp_list=explode(',',$task_row->call_attended_name);
								$sub_task_status_names=explode(',',$task_row->sub_task_status_name);
								$sub_task_status_name_ids=explode(',',$task_row->sub_task_status_name_ids);
								$primary_task_status_id=$task_row->primary_task_status_id;
								$sub_task_nos=explode(',',$task_row->sub_task_no);
								$sub_task_id=explode(',',$task_row->tasks_ids);
								$primary_task_id=$task_row->primary_task_id;
								//$primary_task_status=$task_row->primary_task_status;
															
								$notes_add_disabled=0;
								if($primary_task_status_id == 227 || $primary_task_status_id == 416){
								$notes_add_disabled=1;
								}
								if(!empty($emp_list)){
								$i=1;

								foreach($emp_list as $key1=>$call_attended_name){



								?>
								<tr class="ord">
								<td> <?php echo $call_attended_name;?><?php if($primary_task_id == $sub_task_id[$key1]) { echo '*'; }?></td>
								<td><strong>
								<?php if(($task_row->task_status=='227') || ($primary_task_status_id == 416) || ($sub_task_status_names[$key1]=='Approved') || ($sub_task_status_names[$key1]=='Removed') || ($primary_task_status=='Rejected(ServiceNow)') || ($primary_task_status=='Approved') || ($primary_task_id != $sub_task_id[$key1] && $sub_task_status_names[$key1] == 'Field Cancel')){ ?>

								<span  style="color:<?php echo $status_bg_colour;?>"><?php echo $sub_task_status_names[$key1];?></span>
								<?php } else { ?>
								<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".bs-example-modal-change_status" onclick='getCHange_task_status_pop("<?php echo $sub_task_id[$key1];?>")' style="color: <?php echo $status_bg_colour;?>" > <?php echo $sub_task_status_names[$key1];?> </a> 
								</td>
								<td>
								<?php  if(($primary_task_id == $sub_task_id[$key1]) && $primary_task_status!='Field Cancel') { ?>
								<a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md2" onclick='getAssign_task_pop("<?php echo $task_row->task_id;?>")'> <i class="fas fa-pencil-alt"></i></a>
								<?php }  ?>
								</td>


								<?php  
								}
								$i++;
								if($i==3) break;
								}
								?>
								<td>
								<?php
								if(count($emp_list)>2){
								?>
																
								<?php if(($sub_task_status_name_ids[$key1]=='227') || ($sub_task_status_name_ids[$key1]=='408') || ($primary_task_status_id=='407') || ($primary_task_status_id=='416') || ($primary_task_status_id=='271') || ($primary_task_status_id=='227')){ } else {?>
								<a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md2" onclick='getAssign_task_pop("<?php echo $task_row->task_id;?>")'><b>1 & more</b></a>
								</strong>
								<?php 
								}
								}
								?>
								</td>



								</tr>
								<?php  } ?>


								</table>
									
								</td>
                                <td><button type="button" class="btn btn-success">
                                  <a href="<?php echo base_url();?>Tasks/update_task/<?php echo $task_row->task_id;?>"><i class="far fa-eye text-white"></i></a>
                                  </button>
                                 <a href="<?php echo base_url();?>Tasks/update_task/<?php echo $task_row->task_id;?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                 <!-- <button type="button" class="btn btn-success">
                                  <a href="<?php echo base_url();?>Tasks/update_task/<?php echo $task_row->task_id;?>"><i class="fas fa-link text-white"></i></a>
                                  </button>-->
                                  <!--<button type="button" class="btn btn-success"><i class="far fa-trash-alt"></i></button>--></td>
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
				
				
