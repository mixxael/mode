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
	<?php $i = 1; //print_r($images)
			$output = "";
			//print_r($gallery);
		?>
	<?php //foreach ( $images as $image ) : ?>
		
	<?php //endforeach; ?>
	
	<?php foreach ( $images as $image ) : /* ?>
	
	<!--<div id="ngg-image-<?php echo $image->pid ?>" class="ngg-gallery-thumbnail-box" <?php echo $image->style ?> >
		<div class="ngg-gallery-thumbnail" >-->
		<?php */
            if($i ==1 ){
				$big_img = $image->imageURL;
				$big_img_description = $image->description;
				$active = "'opacity: 1; ' class='active'";
			}
			else
				$active = "'opacity: 0.3; ' class=''";
            $output .= "<div class='image_holder_in'><img id='image_tn_$i' src='{$image->thumbnailURL}' width='60' height='40' alt='{$image->description}' style=$active /></div>";
            
            /*?>
           <!--
			<li><a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>" <?php echo $image->thumbcode ?> >
				<?php if ( !$image->hidden ) { ?>
				<img title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>" src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> />
				<?php } ?>
			</a></li>-->
		<!--</div>
	</div>-->
	
	<?php */
	 if ( $image->hidden ) continue; ?>
	<?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
		<br style="clear: both" />
	<?php } ?>
	<?php 
		
		if($i % 9 == 0)
			$output .=  " </div><div class='image_holder'>";
		$i++;
	?>
 	<?php endforeach; ?>
 	<a class="browse left" id="left_gallery"></a>
    <div class="photo_number"></div>
    <div id="image_wrap" style="overflow: hidden; position: relative; opacity: 1; ">
            <div id="photo_description" style="display: none; "><?=$big_img_description?></div>
            <div id="photo_description_a" style="display: none;"><a href="javascript:void(0);" onclick="jQuery('#photo_description').slideToggle();">
				<?php 
				if($gallery->ID == 10) 
					print "ОПИСАНИЕ";
				else
					print "ОПИСАНИЕ<br />ЦЕНА";?>
					</a></div>
    	   <img class="img_loading" src="/wp-content/themes/mode/images/loading_transparent.gif" alt="" width="32" height="32" style="padding-top: 150px; display: none; " />
    	   <img class="img_big" src="<?php print ($big_img) ?>" alt="" width="650" height="325" style="display: inline-block; padding-left: 0px; " />
        </div>
            <a class="browse right" id="right_gallery"></a>
        <div style="height:5px"></div>
        <div class="scrollable_wrap">
			<a class="prev browse left disabled"></a>
            <div class="scrollable">
				<div class="items" style="left: 0px; ">
					<div class="image_holder">
 	<?php 	print $output;	?>
 	
 	</div>
	</div>
            </div>
            <a class="next browse right"></a>
        </div>
 	
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	
</div>

<?php endif; ?>
