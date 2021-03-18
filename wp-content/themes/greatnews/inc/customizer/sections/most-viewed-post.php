<?php
/**
 * Most Viewed Section options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add Most Viewed section
$wp_customize->add_section( 'great_news_most_viewed_section', array(
	'title'             => esc_html__( 'Most Viewed','greatnews' ),
	'description'       => esc_html__( 'Most Viewed Section options.', 'greatnews' ),
	'panel'             => 'great_news_front_page_panel',
	) );

// Most Viewed content enable control and setting
$wp_customize->add_setting( 'great_news_theme_options[most_viewed_section_enable]', array(
	'default'			=> 	$options['most_viewed_section_enable'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[most_viewed_section_enable]', array(
	'label'             => esc_html__( 'Most Viewed Section Enable', 'greatnews' ),
	'section'           => 'great_news_most_viewed_section',
	'on_off_label' 		=> great_news_switch_options(),
	) ) );

// most_viewed title setting and control
$wp_customize->add_setting( 'great_news_theme_options[most_viewed_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['most_viewed_title'],
	'transport'			=> 'postMessage',
	) );

$wp_customize->add_control( 'great_news_theme_options[most_viewed_title]', array(
	'label'           	=> esc_html__( 'Title', 'greatnews' ),
	'section'        	=> 'great_news_most_viewed_section',
	'active_callback' 	=> 'great_news_is_most_viewed_section_enable',
	'type'				=> 'text',
	) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'great_news_theme_options[most_viewed_title]', array(
		'selector'            => '#most-viewed-posts div.section-header h2.section-title',
		'settings'            => 'great_news_theme_options[most_viewed_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'great_news_most_viewed_title_partial',
		) );
}

// Event social icons number control and setting
$wp_customize->add_setting( 'great_news_theme_options[most_viewed_count]', array(
	'default'          	=> $options['most_viewed_count'],
	'sanitize_callback' => 'great_news_sanitize_number_range',
	'validate_callback' => 'great_news_validate_most_viewed_count',
	) );

$wp_customize->add_control( 'great_news_theme_options[most_viewed_count]', array(
	'label'             => esc_html__( 'Number of Posts', 'greatnews' ),
	'description'       => esc_html__( 'Note: Min 2 & Max 6. Please input the valid number and save. Then refresh the page to see the change.', 'greatnews' ),
	'section'           => 'great_news_most_viewed_section',
	'active_callback'   => 'great_news_is_most_viewed_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 2,
		'max'	=> 6,
		'style' => 'width: 100px;'
		),
	) );


for ( $i = 1; $i <= $options['most_viewed_count']; $i++ ) :
	// most_viewed pages drop down chooser control and setting
	$wp_customize->add_setting( 'great_news_theme_options[most_viewed_content_page_' . $i . ']', array(
		'sanitize_callback' => 'great_news_sanitize_page',
		) );

	$wp_customize->add_control( new Great_News_Dropdown_Chooser( $wp_customize, 'great_news_theme_options[most_viewed_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'greatnews' ), $i ),
		'section'           => 'great_news_most_viewed_section',
		'active_callback'   => 'great_news_is_most_viewed_section_enable',
		'choices'			=> great_news_page_choices(),
		) ) );

endfor;
