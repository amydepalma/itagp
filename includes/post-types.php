<?php
/**
 * Create post types
 */
add_action('init', function () {
	$icon_item = file_get_contents( ITAGP_PATH . 'assets/icon-receipt.svg' );
  $icon_recipe = file_get_contents( ITAGP_PATH . 'assets/icon-utensils.svg' );

	register_post_type('itagp-item',
    array(
      'labels' => array(
        'name' => __('Items'),
        'singular_name' => __('Item'),
        'add_new' => __('Add Item'),
        'add_new_item' => __('Add New Item'),
        'edit' => __('Edit'),
        'edit_item' => __('Edit Item'),
        'view' => __('View'),
        'view_item' => __('View Item'),
        'search_items' => __('Search Items'),
        'all_items' => __('All Items'),
        'not_found' => __('No items found.'),
        'not_found_in_trash' => __('No items found in Trash.'),
      ),
      'supports' => array(
				'title'
			),
      'hierarchical' => true,
      'has_archive' => true,
      'public' => true,
      "menu_icon" => 'data:image/svg+xml;base64,' . base64_encode( $icon_item ),
			'menu_position' => 4,
      'show_in_rest' => true
    )
  );

  register_post_type('itagp-recipe',
    array(
      'labels' => array(
        'name' => __('Recipes'),
        'singular_name' => __('Recipe'),
        'add_new' => __('Add Recipe'),
        'add_new_item' => __('Add New Recipe'),
        'edit' => __('Edit'),
        'edit_item' => __('Edit Recipe'),
        'view' => __('View'),
        'view_item' => __('View Recipe'),
        'search_items' => __('Search Recipes'),
        'all_items' => __('All Recipes'),
        'not_found' => __('No recipes found.'),
        'not_found_in_trash' => __('No recipes found in Trash.'),
      ),
      'supports' => array(
				'title', 'thumbnail', 'editor', 'excerpt',
			),
      'has_archive' => true,
      'public' => true,
      "menu_icon" => 'data:image/svg+xml;base64,' . base64_encode( $icon_recipe ),
			'menu_position' => 4,
      'show_in_rest' => true
    )
  );
});


/**
 * Set up custom templates
 */
function itagp_template_filter($single) {
    global $post;

    if ( $post->post_type == 'itagp-item' ) {
        if ( file_exists( ITAGP_PATH . '/templates/single-itagp-item.php' ) ) {
            return ITAGP_PATH . '/templates/single-itagp-item.php';
        }
    }

    return $single;
}
add_filter('single_template', 'itagp_template_filter');