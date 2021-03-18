<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'great_news_layout', array(
	'title'               => esc_html__('Layout','greatnews'),
	'description'         => esc_html__( 'Layout section options.', 'greatnews' ),
	'panel'               => 'great_news_theme_options_panel',
	) );

// Site layout setting and control.
$wp_customize->add_setting( 'great_news_theme_options[site_layout]', array(
	'sanitize_callback'   => 'great_news_sanitize_select',
	'default'             => $options['site_layout'],
	) );

$wp_customize->add_control(  new Great_News_Custom_Radio_Image_Control ( $wp_customize, 'great_news_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'greatnews' ),
	'section'             => 'great_news_layout',
	'choices'			  => great_news_site_layout(),
	) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'great_news_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'great_news_sanitize_select',
	'default'             => $options['sidebar_position'],
	) );

$wp_customize->add_control(  new Great_News_Custom_Radio_Image_Control ( $wp_customize, 'great_news_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'greatnews' ),
	'section'             => 'great_news_layout',
	'choices'			  => great_news_global_sidebar_position(),
	) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'great_news_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'great_news_sanitize_select',
	'default'             => $options['post_sidebar_position'],
	) );

$wp_customize->add_control(  new Great_News_Custom_Radio_Image_Control ( $wp_customize, 'great_news_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'greatnews' ),
	'section'             => 'great_news_layout',
	'choices'			  => great_news_sidebar_position(),
	) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'great_news_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'great_news_sanitize_select',
	'default'             => $options['page_sidebar_position'],
	) );

$wp_customize->add_control( new Great_News_Custom_Radio_Image_Control( $wp_customize, 'great_news_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'greatnews' ),
	'section'             => 'great_news_layout',
	'choices'			  => great_news_sidebar_position(),
	) ) );