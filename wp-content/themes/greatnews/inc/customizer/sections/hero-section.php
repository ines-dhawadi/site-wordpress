<?php
/**
 * Hero Section options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add Hero section
$wp_customize->add_section( 'great_news_hero_section', array(
	'title'             => esc_html__( 'Hero Section','greatnews' ),
	'description'       => esc_html__( 'Hero Section options.', 'greatnews' ),
	'panel'             => 'great_news_front_page_panel',
	) );

// Hero content enable control and setting
$wp_customize->add_setting( 'great_news_theme_options[hero_section_enable]', array(
	'default'			=> 	$options['hero_section_enable'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[hero_section_enable]', array(
	'label'             => esc_html__( 'Hero Section Enable', 'greatnews' ),
	'section'           => 'great_news_hero_section',
	'on_off_label' 		=> great_news_switch_options(),
	) ) );


for ( $i = 1; $i <= 5; $i++ ) :
	// hero pages drop down chooser control and setting
$wp_customize->add_setting( 'great_news_theme_options[hero_content_page_' . $i . ']', array(
	'sanitize_callback' => 'great_news_sanitize_page',
	) );

$wp_customize->add_control( new Great_News_Dropdown_Chooser( $wp_customize, 'great_news_theme_options[hero_content_page_' . $i . ']', array(
	'label'             => sprintf( esc_html__( 'Select Page %d', 'greatnews' ), $i ),
	'section'           => 'great_news_hero_section',
	'active_callback' 	=> 'great_news_is_hero_section_enable',
	'choices'			=> great_news_page_choices(),
	) ) );

endfor;
