<?php
/**
 * Breakingnews section
 *
 * This is the template for the content of breakingnews section
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */
if ( ! function_exists( 'great_news_add_breakingnews_section' ) ) :
    /**
    * Add breakingnews section
    *
    *@since Great News 1.0.0
    */
    function great_news_add_breakingnews_section() {
    	$options = great_news_get_theme_options();
        // Check if breakingnews is enabled on frontpage
        $breakingnews_enable = apply_filters( 'great_news_section_status', true, 'breakingnews_section_enable' );

        if ( true !== $breakingnews_enable ) {
            return false;
        }
        // Get breakingnews section details
        $section_details = array();
        $section_details = apply_filters( 'great_news_filter_breakingnews_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render breakingnews section now.
        great_news_render_breakingnews_section( $section_details );
    }
endif;

if ( ! function_exists( 'great_news_get_breakingnews_section_details' ) ) :
    /**
    * breakingnews section details.
    *
    * @since Great News 1.0.0
    * @param array $input breakingnews section details.
    */
    function great_news_get_breakingnews_section_details( $input ) {
        $options = great_news_get_theme_options();

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 5; $i++ ) {
            if ( ! empty( $options['breakingnews_content_page_' . $i] ) )
                $page_ids[] = $options['breakingnews_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 5,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// breakingnews section content details.
add_filter( 'great_news_filter_breakingnews_section_details', 'great_news_get_breakingnews_section_details' );


if ( ! function_exists( 'great_news_render_breakingnews_section' ) ) :
  /**
   * Start breakingnews section
   *
   * @return string breakingnews content
   * @since Great News 1.0.0
   *
   */
   function great_news_render_breakingnews_section( $content_details = array() ) {
        $options = great_news_get_theme_options();
        $title = ! empty( $options['breakingnews_title'] ) ? $options['breakingnews_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="breaking-news" class="relative wrapper">
            <div class="breaking-news-wrapper">
                <h2 class="news-title"><?php echo esc_html( $title ); ?></h2>
                <div class="breaking-news-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": <?php echo $options['breakingnews_slider_auto_play'] ? 'true' : 'false'; ?>, "draggable": true, "fade": true }'>
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="breaking-news-item-wrapper">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>
                            </div><!-- .breaking-news-item-wrapper -->
                        </article>
                    <?php endforeach; ?>

                </div><!-- .breaking-news-slider -->
            </div><!-- .breaking-news-wrapper -->
        </div><!-- #breaking-news -->
        
    <?php }
endif;