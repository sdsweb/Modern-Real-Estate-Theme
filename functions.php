<?php
/**
 *
 * WARNING: Please do not edit this file.
 * @see http://codex.wordpress.org/Child_Themes
 *
 * Load the theme function files (options panel, theme functions, widgets, etc...).
 */
include_once get_template_directory() . '/includes/theme-options.php'; // SDS Theme Options
include_once get_template_directory() . '/includes/theme-functions.php'; // SDS Theme Options Functions
include_once get_template_directory() . '/includes/widget-social-media.php'; // SDS Social Media Widget

include_once get_template_directory() . '/includes/tha-theme-hooks.php'; // Theme Hook Alliance

include_once get_template_directory() . '/includes/ModernEstate.php'; // Modern Estate Class (main functionality, actions/filters)


/**
 * ---------------
 * Theme Specifics
 * ---------------
 */

/**
 * Set the Content Width for embeded items.
 */
if ( ! isset( $content_width ) )
	$content_width = 685;

/**
 * This function outputs the Footer Sidebar.
 */
function me_footer_left_sidebar() {
	if ( is_active_sidebar( 'footer-left-sidebar' ) )
		dynamic_sidebar( 'footer-left-sidebar' );
}

/**
 * This function registers all color schemes available in this theme.
 */
if ( ! function_exists( 'sds_color_schemes' ) ) {
	function sds_color_schemes() {
		$color_schemes = array(
			'default' => array( // Name used in saved option
				'label' => 'Blue', // Label on options panel (required)
				'stylesheet' => false, // Stylesheet URL, relative to theme directory (required)
				'preview' => '#36506a', // Preview color on options panel (required)
				'default' => true
			),
			'gray' => array(
				'label' => 'Gray',
				'stylesheet' => '/css/gray.css',
				'preview' => '#acacac',
				'deps' => 'modern-estate'
			)
		);

		return apply_filters( 'sds_theme_options_color_schemes', $color_schemes );
	}
}

/**
 * This function registers all web fonts available in this theme.
 */
if ( ! function_exists( 'sds_web_fonts' ) ) {
	function sds_web_fonts() {
		$web_fonts = array(
			// Lato
			'Lato:400' => array(
				'label' => 'Lato',
				'css' => 'font-family: \'Lato\', sans-serif;'
			)
		);

		return apply_filters( 'sds_theme_options_web_fonts', $web_fonts );
	}
}

/**
 * This function sets a default featured image size for use in this theme.
 */
if ( ! function_exists( 'sds_theme_options_default_featured_image_size' ) ) {
	add_filter( 'sds_theme_options_default_featured_image_size', 'sds_theme_options_default_featured_image_size' );

	function sds_theme_options_default_featured_image_size( $default ) {
		return 'me-200x300';
	}
}

if ( ! function_exists( 'sds_theme_options_ads' ) ) {
	add_action( 'sds_theme_options_ads', 'sds_theme_options_ads' );

	function sds_theme_options_ads() {
	?>
		<div class="sds-theme-options-ad">
			<a href="http://slocumthemes.com/wordpress-themes/modern-estate-theme" target="_blank" class="sds-theme-options-upgrade-ad">
				<h2><?php _e( 'Upgrade to Modern Estate Pro!', 'modern-estate' ); ?></h2>
				<ul>
					<li><?php _e( 'Priority Ticketing Support', 'modern-estate' ); ?></li>
					<li><?php _e( 'More Color Schemes', 'modern-estate' ); ?></li>
					<li><?php _e( 'More Web Fonts', 'modern-estate' ); ?></li>
					<li><?php _e( 'Adjust Featured Image Sizes', 'modern-estate' ); ?></li>
					<li><?php _e( 'Easily Add Custom Scripts/Styles', 'modern-estate' ); ?></li>
					<li><?php _e( 'and More!', 'modern-estate' ); ?></li>
				</ul>

				<span class="sds-theme-options-btn-green"><?php _e( 'Upgrade Now!', 'modern-estate' ); ?></span>
			</a>
		</div>
	<?php
	}
}

if ( ! function_exists( 'sds_theme_options_upgrade_cta' ) ) {
	add_action( 'sds_theme_options_upgrade_cta', 'sds_theme_options_upgrade_cta' );

	function sds_theme_options_upgrade_cta( $type ) {
		switch( $type ) :
			case 'color-schemes':
			?>
				<p><?php printf( __( '%1$s and receive more color schemes!', 'modern-estate' ), '<a href="http://slocumthemes.com/wordpress-themes/modern-estate-theme" target="_blank">Upgrade to Modern Estate Pro</a>' ); ?></p>
			<?php
			break;
			case 'web-fonts':
			?>
				<p><?php printf( __( '%1$s to use more web fonts!', 'modern-estate' ), '<a href="http://slocumthemes.com/wordpress-themes/modern-estate-theme" target="_blank">Upgrade to Modern Estate Pro</a>' ); ?></p>
			<?php
			break;
			case 'help-support':
			?>
				<p><?php printf( __( '%1$s to receive priority ticketing support!', 'modern-estate' ), '<a href="http://slocumthemes.com/wordpress-themes/modern-estate-theme" target="_blank">Upgrade to Modern Estate Pro</a>' ); ?></p>
			<?php
			break;
		endswitch;
	}
}

if ( ! function_exists( 'sds_theme_options_help_support_tab_content' ) ) {
	add_action( 'sds_theme_options_help_support_tab_content', 'sds_theme_options_help_support_tab_content' );

	function sds_theme_options_help_support_tab_content( ) {
	?>
		<p><?php printf( __( 'If you\'d like to create a suppport request, please visit the %1$s.', 'modern-estate' ), '<a href="http://wordpress.org/themes/modern-estate" target="_blank">Modern Estate Forums on WordPress.org</a>' ); ?></p>
	<?php
	}
}

if ( ! function_exists( 'sds_copyright_branding' ) ) {
	add_filter( 'sds_copyright_branding', 'sds_copyright_branding', 10, 2 );

	function sds_copyright_branding( $text, $theme_name ) {
		return '<a href="http://slocumthemes.com/wordpress-themes/modern-estate-free/" target="_blank">' . sprintf( __( '%1$s by Slocum Studio', 'modern-estate' ), $theme_name ) . '</a>';
	}
}