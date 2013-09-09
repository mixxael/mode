<?php
/**
 * @package WordPress
 * @subpackage Winter-fur_Theme
 */
/*
Template Name: Question
*/
get_header(); ?>

	<div id="content" class="narrowcolumn">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<table style="margin-top: 10px;"><tr>
				<td>
					<?php $index_thumbnail = get_post_meta($post->ID, 'big_img', true);
						if ($index_thumbnail) echo "<div  class='caption'><img src='$index_thumbnail' /></div>";?>
				</td>
				<td valign="top">
					<?php the_content('Читать полностью &raquo;'); ?>
				<?php	if ($_POST) {
	if ($_POST[lastname]!="" && $_POST[email]!="" && $_POST[msgtext]!="" && $_POST[capcha]==$_POST[sum]) {

		$toemail = "info@winter-fur.com.ua,tsyganok.m@gmail.com";

		$message = "
		От: <strong>$_POST[lastname]</strong><br>

		E-mail: <strong>$_POST[email]</strong><br><br>
		<p align=justify><strong>$_POST[msgtext]</strong></p>";
		mail($toemail,"Уведомление с сайта winter-fur.com",$message,"From: ".$_POST[lastname]." <".$_POST[email].">\nContent-type: text/html; charset=utf-8\nContent-Transfer-Encoding: 8bit\n") or die("error sending message");
?>
				<p align="justify" style="margin: 3 0 3 0;">  <font size="2px" ><strong>Спасибо, Ваше письмо очень важно для нас!</strong> <br><br>Сообщение будет отправлено администратору сайта, Вы обязательно получите ответ!</font>
	<? } else { ?>
				<p align="justify" style="margin: 3 0 3 0;"> <font size="2px" > <strong>Вы заполнили не все поля!</strong> <br /><a href="javascript:history.back();"><input class="send" value="Назад" type="submit" /></a></font>
	<? } ?>

<? } else { ?>
				<form action="" method="post">
		<table border="0" cellspacing="0" cellpadding="0" width="99%">
			
			<tr>
				<td class="text" style="padding: 3 3 3 0;" width="30%"><font size="2px" >ФИО:</font>  <font size="2px"color="#7A1215"><strong>*</strong></font></td>
				<td class="text" style="padding: 3 3 3 0;"><input type="text" name="lastname" class="inputs" size="30" style="width: 60%;"><br /></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			
			<tr>
				<td class="text" style="padding: 3 3 3 0;"><font size="2px" >e-mail: </font><font size="2px" color="#7A1215"><strong>*</strong></font></td>
				<td class="text" style="padding: 3 3 3 0;"><input type="text" name="email" class="inputs" size="30" style="width: 60%;" ></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			
			<tr>
				<td width="35%" class="text" style="padding: 3 3 3 0;"><font size="2px" >
				Сколько будет <?php mt_srand((double)microtime()*1000000);	$ad1 = mt_rand(1, 50); echo $ad1;?> + <?php mt_srand((double)microtime()*1000000);
				$ad2 = mt_rand(1, 50); echo $ad2; 
				$sum = $ad1 + $ad2; ?> ?</font>
				<input type="hidden" name="sum" value="<?php echo $sum; ?>">
				</td>
				<td class="text" style="padding: 3 3 3 0;"><input type="text" name="capcha" class="inputs" size="30" style="width: 60%;" ></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			
			<tr>
				<td class="text" style="padding: 3 3 3 0;"><font size="2px" >Текст сообщения</font> <font size="2px" color="#7A1215"><strong>*</strong></font></td>
				<td class="text" style="padding: 3 3 3 0;"><textarea name="msgtext" class="inputs" cols="60" rows="10" style="width: 100%;"></textarea></td>
			</tr>
			<tr><td height="10"></td></tr>
			
			
			
			
			
			<tr>
				<td></td>
				<td class="text" style="padding: 3 3 3 0;">
				<input class="send" value="Отправить" type="submit" />
          </td>
			</tr>
		</table>
<? } ?>
</form>
				</td></tr></table>
				

			</div>
			
		</div>
		<img src="/winter-fur/wp-content/uploads/banner.jpg" class="banner" style="float: right; margin-top: 28px;" />
		<?php endwhile; endif; ?>
	<?php //edit_post_link('Редактировать.', '<p>', '</p>'); ?>
	
	<?php //comments_template(); ?>
	
	</div>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
