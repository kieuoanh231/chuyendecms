<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';
	require 'inc/nux/class-storefront-nux-starter-content.php';
}

//Show the product count in stock
function stock_catalog() {
    global $product;
    if ( $product->is_in_stock() ) {
		echo '<div class="stock" style="color: black;" >' . $product->get_stock_quantity() . ' In Stock' . '</div>';
    } else {
		echo '<div class="out-of-stock" style="color: red;">' . 'SOLD OUT' . '</div>';
    }
}
add_action( 'woocommerce_after_shop_loop_item_title', 'stock_catalog' );

//add field
function woo_add_fields() {
	global $woocommerce, $post;
	echo '<div class="options_group">';
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_price1', 
			'label'     => __( 'price 1', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')',
			'data_type' => 'price',
		)
	);
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_price2', 
			'label'     => __( 'price 2', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')',
			'data_type' => 'price',
		)
	);
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_price3', 
			'label'     => __( 'price3', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')',
			'data_type' => 'price',
		)
	);

	echo '</div>';
  }
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_fields' );

//save
function woo_add_custom_general_fields_save( $post_id ){
    $woocommerce_text_field_1 = $_POST['_price1'];
	$woocommerce_text_field_2 = $_POST['_price2'];
	$woocommerce_text_field_3 = $_POST['_price3'];
    if( !empty( $woocommerce_text_field_1 ) )
        update_post_meta( $post_id, '_price1', esc_attr( $woocommerce_text_field_1 ) );
	if( !empty( $woocommerce_text_field_2 ) )
        update_post_meta( $post_id, '_price2', esc_attr( $woocommerce_text_field_2 ) );
	if( !empty( $woocommerce_text_field_3 ) )
        update_post_meta( $post_id, '_price3', esc_attr( $woocommerce_text_field_3 ) );
}
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

//show price to detail product page
add_action( 'woocommerce_single_product_summary', 'ci_woo_product_detail', 5 );
function ci_woo_product_detail() {
    global $product;
        
        echo '<div><span> <strong>Price 1:</strong> </span>';
	    echo get_post_meta( $product->id, '_price1', true );
		echo '</div>';
        
         echo '<div><span> <strong>Price 2:</strong> </span>';
	    echo get_post_meta( $product->id, '_price2', true );
		echo '</div>';

		echo '<div><span> <strong>Price 3:</strong> </span>';
	    echo get_post_meta( $product->id, '_price3', true );
		echo '</div>';
        
        
	}
/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */
