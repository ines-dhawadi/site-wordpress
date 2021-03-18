<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

if ( ! function_exists( 'great_news_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Greatnews 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function great_news_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'great_news_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'great_news_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Great News 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
function great_news_is_loader_enable( $control ) {
	return $control->manager->get_setting( 'great_news_theme_options[loader_enable]' )->value();
}
endif;

if ( ! function_exists( 'great_news_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Great News 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
function great_news_is_pagination_enable( $control ) {
	return $control->manager->get_setting( 'great_news_theme_options[pagination_enable]' )->value();
}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if topbar section is enabled.
 *
 * @since Great News 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function great_news_is_topbar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'great_news_theme_options[topbar_section_enable]' )->value() );
}

/**
 * Check if breakingnews section is enabled.
 *
 * @since Great News 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function great_news_is_breakingnews_section_enable( $control ) {
	return ( $control->manager->get_setting( 'great_news_theme_options[breakingnews_section_enable]' )->value() );
}



/**
 * Check if hero section is enabled.
 *
 * @since Great News 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function great_news_is_hero_section_enable( $control ) {
	return ( $control->manager->get_setting( 'great_news_theme_options[hero_section_enable]' )->value() );
}


/**
 * Check if most viewed section is enabled.
 *
 * @since Great News 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function great_news_is_most_viewed_section_enable( $control ) {
	return ( $control->manager->get_setting( 'great_news_theme_options[most_viewed_section_enable]' )->value() );
}

/**
 * Check if reading section is enabled.
 *
 * @since Greatnews Book Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function great_news_is_reading_section_enable( $control ) {
	return ( $control->manager->get_setting( 'great_news_theme_options[reading_section_enable]' )->value() );
}



/**
 * Check if single_column section is enabled.
 *
 * @since Great News 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function great_news_is_single_column_section_enable( $control ) {
	return ( $control->manager->get_setting( 'great_news_theme_options[single_column_section_enable]' )->value() );
}


/**
 * Check if blog section is enabled.
 *
 * @since Great News 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function great_news_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'great_news_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Great News 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function great_news_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'great_news_theme_options[blog_content_type]' )->value();
	return great_news_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Great News 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function great_news_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'great_news_theme_options[blog_content_type]' )->value();
	return great_news_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}
