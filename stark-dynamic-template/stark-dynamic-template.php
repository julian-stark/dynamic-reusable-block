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
    register_block_type(__DIR__ . '/blocks/block-editor-test');
}