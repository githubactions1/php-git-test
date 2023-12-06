<?php if($attachment_counts < 5){ ?>
<div id="images_div_id_<?php echo $key; ?>" class="text-center mt-4" <?php echo $attachment_counts; ?>>
	  
		  <div class="col-md-8" >
            <div class="form-check">
			<input name="attachment[]" type="file"  required>   
			<input name="img_id[]" type="hidden"  value="<?php echo $key; ?>"  required>
		<a onclick="deleteImage(<?php echo $key; ?>)" class="btn btn-danger  text-white pull-right"><i class="fa fa-trash" ></i></a>
            </div>
	
          </div>
</div>
<?php } ?>