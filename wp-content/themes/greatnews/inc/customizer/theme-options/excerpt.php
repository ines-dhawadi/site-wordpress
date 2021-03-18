<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'great_news_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','greatnews' ),
	'description'       => esc_html__( 'Excerpt section options.', 'greatnews' ),
	'panel'             => 'great_news_theme_options_panel',
	) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'great_news_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'great_news_sanitize_number_range',
	'validate_callback' => 'great_news_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
	) );

$wp_customize->add_control( 'great_news_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'greatnews' ),
	'description' 		=> esc_html__( 'Note: Min 5 & Max 100. Total words to be displayed in archive page/search page.', 'greatnews' ),
	'section'     		=> 'great_news_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
		),
	) );
