<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/combo.css">

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
                <li class="breadcrumb-item active"><?php echo $page_name;?> Flash News</li>
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
                    <input class="form-control" type="text" id="news_name" placeholder=" News Name" name="news_name" value="<?php echo $news_record->news_name;?>"  required>
                  </div>
				  
                  <div class="col-md-4">
                    <label class="col-form-label">News From Date</label>
                    <input class="form-control" type="date" id="news_start_date" placeholder=" News From Date" name="news_start_date" value="<?php echo date('Y-m-d',strtotime($news_record->news_start_date));?>" required>
                  </div>
				  
                  <div class="col-md-4">
                    <label class="col-form-label">News End Date</label>
                    <input class="form-control" type="date" id="news_end_date" placeholder=" News End Date" name="news_end_date" value="<?php echo date('Y-m-d',strtotime($news_record->news_end_date));?>" min="<?php echo date('Y-m-d');?>" required>
                  </div>
				  
					<div class="col-4">
					<div class="mb-3">
					<label class="form-label">News Image</label>
					<div class="mb-3"><?php if(!empty($news_record->news_image)){ ?>
								<a href="<?php echo $news_record->news_image;?>" target="_blank" class="btn btn-primary w-md" >View Image</a>
								<?php }else { echo '---'; } ?></div>
					<input class="form-control" type="file" name="news_image" id="news_image"   >
					</div>
					</div>
					
					
					
					
					<div class="col-4">
					<div class="mb-3">
					<label class="form-label">News Content</label>
					<textarea class="form-control" rows="3" cols="5" placeholder="News Content" type="text" name="news_content" id="news_content" required /><?php echo $news_record->news_content;?></textarea>
					</div>
					</div>
					
              
				  
					
					<div class="row">
					<div class="col-md-2">
					<div class="mb-3">
					<label class="form-label">Height</label>
					<?php $height_width=explode(',',$news_record->news_image_size);?>
					<input class="form-control" type="text" name="news_image_height" id="news_image_height"   value="<?php echo $height_width[0];?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
					</div>
					</div>
					
					<div class="col-md-2">
					<div class="mb-3">
					<label class="form-label">Width</label>
					<input class="form-control" type="text" name="news_image_width" id="news_image_width"   value="<?php echo $height_width[1];?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
					</div>
					</div>
					</div>
				  
                
                <div class="mb-2 row">
                  <div class="col-md-12 text-center m-2">
                    <input type="hidden" name="news_id" id="news_id" value="<?php echo $news_record->news_id;?>" >

					<input type="submit" name="submit" value="Update News" class="btn btn-success w-md">

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
  