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
<?php }?>
<?php 
$post_id = get_post_custom_values('post_id');
if(!empty($post_id)){
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
}
?>
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

<?php /* ?>
<table>
<tr height="200"><td></td></tr>
	<tr>
    	<td width="300" valign="top"><a href="http://mode.ua/kak-vybrat-shkaf-kupe-na-zakaz/" title="шкафы купе на заказ"><h3>Как выбрать шкафы купе на заказ?</h3></a><br>
    	На первый взгляд может показаться, что все <b>шкафы-купе на заказ</b> одинаковые, однако
это большое заблуждение.

    	</td>
    	<td width="300" valign="top"><a href="http://mode.ua/shkafy-kupe-na-zakaz-glavnoe-funkcionalnost/" title="шкафы купе на заказ"><h3>Шкафы-купе на заказ: главное функциональность</h3></a><br>
    		<b>Шкафы-купе на заказ</b> – самый популярный предмет мебели в квартире, доме
современного человека. Это модная, красивая, удобная и вместительная
деталь интерьера.

    	</td>
    	<td width="300" valign="top"><a href="http://mode.ua/kuxnya-mechty-%E2%80%93-kuxni-na-zakaz-ot-td-mode/" title="кухни на заказ"><h3>Кухня мечты – кухни на заказ от ТД MODE</h3></a><br>
    		Если вы планируете обзавестись новой мебелью для <b>кухни на заказ</b>, у вас всего
один путь – сделать ее по индивидуальному заказу. Только так вы
сможете максимально точно приблизиться к кухне, о которой вы мечтали
и которая будет радовать вас долгие годы.

    	</td>
	</tr>
	<tr>
    	<td width="300" valign="top"><h3>Кухни на заказ - как правильно выбрать</h3><br>
        Выбирая <b>кухни на заказ</b> очень важно помнить что это зона повышенной влажности, поэтому и материалы для изготовления <b>кухни на заказ</b>
        надо выбирать особенно тщательно...

    	</td>
    	<td width="300" valign="top"><h3>Выбираем шкафы-купе на заказ</h3><br>
        Всем давно известно, что <b>шкафы купе на заказ</b> наиболее точно отражают ваши желания. Но, перед тем как выбрать <b>шкафы купе на заказ</b> необходимо проконсультироваться с дизайнером и сделать 3D модель вашей будущей комнаты...

    	</td>
    	<td width="300" valign="top"><h3>Чем кухни на заказ лучше готовых решений?</h3><br>
        Преимущества <b>кухни на заказ</b> перед готовыми решениями очевидны. Это и точное сочетания цвета с интерьером вашей комныты и нужный вам функционал. <b>Кухни на заказ</b> хороши еще и тем, что вы можете самомстоятельно подобрать материа из которого будет сделана ваша будущая кухня...

    	</td>
	</tr>

		<tr>
    	<td width="300" valign="top"><h3>Выбираем кухни на заказ</h3><br>
        У всех людей возникает вопрос как не ошибиться выбирая <b>кухни на заказ</b>. Для этого необходимо перед принятием окончательнго решения обязательно посоветоваться с опытным дизайнером, который сможет подобрать <b>кухни на заказ</b>
        на Ваш вкус ...

    	</td>
    	<td width="300" valign="top"><h3>Почему шкафы-купе на заказ</h3><br>
        Конечно же <b>шкафы купе на заказ</b> имеют огромное количество преимуществ перед готовыми решениями. Но, сегодня мы остановимся на практической стороне вопроса. Только <b>шкафы купе на заказ</b> могут функционально удовлетворить все ваши пожелания...

    	</td>
    	<td width="300" valign="top"><h3>Качественные кухни на заказ </h3><br>
        Выбирая дешевые <b>кухни на заказ</b> следует помнить, что от цены зависит качество материалов, а значит и долговечность вашей новой кухни. Поэтому перед заказом <b>Кухни на заказ</b> хорошенько подумайте, стоит ли эта экономия ...

    	</td>
	</tr>
</table>
   <br>

<?php */ ?>



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

