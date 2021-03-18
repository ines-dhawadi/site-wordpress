<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage Great News
* @since Great News 1.0.0
*/

if ( ! function_exists( 'great_news_validate_long_excerpt' ) ) :
  function great_news_validate_long_excerpt( $validity, $value ){
     $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'greatnews' ) );
     } elseif ( $value < 5 ) {
         $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'greatnews' ) );
     } elseif ( $value > 100 ) {
         $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'greatnews' ) );
     }
     return $validity;
 }
 endif;

 if ( ! function_exists( 'great_news_validate_most_viewed_count' ) ) :
  function great_news_validate_most_viewed_count( $validity, $value ){
     $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'greatnews' ) );
     } elseif ( $value < 2 ) {
         $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'greatnews' ) );
     } elseif ( $value > 6 ) {
         $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 6', 'greatnews' ) );
     }
     return $validity;
 }
 endif;

 if ( ! function_exists( 'great_news_validate_reading_post_count' ) ) :
  function great_news_validate_reading_post_count( $validity, $value ){
     $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'greatnews' ) );
     } elseif ( $value < 2 ) {
         $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'greatnews' ) );
     } elseif ( $value > 6 ) {
         $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 6', 'greatnews' ) );
     }
     return $validity;
 }
 endif;

 if ( ! function_exists( 'great_news_validate_single_column_count' ) ) :
  function great_news_validate_single_column_count( $validity, $value ){
     $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'greatnews' ) );
     } elseif ( $value < 2 ) {
         $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 2', 'greatnews' ) );
     } elseif ( $value > 8 ) {
         $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 8', 'greatnews' ) );
     }
     return $validity;
 }
 endif;

 if ( ! function_exists( 'great_news_validate_blog_count' ) ) :
  function great_news_validate_blog_count( $validity, $value ){
     $value = intval( $value );
     if ( empty( $value ) || ! is_numeric( $value ) ) {
         $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'greatnews' ) );
     } elseif ( $value < 4 ) {
         $validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of posts is 4', 'greatnews' ) );
     } elseif ( $value > 8 ) {
         $validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 8', 'greatnews' ) );
     }
     return $validity;
 }
 endif;
