<?php
/*
 * Plugin Name: Stark Dynamic Template
 * Plugin URI: https://julianstark.de/
 * Description: Stark Dynamic Template
 * Version: 2023.06.19.1
 * Author: Julian Stark
 */

add_action('init', 'register_acf_blocks');
function register_acf_blocks() {
    register_block_type(__DIR__ . '/blocks/dynamic-template');
    register_block_type(__DIR__ . '/blocks/block-editor-test');
}

// ADD wp_block POST TYPE TO ACF POST OPTIONS
function sd_filter_acf_get_post_types($post_types) {
    if (!in_array('wp_block', $post_types)) {
        $post_types[] = 'wp_block';
    }
    return $post_types;
};
add_filter('acf/get_post_types', 'sd_filter_acf_get_post_types', 10, 1);