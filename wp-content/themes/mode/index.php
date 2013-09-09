<?php
/**
 * @package WordPress
 * @subpackage Winter-fur_Theme
 */

get_header(); ?>
	
	
	<?php if (is_home()) {
		query_posts('p=9');
	if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<table><tr>
				<td valign="top">
					<?php $index_thumbnail = get_post_meta($post->ID, 'big_img', true);
						if ($index_thumbnail) echo "<div  class='caption'><img src='$index_thumbnail' /></div>";?>
				</td>
				<td valign="top">
					<?php the_content('Читать полностью &raquo;'); ?>
				</td></tr></table>
				
				<?php //the_content('<p class="serif">Читать полностью &raquo;</p>'); ?>
			</div>
		</div>
		<?php endwhile; 
			else : ?>

		<h2 class="center">Не найдено</h2>
		<p class="center">Извините, но, похоже, Вы ищите того, чего здесь нет.</p>
		<?php get_search_form(); ?>

	<?php endif; 
	} else { ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
				<table><tr>
				<td>
					<?php $index_thumbnail = get_post_meta($post->ID, 'big_img', true);
						if ($index_thumbnail) echo "<div  class='caption'><img src='$index_thumbnail' /></div>";?>
				</td>
				<td valign="top">
					<?php the_content('Читать полностью &raquo;'); ?>
				</td></tr></table>
				</div>

				<p class="postmetadata"><?php the_tags('Тэги: ', ', ', '<br />'); ?> Написано в рубрике <?php the_category(', ') ?> | <?php edit_post_link('Редактировать', '', ' | '); ?>  <?php comments_popup_link('Нет комментариев &#187;', '1 комментарий &#187;', 'Комментариев: % &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<?	if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		</div>

	<?php else : ?>

		<h2 class="center">Не найдено</h2>
		<p class="center">Извините, но, похоже, Вы ищите того, чего здесь нет.</p>
		<?php get_search_form(); ?>

	<?php endif; } ?>

	</div>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
