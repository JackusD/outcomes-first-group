<?php

/**
 * Example post type
 */
// function outcomes_first_group_example_post_type() {
// 	$labels = [
// 		'name'                  => _x('Examples', 'Post Type General Name', 'outcomes-first-group'),
// 		'singular_name'         => _x('Example', 'Post Type Singular Name', 'outcomes-first-group'),
// 		'menu_name'             => __('Examples', 'outcomes-first-group'),
// 		'name_admin_bar'        => __('Example', 'outcomes-first-group'),
// 		'archives'              => __('Example Archives', 'outcomes-first-group'),
// 		'attributes'            => __('Example Attributes', 'outcomes-first-group'),
// 		'parent_item_colon'     => __('Parent Example:', 'outcomes-first-group'),
// 		'all_items'             => __('All Examples', 'outcomes-first-group'),
// 		'add_new_item'          => __('Add New Example', 'outcomes-first-group'),
// 		'add_new'               => __('Add New', 'outcomes-first-group'),
// 		'new_item'              => __('New Example', 'outcomes-first-group'),
// 		'edit_item'             => __('Edit Example', 'outcomes-first-group'),
// 		'update_item'           => __('Update Example', 'outcomes-first-group'),
// 		'view_item'             => __('View Example', 'outcomes-first-group'),
// 		'view_items'            => __('View Examples', 'outcomes-first-group'),
// 		'search_items'          => __('Search Example', 'outcomes-first-group'),
// 		'not_found'             => __('Not found', 'outcomes-first-group'),
// 		'not_found_in_trash'    => __('Not found in Trash', 'outcomes-first-group'),
// 		'featured_image'        => __('Featured Image', 'outcomes-first-group'),
// 		'set_featured_image'    => __('Set featured image', 'outcomes-first-group'),
// 		'remove_featured_image' => __('Remove featured image', 'outcomes-first-group'),
// 		'use_featured_image'    => __('Use as featured image', 'outcomes-first-group'),
// 		'insert_into_item'      => __('Insert into example', 'outcomes-first-group'),
// 		'uploaded_to_this_item' => __('Uploaded to this example', 'outcomes-first-group'),
// 		'items_list'            => __('Examples list', 'outcomes-first-group'),
// 		'items_list_navigation' => __('Examples list navigation', 'outcomes-first-group'),
// 		'filter_items_list'     => __('Filter examples list', 'outcomes-first-group'),
//     ];
// 	$args = [
// 		'label'               => __('Example', 'outcomes-first-group'),
// 		'description'         => __('Examples', 'outcomes-first-group'),
// 		'labels'              => $labels,
// 		'supports'            => ['title', 'editor', 'thumbnail'],
// 		'hierarchical'        => false,
// 		'public'              => true,
// 		'show_ui'             => true,
// 		'show_in_menu'        => true,
// 		'menu_position'       => 20,
// 		'menu_icon'           => 'dashicons-admin-generic',
// 		'show_in_admin_bar'   => true,
// 		'show_in_nav_menus'   => true,
// 		'can_export'          => true,
// 		'has_archive'         => false,
//         'rewrite'             => [
//             'slug' => 'example'
//         ],
// 		'exclude_from_search' => false,
// 		'publicly_queryable'  => true,
// 		'capability_type'     => 'page',
// 		'show_in_rest'        => true,
// 	];
// 	register_post_type('example', $args);
// }
// add_action('init', 'outcomes_first_group_example_post_type', 0);
