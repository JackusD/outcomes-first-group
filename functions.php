<?php
/**
 * outcomes-first-group functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package outcomes-first-group
 */

if (file_exists(get_template_directory() . '/vendor/autoload.php')) {
	require get_template_directory() . '/vendor/autoload.php';
}

if (!defined('OUTCOMES_FIRST_GROUP_DIR_PATH')) {
	define('OUTCOMES_FIRST_GROUP_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('OUTCOMES_FIRST_GROUP_DIR_URI')) {
	define('OUTCOMES_FIRST_GROUP_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('OUTCOMES_FIRST_GROUP_BUILD_URI')) {
	define('OUTCOMES_FIRST_GROUP_BUILD_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build');
}

if (!defined('OUTCOMES_FIRST_GROUP_BUILD_DIR_PATH')) {
	define('OUTCOMES_FIRST_GROUP_BUILD_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/build');
}

if (!defined('OUTCOMES_FIRST_GROUP_BUILD_JS_URI')) {
	define('OUTCOMES_FIRST_GROUP_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/js');
}

if (!defined('OUTCOMES_FIRST_GROUP_BUILD_JS_DIR_PATH')) {
	define('OUTCOMES_FIRST_GROUP_BUILD_JS_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/build/js');
}

if (!defined('OUTCOMES_FIRST_GROUP_BUILD_IMG_URI')) {
	define('OUTCOMES_FIRST_GROUP_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/img');
}

if (!defined('OUTCOMES_FIRST_GROUP_BUILD_FONTS_URI')) {
	define('OUTCOMES_FIRST_GROUP_BUILD_FONTS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/fonts');
}

if (!defined('OUTCOMES_FIRST_GROUP_BUILD_CSS_URI')) {
	define('OUTCOMES_FIRST_GROUP_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/css');
}

if (!defined('OUTCOMES_FIRST_GROUP_BUILD_CSS_DIR_PATH')) {
	define('OUTCOMES_FIRST_GROUP_BUILD_CSS_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/build/css');
}

if (!defined('OUTCOMES_FIRST_GROUP_LIB_CSS_URI')) {
	define('OUTCOMES_FIRST_GROUP_LIB_CSS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/libraries/css');
}

if (!defined('OUTCOMES_FIRST_GROUP_LIB_JS_URI')) {
	define('OUTCOMES_FIRST_GROUP_LIB_JS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/libraries/js');
}

if (!defined('OUTCOMES_FIRST_GROUP_LIB_JS_DIR_PATH')) {
	define('OUTCOMES_FIRST_GROUP_LIB_JS_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/libraries/js');
}

if (!defined('OUTCOMES_FIRST_GROUP_LIB_CSS_DIR_PATH')) {
	define('OUTCOMES_FIRST_GROUP_LIB_CSS_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/libraries/css');
}

if (!defined('OUTCOMES_FIRST_GROUP_LIB_LOTTIE_DIR_URI')) {
	define('OUTCOMES_FIRST_GROUP_LIB_LOTTIE_DIR_URI', untrailingslashit(get_template_directory_uri()) . '/assets/lottie');
}

if (!defined('OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI')) {
	define('OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI', untrailingslashit(get_template_directory_uri()) . '/assets/favicons');
}

if (!defined('OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH')) {
	define('OUTCOMES_FIRST_GROUP_BLOCKS_DIR_PATH', untrailingslashit(get_template_directory()) . '/blocks');
}

if (!defined('OUTCOMES_FIRST_GROUP_TEMPLATE_PARTS_DIR_PATH')) {
	define('OUTCOMES_FIRST_GROUP_TEMPLATE_PARTS_DIR_PATH', untrailingslashit(get_template_directory()) . '/template-parts');
}

if (!function_exists('outcomes_first_group_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function outcomes_first_group_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on outcomes-first-group, use a find and replace
		 * to change 'outcomes-first-group' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('outcomes-first-group', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus([
			'site-menu' => esc_html__('Site Menu', 'outcomes-first-group'),
		]);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]);

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('_s_custom_background_args', [
			'default-color' => 'ffffff',
			'default-image' => '',
		]));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', [
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		]);
	}
endif;
add_action('after_setup_theme', 'outcomes_first_group_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function outcomes_first_group_content_width() {
	$GLOBALS['content_width'] = apply_filters('outcomes_first_group_content_width', 640);
}
add_action('after_setup_theme', 'outcomes_first_group_content_width', 0);

/**
 * Register Google Fonts
 */
function outcomes_first_group_fonts_url() {
	$fonts_url = '';

	/*
	 *Translators: If there are characters in your language that are not
	 * supported by Noto Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$notoserif = esc_html_x('on', 'Noto Serif font: on or off', 'outcomes-first-group');

	if ('off' !== $notoserif) {
		$font_families = [];
		$font_families[] = 'Noto Serif:400,400italic,700,700italic';

		$query_args = [
			'family' => urlencode(implode('|', $font_families)),
			'subset' => urlencode('latin,latin-ext'),
		];

		$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	}

	return $fonts_url;
	
}

/**
 * Enqueue scripts and styles.
 */
function outcomes_first_group_styles() {
	$manifest = outcomes_first_group_get_manifest();

	if (file_exists(OUTCOMES_FIRST_GROUP_LIB_CSS_DIR_PATH . '/swiper-bundle.min.css')) {
		wp_register_style('outcomes-first-group-swiper', OUTCOMES_FIRST_GROUP_LIB_CSS_URI . '/swiper-bundle.min.css', []);
	}

	if ($manifest && !empty($manifest->{'main.css'})) {
		wp_register_style('outcomes-first-group-main', OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'main.css'}, []);
		wp_enqueue_style('outcomes-first-group-main');
	}

	$block_names = outcomes_first_group_get_block_names();
	
	if ($block_names) {
		$post = get_post();

		$first_block_name = null;
	
		if (!empty($post->post_content) && has_blocks($post->post_content)) {
			$blocks = parse_blocks($post->post_content);
			$first_block_name = !empty($blocks[0]['attrs']['name']) ? $blocks[0]['attrs']['name'] : null;
		}

		foreach ($block_names as $block_name) {
			if ($manifest && !empty($manifest->{'block-' . $block_name['name'] . '.css'}) &&
				!wp_style_is('outcomes-first-group-block-' . $block_name['name'], 'enqueued') && 
				file_exists(OUTCOMES_FIRST_GROUP_BUILD_DIR_PATH . $manifest->{'block-' . $block_name['name'] . '.css'})) {

				wp_register_style(
					'outcomes-first-group-block-' . $block_name['name'], 
					OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'block-' . $block_name['name'] . '.css'}, 
					!empty($block_name['assets']['css']['dependencies']) ? $block_name['assets']['css']['dependencies'] : [],
				);

				if ($first_block_name === 'outcomes-first-group/' . $block_name['name']) {
					wp_enqueue_style('outcomes-first-group-block-' . $block_name['name']);
				}
			}
		}
	}
}
add_action('wp_enqueue_scripts', 'outcomes_first_group_styles');

function outcomes_first_group_scripts() {
	$manifest = outcomes_first_group_get_manifest();

	if (file_exists(OUTCOMES_FIRST_GROUP_LIB_JS_DIR_PATH . '/swiper-bundle.min.js')) {
		wp_register_script('outcomes-first-group-swiper', OUTCOMES_FIRST_GROUP_LIB_JS_URI . '/swiper-bundle.min.js', [], null, true);
	}

	if ($manifest && !empty($manifest->{'main.js'})) {
		wp_register_script('outcomes-first-group-main', OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'main.js'}, [], null, true);
		wp_enqueue_script('outcomes-first-group-main');
	}

	$block_names = outcomes_first_group_get_block_names();

	$block_names = array_filter($block_names, function($block_name) {
		return !empty($block_name['assets']['js']);
	});
	
	if ($block_names) {
        $iframe_block = !empty($_GET['iframe-block']) ? sanitize_text_field($_GET['iframe-block']) : null;

		$post = get_post();

		$first_block_name = null;
	
		if (!empty($post->post_content) && has_blocks($post->post_content)) {
			$blocks = parse_blocks($post->post_content);

            array_filter($blocks, function($block) use ($iframe_block) {
                return !empty($block['attrs']['name']) && $block['attrs']['name'] === $iframe_block;
            });

            $blocks = array_values($blocks);

			$first_block_name = !empty($blocks[0]['attrs']['name']) ? $blocks[0]['attrs']['name'] : null;
		}

		foreach ($block_names as $block_name) {
			if ($manifest && !empty($manifest->{'block-' . $block_name['name'] . '.js'}) &&
				!wp_script_is('outcomes-first-group-block-' . $block_name['name'], 'enqueued') && 
				file_exists(OUTCOMES_FIRST_GROUP_BUILD_DIR_PATH . $manifest->{'block-' . $block_name['name'] . '.js'})) {

				wp_register_script(
					'outcomes-first-group-block-' . $block_name['name'], 
					OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'block-' . $block_name['name'] . '.js'}, 
					!empty($block_name['assets']['js']['dependencies']) ? $block_name['assets']['js']['dependencies'] : [],
					null,
					true,
				);

				if ($first_block_name === 'outcomes-first-group/' . $block_name['name']) {
					wp_enqueue_script('outcomes-first-group-block-' . $block_name['name']);
				}
			}
		}
	}

	// $globals = [
	// 	'AJAX_URL'           => admin_url('admin-ajax.php'),
	// 	'TEMPLATE_DIRECTORY' => get_template_directory_uri(),
	// ];

	// wp_add_inline_script('outcomes-first-group-main', 'var GLOBALS = ' . json_encode($globals), 'before');
}
add_action('wp_enqueue_scripts', 'outcomes_first_group_scripts');

function outcomes_first_group_admin_scripts() {
	$manifest = outcomes_first_group_get_manifest();

	if ($manifest && !empty($manifest->{'admin.js'})) {
		wp_register_script('outcomes-first-group-admin', OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'admin.js'}, [], null, true);
		wp_enqueue_script('outcomes-first-group-admin');
	}

	$globals = [
		'AJAX_URL'           => admin_url('admin-ajax.php'),
		'TEMPLATE_DIRECTORY' => get_template_directory_uri(),
		'ICONS'              => [],
	];

	wp_add_inline_script('outcomes-first-group-admin', 'var GLOBALS = ' . json_encode($globals), 'before');
}
add_action('admin_enqueue_scripts', 'outcomes_first_group_admin_scripts');

function outcomes_first_group_admin_styles() {
	$manifest = outcomes_first_group_get_manifest();

	if ($manifest && !empty($manifest->{'admin.css'})) {
		wp_register_style('outcomes-first-group-admin', OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'admin.css'}, [], null);
		wp_enqueue_style('outcomes-first-group-admin');
		add_editor_style(OUTCOMES_FIRST_GROUP_BUILD_URI . $manifest->{'admin.css'});
	}
}
add_action('admin_enqueue_scripts', 'outcomes_first_group_admin_styles');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Theme Actions
 */
require get_template_directory() . '/inc/template-actions.php';

/**
 * Theme Filters
 */
require get_template_directory() . '/inc/template-filters.php';

/**
 * Post Types
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Taxonomies
 */
require get_template_directory() . '/inc/taxonomies.php';

/**
 * ACF
 */
require get_template_directory() . '/inc/acf.php';

/**
 * ACF Blocks
 */
require get_template_directory() . '/inc/blocks.php';

/**
 * Walkers
 */
require get_template_directory() . '/inc/walkers.php';
