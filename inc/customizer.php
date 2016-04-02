<?php
/**
 * Toronto Retro Film Fest Theme Customizer.
 *
 * @package Toronto_Retro_Film_Fest
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function toronto_retro_film_fest_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'toronto_retro_film_fest_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function toronto_retro_film_fest_customize_preview_js() {
	wp_enqueue_script( 'toronto_retro_film_fest_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'toronto_retro_film_fest_customize_preview_js' );
