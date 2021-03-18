<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function great_news_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'greatnews' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function great_news_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'greatnews' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
    wp_reset_postdata();
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function great_news_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'greatnews' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if ( ! function_exists( 'great_news_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function great_news_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'greatnews' ),
            'header-font-1'   => esc_html__( 'Rajdhani', 'greatnews' ),
            'header-font-2'   => esc_html__( 'Cherry Swash', 'greatnews' ),
            'header-font-3'   => esc_html__( 'Philosopher', 'greatnews' ),
            'header-font-4'   => esc_html__( 'Slabo 27px', 'greatnews' ),
            'header-font-5'   => esc_html__( 'Dosis', 'greatnews' ),
        );

        $output = apply_filters( 'great_news_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'great_news_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function great_news_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'greatnews' ),
            'body-font-1'     => esc_html__( 'News Cycle', 'greatnews' ),
            'body-font-2'     => esc_html__( 'Pontano Sans', 'greatnews' ),
            'body-font-3'     => esc_html__( 'Gudea', 'greatnews' ),
            'body-font-4'     => esc_html__( 'Quattrocento', 'greatnews' ),
            'body-font-5'     => esc_html__( 'Khand', 'greatnews' ),
        );

        $output = apply_filters( 'great_news_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'great_news_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function great_news_site_layout() {
        $great_news_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'great_news_site_layout', $great_news_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'great_news_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function great_news_selected_sidebar() {
        $great_news_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'greatnews' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'greatnews' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'greatnews' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'greatnews' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'greatnews' ),
        );

        $output = apply_filters( 'great_news_selected_sidebar', $great_news_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'great_news_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function great_news_global_sidebar_position() {
        $great_news_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'great_news_global_sidebar_position', $great_news_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'great_news_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function great_news_sidebar_position() {
        $great_news_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'great_news_sidebar_position', $great_news_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'great_news_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function great_news_pagination_options() {
        $great_news_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'greatnews' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'greatnews' ),
        );

        $output = apply_filters( 'great_news_pagination_options', $great_news_pagination_options );

        return $output;
    }
endif;


if ( ! function_exists( 'great_news_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function great_news_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'greatnews' ),
            'off'       => esc_html__( 'Disable', 'greatnews' )
        );
        return apply_filters( 'great_news_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'great_news_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function great_news_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'greatnews' ),
            'off'       => esc_html__( 'No', 'greatnews' )
        );
        return apply_filters( 'great_news_hide_options', $arr );
    }
endif;

