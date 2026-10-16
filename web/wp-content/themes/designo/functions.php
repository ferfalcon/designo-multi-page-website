<?php
/** Designo theme setup. Content is never seeded on activation. */
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
	load_theme_textdomain( 'designo', get_template_directory() . '/languages' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/theme.css' );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'designo', get_theme_file_uri( 'assets/theme.css' ), array(), filemtime( get_theme_file_path( 'assets/theme.css' ) ) );
} );

add_action( 'init', function () {
	register_block_pattern_category( 'designo', array( 'label' => __( 'Designo', 'designo' ) ) );
	register_block_style( 'core/button', array( 'name' => 'designo-light', 'label' => __( 'Designo light', 'designo' ) ) );
} );

require __DIR__ . '/inc/maps.php';

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require __DIR__ . '/inc/starter-content.php';
}
