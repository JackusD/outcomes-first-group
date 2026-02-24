<?php

/**
 * Force image upscale
 */
function outcomes_first_group_thumbnail_upscale($default, $orig_w, $orig_h, $new_w, $new_h, $crop) {
    if (!$crop) return null;
 
    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
 
    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);
 
    $s_x = floor(($orig_w - $crop_w) / 2);
    $s_y = floor(($orig_h - $crop_h) / 2);
 
    return [0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h];
}
add_filter('image_resize_dimensions', 'outcomes_first_group_thumbnail_upscale', 10, 6);

/**
 * Generate Block Anchor
 */
function outcomes_first_group_generate_block_anchor($attributes) {
	if (empty($attributes['anchor'])) {
		$attributes['anchor'] = 'acf-block-' . uniqid();
	}

	return $attributes;
}
add_filter('acf/pre_save_block' , 'outcomes_first_group_generate_block_anchor');

/**
 * Wrap Core Blocks
 */
function outcomes_first_group_wrap_core_blocks($block_content, $block) {
	$core_blocks = [
		'core/heading', 
		'core/paragraph', 
		'core/image', 
		'core/quote', 
		'core/embed', 
		'core/list', 
		'core/html'
	];

	if (!empty($block['blockName']) && in_array($block['blockName'], $core_blocks)) {
		$block_content = 
			'<div class="core-block container container--container-padding on-screen">' .
				'<div class="core-block__inner fade-slide-in">' . 
					$block_content . 
				'</div>' . 
			'</div>';
	}
	
	return $block_content;
}
add_filter('render_block', 'outcomes_first_group_wrap_core_blocks', 10, 2);

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);

function outcomes_first_group_tinymce_custom_buttons($buttons) {
    array_unshift($buttons, 'styleselect');

    return $buttons;
}
add_filter('mce_buttons', 'outcomes_first_group_tinymce_custom_buttons');

function outcomes_first_group_acf_toolbars($toolbars) {
	$toolbars['Full'][1][] = 'outcomes_first_group_iconchar_button';

	return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars' , 'outcomes_first_group_acf_toolbars');

function outcomes_first_group_tinymce_custom_formats($init_array) {  
	$style_formats = [
		[
            'title' => 'Heading',
			'items' => [
				[
					'title'   => 'Heading 1',
					'classes' => 'heading-1',
					'inline'  => 'span',
				],
				[
					'title'   => 'Heading 2',
					'classes' => 'heading-2',
					'inline'  => 'span',
				],
				[
					'title'   => 'Heading 3',
					'classes' => 'heading-3',
					'inline'  => 'span',
				],
			],
		],
		[
            'title' => 'Body',
			'items' => [
				[
					'title'   => 'Large',
					'classes' => 'body-large',
					'inline'  => 'span',
				],
			],
		],
		[
            'title' => 'Text Colour',
			'items' => [
				[
					'title'   => 'Green',
					'classes' => 'text-colour-green',
					'inline'  => 'span',
				],
				[
					'title'   => 'Blue',
					'classes' => 'text-colour-blue',
					'inline'  => 'span',
				],
				[
					'title'   => 'Coral',
					'classes' => 'text-colour-coral',
					'inline'  => 'span',
				],
			],
		],
	];

	$init_array['style_formats'] = json_encode($style_formats);

	return $init_array;  
} 
add_filter('tiny_mce_before_init', 'outcomes_first_group_tinymce_custom_formats');

function outcomes_first_group_block_categories($block_categories) {
	array_unshift($block_categories, [
		'slug' => 'theme-blocks',
		'title' => 'Main Theme Blocks',
	]);

	return $block_categories;
}
add_filter('block_categories_all', 'outcomes_first_group_block_categories');
