<?php
/**
 * @package WordPress
 * @subpackage Winter-fur_Theme
 */

get_header();
echo 	'<div id="content" class="narrowcolumn">';
get_sidebar('left');
?>
		<?php 
		$i = 1;	
		 if (is_category(20) || is_category(21) || is_category(22) || is_category(23) || is_category(36))
		 {
		 ?>
<div class="post1">	
	<div class="gallery_wrap">
		<?php
		$i = 1;
		if (have_posts()) : 
		// 165
		
			query_posts($query_string . '&posts_per_page=1&order=ASC');  ?>
		
		<?php while (have_posts()) : the_post(); ?>
	

    
        <?php 
	$ngg = get_post_custom_values('ngg');
	$ngg = $ngg[0];
	if ($ngg > 0)
	{
	//$name = $wpdb->get_row("SELECT CONCAT( wp_ngg_gallery.path, '/', wp_ngg_pictures.filename ),wp_ngg_gallery.title,wp_ngg_pictures.imagedate FROM wp_ngg_gallery, wp_ngg_pictures WHERE wp_ngg_gallery.gid = '".$ngg."' and wp_ngg_gallery.gid = wp_ngg_pictures.galleryid and wp_ngg_pictures.exclude = 0 ORDER BY wp_ngg_pictures.sortorder DESC", ARRAY_N);
	//$i = 0;
	//echo $ngg;
	//echo $name[0].$name[1].$name[2].$name[3].$name[4].$name[5].$name[6];
	/*while ($row = mysql_fetch_array($name)) {
		echo "<li><a href='http://localhost/modeinua/$row['$i']' title=' '><img src='http://localhost/modeinua/$name[$i]' width='120' height='75' alt='' /></a></li>";
		$i ++;
	}*/
	
?>
<!--<img src="<?php //echo "/modeinua/".$name[0]; ?>"  border=0 vspace=10 />-->
	<?php	//echo $img_src_glob;
		//echo $img_src_glob;
	echo nggShowGallery($ngg);
	}
	else {
		$ngg = 2;
		echo nggShowGallery($ngg);
		}
	//echo $ngg;

?>
	
		<?php 
		//if ($i % 2 == 0 ) echo "</tr><tr>";
		$i++;
		endwhile; ?>
	<?php 	endif; ?>
    </div>
   </div>
			
		<?php 
		 }
		 
		 else {
		if (have_posts()) : 
			query_posts($query_string . '&posts_per_page=20');?>

		<div style="float: left; width: 830px;"> 
		<?php $j = 1; 
				while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?>>
		<?php //echo wp_get_attachment_image( $post->ID, array(20,20), true); ?> 
		<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(200,160), array("class" => "alignleft post_thumbnail")); } ?> 
				<?php if (is_category(13))	{
							if  ($j == 1) echo '<p style="margin: 20px 0 0 10px;">Если у Вас есть вопросы, Вы можете их отправлять на почту <a href="mailto:info@winter-fur.com.ua">info@winter-fur.com.ua</a>	или <a href="/winter-fur/vopros/">заполнив форму</a>.</p>'; 
							?> <h2 id="post-<?php the_ID(); ?>"><strong>Вопрос: </strong><?php the_title(); ?></h2> <? 
							}
					else if (is_category(7)) {?> <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2> <? } ?>
				
					<?php if (is_category(13)) { ?>
							<div class="entry" style="margin-left: 10px;">
							<?php the_content() ;
							} else  { ?> <div class="entry"> <?php the_excerpt(); } ?>
				</div>
			</div>
		<?php $j ++; endwhile; ?>
		</div>
		<div class="navigation">
			<?	if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		</div>
	<?php else :


	endif; }
?>

</div>
<?php get_footer(); 
