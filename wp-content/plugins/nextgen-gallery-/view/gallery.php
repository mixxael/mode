<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div class="ngg-galleryoverview" id="<?php echo $gallery->anchor ?>">

<?php if ($gallery->show_slideshow) { ?>
	<!-- Slideshow link -->
	<div class="slideshowlink">
		<a class="slideshowlink" href="<?php echo $gallery->slideshow_link ?>">
			<?php echo $gallery->slideshow_link_text ?>
		</a>
	</div>
<?php } ?>

<?php if ($gallery->show_piclens) { ?>
	<!-- Piclense link -->
	<div class="piclenselink">
		<a class="piclenselink" href="<?php echo $gallery->piclens_link ?>">
			<?php _e('[View with PicLens]','nggallery'); ?>
		</a>
	</div>
<?php } ?>
	
	<!-- Thumbnails -->
		<?php foreach ( $images as $image ) : ?>
	
	<?php $img_src1 = "
					imgA=new Image() 
						imgA.src='$image->imageURL'"; ?>
	<?php endforeach; ?>
	<?php foreach ( $images as $image ) : ?>
	
	<?php $img_src .= "
					img$image->pid=new Image()
					img$image->pid.src='$image->imageURL'"; ?>
	<?php endforeach; ?>
	<?php $img_src = $img_src1.$img_src; ?>
	<?php 
					echo "<script> $img_src						
						function changeImage(image){   
 						document.images.propertyImage.src=image.src}
    					</script>"; ?>
	<table border="0" cellpadding="0" style="border-collapse: collapse" width="100%">
												<tr>
													<td>
					<a class="inside" href="javascript:changeImage(imgA)"><img src="<?php echo $image->thumbURL ?>" /></a>

													</td>

	<?php foreach ( $images as $image ) : ?>
		<?php /*$img_src .= "
					img$image->pid=new Image()
					img$image->pid.src='$image->thumbnailURL'"; */?>
					<td>
	<!--<div id="ngg-image-<?php echo $image->pid ?>" class="ngg-gallery-thumbnail-box1" <?php echo $image->style ?> >
		<div class="ngg-gallery-thumbnail1" >-->
			<a href="<?php echo $image->imageURL ?>" rel="lightbox" caption="<?php echo $image->description ?>" title="<?php echo $image->description ?>" <?php echo $image->thumbcode ?> ></a>
			<a href="javascript:changeImage(img<?php echo $image->pid ?>)" >
				<?php if ( !$image->hidden ) { ?>
				<img title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>" src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> />
				<?php } ?>
			</a>
		<!--</div>
	</div>-->
	
	<?php if ( $image->hidden ) continue; ?>
	<?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
		<br style="clear: both" />
	<?php } ?>
	</td>
 	<?php endforeach; 
			/*$img_src .= "
						imgA=new Image() 
						imgA.src='$image->thumbURL'"; 
					echo "<script> $img_src						
						function changeImage(image){   
 						document.images.propertyImage.src=image.src}
    					</script>";*/ ?>
 	 </tr></td></table>
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	
</div>

<?php endif; ?>