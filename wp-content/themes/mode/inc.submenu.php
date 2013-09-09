<?php
 if (!is_front_page()) {
$category = get_the_category();
	if (!empty($category[1]->cat_ID)) {
			$shparent = $category[1]->category_parent;
			$category = $category[1];
		} else {
			$shparent = $category[0]->category_parent;
			$category = $category[0];
		}
if (is_category(8)) $shparent = 8;
//echo "qqqqqqqqqqq".$shparent."qqq".$cat."q";
if ($cat == 1)	$shparent = 1;
}
//if ($shparent) {
?>
<a href='<?php echo  get_category_link($shparent); ?>' style='text-decoration:none;font-size:16px !important;font-weight:bold;display:block;padding:10px 0px 0px 15px; color: #ffffff;'><?php echo get_cat_name($shparent); ?></a>
<?php //} ?>
<table id='mainmenu' cellspacing='5' cellpadding='0' style="float: left; padding: 15px 0 0px 0px;">

 <?php 

 //global $shparent;
//if (in_category(1) || is_category(1)) { $parent = 1; }
 //else if (in_category(9) || is_category(9)) { $parent = 9; }
 //else $parent = 0;
 //if ($cat == 6) $shparent = 6;

// echo $shparent;
  /*
 $myposts = get_posts("numberposts=10&offset=0&category=$cat");
foreach($myposts as $post) :
   setup_postdata($post);
?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach;
 */
  //if ($cat == 7) $shparent = 7; 
 //if ($shparent == 3) $shparent .="&include=25,26,27,28,29,30,31,32,39"; 
$categories =  get_categories("hide_empty=1&orderby=order&child_of=$shparent"); 
 $j == 1;
 $count_sub = count($categories);
 //echo $count_sub;
 if ($shparent != 0 ) {
foreach ($categories as $cat1) {
?>
 <?php 
 $cat1->cat_ID;
 $cat_link = get_category_link( $cat1->cat_ID );
if ($cat == $cat1->cat_ID || in_category($cat1->cat_ID)) {
	$active="class='active2'";
	$script = "";
} else {
    $active="class='active'";
	//$script = "onMouseOver=focus_submenu(\"submenushka".$cat1->cat_ID."\"); onMouseOut=out_submenu(\"submenushka".$cat1->cat_ID."\");";
}
?>
 <tr><td <?php echo $active; ?> class='submenushka' id='submenushka<?php echo $cat1->cat_ID; ?>' <?=$script; ?> class="submenushka" <?php echo $active; ?> style='padding:0px 10px 0px 10px;'><a href='<?php echo  $cat_link; ?>' style='text-decoration:none;font-size:14px !important;font-weight:normal;display:block;padding:2px 0px 5px 10px; color: #ffffff;'><?php echo $cat1->cat_name; ?></a></td></tr>
<?php
}
}
?>

</table>
<?php  	//echo $cat;
		//if (($shparent == 13) || ($cat == 8) || ($shparent == 0)){} else {
 //echo '<div style=" border-bottom: 1px solid #59483a; width: 950px; float: left; margin: -5px 0 0 10px;;"> echo $shparent&nbsp;</div>'; 
//} ?>
<script>
	function focus_submenu(id)
	{
		document.getElementById(id).className='active2';
	}
	function out_submenu(id)
	{
		document.getElementById(id).className='active';
	}
</script>
