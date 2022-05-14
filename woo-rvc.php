<?php
/**
Plugin Name: Woocommerce recently view product
Plugin URI: https://www.chitabd.com/
Description: Display recently view product
Version: 1.0.0
Author: Fazle Bari
Author URI: https://www.chitabd.com/
Licence: GPLv2 Or leater
Text Domain: woorvp
Domain Path: /languages/
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Check wordpress version
 */
if( version_compare( get_bloginfo( 'version' ), '4.0', '<' ) ){
    $message = "You need WprdPress version 4.0 or higher";
    die( $message );
}

/**
 * Define constant
 */
define( 'WOORVP_PATH', plugin_dir_path( __FILE__ ) );
define( 'WOORVP_URI', plugin_dir_url( __FILE__ ) );

/**
 * Check woocommerce plugin install or not
 */
if( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins') ))){
    if( class_exists('WoorvpCore') ){
        class WoorvpCore{
            public function __construct()
            {
                
            }
        }
        $WoorvpCore = new WoorvpCore;
    }
}