<?php
/**
 * @package WordPress
 * @subpackage Winter-fur_Theme
 */

get_header();
get_sidebar('left');
//phpinfo();
?>
		<table width="688" style="float: right; margin: -18px 0px 0 0;">
		<tr><td>
		<?php
		$i = 1;
		if (have_posts()) : 
				query_posts($query_string . '&posts_per_page=1&order=ASC'); ?>
		
		<?php while (have_posts()) : the_post(); ?>

			<div class="scroll-big">
		<div class="scroll-pane">
				
			<?php the_content(''); ?>

					<?php //the_excerpt() ?>
				</div>
				</div>
				<?php 
				$ngg = get_post_custom_values('ngg');
	$ngg = $ngg[0];
	if ($ngg > 0)
	{
	$name = $wpdb->get_row("SELECT CONCAT( wp_ngg_gallery.path, '/', wp_ngg_pictures.filename ),wp_ngg_gallery.title,wp_ngg_pictures.imagedate FROM wp_ngg_gallery, wp_ngg_pictures WHERE wp_ngg_gallery.gid = '".$ngg."' and wp_ngg_gallery.gid = wp_ngg_pictures.galleryid and wp_ngg_gallery.previewpic = wp_ngg_pictures.pid ORDER BY wp_ngg_gallery.gid DESC , wp_ngg_pictures.imagedate DESC LIMIT 0 , 1 ", ARRAY_N);
?>
<!--<img src="<?php echo "/modeinua/".$name[0]; ?>"  border=0 vspace=10 />-->
	<?php	//echo $img_src_glob;
		echo $img_src_glob;
	}
?></td>
<td width=130 align="right">
<div style="margin-right: -15px">
<div class="ngg-galleryoverview" id="ngg-gallery-37-2644">


	
	<!-- Thumbnails -->
		
	<div id="ngg-image-386" class="ngg-gallery-thumbnail-box"  >
		<div class="ngg-gallery-thumbnail" >
 <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
    <li><a href="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big2.jpg" title=" " class="shutterset_set_37" >
	<img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big2.jpg" width="120" height="75" alt="" /></a></li>
    <li><a href="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big.jpg" title=" " class="shutterset_set_37" ><img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big.jpg" width="75" height="75" alt="" /></a></li>
    <li><img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big2.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big2.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big2.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big2.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://localhost/modeinua/wp-content/gallery/vesna-leto-2010/shuba_big.jpg" width="75" height="75" alt="" /></li>
  </ul>
  		</div>
	</div>
  </div>
    </div>

			</td>
				
		<?php 
		//if ($i % 2 == 0 ) echo "</tr><tr>";
		$i++;
		endwhile; ?>
	<?php 	endif; ?>
		
		
		</tr></table>
	<?php //else :	endif; ?>

	</div>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
