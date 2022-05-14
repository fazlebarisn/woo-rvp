<?php
/**
 * @package Woocommerce recently view products
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if( !class_exists( 'WoorvpSettingsPage') ){

    class WoorvpSettingsPage{

        public function createSettingsPage(){
            add_submenu_page(
                'woocommerce',
                __( 'Woocommerce Recently View Products', 'woorvp' ),
                __( 'Recently View Products', 'woorvp' ),
                'manage_options',
                'woorvp_settings',
                'woorvp_settings_page_callback', // in views/admin/settingsPage.php
            );
        }

    }
    $WoorvpSettingsPage = new WoorvpSettingsPage;

}