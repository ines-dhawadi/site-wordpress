<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Great News
* @since Great News 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'great_news_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'great_news_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
	) );

$wp_customize->add_control( 'great_news_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'greatnews' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'greatnews' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
	) );