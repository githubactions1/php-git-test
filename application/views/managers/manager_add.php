<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/combo.css">


<div class="main-content">
    <div class="page-content">
      <div class="container-fluid"> 
        
        <!-- start page title -->
        <div class="row">
          <div class="col-sm-8">
            <div class="page-title-box">
              <h4><?php echo $page_name;?> Managers</h4>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="page-title-box">
              <ol class="breadcrumb add-rgt">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Managers</a></li>
                <li class="breadcrumb-item active"><?php echo $page_name;?>  Managers</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
			  <form id="empAddFrm" name="empAddFrm" class="needs-validation" role="form" method="post" autocomplete="off" action="" enctype="multipart/form-data"> 

                <div class="mb-2 row">
                  <div class="col-md-4">
                    <label class="col-form-label">Manager Name</label>
                    <input class="form-control" type="text" id="emp_name" placeholder=" Full Name" name="emp_name" value="<?php echo $employee_record->emp_name?>"  required>
                  </div>
				   <div class="col-md-4">
                    <label class="col-form-label">Manager ID</label>
                    <input class="form-control" type="text" value="<?php echo $employee_record->emp_code?>" id="emp_code" placeholder="Manager Code" name="emp_code" required>
                  </div>
				  
                  <div class="col-md-4">
                    <label class="col-form-label">Mobile Number</label>
                    <input class="form-control" type="text" value="<?php echo $employee_record->emp_mobile?>"  id="emp_mobile" name="emp_mobile" required placeholder="Mobile Number">
                  </div>
                 
				  <div class="col-md-4">
                    <label class="col-form-label"> Email</label>
                    <input class="form-control" type="email" value="<?php echo $employee_record->emp_email?>" id="emp_email" placeholder="Enter Email Id" name="emp_email" required>
                  </div>
                  <div class="col-md-4">
                    <label class="col-form-label">User Name</label>
                    <input class="form-control" type="text" value="<?php echo $employee_record->emp_username?>" id="emp_username" placeholder="User Name" name="emp_username" required>
                  </div>
				   <div class="col-md-4 mt-2">
                    <label class="form-label">Select Organization Unit</label>
                    <input type="text" name="cluster_ids" class="form-control" id="justAnInputBox1" placeholder="Select" autocomplete="off"/> 
                    <input type="hidden" name="cluster_id" class="form-control" id="cluster_id_ids_hidden"  >

				  </div>
           
                  <div class="col-md-4 mt-2">
                    <label class="form-label">Team Type</label>
                    <select class="form-control select2" id="team_type" name="team_type"  required>
                      <option value="" >Select</option>
						<?php 
						if(!empty($team_types_list)){
						foreach($team_types_list as $key=>$teamtype){

						?> 
						<option value="<?php echo $teamtype->sub_cat_id;?>" <?php if($employee_record->team_type == $teamtype->sub_cat_id){ echo 'selected'; }?> ><?php echo $teamtype->sub_cat_name;?></option>
						<?php } } ?>
                    </select>
					
                    <input type="hidden" name="emp_designation" class="form-control" id="emp_designation" value="4**234"  >
                  </div>
				  
                  <div class="col-md-4 mt-2">
                    <label class="form-label">Vendor </label>
                    <select class="form-control select2" id="vendor_name" name="vendor_name"   data-parsley-required="true"  data-parsley-required-message="Select vendor">
                      <option value="" >Select </option>
                    </select>
                  </div>
				  	
				    <div class="col-md-4 mt-2">
                    <label class="form-label">  &nbsp; &nbsp; </label>
                   <input type="checkbox" class="mt-2" name="limit_access" value="limit_access" > Allow Limited Access
                  </div>
				  
				  	
				  
                
                <div class="mb-2 row">
                  <div class="col-md-12 text-center m-2">
				  <?php if($page_name == 'Add'){ ?>
				  
					<input type="submit" name="submit" value="Save" class="btn btn-success w-md">
				  <?php } else {  ?>
                    <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $employee_record->emp_id;?>" >

					<input type="submit" name="submit" value="Update" class="btn btn-success w-md">
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
  <?php
 	 echo '<pre>';//print_r($zones_states_and_clusters_list);
		// if(!empty($zones_states_and_clusters_list)){
		// foreach($zones_states_and_clusters_list as $ss1=>$cluster_zone){
					
			// if(!empty($cluster_zone)){
				// foreach($cluster_zone as $ss2=>$cluster_states){
					
					// if(!empty($cluster_states)){
					// foreach($cluster_states as $ss3=>$clusters){
						// print_r($clusters->state_name[0]);
				      // }
				   // }
				// }
			// } 
	  // }
	// }
  ?>
  
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
		url: '<?php echo base_url();?>Managers/get_cluster_wsie_vendors_list', 
		data: "cluster_ids="+cluster_ids,
		complete: function(dd){  
			var op = dd.responseText.trim();
			$("#vendor_name").html(op);
		}
	});
	}


jQuery(document).ready(function($) {
	
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