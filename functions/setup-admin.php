<?php
/**
 * Update the admin menu, some changes based on tole
 */
function itagp_admin_menu_role_admin()
{
    remove_menu_page('index.php');
    remove_menu_page('edit.php');
    remove_menu_page('edit.php?post_type=page');
    remove_menu_page('upload.php');
}

function itagp_admin_menu_role_all()
{
    remove_menu_page('index.php');
    remove_menu_page('edit.php');
    remove_menu_page('edit.php?post_type=page');
    remove_menu_page('upload.php');
    remove_menu_page('themes.php');
    remove_menu_page('plugins.php');
    remove_menu_page('users.php');
    remove_menu_page('tools.php');
    remove_menu_page('options-general.php');
    remove_menu_page('options-general.php');
    remove_menu_page('edit.php?post_type=acf-field-group');

}

if (is_admin()) {
    add_action('admin_menu', 'itagp_admin_menu_role_admin');
} else {
    add_action('admin_menu', 'itagp_admin_menu_role_all');
}