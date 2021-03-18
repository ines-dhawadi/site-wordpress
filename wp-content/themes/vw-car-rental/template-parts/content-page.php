<?php
/**
 * The template part for displaying page content
 *
 * @package VW Car Rental
 * @subpackage vw_car_rental
 * @since VW Car Rental 1.0
 */
?>

<div class="content-vw">  
  <?php the_post_thumbnail(); ?>
  <h1><?php the_title();?></h1>
  <div class="entry-content"><?php the_content();?></div>
  <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
       comments_template();
    endif;
  ?>
  <div class="clearfix"></div>
</div>