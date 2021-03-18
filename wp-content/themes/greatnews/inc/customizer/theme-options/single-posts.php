<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'great_news_single_post_section', array(
	'title'             => esc_html__( 'Single Post','greatnews' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'greatnews' ),
	'panel'             => 'great_news_theme_options_panel',
	) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'great_news_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'greatnews' ),
	'section'           => 'great_news_single_post_section',
	'on_off_label' 		=> great_news_hide_options(),
	) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'great_news_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'greatnews' ),
	'section'           => 'great_news_single_post_section',
	'on_off_label' 		=> great_news_hide_options(),
	) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'great_news_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'greatnews' ),
	'section'           => 'great_news_single_post_section',
	'on_off_label' 		=> great_news_hide_options(),
	) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'great_news_theme_options[single_post_disable_featured_image]', array(
	'default'           => $options['single_post_disable_featured_image'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[single_post_disable_featured_image]', array(
	'label'             => esc_html__( 'Disable featured image in header banner', 'greatnews' ),
	'section'           => 'great_news_single_post_section',
	'on_off_label' 		=> great_news_hide_options(),
	) ) );

