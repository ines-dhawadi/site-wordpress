<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 * @return array An array of default values
 */

function great_news_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$great_news_default_options = array(
		// Color Options
		'header_title_color'			=> '#fff',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',
		'colorscheme_hue'				=> '#ff4443',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,

		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'greatnews' ), '[the-year]', '[site-link]' ) . esc_html__( 'All Rights Reserved | ', 'greatnews' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'greatnews' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'breakingnews,hero,main_post_wrapper,blog',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'greatnews' ),
		'hide_category'					=> false,
		'hide_date'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_disable_featured_image'	=> false,

		/* Front Page */

		// Topbar
		'topbar_section_enable'			=> false,
		'secondary_menu_enable'			=> false,
		'social_menu_enable'			=> false,
		'login_text'					=> esc_html__( 'Log In', 'greatnews' ),
		'login_url'						=> '',

		// Breakingnews
		'breakingnews_section_enable'		=> false,
		'breakingnews_slider_auto_play'		=> false,
		'breakingnews_title'				=> esc_html__( 'Breaking News', 'greatnews' ),

		// hero section
		'hero_section_enable'			=> false,

		//reading section
		'reading_section_enable'		=> false,
		'reading_title'					=> esc_html__( 'WORTH READING', 'greatnews' ),
		'reading_post_count'			=> 4,

		// Single column
		'single_column_section_enable' => false,
		'single_column_title'		=> esc_html__( 'SINGLE COLUMN NEWS', 'greatnews' ),
		'single_column_count'			=> 4,


		// most_viewed
		'most_viewed_section_enable'			=> false,
		'most_viewed_title'					=> esc_html__( '2 COLUMN NEWS', 'greatnews' ),
		'most_viewed_count'					=> 4,

		// blog
		'blog_section_enable'			=> false,
		'blog_title'					=> esc_html__( 'Related Posts', 'greatnews' ),
		'blog_content_type'				=> 'recent',
		'blog_count'					=> 4,


		);

$output = apply_filters( 'great_news_default_theme_options', $great_news_default_options );

	// Sort array in ascending order, according to the key:
if ( ! empty( $output ) ) {
	ksort( $output );
}

return $output;
}