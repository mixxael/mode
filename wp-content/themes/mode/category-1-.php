<?php
/**
 * @package WordPress
 * @subpackage Winter-fur_Theme
 */

get_header();
?>


		<?php 	
		$i = 1;
		if (have_posts()) : 
				query_posts($query_string . '&posts_per_page=8'); ?>
		<?php //single_cat_title(); ?>
		<table width="100%" ><tr>
<!--
 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Архив для категории &#8216;<?php single_cat_title(); ?>&#8217;</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Записи с тегами: &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Архив за <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Архив за <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Архив за <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Архив автора</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Архив блога</h2>
 	  <?php } ?>
-->

		<?php while (have_posts()) : the_post(); ?>
	
				
				<td valign="top">
				<div class="news">
				<?php $index_thumbnail = get_post_meta($post->ID, 'news_img_small', true);  ?>
				<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $index_thumbnail; ?>" /></a>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на <?php the_title_attribute(); ?>"><?php the_title(); ?></a><br />
					<small><?php the_time('d.m.Y') ?></small>
					<?php the_excerpt() ?>
				</div>
				</td>
				<!--<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Написано в рубрике <?php the_category(', ') ?> | <?php edit_post_link('Редактировать', '', ' | '); ?>  <?php comments_popup_link('Нет комментариев &#187;', '1 комментарий &#187;', 'Комментариев: % &#187;'); ?></p>-->

			

		<?php 
		if ($i % 2 == 0 ) echo "</tr><tr>";
		$i++;
		
		
		endwhile; ?>
		</tr></table>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Старые записи') ?></div>
			<div class="alignright"><?php previous_posts_link('Новые записи &raquo;') ?></div>
		</div>
	<?php else :

		/*if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Извините, но в категории %s пока нет записей.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Извините, но на эту дату записей нет.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Извините, но автор %s пока ничего не писал.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>Ни одной записи не найдено.</h2>");
		}*/
		//get_search_form();

	endif;
?>

	</div>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
