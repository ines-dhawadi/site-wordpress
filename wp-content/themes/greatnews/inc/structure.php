<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Great News
 * @since Great News 1.0.0
 */

$options = great_news_get_theme_options();


if ( ! function_exists( 'great_news_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Great News 1.0.0
	 */
	function great_news_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'great_news_doctype', 'great_news_doctype', 10 );


if ( ! function_exists( 'great_news_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'great_news_before_wp_head', 'great_news_head', 10 );

if ( ! function_exists( 'great_news_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'greatnews' ); ?></a>
			<div class="menu-overlay"></div>

		<?php
	}
endif;
add_action( 'great_news_page_start_action', 'great_news_page_start', 10 );

if ( ! function_exists( 'great_news_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'great_news_page_end_action', 'great_news_page_end', 10 );

if ( ! function_exists( 'great_news_topbar' ) ) :
	/**
	 * Topbar html codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_topbar() { 
		$options = great_news_get_theme_options(); 
		$date = date('l, F j, Y');

		if ( ! $options['topbar_section_enable'] )
			return;
		?>
		

		<div id="top-navigation" class="relative">
			<div class="wrapper">
				<button class="menu-toggle" aria-controls="secondary-menu" aria-expanded="false">
					<?php
					echo great_news_get_svg( array( 'icon' => 'menu' ) );
					echo great_news_get_svg( array( 'icon' => 'close' ) );
					?>
					<span class="menu-label"><?php esc_html_e( 'Top Menu', 'greatnews' ); ?></span>
				</button><!-- .menu-toggle -->

				<nav id="secondary-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'greatnews' ); ?>">
				
					<?php 
					$date_time = '';
	                	if ( $options['topbar_section_enable'] ) :
	                	$date_time = '<li class="contact-info"><div class="entry-meta"><a href="#" rel="bookmark" tabindex="0">';
	                	$date_time .= $date;
	                	$date_time .= '</a></div></li>';
	                	endif;
	                $top_button = '';
	                if ( $options['topbar_section_enable'] && $options['login_url'] !== ''  ) :
	                		$top_button = '<li><a href="'. esc_url( $options['login_url'] ) .'">
                        '. great_news_get_svg( array( 'icon' => 'user' ) ) . esc_html( $options['login_text'] ) .'</a>
                        </li>';
					
					endif;

					wp_nav_menu( 
						array(
							'theme_location' => 'secondary',
							'container' => 'div',
							'menu_class' => 'menu nav-menu',
							'menu_id' => 'secondary-menu',
							'echo' => true,
							'fallback_cb' => 'great_news_menu_fallback_cb',
							'items_wrap' => '<ul id="%1$s" class="%2$s">' . $date_time . '%3$s ' . $top_button . ' </ul>',

							)
						);
					?>
					<div class="icon-wrapper">
						<div class="social-icons">

							<?php

							wp_nav_menu( 
								array(
									'theme_location' => 'social',
									'container' => false,
									'menu_class' => 'menu',
									'echo' => true,
									'fallback_cb' => 'great_news_menu_fallback_cb',
									'depth' => 1,
									'link_before' => '<span class="screen-reader-text">',
									'link_after' => '</span>',
									)
								);
							
							?>
						</div>
						<?php
						$search = '<li class="main-navigation-search">';
						$search .= get_search_form( $echo = true );
						$search .= '</li>';
						?>

					</div>
				</nav><!-- .main-navigation-->
			</div>
		</div><!-- #top-navigation -->
		<?php
	}
	endif;
	add_action( 'great_news_header_action', 'great_news_topbar', 10 );

if ( ! function_exists( 'great_news_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_header_start() { ?>
		<header id="masthead" class="site-header" role="banner">
		<?php
	}
endif;
add_action( 'great_news_header_action', 'great_news_header_start', 10 );

if ( ! function_exists( 'great_news_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_site_branding() {
		$options  = great_news_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="wrapper">
            <div class="site-branding-wrapper">
				<div class="site-branding">
					<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php } 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
						<div id="site-details">
							<?php
							if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
								if ( great_news_is_latest_posts() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;
							} 
							if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
								<?php
								endif; 
							}?>
						</div>
			    	<?php endif; ?>
				</div><!-- .site-branding -->

				<?php if ( ! empty( $options['mid_ads_image'] ) && ! empty( $options['mid_ads_url'] ) ) : ?>
				<div class="mid-advertisement">
					<a href="<?php echo esc_url( $options['mid_ads_url'] ); ?>"><img src="<?php echo esc_url( $options['mid_ads_image'] ); ?>" alt="<?php esc_attr_e('Logo', 'greatnews'); ?>"></a>
				</div><!-- .site-branding -->
				<?php endif; ?>

				<?php if ( ! empty( $options['ads_image'] ) && ! empty( $options['ads_url'] ) ) : ?>
					<div class="site-advertisement">
	                    <a href="<?php echo esc_url( $options['ads_url'] ); ?>"><img src="<?php echo esc_url( $options['ads_image'] ); ?>"></a>
	                </div><!-- .site-advertisement -->
	            <?php endif; ?>
			</div><!-- .site-branding-wrapper -->
		</div><!-- .wrapper -->
		<?php
	}
endif;
add_action( 'great_news_header_action', 'great_news_site_branding', 20 );

if ( ! function_exists( 'great_news_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_site_navigation() {
		$options = great_news_get_theme_options();
		?>
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<?php
			echo great_news_get_svg( array( 'icon' => 'menu' ) );
			echo great_news_get_svg( array( 'icon' => 'close' ) );
			?>		
			<span class="menu-label"><?php esc_html_e( 'Menu', 'greatnews' ); ?></span>			
		</button>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
			<div class="wrapper">
				<?php 
					
				wp_nav_menu( 
					array(
						'theme_location' => 'primary',
						'container' => false,
						'menu_class' => 'menu nav-menu',
						'menu_id' => 'primary-menu',
						'echo' => true,
						'fallback_cb' => 'great_news_menu_fallback_cb',
						)
					);
	        	?>
        	</div><!-- .wrapper -->
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'great_news_header_action', 'great_news_site_navigation', 30 );


if ( ! function_exists( 'great_news_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'great_news_header_action', 'great_news_header_end', 50 );

if ( ! function_exists( 'great_news_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'great_news_content_start_action', 'great_news_content_start', 10 );

if ( ! function_exists( 'great_news_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Greatnews 1.0.0
	 *
	 */
	function great_news_header_image() {
		$options = great_news_get_theme_options();
		if ( great_news_is_frontpage() )
			return;
		$header_image = get_header_image();
		if ( $options['single_post_disable_featured_image'] == false ) {
			if ( is_singular() ) :
				$header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
			endif;
		}
		
		?>

		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <h2 class="page-title"><?php great_news_custom_header_banner_title(); ?></h2>
                </header>

                <?php great_news_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->
		<?php
	}
endif;
add_action( 'great_news_header_image_action', 'great_news_header_image', 10 );

if ( ! function_exists( 'great_news_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Greatnews 1.0.0
	 */
	function great_news_add_breadcrumb() {
		$options = great_news_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( great_news_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list">';
				/**
				 * great_news_simple_breadcrumb hook
				 *
				 * @hooked great_news_simple_breadcrumb -  10
				 *
				 */
				do_action( 'great_news_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;

if ( ! function_exists( 'great_news_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'great_news_content_end_action', 'great_news_content_end', 10 );

if ( ! function_exists( 'great_news_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'great_news_footer', 'great_news_footer_start', 10 );

if ( ! function_exists( 'great_news_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_footer_site_info() {
		$options = great_news_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		?>
		<div class="site-info">
			<div class="wrapper">
				<div class="site-info-wrapper">
					<?php if ( ! empty( $options['footer_image'] ) ) : ?>
						<span><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $options['footer_image'] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a></span>
					<?php endif;
					
					wp_nav_menu( 
						array(
							'theme_location' => 'social',
							'container' => false,
							'menu_class' => 'social-icons',
							'echo' => true,
							'fallback_cb' => false,
							'depth' => 1,
							'link_before' => '<span class="screen-reader-text">',
							'link_after' => '</span>',
							)
						);
					?>
					<span>
						<?php 
						echo great_news_santize_allow_tag( $copyright_text ); 
						if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}
						?>	
					</span>
				</div>
			</div><!-- .wrapper -->
		</div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'great_news_footer', 'great_news_footer_site_info', 40 );

if ( ! function_exists( 'great_news_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_footer_scroll_to_top() {
		$options  = great_news_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo great_news_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'great_news_footer', 'great_news_footer_scroll_to_top', 40 );

if ( ! function_exists( 'great_news_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'great_news_footer', 'great_news_footer_end', 100 );


if ( ! function_exists( 'great_news_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since Great News 1.0.0
	 *
	 */
	function great_news_infinite_loader_spinner() { 
		global $post;
		$options = great_news_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :
			if ( count( $post ) > 0 ) {
				echo '<div class="blog-loader">' . great_news_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';
			}
		endif;
	}
endif;
add_action( 'great_news_infinite_loader_spinner_action', 'great_news_infinite_loader_spinner', 10 );
