<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */
if ( ! function_exists( 'great_news_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Great News 1.0.0
    */
    function great_news_add_blog_section() {
    	$options = great_news_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'great_news_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'great_news_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        great_news_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'great_news_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Great News 1.0.0
    * @param array $input blog section details.
    */
    function great_news_get_blog_section_details( $input ) {
        $options = great_news_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        $blog_count = ! empty( $options['blog_count'] ) ? $options['blog_count'] : 4;
        
        $content = array();
        switch ( $blog_content_type ) {

            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'category__not_in'  => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }

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
// blog section content details.
add_filter( 'great_news_filter_blog_section_details', 'great_news_get_blog_section_details' );


if ( ! function_exists( 'great_news_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Great News 1.0.0
   *
   */
   function great_news_render_blog_section( $content_details = array() ) {
        $options = great_news_get_theme_options();
        $blog_content_type  = $options['blog_content_type'];

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="related-posts" class="grid-layout">
            <div class="wrapper">
                <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content col-4 clear">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="has-post-thumbnail">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div>

                                <div class="entry-meta">
                                    <?php great_news_posted_on( $content['id'] ); ?>
                                    <span class="cat-links">
                                        <?php the_category( '', '', $content['id'] ); ?>
                                    </span><!-- .cat-links -->
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-container -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #most-viewed-posts -->
    
    <?php }
endif;