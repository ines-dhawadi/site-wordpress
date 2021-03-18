<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_car_rental_first_color = get_theme_mod('vw_car_rental_first_color');

	$vw_car_rental_custom_css = '';

	if($vw_car_rental_first_color != false){
		$vw_car_rental_custom_css .='#comments a.comment-reply-link{';
			$vw_car_rental_custom_css .='background-color: '.esc_attr($vw_car_rental_first_color).';';
		$vw_car_rental_custom_css .='}';
	}
	if($vw_car_rental_first_color != false){
		$vw_car_rental_custom_css .='#comments input[type="submit"].submit{';
			$vw_car_rental_custom_css .='background-color: '.esc_attr($vw_car_rental_first_color).'!important;';
		$vw_car_rental_custom_css .='}';
	}
	if($vw_car_rental_first_color != false){
		$vw_car_rental_custom_css .='a, .footer li a:hover, .post-main-box:hover h2 a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .post-navigation a:hover, .post-navigation a:focus, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$vw_car_rental_custom_css .='color: '.esc_attr($vw_car_rental_first_color).';';
		$vw_car_rental_custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_car_rental_second_color = get_theme_mod('vw_car_rental_second_color');

	if($vw_car_rental_second_color != false || $vw_car_rental_first_color != false){
		$vw_car_rental_custom_css .='.main-header .phone-no span, input[type="submit"], #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .view-more, .category_main hr, .footer .tagcloud a:hover, .footer-2, .post-info hr, #comments input[type="submit"], #sidebar .tagcloud a:hover, .pagination span, .pagination a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .scrollup i, .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .footer a.custom_read_more, #sidebar a.custom_read_more, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a, .wp-block-button__link{
			background: linear-gradient(to right, '.esc_attr($vw_car_rental_second_color).', '.esc_attr($vw_car_rental_first_color).') ;
		}';
	}
	if($vw_car_rental_second_color != false){
		$vw_car_rental_custom_css .='.footer .custom-social-icons i:hover, #sidebar .custom-social-icons i:hover{';
			$vw_car_rental_custom_css .='background-color: '.esc_attr($vw_car_rental_second_color).';';
		$vw_car_rental_custom_css .='}';
	}
	if($vw_car_rental_second_color != false){
		$vw_car_rental_custom_css .='.main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .footer .custom-social-icons i, #sidebar .custom-social-icons i{';
			$vw_car_rental_custom_css .='color: '.esc_attr($vw_car_rental_second_color).';';
		$vw_car_rental_custom_css .='}';
	}
	if($vw_car_rental_second_color != false){
		$vw_car_rental_custom_css .='.footer .custom-social-icons i, #sidebar .custom-social-icons i, .footer .custom-social-icons i:hover, #sidebar .custom-social-icons i:hover{';
			$vw_car_rental_custom_css .='border-color: '.esc_attr($vw_car_rental_second_color).';';
		$vw_car_rental_custom_css .='}';
	}
	if($vw_car_rental_second_color != false){
		$vw_car_rental_custom_css .='.main-navigation ul ul{';
			$vw_car_rental_custom_css .='border-top-color: '.esc_attr($vw_car_rental_second_color).';';
		$vw_car_rental_custom_css .='}';
	}
	if($vw_car_rental_second_color != false){
		$vw_car_rental_custom_css .='.main-navigation ul ul{';
			$vw_car_rental_custom_css .='border-bottom-color: '.esc_attr($vw_car_rental_second_color).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_custom_css .='@media screen and (max-width:1000px) {';
		if($vw_car_rental_second_color != false || $vw_car_rental_first_color != false){
			$vw_car_rental_custom_css .='.search-box i{
			background: linear-gradient(to right, '.esc_attr($vw_car_rental_second_color).', '.esc_attr($vw_car_rental_first_color).') ;
			}';
		}
	$vw_car_rental_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$vw_car_rental_theme_lay = get_theme_mod( 'vw_car_rental_width_option','Full Width');
    if($vw_car_rental_theme_lay == 'Boxed'){
		$vw_car_rental_custom_css .='body{';
			$vw_car_rental_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_car_rental_custom_css .='}';
		$vw_car_rental_custom_css .='.page-template-custom-home-page .main-header{';
			$vw_car_rental_custom_css .='width: 97.4%;';
		$vw_car_rental_custom_css .='}';
		$vw_car_rental_custom_css .='#slider .carousel-caption, .more-btn{';
			$vw_car_rental_custom_css .='top: 45%; margin: 0;';
		$vw_car_rental_custom_css .='}';
	}else if($vw_car_rental_theme_lay == 'Wide Width'){
		$vw_car_rental_custom_css .='body{';
			$vw_car_rental_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_car_rental_custom_css .='}';
	}else if($vw_car_rental_theme_lay == 'Full Width'){
		$vw_car_rental_custom_css .='body{';
			$vw_car_rental_custom_css .='max-width: 100%;';
		$vw_car_rental_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_car_rental_theme_lay = get_theme_mod( 'vw_car_rental_slider_opacity_color','0.5');
	if($vw_car_rental_theme_lay == '0'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0';
		$vw_car_rental_custom_css .='}';
		}else if($vw_car_rental_theme_lay == '0.1'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0.1';
		$vw_car_rental_custom_css .='}';
		}else if($vw_car_rental_theme_lay == '0.2'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0.2';
		$vw_car_rental_custom_css .='}';
		}else if($vw_car_rental_theme_lay == '0.3'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0.3';
		$vw_car_rental_custom_css .='}';
		}else if($vw_car_rental_theme_lay == '0.4'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0.4';
		$vw_car_rental_custom_css .='}';
		}else if($vw_car_rental_theme_lay == '0.5'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0.5';
		$vw_car_rental_custom_css .='}';
		}else if($vw_car_rental_theme_lay == '0.6'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0.6';
		$vw_car_rental_custom_css .='}';
		}else if($vw_car_rental_theme_lay == '0.7'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0.7';
		$vw_car_rental_custom_css .='}';
		}else if($vw_car_rental_theme_lay == '0.8'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0.8';
		$vw_car_rental_custom_css .='}';
		}else if($vw_car_rental_theme_lay == '0.9'){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='opacity:0.9';
		$vw_car_rental_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_car_rental_theme_lay = get_theme_mod( 'vw_car_rental_slider_content_option','Left');
    if($vw_car_rental_theme_lay == 'Left'){
		$vw_car_rental_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_car_rental_custom_css .='text-align:left; left:10%; right:45%;';
		$vw_car_rental_custom_css .='}';
	}else if($vw_car_rental_theme_lay == 'Center'){
		$vw_car_rental_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_car_rental_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_car_rental_custom_css .='}';
	}else if($vw_car_rental_theme_lay == 'Right'){
		$vw_car_rental_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_car_rental_custom_css .='text-align:right; left:45%; right:10%;';
		$vw_car_rental_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_car_rental_slider_height = get_theme_mod('vw_car_rental_slider_height');
	if($vw_car_rental_slider_height != false){
		$vw_car_rental_custom_css .='#slider img{';
			$vw_car_rental_custom_css .='height: '.esc_attr($vw_car_rental_slider_height).';';
		$vw_car_rental_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_car_rental_slider = get_theme_mod('vw_car_rental_slider_hide_show');
	if($vw_car_rental_slider == false){
		$vw_car_rental_custom_css .='.page-template-custom-home-page .main-header{';
			$vw_car_rental_custom_css .='position: static; background: #2d3b3e;';
		$vw_car_rental_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_car_rental_theme_lay = get_theme_mod( 'vw_car_rental_blog_layout_option','Default');
    if($vw_car_rental_theme_lay == 'Default'){
		$vw_car_rental_custom_css .='.post-main-box{';
			$vw_car_rental_custom_css .='';
		$vw_car_rental_custom_css .='}';
	}else if($vw_car_rental_theme_lay == 'Center'){
		$vw_car_rental_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_car_rental_custom_css .='text-align:center;';
		$vw_car_rental_custom_css .='}';
		$vw_car_rental_custom_css .='.post-info{';
			$vw_car_rental_custom_css .='margin-top:10px;';
		$vw_car_rental_custom_css .='}';
		$vw_car_rental_custom_css .='.post-info hr{';
			$vw_car_rental_custom_css .='margin:15px auto;';
		$vw_car_rental_custom_css .='}';
	}else if($vw_car_rental_theme_lay == 'Left'){
		$vw_car_rental_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_car_rental_custom_css .='text-align:Left;';
		$vw_car_rental_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_car_rental_resp_stickyheader = get_theme_mod( 'vw_car_rental_stickyheader_hide_show',false);
    if($vw_car_rental_resp_stickyheader == true){
    	$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_car_rental_custom_css .='display:block;';
		$vw_car_rental_custom_css .='} }';
	}else if($vw_car_rental_resp_stickyheader == false){
		$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_car_rental_custom_css .='display:none;';
		$vw_car_rental_custom_css .='} }';
	}

	$vw_car_rental_resp_slider = get_theme_mod( 'vw_car_rental_resp_slider_hide_show',false);
    if($vw_car_rental_resp_slider == true){
    	$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='#slider{';
			$vw_car_rental_custom_css .='display:block;';
		$vw_car_rental_custom_css .='} }';
	}else if($vw_car_rental_resp_slider == false){
		$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='#slider{';
			$vw_car_rental_custom_css .='display:none;';
		$vw_car_rental_custom_css .='} }';
	}

	$vw_car_rental_resp_metabox = get_theme_mod( 'vw_car_rental_metabox_hide_show',true);
    if($vw_car_rental_resp_metabox == true){
    	$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='.post-info{';
			$vw_car_rental_custom_css .='display:block;';
		$vw_car_rental_custom_css .='} }';
	}else if($vw_car_rental_resp_metabox == false){
		$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='.post-info{';
			$vw_car_rental_custom_css .='display:none;';
		$vw_car_rental_custom_css .='} }';
	}

	$vw_car_rental_resp_sidebar = get_theme_mod( 'vw_car_rental_sidebar_hide_show',true);
    if($vw_car_rental_resp_sidebar == true){
    	$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='#sidebar{';
			$vw_car_rental_custom_css .='display:block;';
		$vw_car_rental_custom_css .='} }';
	}else if($vw_car_rental_resp_sidebar == false){
		$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='#sidebar{';
			$vw_car_rental_custom_css .='display:none;';
		$vw_car_rental_custom_css .='} }';
	}

	$vw_car_rental_resp_scroll_top = get_theme_mod( 'vw_car_rental_resp_scroll_top_hide_show',true);
    if($vw_car_rental_resp_scroll_top == true){
    	$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='.scrollup i{';
			$vw_car_rental_custom_css .='display:block;';
		$vw_car_rental_custom_css .='} }';
	}else if($vw_car_rental_resp_scroll_top == false){
		$vw_car_rental_custom_css .='@media screen and (max-width:575px) {';
		$vw_car_rental_custom_css .='.scrollup i{';
			$vw_car_rental_custom_css .='display:none !important;';
		$vw_car_rental_custom_css .='} }';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_car_rental_sticky_header_padding = get_theme_mod('vw_car_rental_sticky_header_padding');
	if($vw_car_rental_sticky_header_padding != false){
		$vw_car_rental_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_car_rental_custom_css .='padding: '.esc_attr($vw_car_rental_sticky_header_padding).';';
		$vw_car_rental_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_car_rental_search_font_size = get_theme_mod('vw_car_rental_search_font_size');
	if($vw_car_rental_search_font_size != false){
		$vw_car_rental_custom_css .='.search-box i{';
			$vw_car_rental_custom_css .='font-size: '.esc_attr($vw_car_rental_search_font_size).';';
		$vw_car_rental_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_car_rental_button_padding_top_bottom = get_theme_mod('vw_car_rental_button_padding_top_bottom');
	$vw_car_rental_button_padding_left_right = get_theme_mod('vw_car_rental_button_padding_left_right');
	if($vw_car_rental_button_padding_top_bottom != false || $vw_car_rental_button_padding_left_right != false){
		$vw_car_rental_custom_css .='.post-main-box .view-more{';
			$vw_car_rental_custom_css .='padding-top: '.esc_attr($vw_car_rental_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_car_rental_button_padding_top_bottom).';padding-left: '.esc_attr($vw_car_rental_button_padding_left_right).';padding-right: '.esc_attr($vw_car_rental_button_padding_left_right).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_button_border_radius = get_theme_mod('vw_car_rental_button_border_radius');
	if($vw_car_rental_button_border_radius != false){
		$vw_car_rental_custom_css .='.post-main-box .view-more{';
			$vw_car_rental_custom_css .='border-radius: '.esc_attr($vw_car_rental_button_border_radius).'px;';
		$vw_car_rental_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_car_rental_single_blog_post_navigation_show_hide = get_theme_mod('vw_car_rental_single_blog_post_navigation_show_hide',true);
	if($vw_car_rental_single_blog_post_navigation_show_hide != true){
		$vw_car_rental_custom_css .='.post-navigation{';
			$vw_car_rental_custom_css .='display: none;';
		$vw_car_rental_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_car_rental_copyright_alingment = get_theme_mod('vw_car_rental_copyright_alingment');
	if($vw_car_rental_copyright_alingment != false){
		$vw_car_rental_custom_css .='.copyright p{';
			$vw_car_rental_custom_css .='text-align: '.esc_attr($vw_car_rental_copyright_alingment).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_copyright_padding_top_bottom = get_theme_mod('vw_car_rental_copyright_padding_top_bottom');
	if($vw_car_rental_copyright_padding_top_bottom != false){
		$vw_car_rental_custom_css .='.footer-2{';
			$vw_car_rental_custom_css .='padding-top: '.esc_attr($vw_car_rental_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_car_rental_copyright_padding_top_bottom).';';
		$vw_car_rental_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_car_rental_scroll_to_top_font_size = get_theme_mod('vw_car_rental_scroll_to_top_font_size');
	if($vw_car_rental_scroll_to_top_font_size != false){
		$vw_car_rental_custom_css .='.scrollup i{';
			$vw_car_rental_custom_css .='font-size: '.esc_attr($vw_car_rental_scroll_to_top_font_size).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_scroll_to_top_padding = get_theme_mod('vw_car_rental_scroll_to_top_padding');
	$vw_car_rental_scroll_to_top_padding = get_theme_mod('vw_car_rental_scroll_to_top_padding');
	if($vw_car_rental_scroll_to_top_padding != false){
		$vw_car_rental_custom_css .='.scrollup i{';
			$vw_car_rental_custom_css .='padding-top: '.esc_attr($vw_car_rental_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_car_rental_scroll_to_top_padding).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_scroll_to_top_width = get_theme_mod('vw_car_rental_scroll_to_top_width');
	if($vw_car_rental_scroll_to_top_width != false){
		$vw_car_rental_custom_css .='.scrollup i{';
			$vw_car_rental_custom_css .='width: '.esc_attr($vw_car_rental_scroll_to_top_width).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_scroll_to_top_height = get_theme_mod('vw_car_rental_scroll_to_top_height');
	if($vw_car_rental_scroll_to_top_height != false){
		$vw_car_rental_custom_css .='.scrollup i{';
			$vw_car_rental_custom_css .='height: '.esc_attr($vw_car_rental_scroll_to_top_height).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_scroll_to_top_border_radius = get_theme_mod('vw_car_rental_scroll_to_top_border_radius');
	if($vw_car_rental_scroll_to_top_border_radius != false){
		$vw_car_rental_custom_css .='.scrollup i{';
			$vw_car_rental_custom_css .='border-radius: '.esc_attr($vw_car_rental_scroll_to_top_border_radius).'px;';
		$vw_car_rental_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_car_rental_social_icon_font_size = get_theme_mod('vw_car_rental_social_icon_font_size');
	if($vw_car_rental_social_icon_font_size != false){
		$vw_car_rental_custom_css .='#sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_car_rental_custom_css .='font-size: '.esc_attr($vw_car_rental_social_icon_font_size).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_social_icon_padding = get_theme_mod('vw_car_rental_social_icon_padding');
	if($vw_car_rental_social_icon_padding != false){
		$vw_car_rental_custom_css .='#sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_car_rental_custom_css .='padding: '.esc_attr($vw_car_rental_social_icon_padding).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_social_icon_width = get_theme_mod('vw_car_rental_social_icon_width');
	if($vw_car_rental_social_icon_width != false){
		$vw_car_rental_custom_css .='#sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_car_rental_custom_css .='width: '.esc_attr($vw_car_rental_social_icon_width).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_social_icon_height = get_theme_mod('vw_car_rental_social_icon_height');
	if($vw_car_rental_social_icon_height != false){
		$vw_car_rental_custom_css .='#sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_car_rental_custom_css .='height: '.esc_attr($vw_car_rental_social_icon_height).';';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_social_icon_border_radius = get_theme_mod('vw_car_rental_social_icon_border_radius');
	if($vw_car_rental_social_icon_border_radius != false){
		$vw_car_rental_custom_css .='#sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_car_rental_custom_css .='border-radius: '.esc_attr($vw_car_rental_social_icon_border_radius).'px;';
		$vw_car_rental_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_car_rental_products_padding_top_bottom = get_theme_mod('vw_car_rental_products_padding_top_bottom');
	if($vw_car_rental_products_padding_top_bottom != false){
		$vw_car_rental_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_car_rental_custom_css .='padding-top: '.esc_attr($vw_car_rental_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_car_rental_products_padding_top_bottom).'!important;';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_products_padding_left_right = get_theme_mod('vw_car_rental_products_padding_left_right');
	if($vw_car_rental_products_padding_left_right != false){
		$vw_car_rental_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_car_rental_custom_css .='padding-left: '.esc_attr($vw_car_rental_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_car_rental_products_padding_left_right).'!important;';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_products_box_shadow = get_theme_mod('vw_car_rental_products_box_shadow');
	if($vw_car_rental_products_box_shadow != false){
		$vw_car_rental_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_car_rental_custom_css .='box-shadow: '.esc_attr($vw_car_rental_products_box_shadow).'px '.esc_attr($vw_car_rental_products_box_shadow).'px '.esc_attr($vw_car_rental_products_box_shadow).'px #ddd;';
		$vw_car_rental_custom_css .='}';
	}

	$vw_car_rental_products_border_radius = get_theme_mod('vw_car_rental_products_border_radius');
	if($vw_car_rental_products_border_radius != false){
		$vw_car_rental_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_car_rental_custom_css .='border-radius: '.esc_attr($vw_car_rental_products_border_radius).'px;';
		$vw_car_rental_custom_css .='}';
	}
