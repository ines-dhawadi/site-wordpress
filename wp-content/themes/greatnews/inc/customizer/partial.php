<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Great News
* @since Great News 1.0.0
*/

    if ( ! function_exists( 'great_news_breakingnews_title_partial' ) ) :

    // headline title
    function great_news_breakingnews_title_partial() {
    $options = great_news_get_theme_options();
    return esc_html( $options['breakingnews_title'] );
    }
    endif;

    if ( ! function_exists( 'great_news_most_viewed_title_partial' ) ) :
        // most_viewed title
        function great_news_most_viewed_title_partial() {
        $options = great_news_get_theme_options();
        return esc_html( $options['most_viewed_title'] );
    }
    endif;

    if ( ! function_exists( 'great_news_reading_title_partial' ) ) :
        // reading title
        function great_news_reading_title_partial() {
        $options = great_news_get_theme_options();
        return esc_html( $options['reading_title'] );
    }
    endif;

    if ( ! function_exists( 'great_news_single_column_title_partial' ) ) :
        // reading title
        function great_news_single_column_title_partial() {
        $options = great_news_get_theme_options();
        return esc_html( $options['single_column_title'] );
    }
    endif;

    if ( ! function_exists( 'great_news_blog_title_partial' ) ) :
        // blog title
        function great_news_blog_title_partial() {
        $options = great_news_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
    endif;




if ( ! function_exists( 'great_news_copyright_text_partial' ) ) :
        // copyright text
        function great_news_copyright_text_partial() {
        $options = great_news_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
    endif;
