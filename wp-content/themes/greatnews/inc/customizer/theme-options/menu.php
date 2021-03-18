<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'great_news_menu', array(
	'title'             => esc_html__('Header Menu','greatnews'),
	'description'       => esc_html__( 'Header Menu options.', 'greatnews' ),
	'panel'             => 'nav_menus',
	) );

// Menu sticky setting and control.
$wp_customize->add_setting( 'great_news_theme_options[menu_sticky]', array(
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	'default'           => $options['menu_sticky'],
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[menu_sticky]', array(
	'label'             => esc_html__( 'Make Menu Sticky', 'greatnews' ),
	'section'           => 'great_news_menu',
	'on_off_label' 		=> great_news_switch_options(),
	) ) );
