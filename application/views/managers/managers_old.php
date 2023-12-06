<!-- App Css-->
<link href="<?php echo base_url();?>assets/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
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
<a href="<?php echo base_url()?>Managers/add" class="btn btn-success waves-effect waves-light text-right"><i class="mdi mdi-plus-circle-outline"></i> Add Manager</a>
<!-- Tab panes -->
<!--<div class="tab-content">
<div class="tab-pane active" id="home-1" role="tabpanel">-->
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="mb-3 row">
<div class="col-md-3"> 
 
</div>
<div class="col-md-6"></div>
<div class="col-md-3 total">
<h5 class="count">Total : <?php echo $tatmanagercount;?></h5>
</div>
</div>
<table id="datatable-buttons" class="table table-striped table-bordered  nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
<thead>
<th></th>
<th>User Name</th>
<th>Manager Name</th>
<th>Mobile No</th>
<th>Email Id</th>
<th>Role</th>
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
<td>
<div class="form-check">
<input class="form-check-input" type="radio" name="valueCheckbox" id="formRadios1" checked="" value="<?php echo $employee->emp_id.'~'.$employee->emp_status;?>">
<label class="form-check-label" for="formRadios1"></label></div></td>
<td><div><?php echo $employee->emp_username; ?><a href="#"><i class="mdi mdi-account-edit"></i></a></div>
<div>(<?php echo $employee->emp_code; ?>)</div>
</td>
<td><?php echo $employee->emp_name; ?></td>
<td><?php echo $employee->emp_mobile; ?></td>
<td><?php echo $employee->emp_email; ?></td>
<td><?php echo $employee->role_name; ?></td>
<td><div class="ellipsis-line"><?php echo $employee->cluster_name; ?></div></td>

<td>
<a class="<?php echo $employee->emp_status==1?'btn btn-success waves-effect waves-light':'btn btn-danger mb-1 waves-effect waves-light'; ?> confirm_alert"   href="<?php echo base_url()?>Managers/update_manager_status/<?php echo $employee->emp_status; ?>/<?php echo $employee->emp_id; ?>"><?php echo $employee->emp_status==1?'Active':'De Active'; ?></a>
<br>




<!--<a class="<?php echo $employee->emp_status==1?'btn btn-success waves-effect waves-light':'btn btn-danger waves-effect waves-light'; ?>" ><?php echo $employee->emp_status==1?'Active':'De Active'; ?></a>-->
</td>
<td>


<a href="<?php echo base_url()?>Managers/reinvite/<?php echo $employee->emp_id; ?>"><button type="button" class="btn btn-success mb-1"
data-bs-toggle="modal" data-bs-target=".bs-example-modal-md">Re-Invite</button></a>
	
<a href="<?php echo base_url()?>Managers/edit/<?php echo $employee->emp_id ?>" class="btn btn-primary waves-effect waves-light"><i class="far fa-edit"></i>
</a>		
</td>
</tr>
<?php } } ?>
</tbody>
</table>
<div class="col-md-12">
<button type="submit" class="btn btn-success total">Import from Excel</button>
<!--<button type="submit" class="btn btn-success total"
data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Add Manager</button>
<button type="submit" class="btn btn-success total"
data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg1">Add Team Member</button>-->
<button type="submit" class="btn btn-success total" onclick="myfunctionedit()">Modify</button>
<button type="submit" class="btn btn-success total" onclick="myfunctiondelete()">Delete</button>
<button type="submit" class="btn btn-success total">Export to Excel</button>
</div>

</div>
</div>
</div>
<!-- end col --> 
</div>
</div>

<!--</div>
</div>-->
</div>
</div>
</div>
<!-- container-fluid --> 
</div>

 <script>
 function myfunctionedit(){
	var checkboxes = document.getElementsByName("valueCheckbox");
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedValueId = checkboxes[i].value;
				
				var selectval=selectedValueId.split('~');
				var selectval_id=selectval[0];
				
               // alert(selectedValueId);
				 //alert(selectval_id);
				
				 var url = '<?php echo base_url()?>Managers/edit/' + selectval_id;

  // Redirect to the second page with the data in the URL
  window.location.href = url;
				
				
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
				
				 var url = '<?php echo base_url()?>Managers/update_manager_status/' + selectval_sts + '/' + selectval_id;

  // Redirect to the second page with the data in the URL
  window.location.href = url;
				
				
            }
        }	
	
	
	
	
	
}

 
  
  
  
  </script>

