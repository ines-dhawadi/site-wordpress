<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Great News
	 * @since Great News 1.0.0
	 */

	/**
	 * great_news_doctype hook
	 *
	 * @hooked great_news_doctype -  10
	 *
	 */
	do_action( 'great_news_doctype' );

?>
<head>
<?php
	/**
	 * great_news_before_wp_head hook
	 *
	 * @hooked great_news_head -  10
	 *
	 */
	do_action( 'great_news_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * great_news_page_start_action hook
	 *
	 * @hooked great_news_page_start -  10
	 *
	 */
	do_action( 'great_news_page_start_action' ); 

	/**
	 * great_news_loader_action hook
	 *
	 * @hooked great_news_loader -  10
	 *
	 */
	do_action( 'great_news_before_header' );

	/**
	 * great_news_header_action hook
	 *
	 * @hooked great_news_header_start -  10
	 * @hooked great_news_site_branding -  20
	 * @hooked great_news_site_navigation -  30
	 * @hooked great_news_header_end -  50
	 *
	 */
	do_action( 'great_news_header_action' );

	/**
	 * great_news_content_start_action hook
	 *
	 * @hooked great_news_content_start -  10
	 *
	 */
	do_action( 'great_news_content_start_action' );

	/**
	 * great_news_header_image_action hook
	 *
	 * @hooked great_news_header_image -  10
	 *
	 */
	do_action( 'great_news_header_image_action' );

    if ( great_news_is_frontpage() ) {
    	$options = great_news_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'great_news_primary_content', 'great_news_add_'. $section .'_section' );
		}
		do_action( 'great_news_primary_content' );
	}