


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
<footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12"> © 
          <script>document.write(new Date().getFullYear())</script> Sify Technologies <span
							class="d-none d-sm-inline-block"> - All Rights Reserved.</span> </div>
      </div>
    </div>
  </footer>
</div>

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


<!-- JAVASCRIPT --> 
<script src="<?php echo base_url();?>assets/libs/jquery/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/metismenu/metisMenu.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/simplebar/simplebar.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/node-waves/waves.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script> 
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script> 

<!-- App js --> 
<script src="<?php echo base_url();?>assets/js/app.js"></script> 
<!--<script src="<?php echo base_url();?>assets/js/ajax.js"></script> -->




<!-- Required datatable js --> 
<script src="<?php echo base_url();?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script> 
<!-- Buttons examples --> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/jszip/jszip.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/pdfmake/build/pdfmake.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/pdfmake/build/vfs_fonts.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script> 
<!-- Responsive examples --> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/select2/js/select2.min.js"></script> 


<!--<script src="<?php echo base_url();?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> -->

<script src="<?php echo base_url();?>assets/libs/spectrum-colorpicker2/spectrum.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script> 
<script src="<?php echo base_url();?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/pages/form-advanced.init.js"></script> 

<!-- Datatable init js --> 
<script src="<?php echo base_url();?>assets/js/pages/datatables.init.js"></script> 

<!-- External js --> 
<script src="<?php echo base_url();?>assets/js/header_chart.js"></script> 
<script src="<?php echo base_url();?>assets/js/nav-tabs.js"></script> 
<script src="<?php echo base_url();?>assets/js/list_view.js"></script> 
<script src="<?php echo base_url();?>assets/js/scroller.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.toast.js"></script>
<!--new js -->

<!-- -->
<script type="text/javascript">
	<?php
	if ($msg != '')
	{ ?>$.toast({heading: '<?php
	echo $heading; ?>',text: '<?php
	echo $msg; ?>',showHideTransition: 'fade',position: 'top-right',icon: '<?php
	echo $icon; ?>'});<?php
	} ?>
	

</script>

<!-- new code -->



</body>
</html>