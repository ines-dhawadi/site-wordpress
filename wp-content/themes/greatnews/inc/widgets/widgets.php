<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Great News
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';

/*
 * Add Popular Posts widget
 */
require get_template_directory() . '/inc/widgets/popular-posts-widget.php';

/*
 * Add Recent News sidebar widget
 */
require get_template_directory() . '/inc/widgets/recent-news-widget.php';


/**
 * Register widgets
 */
function great_news_register_widgets() {

	register_widget( 'Great_News_Latest_Post' );

	register_widget( 'Great_News_Popular_Post' );
	
	register_widget( 'Great_News_Recent_News_Post' );

}
add_action( 'widgets_init', 'great_news_register_widgets' );