<table id='mainmenu' cellspacing='0' cellpadding='0' border='0' style='text-align: center; margin:3px 0px 0 112px; padding-left: 0px; ' width='833' height='27'>
<tr>
<td  class='menushka' id='menushka3'><a href='/about/' onMouseOver=focus_menu("menushka3"); onMouseOut=out_menu("menushka3"); class='menushka'>О НАС</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0'></td>
<td  class='menushka' id='menushka3'><a href='/slovo-dizajnera/' onMouseOver=focus_menu("menushka3"); onMouseOut=out_menu("menushka3"); class='menushka'>СЛОВО ДИЗАЙНЕРА</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0'></td>
<td  class='menushka' id='menushka3'><a href='/category/kollekcii/kuxni/' onMouseOver=focus_menu("menushka3"); onMouseOut=out_menu("menushka3"); class='menushka' title="кухни на заказ">КУХНИ НА ЗАКАЗ</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0' alt="кухни на заказ"></td>
<td  class='menushka' id='menushka3'><a href='/category/kollekcii/shkafy-kupe/' onMouseOver=focus_menu("menushka3"); onMouseOut=out_menu("menushka3"); class='menushka' title="шкафы купе на заказ">ШКАФЫ-КУПЕ НА ЗАКАЗ</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0' alt="шкафы купе на заказ"></td>
<td  class='menushka' id='menushka3'><a href='/category/kollekcii/garderobnye/' onMouseOver=focus_menu("menushka3"); onMouseOut=out_menu("menushka3"); class='menushka' >ГАРДЕРОБНЫЕ</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0'></td>
<!--<td  class='menushka' id='menushka3'><a href='/' onMouseOver=focus_menu("menushka3"); onMouseOut=out_menu("menushka3"); class='menushka'>СТИЛИ</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0'></td> -->
<td  class='menushka' id='menushka3'><a href='/category/novosti/' onMouseOver=focus_menu("menushka3"); onMouseOut=out_menu("menushka3"); class='menushka'>ПУБЛИКАЦИИ</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0'></td>
<td  class='menushka' id='menushka3'><a href='/sotrudnichestvo/' onMouseOver=focus_menu("menushka3"); onMouseOut=out_menu("menushka3"); class='menushka'>СОТРУДНИЧЕСТВО</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0'></td>
<td  class='menushka' id='menushka3'><a href='/kontakty/' onMouseOver=focus_menu("menushka3"); onMouseOut=out_menu("menushka3"); class='menushka'>КОНТАКТЫ</a></td>

	<?php

/*
$categories =  get_categories('include=1,13,7,12,8&hide_empty=0&orderby=order');
$i = 1;

	if (is_home()) echo "<td  class='active' class='menushka' id='menushka3'><a href='/' onMouseOver=focus_menu(\"menushka3\"); onMouseOut=out_menu(\"menushka3\"); class='menushka'>О нас</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0'></td>";
	else echo "<td  class='menushka' id='menushka3'><a href='/' onMouseOver=focus_menu(\"menushka3\"); onMouseOut=out_menu(\"menushka3\"); class='menushka'>О нас</a></td><td width='2px' style='padding:0px;'><img src='/wp-content/themes/mode/images/menu_border.jpg' border='0'></td>";
foreach ($categories as $cat1) {
?>
 <?php
 $cat1->cat_ID;
 $cat_link = get_category_link( $cat1->cat_ID );
 ?>
<?php
if (!is_home()) {
$category = get_the_category();
	if (!empty($category[1]->cat_ID)) {
			$shparent = $category[1]->category_parent;
			$category = $category[1];
		} else {
			$shparent = $category[0]->category_parent;
			$category = $category[0];
		}

//echo "qqqqqqqqqqq".$shparent."qqq".$cat."q";
}

if ($cat == $cat1->cat_ID || $cat1->cat_ID == $shparent ) {
	$active="class='active'";
	$script = "";
	//echo $shparent."sdfgsdag".$cat;
} else {
    $active="";
	//echo $shparent."sdfgsdag".$cat;
	//$script = "onMouseOver=focus_menu(\"menushka".$col."\"); onMouseOut=out_menu(\"menushka".$col."\");";18110d
}

?>

<!--
<td  <?php echo $active; ?> class='menushka' id='menushka<?php echo $cat1->cat_ID; ?>'><a href='<?php echo  $cat_link; ?>' onMouseOver=focus_menu("menushka<?php echo $cat1->cat_ID; ?>"); onMouseOut=out_menu("menushka<?php echo  $cat1->cat_ID; ?>"); class='menushka'><?php echo $cat1->cat_name; ?></a></td><td width='2px' style='padding:0px;'><?php if ($i != 5) echo "<img src='/wp-content/themes/mode/images/menu_border.jpg' border='0'>"; ?></td>
-->
<?php
$i++;
}
*/
?>
</tr>
</table>
<script>
	function focus_menu(qid)
	{
		document.getElementById(id).style.background='#18110d';
	}
	function out_menu(iqd)
	{
		document.getElementById(id).style.background='none';
	}
</script>