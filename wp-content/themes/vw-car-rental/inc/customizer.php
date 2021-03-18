<?php
/**
 * VW Car Rental Theme Customizer
 *
 * @package VW Car Rental
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_car_rental_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_car_rental_custom_controls' );

function vw_car_rental_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_car_rental_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_car_rental_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWCarRentalParentPanel = new VW_Car_Rental_WP_Customize_Panel( $wp_customize, 'vw_car_rental_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-car-rental' ),
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_car_rental_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-car-rental' ),
		'panel' => 'vw_car_rental_panel_id'
	) );

	$wp_customize->add_setting('vw_car_rental_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-car-rental'),
        'description' => __('Here you can change the width layout of Website.','vw-car-rental'),
        'section' => 'vw_car_rental_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_car_rental_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_car_rental_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-car-rental'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-car-rental'),
        'section' => 'vw_car_rental_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-car-rental'),
            'Right Sidebar' => __('Right Sidebar','vw-car-rental'),
            'One Column' => __('One Column','vw-car-rental'),
            'Three Columns' => __('Three Columns','vw-car-rental'),
            'Four Columns' => __('Four Columns','vw-car-rental'),
            'Grid Layout' => __('Grid Layout','vw-car-rental')
        ),
	));

	$wp_customize->add_setting('vw_car_rental_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-car-rental'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-car-rental'),
        'section' => 'vw_car_rental_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-car-rental'),
            'Right Sidebar' => __('Right Sidebar','vw-car-rental'),
            'One Column' => __('One Column','vw-car-rental')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'vw_car_rental_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-car-rental' ),
        'section' => 'vw_car_rental_left_right'
    )));

	$wp_customize->add_setting('vw_car_rental_loader_icon',array(
        'default' => 'Two Way',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-car-rental'),
        'section' => 'vw_car_rental_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-car-rental'),
            'Dots' => __('Dots','vw-car-rental'),
            'Rotate' => __('Rotate','vw-car-rental')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_car_rental_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-car-rental' ),
		'priority'   => null,
		'panel' => 'vw_car_rental_panel_id'
	) );

	//Sticky Header
	$wp_customize->add_setting( 'vw_car_rental_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-car-rental' ),
        'section' => 'vw_car_rental_topbar'
    )));

    $wp_customize->add_setting('vw_car_rental_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_car_rental_search_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_search_hide_show',array(
		'label' => esc_html__( 'Show / Hide Search','vw-car-rental' ),
		'section' => 'vw_car_rental_topbar'
    )));

    $wp_customize->add_setting('vw_car_rental_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_search_font_size',array(
		'label'	=> __('Search Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_topbar',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_phone', array( 
		'selector' => '.main-header .phone-no span', 
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_phone', 
	));

    $wp_customize->add_setting('vw_car_rental_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_phone_icon',array(
		'label'	=> __('Add Phone Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_topbar',
		'setting'	=> 'vw_car_rental_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_car_rental_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_car_rental_phone',array(
		'label'	=> __('Add Phone no.','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_topbar',
		'type'=> 'text'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_car_rental_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-car-rental' ),
		'priority'   => null,
		'panel' => 'vw_car_rental_panel_id'
	) );

	$wp_customize->add_setting( 'vw_car_rental_slider_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_slider_hide_show', array(
		'label' => esc_html__( 'Show / Hide Slider','vw-car-rental' ),
		'section' => 'vw_car_rental_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_car_rental_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_car_rental_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_car_rental_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_car_rental_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-car-rental' ),
			'description' => __('Slider image size (1500 x 590)','vw-car-rental'),
			'section'  => 'vw_car_rental_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_car_rental_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'LEARN MORE', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_slidersettings',
		'setting'	=> 'vw_car_rental_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_car_rental_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-car-rental'),
        'section' => 'vw_car_rental_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_car_rental_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-car-rental' ),
		'section'     => 'vw_car_rental_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_car_rental_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_car_rental_slider_opacity_color',array(
		'default'              => 0.5,
		'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_car_rental_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-car-rental' ),
	'section'     => 'vw_car_rental_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_car_rental_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-car-rental'),
      '0.1' =>  esc_attr('0.1','vw-car-rental'),
      '0.2' =>  esc_attr('0.2','vw-car-rental'),
      '0.3' =>  esc_attr('0.3','vw-car-rental'),
      '0.4' =>  esc_attr('0.4','vw-car-rental'),
      '0.5' =>  esc_attr('0.5','vw-car-rental'),
      '0.6' =>  esc_attr('0.6','vw-car-rental'),
      '0.7' =>  esc_attr('0.7','vw-car-rental'),
      '0.8' =>  esc_attr('0.8','vw-car-rental'),
      '0.9' =>  esc_attr('0.9','vw-car-rental')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_car_rental_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_slider_height',array(
		'label'	=> __('Slider Height','vw-car-rental'),
		'description'	=> __('Specify the slider height (px).','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_slider_speed', array(
		'default'  => 3000,
		'sanitize_callback'	=> 'vw_car_rental_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_car_rental_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-car-rental'),
		'section' => 'vw_car_rental_slidersettings',
		'type'  => 'number',
	) );

	//Category
	$wp_customize->add_section( 'vw_car_rental_category_section' , array(
    	'title'      => __( 'Category Section', 'vw-car-rental' ),
		'priority'   => null,
		'panel' => 'vw_car_rental_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_car_rental_category', array( 
		'selector' => '.catgory-box h2', 
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_category',
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_car_rental_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_car_rental_sanitize_choices',
	));
	$wp_customize->add_control('vw_car_rental_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display post','vw-car-rental'),
		'description' => __('Image Size (50 x 45)','vw-car-rental'),
		'section' => 'vw_car_rental_category_section',
	));

	//Category excerpt
	$wp_customize->add_setting( 'vw_car_rental_category_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_category_excerpt_number', array(
		'label'       => esc_html__( 'Category Excerpt length','vw-car-rental' ),
		'section'     => 'vw_car_rental_category_section',
		'type'        => 'range',
		'settings'    => 'vw_car_rental_category_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_car_rental_category_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_category_button_text',array(
		'label'	=> __('Add Category Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_category_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_category_btn_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_category_btn_icon',array(
		'label'	=> __('Add Category Button Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_category_section',
		'setting'	=> 'vw_car_rental_category_btn_icon',
		'type'		=> 'icon'
	)));

	//Services
	$wp_customize->add_section( 'vw_car_rental_service_section' , array(
    	'title'      => __( 'Services Section', 'vw-car-rental' ),
		'priority'   => null,
		'panel' => 'vw_car_rental_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_car_rental_section_title', array( 
		'selector' => '#service-sec h3', 
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_section_title',
	));

	$wp_customize->add_setting('vw_car_rental_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_car_rental_section_title',array(
		'label'	=> __('Section Title','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Our Services', 'vw-car-rental' ),
        ),
		'section' => 'vw_car_rental_service_section',
		'setting' => 'vw_car_rental_section_title',
		'type' => 'text'
	));
	
	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_car_rental_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_car_rental_sanitize_choices',
	));
	$wp_customize->add_control('vw_car_rental_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-car-rental'),
		'description' => __('Image Size (50 x 45)','vw-car-rental'),
		'section' => 'vw_car_rental_service_section',
	));

	//Services excerpt
	$wp_customize->add_setting( 'vw_car_rental_services_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_services_excerpt_number', array(
		'label'       => esc_html__( 'Service Excerpt length','vw-car-rental' ),
		'section'     => 'vw_car_rental_service_section',
		'type'        => 'range',
		'settings'    => 'vw_car_rental_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_car_rental_services_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_services_button_text',array(
		'label'	=> __('Add Services Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'LEARN MORE', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_service_section',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_panel( $VWCarRentalParentPanel );

	$BlogPostParentPanel = new VW_Car_Rental_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-car-rental' ),
		'panel' => 'vw_car_rental_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_car_rental_post_settings', array(
		'title' => __( 'Post Settings', 'vw-car-rental' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_car_rental_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-car-rental' ),
        'section' => 'vw_car_rental_post_settings'
    )));

    $wp_customize->add_setting( 'vw_car_rental_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_toggle_author',array(
		'label' => esc_html__( 'Author','vw-car-rental' ),
		'section' => 'vw_car_rental_post_settings'
    )));

    $wp_customize->add_setting( 'vw_car_rental_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-car-rental' ),
		'section' => 'vw_car_rental_post_settings'
    )));

    $wp_customize->add_setting( 'vw_car_rental_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-car-rental' ),
		'section' => 'vw_car_rental_post_settings'
    )));

    $wp_customize->add_setting( 'vw_car_rental_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-car-rental' ),
		'section'     => 'vw_car_rental_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_car_rental_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_car_rental_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-car-rental'),
        'section' => 'vw_car_rental_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_car_rental_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-car-rental'),
        'section' => 'vw_car_rental_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-car-rental'),
            'Excerpt' => __('Excerpt','vw-car-rental'),
            'No Content' => __('No Content','vw-car-rental')
        ),
	) );

	$wp_customize->add_setting('vw_car_rental_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-car-rental' ),
      'section' => 'vw_car_rental_post_settings'
    )));

	$wp_customize->add_setting( 'vw_car_rental_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_car_rental_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_car_rental_blog_pagination_type', array(
        'section' => 'vw_car_rental_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-car-rental' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-car-rental' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-car-rental' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_car_rental_button_settings', array(
		'title' => __( 'Button Settings', 'vw-car-rental' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_car_rental_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_button_text', 
	));

    $wp_customize->add_setting('vw_car_rental_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_button_text',array(
		'label'	=> __('Add Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_blog_button_icon',array(
		'label'	=> __('Add Blog Button Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_button_settings',
		'setting'	=> 'vw_car_rental_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_car_rental_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-car-rental' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_car_rental_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_related_post',array(
		'label' => esc_html__( 'Related Post','vw-car-rental' ),
		'section' => 'vw_car_rental_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_car_rental_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_car_rental_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_float'
	));
	$wp_customize->add_control('vw_car_rental_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_car_rental_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-car-rental' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_car_rental_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-car-rental' ),
		'section' => 'vw_car_rental_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_car_rental_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_car_rental_404_page',array(
		'title'	=> __('404 Page Settings','vw-car-rental'),
		'panel' => 'vw_car_rental_panel_id',
	));	

	$wp_customize->add_setting('vw_car_rental_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_car_rental_404_page_title',array(
		'label'	=> __('Add Title','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_car_rental_404_page_content',array(
		'label'	=> __('Add Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_404_page',
		'setting'	=> 'vw_car_rental_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//Social Icon Setting
	$wp_customize->add_section('vw_car_rental_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-car-rental'),
		'panel' => 'vw_car_rental_panel_id',
	));	

	$wp_customize->add_setting('vw_car_rental_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_social_icon_width',array(
		'label'	=> __('Icon Width','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_social_icon_height',array(
		'label'	=> __('Icon Height','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_car_rental_responsive_media',array(
		'title'	=> __('Responsive Media','vw-car-rental'),
		'panel' => 'vw_car_rental_panel_id',
	));

    $wp_customize->add_setting( 'vw_car_rental_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-car-rental' ),
      'section' => 'vw_car_rental_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_car_rental_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-car-rental' ),
      'section' => 'vw_car_rental_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_car_rental_metabox_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_metabox_hide_show',array(
      'label' => esc_html__( 'Show / Hide Metabox','vw-car-rental' ),
      'section' => 'vw_car_rental_responsive_media'
	)));

    $wp_customize->add_setting( 'vw_car_rental_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-car-rental' ),
      'section' => 'vw_car_rental_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_car_rental_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-car-rental' ),
      'section' => 'vw_car_rental_responsive_media'
    )));

    $wp_customize->add_setting('vw_car_rental_res_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_res_menu_open_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_responsive_media',
		'setting'	=> 'vw_car_rental_res_menu_open_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_car_rental_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_responsive_media',
		'setting'	=> 'vw_car_rental_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vw_car_rental_footer',array(
		'title'	=> __('Footer','vw-car-rental'),
		'panel' => 'vw_car_rental_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_footer_text', 
	));
	
	$wp_customize->add_setting('vw_car_rental_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_car_rental_footer_text',array(
		'label'	=> __('Copyright Text','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018, .....', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'setting'=> 'vw_car_rental_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_car_rental_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-car-rental'),
        'section' => 'vw_car_rental_footer',
        'settings' => 'vw_car_rental_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_car_rental_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-car-rental' ),
      	'section' => 'vw_car_rental_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_car_rental_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_car_rental_customize_partial_vw_car_rental_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_car_rental_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Car_Rental_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_car_rental_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-car-rental'),
		'transport' => 'refresh',
		'section'	=> 'vw_car_rental_footer',
		'setting'	=> 'vw_car_rental_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_car_rental_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-car-rental'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_car_rental_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_car_rental_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Car_Rental_Image_Radio_Control($wp_customize, 'vw_car_rental_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-car-rental'),
        'section' => 'vw_car_rental_footer',
        'settings' => 'vw_car_rental_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_car_rental_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-car-rental'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_car_rental_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-car-rental' ),
		'section' => 'vw_car_rental_woocommerce_section'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_car_rental_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_car_rental_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Car_Rental_Toggle_Switch_Custom_Control( $wp_customize, 'vw_car_rental_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-car-rental' ),
		'section' => 'vw_car_rental_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_car_rental_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_float'
	));
	$wp_customize->add_control('vw_car_rental_products_per_page',array(
		'label'	=> __('Products Per Page','vw-car-rental'),
		'description' => __('Display on shop page','vw-car-rental'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_car_rental_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_car_rental_sanitize_choices'
	));
	$wp_customize->add_control('vw_car_rental_products_per_row',array(
		'label'	=> __('Products Per Row','vw-car-rental'),
		'description' => __('Display on shop page','vw-car-rental'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_car_rental_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_car_rental_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_car_rental_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-car-rental'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-car-rental'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-car-rental' ),
        ),
		'section'=> 'vw_car_rental_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_car_rental_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-car-rental' ),
		'section'     => 'vw_car_rental_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_car_rental_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_car_rental_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_car_rental_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-car-rental' ),
		'section'     => 'vw_car_rental_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Car_Rental_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Car_Rental_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_car_rental_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Car_Rental_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_car_rental_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Car_Rental_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_car_rental_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_car_rental_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_car_rental_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Car_Rental_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Car_Rental_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Car_Rental_Customize_Section_Pro($manager,'vw_car_rental_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW CAR RENTAL', 'vw-car-rental' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-car-rental' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/car-rental-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Car_Rental_Customize_Section_Pro($manager,'vw_car_rental_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENATATION', 'vw-car-rental' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-car-rental' ),
			'pro_url'  => admin_url('themes.php?page=vw_car_rental_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-car-rental-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-car-rental-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Car_Rental_Customize::get_instance();