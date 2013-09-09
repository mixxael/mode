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

<?php //} ?>


 <?php 

 //global $shparent;
//if (in_category(1) || is_category(1)) { $parent = 1; }
 //else if (in_category(9) || is_category(9)) { $parent = 9; }
 //else $parent = 0;
 //if ($cat == 6) $shparent = 6;

// echo $shparent;
if(in_category(20) || in_category(21) || in_category(22) || in_category(36)){
	
	$current_id = get_the_ID();
	$myposts = get_posts("numberposts=10&offset=0&category={$category->cat_ID}");
	if(is_category(20) || is_category(21) || is_category(22) || is_category(36)){
		$cat = get_query_var('cat');
		print "<a href='".get_category_link($cat)."' style='text-decoration:none;font-size:16px !important;font-weight:bold;display:block;padding:0px 0px 0px 15px; color: #000;'>".get_cat_name($cat)."</a>";
	}
	$post_categories = wp_get_post_categories( $current_id );
	$cats = array();
	
	foreach($post_categories as $c){
		$cat = get_category( $c );
		if(in_array($cat->cat_ID, array(20,21,22,36)))
			print "<a href='".get_category_link($cat->cat_ID)."' style='text-decoration:none;font-size:16px !important;font-weight:bold;display:block;padding:0px 0px 0px 15px; color: #000;'>".get_cat_name($cat->cat_ID)."</a>";
		//$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
		//print_r($cat);
		
	} 
	//print_r($cats)
	?>
	
	<?php
	print "<table id='mainmenu' cellspacing='5' cellpadding='0' style='float: left; padding: 15px 0 0px 0px;'>";
	//print "<ul class='left_menu'>";
	foreach($myposts as $post) :
		setup_postdata($post);
		//print_r($post);
		if($current_id == $post->ID) 
			$active = " active2";
		else	
			$active = " active";
		?>
		<!--<li class="post-<?php print $post->ID; if($current_id == $post->ID) print " active"?> "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>-->
		<tr><td <?php echo $active; ?> class='submenushka post-<?php print $post->ID; print $active ?> ' id='submenushka<?php print $post->ID; ?>' class="submenushka" <?php echo $active; ?> style='padding:0px 10px 0px 10px;'><a href='<?php the_permalink(); ?>' style='text-decoration:none;font-size:14px !important;font-weight:normal;display:block;padding:2px 0px 5px 10px; color: #ffffff;'><?php the_title(); ?></a></td></tr>
	<?php endforeach;
	print "</table>";
	
}
else {
?>
<a href='<?php echo  get_category_link($shparent); ?>' style='text-decoration:none;font-size:16px !important;font-weight:bold;display:block;padding:0px 0px 0px 15px; color: #000;'><?php echo get_cat_name($shparent); ?></a>
<table id='mainmenu' cellspacing='5' cellpadding='0' style="float: left; padding: 15px 0 0px 0px;">
<?php
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
<?php  	
}
	//echo $cat;
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
