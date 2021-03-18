<?php
/**
 * Hero section
 *
 * This is the template for the content of hero section
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */
if ( ! function_exists( 'great_news_add_hero_section' ) ) :
    /**
    * Add hero section
    *
    *@since Great News 1.0.0
    */
    function great_news_add_hero_section() {
    	$options = great_news_get_theme_options();
        // Check if hero is enabled on frontpage
        $hero_enable = apply_filters( 'great_news_section_status', true, 'hero_section_enable' );

        if ( true !== $hero_enable ) {
            return false;
        }
        // Get hero section details
        $section_details = array();
        $section_details = apply_filters( 'great_news_filter_hero_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render hero section now.
        great_news_render_hero_section( $section_details );
    }
endif;

if ( ! function_exists( 'great_news_get_hero_section_details' ) ) :
    /**
    * hero section details.
    *
    * @since Great News 1.0.0
    * @param array $input hero section details.
    */
    function great_news_get_hero_section_details( $input ) {
        $options = great_news_get_theme_options();
        
        $content = array();
      
        $page_ids = array();

        for ( $i = 1; $i <= 5; $i++ ) {
            if ( ! empty( $options['hero_content_page_' . $i] ) )
                $page_ids[] = $options['hero_content_page_' . $i];
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
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['auth_id']   = get_the_author_meta('ID');
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = great_news_trim_content( 20 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// hero section content details.
add_filter( 'great_news_filter_hero_section_details', 'great_news_get_hero_section_details' );


if ( ! function_exists( 'great_news_render_hero_section' ) ) :
  /**
   * Start hero section
   *
   * @return string hero content
   * @since Great News 1.0.0
   *
   */
   function great_news_render_hero_section( $content_details = array() ) {
        $options = great_news_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="hero-section" class="relative">
            <div class="wrapper">
                <div class="grid">
                    <?php foreach ( $content_details as $content ) : ?>

                        <article class="grid-item">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');"></div>
                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-meta">
                                    <?php great_news_posted_on( $content['id'] ); ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-container -->
                        </article>

                    <?php endforeach; ?>
                </div><!-- .grid-item -->
            </div><!-- .wrapper -->
        </div><!-- #hero-section -->

    <?php }
endif;