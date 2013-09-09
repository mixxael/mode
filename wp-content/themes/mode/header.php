<?php
/**
 * @package WordPress
 * @subpackage Mode_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="Author" content="Mikhail Tsyganok, tsyganok.m@gmail.com" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<!--[if IE 5]><link rel="stylesheet" media="screen" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styleie567.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" media="screen" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styleie567.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" media="screen" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styleie567.css" /><![endif]-->
<!--[if IE]><link rel="stylesheet" media="screen" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styleie.css" /><![endif]-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--  jQuery library -->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jcarousel/lib/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.tools.min.js"></script>
<!-- gallery-->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/js_work.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.lightbox-0.5.css" />
<!-- end gallery-->


<!--  jCarousel library -->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jcarousel/lib/jquery.jcarousel.min.js"></script>
<!--  jCarousel skin stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/jcarousel/skin/skin.css" />
<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 1
    });
});

</script>

<!-- scroll pane-->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jScrollPane.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/new_carousel.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/jScrollPane.css" />
<script type="text/javascript">
			$(function()
			{
				$('.scroll-pane').jScrollPane({showArrows:false, scrollbarWidth:6, dragMaxHeight:400});
			});
		</script>

<!-- Параметр showArrows отвечает за отображение кнопок прокрутки, scrollbarWidth отвечает за ширину полосы, а dragMaxHeight за максимальную высоту перетаскиваемой панели.$('.scroll-pane').jScrollPane({showArrows:true,scrollbarWidth:6,dragMaxHeight:150});-->
<!-- end scroll pane-->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div style="position: relative; height: 1px; display: block;">
<div style="margin: 0 auto;	position: relative;">
<?php //if (!is_front_page()) {echo '<div class="fon">&nbsp;</div>';} ?>
<div id="page">
	<div class="fixed">
		<div class="logo"><a href="/" title="кухни на заказ, шкафы купе на заказ"><img  src="/wp-content/themes/mode/images/logo.png" alt="шкафы купе на заказ, кухни на заказ" style="margin-left: -10px; margin-top:10px;" /></a></div>
		<div class="description"><?php bloginfo('description'); ?></div>
		<?php /*if (is_front_page()) { ?> <a href="/slovo-dizajnera/" title="Войти на сайт"><img  align="right" valign="bottom" src="/wp-content/themes/mode/images/entry.png"  class="enter" /> </a><?php }
		*/ ?>
		<div id="header">

			<?php //wp_list_categories('title_li='); ?>
			<?php //if (!is_front_page()) {
						require "inc.menu.php";
					//} ?>
		</div>
	</div>
		<?php /*
	if (!is_front_page()) {
		if (is_single()) echo '<div id="content" class="narrowcolumn">';//echo '<div id="content" class="widecolumn">';
				else echo '<div id="content" class="narrowcolumn">';
		}*/ ?>

		<?php	//if (!is_category(13)) require "inc.submenu.php"; ?>
<!--

<hr />-->
