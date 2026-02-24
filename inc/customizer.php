<?php
/**
 * outcomes-first-group Theme Customizer
 *
 * @package outcomes-first-group
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function outcomes_first_group_customize_register($wp_customize) {
	// $wp_customize->get_setting('blogname')->transport         = 'postMessage';
	// $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	// $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	// $wp_customize->add_setting('white_logo');

	// $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'white_logo', [
	// 	'label'      => __('White Logo', 'outcomes-first-group'),
	// 	'section'    => 'title_tagline',
	// 	'settings'   => 'white_logo',
	// ]));

	// if (isset($wp_customize->selective_refresh)) {
	// 	$wp_customize->selective_refresh->add_partial('blogname', [
	// 		'selector'        => '.site-title a',
	// 		'render_callback' => 'outcomes_first_group_customize_partial_blogname',
	// 	]);
	// 	$wp_customize->selective_refresh->add_partial('blogdescription', [
	// 		'selector'        => '.site-description',
	// 		'render_callback' => 'outcomes_first_group_customize_partial_blogdescription',
	// 	]);
	// }
}
add_action('customize_register', 'outcomes_first_group_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function outcomes_first_group_customize_partial_blogname() {
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function outcomes_first_group_customize_partial_blogdescription() {
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function outcomes_first_group_customize_preview_js() {
	wp_enqueue_script('outcomes-first-group-customizer', get_template_directory_uri() . '/js/customizer.js', ['customize-preview'], '20151215', true);
}
add_action('customize_preview_init', 'outcomes_first_group_customize_preview_js');
