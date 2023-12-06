

<div class="main-content">
    <div class="page-content">
      <div class="container-fluid"> 
        
        <!-- start page title -->
        <div class="row">
          <div class="col-sm-8">
            <div class="page-title-box">
              <h4><?php echo $page_name;?> Flash News</h4>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="page-title-box">
              <ol class="breadcrumb add-rgt">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Flash News</a></li>
                <li class="breadcrumb-item active"><?php echo $page_name;?>  Flash News</li>
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
                    <label class="col-form-label">News Name</label>
                    <input class="form-control" type="text" id="news_name" placeholder=" News Name" name="news_name" value=""  required>
                  </div>
				  
                  <div class="col-md-4">
                    <label class="col-form-label">News From Date</label>
                    <input class="form-control" type="date" id="news_start_date" placeholder=" News From Date" name="news_start_date" value="" min="<?php echo date('Y-m-d');?>"  required>
                  </div>
				  
                  <div class="col-md-4">
                    <label class="col-form-label">News End Date</label>
                    <input class="form-control" type="date" id="news_end_date" placeholder=" News End Date" name="news_end_date" value="" min="<?php echo date('Y-m-d');?>" required>
                  </div>
				  
					<div class="col-4">
					<div class="mb-3">
					<label class="form-label">News Image</label>
					<input class="form-control" type="file" name="news_image" id="news_image"   >
					</div>
					</div>
           
					<div class="col-4">
					<div class="mb-3">
					<label class="form-label">News Content</label>
					<textarea class="form-control" rows="3" cols="5" placeholder="News Content" type="text" name="news_content" id="news_content" required value="" /></textarea>
					</div>
					</div>
					<div class="row">
					<div class="col-md-2">
					<div class="mb-3">
					<label class="form-label">Height</label>
					<input class="form-control" type="text" name="news_image_height" id="news_image_height"   value="70"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
					</div>
					</div>
					
					<div class="col-md-2">
					<div class="mb-3">
					<label class="form-label">Width</label>
					<input class="form-control" type="text" name="news_image_width" id="news_image_width"   value="70"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
					</div>
					</div>
					</div>
                 
                <div class="mb-2 row">
                  <div class="col-md-12 text-center m-2">
				  
					<input type="submit" name="submit" value="Save" class="btn btn-success w-md">
				

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
  
<script type="text/javascript">



</script>