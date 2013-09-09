<?php
/**
 * @package WordPress
 * @subpackage Winter-fur_Theme
 */

get_header();
$category = get_the_category();

	if (!empty($category[1]->cat_ID)) {
			$shparent = $category[1]->category_parent;
			$category = $category[1];
		} else {
			$shparent = $category[0]->category_parent;
			$category = $category[0];
		}
?>
	<div id="content" class="narrowcolumn">
		<?php get_sidebar('left'); ?>
	<?php if (in_category(8)) { //http://www.fprod.net/fgallery/galleries/demo/paris-1/#
		$i = 1;
	?>
			
		<?php //single_cat_title(); ?>
		<table width="100%" ><tr><td valign="top" width="37%">
		<div style="margin: 20px 0 0 20px;">

		</div>
		</td>
		
		<?php
		$i = 1;
		if (have_posts()) : 
				query_posts($query_string . '&posts_per_page=1&order=ASC'); ?>
		
		<?php while (have_posts()) : the_post(); ?>
			<td valign="top" width="30%">
				<div class="gallery">
						
			<?php the_content(''); ?>

					<?php //the_excerpt() ?>
				</div>
				</td>
				<td valign="top" width="33%">
				<?php 
				$ngg = get_post_custom_values('ngg');
	$ngg = $ngg[0];
	if ($ngg > 0)
	{
	//$name = $wpdb->get_row("SELECT CONCAT( wp_ngg_gallery.path, '/', wp_ngg_pictures.filename ),wp_ngg_gallery.title,wp_ngg_pictures.imagedate FROM wp_ngg_gallery, wp_ngg_pictures WHERE wp_ngg_gallery.gid = '".$ngg."' and wp_ngg_gallery.gid = wp_ngg_pictures.galleryid and wp_ngg_gallery.previewpic = wp_ngg_pictures.pid ORDER BY wp_ngg_gallery.gid DESC , wp_ngg_pictures.imagedate DESC LIMIT 0 , 1 ", ARRAY_N);
?>
<!--<img src="<?php //echo "/winter-fur/".$name[0]; ?>"  border=0 vspace=10 />-->
	<?php	//echo $img_src_glob;
		echo $img_src_glob;
	}
?>
			</td>
				
		<?php 
		//if ($i % 2 == 0 ) echo "</tr><tr>";
		$i++;
		endwhile; ?>
	<?php 	endif; ?>
		
		
		</tr></table>
		<div class="navigation">
			<?	if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		</div>
	<?php 	//endif; ?>
		
	<?php } else { ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
	
		<div class="post1" id="post-<?php the_ID(); ?>">
			<div class="gallery_wrap back_white">
			<?php /*if(!in_category(array(20,21,22,36,51)) && $shparent != 51) {?>
				<h2><?php the_title(); print $shparent ?></h2>
				<?php 
			}*/

			if (in_category(1) || in_category(4) || in_category(5) || in_category(6)) { ?>
				
				<small style="font-size: 11px;"><?php the_time('d.m.Y') ?></small> <? } ?>
			<div class="without-scroll-pane">
				<?php 
				$ngg = get_post_custom_values('ngg');
				$ngg = $ngg[0];
				if($ngg == 0){
					if(in_category(20)){
						$ngg = get_post_custom_values('ngg', 145);
						$ngg = $ngg[0];
					}
					else if(in_category(21)){
						$ngg = get_post_custom_values('ngg', 506);
						$ngg = $ngg[0];
					}
					else if(in_category(22)){
						$ngg = get_post_custom_values('ngg', 520);
						$ngg = $ngg[0];
					}
					else if(in_category(36)){
						$ngg = get_post_custom_values('ngg', 498);
						$ngg = $ngg[0];
					}
				}
				if ($ngg > 0)
				{ 
					print '<div class="gallery_wrap">';
					echo nggShowGallery($ngg);
					print '</div>';
				}
				?>
				<?php if( !in_array($post->ID, array(506,689,145,520,498))){?>
				<h2><?php the_title(); ?></h2>
				<?php }
				?>
			</div>
			<?php 
			//$post_id = get_post_custom_values('post_id');
			/*if(!empty($post_id)){
				print '<div class="vertical_tabs">';
				foreach($post_id as $post){
					query_posts('p='.$post);
					while (have_posts()) : the_post(); ?>
					<div class="vertical_post">
						<div class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></div>
						<div class="post_content"><p><?php print $content = get_the_excerpt(); ?></p></div>
					</div>
					<?php endwhile; wp_reset_query();
				}
				print '</div>';
			}*/
			print "<div class='body'>";
			the_content('');
			print "</div>";
			 ?>
			</div>
		</div>
	<?php endwhile; else: ?>

		<p>Извините, ни одна запись не подошла под Ваши критерии.</p>

<?php endif; } ?>

	<!--</div>-->
	</div>

<?php get_footer(); ?>
