<?php
/**
 * @package WordPress
 * @subpackage Winter-fur_Theme
 */

get_header();
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
	$name = $wpdb->get_row("SELECT CONCAT( wp_ngg_gallery.path, '/', wp_ngg_pictures.filename ),wp_ngg_gallery.title,wp_ngg_pictures.imagedate FROM wp_ngg_gallery, wp_ngg_pictures WHERE wp_ngg_gallery.gid = '".$ngg."' and wp_ngg_gallery.gid = wp_ngg_pictures.galleryid and wp_ngg_gallery.previewpic = wp_ngg_pictures.pid ORDER BY wp_ngg_gallery.gid DESC , wp_ngg_pictures.imagedate DESC LIMIT 0 , 1 ", ARRAY_N);
?>
<!--<img src="<?php echo "/winter-fur/".$name[0]; ?>"  border=0 vspace=10 />-->
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
			<h2><?php the_title(); ?></h2>
			<?php if (in_category(1) || in_category(4) || in_category(5) || in_category(6)) { ?>
						<small style="font-size: 11px;"><?php the_time('d.m.Y') ?></small> <? } ?>
			<div class="scroll-pane">
			
				<?php the_content(''); ?>

				<?php //wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php //the_tags( '<p>Тэги: ', ', ', '</p>'); ?>

				<!--<p class="postmetadata alt">
					<small>
						Запись была опубликована
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/wordpress/time-since/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						<?php the_time('l, F jS, Y') ?> в <?php the_time() ?>
						в рубрике <?php the_category(', ') ?>.
						 <?php //post_comments_feed_link('RSS 2.0'); ?>.

						<?php /*if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							Вы можете <a href="#respond">оставить комментарий</a> или <a href="<?php trackback_url(); ?>" rel="trackback">трэкбек</a> с Вашего сайта.

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							Комментирование закрыто, но Вы можете оставить <a href="<?php trackback_url(); ?> " rel="trackback">трэкбек</a> с Вашего сайта.

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							Вы можете оставить комментарий. Пингбеки запрещены.

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							Комментирование и пингбеки запрещены.

						<?php } edit_post_link('Редактировать','','.'); */?>

					</small>
				</p>-->

			</div>
		</div>
		
	<?php //comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Извините, ни одна запись не подошла под Ваши критерии.</p>

<?php endif; } ?>

	</div>
	</div>

<?php get_footer(); ?>