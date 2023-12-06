<div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title-box">
            <h4>Flash News</h4>
           
          </div>
        </div>
      </div>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body"> 
            <!-- Nav tabs -->
			 <?php if($this->session->userdata['user']->emp_role == 1){ ?>
           <a href="<?php echo base_url()?>Flash_news/add" class="btn btn-success waves-effect waves-light text-right"><i class="mdi mdi-plus-circle-outline"></i> Add Flash News</a>
			 <?php } ?>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="home-1" role="tabpanel">
                <div class="row">
                  <div class="col-12">
                    <div class="panel">
                      <div class="panel-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th>Title</th>
                              <th>Flash News</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
							<?php 
							if(!empty($flash_news_list)){
							foreach($flash_news_list as $key=>$flash_news){
							?> 
                            <tr>
								<td><?php echo $flash_news->news_name; ?></td>
								<td>
								<div >
								<?php echo $flash_news->news_content; ?>
								
								</div>
								
								</td>
								<td><?php echo Dateconversion($flash_news->news_start_date); ?></td>
								<td><?php echo Dateconversion($flash_news->news_end_date); ?></td>
								<td>
								<?php if(!empty($flash_news->news_image)){ ?>
								<a href="<?php echo $flash_news->news_image;?>" target="_blank" ><img src="<?php echo $flash_news->news_image;?>" alt="Image1" height="100px" width="100px" ></a>
								<?php }else { echo '---'; } ?>
								</td>

                             <td>
							  <?php if($this->session->userdata['user']->emp_role == 1){ ?>
							 <a class="<?php echo $flash_news->news_status==1?'btn btn-success waves-effect waves-light':'btn btn-danger waves-effect waves-light'; ?> confirm_alert"   href="<?php echo base_url()?>Flash_news/update_flash_news_status/<?php echo $flash_news->news_status; ?>/<?php echo $flash_news->news_id; ?>"><?php echo $flash_news->news_status==1?'Active':'Inactive'; ?> </a>
							  <?php } else { ?>
							 <div><?php if($flash_news->news_status==1){echo "<i class='fas fa-check-circle text-success'> </i> Active";} else{ echo "<i class='fas fa-dot-circle text-danger'></i> Inactive";}?></div>
							  <?php } ?>
							  
							  
							 </td>
                              <td>	
								<a href="<?php echo base_url()?>Flash_news/edit/<?php echo $flash_news->news_id ?>" class="btn btn-primary waves-effect waves-light"><i class="far fa-edit"></i>
							</a>		
								</td>
                            </tr>
							<?php } } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- end col --> 
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- container-fluid --> 
  </div>
  
  
