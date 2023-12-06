<style>
.filter-tabs-old {
    white-space: nowrap !important;
    overflow-x: auto !important;
    display: block !important;
}	

.filter-tabs {
    display: block !important;
}	

.filter-tabs li {
    display: inline-block !important;
    float: none !important;
    width: auto !important;
}

.chcklist-new {
    width: 100%;
    padding: 0px;
    margin-bottom: 10px;
    overflow-y: scroll;
    height: auto;
}

.b-heafd {
    font-weight: bolder;
	}

div#contact {
    margin: 3px 0 0 0;
}
</style>

  <div class="main-content">
    <div class="page-content"> 
       
      <!-- start page title -->
      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <h4>Update Task Details</h4>
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Task</a></li>
              <li class="breadcrumb-item active">Task Details</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- end page title -->
	  <form  class="needs-validation" role="form" method="post" autocomplete="off" action="" enctype="multipart/form-data"> 
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="mb-3 row" style="border-bottom: solid 1px #ccc; padding-bottom: 10px;">
                <div class="col-md-3" style="border-right: solid 1px #ccc;">
                  <h5 class="b-heafd" >Task Details</h5>
                </div>
                <div class="col-md-3" style="border-right: solid 1px #ccc;">
                  <p class="b-heafd" >Service Number</p>
                  <h5><?php echo $task_details->task_no;?></h5>
                </div>
                <div class="col-md-4">
                  <p class="b-heafd" >Order Number</p>
                  <h5> <?php echo $task_details->service_no;?></h5>
                </div>
                <div class="col-md-2 back">
                  <a href="<?php echo base_url();?>Tasks"  class="btn btn-success"><i class="fa fa-arrow-left text-white"></i> <span class="text-white">Back</span></a>
                  
                </div>
              </div>
              <div class="mb-3 row">
                <div class="col-md-3">
                  <p class="b-heafd" >Version Number</p>
                  <h6 >- </h6>
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >Task Name</p>
                  <h6 > <?php echo $task_details->task_type_name;?> </h6>
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >Customer Contact Name</p>
                  <h6 > <?php echo $task_details->circuit_name;?> </h6>
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >ETA</p>
                  <h6 > <?php echo $task_details->comp_service_time;?> </h6>
                </div>
              </div>
              <div class="mb-3 row">
                <div class="col-md-3">
                  <p class="b-heafd" >Creation Date</p>
                  <h6 > <?php echo Datetimeconversion($task_details->task_created_date);?> </h6>
                </div>
                   
                <div class="col-md-3">
                  <p class="b-heafd" >Appointment Date</p>
                  <h6 ><?php echo Datetimeconversion($task_details->task_appointment_date);?> </h6>
                </div>
                <div class="col-md-3">
                  <p>-</p>
                  <h6 > - </h6>
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >Service Location</p>
                  <h6 > - <?php echo $task_details->taskAddress;?> </h6>
                </div>
              </div>
              <div class="mb-3 row">
                <div class="col-md-3">
                  <p class="b-heafd" >Status </p>
                  <h6 > <?php echo Datetimeconversion($task_details->last_updated_time);?> </h6>
                  <div>
				  <?php 
									  
					$primary_task_status_2=explode(',',$task_details->primary_task_status);
					$primary_task_status=$primary_task_status_2[0];
					$status_bg_colour=$primary_task_status_2[1];
					$bg_color='';
					if($status_bg_colour == ''){
					$bg_color= 'bg-success';
					}
				  ?>
				  
				  <span class="btn btn-dark" style="background-color: <?php echo $status_bg_colour;?>" ><?php echo $primary_task_status;?> </span>
				  
				  </div>
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >Documents</p>
                  <h6 >
				  <?php 
				  $primary_task_status_check=$task_details->primary_task_status_id;
				  $notes_add_disabled=0;
				  if($primary_task_status_check == 227){
					  $notes_add_disabled=1;
				  }
				  
				  ?>
				  
				  
                    <button type="button" class="btn btn-success" <?php if($notes_add_disabled == 0){ ?>data-bs-toggle="modal" data-bs-target=".bs-example-modal-documents_add" <?php } ?>><i class="fa fa-plus-circle" aria-hidden="true"></i> </button>
					
				<a href="javascript:void(0)"   class="btn btn-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-notes_sow" onclick='getNotes_task_show_pop("<?php echo $task_details->task_id;?>",0)'><?php echo $task_details->doc_count;?> <i class="far fa-eye text-white"></i></a>
							
                  </h6>
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >Contact Number </p>
                  <h6 > +91 <?php echo $task_details->circuit_mobile_number;?> </h6>
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >Notes</p>
                  <h6 >
                    <button type="button" class="btn btn-success" <?php if($notes_add_disabled == 0){ ?> data-bs-toggle="modal" data-bs-target=".bs-example-modal-notes_add" <?php } ?>><i class="fa fa-plus-circle" aria-hidden="true"></i> </button>
					
				<a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-notes_sow" onclick='getNotes_task_show_pop("<?php echo $task_details->task_id;?>",1)'><?php echo $task_details->notes_count;?> <i class="far fa-eye text-white"></i></a>
                  </h6>
                </div>
              </div>
           
              <div class="mb-3 row">
                <div class="col-md-2">
				
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >Distance Travelled</p>
                  <div class="row">
                    <div class="col-md-6">
                      <p>Employee</p>
                    </div>
                    <div class="col-md-6">
                      <p>Distance</p>
                    </div>
                  </div>
					<?php 
					$emp_list=explode(',',$task_details->call_attended_name);
					$combined_distance=explode(',',$task_details->combined_distance);
					$sub_task_status_names=explode(',',$task_details->sub_task_status_name);
					$sub_task_nos=explode(',',$task_details->sub_task_no);
					$sub_task_id=explode(',',$task_details->tasks_id);
					$primary_task_id=$task_details->primary_task_id;

					if(!empty($emp_list)){
					foreach($emp_list as $key=>$call_attended_name){ ?>
                  <div class="row">
                    <div class="col-md-6">
                      <p><?php echo $call_attended_name;?> <?php if($primary_task_id == $sub_task_id[$key]) { echo '*'; }?></p>
                    </div>
                    <div class="col-md-6">
                      <p><?php echo $combined_distance[$key];?></p>
                    </div>
                  </div>
					<?php } } ?>
                </div>
                <div class="col-md-2">
                  <p class="b-heafd" >Organization</p>
                  <h6 ><?php echo $task_details->cluster_name;?></h6>
                </div>
                <div class="col-md-5">
                  <p class="b-heafd" >Assigned To</p>
                  <!--<h6>
				 <?php if($task_details->task_status=='227' || $task_details->task_status_name=='Approved'){ ?>
				 <?php echo $task_details->call_attended_name;?> <span>*</span> <?php echo $task_details->task_status_name;?>
				 <?php }else { ?>
				 <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md2" onclick='getAssign_task_pop("<?php echo $task_details->task_id;?>")'> <?php echo $task_details->call_attended_name;?> <span>*</span> <?php echo $task_details->task_status_name;?> <i class="fas fa-edit"></i></a>
				 <?php } ?>
				  
				  </h6>-->
				  
				  
				  
				  <table class="cts bg-light">
					<tr class="ord">
					<?php 
					$emp_list=explode(',',$task_details->call_attended_name);
					$sub_task_status_names=explode(',',$task_details->sub_task_status_name);
					$sub_task_nos=explode(',',$task_details->sub_task_no);
					$sub_task_id=explode(',',$task_details->tasks_id);
					$primary_task_id=$task_details->primary_task_id;
					// $primary_task_status=$task_details->primary_task_status;
					$sub_task_status_name_ids=explode(',',$task_details->sub_task_status_name_ids);
					$primary_task_status_id=$task_details->primary_task_status_id;
					 
					if(!empty($emp_list)){
					foreach($emp_list as $key=>$call_attended_name){ ?>
					<tr class="ord">
					<td> <?php echo $call_attended_name;?> <?php if($primary_task_id == $sub_task_id[$key]) { echo '*'; }?></td>
					<td><?php echo $sub_task_nos[$key];?></td>
					<td><strong>
					<?php if(($task_details->task_status=='227') || ($sub_task_status_names[$key]=='Approved') || ($sub_task_status_names[$key]=='Removed') || ($primary_task_status=='Approved') || ($primary_task_status=='Rejected(ServiceNow)') || ($primary_task_id != $sub_task_id[$key] && $sub_task_status_names[$key] == 'Field Cancel')){ ?>
					<span  style="color:<?php echo $status_bg_colour;?>"><?php echo $sub_task_status_names[$key];?></span>
					<?php } else { ?>
					<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".bs-example-modal-change_status" onclick='getCHange_task_status_pop("<?php echo $sub_task_id[$key];?>")' style="color:<?php echo $status_bg_colour;?>"> <?php echo $sub_task_status_names[$key];?> </a> 
					<?php if($primary_task_id == $sub_task_id[$key]  && $primary_task_status_id!='271') {?> &nbsp  &nbsp 
									
					<?php if($primary_task_status_id !=226){ ?>
					<a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-md2" onclick='getAssign_task_pop("<?php echo $task_details->task_id;?>")'> <i class="fas fa-pencil-alt"></i></a>
					<?php }  ?>
					<?php }  ?>
					<?php }  ?>

					</strong> 


					</td>
					</tr>
					<?php } } ?>
					</tr>


					</table>
				  
				  
				  
				  
				  
                </div>
              </div>
              <div class="mb-3 row">
               
                <div class="col-md-4">
				 <?php if(empty($task_hardware_used_data)){ ?>
                  <p class="b-heafd" >Hardware Used</p>
				  
				 <?php }  if(!empty($task_hardware_used_data)){ ?>
				   <div class="row">
                    <div class="col-md-4">
                      <p class="b-heafd" >Hardware Code</p>
                    </div>
                    <div class="col-md-4">
                      <p class="b-heafd" >used units</p>
                    </div>
                    <div class="col-md-4">
                      <p class="b-heafd" >Description</p>
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
                      <p><?php echo $task_hardware->no_of_units_used;?></p>
                    </div>
                    <div class="col-md-4">
                      <p> <?php echo $task_hardware->hw_desc;?></p>
                    </div>
                  </div>
					<?php } } } ?>
					<?php }else{ ?>
					-
					<?php } ?>
					
				  
                </div>
                <div class="col-md-2">
                  <p></p>
                  <h6 ></h6>
                </div>
				
				
                <div class="col-md-3">
                  <p class="b-heafd" >Source </p>
                  <h6 >Service Now </h6>
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >Reson(s)</p>
                  <h6 ><?php echo $task_details->task_message;?> </h6>
                </div>
              </div>
              <div class="mb-3 row">
                <div class="col-md-3">
                  <p></p>
                  <h6 >- </h6>
                </div>
                <div class="col-md-3">
                  <p></p>
                  <h6 ></h6>
                </div>
                <div class="col-md-3">
                  <p class="b-heafd" >Owner / Dispatcher </p>
                  <h6 ><?php echo $task_details->task_owner_name;?> </h6>
                </div>
                <div class="col-md-3">
                  <p></p>
                  <h6 > </h6>
                </div>
              </div>
			  
				<input class="form-control" type="hidden" name="task_id" id="task_id"  value="<?php echo $task_details->task_id;?>" >

			   <!-- <div class="mb-3 row">

			   <div class="col-md-4">
                    <label class="form-label">Task Status</label>
                    <select class="form-control select2" id="task_status" name="task_status" required>
					<option value="" >Select Type</option>
					<?php 
					if(!empty($task_status_list)){
					foreach($task_status_list as $key=>$taskstatus1){
					?> 
					<option value="<?php echo $taskstatus1->sub_cat_id;?>" <?php if($task_details->task_status == $taskstatus1->sub_cat_id){ echo 'selected'; }?> ><?php echo $taskstatus1->sub_cat_name?></option>
					<?php } } ?>
					</select>
                  </div>
				  
				  <div class="col-md-4">
                    <label class="col-form-label">Issue Found</label>
                    <input class="form-control" type="text" name="issue_found" id="issue_found"  placeholder="Other Issues" >
                  </div>  
                  </div>  
				  
			    <div class="col-md-10">
                    <label class="col-form-label">Comments <span>*</span></label>
                    <textarea name="remarks" id="remarks" rows="4" class="form-control" placeholder="Enter Remarks" required></textarea>
                   
                  </div>
				  

				  <div class="mb-2 row">
                  <div class="col-md-12 text-center m-2">
				  
				  
					<input type="submit" name="submit" value="Update Task" class="btn btn-success w-md">
				 

                  </div>
                </div>-->
				  
            </div>
          </div>
        </div>
        <!-- end col --> 
      </div>
      </form>
	  
	  
       <div class="row">
        <div class="col-xl-12">
          <div class="card"> 
            <div class="card-body"> 
              
              <!-- Nav tabs -->
              <ul class="nav nav-pills nav-justified   filter-tabs" role="tablist">
				<?php 
				
				if(!empty($task_sections_cols)){
				foreach($task_sections_cols as $key1=>$task_section){
				?>
                <li class="nav-item waves-effect waves-light"> 
				<a class="nav-link <?php if($key1 == 0){ echo 'active'; }?>" data-bs-toggle="tab" href="#link-<?php echo $key1;?>" role="tab">
				<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
				<span class="d-none d-sm-block"><?php echo $task_section->section_name;?> <!--span class="" <?php if(!empty($task_section)){ ?> data-bs-toggle="modal" data-bs-target=".bs-example-modal-sections_edit" onclick='getTask_section_details("<?php echo $task_section->section_data[0]->section_id;?>")' <?php } ?>><?php if(!empty($task_section)){ ?><i class="fas fa-edit"></i><?php } ?></span--></span></a>
				</li>
				<?php } } ?>
				 <li><!--a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sections_add" class="btn btn-success  text-white">Add +</a--> </li>
              </ul>
              
              <!-- Tab panes -->
              <div class="tab-content">
			  
				<?php 
				if(!empty($task_sections_cols)){
				foreach($task_sections_cols as $key1=>$task_section){

				?>
                <div class="tab-pane <?php if($key1 == 0){ echo 'active'; }?> p-3" id="link-<?php echo $key1;?>" role="tabpanel">
				<div><!--a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sections_cols_add" class="btn btn-success  text-white text-right" onclick='getTask_section_id_details("<?php echo $task_section->section_data[0]->section_id;?>")'>Add +</a--></div> 
                  <div class="mb-3 row">
						<?php 
						if(!empty($task_section->section_data)){
						foreach($task_section->section_data as $key2=>$section_col){
						?>
                    <div class="col-md-4">
                      <b><?php echo $section_col->section_col_name;?> </b>
                      <h6 ><?php echo str_replace('"','',$section_col->section_col_value);?> <!--a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sections_cols_edit" onclick='getTask_section_cols_details("<?php echo $section_col->task_section_col_id;?>")'> <i class="fas fa-edit"></i></a--></h6>
                    </div>
						<?php } } ?>
                  </div>
                 
                </div>
               <?php  } } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
	  
	  
	  
	  <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Task History</h4>
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 <div>
                  <?php echo Datetimeconversion($task_details->task_created_date);?><br>
                  Assigned to <a href="#">-<?php echo $task_details->task_type_name;?></a> Department</div>
                </button> 
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="depart">
                      <div class="histo">
                     
						<?php 
						$i=0;
						if(!empty($task_logs)){
						foreach($task_logs as $key1=>$task_log){
						?>
                        <div class="histo-item">
                          <div class="track">
                            <h3><?php echo Dateconversion($task_log->tl_date_created);?></h3>
                            <p><?php echo Timeconversion($task_log->tl_date_created);?></p>
                          </div>
                          <div class="histo-content">
                            <div class="row">
                              <div class="col-md-4 asign">
                                <button type="button" class="btn btn-default" style="background-color:<?php if(!empty($task_log->task_status_name)){ echo $task_log->status_bg_colour;?> !important;color: #fff <?php }else { ?>#ffff!important;font-weight: bold;color: #666<?php } ?>" >
									<?php if(!empty($task_log->task_status_name)){ ?>
									<?php echo $task_log->task_status_name;?>
									<?php }else { ?>
									Note Added
									<?php } ?>
								</button>
                              </div>
							  <?php $call_attendedby_names= explode(',',$task_log->call_attendedby_name);?>
                              <div class="col-md-4 asign">
                                 
									<?php 
									$i=0;
									if($task_log->task_status != 271){  ?>
									<?php if($task_log->task_status != 225){ ?>
									<?php if($task_log->task_status != 227){ ?>
									<div class="cust">
									<?php if($task_log->task_status != 217){ ?>
									
									<?php if(!empty($call_attendedby_names)){
									foreach($call_attendedby_names as $key_cl=>$cl_name){
									?>
									
                                  <h6><a href="javascript:void(0);"> <?php echo $cl_name;?> </a></h6>
									<?php } } ?>
									
									<?php }else { ?>
                                  <h6><a href="javascript:void(0);"> <?php echo $task_log->task_owner_name;?> </a></h6>
									<?php } ?>
									
									  </div>
									 <?php } ?>
									 <?php } ?>
									<?php 
									if($task_log->task_status == 218){  ?>		
									 <div class="desc">
									  <p>Assigned by</p>
									  <h6><?php echo $task_log->assigned_name;?></h6>
									</div>
									<?php } ?>
									
									<?php 
									if($task_log->task_status == 227){  ?>		
									 <div class="desc">
									  <p>Approved By</p>
									  <h6><?php echo $task_log->assigned_name;?></h6>
									</div>
									<?php } ?>
									
									<?php 
									if($task_log->task_status == 225){  ?>		
									 <div class="desc">
									  <p>Accepted By</p>
									  <h6><?php echo $task_log->assigned_name;?></h6>
									</div>
									<?php } ?>
									
									<?php 
									if($task_log->task_status == 408){  ?>		
									 <div class="desc">
									  <p>Removed by</p>
									  <h6><?php echo $task_log->assigned_name;?></h6>
									</div>
									<?php } ?>
									
									
									
									<?php }else {  ?>
									<div class="cust">
									 <h6><?php echo $task_log->call_attendedby_name;?> </h6>
									 <p>on behalf of</p>
									 <h6><?php echo $task_log->assigned_name;?> </h6>
									 </div>
									<?php } ?>
                              </div>
							
                              <div class="col-md-4">
                                <div class="desc">
                                  <p><?php echo $task_log->comments;?></p><br>
								    <?php if($task_log->travel_distance!='' || $task_log->travel_distance!=null){ ?>
                      <p><?php if($task_log->task_status != 219){  ?><?php } ?><?php echo $task_log->travel_distance;?></p><?php }?>
                                </div>
                              </div>
							  
                            </div>
                          </div>
                        </div>
						<?php } } ?>
						
						
                     
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="chcklist">
              <h6>Submitted Checklist</h6>
              <p>Service Number - <?php echo $task_details->task_no;?></p>
            </div>
            <div class="reso">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="text-white"><?php echo substr($task_details->task_type_name, 0,2);?></h6>
                </div>
                <div class="col-md-6">
                  <h6 class="text-white"></h6>
                  <p class="text-white"><?php echo Dateconversion($task_details->task_created_date);?>,<?php echo Timeconversion($task_details->task_created_date);?></p>
               
				</div>
              </div>
            </div>
             <!-- <h6>Resolution</h6>-->

			<?php  if(!empty($task_check_list)){ ?>
            <div class="chcklist-new"  id="contact">
		<?php 
				$task_check_list_final1=$task_check_list->form_tabs;
				$image_signs1=$task_check_list->images_tabs;
				$image_signs=json_decode($image_signs1); 
				$task_check_list_final=json_decode($task_check_list_final1); 
				 // echo '<pre>';print_r($image_signs);exit; 

				?>

				<?php 
				if(!empty($task_check_list_final)){
				foreach($task_check_list_final as $key21=>$task_check){
					?>
              <div class="mb-1 row">
                <div class="col-md-12">
                  <div>
                    <div class="position-relative form-group">
                      <label for="exampleEmail" class="">  <b> <?php echo str_replace('_',' ',ucfirst($key21));?> - </b> <?php echo $task_check;?>&nbsp  &nbsp
					 </label>
                    </div>
                  </div>
                
                </div>
              </div>
				<?php } }  ?>
				<?php 
				if(!empty($image_signs)){
				foreach($image_signs as $key12=>$image_sig){

					?>
					
					
					
              <div class="mb-1 row">
                <div class="col-md-12">
                  <div>
                    <div class="position-relative form-group">
                      <label for="exampleEmail" class=""> <b><?php echo str_replace('_',' ',ucfirst($key12));?>  </b>-  
					  <?php 
				if(!empty($image_sig)){ ?>
					<!--  <a href="<?php echo base_url()?>Tasks/base64_to_jpeg/<?php echo $image_sig;?>" target="_blank" > <?php echo $key12;?> </a> -->
					<?php 
					$file = $image_sig;
					$file_headers = @get_headers($file);
					if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') { ?>
					  <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-view_check_image" onclick='get_task_checklist_imng_pop("<?php echo $image_sig;?>")'><?php echo $key12;?></a>
					<?php } else { ?>
					 <a href="<?php echo $image_sig;?>" target="_blank" ><?php echo $key12;?></a>
					<?php } ?>
					<?php } ?>
					
					
					
					  &nbsp  &nbsp
					 </label>
                    </div>
                  </div>
                
                </div>
              </div>
				<?php }  }  ?>
			  
			  
			  
            </div>
				<?php }  ?>
		
		 
			  
			  
			  
          </div>
        </div>
      </div>
    </div>
	  
      <!--<div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Task History</h4>
				
               <div class="hist">
                      <div class="task">
                        <ul class="sessions">
							<?php 
							$i=0;
							if(!empty($task_logs)){
							foreach($task_logs as $key1=>$task_log){
							?>
						  <li>
                            <div class="time"><?php echo $task_log->task_status_name;?> - <?php echo $task_log->task_owner_name;?> </div>
                            <p><?php echo Datetimeconversion($task_log->tl_date_created);?><br><?php echo $task_log->comments;?><br><?php if($task_log->travel_distance!=''){ ?><?php echo "  ".$task_log->travel_distance;?><?php }?></p>
                          </li>
                        
                            <div class="time"><?php echo $task_log->task_owner_name;?>- <?php echo $task_log->task_status_name;?>- <?php echo Datetimeconversion($task_log->tl_date_created);?></div>
                            <p><?php echo $task_log->comments;?></p>
                          
			<?php }  } ?>
                        </ul>
                      </div>
                    </div>
			
			
			
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <button type="button" class="btn btn-secondary btn-sm waves-effect">Submitted Checklists</button>
      </div>
    </div>-->
	
	
	
	
	
	
	
	
	
  </div>
  <!-- container-fluid --> 
</div>

<!--Add Note / Document start here -->
<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-documents_add" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0">Add  Document</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
		<form class="needs-validation" action="<?php echo base_url();?>Tasks/add_notes_data/1" method="post" enctype="multipart/form-data">        
		<div class="row">
          <div class="col-12">
          <div class="row">
           <div class="col-md-4">
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="internal_type" id="formRadios1" checked="" value="0"  required>
              <label class="form-check-label" for="formRadios1"> Internal </label>
            </div>
          </div>
          <!-- end col -->
			<input class="form-control" type="hidden" name="note_type" id="note_type"  value="0" >
			<input class="form-control" type="hidden" name="task_id" id="task_id"  value="<?php echo $task_details->task_id;?>" >
			<input class="form-control" type="hidden" name="note" id="note"  value="" >

          <div class="col-md-8">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="internal_type" id="formRadios2" value="1" >
              <label class="form-check-label" for="formRadios2"> External </label>
            </div>
          </div>
          <!-- end col -->
          
         
          
          <div class="col-12">
          <div class="card">
          <div class="card-body">
          <div>
            
            <div class="dz-message needsclick">
              <div class="mb-3 text-center"> <i class="mdi mdi-cloud-upload-outline text-muted display-4"></i> </div>
              <h4>Drop files here or click to upload.</h4>
            </div>
        </div>
        <div class="text-center mt-4">
              <input name="attachment" type="file"  required>
        </div>
      </div>
    </div>
  </div>
  <!-- end col --> 
  
</div>
</div>
</div>
<div class="row mt-2">
  <div class="col-6"> 
    <!--                <button type="button" class="btn btn-success">Submit</button>--> 
  </div>
  <div class="col-6 text-end"> 
    <!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
	<button type="submit" id="notes_add_btn"  class="btn btn-success">Submit</button>
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
<!-- Add Note / Document end here --> 





<!--Add Note / Document start here -->
<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-notes_add" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0">Add Note </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
		<form class="needs-validation" action="<?php echo base_url();?>Tasks/add_notes_data/1" method="post" enctype="multipart/form-data">
          <div class="row">
          <div class="col-12">
          <div class="row">
          <div class="col-md-4">
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="internal_type" id="formRadios1" checked="" value="0"  required>
              <label class="form-check-label" for="formRadios1"> Internal </label>
            </div>
          </div>
          <!-- end col -->
			<input class="form-control" type="hidden" name="note_type" id="note_type"  value="1" >
			<input class="form-control" type="hidden" name="task_id" id="task_id"  value="<?php echo $task_details->task_id;?>" >
			<input class="form-control" type="hidden" name="attachment" id="attachment"  value="" >

          <div class="col-md-8">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="internal_type" id="formRadios2" value="1" >
              <label class="form-check-label" for="formRadios2"> External </label>
            </div>
          </div>
          <!-- end col -->
          
          <div class="col-md-12">
            <textarea name="note" id="note" rows="4" class="form-control" placeholder="Note text" required></textarea>
          </div>
          <!-- end col -->
          
    
  <!-- end col --> 
  
</div>
</div>
</div>
<div class="row mt-2">
  <div class="col-6"> 
    <!--                <button type="button" class="btn btn-success">Submit</button>--> 
  </div>
  <div class="col-6 text-end"> 
    <!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
			<button type="submit" id="notes_add_btn"  class="btn btn-success">Submit</button>
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
<!-- Add Note / Document end here --> 









<!--Add Note / Document start here -->
<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-sections_add" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0">Add Section </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
			<div class="modal-body">
			<form class="needs-validation" action="<?php echo base_url();?>Tasks/section_add" method="post">
			<div class="row">
			<div class="col-12">
			<div class="row">

			<div class="col-md-12">
			<label class="col-form-label">Section Name</label>
			<input class="form-control" type="text" name="section_name" id="section_name1"  placeholder="Name" required>
			<input class="form-control" type="hidden" name="task_id" id="task_id"  value="<?php echo $task_details->task_id;?>" >
			</div>
			</div>


			</div>
			</div>
		<div class="row mt-2">
		  <div class="col-6"> 
			<!--                <button type="button" class="btn btn-success">Submit</button>--> 
		  </div>
		  <div class="col-6 text-end"> 
			<!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
			<button type="submit" id="section_add_btn"  class="btn btn-success">Submit</button>
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
<!-- Add Note / Document end here --> 



<!--Add Note / Document start here -->
<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-sections_cols_add" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0">Add Section Col</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
			<div class="modal-body">
			<form class="needs-validation" action="<?php echo base_url();?>Tasks/section_cols_add" method="post">
			<div class="row">
			<div class="col-12">
			<div class="row">

			<div class="col-md-12">
			<label class="col-form-label">Section Col Name</label>
			<input class="form-control" type="text" name="section_col_name" id="section_col_name_new"  placeholder="Name" required>
			<input class="form-control" type="hidden" name="task_id" id="task_id"  value="<?php echo $task_details->task_id;?>" >
			<input class="form-control" type="hidden" name="section_id" id="section_id_new"  >
			</div>
			<div class="col-md-12">
			<label class="col-form-label">Section Value </label>
			<input class="form-control" type="text" name="section_col_value" id="section_col_value_new"  placeholder="Value" required>
			</div>
			</div>


			</div>
			</div>
		<div class="row mt-2">
		  <div class="col-6"> 
			<!--                <button type="button" class="btn btn-success">Submit</button>--> 
		  </div>
		  <div class="col-6 text-end"> 
			<!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
			<button type="submit" id="section_col_add_btn"  class="btn btn-success">Submit</button>
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
<!-- Add Note / Document end here --> 






<!--Add Note / Document start here -->
<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-sections_edit" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0">Edit Section </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
			<div class="modal-body">
			<form class="needs-validation" action="<?php echo base_url();?>Tasks/section_update" method="post">
			<div class="row">
			<div class="col-12">
			<div class="row">

			<div class="col-md-12">
			<label class="col-form-label">Section Name</label>
			<input class="form-control" type="text" name="section_name" id="section_name"  placeholder="Name" required>
			<input class="form-control" type="hidden" name="section_id" id="section_id"  >
			<input class="form-control" type="hidden" name="task_id" id="task_id"  value="<?php echo $task_details->task_id;?>" >

			</div>
			</div>


			</div>
			</div>
		<div class="row mt-2">
		  <div class="col-6"> 
			<!--                <button type="button" class="btn btn-success">Submit</button>--> 
		  </div>
		  <div class="col-6 text-end"> 
			<!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
			<button type="submit" id="section_update_btn"  class="btn btn-success">Submit</button>
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
<!-- Add Note / Document end here --> 




<!--Add Note / Document start here -->
<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-sections_cols_edit" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0">Edit Section Col</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
			<div class="modal-body">
			<form class="needs-validation" action="<?php echo base_url();?>Tasks/section_cols_update" method="post">
			<div class="row">
			<div class="col-12">
			<div class="row">

			<div class="col-md-12">
			<label class="col-form-label">Section Col Name</label>
			<input class="form-control" type="text" name="section_col_name" id="section_col_name"  placeholder="Name" required>
			<input class="form-control" type="hidden" name="task_section_col_id" id="task_section_col_id"  >
			<input class="form-control" type="hidden" name="section_id" id="section_id_col"  >
			
			<input class="form-control" type="hidden" name="task_id" id="task_id"  value="<?php echo $task_details->task_id;?>" >

			</div>
			
			<div class="col-md-12">
			<label class="col-form-label">Value</label>
			<input class="form-control" type="text" name="section_col_value" id="section_col_value"  placeholder="Value" required>
			

			</div>
			
			
			</div>


			</div>
			</div>
		<div class="row mt-2">
		  <div class="col-6"> 
			<!--                <button type="button" class="btn btn-success">Submit</button>--> 
		  </div>
		  <div class="col-6 text-end"> 
			<!--                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>-->
			<button type="submit" id="section_update_btn"  class="btn btn-success">Submit</button>
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
<!-- Add Note / Document end here --> 










<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-change_status" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
    <div class="modal-dialog modal-change_status">
      <div class="modal-content" id="status_task_list_div">
       
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
</div>

<!-- Re-assign Job start here -->


<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-md2" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
    <div class="modal-dialog modal-md2">
      <div class="modal-content" id="assign_task_list_div">
       
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
</div>




<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-view_check_image" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
    <div class="modal-dialog modal-change_status">
      <div class="modal-content" id="view_checklist_image_div">
       
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
</div>



<div class="col-sm-6 col-md-3 mt-4"> 
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-notes_sow" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
<div class="modal-dialog modal-dialog-scrollable">
<div class="modal-content" id="notes_sow_list_div">

</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
<!-- /.modal --> 
</div>

	<script>
function getAssign_task_pop(task_id){	
			page_type=1;
			if(task_id != ''){
				$.ajax({
				type: "POST",    
				dataType: "html",    
				url: "<?php echo site_url(); ?>Tasks/get_task_assign_ajax",    
				data: {task_id:task_id,page_type:page_type }})
				.done(function(data){
					
				$('#assign_task_list_div').html(data);
				});
			}
		}	



function getNotes_task_show_pop(task_id,note_type){	
	if(task_id != ''){
	$.ajax({
	type: "POST",    
	dataType: "html",    
	url: "<?php echo site_url(); ?>Tasks/get_task_notes_sow_list_ajax",    
	data: {task_id:task_id,note_type:note_type }})
	.done(function(data){

	$('#notes_sow_list_div').html(data);
	});
	}
}
		
function getTask_section_details(section_id){	
			
			if(section_id != ''){
				$.ajax({
				url:"<?php echo base_url()?>Tasks/get_section_id_data",
				method:"POST",
				data:{section_id:section_id},
				success:function(data)
				{
				data = JSON.parse(data);
					console.log(data);
				if(data.msg==true || data.msg=='true')
				{
					var response = data.response;
					$('#section_name').val(response.section_name);
					$('#section_id').val(response.section_id);
				}
				
				}
				});
				
			}
		}
		
function getTask_section_id_details(section_id){	
			
			if(section_id != ''){			
					$('#section_id_new').val(section_id);
			}
		}
		

		
function getTask_section_cols_details(task_section_col_id){	
			
			if(task_section_col_id != ''){
				$.ajax({
				url:"<?php echo base_url()?>Tasks/get_task_section_cols_id_data",
				method:"POST",
				data:{task_section_col_id:task_section_col_id},
				success:function(data)
				{
				data = JSON.parse(data);
					console.log(data);
				if(data.msg==true || data.msg=='true')
				{
					var response = data.response;
					$('#section_col_name').val(response.section_col_name);
					$('#section_col_value').val(response.section_col_value);
					$('#section_id_col').val(response.section_id);
					$('#task_section_col_id').val(response.task_section_col_id);
				}
				
				}
				});
				
			}
		}
		




$(document).ready(function(){
			$("#task_check_list_form").on("submit", function(e){
				e.preventDefault();		
				   
					$("#task_check_list_submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
				$("#task_check_list_submit_btn").attr("disabled",true);
				$.ajax({
					type: "post",
					url:"<?php echo base_url()?>Tasks/task_update_checklist_submited_form_ajax",
					data:$("#task_check_list_form").serialize(),
					success:function(result)
					{		
						var jsondata=jQuery.parseJSON(result);	

						if(jsondata['status']==1)
						{
							$("#task_check_list_form")[0].reset();
							$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
							setTimeout(function(){ window.location = "<?php echo base_url(); ?>Tasks/update_task/"+jsondata['task_id']; }, 1000);
						}
						else
						{
							$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							$("#task_check_list_submit_btn").html('Save');
							$("#task_check_list_submit_btn").attr("disabled",false);		
						}
					}
				});	
			});	
			
			
			
			
		});	



function getCHange_task_status_pop(task_id){	
			page_type=1;
			if(task_id != ''){
				$.ajax({
				type: "POST",    
				dataType: "html",    
				url: "<?php echo site_url(); ?>Tasks/get_task_status_update_ajax",    
				data: {task_id:task_id,page_type:page_type }})
				.done(function(data){
					
				$('#status_task_list_div').html(data);
				});
			}
		}

function get_task_checklist_imng_pop(encode_img){	
			page_type=1;
			var task_id=$("#task_id").val();

			if(encode_img != ''){
				$.ajax({
				type: "POST",    
				dataType: "html",    
				url: "<?php echo site_url(); ?>Tasks/base64_to_jpeg",    
				data: {encode_img:encode_img,task_id:task_id }})
				.done(function(data){
					
				$('#view_checklist_image_div').html(data);
				});
			}
		}


   $('.ShowContact').click(function() {
	   $('#contact').hide(500);
	   $('#contactedit').show(500);
	   $('.ShowContact').hide(0);
	   $('.HideContact').show(0);
   });
	$('.HideContact').click(function() {
	$('#contactedit').hide(500);
	$('#contact').show(500);
	$('.ShowContact').show(0);
	$('.HideContact').hide(0);
	});
   
   
$('.toggle').click(function() {
       $('#contact').toggle('slow');
       $('#contactedit').toggle('slow');
});		
	</script>