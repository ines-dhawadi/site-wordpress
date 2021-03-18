<?php
/**
 *Social Care Lite About Theme
 *
 * @package Social Care Lite
 */

//about theme info
add_action( 'admin_menu', 'social_care_lite_abouttheme' );
function social_care_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'social-care-lite'), __('About Theme Info', 'social-care-lite'), 'edit_theme_options', 'social_care_lite_guide', 'social_care_lite_mostrar_guide');   
} 

//Info of the theme
function social_care_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'social-care-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Social Care Lite is a beautiful and outspoken, modern and resourceful, clean and pristine, moving and powerful, graphically polished and attractively designed, secure and reliable charitable organizations WordPress theme. It is a perfect platform for creating effective fundraising and charity websites. This theme is suitable for different types of non-government organizations, charity causes, donations, foundations, church, events, political campaigns and related projects. You can also use this free theme for construction, real estate, traveling, business, corporate, tourism, yoga, personal, beauty, pub store, education, photography, gym, fitness, eCommerce, hotel projects and many more.','social-care-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'social-care-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'social-care-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'social-care-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'social-care-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'social-care-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'social-care-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'social-care-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'social-care-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'social-care-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( SOCIAL_CARE_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'social-care-lite'); ?></a> | 
            <a href="<?php echo esc_url( SOCIAL_CARE_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'social-care-lite'); ?></a> | 
            <a href="<?php echo esc_url( SOCIAL_CARE_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'social-care-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>