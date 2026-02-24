<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package outcomes-first-group
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function outcomes_first_group_body_classes($classes) {
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter('body_class', 'outcomes_first_group_body_classes');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function outcomes_first_group_pingback_header() {
	if (is_singular() && pings_open()) {
		echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
	}
}
add_action('wp_head', 'outcomes_first_group_pingback_header');

/**
 * Get cookie consent level.
 * 
 * @return array
 */
function get_cookies_consent() {
	return isset($_COOKIE['cookieConsent']) ? json_decode(html_entity_decode(stripslashes($_COOKIE['cookieConsent']))) : false;
}

/**
 * Get block ACF fields by id.
 * 
 * @param string $block_anchor Block anchor
 * @param int $post_id Post ID
 * @return bool|array
 */
function outcomes_first_group_get_block_acf_fields_by_id($block_anchor, $post_id) {
	$post = get_post($post_id);

	if (!$block_anchor || !$post) {
		return false;
	}

	$blocks = parse_blocks($post->post_content);

	if ($blocks) {
		foreach ($blocks as $block) {
			if ($block['attrs']['anchor'] === $block_anchor) {
				return $block['attrs']['data'];
			}
		}
	}

	return false;
}

function outcomes_first_group_is_first_block($block_anchor) {
	$post = get_post();

	$post_type = get_post_type($post);

	if (has_blocks($post->post_content)) {
		$blocks = parse_blocks($post->post_content);
		$first_block_attrs = $blocks[0]['attrs'];

			if (!empty($first_block_attrs['anchor'])) {
			return $first_block_attrs['anchor'] === $block_anchor;
		}
	}

	return false;
}

function outcomes_first_group_is_last_block($block_anchor) {
	$post = get_post();
	
	if (has_blocks($post->post_content)) {
		$blocks = parse_blocks($post->post_content);
		$last_block_attrs = $blocks[count($blocks) - 1]['attrs'];

		if (!empty($last_block_attrs['anchor'])) {
			return $last_block_attrs['anchor'] === $block_anchor;
		}
	}

	return false;
}

function outcomes_first_group_is_first_heading($block_anchor) {
	if (!$block_anchor) return;

	$post = get_post();

	$post_type = get_post_type($post);

	if (has_blocks($post->post_content)) {
		$blocks = parse_blocks($post->post_content);

		foreach($blocks as $block) {
			if (!isset($block['attrs']['data']['heading'])) {
				continue;
			}

			return !empty($block['attrs']['anchor']) ? $block['attrs']['anchor'] === $block_anchor : null;
		}
	}

	return false;
}

function outcomes_first_group_get_previous_block_type($block_id) {
	if (!$block_id) return false;

	$post = get_post();
	
	if (has_blocks($post->post_content)) {
		$blocks = parse_blocks($post->post_content);

		$blocks = array_values(array_filter($blocks, function($block) {
			return $block['blockName'];
		}));

		foreach ($blocks as $key=>$block) {
			if (!isset($block['attrs']['anchor']) || $block['attrs']['anchor'] !== $block_id) {
				continue;
			}

			$block_index = $key;
		}

		if (!isset($block_index) || $block_index === 0) return false;

		return $blocks[$block_index - 1]['blockName'];
	}

	return false;
}

function outcomes_first_group_get_next_block_type($block_id) {
	if (!$block_id) return false;

	$post = get_post();

	if (has_blocks($post->post_content)) {
		$blocks = parse_blocks($post->post_content);

		$blocks = array_values(array_filter($blocks, function($block) {
			return $block['blockName'];
		}));

		foreach ($blocks as $key=>$block) {
			if (!isset($block['attrs']['anchor']) || $block['attrs']['anchor'] !== $block_id) {
				continue;
			}

			$block_index = $key;
		}

		if (!isset($block_index) || $block_index === count($blocks) - 1) return false;

		return $blocks[$block_index + 1]['blockName'];
	}

	return false;
}

function outcomes_first_group_if_page_has_block($block_name) {
	$post = get_post();
	
	if ($post && has_blocks($post->post_content)) {
		$blocks = parse_blocks($post->post_content);

		$blocks = array_filter($blocks, function($block) use ($block_name) {
			return $block['blockName'] === $block_name;
		});
		
		return $blocks;
	}

	return false;
}

function outcomes_first_group_get_manifest() {
	$manifest = file_get_contents(OUTCOMES_FIRST_GROUP_BUILD_DIR_PATH . '/manifest.json');
	$manifest = $manifest ? json_decode($manifest) : null;

	return $manifest;
}

function outcomes_first_group_errors($errors, $key, $classes = 'pristine-error') {
	if (!$errors || !$key || empty($errors[$key])) {
		return false;
	}
	
	$html = '<div class="' . $classes . '">';
		foreach ($errors[$key] as $error) {
			$html .= '<div>' . $error . '</div>';
		}
	$html .= '</div>';

	return $html;
}

function outcomes_first_group_get_block_names() {
	$blocks = file_get_contents(OUTCOMES_FIRST_GROUP_DIR_PATH . '/blocks.json');
	$blocks = $blocks ? json_decode($blocks, true) : null;

	return $blocks;
}

function outcomes_first_group_is_wc_page() {
	return class_exists( 'WooCommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() );
}
