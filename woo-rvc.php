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
    if( !class_exists('WoorvpCore') ){
        class WoorvpCore{
            public function __construct()
            {
                // include files
                require_once( WOORVP_PATH . "includes/activation.php" );
                require_once( WOORVP_PATH . "views/admin/settingsPage.php" );

                // include classess
                require_once( WOORVP_PATH . "clessess/WoorvpSettingsPage.php" );
                require_once( WOORVP_PATH . "clessess/WoorvpSaveSettings.php" );
                require_once( WOORVP_PATH . "clessess/WoorvpSession.php" );

                // add hooks
                register_activation_hook( __FILE__ , 'woorvpActivation' );
                
                add_action('init', array( $WoorvpSession , 'woorvpStartSession'),10 );
                add_action('init', array( $WoorvpSession , 'woorvpInitSession'),15 );
                add_action('init', array( $WoorvpSession , 'woorvpCreateViewProductsList') );

                add_action('admin_menu', array( $WoorvpSettingsPage , 'createSettingsPage') );
                add_action('admin_post_woorvp_save_settings_fields', array( $WoorvpSaveSettings , 'woorvpSaveAdminFirlds') );

                // shortcode
            }
        }
        $WoorvpCore = new WoorvpCore;
    }
}