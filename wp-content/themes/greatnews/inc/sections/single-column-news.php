<?php
/**
* Single Column News section
*
* This is the template for the content of featured_story section
*
* @package Theme Palace
* @subpackage Great News
* @since Great News 1.0.0
*/

$options = great_news_get_theme_options();
if( $options['single_column_section_enable'] !== false ):

$single_column_count = ! empty( $options['single_column_count'] ) ? $options['single_column_count'] : 3;

$content_details = array();



$page_ids = array();

for ( $i = 1; $i <= $single_column_count; $i++ ) {
    if ( ! empty( $options['single_column_content_page_' . $i] ) )
        $page_ids[] = $options['single_column_content_page_' . $i];
}

$args = array(
    'post_type'         => 'page',
    'post__in'          => ( array ) $page_ids,
    'posts_per_page'    => absint( $single_column_count ),
    'orderby'           => 'post__in',
    );                    


// Run The Loop.
$query = new WP_Query( $args );
if ( $query->have_posts() ) : 
    while ( $query->have_posts() ) : $query->the_post();
$page_post['id']        = get_the_id();
$page_post['auth_id']   = get_the_author_meta('ID');
$page_post['title']     = get_the_title();
$page_post['url']       = get_the_permalink();
$page_post['excerpt']   = great_news_trim_content( 25 );
$page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

// Push to the main array.
array_push( $content_details, $page_post );
endwhile;
endif;
wp_reset_postdata();
?>

<div id="single-column-news" class="grid-layout">
    <?php if ( ! empty( $options['single_column_title'] ) ) : ?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html( $options['single_column_title'] ); ?></h2>
        </div><!-- .section-header -->
    <?php endif; ?>

    <div class="section-content col-2 clear">

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
                    </div><!-- .entry-content -->

                    <div class="entry-meta">
                        <?php great_news_posted_on( $content['id'] ); ?>
                    </div><!-- .entry-meta -->
                </div><!-- .entry-container -->
            </article>
        <?php endforeach; ?>

    </div><!-- .section-content -->
</div><!-- #most-viewed-posts -->

<?php endif; ?>
