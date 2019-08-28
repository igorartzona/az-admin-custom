<?php
/**
 * Admin custom plugin
 *
 * Plugin Name:       az-admin-custom
 * Plugin URI:        https://github.com/igorartzona/az-admin-custom
 * Description:       Кастомизация админки
<<<<<<< HEAD
 * Version:           1.0.0
=======
 * Version:           1.1.0 - dev
>>>>>>> develop
 * Author:            jvj
 * Author URI:        https://github.com/igorartzona 
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       az-admin-custom
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**------Цветовой профиль-------------------------------------------------------**/

add_action( 'admin_init', 'az_add_color_schemes' );
function az_add_color_schemes() { 
	wp_admin_css_color(
		'aztheme',
		'artzona.org',
		plugins_url( '/css/admin-colors.css', __FILE__ ),
		array( '#054765', '#366482', '#D16D15', '#D46F15' )
	);
}

/*----------Логотип на странице входа-------------------*/
add_action( 'login_head', 'az_add_login_logo' );
function az_add_login_logo() {
	?>

	<style type="text/css">
            #login h1 a { 
		background-image:url("<?php echo plugins_url( "/img/logo.png", __FILE__ );?>"); 
            }
	</style>
        
	<?php
}

/*-----Перенос админбара вниз-----*/
add_action( 'admin_bar_init', 'adminbar_bottom' );
function adminbar_bottom() {
	
	if( is_admin() ) return;
	
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
	
	?>
	
	<style type="text/css">
            #wpadminbar {
		top:auto !important;
		bottom:0;
		background:#366482 !important;
            } 
	</style>
	
	<?php	
}