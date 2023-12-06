<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/combo.css">


<div class="main-content">
    <div class="page-content">
      <div class="container-fluid"> 
        
        <!-- start page title -->
        <div class="row">
          <div class="col-sm-8">
            <div class="page-title-box">
              <h4><?php echo $page_name;?> Change Password</h4>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="page-title-box">
              <ol class="breadcrumb add-rgt">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);"> Change Password</a></li>
                <li class="breadcrumb-item active"><?php echo $page_name;?>   Change Password</li>
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
                    <label class="col-form-label">Current password * </label>
                    <input class="form-control" type="password" id="cus_pwd" placeholder=" Current password" name="cus_pwd" value=""   required>
                  </div>
				   <div class="col-md-4">
                    <label class="col-form-label">New password</label>
                    <input class="form-control" type="password" value="" id="new_pwd" placeholder="New password" name="new_pwd"  minlength="8" required>
					<span class="">(Password should be at least 8 characters long.) </span>
                  </div>
				  
                  <div class="col-md-4">
                    <label class="col-form-label"> Confirm new password *</label>
                    <input class="form-control" type="password" value=""  id="conf_pwd" name="conf_pwd" required placeholder="Confirm new password" minlength="8" >
                  </div>
				  
				  	
				  
				<div style="color:RED;font-size:20px;text-align:center" >
						<?php echo $this->session->flashdata('success');?>
						<?php echo $this->session->flashdata('error');?>
						</div>
                
                <div class="mb-2 row mt-3">
                  <div class="col-md-12 text-center m-2">
				  <a href="<?php echo base_url();?>Dashboard"  class="btn btn-danger"> Close</span></a>
					&nbsp <input type="submit" name="submit" value="Save" class="btn btn-success w-md">
				
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