<div class="main-content">
<div class="page-content">
<div class="row">
<div class="col-sm-6">
<div class="page-title-box">
<h4>Employees</h4>

</div>
</div>


<div class="col-sm-6">

<a href="<?php echo base_url()?>Frtemployees/employees_download_data" class="btn btn-success waves-effect waves-light pull-right"><i class="mdi mdi-download-circle-outline"></i> Export All Data</a>
</div>


</div>
<div class="col-xl-12">
<div class="card">
<div class="card-body"> 
<!-- Nav tabs -->
<?php if($this->session->userdata['user']->emp_role == 1){ ?>
<a href="<?php echo base_url()?>Frtemployees/add" class="btn btn-success waves-effect waves-light text-right"><i class="mdi mdi-plus-circle-outline"></i> Add Employee</a>
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
<th>Name</th>
<th>Vendor</th>
<th>Organization Unit</th>
<th>Base Address</th>
<th>Mobile No</th>
<th>Status</th>
<th>Device Id Reset</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
if(!empty($employees_list)){
foreach($employees_list as $key=>$employee){
?> 
<tr class="odd">
<td><div><?php echo $employee->emp_name; ?>	 <a href="#"><i class="mdi mdi-account-edit"></i></a></div>
<div><?php echo $employee->emp_username; ?>{<?php echo $employee->emp_code; ?>} </div>
<div><?php echo $employee->role_name; ?>(<?php echo $employee->member_type_name; ?>) </div>
<div><?php echo Dateconversion($employee->date_created); ?></div>
</td>		 
<td><?php echo $employee->vendor_name; ?></td> 
<td><?php echo $employee->cluster_name; ?></td> 
<td><?php echo $employee->address; ?></td> 
<td><?php echo $employee->emp_mobile; ?></td>

<td>
<?php if($this->session->userdata['user']->emp_role == 1){ ?>
<a class="<?php echo $employee->emp_status==1?'btn btn-success waves-effect waves-light':'btn btn-danger waves-effect waves-light'; ?> confirm_alert"   href="<?php echo base_url()?>Frtemployees/update_frtemployee_status/<?php echo $employee->emp_status; ?>/<?php echo $employee->emp_id; ?>"><?php echo $employee->emp_status==1?'Active':'Inactive'; ?> </a>
<?php } else { ?>
<div>
<?php if($employee->emp_status==1){echo "<i class='fas fa-check-circle text-success'> </i> Online";} else{ echo "<i class='fas fa-dot-circle text-danger'></i> Offline";}?>

<a class="<?php echo $employee->lock_user==1?'btn btn-success waves-effect waves-light':'btn btn-danger waves-effect waves-light'; ?> confirm_alert"   href="<?php echo base_url()?>Frtemployees/update_frtemployee_status/<?php echo $employee->lock_user; ?>/<?php echo $employee->emp_id; ?>"><?php echo $employee->lock_user==1?'Lock':'Un-Lock'; ?> </a>

</div>
<?php } ?>
</td>
<td>
	
<?php if($employee->device_id != "" || $employee->device_id != null){ ?>
<a href="<?php echo base_url()?>Frtemployees/frtreset_imei_update/<?php echo $employee->emp_id ?>" class="btn btn-primary waves-effect waves-light">Reset
</a>
<?php } else{  ?>
--		
<?php }   ?>		
</td>

<td>
<a href="<?php echo base_url()?>Frtemployees/frtreinvite/<?php echo $employee->emp_id; ?>"><button type="button" class="btn btn-success mb-1"
data-bs-toggle="modal" data-bs-target=".bs-example-modal-md">Re-Invite</button></a>
<?php if($this->session->userdata['user']->emp_role == 1){ ?>	

<a href="<?php echo base_url()?>Frtemployees/edit/<?php echo $employee->emp_id ?>" class="waves-effect waves-light"><i class="far fa-edit"></i>		
<?php }   ?>
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


