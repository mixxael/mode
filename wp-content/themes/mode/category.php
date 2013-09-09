<?php
/**
 * @package WordPress
 * @subpackage Winter-fur_Theme
 */

get_header();
echo 	'<div id="content" class="narrowcolumn">';
get_sidebar('left');
$category = get_the_category();
//print $category->category_parent;
//print_r($category);
$i = 1;
//категория публикации
if (is_category(1)) {
	if (have_posts()) : 
		query_posts($query_string . '&p=178'); ?>
		<div class="scroll-big">
			<div class="without-scroll-pane">
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
					</tr>
				</table>
			</div>
		</div>
	<?php	endif; ?>
</div>
<?php }  
//категория Сотрудничество	
else if (is_category(37)) 	{
	if (have_posts()) :  ?>
		<div class="scroll-big">
			<div class="without-scroll-pane">
				<table width="100%" style="float: left;">
				<?php while (have_posts()) : the_post(); ?>
					<tr><td valign="top">
					<div class="news post-178">
						<strong> <?php the_title(); ?></strong><br /><br />
						<?php the_content() ?>
					</div>
					</td>
				<?php
					echo "</tr>";
					endwhile; ?>
					</tr>
				</table>
			</div>
		</div>
	<?php endif; ?>
	</div>
<?php }
//подрубрики новостей
else if (is_category(28) || is_category(29) || is_category(30) || is_category(31) || is_category(32) || is_category(33)){		
	if (have_posts()) : 
		//query_posts($query_string . '&posts_per_page=10');
		?>
		<div class="scroll-big">
			<div class="without-scroll-pane">
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
					</tr>
				</table>
				<div class="navigation">
					<?	if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
				</div>
			</div>
		</div>
	<?php	endif; ?>
	</div>
<?php }
// подрубрики колекций(кухни, шкафы-купе, гардеробные, перегородки, )
else if (is_category(20) || is_category(21) || is_category(22) || is_category(23) || is_category(36)){
	?>
	<div class="post1">	
		<div class="gallery_wrap">
			<?php
			$i = 1;
			if (have_posts()) : 
			// 165			
				query_posts($query_string . '&posts_per_page=1&order=ASC');  ?>
				<?php while (have_posts()) : the_post();
					$ngg = get_post_custom_values('ngg');
					$ngg = $ngg[0];
					if ($ngg > 0){
						echo nggShowGallery($ngg);
					} else {
						$ngg = 2;
						echo nggShowGallery($ngg);
					}
					$i++;
				endwhile;
			endif; ?>
		</div>
   </div>		
<?php 
}
// колекции
else if (is_category(8)) {
	if (have_posts()) : 
		query_posts($query_string . '&p=165');
		while (have_posts()) : the_post(); ?>
			<div class="post1" id="post-<?php the_ID(); ?>">
				<div class="without-scroll-pane">
				<?php the_content(''); ?>
				</div>
			</div>
		<?php
		endwhile; 
	endif;
} else {
	foreach((get_the_category()) as $category) {   
		//нестандартные рубрики
		if($category->category_parent == 51){
			if (have_posts()) : 
				query_posts($query_string . '&posts_per_page=20');?>
				<div class="post1">
					<div class="without-scroll-pane">
					<?php while (have_posts()) : the_post(); ?>
						<div class="notstandart" <?php //post_class() ?> >
						<?php //echo wp_get_attachment_image( $post->ID, array(20,20), true); ?> 
						<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {
								print '<a href="'.get_permalink($post->ID).'" rel="bookmark" title="Постоянная ссылка на '. get_the_title().'">';
								the_post_thumbnail(array(160,160), array("class" => "alignleft post_thumbnail")); 
								print '</a>';
							} ?> 
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</div>
					<?php endwhile; ?>
					</div>
					<?php	$page = get_page_by_title( $category->name, OBJECT,  'post' );
					//print_r($page);
					if($page->post_status == 'publish' && !empty($page->post_content)){
						//print_r($page);
						print "<div class='gallery_wrap back_white'><div class='body'>";
						print apply_filters('the_content', get_post_field('post_content', $page->ID));
						print "</div></div>";
						//wp_list_pages( 'exclude=' . $page->ID );
						//$content_post = get_post($my_postid);
						//$content = $content_post->post_content;
						//$content = apply_filters('the_content', $content);
						//$content = str_replace(']]>', ']]&gt;', $content);
						//echo $content;
					}
					?>
				</div>
				<div class="navigation">
					<?	if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
				</div>
			<?php
			endif;

			
		} else {
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
					} else if (is_category(7)) {
						?> <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2> <? 
					} 
					if (is_category(13)) { ?>
						<div class="entry" style="margin-left: 10px;">
						<?php the_content() ;
					} else  {
						?> <div class="entry"> <?php the_excerpt(); 
					} ?>
					</div>
					<!--<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Написано в рубрике <?php the_category(', ') ?> | <?php edit_post_link('Редактировать', '', ' | '); ?>  <?php comments_popup_link('Нет комментариев &#187;', '1 комментарий &#187;', 'Комментариев: % &#187;'); ?></p>-->

					</div>
				<?php $j ++; 
				endwhile; ?>
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
			endif; 
		}
	}  
	
}
?>
</div>
<?php //get_sidebar(); ?>

<?php get_footer(); ?>
