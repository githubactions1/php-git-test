<div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title-box">
            <h4>States</h4>
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
              <li class="breadcrumb-item active">States</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body"> 
            <!-- Nav tabs -->
           <button type="button" class="btn btn-success waves-effect waves-light text-right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-add" fdprocessedid="wxsweu"><i class="mdi mdi-plus-circle-outline"></i> Add State</button>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="home-1" role="tabpanel">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th>S.no</th>
                              <th>Zone Name</th>
                              <th>State Name</th>
                              <th>State Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
							<?php 
							if(!empty($states_list)){
							foreach($states_list as $key=>$state){
							?> 
                            <tr>
                               		
								<td><?php echo $key+1; ?></td>
								<td><?php echo $state->zone_name; ?></td>
								<td><?php echo $state->state_name; ?></td>
                              <td><a class="<?php echo $state->state_status==1?'btn btn-success waves-effect waves-light':'btn btn-danger waves-effect waves-light'; ?> confirm_alert"  href="<?php echo base_url()?>Settings/update_state_status/<?php echo $state->state_status ?>/<?php echo $state->state_id ?>" ><?php echo $state->state_status==1?'Active':'Inactive'; ?></a></td>
                           
                              <td>	
								<a href='javascript:void(0);' class="btn btn-primary waves-effect waves-light" 
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick='getState_single_details("<?php echo $state->state_id; ?>")'><i class="far fa-edit"></i>
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
  
  
<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel">Add State</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
        <form  name="empAddFrm" class="needs-validation" role="form" method="post" autocomplete="off" id="state_add_form" enctype="multipart/form-data"> 
    
			<div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Zone Name</label>
                  <select class="form-select" aria-label="Default select example" name="zone_id" id="zone_id1" >
                              <option selected>Select</option>
								<?php 
								if(!empty($zones_list)){
								foreach($zones_list as $key=>$zone){
								?> 
                              <option value="<?php echo $zone->zone_id;?>"><?php echo $zone->zone_name;?></option>
								<?php } } ?>
                            </select>
                </div>
              </div>
			  
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">State Name</label>
                  <input class="form-control" placeholder="Insert State Name" type="text" name="state_name" id="add_state_name" required value="" />
                  <div class="invalid-feedback">Please provide a valid event name</div>
                </div>
              </div>
            
            </div>
            <div class="row mt-2">
              <div class="col-6">
              </div>
              <div class="col-6 text-end">
                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
				<button type="submit" id="submit_btn" class="btn btn-success">Save <i class="flaticon-right-arrow-1"></i>

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


<div class="col-sm-6 col-md-3 mt-4"> 
  <!--  Modal content for the above example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit State</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
			<form id="state_edit_form" name="empAddFrm" class="needs-validation" role="form" method="post" autocomplete="off" enctype="multipart/form-data"> 


            <div class="row">
			    <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Zone Name</label>
                  <select class="form-select" aria-label="Default select example" name="zone_id" id="zone_id" >
                              <option selected>Select</option>
								<?php 
								if(!empty($zones_list)){
								foreach($zones_list as $key=>$zone){
								?> 
								<option value="<?php echo $zone->zone_id;?>"><?php echo $zone->zone_name;?></option>
								<?php } } ?>
                            </select>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">State Name</label>
                  <input class="form-control" placeholder="Insert State Name" type="text" name="state_name" id="state_name"  required value="" />
                 
				   <input class="form-control" placeholder="Insert State Name" type="hidden" name="state_id" id="state_id"  />

				 <div class="invalid-feedback">Please provide a valid event name</div>
                </div>
              </div>
            
            </div>
            <div class="row mt-2">
              <div class="col-6">
              </div>
              <div class="col-6 text-end">
                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
								<button type="submit" id="edit_submit_btn" class="btn btn-success">Save <i class="flaticon-right-arrow-1"></i>

				<!--<input type="submit" name="submit" value="Save" id="edit_submit_btn" class="btn btn-success">-->
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

<script>
$(document).ready(function(){
		
	$("#state_add_form").on("submit", function(e){
		e.preventDefault();		
		   
			$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
		$("#submit_btn").attr("disabled",true);
		$.ajax({
			type: "post",
			url:"<?php echo base_url()?>Settings/insert_state",
			data:$("#state_add_form").serialize(),
			success:function(result)
			{		
				var jsondata=jQuery.parseJSON(result);	

				if(jsondata['status']==1)
				{
					$("#state_add_form")[0].reset();
					$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
					setTimeout(function(){ window.location = "<?php echo base_url(); ?>Settings/states"; }, 1000);
				}
				else
				{
					$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
					$("#submit_btn").html('Submit <i class="flaticon-right-arrow-1"></i> ');
					$("#submit_btn").attr("disabled",false);		
				}
			}
		});	
	});	
	
	
	$("#state_edit_form").on("submit", function(e){
		e.preventDefault();		
		   
			$("#edit_submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
		$("#edit_submit_btn").attr("disabled",true);
		$.ajax({
			type: "post",
			url:"<?php echo base_url()?>Settings/update_state",
			data:$("#state_edit_form").serialize(),
			success:function(result)
			{		
				var jsondata=jQuery.parseJSON(result);	

				if(jsondata['status']==1)
				{
					$("#state_edit_form")[0].reset();
					$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
					setTimeout(function(){ window.location = "<?php echo base_url(); ?>Settings/states"; }, 1000);
				}
				else
				{
					$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
					$("#edit_submit_btn").html('Submit <i class="flaticon-right-arrow-1"></i> ');
					$("#edit_submit_btn").attr("disabled",false);		
				}
			}
		});	
	});	
	
	
	
	
	
	
	
});

		
		
function getState_single_details(state_id){	
			
			if(state_id != ''){
				$.ajax({
				url:"<?php echo base_url()?>Settings/get_single_state_id_data",
				method:"POST",
				data:{state_id:state_id},
				success:function(data)
				{
				data = JSON.parse(data);
				if(data.msg==true || data.msg=='true')
				{
					var response = data.response;
					$('#state_name').val(response.state_name);
					$('#state_id').val(response.state_id);
					$('#zone_id').val(response.zone_id);
				}
				
				}
				});
				
			}
		}
		
	
		
</script>