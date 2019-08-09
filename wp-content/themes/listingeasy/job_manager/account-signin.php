<?php if ( is_user_logged_in() ) : ?>

	<fieldset>
		<label><?php _e( 'Your account', 'listingeasy' ); ?></label>
		<div class="field account-sign-in">
			<?php
			$user = wp_get_current_user();
			printf( __( 'You are currently signed in as <strong>%s</strong>.', 'listingeasy' ), $user->user_login );
			?>

			<a class="button" href="<?php echo apply_filters( 'submit_job_form_logout_url', wp_logout_url( get_permalink() ) ); ?>"><?php _e( 'Sign out', 'listingeasy' ); ?></a>
		</div>
	</fieldset>

<?php else :

	$account_required             = job_manager_user_requires_account();
	$registration_enabled         = job_manager_enable_registration();
	$generate_username_from_email = job_manager_generate_username_from_email();

	$login_url = gt3_get_login_url();
	$classes = gt3_get_login_link_class( 'button' );
	if (gt3_is_lwa()) {
		$classes .= ' lwa-links-modal lwa-login-link';
	}
	?>
	<fieldset>
		<label><?php _e( 'Have an account?', 'listingeasy' ); ?></label>
		<div class="field account-sign-in<?php echo gt3_is_lwa() ? ' lwa' : ''; ?>">
			<a class="<?php echo  $classes; ?>" href="<?php echo apply_filters( 'submit_job_form_login_url', $login_url ); ?>"><?php _e( 'Sign in', 'listingeasy' ); ?></a>

			<?php if ( $registration_enabled ) : ?>

				<?php printf( __( 'If you don&rsquo;t have an account you can %screate one below by entering your email address/username. Your account details will be confirmed via email.', 'listingeasy' ), $account_required ? '' : __( 'optionally', 'listingeasy' ) . ' ' ); ?>

			<?php elseif ( $account_required ) : ?>

				<?php echo apply_filters( 'submit_job_form_login_required_message',  __('You must sign in to create a new listing.', 'listingeasy' ) ); ?>

			<?php endif; ?>

		</div>
	</fieldset>
	<?php if ( $registration_enabled ) : ?>
	<?php if ( ! $generate_username_from_email ) : ?>
		<fieldset>
			<label><?php _e( 'Username', 'listingeasy' ); ?> <?php echo apply_filters( 'submit_job_form_required_label', ( ! $account_required ) ? ' <small>' . __( '(optional)', 'listingeasy' ) . '</small>' : '' ); ?></label>
			<div class="field">
				<input type="text" class="input-text" name="create_account_username" id="account_username" value="<?php echo empty( $_POST['create_account_username'] ) ? '' : esc_attr( sanitize_text_field( stripslashes( $_POST['create_account_username'] ) ) ); ?>" />
			</div>
		</fieldset>
	<?php endif; ?>
	<fieldset>
		<label><?php _e( 'Your email', 'listingeasy' ); ?> <?php echo apply_filters( 'submit_job_form_required_label', ( ! $account_required ) ? ' <small>' . __( '(optional)', 'listingeasy' ) . '</small>' : '' ); ?></label>
		<div class="field">
			<input type="email" class="input-text" name="create_account_email" id="account_email" placeholder="<?php esc_html_e( 'you@yourdomain.com', 'listingeasy' ); ?>" value="<?php echo empty( $_POST['create_account_email'] ) ? '' : esc_attr( sanitize_text_field( stripslashes( $_POST['create_account_email'] ) ) ); ?>" />
		</div>
	</fieldset>
	<?php do_action( 'job_manager_register_form' ); ?>
<?php endif; ?>

<?php endif; ?>
