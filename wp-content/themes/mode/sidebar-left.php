<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	<?php /* if (in_category(8)) { //http://www.fprod.net/fgallery/galleries/demo/paris-1/#
		$i = 1;
		if (have_posts()) : 
				query_posts($query_string . '&cat=8&posts_per_page=8&order=ASC'); ?>
			
		<?php //single_cat_title(); ?>
		<?php while (have_posts()) : the_post(); ?>
	
				<div class="gallery">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на <?php the_title_attribute(); ?>"><?php the_title(); ?></a><br />
				</div>
		<?php endwhile; endif; }

*/		
if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();
?>
<div style="float: left; width: 235px; margin: 0px 0 0 0;">
		<?php if (!is_front_page()) { 
				require "inc.submenu.php"; 
					// Traverse and locate the parent structure on the main menu
        //// 2n = slow search
        //$menuItems = wp_get_nav_menu_items('glavnoe-menyu');
        //foreach($menuItems as $menuItem) {
            //if($menuItem->object_id == $post->ID && $menuItem->object == $post->post_type) {
                //$parentMenuId = $menuItem->menu_item_parent;
                //break;
            //}
        //}
        //foreach($menuItems as $menuItem) {
            //if($menuItem->ID == $parentMenuId && $menuItem->object == 'page') {
                //$pageId = $menuItem->object_id;
                //$menuId = $menuItem->ID;
                //break;
            //}
        //}

        //// Link back up to the page
          //$content = '<a href="' . get_page_link($pageId) . '">' . get_the_title($pageId) . '</a>';
          //if($pageId == 506){
			//wp_nav_menu(array(
					//'menu'    => 'glavnoe-menyu',
					//'submenu' => 'кухни на заказ',
					//));  
		  //}
			} ?>
<!--<ul>
	<?php 
	/*if (in_category(1) || is_category(1)) { $parent = 1; }
 else if (in_category(9) || is_category(9)) { $parent = 9; }
 else $parent = 0;
	wp_list_categories('show_count=0&title_li=&child_of='.$parent); 
*/
	?>
</ul>-->
</div>
