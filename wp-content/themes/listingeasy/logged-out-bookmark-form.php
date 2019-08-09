<div class="save_listing_form job-manager-form wp-job-manager-bookmarks-form<?php if ( gt3_is_lwa() ) { echo ' lwa'; } ?>">
	<div class="btn_save_listing">
		<?php
		$url = esc_url( wp_login_url( get_permalink() ) );
		$class = '';
		if ( gt3_is_lwa() ) {
			if ( ! is_user_logged_in() ) {
				$class .= ' lwa-links-modal';
			}
			$class .= ' lwa-login-link';
		}

		if ( ! empty( $url ) ) : ?>
		<a class="<?php echo esc_attr($class); ?>" href="<?php echo esc_url($url); ?>">
			<i class="btn_save_listing__icon"></i>
			<span class="btn_save_listing__value"><?php echo esc_html__('Save','listingeasy'); ?></span>
		</a>
		<?php endif; ?>
	</div>
</div>