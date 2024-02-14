<?php

add_action('init', function () {

    /**
     * Brand
     */
    register_taxonomy('itagp-brand', [ 'itagp-item' ],
        array(
            'labels' => array(
                'name' => ('Brands'),
                'singular_name' => ('Brand'),
                'search_items' => ('Search Brands'),
                'all_items' => ('All Brands'),
                'edit_item' => ('Edit Brand'),
                'update_item' => ('Update Brand'),
                'add_new_item' => ('Add New Brand'),
                'new_item_name' => ('New Brand Name'),
                'menu_name' => ('Brands'),
            ),
            'hierarchical' => false,
            'show_admin_column' => false,
            'show_in_rest' => true,
            'show_ui' => true,
            'meta_box_cb' => false,
            'query_var' => true,
            'rewrite' => array('slug' => 'brand'),
        )
    );

    /**
     * Store
     */
    register_taxonomy('itagp-store', [ 'itagp-item' ],
        array(
            'labels' => array(
                'name' => ('Stores'),
                'singular_name' => ('Store'),
                'search_items' => ('Search Stores'),
                'all_items' => ('All Stores'),
                'edit_item' => ('Edit Store'),
                'update_item' => ('Update Store'),
                'add_new_item' => ('Add New Store'),
                'new_item_name' => ('New Store Name'),
                'menu_name' => ('Stores'),
            ),
            'hierarchical' => false,
            'show_admin_column' => false,
            'show_in_rest' => true,
            'show_ui' => true,
            'meta_box_cb' => false,
            'query_var' => true,
            'rewrite' => array('slug' => 'store'),
        )
    );

		 /**
     * Category
     */
    register_taxonomy('itagp-category', [ 'itagp-item' ],
        array(
            'labels' => array(
                'name' => ('Categories'),
                'singular_name' => ('Category'),
                'search_items' => ('Search Categories'),
                'all_items' => ('All Categories'),
                'edit_item' => ('Edit Category'),
                'update_item' => ('Update Category'),
                'add_new_item' => ('Add New Category'),
                'new_item_name' => ('New Category Name'),
                'menu_name' => ('Categories'),
            ),
            'hierarchical' => false,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'show_ui' => true,
            'meta_box_cb' => false,
            'query_var' => true,
            'rewrite' => array('slug' => 'category'),
        )
    );
});
