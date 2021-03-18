<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Social Care Lite
 */

get_header(); ?>

<div class="container">
     <div id="sc_innerpage_wrap">
        <section class="sc_innerpage_contentbx">
            <div class="defaultpost_lyout">
				<?php if ( have_posts() ) : ?>
                    <header>
                        <h1 class="entry-title"><?php /* translators: %s: search term */ 
						printf( esc_attr__( 'Search Results for: %s', 'social-care-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'search' ); ?>
                    <?php endwhile; ?>
                    <?php the_posts_pagination(); ?>
                <?php else : ?>
                    <?php get_template_part( 'no-results' ); ?>
                <?php endif; ?>                  
            </div><!-- defaultpost_lyout -->
        </section>      
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->

<?php get_footer(); ?>