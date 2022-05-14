<?php
/**
 * @package Woocommerce recently view products
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if( !function_exists( 'woorvpActivation' ) ){
    function woorvpActivation(){
        // check if plugins option already thete or not
        if( !get_option( 'woorvp_settings' ) ){

            add_option( 'woorvp_settings' , array(
                'woorvp_label'              => 'Recently view product',
                'woorvp_num_of_product'     => 4,
                'woorvp_in_shop_page'       => 'enable',
                'woorvp_in_cart_cart'       => 'enable',
            ));
            
        }
    }
}