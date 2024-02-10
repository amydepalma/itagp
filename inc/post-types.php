<?php

add_action('init', function () {
	$item_icon = file_get_contents( ITAGP_PATH . 'assets/icon-item.svg' );

	/**
	 * Item
	 */
  $parent_page = get_post(wp_get_post_parent_id(get_option('page_for_posts')));
	register_post_type('item',
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
				'title', 'excerpt',
			),
      'has_archive' => true,
      'public' => true,
      "menu_icon" => 'data:image/svg+xml;base64,' . base64_encode( $item_icon ),
			'menu_position' => 4,
      'show_in_rest' => true,
			'taxonomies' => array('item-tax')
		)
  );
});