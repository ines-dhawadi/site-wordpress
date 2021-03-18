<?php
/**
* Slider section
*
* This is the template for the content of slider section
*
* @package Theme Palace
* @subpackage Great News
* @since Great News 1.0.0
*/

$options = great_news_get_theme_options();

if($options['reading_section_enable'] !== false ):


$reading_post_count = ! empty( $options['reading_post_count'] ) ? $options['reading_post_count'] : 4;

$content_details = array();
$content_details['reading'] = array();
 $content_details['reading_post'] = array();

$page_id = ! empty( $options['reading_content_page'] ) ? $options['reading_content_page'] : '';
$page_ids = array();

$args = array(
    'post_type'         => 'page',
    'page_id'           => $page_id,
    'posts_per_page'    => 1,
    );                
$query = new WP_Query( $args );
if ( $query->have_posts() ) : 
    while ( $query->have_posts() ) : $query->the_post();
$reading_page_post['id']        = get_the_id();
$reading_page_post['title']     = get_the_title();
$reading_page_post['url']       = get_the_permalink();
$reading_page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

// Push to the main array.
array_push( $content_details['reading'], $reading_page_post );
endwhile;
endif;
wp_reset_postdata();



$content_details['reading_post'] = array();


$page_ids = array();

for ( $i = 1; $i <= $reading_post_count; $i++ ) {
    if ( ! empty( $options['reading_post_content_page_' . $i] ) ) :
        $page_ids[] = $options['reading_post_content_page_' . $i];
    endif;
}

$args1 = array(
    'post_type'         => 'page',
    'post__in'          => ( array ) $page_ids,
    'posts_per_page'    => absint( $reading_post_count ),
    'orderby'           => 'post__in',
    );                    

// Run The Loop.
$query = new WP_Query( $args1 );
if ( $query->have_posts() ) : 
    while ( $query->have_posts() ) : $query->the_post();
$reading_page_post['id']        = get_the_id();
$reading_page_post['title']     = get_the_title();
$reading_page_post['url']       = get_the_permalink();
$reading_page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

// Push to the main array.
array_push( $content_details['reading_post'], $reading_page_post );
endwhile;
endif;
wp_reset_postdata();
?>
<div id="reading" class="relative">
    <?php if ( ! empty( $options['reading_title'] ) ) : ?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html( $options['reading_title'] ); ?></h2>
        </div><!-- .section-header -->
    <?php endif; ?>

    <div class="reading-wrapper">
        <?php foreach ( $content_details['reading'] as $content ) : ?>
            <article class="has-post-thumbnail">
                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>

                        <div class="entry-meta">
                            <?php great_news_posted_on( $content['id'] );                             ?>
                        </div><!-- .entry-meta -->
                    </div><!-- .entry-container -->
                </div><!-- .featured-image -->
            </article>
        <?php endforeach; ?>
    </div>

    <div class="widget_recent_news col-2 clear">
        <ul>
            <?php foreach( $content_details['reading_post'] as $content ) : ?>
                <li>
                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>

                        <div class="entry-meta">
                            <?php great_news_posted_on( $content['id'] ); ?>
                        </div>
                    </div><!-- .entry-container -->
                </li>
            <?php endforeach; ?>
        </ul>
    </div><!-- .widget_recent_news -->
</div><!-- #reading -->
<?php endif; ?>