<div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title-box">
            <h4>Clusters</h4>
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
              <li class="breadcrumb-item active">Clusters</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body"> 
            <!-- Nav tabs -->
			 <?php if($this->session->userdata['user']->emp_role == 1){ ?>
           <button type="button" class="btn btn-success waves-effect waves-light text-right" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-add" fdprocessedid="wxsweu"><i class="mdi mdi-plus-circle-outline"></i> Add Cluster</button>
			 <?php } ?>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="home-1" role="tabpanel">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                      
						<table id="datatable-buttons" class="table table-striped table-bordered  nowrap"
						style="border-collapse: collapse; border-spacing: 0; width: 100%;">	
							
                          <thead> 
                            <tr>
                              <th>S.no</th>
                              <th>Zone & State</th>
							  <th>Cluster</th>
                              <th>Pincodes</th>
                             <?php if($this->session->userdata['user']->emp_role == 1){ ?>  <th>Action</th><?php } ?>
                            </tr>
                          </thead>
                          <tbody>
							<?php 
							if(!empty($clusters_list)){
							foreach($clusters_list as $key=>$cluster){
							?> 
                            <tr>
                               		
								<td><?php echo $key+1; ?></td>
								<td><?php echo $cluster->zone_name; ?><br><?php echo $cluster->state_name; ?></td>
								<td><?php echo $cluster->cluster_name; ?></td>
								
								<td>
								<div style="
								min-width: 300px;
								max-width: 700px !important;
								overflow-y: scroll;
								min-height: 100px;
								max-height: 100px;
								" title="<?php echo nl2br($cluster->pincodes); ?>" >
								<?php //echo wordwrap($cluster->pincodes,36,"<br>\n"); ?>
								<?php echo nl2br($cluster->pincodes); ?>
								
								</div>
								</td>
                              <!--<td><a class="<?php echo $cluster->cluster_status==1?'btn btn-success waves-effect waves-light':'btn btn-danger waves-effect waves-light'; ?> confirm_alert"  href="<?php echo base_url()?>Settings/update_cluster_status/<?php echo $cluster->cluster_status ?>/<?php echo $cluster->cluster_id ?>" ><?php echo $cluster->cluster_status==1?'Active':'Inactive'; ?></a></td>-->
								 <?php if($this->session->userdata['user']->emp_role == 1){ ?>
                              <td>	
								<a href='javascript:void(0);' class="btn btn-primary waves-effect waves-light" 
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick='getcluster_single_details("<?php echo $cluster->cluster_id; ?>")'><i class="far fa-edit"></i>
								</a>		
										
										
							</td><?php } ?>
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
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Cluster</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
         
		<form  name="empAddFrm" class="needs-validation" role="form" method="post" autocomplete="off" id="cluster_add_form" enctype="multipart/form-data"> 

    
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
                  <select class="form-select" aria-label="Default select example" name="stste_id" id="state_id1" >
                              <option selected>Select</option>
								
                            </select>
                </div>
              </div>
			  
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">cluster Name</label>
                  <input class="form-control" placeholder="Insert cluster Name" type="text" name="cluster_name" id="add_cluster_name" required value="" />
                  <div class="invalid-feedback">Please provide a valid event name</div>
                </div>
              </div>
			  <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Minimum Task Per Employees</label>
                  <input class="form-control" placeholder="Minimum Task Per Employees" type="number" name="emp_no" id="emp_no" required value="" />
                  <div class="invalid-feedback">Please provide Minimum Task Per Employees</div>
                </div>
              </div>
			  <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Latitude</label>
                  <input class="form-control" placeholder="Latitude" type="text" name="latitude" id="latitude" required value="" />
                  <div class="invalid-feedback">Please provide Latitude</div>
                </div>
              </div>
			  <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">longitude</label>
                  <input class="form-control" placeholder="longitude" type="text" name="langitude" id="langitude" required value="" />
                  <div class="invalid-feedback">Please provide longitude</div>
                </div>
              </div>
			  <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Address</label>
				  <textarea class="form-control" placeholder="Insert cluster Name" type="text" name="address" id="address" required ></textarea>
                  <div class="invalid-feedback">Please provide a valid Address</div>
                </div>
              </div>
			  <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Pincode</label>
                  <textarea class="form-control" placeholder="Pincode" type="text" name="pincode" id="pincode" required value="" /></textarea>
                  <div class="invalid-feedback">Please provide a valid Pincode</div>
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
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" id="myLargeModalLabel">Edit Cluster</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
        </div>
        <div class="modal-body">
			        <form class="needs-validation" role="form" method="post" autocomplete="off" id="cluster_edit_form" enctype="multipart/form-data"> 


            <div class="row">
			<div class="col-12">
                <div class="mb-3">
                  <label class="form-label">cluster Name</label>
                  <input class="form-control" placeholder="Insert cluster Name" type="text" name="cluster_name" id="editcluster_name"  required value="" />
                 
				   <input class="form-control" placeholder="Insert cluster Name" type="hidden" name="cluster_id" id="cluster_id"  />

				 <div class="invalid-feedback">Please provide a valid event name</div>
                </div>
              </div>
			    <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Zone Name</label>
                  <select class="form-select" aria-label="Default select example" name="zone_id" id="edit_zone_id" >
                              <option selected>Select</option>
								
                            </select>
                </div>
              </div>
			  <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">State Name</label>
                  <select class="form-select" aria-label="Default select example" name="state_id" id="edit_state_id" >
                              <option selected>Select</option>
								
                            </select>
                </div>
              </div>
			  
			   <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Minimum Task Per Employees</label>
                  <input class="form-control" placeholder="Minimum Task Per Employees" type="number" name="emp_no" id="edit_emp_no" required value="" />
                  <div class="invalid-feedback">Please provide Minimum Task Per Employees</div>
                </div>
              </div>
              

<div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Latitude</label>
                  <input class="form-control" placeholder="Insert cluster Name" type="text" name="latitude" id="edit_latitude" required value="" />
                  <div class="invalid-feedback">Please provide Latitude</div>
                </div>
              </div>
			  <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">longitude</label>
                  <input class="form-control" placeholder="longitude" type="text" name="langitude" id="edit_langitude" required value="" />
                  <div class="invalid-feedback">Please provide longitude</div>
                </div>
              </div>
			  <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Address</label>
				  <textarea class="form-control" placeholder="Insert cluster Name" type="text" name="address" id="edit_address" required ></textarea>
                  <div class="invalid-feedback">Please provide a valid Address</div>
                </div>
              </div>
			  <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Pincode</label>
                  <textarea class="form-control"  rows="10"  placeholder="Pincode" type="text" name="pincode" id="edit_pincode" required value="" ></textarea>
                  <div class="invalid-feedback">Please provide a valid Pincode</div>
                </div>
              </div>
            
            </div>
            <div class="row mt-2">
              <div class="col-6">
              </div>
              <div class="col-6 text-end">
                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
				<button type="submit" id="edit_submit_btn" class="btn btn-success">Save <i class="flaticon-right-arrow-1"></i>
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
		
	$("#cluster_add_form").on("submit", function(e){
		e.preventDefault();		
		   
			$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
		$("#submit_btn").attr("disabled",true);
		$.ajax({
			type: "post",
			url:"<?php echo base_url()?>Settings/insert_cluster",
			data:$("#cluster_add_form").serialize(),
			success:function(result)
			{		
				var jsondata=jQuery.parseJSON(result);	

				if(jsondata['status']==1)
				{
					$("#cluster_add_form")[0].reset();
					$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
					setTimeout(function(){ window.location = "<?php echo base_url(); ?>Settings/clusters"; }, 1000);
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
	
	
	$("#cluster_edit_form").on("submit", function(e){
		e.preventDefault();		
		   
			$("#edit_submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
		$("#edit_submit_btn").attr("disabled",true);
		$.ajax({
			type: "post",
			url:"<?php echo base_url()?>Settings/update_cluster",
			data:$("#cluster_edit_form").serialize(),
			success:function(result)
			{		
				var jsondata=jQuery.parseJSON(result);	

				if(jsondata['status']==1)
				{
					$("#cluster_edit_form")[0].reset();
					$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
					setTimeout(function(){ window.location = "<?php echo base_url(); ?>Settings/clusters"; }, 1000);
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
	
$("#zone_id1").on("change",function(){
	var z_id = $('#zone_id1').val();
	//alert(z_id);
	
$.ajax({
type: "post",
url: "<?php echo base_url()?>Settings/getstatebyzoneid",
data: {z_id:z_id},
success: function(data){
	//alert(data);
$('#state_id1').html(data);
}
});	
	
});
	
	
	
	
	
});

		
		
function getcluster_single_details(cluster_id){	
			if(cluster_id != ''){
				$.ajax({
				url:"<?php echo base_url()?>Settings/get_single_cluster_id_data",
				method:"POST",
				data:{cluster_id:cluster_id},
				success:function(data)
				{
				$details=data.split("~");
				
				//alert(data);
				$('#editcluster_name').val($details[0]);
				$('#edit_latitude').val($details[1]);
				$('#edit_langitude').val($details[2]);
				$('#edit_address').val($details[3]);
				$('#edit_pincode').val($details[4]);
				$('#edit_emp_no').val($details[5]);
				$('#cluster_id').val($details[6]);
				
				$('#edit_zone_id').html($details[7]);
				$('#edit_state_id').html($details[8]);
				}
				});
				
			$("#edit_zone_id").on("change",function(){
	var z_id = $('#edit_zone_id').val();
	//alert(z_id);
	
$.ajax({
type: "post",
url: "<?php echo base_url()?>Settings/getstatebyzoneid",
data: {z_id:z_id},
success: function(data){
	//alert(data);
$('#edit_state_id').html(data);
}
});	
	
});	
				
				
				
				
			}
		}
		
	
		
</script>