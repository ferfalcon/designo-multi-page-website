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
        add_editor_style( 'style.css' );
    }
}
add_action( 'after_setup_theme', 'designo_setup' );

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
