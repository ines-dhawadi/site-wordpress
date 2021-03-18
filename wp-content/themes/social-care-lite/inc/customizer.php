<?php    
/**
 *Social Care Lite Theme Customizer
 *
 * @package Social Care Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function social_care_lite_customize_register( $wp_customize ) {	
	
	function social_care_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function social_care_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'social_care_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'social-care-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('social_care_lite_layout_option',array(
		'title' => __('Site Layout','social-care-lite'),			
		'priority' => 1,
		'panel' => 	'social_care_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('social_care_lite_boxlayout',array(
		'sanitize_callback' => 'social_care_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'social_care_lite_boxlayout', array(
    	'section'   => 'social_care_lite_layout_option',    	 
		'label' => __('Check to Box Layout','social-care-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','social-care-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('social_care_lite_color_scheme',array(
		'default' => '#c1331b',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'social_care_lite_color_scheme',array(
			'label' => __('Color Scheme','social-care-lite'),			
			'description' => __('More color options in PRO Version','social-care-lite'),
			'section' => 'colors',
			'settings' => 'social_care_lite_color_scheme'
		))
	);	
	
	$wp_customize->add_setting('social_care_lite_hover_color_scheme',array(
		'default' => '#8f2817',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'social_care_lite_hover_color_scheme',array(
			'label' => __('Hover Color Scheme','social-care-lite'),		
			'section' => 'colors',
			'settings' => 'social_care_lite_hover_color_scheme'
		))
	);
	
	//Header Contact info
	$wp_customize->add_section('social_care_lite_hdr_contact_section',array(
		'title' => __('Header Contact info','social-care-lite'),				
		'priority' => null,
		'panel' => 	'social_care_lite_panel_area',
	));	
	
	
	$wp_customize->add_setting('social_care_lite_support_mailid',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('social_care_lite_support_mailid',array(
		'type' => 'text',
		'label' => __('Add email address here.','social-care-lite'),
		'section' => 'social_care_lite_hdr_contact_section'
	));	
	
		
	$wp_customize->add_setting('social_care_lite_header_contactno',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('social_care_lite_header_contactno',array(	
		'type' => 'text',
		'label' => __('Add phone number here','social-care-lite'),
		'section' => 'social_care_lite_hdr_contact_section',
		'setting' => 'social_care_lite_header_contactno'
	));	
	
	
	$wp_customize->add_setting('social_care_lite_donatenow_button',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('social_care_lite_donatenow_button',array(	
		'type' => 'text',
		'label' => __('Add button button name for donation here','social-care-lite'),
		'section' => 'social_care_lite_hdr_contact_section',
		'setting' => 'social_care_lite_donatenow_button'
	)); // donate now Button Text
	
	
	
	$wp_customize->add_setting('social_care_lite_show_header_contact_info',array(
		'default' => false,
		'sanitize_callback' => 'social_care_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'social_care_lite_show_header_contact_info', array(
	   'settings' => 'social_care_lite_show_header_contact_info',
	   'section'   => 'social_care_lite_hdr_contact_section',
	   'label'     => __('Check To show This Section','social-care-lite'),
	   'type'      => 'checkbox'
	 ));//Show header contact info
	
	 
	 //Header social icons
	$wp_customize->add_section('social_care_lite_social_section',array(
		'title' => __('Header social icons','social-care-lite'),
		'description' => __( 'Add social icons link here to display icons in header.', 'social-care-lite' ),			
		'priority' => null,
		'panel' => 	'social_care_lite_panel_area', 
	));
	
	$wp_customize->add_setting('social_care_lite_fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('social_care_lite_fb_link',array(
		'label' => __('Add facebook link here','social-care-lite'),
		'section' => 'social_care_lite_social_section',
		'setting' => 'social_care_lite_fb_link'
	));	
	
	$wp_customize->add_setting('social_care_lite_twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('social_care_lite_twitt_link',array(
		'label' => __('Add twitter link here','social-care-lite'),
		'section' => 'social_care_lite_social_section',
		'setting' => 'social_care_lite_twitt_link'
	));
	
	$wp_customize->add_setting('social_care_lite_gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('social_care_lite_gplus_link',array(
		'label' => __('Add google plus link here','social-care-lite'),
		'section' => 'social_care_lite_social_section',
		'setting' => 'social_care_lite_gplus_link'
	));
	
	$wp_customize->add_setting('social_care_lite_linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('social_care_lite_linked_link',array(
		'label' => __('Add linkedin link here','social-care-lite'),
		'section' => 'social_care_lite_social_section',
		'setting' => 'social_care_lite_linked_link'
	));
	
	$wp_customize->add_setting('social_care_lite_show_socialsection',array(
		'default' => false,
		'sanitize_callback' => 'social_care_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'social_care_lite_show_socialsection', array(
	   'settings' => 'social_care_lite_show_socialsection',
	   'section'   => 'social_care_lite_social_section',
	   'label'     => __('Check To show This Section','social-care-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Social icons Section 			
	
	// Slider Section		
	$wp_customize->add_section( 'social_care_lite_slide_panelarea', array(
		'title' => __('Slider Section', 'social-care-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 633 pixel.','social-care-lite'), 
		'panel' => 	'social_care_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('social_care_lite_slidepgebx1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('social_care_lite_slidepgebx1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','social-care-lite'),
		'section' => 'social_care_lite_slide_panelarea'
	));	
	
	$wp_customize->add_setting('social_care_lite_slidepgebx2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('social_care_lite_slidepgebx2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','social-care-lite'),
		'section' => 'social_care_lite_slide_panelarea'
	));	
	
	$wp_customize->add_setting('social_care_lite_slidepgebx3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('social_care_lite_slidepgebx3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','social-care-lite'),
		'section' => 'social_care_lite_slide_panelarea'
	));	// Slider Section	
	
	$wp_customize->add_setting('social_care_lite_slidereadmore_btn',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('social_care_lite_slidereadmore_btn',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','social-care-lite'),
		'section' => 'social_care_lite_slide_panelarea',
		'setting' => 'social_care_lite_slidereadmore_btn'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('social_care_lite_showslide_area',array(
		'default' => false,
		'sanitize_callback' => 'social_care_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'social_care_lite_showslide_area', array(
	    'settings' => 'social_care_lite_showslide_area',
	    'section'   => 'social_care_lite_slide_panelarea',
	     'label'     => __('Check To Show This Section','social-care-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	 // Five column Our Mission section
	$wp_customize->add_section('social_care_lite_5colmission_section', array(
		'title' => __('Our Mission Section','social-care-lite'),
		'description' => __('Select pages from the dropdown for our mission section','social-care-lite'),
		'priority' => null,
		'panel' => 	'social_care_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('social_care_lite_ourmission_tittletext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('social_care_lite_ourmission_tittletext',array(	
		'type' => 'text',
		'label' => __('Add services title here','social-care-lite'),
		'section' => 'social_care_lite_5colmission_section',
		'setting' => 'social_care_lite_ourmission_tittletext'
	)); 
	
	$wp_customize->add_setting('social_care_lite_ourmission_shortdesctext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('social_care_lite_ourmission_shortdesctext',array(	
		'type' => 'text',
		'label' => __('Add services short description here','social-care-lite'),
		'section' => 'social_care_lite_5colmission_section',
		'setting' => 'social_care_lite_ourmission_shortdesctext'
	));
	
	
	$wp_customize->add_setting('social_care_lite_ourmissionpage1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'social_care_lite_ourmissionpage1',array(
		'type' => 'dropdown-pages',			
		'section' => 'social_care_lite_5colmission_section',
	));		
	
	$wp_customize->add_setting('social_care_lite_ourmissionpage2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'social_care_lite_ourmissionpage2',array(
		'type' => 'dropdown-pages',			
		'section' => 'social_care_lite_5colmission_section',
	));
	
	$wp_customize->add_setting('social_care_lite_ourmissionpage3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'social_care_lite_ourmissionpage3',array(
		'type' => 'dropdown-pages',			
		'section' => 'social_care_lite_5colmission_section',
	));
	
	$wp_customize->add_setting('social_care_lite_ourmissionpage4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'social_care_lite_ourmissionpage4',array(
		'type' => 'dropdown-pages',			
		'section' => 'social_care_lite_5colmission_section',
	));
	
	$wp_customize->add_setting('social_care_lite_ourmissionpage5',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'social_care_lite_ourmissionpage5',array(
		'type' => 'dropdown-pages',			
		'section' => 'social_care_lite_5colmission_section',
	));
	
	
	$wp_customize->add_setting('social_care_lite_show_5colmission_section',array(
		'default' => false,
		'sanitize_callback' => 'social_care_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'social_care_lite_show_5colmission_section', array(
	   'settings' => 'social_care_lite_show_5colmission_section',
	   'section'   => 'social_care_lite_5colmission_section',
	   'label'     => __('Check To Show This Section','social-care-lite'),
	   'type'      => 'checkbox'
	 ));//Show services section	 
	 
	
	// Current Projects section
	$wp_customize->add_section('social_care_lite_current_project_section', array(
		'title' => __('Current Projects Section','social-care-lite'),
		'description' => __('Select pages from the dropdown for current project section','social-care-lite'),
		'priority' => null,
		'panel' => 	'social_care_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('social_care_lite_project_tittletext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('social_care_lite_project_tittletext',array(	
		'type' => 'text',
		'label' => __('Add services title here','social-care-lite'),
		'section' => 'social_care_lite_current_project_section',
		'setting' => 'social_care_lite_project_tittletext'
	)); 
	
	$wp_customize->add_setting('social_care_lite_current_project_pagebx1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'social_care_lite_current_project_pagebx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'social_care_lite_current_project_section',
	));		
	
	$wp_customize->add_setting('social_care_lite_current_project_pagebx2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'social_care_lite_current_project_pagebx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'social_care_lite_current_project_section',
	));
	
	
	$wp_customize->add_setting('social_care_lite_show_current_project_section',array(
		'default' => false,
		'sanitize_callback' => 'social_care_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'social_care_lite_show_current_project_section', array(
	   'settings' => 'social_care_lite_show_current_project_section',
	   'section'   => 'social_care_lite_current_project_section',
	   'label'     => __('Check To Show This Section','social-care-lite'),
	   'type'      => 'checkbox'
	 ));//Show current project section 
	 
	 
	// About UsSection 
	$wp_customize->add_section('social_care_lite_aboutus_section', array(
		'title' => __('About Us Section','social-care-lite'),
		'description' => __('Select Pages from the dropdown for about us section','social-care-lite'),
		'priority' => null,
		'panel' => 	'social_care_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('social_care_lite_aboutus_pagebox',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'social_care_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'social_care_lite_aboutus_pagebox',array(
		'type' => 'dropdown-pages',			
		'section' => 'social_care_lite_aboutus_section',
	));		
	
	$wp_customize->add_setting('social_care_lite_show_aboutus_pagebox',array(
		'default' => false,
		'sanitize_callback' => 'social_care_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'social_care_lite_show_aboutus_pagebox', array(
	    'settings' => 'social_care_lite_show_aboutus_pagebox',
	    'section'   => 'social_care_lite_aboutus_section',
	    'label'     => __('Check To Show This Section','social-care-lite'),
	    'type'      => 'checkbox'
	));//Show about Section 	 
	 
		 
}
add_action( 'customize_register', 'social_care_lite_customize_register' );

function social_care_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .blogpost_lyout h2 a:hover,
        #sidebar ul li a:hover,								
        .blogpost_lyout h3 a:hover,
		.aboutus_contentcol h3 span,					
        .recent-post h6:hover,
		.header-socialicons a:hover,       						
        .postmeta a:hover,		
        .button:hover,
		.infobox i,			
		.features_column:hover h3 a,		
		.fivecol_missionbx:hover h3 a,		           
		.footer-wrapper h2 span,
		.footer-wrapper ul li a:hover, 
		.footer-wrapper ul li.current_page_item a        				
            { color:<?php echo esc_html( get_theme_mod('social_care_lite_color_scheme','#c1331b')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,				
        .learnmore,
		.news-title,
		.header-navigation,		
		.donatenow,
		h3.widget-title,
		.features_column:hover .imagebox,
		.nivo-caption .slide_more, 		
		.fivecol_missionbx .pagereadmore,												
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('social_care_lite_color_scheme','#c1331b')); ?>;}
			
		.nivo-caption .slide_more:hover,
		.infobox i,	
		.tagcloud a:hover,
		.mainhdrnav ul li ul li,	
		.features_column .imagebox,
		blockquote	        
            { border-color:<?php echo esc_html( get_theme_mod('social_care_lite_color_scheme','#c1331b')); ?>;}	
			
	   .mainhdrnav ul li a:hover, 
	   .mainhdrnav ul li.current-menu-item a,
	   .mainhdrnav ul li.current-menu-parent a.parent,
	   .mainhdrnav ul li.current-menu-item ul.sub-menu li a:hover	,
	   .mainhdrnav ul li ul        
            { background-color:<?php echo esc_html( get_theme_mod('social_care_lite_hover_color_scheme','#8f2817')); ?>;}		
					
			
         	
    </style> 
<?php                   
}
         
add_action('wp_head','social_care_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function social_care_lite_customize_preview_js() {
	wp_enqueue_script( 'social_care_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20191002', true );
}
add_action( 'customize_preview_init', 'social_care_lite_customize_preview_js' );