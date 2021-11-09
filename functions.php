<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since 1.0.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( get_template_directory_uri() . '/style.css' );
	}
	add_action( 'after_setup_theme', 'twentytwentytwo_support' );

endif;


if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' ),
		);

		// Add styles inline.
		wp_add_inline_style( 'twentytwentytwo-style', twentytwentytwo_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}
	add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

endif;


if ( ! function_exists( 'twentytwentytwo_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @return void
	 */
	function twentytwentytwo_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', twentytwentytwo_get_font_face_styles() );

	}
	add_action( 'admin_init', 'twentytwentytwo_editor_styles' );

endif;


if ( ! function_exists( 'twentytwentytwo_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions twentytwentytwo_styles() and twentytwentytwo_editor_styles() above.
	 *
	 * @return string
	 */
	function twentytwentytwo_get_font_face_styles() {

		return "
		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: italic;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Italic.ttf.woff2' ) . "') format('woff2');
		}
		";

	}

endif;


// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
