<?php
/**
* Main Post section
*
* This is the template for the content of main_content section
*
* @package Theme Palace
* @subpackage Greatnews Book Pro
* @since Greatnews Book Pro 1.0.0
*/
if ( ! function_exists( 'great_news_add_main_post_wrapper_section' ) ) :
/**
* Add main_content section
*
*@since Greatnews Book Pro 1.0.0
*/
function great_news_add_main_post_wrapper_section() {

  great_news_render_main_content_section();
}
endif;

if ( ! function_exists( 'great_news_render_main_content_section' ) ) :
/**
* Start main_content section
*
* @return string main_content content
* @since Greatnews Book Pro 1.0.0
*
*/
function great_news_render_main_content_section() {
  ?>
  <div id="main-post-wrapper" class="wrapper">

    <?php if(is_active_sidebar('left-main-post-wrapper')): ?>
      <aside id="left-sidebar" class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'left-main-post-wrapper' ); ?>

      </aside><!-- #secondary sidebar -->

    <?php endif; ?>

    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">

        <!-- most-viewed-post -->
        <?php require get_template_directory() . '/inc/sections/most-viewed-post.php'; ?>

        <?php require get_template_directory() . '/inc/sections/reading.php'; ?>
        
        <!-- single column news -->
        <?php require get_template_directory() . '/inc/sections/single-column-news.php'; ?>

      </main><!-- #main -->
    </div><!-- #primary -->

    <?php if(is_active_sidebar('right-main-post-wrapper')): ?>
      <aside id="secondary" class="widget-area right-sidebar" role="complementary">
        <?php dynamic_sidebar( 'right-main-post-wrapper' ); ?>

      </aside><!-- #secondary sidebar -->

    <?php endif; ?>

  </div><!-- #main-post-wrapper -->

  <?php }
  endif;