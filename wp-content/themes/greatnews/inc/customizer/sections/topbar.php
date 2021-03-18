<?php
/**
 * Topbar Section options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add Topbar section
$wp_customize->add_section( 'great_news_topbar_section', array(
	'title'             => esc_html__( 'Topbar','greatnews' ),
	'description'       => esc_html__( 'Topbar Section options.', 'greatnews' ),
	'panel'             => 'great_news_front_page_panel',
	) );

// Topbar content enable control and setting
$wp_customize->add_setting( 'great_news_theme_options[topbar_section_enable]', array(
	'default'			=> 	$options['topbar_section_enable'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[topbar_section_enable]', array(
	'label'             => esc_html__( 'Topbar Section Enable', 'greatnews' ),
	'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show secondary and social menu.', 'greatnews' ), esc_html__( 'Click Here', 'greatnews' ), esc_html__( 'to create menu', 'greatnews' ) ),
	'section'           => 'great_news_topbar_section',
	'on_off_label' 		=> great_news_switch_options(),
	) ) );

// Login text setting and control
$wp_customize->add_setting( 'great_news_theme_options[login_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['login_text'],
	) );

$wp_customize->add_control( 'great_news_theme_options[login_text]', array(
	'label'           	=> esc_html__( 'Top Login text', 'greatnews' ),
	'section'        	=> 'great_news_topbar_section',
	'active_callback' 	=> 'great_news_is_topbar_section_enable',
	'type'				=> 'text',
	) );

// ads link setting and control
$wp_customize->add_setting( 'great_news_theme_options[login_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	) );

$wp_customize->add_control( 'great_news_theme_options[login_url]', array(
	'label'           	=> esc_html__( 'Login Url', 'greatnews' ),
	'section'        	=> 'great_news_topbar_section',
	'type'				=> 'url',
	'active_callback' 	=> 'great_news_is_topbar_section_enable',
	) );


// mid ads image setting and control.
$wp_customize->add_setting( 'great_news_theme_options[mid_ads_image]', array(
	'sanitize_callback' => 'great_news_sanitize_image'
	) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'great_news_theme_options[mid_ads_image]',
	array(
		'label'       		=> esc_html__( 'Mid Ads Image', 'greatnews' ),
		'description' 		=> esc_html__( 'Upload mid Ads Image', 'greatnews' ),
		'section'     		=> 'great_news_topbar_section',
		) ) );

// mid ads link setting and control
$wp_customize->add_setting( 'great_news_theme_options[mid_ads_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	) );

$wp_customize->add_control( 'great_news_theme_options[mid_ads_url]', array(
	'label'           	=> esc_html__( 'Mid Ads Url', 'greatnews' ),
	'section'        	=> 'great_news_topbar_section',
	'type'				=> 'url',
	) );

// ads image setting and control.
$wp_customize->add_setting( 'great_news_theme_options[ads_image]', array(
	'sanitize_callback' => 'great_news_sanitize_image'
	) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'great_news_theme_options[ads_image]',
	array(
		'label'       		=> esc_html__( 'Ads Image', 'greatnews' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'greatnews' ), 900, 100 ),
		'section'     		=> 'great_news_topbar_section',
		) ) );

// ads link setting and control
$wp_customize->add_setting( 'great_news_theme_options[ads_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	) );

$wp_customize->add_control( 'great_news_theme_options[ads_url]', array(
	'label'           	=> esc_html__( 'Ads Url', 'greatnews' ),
	'section'        	=> 'great_news_topbar_section',
	'type'				=> 'url',
	) );