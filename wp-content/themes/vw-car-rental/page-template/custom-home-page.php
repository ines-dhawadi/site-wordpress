<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_car_rental_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_car_rental_slider_hide_show') != '') { ?>

  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod( 'vw_car_rental_slider_speed',3000)) ?>"> 
      <?php $vw_car_rental_slider_pages = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_car_rental_slider_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $vw_car_rental_slider_pages[] = $mod;
          }
        }
        if( !empty($vw_car_rental_slider_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_car_rental_slider_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_car_rental_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_car_rental_slider_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('vw_car_rental_slider_button_text','LEARN MORE') != ''){ ?>
                  <div class="more-btn">
                    <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_car_rental_slider_button_text',__('LEARN MORE','vw-car-rental')));?><i class="<?php echo esc_attr(get_theme_mod('vw_car_rental_slider_button_icon','fa fa-angle-right')); ?>"></i>
                    <span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_car_rental_slider_button_text',__('LEARN MORE','vw-car-rental')));?></span></a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
          <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-car-rental' );?></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-car-rental' );?></span>
      </a>
    </div>
    <div class="clearfix"></div>
  </section>

  <?php } ?>

  <?php do_action( 'vw_car_rental_after_slider' ); ?>

  <?php if(get_theme_mod('vw_car_rental_category') != ''){ ?>

  <section id="category-sec">
    <div class="container">
      <div class="row m-0">
        <?php
          $vw_car_rental_catData =  get_theme_mod('vw_car_rental_category','');
          if($vw_car_rental_catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html($vw_car_rental_catData,'vw-car-rental'))); ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-4 category_main p-0">
              <div class="catgory-box">
                <?php the_post_thumbnail(); ?>
                <h2><?php the_title(); ?></h2>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_car_rental_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_car_rental_category_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('vw_car_rental_category_button_text','READ MORE') != ''){ ?>
                  <div class="category-btn">
                    <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_car_rental_category_button_text',__('READ MORE','vw-car-rental')));?><i class="<?php echo esc_attr(get_theme_mod('vw_car_rental_category_btn_icon','fa fa-angle-right')); ?>"></i>
                    <span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_car_rental_category_button_text',__('READ MORE','vw-car-rental')));?></span></a>
                  </div>  
                <?php } ?>            
              </div>
              <hr>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php }?>

  <?php do_action( 'vw_car_rental_after_category' ); ?>

  <?php if(get_theme_mod('vw_car_rental_services') != ''){ ?>

  <section id="service-sec">
    <div class="container">
      <?php if(get_theme_mod('vw_car_rental_section_title') != ''){ ?>
        <h3><?php echo esc_html(get_theme_mod('vw_car_rental_section_title',''));?></h3>
      <?php }?>
      <div class="row m-0">
        <?php
          $vw_car_rental_catData =  get_theme_mod('vw_car_rental_services','');
          if($vw_car_rental_catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html($vw_car_rental_catData,'vw-car-rental'))); ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-4 service_main">
              <div class="service-box">
                <?php the_post_thumbnail(); ?>
                <h4><?php the_title(); ?></h4>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_car_rental_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_car_rental_services_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('vw_car_rental_services_button_text','LEARN MORE') != ''){ ?>
                  <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_car_rental_services_button_text',__('LEARN MORE','vw-car-rental')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_car_rental_services_button_text',__('LEARN MORE','vw-car-rental')));?></span></a>
                <?php } ?>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>

  <?php }?>

  <?php do_action( 'vw_car_rental_after_services' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>