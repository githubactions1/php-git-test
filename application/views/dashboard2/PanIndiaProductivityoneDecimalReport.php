<html lang="en"><head>
<meta charset="utf-8">
<title>:: Track On - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- App favicon -->
<link rel="shortcut icon" href="http://sifydev.digitalrupay.com:8008/dev/assets/images/favicon.png">

<!-- Bootstrap Css -->
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/css/icons.min.css" rel="stylesheet" type="text/css">
<!-- App Css -->
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
<!-- Custom Css -->
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/css/custom.css" rel="stylesheet" type="text/css">


<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
<link href="http://sifydev.digitalrupay.com:8008/dev/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

		<link rel="stylesheet" href="http://sifydev.digitalrupay.com:8008/dev/assets/css/jquery.toast.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
	 <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

<style> 
button.dshExitFullScreenButton {
    display: none !important;
}
</style>
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><script type="text/javascript" charset="UTF-8" src="https://maps.google.com/maps-api-v3/api/js/54/9/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.google.com/maps-api-v3/api/js/54/9/util.js"></script></head>
<body data-sidebar="dark" class="">
<input type="hidden" id="man_id" value="1">
<!-- Begin page -->
<div id="layout-wrapper">
  <header id="page-topbar">
    <div class="navbar-header">
      <div class="d-flex"> 
        <!-- LOGO -->
        <div class="navbar-brand-box"> <a href="http://sifydev.digitalrupay.com:8008/dev/Welcome" class="logo logo-dark"> <span class="logo-sm"> <img src="http://sifydev.digitalrupay.com:8008/dev/assets/images/logo-sm.png" alt="" height="22"> </span> <span class="logo-lg"> <img src="http://sifydev.digitalrupay.com:8008/dev/assets/images/logo-dark.png" alt="" height="17"> </span> </a> <a href="http://sifydev.digitalrupay.com:8008/dev/Welcome" class="logo logo-light"> <span class="logo-sm"> <img src="http://sifydev.digitalrupay.com:8008/dev/assets/images/logo-sm.png" alt="" height="22"> </span> <span class="logo-lg"> <img src="http://sifydev.digitalrupay.com:8008/dev/assets/images/logo-light.png" alt="" height="40"> </span> </a> </div>
        
		<button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"> <i class="mdi mdi-menu"></i> </button>
						
      </div>
			<div class="d-flex mt-3 image_div_show">
</div>

			<div class="col-md-6">            
			<div class="news" id="header_flash_news_div"><marquee class="news-content" scrolldelay="120">
			<ul>
						<li>May Goddess Durga bless you with health, happiness, and prosperity this Navratri. Wishing you a joyous Navratri filled with music, dance, and devotion.May the divine presence of Maa Durga be with you throughout this festive season.</li>
						</ul>
			</marquee></div>           
			</div>

			<div class="d-flex mt-3 image_div_show">
</div>
		  
		  
		  
      <div class="d-flex">
        <div class="dropdown d-none d-lg-inline-block">
		          <button type="button" class="btn header-item waves-effect"> <img src="http://sifydev.digitalrupay.com:8008/dev/assets/images/Sify.png" alt="Header Avatar"> </button>
        </div>
       
       <div class="dropdown d-inline-block">
          <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="rounded-circle header-profile-user" src="http://sifydev.digitalrupay.com:8008/dev/assets/images/users/user-4.jpg" alt="Header Avatar"> </button>
					
					<div style="margin-top:-13px;">TrackOn</div>			
          <div class="dropdown-menu dropdown-menu-end"> 
            <!-- item--> 
            <a class="dropdown-item" href="http://sifydev.digitalrupay.com:8008/dev/Dashboard">
            <h5><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i>  TrackOn</h5>
            <p>Logged In Since<br>2023-10-17 15:13:32</p>
            </a> <a class="dropdown-item" href="http://sifydev.digitalrupay.com:8008/dev/Dashboard/change_password"><i class="mdi mdi-lock-open-outline font-size-17 text-muted align-middle me-1"></i> Change Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="http://sifydev.digitalrupay.com:8008/dev/Dashboard/logout"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a> </div>
        </div>
      </div>
    </div>
  </header>
  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">
    <div data-simplebar="init" class="h-100"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;"> 
      
      <!--- Sidemenu -->
      <div id="sidebar-menu"> 
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
          <li> <a href="http://sifydev.digitalrupay.com:8008/dev/Dashboard" class="waves-effect"> <i class="mdi mdi-view-dashboard-variant-outline"></i> <span>Dashboard</span> </a> </li>
          <li> <a href="http://sifydev.digitalrupay.com:8008/dev/Monitor" class=" waves-effect"> <i class="mdi mdi-calendar-check"></i> <span>Monitor</span> </a> </li>
          <li> <a href="http://sifydev.digitalrupay.com:8008/dev/Tasks" class="waves-effect"> <i class="mdi mdi-table-check"></i> <span>Tasks</span> </a> </li>
          		 <li> <a href="http://sifydev.digitalrupay.com:8008/dev/Geofence" class="waves-effect"> <i class="mdi mdi-google-maps"></i> <span>Geofence</span> </a> </li>
          <li> <a href="http://sifydev.digitalrupay.com:8008/dev/Calender" class="waves-effect"> <i class="mdi mdi-calendar"></i> <span>Calendar</span> </a> </li>
          		  <li> <a href="http://sifydev.digitalrupay.com:8008/dev/Hardware_master" class="waves-effect"> <i class="mdi mdi-menu"></i> <span>Hardware Master</span> </a> </li>
          <li> <a href="http://sifydev.digitalrupay.com:8008/dev/Team" class="waves-effect"> <i class="mdi mdi-teach"></i> <span>Team</span> </a> </li>
          <li> <a href="http://sifydev.digitalrupay.com:8008/dev/Distance_approvals" class="waves-effect"> <i class="mdi mdi-account-circle"></i> <span>Distance Approvals</span> </a> </li>
          <li> <a href="http://sifydev.digitalrupay.com:8008/dev/Reports" class="waves-effect"> <i class="mdi mdi-graph"></i> <span>Reports</span> </a> </li>
		
          <li> <a href="javascript: void(0);" class="has-arrow waves-effect"> <i class="mdi mdi-format-list-bulleted-type"></i> <span>Admin</span> </a>
            <ul class="sub-menu mm-collapse" aria-expanded="false">
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Employees">Team Setup</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Managers">Managers</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings/clusters">Clusters</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings/organization_setup">Organization Setup</a></li>
			               <li><a href="http://sifydev.digitalrupay.com:8008/dev/Flash_news">Flash News</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Bulk_emp_import">Bulk Upload Emp</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings">Device</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings/vendors">Vendor</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings">Lookup Photos</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings/zones">Zones</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings/states">States</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings">Forms</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings">My Accout</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings">Master Data</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/settings">Integration Logs</a></li>
              <li><a href="http://sifydev.digitalrupay.com:8008/dev/Settings">Settings</a></li>
		              </ul>
          </li>
		  
        </ul>
      </div>
      <!-- Sidebar --> 
    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 495px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: block; height: 151px;"></div></div></div>
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
                  url: "http://sifydev.digitalrupay.com:8008/dev/Dashboard/managerpunchin",
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
                  url: "http://sifydev.digitalrupay.com:8008/dev/Dashboard/managerpunchout",
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
                  url: "http://sifydev.digitalrupay.com:8008/dev/Dashboard/mangerpunchinstatus",
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
		url:"http://sifydev.digitalrupay.com:8008/dev/Team/header_count_display",
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
<style>
button.dshExitFullScreenButton {
    display: none !important;
}
</style>
 <div class="main-content">
    <div class="page-content">
      <div class="container-fluid"> 
        
        <!-- start page title -->
        <div class="row">
          <div class="col-sm-12">
            <div class="page-title-box">
              <h4>Dashboard</h4>
            </div>
          </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="accordion">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Filters </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
          <form class="needs-validation" id="date_filters_form" enctype="multipart/form-data">

                      <div class="mb-3 row">
                        <div class="col-md-3">
                          <div class="form-group typebtn">
                            <label for="input-datalist">Type<span>*</span></label>
                            <select class="form-select" aria-label="Default select example" name="search_type" id="search_type">
                              <option value="1">Today's Summary</option>
                              <!--<option value="2">Attendance </option>-->
                              <option value="3" selected="">Productivity</option>
							                                <option value="4">API Request Data</option>
							                               <option value="5">Active Users Reports</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="example-datetime-local-input" class="col-form-label">From Date</label>
                            <input class="form-control" type="date" name="frmdate" value="2023-10-16" id="example-datetime-local-input" max="2023-10-17" min="2023-08-01">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="example-datetime-local-input" class="col-form-label">To Date</label>
                            <input class="form-control" type="date" name="todate" value="2023-10-17" id="example-datetime-local-input" max="2023-10-17" min="2023-08-01">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <button type="submit" id="date_filters_submit_btn" class="btn btn-success waves-effect waves-light gobtn">Go</button>
                          </div>
                        </div>
                      </div>
                      </form>
                      <!-- end row --> 
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- end col --> 
        </div>
        <!-- end row -->
        
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
		
		
		
		
		 <div class="row">
          <div class="col-xl-12">
          <div class="card" id="preview_data">
              <!--<iframe id="" src="http://3.6.78.214:8080/app/dashboards#/view/de35ed60-141c-11ee-84d6-7902bda55687?embed=true&_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:'2023-10-16T00:00:00.000Z',to:'2023-10-17T23:59:00.000Z'))&_a=(description:'',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:''),timeRestore:!f,title:'Sify%20Attendance%20Dashboard%20Live',viewMode:view)" height="900px" width="100%" title="Dashboard"></iframe>-->
           
              <iframe id="" src="http://3.6.78.214:8080/app/dashboards#/view/80a7a980-5063-11ee-86a4-9dec0178d764?embed=true&amp;_g=(filters:!(),refreshInterval:(pause:!t,value:0),time:(from:'2023-10-16T00:00:00.000Z',to:'2023-10-17T23:59:00.000Z'))&amp;_a=(description:'',filters:!(),fullScreenMode:!f,options:(hidePanelTitles:!f,useMargins:!t),query:(language:kuery,query:''),timeRestore:!f,title:'panindiacustomdates-live%20dashboard',viewMode:view)" height="900px" width="100%" title="Dashboard"></iframe>
           
          </div>
          </div>
        </div>
		
		
		
		
		
        
        <!--<div class="row">
          <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tasks and Assign</h4>
                <p class="card-title-desc">Alerts are available for any length of text, as well as an optional dismiss button. For proper styling, use one of the four <strong>required</strong> contextual classes For inline dismissal, use the alerts jQuery plugin.</p>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-sm-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Assignment Status</h4>
                <div class="assign">
                  <ul>
                    <li><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Approved</li>
                    <li><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Field Cancelled</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">TAT Travel Time Queue Delay Execution Time</h4>
                <div class="row">
                  <div class="col-4">
                    <h5 class="mb-0 font-size-20 text-truncate">86541</h5>
                    <p class="text-muted text-truncate">Activated</p>
                  </div>
                  <div class="col-4">
                    <h5 class="mb-0 font-size-20 text-truncate">86541</h5>
                    <p class="text-muted text-truncate">Pending</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>-->
        
        <!-- end row -->
        
        <div class="col-sm-6 col-md-3 mt-4"> 
          <!--  Modal content for the above example -->
          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title mt-0" id="myLargeModalLabel">Modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                  <form class="needs-validation" name="event-form" id="form-event" novalidate="">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Event Name</label>
                          <input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required="" value="">
                          <div class="invalid-feedback">Please provide a valid event name</div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Category</label>
                          <select class="form-control custom-select" name="category" id="event-category">
                            <option selected=""> --Select-- </option>
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
      </div>
      <!-- container-fluid --> 
    </div>
    <!-- End Page-content --> 
    
  </div>


  
  <script type="text/javascript">
   
   
   
	   function Get_state_list(){
		var zone_id = $('#zone_id1').val();
		$.ajax({
		type: "post",
		url: "http://sifydev.digitalrupay.com:8008/dev/Settings/getstatebyzoneid",
		data: {z_id:zone_id},
		success: function(data){
		$('#state_id1').html(data);
		}
		});
	}


	function Get_clusters_list(){
		var state_id = $('#state_id1').val();
		var zone_id = $('#zone_id1').val();
		$.ajax({
		type: "post",
		url: "http://sifydev.digitalrupay.com:8008/dev/Dashboard/getclusters_by_state_id",
		data: {zone_id:zone_id,state_id:state_id},
		success: function(data){
		$('#cluster_id1').html(data);
		}
		});
	}






	$(document).ready(function(){
			$("#date_filters_form").on("submit", function(e){
				e.preventDefault();		
		var search_type = $('#search_type').val();
				   
					$("#date_filters_submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
				$("#date_filters_submit_btn").attr("disabled",true);
				if(search_type == 2){
					$.ajax({
						type: "post",
						url:"http://sifydev.digitalrupay.com:8008/dev/Dashboard/dashboard_attendance",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							var jsondata=JSON.parse(result); 
							
							$('#preview_data').html(jsondata['dashboard_ajax_div']);
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
				if(search_type == 1){
					$.ajax({
						type: "post",
						url:"http://sifydev.digitalrupay.com:8008/dev/Dashboard/dashboard_today_summary",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							var jsondata=JSON.parse(result); 
							$('#preview_data').html(jsondata['dashboard_ajax_div']);
							
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
					if(search_type == 3){
					$.ajax({
						type: "post",
						url:"http://sifydev.digitalrupay.com:8008/dev/Dashboard/dashboard_performance_data",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							var jsondata=JSON.parse(result); 
							$('#preview_data').html(jsondata['dashboard_ajax_div']);
							
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
				
				if(search_type == 4){
					$.ajax({
						type: "post",
						url:"http://sifydev.digitalrupay.com:8008/dev/Dashboard/dashboard_api_requests_data",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							var jsondata=JSON.parse(result); 
							$('#preview_data').html(jsondata['dashboard_ajax_div']);
							
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
				if(search_type == 5){
					$.ajax({
						type: "post",
						url:"http://sifydev.digitalrupay.com:8008/dev/Dashboard/dashboard_active_users_reports_data",
						data:$("#date_filters_form").serialize(),
						success:function(result)
						{		
							var jsondata=JSON.parse(result); 
							$('#preview_data').html(jsondata['dashboard_ajax_div']);
							
							$("#date_filters_submit_btn").html('Go');
							$("#date_filters_submit_btn").attr("disabled",false);
						}
					});	
				}
				
			});	
			
			
		});	
</script>


<footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12"> © 
          <script>document.write(new Date().getFullYear())</script>2023 Sify Technologies <span class="d-none d-sm-inline-block"> - All Rights Reserved.</span> </div>
      </div>
    </div>
  </footer>
</div>

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


<!-- JAVASCRIPT --> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/jquery/jquery.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/metismenu/metisMenu.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/simplebar/simplebar.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/node-waves/waves.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script> 
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script> 

<!-- App js --> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/js/app.js"></script> 
<!--<script src="http://sifydev.digitalrupay.com:8008/dev/assets/js/ajax.js"></script> -->




<!-- Required datatable js --> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script> 
<!-- Buttons examples --> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/jszip/jszip.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/pdfmake/build/pdfmake.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/pdfmake/build/vfs_fonts.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script> 
<!-- Responsive examples --> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/select2/js/select2.min.js"></script> 


<!--<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> -->

<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/js/pages/form-advanced.init.js"></script> 

<!-- Datatable init js --> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/js/pages/datatables.init.js"></script> 

<!-- External js --> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/js/header_chart.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/js/nav-tabs.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/js/list_view.js"></script> 
<script src="http://sifydev.digitalrupay.com:8008/dev/assets/js/scroller.js"></script>

<script type="text/javascript" src="http://sifydev.digitalrupay.com:8008/dev/assets/js/jquery.toast.js"></script>
<!--new js -->

<!-- -->
<script type="text/javascript">
		

</script>

<!-- new code -->




<div id="cb-connect-sidebar-main"><div id="cb-connect-sidebar"><a href="#" class="cb-connect-close-sidebar-button"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="currentColor"><path fill-rule="evenodd" d="M3.3352346,13.1409137 L3.33523455,13.1409138 C2.91548014,13.5733825 2.92546046,14.2645641 3.35752584,14.684707 C3.78087294,15.0963751 4.45458199,15.0962796 4.87780976,14.6844919 L9.00453522,10.5538595 L13.1373639,14.6904917 L13.1373638,14.6904917 C13.568947,15.1110906 14.2594594,15.1018597 14.6796682,14.6698737 C15.0920236,14.2459591 15.0919517,13.570408 14.6795052,13.1465834 L10.5469491,9.01016937 L14.6955806,4.85777412 L14.6955806,4.85777409 C15.1130468,4.423134 15.0994531,3.73205118 14.6652183,3.31419357 C14.2430237,2.90792372 13.5756331,2.90792372 13.1534407,3.31419361 L9.00453675,7.46620706 L4.86206292,3.31981159 L4.86206295,3.31981162 C4.436122,2.89342832 3.74549844,2.89339123 3.31951335,3.31972975 C2.89352771,3.74606833 2.89349066,4.43733659 3.31943155,4.86371935 L7.46206886,9.01011482 L3.3352346,13.1409137 Z" fill=""></path></svg></a><div id="cb-connect-sidebar-loading">
        <div>
          <div class="cb-connect-sidebar-loading-outer">
            <div class="cb-connect-sidebar-loading-inner">
              <img src="chrome-extension://pmnhcgfcafcnkbengdcanjablaabjplo/assets/logo-979a00aa.svg" width="40" height="40">
              <div class="cb-connect-sidebar-loading-inner-text">Loading...</div>
            </div>
          </div>
        </div>
      </div><div><iframe id="cb-connect-sidebar-iframe" lang="en" class="cb-connect-sidebar-container" style="height: 100vh;"></iframe></div></div><div id="cb-connect-open-button-outer" class="cb-connect-open-button-is-tucked" style="inset: 603px 0px auto auto;"><div id="cb-connect-open-button-inner" style="background: rgb(20, 140, 252);">
          <img src="chrome-extension://pmnhcgfcafcnkbengdcanjablaabjplo/assets/logo-dark-background-b8c98220.svg" width="20" height="20" style="user-select: none;width: 20px !important;height:20px !important;filter: none !important;">

          <div id="cb-connect-open-button-icp-message" style="display: none;">ICP</div>
        <div id="cb-connect-open-button-move-button"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 12.5V11h12v1.5ZM4 9V7.5h12V9Z"></path></svg></div><a href="#" id="cb-connect-close-widget-button" title="Hide widget on this site or all sites"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="currentColor"><path fill-rule="evenodd" d="M3.3352346,13.1409137 L3.33523455,13.1409138 C2.91548014,13.5733825 2.92546046,14.2645641 3.35752584,14.684707 C3.78087294,15.0963751 4.45458199,15.0962796 4.87780976,14.6844919 L9.00453522,10.5538595 L13.1373639,14.6904917 L13.1373638,14.6904917 C13.568947,15.1110906 14.2594594,15.1018597 14.6796682,14.6698737 C15.0920236,14.2459591 15.0919517,13.570408 14.6795052,13.1465834 L10.5469491,9.01016937 L14.6955806,4.85777412 L14.6955806,4.85777409 C15.1130468,4.423134 15.0994531,3.73205118 14.6652183,3.31419357 C14.2430237,2.90792372 13.5756331,2.90792372 13.1534407,3.31419361 L9.00453675,7.46620706 L4.86206292,3.31981159 L4.86206295,3.31981162 C4.436122,2.89342832 3.74549844,2.89339123 3.31951335,3.31972975 C2.89352771,3.74606833 2.89349066,4.43733659 3.31943155,4.86371935 L7.46206886,9.01011482 L3.3352346,13.1409137 Z" fill=""></path></svg></a></div></div></div></body></html>