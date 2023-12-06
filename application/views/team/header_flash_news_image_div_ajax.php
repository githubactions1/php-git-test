
<?php if(!empty($flash_news_list)){
		$flash_news=$flash_news_list[0];
			$height='70';
			$width='70';
		if(!empty($flash_news->news_image_size)){
			$height_width=explode(',',$flash_news->news_image_size);
			$height=$height_width[0];
			$width=$height_width[1];
		}
		
		if(!empty($flash_news->news_image)){
	?>
<p> <img src="<?php echo $flash_news->news_image;?>" style="width:<?php echo $width;?>px; height:<?php echo $height;?>px;" ></p>

<?php } } ?>