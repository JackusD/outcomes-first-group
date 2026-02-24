<?php
/**
 * ACF Options Page
 */
function outcomes_first_group_acf_init() {
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page([
			'page_title' => __('Options', 'outcomes-first-group'),
			'menu_title' => __('Options', 'outcomes-first-group'),
			'menu_slug'  => 'options',
			'post_id'    => 'options',
		]);

		acf_add_options_sub_page([
			'page_title'  => __('Analytics', 'outcomes-first-group'),
			'menu_title'  => __('Analytics', 'outcomes-first-group'),
			'menu_slug'   => 'analytics',
			'post_id'     => 'analytics',
			'parent_slug' => 'options',
		]);
		
		acf_add_options_sub_page([
			'page_title'  => __('Cookies Notice', 'outcomes-first-group'),
			'menu_title'  => __('Cookies Notice', 'outcomes-first-group'),
			'menu_slug'   => 'cookies-notice',
			'post_id'     => 'cookies_notice',
			'parent_slug' => 'options',
		]);
	}
}
add_action('acf/init', 'outcomes_first_group_acf_init');
