<div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Hardware Master</h4>
              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Part Code</th>
                    <th>Category</th>
                    <th>Description</th>
                   <!-- <th>Action</th>-->
                  </tr>
                </thead>
                <tbody>
					<?php 
					if(!empty($hardware_master_list)){
					foreach($hardware_master_list as $key1=>$row){
					?>

                  <tr>
                    <td><?php echo $key1+1;?></td>
                    <td><?php echo $row->part_code;?></td>
                    <td><?php echo $row->sub_cat_name;?></td>
                    <td><?php echo $row->hw_desc;?></td>
					
					
                    <!--<td><button type="button" class="btn btn-primary waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="far fa-dot-circle"></i></button></td>-->
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
    <!-- container-fluid --> 
  </div> 
  
  
<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel">Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" name="event-form" id="form-event" novalidate>
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Event Name</label>
                  <input class="form-control" placeholder="Insert Event Name"
                                                            type="text" name="title" id="event-title" required value="" />
                  <div class="invalid-feedback">Please provide a valid event name</div>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Category</label>
                  <select class="form-control custom-select" name="category"
                                                            id="event-category">
                    <option selected> --Select-- </option>
                    <option value="bg-danger">Danger</option>
                    <option value="bg-success">Success</option>
                    <option value="bg-primary">Primary</option>
                    <option value="bg-info">Info</option>
                    <option value="bg-dark">Dark</option>
                    <option value="bg-warning">Warning</option>
                  </select>
                  <div class="invalid-feedback">Please select a valid event category</div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-6">
                <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
              </div>
              <div class="col-6 text-end">
                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
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