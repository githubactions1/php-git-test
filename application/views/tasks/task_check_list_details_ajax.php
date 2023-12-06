          <form class="needs-validation"id="check_list_update_form" enctype="multipart/form-data">
			
			<input class="form-control" type="hidden" name="task_id" id="task_id"  value="<?php echo $task_id;?>" >
			<input class="form-control" type="hidden" name="chck_sub_id" id="chck_sub_id"  value="<?php echo $task_check_list->chck_sub_id;?>" >

			<?php 
				$task_check_list_final1=$task_check_list->submitted_tabs;
			$task_check_list_final=json_decode($task_check_list_final1); 
			?>
				<?php 
				$check_list_form_sections=$check_list_form_data->sections;

						//echo '<pre>';print_r($task_check_list); 
				if(!empty($check_list_form_sections)){ 
				foreach($check_list_form_sections as $keysc1=>$section){
					
				?> <h5><b><?php echo $section->sectionName;?></b></h5>
						<?php $tabs_name=$section->fields; 
							if(!empty($tabs_name)){ 
							foreach($tabs_name as $keytb=>$tab){
								 
								if($tab->customerVisible == 'Yes'){
									$data_type=$tab->dataType=='String'?"text":"number";
									$readOnly=$tab->readOnly=='false'?"":"readonly";
									$mandatory=$tab->mandatory=='false'?"":"required";
									$mandatory_start=$tab->mandatory=='false'?"":"<span class='text-danger'>*</span>";
									$choiceList=$tab->choiceList;
									$value_name=$tab->field;
									$tab_value=$task_check_list_final->$value_name;
						?>
						<div class="position-relative form-group">
						  <label for="exampleEmail" class=""> <b><?php echo $tab->label;?> </b><?php echo $mandatory_start;?></label>
							<?php if($tab->type == 'Choice' || $tab->type == 'Radio'){ ?>
							<select class="form-control" id="<?php echo $tab->field;?>" name="TT_<?php echo $tab->type;?>_<?php echo $tab->field;?>"  <?php echo $mandatory;?> <?php echo $readOnly;?>>
								<option value="" >Select</option>
								<?php 
								if(!empty($choiceList)){
								foreach($choiceList as $keych11=>$choiceList1){
								?> 
								<option value="<?php echo $choiceList1;?>" <?php if($tab_value == $choiceList1) { echo 'selected';}?>><?php echo $choiceList1;?></option>
								<?php } } ?>
								</select>
							<?php } else if($tab->type == 'Date'){   ?>
							<input type="date" class="form-control" id="<?php echo $tab->field;?>" name="TT_<?php echo $tab->type;?>_<?php echo $tab->field;?>" value="<?php echo $tab_value;?>" placeholder="Enter <?php echo $tab->label;?>" <?php echo $mandatory;?> <?php echo $readOnly;?>>
							<?php } else if($tab->type == 'Camera' || $tab->type == 'Signature'){   ?>
								<br> 
								<?php if($tab->type == 'Signature'){  ?>
						<input type="hidden" class="form-control" id="<?php echo $tab->field;?>" name="TT_<?php echo $tab->type;?>_<?php echo $tab->field;?>" value="<?php echo $tab_value;?>" placeholder="Enter <?php echo $tab->label;?>">

								 <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-view_check_image" onclick='get_task_checklist_imng_pop("<?php echo trim($tab_value);?>")' class='btn btn-sm btn btn-success'> Click Here </a> </a>
								<?php }else { ?>
<input type="hidden" class="form-control" id="<?php echo $tab->field;?>" name="TT_<?php echo $tab->type;?>_<?php echo $tab->field;?>" value="<?php echo $tab_value[0];?>" placeholder="Enter <?php echo $tab->label;?>">

								<a href="<?php echo $tab_value[0];?>" target="_blank" ><img src="<?php echo $tab_value[0];?>" alt="Image1" height="150px" width="150px" ></a>
								<?php } ?>
								
								
							<?php }  else {   ?>
							<input type="<?php echo $tab->type;?>" class="form-control" id="<?php echo $tab->field;?>" name="TT_<?php echo $tab->type;?>_<?php echo $tab->field;?>" value="<?php echo $tab_value;?>" placeholder="Enter <?php echo $tab->label;?>" <?php echo $mandatory;?> <?php echo $readOnly;?>>
							<?php }   ?>
						  
						</div>
						<?php }   ?>
						<?php } }  ?>
				
				<?php }  ?>
				<?php }  ?>
					
		<div class="row mt-3">
		  <div class="col-6"> 
		  </div>
		  <div class="col-6 text-end"> 
			     <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal">Close</button>
		<button type="submit" id="check_list_update_btn"  class="btn btn-success">Submit</button> 
		  </div>
		</div>
			
</form>

	
<script>
$(function() {
	$('.select2').select2();
});
		$(document).ready(function(){
			$("#check_list_update_form").on("submit", function(e){
				e.preventDefault();		
				   
					$("#check_list_update_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
				$("#check_list_update_btn").attr("disabled",true);
				$.ajax({
					type: "post",
					url:"<?php echo base_url()?>Tasks/task_check_list_update_form_ajax",
					data:$("#check_list_update_form").serialize(),
					success:function(result)
					{		
						var jsondata=jQuery.parseJSON(result);	

						if(jsondata['status']==1)
						{
							$("#check_list_update_form")[0].reset();
							$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
							setTimeout(function(){ window.location = "<?php echo base_url(); ?>Tasks/update_task/<?php echo $task_id;?>"; }, 1000);
							
						}
						else
						{
							$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							$("#check_list_update_btn").html('Update <i class="flaticon-right-arrow-1"></i> ');
							$("#check_list_update_btn").attr("disabled",false);		
						}
					}
				});	
			});	
			
			
			
			
		});	


	
	</script>
	

