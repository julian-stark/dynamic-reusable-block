<?php

$block_id = get_field("block_id");

if (!$block_id) {
    echo "## NO BLOCK ID ##";
}

$content = get_post_field('post_content', $block_id);

echo apply_filters('the_content', $content);