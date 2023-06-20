<?php
/**
 * Lacet Image Slider
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'dynamic-template-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

$block_id = get_field("block_id");

//return "DYNAMIC TEST 2 🥶";
if (!$block_id) {
    echo "## NO BLOCK ID ##";
}

if (empty($block_id) || (int) $block_id != $block_id) {
    echo "##err##";
    return;
}
$content = get_post_field('post_content', $block_id);

// Find/Replace
$find_replace = get_field('find_replace');
if ($find_replace) {
    foreach ($find_replace as $rule) {
        $find = $rule['find'];
        $replace = $rule['replace'];
        $content = str_replace($find, $replace, $content);
    }
}

//$ph_1 = get_field("ph_1");

//$content = str_replace("{{ph_1}}", $ph_1, $content);

if (is_admin()) {

    echo "## is admin ##";

    $post_blocks = parse_blocks(get_the_content(null, false, $block_id)); // Retrieve blocks from post content

    foreach ($post_blocks as $block) {
        $block_content = render_block($block); // Render block with inline styles
        echo $block_content;
    }

} else {
    echo apply_filters('the_content', $content);
}