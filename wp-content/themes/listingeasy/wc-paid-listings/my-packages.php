<?php
/**
 * My Packages
 *
 * Shows packages on the account page
 */
if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly
}
?>
<h2><?php
if ( 'job_listing' === $type ) {
	echo apply_filters( 'woocommerce_my_account_wc_paid_listings_packages_title', esc_html__( 'My Packages', 'listingeasy' ), $type );
} else {
	echo apply_filters( 'woocommerce_my_account_wc_paid_listings_packages_title', esc_html__( 'My Packages', 'listingeasy' ), $type );
}
?></h2>

<table class="shop_table my_account_job_packages my_account_wc_paid_listing_packages">
	<thead>
		<tr>
			<th scope="col"><?php esc_html_e( 'Package Name', 'listingeasy' ); ?></th>
			<th scope="col"><?php esc_html_e( 'Remaining', 'listingeasy' ); ?></th>
			<?php if ( 'job_listing' === $type ) : ?>
				<th scope="col"><?php esc_html_e( 'Listing Duration', 'listingeasy' ); ?></th>
			<?php endif; ?>
			<th scope="col"><?php esc_html_e( 'Featured?', 'listingeasy' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $packages as $package ) :
			$package = wc_paid_listings_get_package( $package );
			?>
			<tr>
				<td><?php echo  $package->get_title(); ?></td>
				<td><?php echo  $package->get_limit() ? absint( $package->get_limit() - $package->get_count() ) : esc_html__( 'Unlimited', 'listingeasy' ); ?></td>
				<?php if ( 'job_listing' === $type ) : ?>
					<td><?php echo  $package->get_duration() ? sprintf( _n( '%d day', '%d days', $package->get_duration(), 'listingeasy' ), $package->get_duration() ) : '-'; ?></td>
				<?php endif; ?>
				<td><?php echo ($package->is_featured() ? esc_html__( 'Yes', 'listingeasy' ) : esc_html__( 'No', 'listingeasy' )); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
