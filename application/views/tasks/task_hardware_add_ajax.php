<form class="needs-validation" action="<?php echo base_url();?>Tasks/hard_ware_used_add" method="post">
			<div class="row">
			<div class="col-12">
			<div class="row">

			<div class="col-md-12">
			<label class="col-form-label"> Category</label>
			<select class="form-control select2" id="cat_id" name="cat_id" onchange="get_hw_partcode_list()"  required>
			<option value="" >Select</option>
			<?php 
			if(!empty($hardware_categories_data)){
			foreach($hardware_categories_data as $key1=>$hardware_cat){
			?> 
			<option value="<?php echo $hardware_cat->sub_cat_id;?>" ><?php echo $hardware_cat->sub_cat_name?></option>
			<?php } } ?>
			</select>
			</div>
			
			<div class="col-md-12">
			<label class="col-form-label">Hw Partcode</label>
			<select class="form-control select2" id="hw_partcode" name="hw_partcode" onchange="get_hw_desc_list()"  required>
			<option value="" >Select</option>
			</select>
			
			
			
			<input class="form-control" type="hidden" name="hardware_id" id="hardware_id" value="<?php echo $hardware_id;?>" >
			<input class="form-control" type="hidden" name="task_id" id="task_id"  value="<?php echo $task_id;?>" >
			  <input type="hidden" id="service_no" name="service_no" value="<?php echo $service_no;?>" >

			</div>
			
			<div class="col-md-12">
			<label class="col-form-label">Hw Desc</label>
			<input class="form-control" type="text" name="hw_desc" id="hw_desc"  placeholder="Name"  value="" required readonly>
			<input class="form-control" type="hidden" name="hw_id" id="hw_id"  value="<?php echo $data->hw_id;?>" >

			</div>
			
			<div class="col-md-12">
			<label class="col-form-label">No Of Units Used</label>
			<input class="form-control" type="text" name="no_of_units_used" id="no_of_units_used"  value="" placeholder="Value" required>
			

			</div>
			
			
			</div>


			</div>
			</div>
		<div class="row mt-2">
		  <div class="col-6"> 
			<!--                <button type="button" class="btn btn-success">Submit</button>--> 
		  </div>
		  <div class="col-6 text-end"> 
			     <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
			<button type="submit" id="section_update_btn"  class="btn btn-success">Submit</button>
		  </div>
		</div>
</form>




  <script  type="text/javascript">
    
   
   function get_hw_partcode_list(){
	var cat_id=$("#cat_id").val();
	// var call_attend_by_primary=$("#call_attend_by_primary").val();
			$.ajax({    
			type: "POST",    
			dataType: "html",    
			url: "<?php echo base_url('Tasks/get_category_hardware_list'); ?>",    
			data: {cat_id:cat_id }})
			.done(function(data) { 
			$('#hw_partcode').html(data);
			});
}


function get_hw_desc_list(){	
	var hw_partcode=$("#hw_partcode").val();
console.log(hw_partcode);
			if(hw_partcode != ''){
				$.ajax({
				url:"<?php echo base_url()?>Tasks/get_hw_desc_list",
				method:"POST",
				data:{hw_partcode:hw_partcode},
				success:function(data)
				{
				data = JSON.parse(data);
					console.log(data);
				if(data.msg==true || data.msg=='true')
				{
					var response = data.response;
					$('#hw_desc').val(response.hw_desc);
					$('#hw_id').val(response.hw_id);
				}
				
				}
				});
				
			}
		}

</script> 