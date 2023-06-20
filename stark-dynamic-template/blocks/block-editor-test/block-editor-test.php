<?php

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block-editor-test';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

$block_id = get_field("block_id");

if (!$block_id) {
    echo "## NO BLOCK ID ##";
}

$content = get_post_field('post_content', $block_id);

echo apply_filters('the_content', $content);