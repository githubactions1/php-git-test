<style> .parsley-errors-list{color:red; list-style-type: none;}.table-responsive {background-color: #eff3f7 !important;padding:10px !important;} 
.app-page-title
{
	background:transparent !important;
} 
.body-tabs-layout
{
	margin-top:0px !important;
}
</style>

<!--<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/combo.css">

<script src="<?php echo base_url();?>assets/js/parsley.min.js"></script>

<div class="main-content">
    <div class="page-content">
      <div class="container-fluid"> 
        
        <!-- start page title -->
        <div class="row">
          <div class="col-sm-8">
            <div class="page-title-box">
              <h4><?php echo $page_name;?> Team Member</h4>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="page-title-box">
              <ol class="breadcrumb add-rgt">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                <li class="breadcrumb-item active"><?php echo $page_name;?> Team Member</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
				<form class="needs-validation"id="employee_create_form" enctype="multipart/form-data" autocomplete="off">

                <div class="mb-2 row">
                  <div class="col-md-4">
                    <label class="col-form-label">Team Member Name</label>
                    <input class="form-control" type="text" id="emp_name" placeholder="Employee Full Name" name="emp_name" value="<?php echo $employee_record->emp_name?>"   data-parsley-required="true" required="" data-parsley-required-message="Enter Member Name" data-parsley-minlength="3"  data-parsley-maxlength="100"  oninput="this.value=this.value.replace(/[^a-zA-Z \s\.]+$/g,'');" >
                  </div>
                  <div class="col-md-4">
                    <label class="col-form-label">Employee Id</label>
                    <input class="form-control" type="text" value="<?php echo $employee_record->emp_code?>" id="emp_code" placeholder="Employee Code" name="emp_code"  data-parsley-required="true" required="" data-parsley-required-message="Enter Employee Id">
                  </div>
				  
                  <div class="col-md-4">
                    <label class="col-form-label">Mobile Number</label>
                    <input class="form-control" type="text" value="<?php echo $employee_record->emp_mobile?>"  id="emp_mobile" name="emp_mobile" placeholder="Mobile Number" data-parsley-required="true" required="" data-parsley-required-message="Enter Mobile Number" data-parsley-minlength="10"  maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                  </div>
                 
                  <div class="col-md-4">
                    <label class="col-form-label">User Name</label>
                    <input class="form-control" type="text" value="<?php echo $employee_record->emp_username?>" id="emp_username" placeholder="User Name" name="emp_username" data-parsley-required="true" required="" data-parsley-required-message="Enter User Name">
                  </div>
				   <div class="col-md-4 mt-2">
                    <label class="form-label">Select Organization Unit</label>
                    <input type="text" name="cluster_ids" class="form-control" id="justAnInputBox1" placeholder="Select" autocomplete="off"/>
                    <input type="hidden" name="cluster_id" class="form-control" id="cluster_id_ids_hidden"  >

				  </div>
				  <div class="col-md-4">
                    <label class="col-form-label"> Email</label>
                    <input class="form-control" type="email" value="<?php echo $employee_record->emp_email?>" id="emp_email" placeholder="Enter Email Id" name="emp_email" >
                  </div>
                <!-- end row -->
                
				  
                  <div class="col-md-4 mt-2">
                    <label class="form-label">Task Type</label>
                    <input type="text" name="comp_cat_id_s" class="form-control" id="justAnInputBox2" placeholder="Select" value="" autocomplete="off"/>
                    <input type="hidden" name="comp_cat_id" class="form-control" id="comp_cat_id_ids_hidden" >
                  </div>
                 
                <!-- <div class="col-md-4">
                    <label class="col-form-label">Password</label>
                    <input class="form-control" type="password" value="" id="emp_password" placeholder="Password" name="emp_password" required>
                  </div>-->
				    
                  <div class="col-md-4 mt-2">
                    <label class="form-label">Member Type </label>
                    <select class="form-control select2" id="member_type" name="member_type"    data-parsley-required="true"   data-parsley-required-message="Select Member Type">
                      <option value="" >Select </option>
                      <option value="286" <?php if($employee_record->member_type == '286'){ echo 'selected'; }?> >On Roll</option>
                      <option value="287" <?php if($employee_record->member_type == '287'){ echo 'selected'; }?> >Outsource</option>
                      <option value="288" <?php if($employee_record->member_type == '288'){ echo 'selected'; }?> >Contract</option>
                    </select>
                  </div>
                 
				  
                    <div class="col-md-4 mt-2">
                    <label class="form-label">Select Shift </label>
                    <select class="form-control select2" id="shift_type_id" name="shift_type_id"  >
                      <option value="" >Select </option>
                    </select>
                  </div>
				  
                  <div class="col-md-4 mt-2">
                    <label class="form-label">Vendor </label>
                    <select class="form-control select2" id="vendor_name" name="vendor_name"   data-parsley-required="true"  data-parsley-required-message="Select vendor">
                      <option value="" >Select </option>
                    </select>
                  </div>
				  
                  <div class="col-md-4 mt-2">
                    <label class="form-label">Designations</label>
                    <select class="form-control select2" id="emp_designation" name="emp_designation"  data-parsley-required="true"   data-parsley-required-message="Select Designations">
                      <option value="" >Designations</option>
						<?php 
						if(!empty($designation_list)){
						foreach($designation_list as $key=>$designation){

						?> 
						<option value="<?php echo $designation->role_id;?>**<?php echo $designation->emp_designation;?>" <?php if($employee_record->emp_designation == $designation->emp_designation){ echo 'selected'; }?> ><?php echo $designation->role_name;?></option>
						<?php } } ?>
                    </select>
                  </div>
				  
				  
                  <div class="col-md-4">
                    <label class="col-form-label">Skill</label>
                    <input type="text" name="skill_type_ids" class="form-control" value="" id="justAnInputBox3" placeholder="Select" autocomplete="off"/>
                    <input type="hidden" name="skill_type" class="form-control" value="" id="skill_type_ids_hidden" placeholder="Select" autocomplete="off"/>
				 </div>
				  
                  <!--<div class="col-md-4 mt-2">
                    <label class="form-label">Department</label>
                    <select class="form-control select2" id="emp_dept" name="emp_dept" required>
                      <option value="" >Department</option>
						<?php 
						if(!empty($departments_list)){
						foreach($departments_list as $key=>$department){
						?> 
						<option value="<?php echo $department->sub_cat_id;?>" <?php if($employee_record->emp_dept == $department->sub_cat_id){ echo 'selected'; }?> ><?php echo $department->sub_cat_name;?></option>
						<?php } } ?>
                    </select>
                  </div>-->
               
                
                
				  
                 <!-- <div class="col-md-4">
                    <label class="col-form-label">Pincode</label>
                    <input class="form-control" type="text" name="pincode" id="pincode" value="<?php echo $employee_record->pincode;?>" placeholder="Pincode" required>
                  </div>-->
				  	
				  
                  <!--<div class="col-md-4">
                    <label class="col-form-label">Total Leaves</label>
                    <input class="form-control" type="text" name="total_leaves" id="total_leaves" value="<?php echo $employee_record->total_leaves;?>" placeholder="Total Leaves" required>
                  </div>-->
				  	
				  
                  <div class="col-md-4">
                    <label class="col-form-label">Latitude</label>
                    <input class="form-control" type="text" name="emp_latitude" id="emp_latitude" value="<?php echo $employee_record->emp_latitude;?>" placeholder="latitude"  data-parsley-required="true"  data-parsley-required-message="Enter Latitude">
                  </div>
				  	
				  
                  <div class="col-md-4">
                    <label class="col-form-label">Longitude</label>
                    <input class="form-control" type="text" name="emp_longitude" id="emp_longitude" value="<?php echo $employee_record->emp_longitude ;?>" placeholder="longitude "  data-parsley-required="true"  data-parsley-required-message="Enter Longitude">
                  </div>
				   <div class="col-md-4 mt-2">
                    <label class="form-label">Team Type </label>
                    <select class="form-control select2" id="team_type" name="team_type"    data-parsley-required="true"   data-parsley-required-message="Select Team Type">
                      <option value="" >Select Type</option>
						<!--<?php 
						//if(!empty($team_types_list)){
						//foreach($team_types_list as $team_type_row_key=>$team_type_row){
						?> 
						<option value="<?php echo $team_type_row->sub_cat_id;?>"  ><?php echo $team_type_row->sub_cat_name;?></option>
						<?php //} } ?>-->
						
						 <option value="418">FRT Team</option>
						  <option value="417">Patroller</option>
						
                    </select>
                  </div>
				  
				  	
                 <div class="mb-2 row">
                
                  <div class="col-md-6">
                    <label class="col-form-label">Address</label>
                    <textarea name="address2" id="address2" rows="4" class="form-control" placeholder="Enter Address"><?php echo $employee_record->address2;?></textarea>
                  </div>
                
				   <div class="col-md-6">
                    <label class="col-form-label">Base Address</label>
                    <textarea name="address" id="address" rows="4" class="form-control" placeholder="Enter Base Address"><?php echo $employee_record->address;?></textarea>
                  </div>
                  </div>
				  <div class="mb-2 row">
				    <div class="col-md-4">
                    <label class="col-form-label">City Name</label>
                    <input class="form-control" type="text" name="city" id="city" value="<?php echo $employee_record->city;?>" placeholder="City"  data-parsley-required="true"  data-parsley-required-message="Enter City Name">
                  </div>
                
                  <div class="col-md-4">
                    <label class="col-form-label">City Type</label>
                    <select class="form-control select2" id="city_type" name="city_type" >
                      <option value="" >Select </option>
                      <option value="T1" <?php if($employee_record->city_type == 'T1'){ echo 'selected'; }?> >T1</option>
                      <option value="T2" <?php if($employee_record->city_type == 'T2'){ echo 'selected'; }?> >T2</option>
                      <option value="T3" <?php if($employee_record->city_type == 'T3'){ echo 'selected'; }?> >T3</option>
                      <option value="T4" <?php if($employee_record->city_type == 'T4'){ echo 'selected'; }?> >T4</option>
                    </select>
                  </div>
                  </div>
				  
				<input class="form-control" type="hidden" name="po_number" id="po_number" value="" placeholder="PO Number"  data-parsley-required-message="PO Number">
				<input class="form-control" type="hidden" name="effective_date" id="effective_date" value="" placeholder="Effective Date " data-parsley-required-message="Enter Effective Date">
				<input class="form-control" type="hidden" name="expry_date" id="expry_date" value="" placeholder="Expiry Date "   data-parsley-required-message="Enter Expiry Date">
               
				
                <!-- end row -->
                
               <!-- <div class="mb-2 row">
                  <div class="col-md-12">
                    <label class="col-form-label">Remarks</label>
                    <textarea name="notes" id="notes" rows="4" class="form-control" placeholder="Enter Remarks"><?php echo $employee_record->notes;?></textarea>
                  </div>
                </div>-->
                <!-- end row -->
                
                <div class="mb-2 row">
				<div style="color:GREEN;font-size:20px;text-align:center" >
					<span id="success_msg_show" ></span>
					</div>
					
				<div style="color:RED;font-size:20px;text-align:center" >
					<span id="error_msg_show" ></span>
					</div>
					
					
					
                  <div class="col-md-12 text-center m-2">
				  <?php if($page_name == 'Add'){ ?>
				  
                <button type="submit" id="emp_create_submit_btn" class="btn btn-success" id="btn-save-event">Add Employee</button>
				  <?php } else {  ?>
                    <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $employee_record->emp_id;?>" >

					<input type="submit" name="submit" value="Update Employee" class="btn btn-success w-md">
				  <?php } ?>

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

  
<script src="<?php echo base_url();?>assets/js/comboTreePlugin.js"  type="text/javascript"></script> 

<script type="text/javascript">

var SampleJSONData = [
<?php 
	if(!empty($zones_states_and_clusters_list)){
	foreach($zones_states_and_clusters_list as $keys=>$cluster_zone){
	?>
   {
		id: '99999',
        title: '<?php echo $cluster_zone->zone;?>',
			<?php 
			if(!empty($cluster_zone)){
				foreach($cluster_zone as $ss2=>$cluster_states){
			?>
        subs: [
			<?php 
						if(!empty($cluster_states)){
						foreach($cluster_states as $ss3=>$clusters){
				?>
             {
				// id: '<?php echo $clusters->state_id;?>',
				title: '<?php echo $clusters->state;?>',
                subs: [
					<?php 
							if(!empty($clusters->state_name[0])){
							foreach($clusters->state_name[0] as $ss4=>$cluster){
					?>
                    {
						id: '<?php echo $cluster->cluster_id;?>',
						title: '<?php echo $cluster->cluster_name;?>',
                    }, 
					<?php
							}
						}  
					?>
					
                ]
            },
			<?php
				}
			}  
		?>
        ],
		<?php
				}
			}  
		?>
		
    },
	<?php } } ?>
	

];




var SampleJSONData1 = [
	<?php 
	if(!empty($clusters_list)){
	foreach($clusters_list as $key1=>$cluster){
	?> 
   {
        id: '<?php echo $cluster->cluster_id;?>',
        title: '<?php echo $cluster->cluster_name?>',
    },
	<?php } } ?>
];

var SampleJSONData2 = [
	<?php 
	if(!empty($task_type_list)){
	foreach($task_type_list as $key=>$task_cat){
	?> 
   {
        id: <?php echo $task_cat->comp_cat_id;?>,
        title: '<?php echo $task_cat->comp_cat_name?>',
    },
	<?php } } ?>
];

var SampleJSONData3 = [
	<?php 
	if(!empty($skill_type_list)){
	foreach($skill_type_list as $key11=>$skill){
	?> 
   {
        id: <?php echo $skill->sub_cat_id;?>,
        title: '<?php echo $skill->sub_cat_name?>',
    },
	<?php } } ?>
];



	function Get_cluster_wsie_vendors_list(){
	var cluster_ids=$("#cluster_id_ids_hidden").val();
	$.ajax({  
		type: "POST",
		url: '<?php echo base_url();?>Frtemployees/get_cluster_wsie_vendors_list', 
		data: "cluster_ids="+cluster_ids,
		complete: function(dd){  
			var op = dd.responseText.trim();
			$("#vendor_name").html(op);
		}
	});
	}

	function Get_cluster_wsie_shifts_list(){
	var cluster_ids=$("#cluster_id_ids_hidden").val();
	$.ajax({  
		type: "POST",
		url: '<?php echo base_url();?>Frtemployees/get_cluster_wsie_shifts_list', 
		data: "cluster_ids="+cluster_ids,
		complete: function(dd){  
			var op = dd.responseText.trim();
			$("#shift_type_id").html(op);
		}
	});
	}


	function hide_error_msg_show(){
		$("#error_msg_show").show();
		 $('#error_msg_show').delay(5000).fadeOut();
	}


	function hide_success_msg_show(){
		$("#success_msg_show").show();
		 $('#success_msg_show').delay(5000).fadeOut();
	}


jQuery(document).ready(function($) {
		
		$('#employee_create_form').parsley();
		$("#employee_create_form").on("submit", function(e){
				e.preventDefault();		
				   
					$("#emp_create_submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
				$("#emp_create_submit_btn").attr("disabled",true);
				$.ajax({
					type: "post",
					url:"<?php echo base_url()?>Frtemployees/add_employee_submit_form_ajax",
					data:$("#employee_create_form").serialize(),
					success:function(result)
					{		
						var jsondata=jQuery.parseJSON(result);	

						if(jsondata['status']==1)
						{
							$("#employee_create_form")[0].reset();
							
							$("#success_msg_show").html(jsondata['msg']);
							hide_success_msg_show();
							
							// $.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
							setTimeout(function(){ window.location = "<?php echo base_url(); ?>Frtemployees"; },2000);
							 
						}
						else
						{
							//$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							$("#error_msg_show").html(jsondata['msg']);
							hide_error_msg_show();
							$("#emp_create_submit_btn").html('Add Employee <i class="flaticon-right-arrow-1"></i> ');
							$("#emp_create_submit_btn").attr("disabled",false);		
						}
					}
				});	
			});	
		comboTree3 = $('#justAnInputBox1').comboTree({
			source : SampleJSONData,
			isMultiple: true,
			cascadeSelect: true,
			collapse:true
		});
		comboTree3.onChange(function(){
		console.log(comboTree3.getSelectedIds());
		$('#cluster_id_ids_hidden').val(comboTree3.getSelectedIds());
				Get_cluster_wsie_vendors_list();
				Get_cluster_wsie_shifts_list();
		});
		
		comboTree4 = $('#justAnInputBox2').comboTree({
			source : SampleJSONData2,
			isMultiple: true,
			cascadeSelect: true,
			withSelectAll: true
		});
		comboTree4.onChange(function(){
		console.log(comboTree4.getSelectedIds());
		$('#comp_cat_id_ids_hidden').val(comboTree4.getSelectedIds());
		});
		
		
		comboTree5 = $('#justAnInputBox3').comboTree({
			source : SampleJSONData3,
			isMultiple: true,
			cascadeSelect: false,
			withSelectAll: true,
			collapse: false
		});
		
		
		comboTree5.onChange(function(){
		console.log(comboTree5.getSelectedIds());
		$('#skill_type_ids_hidden').val(comboTree5.getSelectedIds());
		});
		
			

		
});

</script>