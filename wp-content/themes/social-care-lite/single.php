<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Social Care Lite
 */

get_header(); ?>

<div class="container">
     <div id="sc_innerpage_wrap">
        <section class="sc_innerpage_contentbx">            
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'single' ); ?>
                    <?php the_post_navigation(); ?>
                    <div class="clear"></div>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>                  
         </section>       
        <?php get_sidebar();?>
       
        <div class="clear"></div>
    </div><!-- sc_innerpage_wrap -->
</div><!-- container -->	
<?php get_footer(); ?>