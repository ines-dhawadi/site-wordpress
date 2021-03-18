<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'great_news_pagination', array(
	'title'               => esc_html__('Pagination','greatnews'),
	'description'         => esc_html__( 'Pagination section options.', 'greatnews' ),
	'panel'               => 'great_news_theme_options_panel',
	) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'great_news_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'greatnews' ),
	'section'             => 'great_news_pagination',
	'on_off_label' 		=> great_news_switch_options(),
	) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'great_news_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'great_news_sanitize_select',
	'default'             => $options['pagination_type'],
	) );

$wp_customize->add_control( 'great_news_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'greatnews' ),
	'section'             => 'great_news_pagination',
	'type'                => 'select',
	'choices'			  => great_news_pagination_options(),
	'active_callback'	  => 'great_news_is_pagination_enable',
	) );
