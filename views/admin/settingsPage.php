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
            <form method="post" action="admin-post.php" novalidate="novalidate">
                <table class="form-table" role="presentation">
                    <tbody>
                        <input type="hidden" name="action" value="woorvp_save_settings_fields">
                        <?php 
                            wp_nonce_field('woorvp_save_settings_fields_varify'); 
                            $settings = get_option('woorvp_settings');
                        ?>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_label"><?php _e("Recently view product" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input type="text" name="woorvp_label" value="<?php echo $settings['woorvp_label']; ?>" id="woorvp_label" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_num_of_product"><?php _e("Display products number" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input type="number" name="woorvp_num_of_product" value="<?php echo $settings['woorvp_num_of_product']; ?>" id="woorvp_num_of_product" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_page_position"><?php _e("Display Position" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input <?php if( $settings['woorvp_page_position'] == 'before_related_products' ){  echo 'checked'; }; ?> type="radio" name="woorvp_page_position" value="before_related_products" id="woorvp_page_position">
                                <label for="before_related_products">Before Related Products</label><br>
                                <input <?php if( $settings['woorvp_page_position'] == 'after_related_products' ){  echo 'checked'; }; ?> type="radio" name="woorvp_page_position" value="after_related_products" id="woorvp_page_position">
                                <label for="after_related_products">Acter Related Products</label><br>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_in_shop_page"><?php _e("Display In Shop Page" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input <?php if( $settings['woorvp_in_shop_page'] == 'enable' ){  echo 'checked'; }; ?> type="checkbox" name="woorvp_in_shop_page" value="enable" id="woorvp_in_shop_page" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="woorvp_in_cart_cart"><?php _e("Display In Cart Page" , "woorvp") ?></label>
                            </th>
                            <td>
                                <input <?php if( $settings['woorvp_in_cart_cart'] == 'enable' ){  echo 'checked'; }; ?>  type="checkbox" name="woorvp_in_cart_cart" value="enable" id="woorvp_in_cart_cart" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                               
                            </th>
                            <td>
                                <input type="submit" name="submit" value="Save Changes" id="submit" class="button button-primary">
                            </td>
                        </tr>

                    </tbody>
                </table>
            </form>
        </div>

    <?php
}