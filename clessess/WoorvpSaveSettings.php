<?php
/**
 * @package Woocommerce recently view products
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if( !class_exists( 'WoorvpSaveSettings') ){

    class WoorvpSaveSettings{

        public function woorvpSaveAdminFirlds(){
            // check nonce field values
            check_admin_referer('woorvp_save_settings_fields_varify');

            // check user role
            if( !current_user_can('manage_options') ){
                wp_die("You need higher permission to edit this page!");
            }

            // Get values from fields and sanitize
            $woorvp_label = sanitize_text_field( $_POST['woorvp_label'] );
            $woorvp_num_of_product = sanitize_text_field($_POST['woorvp_num_of_product'] );
            $woorvp_page_position = sanitize_text_field($_POST['woorvp_page_position'] );
            $woorvp_in_shop_page = sanitize_text_field($_POST['woorvp_in_shop_page'] );
            $woorvp_in_cart_cart = sanitize_text_field($_POST['woorvp_in_cart_cart'] );

            // get values as array
            $values = array(
                'woorvp_label'  => $woorvp_label,
                'woorvp_num_of_product'  => $woorvp_num_of_product,
                'woorvp_page_position'  => $woorvp_page_position,
                'woorvp_in_shop_page'  => $woorvp_in_shop_page,
                'woorvp_in_cart_cart'  => $woorvp_in_cart_cart,
            );

            //var_dump($values);
            // save values
            update_option( 'woorvp_settings' , $values );
            wp_redirect( get_admin_url().'admin.php?page=woorvp_settings&success='.urldecode('Setting Saved'));
        }

    }
    $WoorvpSaveSettings = new WoorvpSaveSettings;

}
