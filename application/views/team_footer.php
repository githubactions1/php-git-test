


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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.toast.js"></script>
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
       

<script>	
$(function(){
    
    $("[data-toggle=popover]").popover({
        html : true,
        content: function() {
            var content = $(this).attr("data-popover-content");
            return $(content).children(".popover-body").html();
        },
        title: function() {
            var title = $(this).attr("data-popover-content");
            return $(title).children(".popover-heading").html();
        }
    });
    
});
	</script>
	
	
	
	
	
	

</body>
</html>