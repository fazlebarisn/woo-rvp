<?php
/**
 * @package Woocommerce recently view products
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function woorvp_settings_page_callback(){
    ?>
        <div class="wrap">
            <h1><?php _e("Recently Viewed Prosucts", "woorvp") ?></h1>
            <form method="post" action="options.php" novalidate="novalidate">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_label"><?php _e("Recently view product" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input type="text" name="woorvp_label" value="" id="woorvp_label" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_num_of_product"><?php _e("Display products number" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input type="number" name="woorvp_num_of_product" value="" id="woorvp_num_of_product" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_page_position"><?php _e("Display Position" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input type="text" name="woorvp_page_position" value="" id="woorvp_page_position" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_in_shop_page"><?php _e("Display In Shop Page" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input type="checkbox" name="woorvp_in_shop_page" value="" id="woorvp_in_shop_page" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_in_cart_cart"><?php _e("Display In Cart Page" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input type="checkbox" name="woorvp_in_cart_cart" value="" id="woorvp_in_cart_cart" class="regular-text">
                            </td>
                        </tr>

                    </tbody>
                </table>
            </form>
        </div>

    <?php
}