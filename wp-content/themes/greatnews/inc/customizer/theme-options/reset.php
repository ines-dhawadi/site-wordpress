<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'great_news_reset_section', array(
	'title'             => esc_html__('Reset all settings','greatnews'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'greatnews' ),
	) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'great_news_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'great_news_sanitize_checkbox',
	'transport'			  => 'postMessage',
	) );

$wp_customize->add_control( 'great_news_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'greatnews' ),
	'section'           => 'great_news_reset_section',
	'type'              => 'checkbox',
	) );
