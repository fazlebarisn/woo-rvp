<?php
/**
 * @package Woocommerce recently view products
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if(!class_exists('WoorvpSession')){

    class WoorvpSession{

        // Start session if not started already
        public function woorvpStartSession(){
            if( !session_id() ){
                session_start();
            }
        }

    }
    $WoorvpSession = new WoorvpSession;

}