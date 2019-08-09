<?php 
/*
 * This is the page users will see logged out. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
	<div class="lwa lwa-template-modal"><?php //class must be here, and if this is a template, class name should be that of template directory ?>

		<?php 
		//FOOTER - once the page loads, this will be moved automatically to the bottom of the document.
		?>
		<div class="lwa-modal" style="display:none;top: 200px;">
			<form name="lwa-form" class="lwa-form  lwa-login  js-lwa-login  form-visible" action="<?php echo esc_attr(LoginWithAjax::$url_login); ?>" method="post">
				<h3><?php esc_html_e( 'Hey, welcome back!','listingeasy' ) ?></h3>
				<p>
					<input type="text" name="log" id="lwa_user_login" class="input" placeholder="<?php esc_html_e( 'Username or Email Address *','listingeasy' ) ?>" />
				</p>
				<p>
					<input type="password" name="pwd" id="lwa_user_pass" class="input" value="" placeholder="<?php esc_html_e( 'Password *','listingeasy' ) ?>" />
				</p>
				<?php do_action('login_form'); ?>
				<p class="lwa-meta  row">
					<span class="span6 remember-me">
						<input name="rememberme" type="checkbox" id="lwa_rememberme" class="remember-me-checkbox" value="1" /><label for="lwa_rememberme"><?php esc_html_e( 'Remember me','listingeasy' ) ?></label>
					</span>
					<?php if( !empty($lwa_data['remember']) ): ?>
					<span class="span6 lost-password">
						<a class="lwa-show-remember-pass  lwa-action-link  js-lwa-open-remember-form" href="<?php echo esc_attr(LoginWithAjax::$url_remember); ?>" title="<?php esc_html_e('Password Lost and Found','listingeasy') ?>"><?php esc_html_e('Lost your password?','listingeasy') ?></a>
					</span>
					<?php endif; ?>
				</p>
				<p class="lwa-submit-wrapper">
					<button type="submit" name="wp-submit" class="lwa-wp-submit" tabindex="100"><span class="button-arrow"><?php esc_html_e('Login','listingeasy'); ?></span></button>
					<input type="hidden" name="lwa_profile_link" value="<?php echo !empty($lwa_data['profile_link']) ? 1:0 ?>" />
					<input type="hidden" name="login-with-ajax" value="login" />
					<?php if( !empty($lwa_data['redirect']) ): ?>
						<input type="hidden" name="redirect_to" value="<?php echo esc_url($lwa_data['redirect']); ?>" />
					<?php endif; ?>
				</p>
				<?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) ) : ?>
				<p class="lwa-bottom-text">
					<?php echo __('Don\'t have an account?', 'listingeasy'); ?> <a href="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" class="lwa-action-link  js-lwa-open-register-form"><?php esc_html_e('Sign up','listingeasy'); ?></a>
				</p>
				<?php endif; ?>
				<?php gt3_social_login_out(); ?>
			</form>

        	<?php if( !empty($lwa_data['remember']) ): ?>
	        <form name="lwa-remember" class="lwa-remember  lwa-form  js-lwa-remember" action="<?php echo esc_attr(LoginWithAjax::$url_remember); ?>" method="post" style="display:none;">
	        	<h3><?php esc_html_e( 'Reset Password','listingeasy' ) ?></h3>
				<p>
				    <input type="text" name="user_login" id="lwa_user_remember" placeholder="<?php esc_html_e("Username or Email", 'listingeasy'); ?>" />
					<?php do_action('lostpassword_form'); ?>
				</p>
				<p class="lwa-submit-wrapper">
	                <button type="submit"><span class="button-arrow"><?php esc_attr_e("Get New Password", 'listingeasy'); ?></span></button>
	                <input type="hidden" name="login-with-ajax" value="remember" />
				</p>
		        <p class="cancel-button-wrapper">
			        <a href="#" class="lwa-action-link  js-lwa-close-remember-form"><?php esc_html_e("Cancel",'listingeasy'); ?></a>
		        </p>

	        </form>
	        <?php endif; ?>
		    <?php if ( get_option('users_can_register') && !empty($lwa_data['registration']) ) : //Taken from wp-login.php ?>
			<form name="lwa-register" class="lwa-register  lwa-form  js-lwa-register" action="<?php echo esc_attr(LoginWithAjax::$url_register); ?>" method="post">
				<h3><?php esc_html_e( 'Register','listingeasy' ) ?></h3>
				<p>
					<input type="text" name="user_login" id="user_login" placeholder="<?php esc_html_e( 'Username','listingeasy' ) ?>" />
				</p>

				<p>
					<input type="text" name="user_email" id="user_email" placeholder="<?php esc_html_e( 'Email address','listingeasy' ) ?>" />
				</p>
				<?php
				//If you want other plugins to play nice, you need this:
				do_action('register_form');
				?>

				<p class="lwa-meta">
					<?php esc_html_e('A password will be e-mailed to you.','listingeasy') ?><br />
				</p>

				<p class="lwa-submit-wrapper">
					<button type="submit" tabindex="100"><span class="button-arrow"><?php esc_html_e('Register','listingeasy'); ?></span></button>
					<input type="hidden" name="login-with-ajax" value="register" />
				</p>

				<p class="lwa-bottom-text">
					<?php echo __('Already have an account?', 'listingeasy'); ?> <a href="#" class="lwa-action-link  js-lwa-close-register-form"><?php esc_html_e('Log in', 'listingeasy'); ?></a>
				</p>
				<?php gt3_social_login_out(); ?>
			</form>
			<?php endif; ?>
		</div>
	</div>