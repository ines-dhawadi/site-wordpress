<?php
/**
* Reading Post Section options
*
* @package Theme Palace
* @subpackage Great News
* @since Great News 1.0.0
*/

// Add Reading Post section
$wp_customize->add_section( 'great_news_reading_section', array(
	'title'             => esc_html__( 'Reading Post Section','greatnews' ),
	'description'       => esc_html__( 'Reading Post Section options.', 'greatnews' ),
	'panel'             => 'great_news_front_page_panel',
	) );

// Reading Post content enable control and setting
$wp_customize->add_setting( 'great_news_theme_options[reading_section_enable]', array(
	'default'			=> 	$options['reading_section_enable'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[reading_section_enable]', array(
	'label'             => esc_html__( 'Reading Post Section Enable', 'greatnews' ),
	'section'           => 'great_news_reading_section',
	'on_off_label' 		=> great_news_switch_options(),
	) ) );

// Reading Post btn title setting and control
$wp_customize->add_setting( 'great_news_theme_options[reading_title]', array(
	'default'			=> 	$options['reading_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
	) );

$wp_customize->add_control( 'great_news_theme_options[reading_title]', array(
	'label'           	=>  esc_html__( 'Title', 'greatnews' ),
	'section'        	=> 'great_news_reading_section',
	'active_callback' 	=> 'great_news_is_reading_section_enable',
	'type'				=> 'text',
	) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'great_news_theme_options[reading_title]', array(
		'selector'            => '#reading div.section-header h2.section-title',
		'settings'            => 'great_news_theme_options[reading_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'great_news_reading_title_partial',
		) );
}



// reading_logo pages drop down chooser control and setting
$wp_customize->add_setting( 'great_news_theme_options[reading_content_page]', array(
	'sanitize_callback' => 'great_news_sanitize_page',
	) );

$wp_customize->add_control( new Great_News_Dropdown_Chooser( $wp_customize, 'great_news_theme_options[reading_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'greatnews' ),
	'section'           => 'great_news_reading_section',
	'active_callback'   => 'great_news_is_reading_section_enable',
	'choices'			=> great_news_page_choices(),
	) ) );



// reading hr setting and control
$wp_customize->add_setting( 'great_news_theme_options[reading_hr]', array(
	'sanitize_callback' => 'sanitize_text_field'
	) );

$wp_customize->add_control( new Great_News_Customize_Horizontal_Line( $wp_customize, 'great_news_theme_options[reading_hr]',
	array(
		'section'         => 'great_news_reading_section',
		'active_callback' => 'great_news_is_reading_section_enable',
		'type'			  => 'hr'
		) ) );


// Event social icons number control and setting
$wp_customize->add_setting( 'great_news_theme_options[reading_post_count]', array(
	'default'          	=> $options['reading_post_count'],
	'sanitize_callback' => 'great_news_sanitize_number_range',
	'validate_callback' => 'great_news_validate_reading_post_count',
	) );

$wp_customize->add_control( 'great_news_theme_options[reading_post_count]', array(
	'label'             => esc_html__( 'Number of Related Post', 'greatnews' ),
	'description'       => esc_html__( 'Note: Min 2 & Max 6. Please input the valid number and save. Then refresh the page to see the change.', 'greatnews' ),
	'section'           => 'great_news_reading_section',
	'active_callback'   => 'great_news_is_reading_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 2,
		'max'	=> 6,
		'style' => 'width: 100px;'
		),
	) );

for ( $i = 1; $i <= $options['reading_post_count']; $i++ ) :

// reading_logo pages drop down chooser control and setting
	$wp_customize->add_setting( 'great_news_theme_options[reading_post_content_page_' . $i . ']', array(
		'sanitize_callback' => 'great_news_sanitize_page',
		) );

		$wp_customize->add_control( new Great_News_Dropdown_Chooser( $wp_customize, 'great_news_theme_options[reading_post_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'greatnews' ), $i ),
		'section'           => 'great_news_reading_section',
		'active_callback'   => 'great_news_is_reading_section_enable',
		'choices'			=> great_news_page_choices(),
		) ) );

endfor;





