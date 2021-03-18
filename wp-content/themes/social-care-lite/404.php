<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Social Care Lite
 */

get_header(); ?>

<div class="container">
    <div id="sc_innerpage_wrap">
        <section class="sc_innerpage_contentbx">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'social-care-lite' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn.....<br />Don\'t worry... it happens to the best of us.', 'social-care-lite' ); ?></p>  
            </div><!-- .page-content -->
        </section>
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>