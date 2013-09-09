<?php
/**
 * @package WordPress
 * @subpackage Modeinua Theme
 */

get_header(); ?>
		<?php 
	if (is_front_page()) { ?>
	<div id="content" class="narrowcolumn">
	<?php } else {?>
	<div id="content" class="narrowcolumn">
		<?php } ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<?php if (!is_front_page()) { ?><h2><?php the_title(); ?></h2><?php } ?>
			<div class="entry">
				<table><tr>
				<td valign="top">
					<?php the_content('Читать полностью &raquo;'); 
					if (is_page(67)) {
					
					if ($_POST) {
	//if ($_POST[firstname]!="" && $_POST[lastname]!=""  && $_POST[phone]!="" && $_POST[email]!="" && $_POST[msgtext]!="" && $_POST[capcha]==$_POST[sum]) {
	if ( $_POST[securecode]==$_POST[sum]) {

		//$toemail = "mixxael@ukr.net";
		$toemail = "info@mode.ua";

		$message = "
		От: <strong> $_POST[Title] $_POST[Name]</strong><br>
		Телефон: <strong>$_POST[phone]</strong><br>
		E-mail: <strong>$_POST[email]</strong><br>
		<p align=justify><strong>$_POST[Remarks]</strong></p>";
		mail($toemail,"mode.ua",$message,"From:  <".$_POST[email].">\nContent-type: text/html; charset=utf-8\nContent-Transfer-Encoding: 8bit\n") or die("error sending message");
?>
				<p align="justify" style="margin: 3 0 3 0;">  <font size="2px" ><strong>Спасибо, Ваше письмо очень важно для нас!</strong> <br><br>Сообщение будет отправлено администратору сайта, Вы обязательно получите ответ!</font>
	<? } else { ?>
				<p align="justify" style="margin: 3 0 3 0;"> <font size="2px" > <strong>Вы неправильно заполнили поля!</strong> <a href="javascript:history.back();"><<<Назад</a></font>
	<? } ?>

<? } else { ?>
<script language="JavaScript1.2" type="text/javascript">

function text_kontrol()  
	{
		if (document.contactform.name.value == '' || document.contactform.Name.value.length < 1 || document.contactform.Name.value.length > 50) { alert('Пожалуйста, проверьте ваше имя!'); document.contactform.Name.focus(); return false }
		if (document.contactform.phone.value == '' || document.contactform.phone.value.length < 1 || document.contactform.phone.value.length < 6) { alert('Пожалуйста, проверьте ваш телефон!'); document.contactform.phone.focus(); return false }
		if (document.contactform.email.value == '' || document.contactform.email.value.indexOf('@') == -1 || document.contactform.email.value.indexOf('.') == -1) { alert('Пожалуйста, проверьте адрес e-mail!'); document.contactform.email.focus(); return false }
			else
				{
					document.contactform.submit()
				}
	}
</script>
	<form action="" method="post" id="form1" name="contactform" >
	<!--<input type=hidden name=FBURL  value="contact.asp?lang=&propertyid=">
	<input type=hidden name=FBSUBJECT  value="Contact - from your web page">
	<input type=hidden name=FBMAIL value="info@newhomeinturkey.com">-->
	<!--<body leftmargin=0 topmargin=0 ></body>-->

	<table style="border-collapse: collapse; border:2px solid #111111;" class="graybg" width="558">

		<tbody>
			<tr>
				<td class="etitle" colspan="2">&#1050;&#1086;&#1085;&#1090;&#1072;&#1082;&#1090;&#1085;&#1072;&#1103; &#1092;&#1086;&#1088;&#1084;&#1072;</td>
			</tr>
	<!--		<tr>
				<td align=right></td>
				<td width=350>Mr.<input type="radio" value="Mr." name="Title">Mrs.<input type="radio" value="Mrs." name="Title"></td></tr>
-->
			<tr>
				<td align="right">&#1048;&#1084;&#1103; : </td>
				<td width="350"><input style="width: 330px;height:20px;" name="Name" value="" size="20"/><font color="red">*</font></td></tr>
			<tr>
				<td align="right">&#1053;&#1086;&#1084;&#1077;&#1088; &#1090;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;&#1072; : </td>
				<td align="left" width="350"><input style="width: 330px;height:20px;font-size:8pt;font-family:verdana;" name="phone" value="" size="20"/><font color="red">*</font></td></tr>

			<tr>
				<td align="right">E-mail : </td>
				<td width="350"><input style="width: 330px;height:20px;font-size:8pt;font-family:verdana;" name="email" value="" size="20"/><font color="red">*</font></td></tr>
			
			<tr>
				<td align="right">&#1042;&#1072;&#1096;&#1077; &#1089;&#1086;&#1086;&#1073;&#1097;&#1077;&#1085;&#1080;&#1077; : </td>
				<td width="350">

				<textarea style="width: 330px; HEIGHT: 120px;font-size:10pt !important" name="Remarks" rows="1" cols="20"></textarea></td></tr>
			<tr>
				<td align="right">Сколько будет&nbsp; <?php mt_srand((double)microtime()*1000000);	$ad1 = mt_rand(1, 50); /*echo $ad1; */?>  <?php mt_srand((double)microtime()*1000000);
				$ad2 = mt_rand(1, 50);  
				$sum = $ad1 + $ad2; ?></td>
				<td align="left" width="350"><b><?=$ad1."+".$ad2?>  ?</b> <input type="hidden" name="verify" value="144" />
				<input type="hidden" name="sum" value="<?php echo $sum; ?>" />
				<input type="text" name="securecode" size="3" />&nbsp; </td>
			</tr>

			<tr>
				<td align="right" colspan="2" height="42" style="padding-right:135px;"> 
				<input style="width: 100px;font-size:8pt;font-family:verdana;" type="submit" value="&#1054;&#1090;&#1087;&#1088;&#1072;&#1074;&#1080;&#1090;&#1100;" onclick="return text_kontrol();" /> 
				  <input style="width: 100px;font-size:8pt;font-family:verdana;" type="reset" value="&#1054;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100;" /> <br />
				</td>
			</tr>
		</tbody>
	</table>
</form>
		
<?php }
					
					}
					
					?>
				</td>
				<td valign="top">
					<?php $index_thumbnail = get_post_meta($post->ID, 'big_img', true);
						if ($index_thumbnail) echo "<div  class='caption'><img src='$index_thumbnail' /></div>";?>
				</td></tr></table>
				<?php //the_content('<p class="serif">Читать полностью &raquo;</p>'); ?>

				<?php //wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php //edit_post_link('Редактировать.', '<p>', '</p>'); ?>
	
	<?php //comments_template(); ?>
	
	</div>
	
<?php //get_sidebar(); ?>

<?php get_footer(); ?>
