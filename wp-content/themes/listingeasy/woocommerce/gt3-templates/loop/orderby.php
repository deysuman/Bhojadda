<?php
global $products;
$orderby = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
$catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
	'menu_order' => esc_html__( 'Default sorting', 'listingeasy' ),
	'popularity' => esc_html__( 'Sort by popularity', 'listingeasy' ),
	'rating'     => esc_html__( 'Sort by average rating', 'listingeasy' ),
	'date'       => esc_html__( 'Sort by newness', 'listingeasy' ),
	'price'      => esc_html__( 'Sort by price: low to high', 'listingeasy' ),
	'price-desc' => esc_html__( 'Sort by price: high to low', 'listingeasy' ),
) );

?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit' ) ); ?>
</form>