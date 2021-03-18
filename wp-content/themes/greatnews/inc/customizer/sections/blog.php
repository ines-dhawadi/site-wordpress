<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'great_news_blog_section', array(
	'title'             => esc_html__( 'Related Post/Blog','greatnews' ),
	'description'       => esc_html__( 'Blog Section options.', 'greatnews' ),
	'panel'             => 'great_news_front_page_panel',
	) );

// Blog content enable control and setting
$wp_customize->add_setting( 'great_news_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'great_news_sanitize_switch_control',
	) );

$wp_customize->add_control( new Great_News_Switch_Control( $wp_customize, 'great_news_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'greatnews' ),
	'section'           => 'great_news_blog_section',
	'on_off_label' 		=> great_news_switch_options(),
	) ) );

// blog title setting and control
$wp_customize->add_setting( 'great_news_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
	) );

$wp_customize->add_control( 'great_news_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'greatnews' ),
	'section'        	=> 'great_news_blog_section',
	'active_callback' 	=> 'great_news_is_blog_section_enable',
	'type'				=> 'text',
	) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'great_news_theme_options[blog_title]', array(
		'selector'            => '#related-posts div.section-header h2.section-title',
		'settings'            => 'great_news_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'great_news_blog_title_partial',
		) );
}

// Event social icons number control and setting
$wp_customize->add_setting( 'great_news_theme_options[blog_count]', array(
	'default'          	=> $options['blog_count'],
	'sanitize_callback' => 'great_news_sanitize_number_range',
	'validate_callback' => 'great_news_validate_blog_count',
	) );

$wp_customize->add_control( 'great_news_theme_options[blog_count]', array(
	'label'             => esc_html__( 'Number of Posts', 'greatnews' ),
	'description'       => esc_html__( 'Note: Min 4 & Max 8. Please input the valid number and save. Then refresh the page to see the change.', 'greatnews' ),
	'section'           => 'great_news_blog_section',
	'active_callback'   => 'great_news_is_blog_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 4,
		'max'	=> 8,
		'style' => 'width: 100px;'
		),
	) );

// Blog content type control and setting
$wp_customize->add_setting( 'great_news_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'great_news_sanitize_select',
	) );

$wp_customize->add_control( 'great_news_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'greatnews' ),
	'section'           => 'great_news_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'great_news_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'greatnews' ),
		'recent' 	=> esc_html__( 'Recent', 'greatnews' ),
		),
	) );


// Add dropdown category setting and control.
$wp_customize->add_setting(  'great_news_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'great_news_sanitize_single_category',
	) ) ;

$wp_customize->add_control( new Great_News_Dropdown_Taxonomies_Control( $wp_customize,'great_news_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'greatnews' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'greatnews' ),
	'section'           => 'great_news_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'great_news_is_blog_section_content_category_enable'
	) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'great_news_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'great_news_sanitize_category_list',
	) ) ;

$wp_customize->add_control( new Great_News_Dropdown_Category_Control( $wp_customize,'great_news_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'greatnews' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press CTRL key select multilple categories.', 'greatnews' ),
	'section'           => 'great_news_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'great_news_is_blog_section_content_recent_enable'
	) ) );