<?php
/**
 * Great News Customizer.
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//load upgrade-to-pro section
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

function great_news_customize_register( $wp_customize ) {
	$options = great_news_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'great_news_theme_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'great_news_theme_options[header_title_color]', array(
		'priority'			=> 5,
		'label'             => esc_html__( 'Header Title Color', 'greatnews' ),
		'section'           => 'colors',
		) ) );

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'great_news_theme_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'great_news_theme_options[header_tagline_color]', array(
		'priority'			=> 6,
		'label'             => esc_html__( 'Header Tagline Color', 'greatnews' ),
		'section'           => 'colors',
		) ) );

	// Site identity extra options.
	$wp_customize->add_setting( 'great_news_theme_options[header_txt_logo_extra]', array(
		'default'           => $options['header_txt_logo_extra'],
		'sanitize_callback' => 'great_news_sanitize_select',
		'transport'			=> 'refresh'
		) );

	$wp_customize->add_control( 'great_news_theme_options[header_txt_logo_extra]', array(
		'priority'			=> 50,
		'type'				=> 'radio',
		'label'             => esc_html__( 'Site Identity Extra Options', 'greatnews' ),
		'section'           => 'title_tagline',
		'choices'				=> array( 
			'hide-all'     => esc_html__( 'Hide All', 'greatnews' ),
			'show-all'     => esc_html__( 'Show All', 'greatnews' ),
			'title-only'   => esc_html__( 'Title Only', 'greatnews' ),
			'tagline-only' => esc_html__( 'Tagline Only', 'greatnews' ),
			'logo-title'   => esc_html__( 'Logo + Title', 'greatnews' ),
			'logo-tagline' => esc_html__( 'Logo + Tagline', 'greatnews' ),
			)
		) );

	/**
	 * Custom colors.
	 */



	// Add panel for common theme options
	$wp_customize->add_panel( 'great_news_theme_options_panel' , array(
		'title'      => esc_html__( 'Theme Options','greatnews' ),
		'description'=> esc_html__( 'Great News Theme Options.', 'greatnews' ),
		'priority'   => 150,
		) );

	// load breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load menu
	require get_template_directory() . '/inc/customizer/theme-options/menu.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel( 'great_news_front_page_panel' , array(
		'title'      => esc_html__( 'Front Page','greatnews' ),
		'description'=> esc_html__( 'Front Page Theme Options.', 'greatnews' ),
		'priority'   => 140,
		) );

	// load topbar option
	require get_template_directory() . '/inc/customizer/sections/topbar.php';

	// load breakingnews option
	require get_template_directory() . '/inc/customizer/sections/breakingnews.php';	

	// load hero-section option
	require get_template_directory() . '/inc/customizer/sections/hero-section.php';		
	
	// load most viewed option
	require get_template_directory() . '/inc/customizer/sections/most-viewed-post.php';

	// load reading option
	require get_template_directory() . '/inc/customizer/sections/reading.php';

	// load single column option
	require get_template_directory() . '/inc/customizer/sections/single-column-news.php';

	// load blog option
	require get_template_directory() . '/inc/customizer/sections/blog.php';


}
add_action( 'customize_register', 'great_news_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function great_news_customize_preview_js() {
	wp_enqueue_script( 'great-news-customizer', get_template_directory_uri() . '/assets/js/customizer' . great_news_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'great_news_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function great_news_customize_control_js() {
	
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . great_news_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . great_news_min() . '.js', array( 'jquery' ), '1.4.2', true );

	wp_enqueue_style( 'great-news-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . great_news_min() . '.css' );
	wp_enqueue_script( 'great-news-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . great_news_min() . '.js', array(), '1.0', true );
	$great_news_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'greatnews' )
		);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'great-news-customize-controls', 'great_news_reset_data', $great_news_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'great_news_customize_control_js' );

if ( !function_exists( 'great_news_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since Great News 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
function great_news_reset_options() {
	$options = great_news_get_theme_options();
	if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
		set_theme_mod( 'great_news_theme_options', array() );
			// Reset custom header and backgrounds.
		remove_theme_mod( 'header_image' );
		remove_theme_mod( 'header_image_data' );
		remove_theme_mod( 'background_image' );
		remove_theme_mod( 'background_color' );
		remove_theme_mod( 'header_textcolor' );
	}
	else {
		return false;
	}
}
endif;
add_action( 'customize_save_after', 'great_news_reset_options' );
