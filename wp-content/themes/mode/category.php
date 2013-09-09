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
		if (is_category(1)) 
		{
		if (have_posts()) : 
				query_posts($query_string . '&p=178'); ?>
		<div class="scroll-big">
		<div class="scroll-pane">
		<table width="100%" style="float: left;">
		<?php while (have_posts()) : the_post(); ?>
				<tr><td valign="top">
				<div class="news post-178">
				<?php $index_thumbnail = get_post_meta($post->ID, 'news_img_small', true); 
				if ($index_thumbnail) {	?>
				<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $index_thumbnail; ?>" /></a>
				<?php } 
					?> <strong> <?php the_title(); ?></strong><br /><br />
					<!--<small><?php the_time('d.m.Y') ?></small>-->
					<?php the_content() ?>
				</div>
				</td>

		<?php 
		echo "</tr>";
		endwhile; ?>
		</tr></table>

		</div>
		</div>
	<?php	endif; ?>

	</div>
		 <?php } else
		
		if (is_category(28) || is_category(29) || is_category(30) || is_category(31) || is_category(32) || is_category(33)) 
		{
		
			if (have_posts()) : 
				//query_posts($query_string . '&posts_per_page=10');
				?>
		<div class="scroll-big">
		<div class="scroll-pane">
		<table width="100%" style="float: left;">
		<?php while (have_posts()) : the_post(); ?>
				<tr><td valign="top">
				<div class="news">
				<?php $index_thumbnail = get_post_meta($post->ID, 'news_img_small', true);  ?>
				<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo $index_thumbnail; ?>" /></a>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на <?php the_title_attribute(); ?>"><?php the_title(); ?></a><br />
					<!--<small><?php the_time('d.m.Y') ?></small>-->
					<?php the_excerpt() ?>
				</div>
				</td>

		<?php 
		echo "</tr>";
		endwhile; ?>
		</tr></table>
		<div class="navigation">
			<?	if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		</div>
		</div>
		</div>
	<?php	endif; ?>

	</div>
		 <?php } else if (is_category(20) || is_category(21) || is_category(22) || is_category(23))
		 { 
		 ?>
		 <table width="688" style="float: right; margin: -18px 0px 0 0;">
		<tr><td>
		<?php
		$i = 1;
		if (have_posts()) : 
		// 165
		
				query_posts($query_string . '&posts_per_page=1&order=ASC');  ?>
		
		<?php while (have_posts()) : the_post(); ?>

			<div class="scroll-big">
		<div class="scroll-pane">
				
			<?php the_content(''); ?>

					<?php //the_excerpt() ?>
				</div>
				</div>
				</td>
<td width=130 align="right">
<div style="margin-right: 0px; margin-top: 15px">
<!--<div style="margin-right: -15px; margin-top: 0px">-->
<div class="ngg-galleryoverview">
	<!-- Thumbnails -->
		
	<div class="ngg-gallery-thumbnail-box"  >
		<div class="ngg-gallery-thumbnail" >
 <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
 <?php 
				$ngg = get_post_custom_values('ngg');
	$ngg = $ngg[0];
	if ($ngg > 0)
	{
	$name = $wpdb->get_row("SELECT CONCAT( wp_ngg_gallery.path, '/', wp_ngg_pictures.filename ),wp_ngg_gallery.title,wp_ngg_pictures.imagedate FROM wp_ngg_gallery, wp_ngg_pictures WHERE wp_ngg_gallery.gid = '".$ngg."' and wp_ngg_gallery.gid = wp_ngg_pictures.galleryid and wp_ngg_pictures.exclude = 0 ORDER BY wp_ngg_pictures.sortorder DESC", ARRAY_N);
	//$i = 0;
	//echo $ngg;
	//echo $name[0].$name[1].$name[2].$name[3].$name[4].$name[5].$name[6];
	/*while ($row = mysql_fetch_array($name)) {
		echo "<li><a href='http://localhost/modeinua/$row['$i']' title=' '><img src='http://localhost/modeinua/$name[$i]' width='120' height='75' alt='' /></a></li>";
		$i ++;
	}*/
	
?>
<!--<img src="<?php echo "/modeinua/".$name[0]; ?>"  border=0 vspace=10 />-->
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
		<?php 
		 }  else if (is_category(8)) {
		 if (have_posts()) : 
		 query_posts($query_string . '&p=165');
		 while (have_posts()) : the_post(); ?>	

		<div class="post1" id="post-<?php the_ID(); ?>">
			<div class="scroll-pane">
			
				<?php the_content(''); ?>

			</div>
		</div>
	<?php	 
	endwhile; endif;
	} 
		 
		 else {
		if (have_posts()) : 
			query_posts($query_string . '&posts_per_page=5');?>
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
		<div style="float: left; width: 830px;"> 
		<?php $j = 1; 
				while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?>>
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

				<!--<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Написано в рубрике <?php the_category(', ') ?> | <?php edit_post_link('Редактировать', '', ' | '); ?>  <?php comments_popup_link('Нет комментариев &#187;', '1 комментарий &#187;', 'Комментариев: % &#187;'); ?></p>-->

			</div>

		<?php $j ++; endwhile; ?>
		</div>
		<div class="navigation">
			<?	if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
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

	endif; }
?>

	</div>
</div>
<?php //get_sidebar(); ?>

<?php get_footer(); ?>
