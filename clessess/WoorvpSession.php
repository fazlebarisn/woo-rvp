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

        // Create session name
        public function woorvpSessionName(){

            if( is_user_logged_in() ){
                $user_id = get_current_user_id();
                $woorvp_session_name = 'woorvp_session' . $user_id;
            }else{
                $woorvp_session_name = 'woorvp_session_guest';
            }

            return $woorvp_session_name;

        }

        // Init session for current user
        public function woorvpInitSession(){

            $session_name = $this->woorvpSessionName();
            
            if( !isset( $_SESSION[$session_name] ) ){
                $_SESSION[$session_name] = serialize( array() );
            }

        }

        /**
         * get current visitor session product
         * with this function we store product base of session 
         * @return $products as array 
         */
        public function woorvpGetViewProducts(){

            $session_name = $this->woorvpSessionName();

            if( !isset( $_SESSION[$session_name] ) ){
                return false;
            }

            //return unserialize( $_SESSION[$session_name] );
            return $_SESSION[$session_name] ;
            //var_dump($_SESSION[$session_name]);

        }

        /**
         * Here we add products in view list
         *
         * @return void
         */
        public function woorvpCreateViewProductsList(){

            // if it is not product page retuen false
            if( !is_product() ){
                return false;
            }

            // if it is product page create product list
            //$viewed_products = $this->woorvpGetViewProducts();
            $viewed_products = [157,142];

            // Check is that product is already in list or not
            if( !in_array( get_the_ID(), $viewed_products ) ){
                // if not in list, then add this product
                $viewed_products[] = get_the_ID();
            }else{
                // if already in list, do not add
                $current_product_key = array_search( get_the_ID() , $viewed_products );
                unset( $viewed_products[ $current_product_key ] );
                $viewed_products[] = get_the_ID();
            }

            // Update session
            $session_name = $this->woorvpSessionName();
            $_SESSION[$session_name] = $viewed_products;

        }

    }

    $WoorvpSession = new WoorvpSession;

}