<div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title-box">
            <h4>Managers</h4>
           
          </div>
        </div>
      </div>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body"> 
            <!-- Nav tabs -->
			 <?php if($this->session->userdata['user']->emp_role == 1){ ?>
           <a href="<?php echo base_url()?>Managers/add" class="btn btn-success waves-effect waves-light text-right"><i class="mdi mdi-plus-circle-outline"></i> Add Manager</a>
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
                              <th>User Name</th>
                              <th>Manager Name</th>
                              <th>Mobile No / Email Id</th>
                              <th>Clusters</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
							<?php 
							if(!empty($managers_list)){
							foreach($managers_list as $key=>$employee){
							?> 
                            <tr>
								<td><?php echo $employee->emp_username; ?></td>
								<td><?php echo $employee->emp_name; ?>(<?php echo $employee->emp_code; ?>)</td>
								<td><?php echo $employee->emp_mobile; ?><br><?php echo $employee->emp_email; ?><br><?php echo $employee->role_name; ?></td>
								
								<td>
								<div style="
								min-width: 200px;
								max-width: 200px !important;
								overflow-y: scroll;
								min-height: 100px;
								max-height: 100px;
								" title="<?php echo nl2br($employee->cluster_name); ?>" >
								<?php //echo wordwrap($cluster->pincodes,36,"<br>\n"); ?>
								<?php echo nl2br($employee->cluster_name); ?>
								
								</div>
								
								</td>

                             <td>
							  
							 <a class="<?php echo $employee->emp_status==1?'btn btn-success waves-effect waves-light':'btn btn-danger waves-effect waves-light'; ?> confirm_alert"   href="<?php echo base_url()?>Managers/update_employee_status/<?php echo $employee->emp_status; ?>/<?php echo $employee->emp_id; ?>"><?php echo $employee->emp_status==1?'Active':'Inactive'; ?> </a>
							 
							 
							  
							  
							 </td>
                              <td>	

							<a href="<?php echo base_url()?>Managers/reinvite/<?php echo $employee->emp_id; ?>"><button type="button" class="btn btn-success mb-1"
							data-bs-toggle="modal" data-bs-target=".bs-example-modal-md">Re-Invite</button></a>
							 <?php if($this->session->userdata['user']->emp_role == 1){ ?>
							<br>
								
								<a href="<?php echo base_url()?>Managers/edit/<?php echo $employee->emp_id ?>" class="btn btn-primary waves-effect waves-light"><i class="far fa-edit"></i>
							</a><?php } ?>		
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
  
  
