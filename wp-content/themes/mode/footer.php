<?php
/**
 * @package WordPress
 * @subpackage Winter-fur_Theme
 */
?>
<?php if (is_front_page()) { /* ?>

<div class="horizontal_tabs">
	<?php query_posts('cat=35&showposts=4'); while (have_posts()) : the_post(); ?>
	<div class="horizontal_post clearleft">
		<?php $index_thumbnail = get_post_meta($post->ID, 'big_img', true);
		if ($index_thumbnail) ?>
			<div  ><a href="<?php the_permalink() ?>"><img src='<?php echo $index_thumbnail ?>' class='alignleft' /></a></div>
		<div class="post_content"><p><?php 
		print $content = mb_substr(get_the_content(), 0, 1100, 'UTF-8'); 
		//print $content = get_the_excerpt(); 
		?></p></div>
	</div>
	<?php endwhile; wp_reset_query(); ?>
</div>
<?php */ ?>
<div class="vertical_tabs">
	<?php query_posts('cat=34&showposts=32'); while (have_posts()) : the_post(); ?>
	<div class="vertical_post">
		<div class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></div>
		<div class="post_content"><p><?php print $content = get_the_excerpt(); ?></p></div>
	</div>
	<?php endwhile; wp_reset_query(); ?>
</div>
<?php } ?>

 <div id="footer"  >
	<table width="950">
	<tr>
	<td><p>

		<b>кухни на заказ</b> |
		<b>шкафы-купе на заказ</b> |
		<b>гардеробные на заказ</b> |
		<b>межкомнатные перегородки</b>.  Copyright © MODE. Все права защищены.
		<!--<a href="<?php //bloginfo('rss2_url'); ?>">Записи (RSS)</a>
		и <a href="<?php //bloginfo('comments_rss2_url'); ?>">Комментарии (RSS)</a>.-->
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
		</p>
		</td><td align="right">
 	 <!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t22.5;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</td></tr>
</table>

</div>
</div>


<!-- Великолепная разработка Михаила Цыганка (Michael Tsyganok) - http://tsyganok.m@gmail.com/ -->
		<?php wp_footer(); ?>
<?php //if (!is_front_page()) {echo '</div>';} ?>
</div></div>
<!--
<?php
if (!isset($_POST['screen'])) {
?>
<form action="" method="post">
<script language="javascript">
document.write ('<input name="screen" type="hidden" value="'+ screen.height + '"></form>');
document.forms[0].submit();
</script>
<?php
}
if (isset($_POST['screen'])) echo "<!-".$_POST['screen']."->";
if ($_POST['screen'] <= 720) {
	//$banner = "/_files/header_smaller2.swf";
	$margin_top = 58;
 }
else if (($_POST['screen'] > 720) && ($_POST['screen'] <= 768)) {
	//$banner = "/_files/header_smaller2.swf";
	$margin_top = 58;
 }
else if (($_POST['screen'] > 768) && ($_POST['screen'] <= 864)) {
	//$banner = "/_files/header_smaller2.swf";
	$margin_top = 5;
 }
 else if (($_POST['screen'] > 864) && ($_POST['screen'] < 1024)) {
	//$banner = "/_files/header_smaller2.swf";
	$margin_top = 0;
 }else if ($_POST['screen'] >= 1024) {
	//$banner = "/_files/header_smaller2.swf";
	$margin_top = "-5";
 }
else {
	//$banner = "/_files/header_big.swf";
	$margin_top = "-12";
	}
?>
<style type="text/css">
#shWrap {
	margin-top: <?=$margin_top?>px !important;
	}
</style>-->
</body>
</html>

