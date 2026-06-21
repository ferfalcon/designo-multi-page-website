<?php
/**
 * Designo theme setup.
 *
 * @package Designo
 */

if ( ! function_exists( 'designo_setup' ) ) {
    /**
     * Registers block theme supports.
     */
    function designo_setup() {
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'editor-styles' );
        add_editor_style(
            array(
                'assets/css/theme.css',
                'assets/css/patterns/site-footer.css',
            )
        );
    }
}
add_action( 'after_setup_theme', 'designo_setup' );

if ( ! function_exists( 'designo_enqueue_assets' ) ) {
    /**
     * Enqueues frontend theme assets.
     */
    function designo_enqueue_assets() {
        $theme_css_path = get_stylesheet_directory() . '/assets/css/theme.css';
        $footer_css_path = get_stylesheet_directory() . '/assets/css/patterns/site-footer.css';

        wp_enqueue_style(
            'designo-style',
            get_stylesheet_directory_uri() . '/assets/css/theme.css',
            array(),
            filemtime( $theme_css_path )
        );

        wp_enqueue_style(
            'designo-site-footer',
            get_stylesheet_directory_uri() . '/assets/css/patterns/site-footer.css',
            array( 'designo-style' ),
            filemtime( $footer_css_path )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'designo_enqueue_assets' );

if ( ! function_exists( 'designo_register_pattern_categories' ) ) {
    /**
     * Registers Designo-specific block pattern categories.
     */
    function designo_register_pattern_categories() {
        register_block_pattern_category(
            'designo',
            array( 'label' => __( 'Designo', 'designo' ) )
        );
    }
}
add_action( 'init', 'designo_register_pattern_categories' );
