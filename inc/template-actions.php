<?php 
/**
 * Image sizes
 */
add_image_size('720', 720);
add_image_size('960', 960);
add_image_size('1440', 1440);
add_image_size('1920', 1920);
add_image_size('3840', 3840);

add_image_size('1920x1080', 1920, 1080);
add_image_size('3840x2160', 3840, 2160);

// 16:9 Ratio
add_image_size('240x135crop', 240, 135, true);
add_image_size('480x270crop', 480, 270, true);
add_image_size('960x540crop', 960, 540, true);
add_image_size('1920x1080crop', 1920, 1080, true);
add_image_size('3840x2160crop', 3840, 2160, true);

// 1:1 Ratio
add_image_size('380x380crop', 380, 380, true);
add_image_size('720x720crop', 720, 720, true);
add_image_size('760x760crop', 760, 760, true);
add_image_size('1440x1440crop', 1440, 1440, true);

function outcomes_first_group_disable_comment_functionality() {
    // Redirect any user trying to access comments page
    global $pagenow;
     
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
 
    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
 
    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'outcomes_first_group_disable_comment_functionality');
 
function outcomes_first_group_disable_admin_comment_page() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'outcomes_first_group_disable_admin_comment_page');
 
function outcomes_first_group_disable_admin_bar_comment_menu_item() {
    if (!is_admin_bar_showing()) return;

	remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
}
add_action('init', 'outcomes_first_group_disable_admin_bar_comment_menu_item');

function outcomes_first_group_preload_fonts() {
}
add_action('wp_head', 'outcomes_first_group_preload_fonts');

function custom_tinymce_plugin($plugin_array) {
	$manifest = outcomes_first_group_get_manifest();

	if ($manifest && !empty($manifest->{'tiny-mce-customiser.js'})) {
		$plugin_array['outcomes_first_group_iconchar_button'] = OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'tiny-mce-customiser.js'};
	}

	return $plugin_array;
}

function register_mce_button( $buttons ) {
	array_push($buttons, 'outcomes_first_group_iconchar_button');
	return $buttons;
}

function outcomes_first_group_iconchar_button() {
	if (!current_user_can('edit_posts') || !current_user_can('edit_pages')) {
		return;
	}
	
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter('mce_external_plugins', 'custom_tinymce_plugin');
		add_filter('mce_buttons', 'register_mce_button');
	}
}
add_action('admin_head', 'outcomes_first_group_iconchar_button');

/**
 * Remove WC stuff on non WC pages.
 */
function outcomes_first_group_conditionally_remove_wc_assets() {
	if (outcomes_first_group_is_wc_page()) return;

	remove_filter('get_the_generator_html', 'wc_generator_tag', 10, 2);
	remove_filter('get_the_generator_xhtml', 'wc_generator_tag', 10, 2);
	remove_action('wp_enqueue_scripts', [WC_Frontend_Scripts::class, 'load_scripts']);
	remove_action('wp_print_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
	remove_action('wp_print_footer_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
	remove_action('wp_head', 'wc_gallery_noscript');
	remove_filter('body_class', 'wc_body_class');
}
add_action('template_redirect', 'outcomes_first_group_conditionally_remove_wc_assets');

function outcomes_first_group_conditionally_woocommerce_enqueue_styles($enqueue_styles) {
	return outcomes_first_group_is_wc_page() ? $enqueue_styles : [];
}
add_filter('woocommerce_enqueue_styles', 'outcomes_first_group_conditionally_woocommerce_enqueue_styles');

function outcomes_first_group_conditionally_wp_enqueue_scripts() {
	if (outcomes_first_group_is_wc_page()) return;

    wp_dequeue_style('woocommerce-inline');
    wp_dequeue_style('wc-blocks-style');
}
add_action('wp_enqueue_scripts', 'outcomes_first_group_conditionally_wp_enqueue_scripts');

function outcomes_first_group_include_acf_field_code_block() {
	if (!function_exists('acf_register_field_type')) return;

	require_once __DIR__ . '/acf-field-code-block.php';

	acf_register_field_type('outcomes_first_group_acf_field_code_block');
}
add_action('init', 'outcomes_first_group_include_acf_field_code_block');
