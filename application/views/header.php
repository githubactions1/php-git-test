<!DOCTYPE html>
<html lang="en">
<head>
<?php
$s=$this->session->userdata['user']->emp_role;

		
		
if(isset($title) && $title!='')
{
    $htmlTitle = $title;
}
else
{
    $htmlTitle = "Dashboard";
} 

?>
<meta charset="utf-8" />
<title> Track On - <?php echo $htmlTitle;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">

<!-- Bootstrap Css -->
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css -->
<link href="<?php echo base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<!-- Custom Css -->
<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />


<link href="<?php echo base_url();?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.toast.css" />

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
	 <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

<style> 
button.dshExitFullScreenButton {
    display: none !important;
}
</style>
</head>
<?php 
if($this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == 'Monitor'){
$hide_left_mneu='sidebar-enable vertical-collpsed';
}
$this->load->model('tasks_model');

	
?>
<body data-sidebar="dark" class="<?php echo $hide_left_mneu;?>" >
<input type="hidden"id="man_id" value="<?php echo $this->session->userdata['user']->emp_id;?>">
<!-- Begin page -->
<div id="layout-wrapper">
  <header id="page-topbar">
    <div class="navbar-header">
      <div class="d-flex"> 
        <!-- LOGO -->
        <div class="navbar-brand-box"> <a href="<?php echo base_url();?>Welcome" class="logo logo-dark"> <span class="logo-sm"> <img src="<?php echo base_url();?>assets/images/logo-sm.png" alt="" height="22"> </span> <span class="logo-lg"> <img src="<?php echo base_url();?>assets/images/logo-dark.png" alt="" height="17"> </span> </a> <a href="<?php echo base_url();?>Welcome" class="logo logo-light"> <span class="logo-sm"> <img src="<?php echo base_url();?>assets/images/logo-sm.png" alt="" height="22"> </span> <span class="logo-lg"> <img src="<?php echo base_url();?>assets/images/logo-light.png" alt="" height="40"> </span> </a> </div>
        
		<button type="button"
						class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"> <i class="mdi mdi-menu"></i> </button>
						
      </div>
			<div class="d-flex mt-3 image_div_show"></div>

			<div class="col-md-6">            
			<div class="news" id="header_flash_news_div" >
			<marquee class="news-content" scrolldelay="120">
			<ul>
			<!--<li>Wish you all Happy 77th Independence Day! <span style="  background: -webkit-linear-gradient(#ff9933, #138808);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;"> As we hoist the flag high, let's remember the sacrifices that led us to this day.</span></li>-->
			</ul>
			</marquee>
			</div>           
			</div>

			<div class="d-flex mt-3 image_div_show"></div>
		  
		  
		  
      <div class="d-flex">
        <div class="dropdown d-none d-lg-inline-block">
		<?php
		if($this->session->userdata['user']->emp_role==4){
		?>
		<button class="btn btn-success btn-pull-left" id="punch_in" onclick='punchin("<?php echo $this->session->userdata['user']->emp_id;?>/<?php echo $this->session->userdata['user']->emp_username;?>")'>Punch in</button>
				<button class="btn btn-success btn-pull-left" id="punch_out" onclick='punchout("<?php echo $this->session->userdata['user']->emp_id;?>/<?php echo $this->session->userdata['user']->emp_username;?>")'>Punch Out</button>
<?php
		}
?>
          <button type="button" class="btn header-item waves-effect"> <img src="<?php echo base_url();?>assets/images/Sify.png" alt="Header Avatar"> </button>
        </div>
        <!--<div class="dropdown d-inline-block ms-1">
          <button type="button" class="btn header-item noti-icon waves-effect"
							id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false"> <i class="ti-bell"></i> <span class="badge bg-primary rounded-pill">3</span> </button>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
							aria-labelledby="page-header-notifications-dropdown">
            <div class="p-3">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="m-0"> Notifications (258) </h5>
                </div>
              </div>
            </div>
            <div data-simplebar style="max-height: 230px;"> <a href="<?php echo base_url();?>Welcome" class="text-reset notification-item">
              <div class="media">
                <div class="avatar-xs me-3"> <span class="avatar-title border-success rounded-circle "> <i class="mdi mdi-cart-outline"></i> </span> </div>
                <div class="media-body">
                  <h6 class="mt-0 mb-1">Your order is placed</h6>
                  <div class="text-muted">
                    <p class="mb-1">If several languages coalesce the grammar</p>
                  </div>
                </div>
              </div>
              </a> <a href="<?php echo base_url();?>Welcome" class="text-reset notification-item">
              <div class="media">
                <div class="avatar-xs me-3"> <span class="avatar-title border-warning rounded-circle "> <i class="mdi mdi-message"></i> </span> </div>
                <div class="media-body">
                  <h6 class="mt-0 mb-1">New Message received</h6>
                  <div class="text-muted">
                    <p class="mb-1">You have 87 unread messages</p>
                  </div>
                </div>
              </div>
              </a> <a href="<?php echo base_url();?>Welcome" class="text-reset notification-item">
              <div class="media">
                <div class="avatar-xs me-3"> <span class="avatar-title border-info rounded-circle "> <i class="mdi mdi-glass-cocktail"></i> </span> </div>
                <div class="media-body">
                  <h6 class="mt-0 mb-1">Your item is shipped</h6>
                  <div class="text-muted">
                    <p class="mb-1">It is a long established fact that a reader will</p>
                  </div>
                </div>
              </div>
              </a> <a href="<?php echo base_url();?>Welcome" class="text-reset notification-item">
              <div class="media">
                <div class="avatar-xs me-3"> <span class="avatar-title border-primary rounded-circle "> <i class="mdi mdi-cart-outline"></i> </span> </div>
                <div class="media-body">
                  <h6 class="mt-0 mb-1">Your order is placed</h6>
                  <div class="text-muted">
                    <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                  </div>
                </div>
              </div>
              </a> <a href="<?php echo base_url();?>Welcome" class="text-reset notification-item">
              <div class="media">
                <div class="avatar-xs me-3"> <span class="avatar-title border-warning rounded-circle "> <i class="mdi mdi-message"></i> </span> </div>
                <div class="media-body">
                  <h6 class="mt-0 mb-1">New Message received</h6>
                  <div class="text-muted">
                    <p class="mb-1">You have 87 unread messages</p>
                  </div>
                </div>
              </div>
              </a> </div>
            <div class="p-2 border-top"> <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)"> View all </a> </div>
          </div>
        </div>-->
       <div class="dropdown d-inline-block">
          <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
							data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="rounded-circle header-profile-user" src="<?php echo base_url();?>assets/images/users/user-4.jpg"
								alt="Header Avatar"> </button>
					
					<div style="margin-top:-13px;" ><?php echo $this->session->userdata['user']->emp_username?></div>			
          <div class="dropdown-menu dropdown-menu-end"> 
            <!-- item--> 
            <a class="dropdown-item" href="<?php echo base_url();?>Dashboard">
            <h5><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i>  <?php echo $this->session->userdata['user']->emp_username?></h5>
            <p>Logged In Since<br><?php echo date('Y-m-d H:i:s')?></p>
            </a> <a class="dropdown-item" href="<?php echo base_url();?>Dashboard/change_password"><i
									class="mdi mdi-lock-open-outline font-size-17 text-muted align-middle me-1"></i> Change Password</a>
			<!--<a class="dropdown-item" href="<?php echo base_url();?>assets/images/trackOn_user_manuals/Escalation_Matrix_1.ppsx"><i
			class="mdi mdi-graph font-size-17 text-muted align-middle me-1"></i>Escalation_Matrix</a>-->
			<a class="dropdown-item" href="<?php echo base_url();?>assets/images/trackOn_user_manuals/Trackon_Field_User_MoblieApp _UserMannual4_4.pdf"  target="_blank" ><i
			class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i>App User Guide</a>

<a class="dropdown-item" href="<?php echo base_url();?>assets/images/trackOn_user_manuals/TrackOn_Web_ApplicationManual.pdf" target="_blank" ><i
			class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i>Web User Guide</a>



            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="<?php echo base_url();?>Dashboard/logout"><i
									class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a> </div>
        </div>
      </div>
    </div>
  </header>
  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">
    <div data-simplebar class="h-100"> 
      
      <!--- Sidemenu -->
      <div id="sidebar-menu"> 
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
          <li> <a href="<?php echo base_url();?>Dashboard" class="waves-effect"> <i class="mdi mdi-view-dashboard-variant-outline"></i> <span>Dashboard</span> </a> </li>
          <li> <a href="<?php echo base_url();?>Monitor" class=" waves-effect"> <i class="mdi mdi-calendar-check"></i> <span>Monitor</span> </a> </li>
          <li> <a href="<?php echo base_url();?>Tasks" class="waves-effect"> <i class="mdi mdi-table-check"></i> <span>Tasks</span> </a> </li>
          <?php if($this->session->userdata['user']->emp_role == 1){ ?>
		 <li> <a href="<?php echo base_url();?>Geofence" class="waves-effect"> <i class="mdi mdi-google-maps"></i> <span>Geofence</span> </a> </li>
          <li> <a href="<?php echo base_url();?>Calender" class="waves-effect"> <i class="mdi mdi-calendar"></i> <span>Calendar</span> </a> </li>
          <?php } ?>
		  <li> <a href="<?php echo base_url();?>Hardware_master" class="waves-effect"> <i class="mdi mdi-menu"></i> <span>Hardware Master</span> </a> </li>
          <li> <a href="<?php echo base_url();?>Team" class="waves-effect"> <i class="mdi mdi-teach"></i> <span>Team</span> </a> </li>
		  
		     <li> <a href="javascript: void(0);" class="has-arrow waves-effect"> <i class="mdi mdi-account-multiple"></i> <span>FRT Team</span> </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="<?php echo base_url();?>Frtemployees">FRT Team Setup</a></li>
              <li><a href="<?php echo base_url();?>FrtReports">FRT Reports</a></li>
             
			 
            </ul>
          </li>
		  
          <li> <a href="<?php echo base_url();?>Distance_approvals" class="waves-effect"> <i class="mdi mdi-account-circle"></i> <span>Distance Approvals</span> </a> </li>
		   <li> <a href="<?php echo base_url();?>Leave_approvals" class="waves-effect"> <i class="mdi mdi-content-paste"></i> <span>Leave Approvals</span> </a> </li>
          <li> <a href="<?php echo base_url();?>Reports" class="waves-effect"> <i class="mdi mdi-graph"></i> <span>Reports</span> </a> </li>
		
          <li> <a href="javascript: void(0);" class="has-arrow waves-effect"> <i class="mdi mdi-format-list-bulleted-type"></i> <span>Admin</span> </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="<?php echo base_url();?>Employees">Team Setup</a></li>
              <li><a href="<?php echo base_url();?>Managers">Managers</a></li>
              <li><a href="<?php echo base_url();?>Settings/clusters">Clusters</a></li>
              <li><a href="<?php echo base_url();?>Settings/organization_setup">Organization Setup</a></li>
			 <?php if($this->session->userdata['user']->emp_role == 1){ ?>
              <li><a href="<?php echo base_url();?>Flash_news">Flash News</a></li>
              <li><a href="<?php echo base_url();?>Bulk_emp_import">Bulk Upload Emp</a></li>
              <li><a href="<?php echo base_url();?>Settings">Device</a></li>
              <li><a href="<?php echo base_url();?>Settings/vendors">Vendor</a></li>
              <li><a href="<?php echo base_url();?>Settings">Lookup Photos</a></li>
              <li><a href="<?php echo base_url();?>Settings/zones">Zones</a></li>
              <li><a href="<?php echo base_url();?>Settings/states">States</a></li>
              <li><a href="<?php echo base_url();?>Settings">Forms</a></li>
              <li><a href="<?php echo base_url();?>Settings">My Accout</a></li>
              <li><a href="<?php echo base_url();?>Settings">Master Data</a></li>
              <li><a href="<?php echo base_url();?>settings">Integration Logs</a></li>
              <li><a href="<?php echo base_url();?>Settings">Settings</a></li>
		  <?php } ?>
            </ul>
          </li>
		  
        </ul>
      </div>
      <!-- Sidebar --> 
    </div>
  </div>
  <!-- Left Sidebar End -->
  <script>
  function punchin(details){
	  //alert(details);
	  var mdetails=details.split("/");
	  var emp_id=mdetails[0];
	  var emp_username=mdetails[1];
	  $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Dashboard/managerpunchin",
                   data:{emp_id:emp_id,emp_username:emp_username},
                    success: function(data)
                    {					
var jsondata=jQuery.parseJSON(data);	

				if(jsondata['status']==1)
				{
					
					$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
setTimeout(function() {
    location.reload();
  }, 1000);				}
				else
				{
					$.toast({heading: 'Error',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							
				}                    
				}       

				});
	  
  }
  
  function punchout(empdetails){
	  var emp_details=empdetails.split("/");
	  var empid=emp_details[0];
	  var empusername=emp_details[1];
	  $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Dashboard/managerpunchout",
                   data:{empid:empid,empusername:empusername},
                    success: function(data)
                    {					
var jsondata1=jQuery.parseJSON(data);	

				if(jsondata1['status']==1)
				{
					
					$.toast({heading: 'Success',text: jsondata1['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
					  setTimeout(function() {
    location.reload();
  }, 1000);

				}
				else
				{
					$.toast({heading: 'Error',text: jsondata1['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'error'});
							
				}                    
				}       

				});
	  
  }
  $(document).ready(function() {
	  var man_id=$('#man_id').val();
	$.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Dashboard/mangerpunchinstatus",
                   data:{man_id:man_id},
                    success: function(result)
                    {	
					//alert(result);
			//var jsondata=JSON.parse(result); 	
 //alert(jsondata);
 if(result==1)
				{
				  $('#punch_in').hide();
				  $('#punch_out').show();
	
				}
				else{
					 $('#punch_in').show();
				  $('#punch_out').hide();

				}

					}
	});
	
	
			
		$.ajax({
		type: "post",
		url:"<?php echo site_url(); ?>Team/header_count_display",
		data:{"man_id":man_id},
		success:function(result)
			{
			var jsondata=JSON.parse(result); 
			$('.image_div_show').html(jsondata['header_flash_news_image_div_ajax']);
			$('#header_flash_news_div').html(jsondata['header_flash_news_ajax']);
			console.log(jsondata['tabsount']);
			}
		});
	  
  });
  
  </script>