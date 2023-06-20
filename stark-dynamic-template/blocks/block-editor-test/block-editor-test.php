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

return;

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