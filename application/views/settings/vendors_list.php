
  
  <div class="main-content">
    <div class="page-content">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title-box">
            <h4>Vendor</h4>
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
              <li class="breadcrumb-item active">Vendor</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

              <div class="mb-3 row">
               <div class="col-md-3">
                  			           <button type="button" class="btn btn-success waves-effect waves-light text-right" data-bs-toggle="modal" data-bs-target="#add_vendor" fdprocessedid="wxsweu"><i class="mdi mdi-plus-circle-outline"></i> Add Vendor</button>

                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3 total">
						<?php
						foreach($vendorsdata as $vendorscont){
							
						}
						?>

                  <h5 class="count">Total : <?php echo $vendorscount;?></h5>
                </div>
              </div>
              <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
				
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Cluster</th>
                    <th>Start Date</th>
                    <th>End Date</th>
					<!--<th>Action</th>-->
                  </tr>
				  
                </thead>
                <tbody>
				<?php
				$i=1;
				foreach($vendorsdata as $vendorsdetails){
					
				?>
                  <tr>
                   <!-- <td><div class="form-check">
                        <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked="">
                        <label class="form-check-label" for="formRadios1"></label>
                      </div></td>-->
					  <td><input class="form-check-input" type="radio"  name="valueCheckbox" id="formRadios1" checked="" value="<?php echo $vendorsdetails->vendor_id;?>">
</td>
                    <td><?php echo $vendorsdetails->vendor_name;?></td>
                    <td><?php echo $vendorsdetails->vendor_code;?></td>
                    <td> <div class="ellipsis-line"><?php echo $vendorsdetails->cluster_name;?></div></td>
                    <td><?php echo $vendorsdetails->formated_start_date;?></td>
                    <td><?php echo $vendorsdetails->formated_end_date;?></td>
					
                  </tr>
				  <?php
				}
				  ?>
                
                 
                </tbody>
              </table>
			  <div class="col-md-12">
<button type="submit" class="btn btn-success total">Import from Excel</button>
<!--<button type="submit" class="btn btn-success total">Add</button>-->
<button type="submit" class="btn btn-success total" onclick='myfunctionedit()'>Modify</button>
<button type="submit" class="btn btn-success total" onclick='myfunctiondelete()'>Delete</button>
</div>
              <div class="col-md-12">
			          
                <!--<button type="submit" class="btn btn-success total">Add</button>
				<button type="button" class="btn btn-success total" data-bs-toggle="modal" data-bs-target="#add_vendor">
				Add</button>-->
                
              </div>
            </div>
          </div>
        </div>
        <!-- end col --> 
      </div>
    </div>
    <!-- container-fluid --> 
  </div>

<!-- Add Vendor Modal -->
<div class="modal fade bs-example-modal-notes_add" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add_vendor">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title mt-0">Add Vendor </h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
</div>
<div class="modal-body">
<form class="needs-validation" action="<?php echo base_url();?>Settings/add_vendors" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
<div class="row">
<div class="col-md-12">
<div class="form-check mb-3">
<label class="form-check-label" for="formRadios1">Vendor Name</label>
<input class="form-control" type="text" name="v_name" id="attachment"  value="" >
</div>
</div>
<div class="col-md-12">
<div class="form-check mb-3">
<label class="form-check-label" for="formRadios1">Vendor Code</label>
<input class="form-control" type="text" name="v_code" id="attachment"  value="" >
</div>
</div>
<div class="col-md-12">
<div class="form-check mb-3">
<label class="form-check-label" for="formRadios1">Clusters</label>
<select class="form-control select2" name="cluster_id[]" multiple style="width:100%">
<option value="">Select Clusters</option>
<?php
foreach($clustersdata as $clustersdetails){
?>
<option value="<?php echo $clustersdetails->cluster_id;?>"><?php echo $clustersdetails->cluster_name;?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-12">
<div class="form-check mb-3">
<label class="form-check-label" for="formRadios1">Start Date</label>
<input class="form-control" type="date" name="start_date" id="attachment"  value="" >
</div>
</div>
<div class="col-md-12">
<div class="form-check mb-3">
<label class="form-check-label" for="formRadios1">End Date</label>
<input class="form-control" type="date" name="end_date" id="attachment"  value="">
</div>
</div>
</div>
</div>
</div>
<div class="row mt-2">
<div class="col-6"> 

</div>
<div class="col-6 text-end"> 
<button type="submit" id="notes_add_btn"  class="btn btn-success">Submit</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- end add vendor modal -->


<!-- Edit Vendor Modal -->
<div class="modal fade bs-example-modal-notes_add" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit_vendor">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title mt-0">Edit Vendor </h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
</div>
<div class="modal-body">
<form class="needs-validation" action="<?php echo base_url();?>Settings/edit_vendors" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12">
<div class="row">
<div class="col-md-12">
<div class="form-check mb-3">
<input type="hidden" name="edit_vendor_id" id="edit_vendor_id">
<label class="form-check-label" for="formRadios1">Vendor Name</label>
<input class="form-control" type="text" name="edit_vendor_name" id="edit_vendor_name"  value="" >
</div>
</div>
<div class="col-md-12">
<div class="form-check mb-3">
<label class="form-check-label" for="formRadios1">Vendor Code</label>
<input class="form-control" type="text" name="edit_vendor_code" id="edit_vendor_code"  value="" >
</div>
</div>
<div class="col-md-12">
<div class="form-check mb-3">
<label class="form-check-label" for="formRadios1">Clusters</label>
<select class="form-control select2" name="edit_ven_clust_id[]" multiple style="width:100%" id="edit_ven_clust_id">
<option value="">Select Clusters</option>

</select>
</div>
</div>
<div class="col-md-12">
<div class="form-check mb-3">
<label class="form-check-label" for="formRadios1">Start Date</label>
<input class="form-control" type="date" name="edit_vendor_sdate" id="edit_vendor_sdate"  value="" >
</div>
</div>
<div class="col-md-12">
<div class="form-check mb-3">
<label class="form-check-label" for="formRadios1">End Date</label>
<input class="form-control" type="date" name="edit_vendor_ddate" id="edit_vendor_ddate"  value="">
</div>
</div>
</div>
</div>
</div>
<div class="row mt-2">
<div class="col-6"> 

</div>
<div class="col-6 text-end"> 
<button type="submit" id="notes_add_btn"  class="btn btn-success">Submit</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- end add vendor modal -->
	
	<script>

	$(".modify_vendor").on("click",function(){
	var v_id = $(this).attr('id');
	
	
$.ajax({
type: "post",
url: "<?php echo base_url()?>Settings/get_vendorid",
data: {v_id:v_id},
success: function(data){
	//alert(data);
$details=data.split("~");

//alert(data);
$('#edit_vendor_id').val($details[0]);
$('#edit_vendor_name').val($details[1]);
$('#edit_vendor_code').val($details[2]);
$('#edit_vendor_sdate').val($details[3]);
$('#edit_vendor_ddate').val($details[4]);
$('#edit_ven_clust_id').html($details[5]);
$('#edit_vendor').modal('show');
}
});	
	
});



function myfunctionedit(){
var checkboxes = document.getElementsByName("valueCheckbox");
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                var v_id = checkboxes[i].value;
							$.ajax({
							type: "post",
							url: "<?php echo base_url()?>Settings/get_vendorid",
							data: {v_id:v_id},
							success: function(data){
							//alert(data);
							$details=data.split("~");

							//alert(data);
							$('#edit_vendor_id').val($details[0]);
							$('#edit_vendor_name').val($details[1]);
							$('#edit_vendor_code').val($details[2]);
							$('#edit_vendor_sdate').val($details[3]);
							$('#edit_vendor_ddate').val($details[4]);
							$('#edit_ven_clust_id').html($details[5]);
							$('#edit_vendor').modal('show');
							}
							});
				
            }
        }
}		


function myfunctiondelete(){
var checkboxes = document.getElementsByName("valueCheckbox");
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedValueId = checkboxes[i].value;
				
				var selectval=selectedValueId.split('~');
				var selectval_id=selectval[0];
				var selectval_sts=selectval[1];
				
               // alert(selectedValueId);
				 //alert(selectval_id);
				
				 var url = '<?php echo base_url()?>Settings/vendor_delete/' + selectedValueId;

  // Redirect to the second page with the data in the URL
  window.location.href = url;
				
				
            }
        }	
	
	
	
	
	
}

</script>
