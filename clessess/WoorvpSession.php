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

            $session_name = $this->woorvpSessionName;
            
            if( !isset( $_SESSION[$session_name] ) ){
                $_SESSION[$session_name] = serialize( array() );
            }

        }

        // get current visitor session product
        public function woorvpGetProducts(){

            $session_name = $this->woorvpSessionName;

            if( !isset( $_SESSION[$session_name] ) ){
                return false;
            }

            return unserialize( $_SESSION[$session_name] );
            
        }

    }

    $WoorvpSession = new WoorvpSession;

}