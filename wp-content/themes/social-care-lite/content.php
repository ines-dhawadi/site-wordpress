<?php
/**
 * @package Social Care Lite
 */
?>
 <div class="blogpost_lyout">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
        
        <header class="entry-header">           
            <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            <?php if ( 'post' == get_post_type() ) : ?>
                <div class="postmeta">
                    <div class="post-date"><?php the_date(); ?></div><!-- post-date --> 
                    <?php edit_post_link( __( 'Edit', 'social-care-lite' ), '<span class="edit-link">', '</span>' ); ?>                                                     
                </div><!-- postmeta -->
            <?php endif; ?>
        </header><!-- .entry-header -->
        
         <?php if (has_post_thumbnail() ){ ?>
			<div class="post-thumb">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
		<?php }  ?> 
          
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
           	<?php the_content(); ?> 
                         
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'social-care-lite' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'social-care-lite' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php endif; ?>
        <div class="clear"></div>
    </article><!-- #post-## -->
</div><!-- .blogpost_lyout-->