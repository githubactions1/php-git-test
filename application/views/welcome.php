<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>APSFL </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="theme/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
.col-sm-10 {
    width: 80% !important;
}
.col-sm-2 {
    width: 20% !important;
}
.sidebar-menu li > a > .fa-angle-left, .sidebar-menu li > a > .pull-right-container > .fa-angle-left {
    height: auto;
    margin-right: 10px;
    padding: 0;
    width: auto;
}
@media (max-width: 768px){
.login-container{margin-top: 20%;}
.login-box{width: 90%;margin-top: 20px;}
.company__info{border-top-right-radius: 20px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;padding: 10px 0px;}
.login_form,.forgot_form{border-top-left-radius: 0px;border-top-right-radius: 0px;border-bottom-left-radius: 20px;}
}
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
 <div class="container login-container">
            <div class="row">
                <div class="col-md-5 text-center company__info login-form-1">
        <span class="company__logo"><img src="https://apsfl.digitalrupay.com/images/apsfl-logo.png" alt="Logo"></span>
      </div>
                <div class="col-md-7 text-center login-form-2 login_form">
                    <h2>Log In</h2>
          
            <div class="form-group has-feedback">
            <input type="text" class="form__input" name="loginEmail" id="loginEmail" placeholder="Username" required>
            </div>
            <div class="form-group has-feedback">
            <input type="password"  name="loginPwd" id="loginPwd" class="form__input" placeholder="Password" required>
            </div>
            <div class="row">
            <div class="col-md-12 text-center">
              <button type="submit" id="loginSubmit" name="loginSubmit" class="btn btn-info">Submit</button>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12 text-center">
              <p class="for-pswd">Don't remember your password? <a href="javascript:void(0);" class="text-center forgotLink">Click Here</a></p>
            </div>
            </div>
          
                </div>
        <div class="col-md-7 text-center login-form-2 forgot_form" style="display: none;background: white !important;">
          
            <div class="form-group has-feedback" style="margin-top: 110px;">
              <input type="text" class="form__input" name="forgotEmail" id="forgotEmail" placeholder="Username" required>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <button type="submit" id="forgotSubmit" name="forgotSubmit" class="btn btn-info">Submit</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <p class="for-pswd">Back to Login <a href="javascript:void(0);" class="text-center loginLink">Click Here</a></p>
              </div>
            </div>
          
        </div>
            </div>
        </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://themefiles.digitalrupay.com/theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
$(document).on('click','.forgotLink', function(){
    $(".login_form").hide();
    $(".forgot_form").show();
});
$(document).on('click','.loginLink', function(){
    $(".login_form").show();
    $(".forgot_form").hide();
});
</script>
<!-- Bootstrap 3.3.6 
<script src="<?php echo base_url()?>theme/bootstrap/js/bootstrap.min.js"></script>-->
<!-- iCheck 
<script src="<?php echo base_url()?>theme/plugins/iCheck/icheck.min.js"></script>-->
</body>
</html>