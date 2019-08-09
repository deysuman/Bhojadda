<?php

if ( $packages || $user_packages ) :
	function gt3_get_woocommerce_price_format_on_paid_listings( $format, $currency_pos  ) {
		$currency_pos = get_option( 'woocommerce_currency_pos' );
		$format = '%1$s%2$s';

		switch ( $currency_pos ) {
			case 'left' :
				$format = '<span class="package__currency">%1$s</span>%2$s';
				break;
			case 'right' :
				$format = '%2$s<span class="package__currency">%1$s</span>';
				break;
			case 'left_space' :
				$format = '<span class="package__currency">%1$s</span>&nbsp;%2$s';
				break;
			case 'right_space' :
				$format = '%2$s&nbsp;<span class="package__currency">%1$s</span>';
				break;
		}
		return $format;
	}
	add_filter( 'woocommerce_price_format', 'gt3_get_woocommerce_price_format_on_paid_listings', 10, 2 );

	$checked = 1; ?>
	<?php if ( $user_packages ) : ?>
		<h2 class="package-list__title"><?php _e( "Your packages", "listingeasy" ); ?></h2>
		<div class="package-list  package-list--user">
			<?php foreach ( $user_packages as $key => $package ) :
				$package = wc_paid_listings_get_package( $package );
				?>
				<div class="package package--featured">
					<div class="package_head">
						<h3 class="package__title"><?php echo esc_html($package->get_title()); ?></h3>
					</div>
					<div class="package__content">
						<?php
							if ( $package->get_limit() ) {
								printf( _n( '%s listing posted out of %d', '%s listings posted out of %d', $package->get_count(), 'listingeasy' ) . ', ', $package->get_count(), $package->get_limit() );
							} else {
								printf( _n( '%s listing posted', '%s listings posted', $package->get_count(), 'listingeasy' ) . ', ', $package->get_count() );
							}

							if ( $package->get_duration() ) {
								printf( _n( 'listed for %s day', 'listed for %s days', $package->get_duration(), 'listingeasy' ), $package->get_duration() );
							}

							$checked = 0;
						?>
					</div>
					<button class="btn package__btn" type="submit" name="job_package" value="user-<?php echo esc_attr($key); ?>" id="package-<?php echo esc_attr($package->get_id()); ?>">
						<?php _e('Sign up', 'listingeasy') ?> <i class="fa fa-angle-right"></i>
					</button>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<?php if ( $packages ) : ?>
		<?php if ( $user_packages ) : ?>
			<h2 class="package-list__title"><?php _e( "Purchase packages", "listingeasy" ); ?></h2>
		<?php endif; ?>
		<div class="package-list">
			<?php foreach ( $packages as $key => $package ) :
				$product = wc_get_product( $package );

				$product_post_data = get_post( $product->get_id() );

				if ( ! $product->is_type( array( 'job_package', 'job_package_subscription' ) ) || ! $product->is_purchasable() ) {
					continue;
				}

				$post_meta = get_post_meta($product->get_id());
				$package_featured = !empty($post_meta['_job_listing_featured']) ? $post_meta['_job_listing_featured'][0] : '';
				$package_background = !empty($post_meta['mb_job_package_background']) ? $post_meta['mb_job_package_background'][0] : '';
				$package_icon = !empty($post_meta['mb_job_package_icon']) ? wp_get_attachment_url($post_meta['mb_job_package_icon'][0]) : '';

				if ($package_featured == 'yes') {
					$featuredClass = ' package--featured';
				} else {
					$featuredClass = '';
				}

				if ($package_icon != '') {
					$package_class = ' package_has_icon';
					$package_icon_content = '<div class="package_icon"><img src="' . esc_url($package_icon) . '" alt="" /></div>';
				} else {
					$package_class = $package_icon_content = '';
				}

				$theme_color = esc_attr(gt3_option("theme-custom-color"));
				if ($package_background != '' && $package_background != $theme_color) {
					$package_background_color = 'style="background: '.esc_attr($package_background).'"';
					$package_btn_styles = 'style="background: '.esc_attr($package_background).'; border-color: '.esc_attr($package_background).'; color: '.esc_attr($package_background).'"';
				} else {
					$package_background_color = $package_btn_styles = '';
				}

				?>
				<div class="package<?php echo esc_attr($featuredClass); ?>">
					<div class="package_head<?php echo esc_attr($package_class); ?>" <?php echo  $package_background_color; ?>>
						<h3 class="package__title"><?php echo esc_html($product->get_title()); ?></h3>
						<div class="package__price">
							<?php if ( $product->get_price() ){
								echo wc_price( $product->get_price() );
							} else {
								esc_html_e('Free', 'listingeasy');
							} ?>
						</div>
						<?php
							if ( class_exists( 'WC_Subscriptions_Product' ) ) {
								$package_billing_period = WC_Subscriptions_Product::get_period( $product );
								$package_billing_period_interval = WC_Subscriptions_Product::get_interval( $product );

								if ( in_array( $package_billing_period, array( 'day', 'week', 'month', 'year' ) ) ) {
									$period_translate = '';
									if ($package_billing_period == 'day') {
										if ($package_billing_period_interval == '1') {
											$period_translate = esc_html__('day', 'listingeasy');
										} else {
											$period_translate = esc_html__('days', 'listingeasy');
										}
									} elseif ($package_billing_period == 'week') {
										if ($package_billing_period_interval == '1') {
											$period_translate = esc_html__('week', 'listingeasy');
										} else {
											$period_translate = esc_html__('weeks', 'listingeasy');
										}
									} elseif ($package_billing_period == 'month') {
										if ($package_billing_period_interval == '1') {
											$period_translate = esc_html__('month', 'listingeasy');
										} else {
											$period_translate = esc_html__('months', 'listingeasy');
										}
									} elseif ($package_billing_period == 'year') {
										if ($package_billing_period_interval == '1') {
											$period_translate = esc_html__('year', 'listingeasy');
										} else {
											$period_translate = esc_html__('years', 'listingeasy');
										}
									}
									echo '<span class="package__subscription-period">' . esc_html__('/ per ', 'listingeasy') . $package_billing_period_interval . ' ' . $period_translate . '</span>';
								}
							}
						?>
						<?php echo  $package_icon_content; ?>
					</div>
					<div class="package__content">
						<?php echo apply_filters( 'the_content', $product_post_data->post_content ) ?>
					</div>
					<div class="package__description">
						<?php echo apply_filters( 'woocommerce_short_description', $product_post_data->post_excerpt ) ?>
					</div>
					<button class="btn package__btn" type="submit" name="job_package" value="<?php echo esc_attr($product->get_id()); ?>" id="package-<?php echo esc_attr($product->get_id()); ?>"  <?php echo  $package_btn_styles; ?>>
						<span><?php _e('Sign up', 'listingeasy') ?> <i class="fa fa-angle-right"></i></span>
					</button>
					<?php
						if ($package_featured == 'yes') {
							echo '<div class="featured-label"><div class="featured-label_icon"></div><div>'. esc_html__('Recommended', 'listingeasy'). '</div></div>';
						}
					?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
<?php else : ?>

	<p class="no-packages"><?php _e( 'No packages found', 'listingeasy' ); ?></p>

<?php endif; ?>
