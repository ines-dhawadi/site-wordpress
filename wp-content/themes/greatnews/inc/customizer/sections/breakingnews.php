<?php
/**
 * Breakingnews Section options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add Breakingnews section
$wp_customize->add_section( 'great_news_breakingnews_section', array(
	'title'             => esc_html__( 'Breakingnews','greatnews' ),
	'description'       => esc_html__( 'Breakingnews Section options.', 'greatnews' ),
	'panel'             => 'great_news_front_page_panel',
	) );

// Breakingnews content enable control and setting
$wp_customize->add_setting( 'great_news_theme_options[breakingnews_section_enable]', array(
	'default'			=> 	$options['breakingnews_section_enable'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[breakingnews_section_enable]', array(
	'label'             => esc_html__( 'Breakingnews Section Enable', 'greatnews' ),
	'section'           => 'great_news_breakingnews_section',
	'on_off_label' 		=> great_news_switch_options(),
	) ) );

// breakingnews title setting and control
$wp_customize->add_setting( 'great_news_theme_options[breakingnews_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['breakingnews_title'],
	'transport'			=> 'postMessage',
	) );

$wp_customize->add_control( 'great_news_theme_options[breakingnews_title]', array(
	'label'           	=> esc_html__( 'Title', 'greatnews' ),
	'section'        	=> 'great_news_breakingnews_section',
	'active_callback' 	=> 'great_news_is_breakingnews_section_enable',
	'type'				=> 'text',
	) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'great_news_theme_options[breakingnews_title]', array(
		'selector'            => '#breaking-news .breaking-news-wrapper h2.news-title',
		'settings'            => 'great_news_theme_options[breakingnews_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'great_news_breakingnews_title_partial',
		) );
}

// Breaking News Slider auto play enable control and setting
$wp_customize->add_setting( 'great_news_theme_options[breakingnews_slider_auto_play]', array(
	'default'			=> 	$options['breakingnews_slider_auto_play'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[breakingnews_slider_auto_play]', array(
	'label'             => esc_html__( 'Auto Play Enable', 'greatnews' ),
	'section'           => 'great_news_breakingnews_section',
	'on_off_label' 		=> great_news_switch_options(),
	'active_callback'   => 'great_news_is_breakingnews_section_enable',
	) ) );



for ( $i = 1; $i <= 5 ; $i++ ) :

	// breakingnews pages drop down chooser control and setting
	$wp_customize->add_setting( 'great_news_theme_options[breakingnews_content_page_' . $i . ']', array(
		'sanitize_callback' => 'great_news_sanitize_page',
		) );

	$wp_customize->add_control( new Great_News_Dropdown_Chooser( $wp_customize, 'great_news_theme_options[breakingnews_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'greatnews' ), $i ),
		'section'           => 'great_news_breakingnews_section',
		'active_callback' 	=> 'great_news_is_breakingnews_section_enable',
		'choices'			=> great_news_page_choices(),
		) ) );

endfor;



