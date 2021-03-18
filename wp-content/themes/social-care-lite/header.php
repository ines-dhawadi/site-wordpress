<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Social Care Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	}
?>
<a class="skip-link screen-reader-text" href="#sc_innerpage_wrap">
<?php esc_html_e( 'Skip to content', 'social-care-lite' ); ?>
</a>
<?php
$social_care_lite_show_header_contact_info 	  			= get_theme_mod('social_care_lite_show_header_contact_info', false);
$social_care_lite_showslide_area 	  		            = get_theme_mod('social_care_lite_showslide_area', false);
$social_care_lite_show_5colmission_section 	  	        = get_theme_mod('social_care_lite_show_5colmission_section', false);
$social_care_lite_show_aboutus_pagebox	                = get_theme_mod('social_care_lite_show_aboutus_pagebox', false);
$social_care_lite_show_current_project_section 	  	    = get_theme_mod('social_care_lite_show_current_project_section', false);
$social_care_lite_show_socialsection 	  			    = get_theme_mod('social_care_lite_show_socialsection', false);
?>
<div id="sitelayout_type" <?php if( get_theme_mod( 'social_care_lite_boxlayout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($social_care_lite_showslide_area)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo esc_attr($inner_cls); ?>">  
<div class="header-top">
  <div class="container"> 
    <div class="left">
    
    <div class="news-marquee">
       <div class="news-title"><span><?php esc_html_e('News','social-care-lite'); ?></span></div>
       <marquee behavior="scroll" direction="left" onMouseOver="this.stop();" onMouseOut="this.start();">
	   <?php while ( have_posts() ) : the_post(); ?>
         <?php the_title(); ?>  &nbsp; &nbsp; | &nbsp; &nbsp;
       <?php endwhile; // end of the loop. ?>             
       </marquee>
    </div>
    
    
    </div> 
    <div class="right">
      <?php if( $social_care_lite_show_socialsection != ''){ ?> 
           <div class="header-socialicons">                                                
                   <?php $social_care_lite_fb_link = get_theme_mod('social_care_lite_fb_link');
                    if( !empty($social_care_lite_fb_link) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($social_care_lite_fb_link); ?>"></a>
                   <?php } ?>
                
                   <?php $social_care_lite_twitt_link = get_theme_mod('social_care_lite_twitt_link');
                    if( !empty($social_care_lite_twitt_link) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($social_care_lite_twitt_link); ?>"></a>
                   <?php } ?>
            
                  <?php $social_care_lite_gplus_link = get_theme_mod('social_care_lite_gplus_link');
                    if( !empty($social_care_lite_gplus_link) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($social_care_lite_gplus_link); ?>"></a>
                  <?php }?>
            
                  <?php $social_care_lite_linked_link = get_theme_mod('social_care_lite_linked_link');
                    if( !empty($social_care_lite_linked_link) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($social_care_lite_linked_link); ?>"></a>
                  <?php } ?>                  
         </div><!--end .header-socialicons--> 
      <?php } ?> 
    </div>  
    <div class="clear"></div>  
  </div><!-- .container -->  
</div>    
<div class="container">  
     <div class="logo">
        <?php social_care_lite_the_custom_logo(); ?>
           <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div><!-- logo -->
        
       <div class="header_right">
        <?php if( $social_care_lite_show_header_contact_info != ''){ ?> 
             <?php
               $social_care_lite_support_mailid = get_theme_mod('social_care_lite_support_mailid');
               if( !empty($social_care_lite_support_mailid) ){ ?> 
               <div class="infobox">
                 <i class="fas fa-envelope"></i>
                 <span><div class="statictext"><?php esc_html_e('EMAIL','social-care-lite'); ?> </div>
                 <a href="<?php echo esc_url('mailto:'.get_theme_mod('social_care_lite_support_mailid')); ?>"><?php echo esc_html(get_theme_mod('social_care_lite_support_mailid')); ?></a></span>
                </div>
               <?php } ?>
               
               <?php 
               $social_care_lite_header_contactno = get_theme_mod('social_care_lite_header_contactno');
               if( !empty($social_care_lite_header_contactno) ){ ?> 
                <div class="infobox left-right-border">
                 <i class="fas fa-phone"></i>
                 <span><div class="statictext"><?php esc_html_e('CALL NOW','social-care-lite'); ?></div>
				 <?php echo esc_html($social_care_lite_header_contactno); ?></span>
                </div>
               <?php } ?> 
               
               <?php
                $social_care_lite_donatenow_button = get_theme_mod('social_care_lite_donatenow_button');
                if( !empty($social_care_lite_donatenow_button) ){ ?>
                  <div class="infobox">
                      <a class="donatenow" href="#"><?php echo esc_html($social_care_lite_donatenow_button); ?></a>
                  </div>
               <?php } ?>              
           <?php } ?>          
        </div><!--.header_right -->
      <div class="clear"></div>  
 
  </div><!-- .container -->  
  </div><!--.site-header --> 
  
  <div class="header-navigation">
   	 <div class="container">
     	<div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','social-care-lite'); ?></a>
       </div><!-- toggle --> 
       <div class="mainhdrnav">                   
         <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
       </div><!--.mainhdrnav -->
           
     <div class="clear"></div>
   </div><!-- .container-->      
  </div><!-- .header-navigation -->
  
<?php 
if ( is_front_page() && !is_home() ) {
if($social_care_lite_showslide_area != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('social_care_lite_slidepgebx'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('social_care_lite_slidepgebx'.$i,true));
	  }
	}
?> 
<div class="headerslider_panel">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">     
      <div class="custominfo">       
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
		<?php
        $social_care_lite_slidereadmore_btn = get_theme_mod('social_care_lite_slidereadmore_btn');
        if( !empty($social_care_lite_slidereadmore_btn) ){ ?>
            <a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($social_care_lite_slidereadmore_btn); ?></a>
        <?php } ?>
       </div><!-- .custominfo -->                    
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>  
</div><!--end .headerslider_panel -->     
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
 if( $social_care_lite_show_5colmission_section != ''){ ?>  
  <div class="ourmission_wrapper">
     <div class="container">
        <?php
         $social_care_lite_ourmission_tittletext = get_theme_mod('social_care_lite_ourmission_tittletext');
         if( !empty($social_care_lite_ourmission_tittletext) ){ ?>
            <h2 class="section-title"><?php echo esc_html($social_care_lite_ourmission_tittletext); ?></h2>
        <?php } ?>
        
        <?php
         $social_care_lite_ourmission_shortdesctext = get_theme_mod('social_care_lite_ourmission_shortdesctext');
         if( !empty($social_care_lite_ourmission_shortdesctext) ){ ?>
            <p class="shortdesc"><?php echo esc_html($social_care_lite_ourmission_shortdesctext); ?></p>
        <?php } ?>
         
     
		<?php 
        for($n=1; $n<=5; $n++) {    
        if( get_theme_mod('social_care_lite_ourmissionpage'.$n,false)) {      
            $queryvar = new WP_Query('page_id='.absint(get_theme_mod('social_care_lite_ourmissionpage'.$n,true)) );		
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
            <div class="features_column <?php if($n % 5 == 0) { echo "last_column"; } ?>">                                       
                <?php if(has_post_thumbnail() ) { ?>
                <div class="imagebox"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>        
                <?php } ?>		
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>              
            </div>
            <?php endwhile;
            wp_reset_postdata();                                  
        } } ?>                                 
    <div class="clear"></div>  
   </div><!-- .container -->
</div><!-- .ourmission_wrapper -->               
                	      
<?php } ?>


<?php if( $social_care_lite_show_current_project_section != ''){ ?>  
<section id="fivebx_services_panel">
<div class="container">  

<?php
    $social_care_lite_project_tittletext = get_theme_mod('social_care_lite_project_tittletext');
       if( !empty($social_care_lite_project_tittletext) ){ ?>
       <h2 class="section-title"><?php echo esc_html($social_care_lite_project_tittletext); ?></h2>
 <?php } ?>
                    
<?php 
for($n=1; $n<=2; $n++) {    
if( get_theme_mod('social_care_lite_current_project_pagebx'.$n,false)) {      
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('social_care_lite_current_project_pagebx'.$n,true)) );		
	while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
	<div class="fivecol_missionbx <?php if($n % 2 == 0) { echo "last_column"; } ?>">                                       
		<?php if(has_post_thumbnail() ) { ?>
		<div class="missionthumbox"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>        
		<?php } ?>
		<div class="fivecol_contentbox">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                     
		<?php the_excerpt(); ?>	
        <a class="pagereadmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more...','social-care-lite'); ?></a>	                        
		</div>                                   
	</div>
	<?php endwhile;
	wp_reset_postdata();                                  
} } ?>                                 
<div class="clear"></div>  
</div><!-- .container -->                  
</section><!-- #fivebx_services_panel-->                      	      
<?php } ?>


<?php if( $social_care_lite_show_aboutus_pagebox != ''){ ?>  
<section id="about_panel">
<div class="container">                               
<?php 
if( get_theme_mod('social_care_lite_aboutus_pagebox',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('social_care_lite_aboutus_pagebox',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>                               
     <div class="aboutus_contentcol">   
     <h3><?php the_title(); ?></h3>   
     <?php the_content();  ?> 
      <a class="learnmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more','social-care-lite'); ?></a>	    
    </div>
    <div class="aboutus_thumbox"><?php the_post_thumbnail();?></div>                                          
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #welcome_section-->
<?php } ?>

<?php } ?>