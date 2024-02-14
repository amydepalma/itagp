<?php

/**
 * Add ACF field groups
 * TODO: Create these as custom fields within WP Core
 */
add_filter('acf/settings/load_json', 'itagp_acf_fields');
function itagp_acf_fields($paths)
{
    $paths[  ] = ITAGP_PATH . 'acf-json';
    return $paths;
}
