<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Greatnews
 * @since Greatnews 1.0.0
 */

$wp_customize->add_section( 'great_news_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','greatnews' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'greatnews' ),
	'panel'             => 'great_news_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'great_news_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'greatnews' ),
	'section'          	=> 'great_news_breadcrumb',
	'on_off_label' 		=> great_news_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'great_news_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'great_news_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'greatnews' ),
	'active_callback' 	=> 'great_news_is_breadcrumb_enable',
	'section'          	=> 'great_news_breadcrumb',
) );
