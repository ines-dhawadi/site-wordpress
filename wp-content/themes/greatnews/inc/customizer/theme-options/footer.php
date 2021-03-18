<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'great_news_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'greatnews' ),
		'priority'   			=> 900,
		'panel'      			=> 'great_news_theme_options_panel',
		)
	);

// footer image setting and control.
$wp_customize->add_setting( 'great_news_theme_options[footer_image]', array(
	'sanitize_callback' => 'great_news_sanitize_image'
	) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'great_news_theme_options[footer_image]',
	array(
		'label'       		=> esc_html__( 'Site Info Logo', 'greatnews' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'greatnews' ), 188, 23 ),
		'section'     		=> 'great_news_section_footer',
		) ) );

// footer text
$wp_customize->add_setting( 'great_news_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'great_news_santize_allow_tag',
		'transport'				=> 'postMessage',
		)
	);
$wp_customize->add_control( 'great_news_theme_options[copyright_text]',
	array(
		'label'      			=> esc_html__( 'Copyright Text', 'greatnews' ),
		'section'    			=> 'great_news_section_footer',
		'type'		 			=> 'textarea',
		)
	);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'great_news_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright span',
		'settings'            => 'great_news_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'great_news_copyright_text_partial',
		) );
}

// scroll top visible
$wp_customize->add_setting( 'great_news_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'great_news_sanitize_switch_control',
		)
	);
$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[scroll_top_visible]',
	array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'greatnews' ),
		'section'    		=> 'great_news_section_footer',
		'on_off_label' 		=> great_news_switch_options(),
		)
	) );