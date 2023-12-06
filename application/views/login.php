<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>:: Track On ::</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

<!-- Bootstrap Css -->
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?php echo base_url();?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.toast.css" />

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>


<body>
<?php

if($this->session->flashdata('success') != '')
{
$msg = $this->session->flashdata('success');
$heading = 'Success';
$icon = 'success';
}else
if ($this->session->flashdata('error') != '')
	{
	$msg = $this->session->flashdata('error');
	$heading = 'Error';
	$icon = 'error';
	}
  else
if (isset($error) && $error != '')
	{
	$msg = $error;
	$heading = 'Error';
	$icon = 'error';
	}
  else
if (isset($success) && $success != '')
	{
	$msg = $success;
	$icon = 'success';
	$heading = 'Success';
	}else{
		$msg = '';
$icon = '';
$icon = '';

	}		
?>
<div class="account-pages" style="padding: 80px 0px; background: #96be2f;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
          <div class="card-body pt-0">
            <h3 class="text-center mt-5 mb-4"> <a href="javascript:void(0)" class="d-block auth-logo"> <img src="<?php echo base_url();?>assets/images/logo-dark.png" alt="" height="30" class="auth-logo-dark"> <img src="<?php echo base_url();?>assets/images/logo-light.png" alt="" height="30" class="auth-logo-light"> </a> </h3>
            <div class="p-3">
              <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
              <p class="text-muted text-center">Sign in to continue to Track On.</p>
			  <h3>
			  <?php 
				  if(!empty($this->session->flashdata('error_msg')))
				{
				  echo $this->session->flashdata('error_msg'); 
				}
			  ?>
			  </h3> 
              <form class="form-horizontal mt-4" role="form" method="post" id="login_form" >
                <div class="mb-3">
                  <label for="loginEmail">Username</label>
                  <input type="text" class="form-control" id="loginEmail" placeholder="Enter username" name="loginEmail" required>

                </div>
                <div class="mb-3">
                  <label for="loginPwd">Password</label>
					<input id="loginPwd" class="Password form-control" type="password" placeholder="Password" name="loginPwd" required>
							
                </div>
                <div class="mb-3 row mt-4">
                  <div class="col-6">
                   <!--<a href="<?php echo base_url();?>Forgot_password" class="text-muted"><i
                                                    class="mdi mdi-lock"></i> Forgot your password?</a>--> 
                  </div>
                  <div class="col-6 text-end">
                  
				<button type="submit" id="submit_btn" class="btn btn-success w-md waves-effect waves-light">Login </button>
			
												
                  </div>
                </div>
               
              </form>
            </div>
          </div>
        </div>
        <div class="mt-5 text-center text-white">
          © 
          <script>document.write(new Date().getFullYear())</script> <span
                            class="d-none d-sm-inline-block"> - Sify Technologies - All Rights Reserved.</span> </div>
      </div>
    </div>
  </div>
</div>

<!-- JAVASCRIPT --> 
<script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script> 
<!-- App js --> 
<script src="<?php echo base_url();?>assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.toast.js"></script>

<script src="<?php echo base_url();?>assets/js/parsley.min.js"></script> 



<script type="text/javascript">	
	
	$(document).ready(function(){
		$("#login_form").on("submit", function(e){
			e.preventDefault();		
		       
				$("#submit_btn").html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
			$("#submit_btn").attr("disabled",true);
			$.ajax({
				type: "post",
				url:"<?php echo base_url(); ?>Login/ajax_submit_form",
				data:$("#login_form").serialize(),
				success:function(result)
				{		
					var jsondata=jQuery.parseJSON(result);	

					if(jsondata['status']==1)
					{
						$("#login_form")[0].reset();
						$.toast({heading: 'Success',text: jsondata['msg'],showHideTransition: 'fade',position: 'top-right',icon: 'success'});
						setTimeout(function(){ window.location = "<?php echo base_url(); ?>Dashboard"; }, 1000);
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
	});







	
</script>

<script type="text/javascript">
	<?php
	if ($msg != '')
	{ ?>$.toast({heading: '<?php
	echo $heading; ?>',text: '<?php
	echo $msg; ?>',showHideTransition: 'fade',position: 'top-right',icon: '<?php
	echo $icon; ?>'});<?php
	} ?>
	

</script>
</body>
</html>