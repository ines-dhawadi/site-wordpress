<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

/**
 * great_news_footer_primary_content hook
 *
 * @hooked great_news_add_contact_section -  10
 *
 */
do_action( 'great_news_footer_primary_content' );

/**
 * great_news_content_end_action hook
 *
 * @hooked great_news_content_end -  10
 *
 */
do_action( 'great_news_content_end_action' );

/**
 * great_news_content_end_action hook
 *
 * @hooked great_news_footer_start -  10
 * @hooked great_news_Footer_Widgets->add_footer_widgets -  20
 * @hooked great_news_footer_site_info -  40
 * @hooked great_news_footer_end -  100
 *
 */
do_action( 'great_news_footer' );

/**
 * great_news_page_end_action hook
 *
 * @hooked great_news_page_end -  10
 *
 */
do_action( 'great_news_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
