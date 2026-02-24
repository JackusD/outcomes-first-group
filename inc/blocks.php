<?php

function outcomes_first_group_register_blocks() {
	$block_names = outcomes_first_group_get_block_names();

	if ($block_names) {
		foreach ($block_names as $block_name) {
			register_block_type(OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH . '/' . $block_name['name'] . '/block.json');
		}
	}
}
add_action('init', 'outcomes_first_group_register_blocks');

/**
 * Enable certain blocks
 */
function outcomes_first_group_allowed_block_types_all($allowed_blocks) {
	if (get_post_type() === 'post') {
		return [
			'core/paragraph',
			'core/heading',
			'core/table',
			'core/classic',
			'core/image',
			'core/list',
		];
	}

    $blocks = is_array($allowed_blocks) ? $allowed_blocks : [];

	$block_names = outcomes_first_group_get_block_names();

	$post_type_in_block_names = false;

	foreach ($block_names as $block_name) {
		if (!in_array(get_post_type(), $block_name['post_types'])) continue;

		$post_type_in_block_names = true;
	}

	if (!$post_type_in_block_names) {
		return $allowed_blocks;
	}

	$block_names = array_filter($block_names, function($block_name) {
		return empty($block_name['post_types']) || in_array(get_post_type(), $block_name['post_types']);
	});

	if ($block_names) {
		$blocks = array_merge($blocks, array_map(function($block_name) {
			return 'outcomes-first-group/' . $block_name['name'];
		}, $block_names));

		$blocks = array_merge($blocks, [
			'core/shortcode',
		]);
	}

    return $blocks;
}
add_filter('allowed_block_types_all', 'outcomes_first_group_allowed_block_types_all');
