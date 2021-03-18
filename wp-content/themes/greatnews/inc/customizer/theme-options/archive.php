<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'great_news_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','greatnews' ),
	'description'       => esc_html__( 'Archive section options.', 'greatnews' ),
	'panel'             => 'great_news_theme_options_panel',
	) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'great_news_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
	) );

$wp_customize->add_control( 'great_news_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'greatnews' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'greatnews' ),
	'section'           => 'great_news_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'great_news_is_latest_posts'
	) );

// Archive category setting and control.
$wp_customize->add_setting( 'great_news_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'greatnews' ),
	'section'           => 'great_news_archive_section',
	'on_off_label' 		=> great_news_hide_options(),
	) ) );

// Archive date setting and control.
$wp_customize->add_setting( 'great_news_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'greatnews' ),
	'section'           => 'great_news_archive_section',
	'on_off_label' 		=> great_news_hide_options(),
	) ) );
