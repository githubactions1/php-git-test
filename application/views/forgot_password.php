<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>:: Track On ::</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="account-pages" style="padding: 130px 0px; background: #96be2f;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
          <div class="card-body pt-0">
            <h3 class="text-center mt-5 mb-4"> <a href="index.html" class="d-block auth-logo"> <img src="assets/images/logo-dark.png" alt="" height="30" class="auth-logo-dark"> <img src="assets/images/logo-light.png" alt="" height="30" class="auth-logo-light"> </a> </h3>
            <div class="p-3">
              <h4 class="text-muted font-size-18 mb-3 text-center">Reset Password</h4>
              <div class="alert alert-info" role="alert"> Enter your Email and instructions will be sent to you! </div>
              <form class="form-horizontal mt-4" action="<?php echo base_url();?>Welcome">
                <div class="mb-3">
                  <label for="useremail">Email</label>
                  <input type="email" class="form-control" id="useremail"
                                            placeholder="Enter email">
                </div>
                <div class="mb-3 row">
                  <div class="col-12 text-end">
                    <button class="btn btn-success w-md waves-effect waves-light"
                                                type="submit">Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
       <div class="mt-5 text-center text-white">
          <p> <a href="<?php echo base_url();?>Welcome" class="text-white"> Login Now </a> </p>
          © 
          <script>document.write(new Date().getFullYear())</script> <span
                            class="d-none d-sm-inline-block"> - Sify Technologies - All Rights Reserved.</span> </div>
      </div>
    </div>
  </div>
</div>

<!-- JAVASCRIPT --> 
<script src="assets/libs/jquery/jquery.min.js"></script> 
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="assets/libs/metismenu/metisMenu.min.js"></script> 
<script src="assets/libs/simplebar/simplebar.min.js"></script> 
<script src="assets/libs/node-waves/waves.min.js"></script> 
<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script> 
<!-- App js --> 
<script src="assets/js/app.js"></script>
</body>
</html>