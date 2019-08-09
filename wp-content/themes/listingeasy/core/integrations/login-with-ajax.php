<?php

function gt3_lwa_modal() {
	//double check just to be sure
	if ( gt3_is_lwa() ) {
		$atts = array(
			'profile_link' => true,
			'template'     => 'modal',
			'registration' => true,
			'redirect'     => false,
			'remember'     => true
		);

		return LoginWithAjax::shortcode( $atts );
	}

	return '';
}
function gt3_add_lwa_modal_in_footer() {
	if ( gt3_is_lwa() && ! is_user_logged_in() ) :
		echo '<div id="lwa-modal-holder">' . gt3_lwa_modal() . '</div>'; ?>

		<script type="text/javascript">
			jQuery( document ).ready( function( $ ) {
				$(window).load(function() {
					var $the_lwa_login_modal = $('.lwa-modal').first();
					$('.lwa-links-modal').each(function (i, e) {
						$(e).parents('.lwa').data('modal', $the_lwa_login_modal);
					});
				});
			});
		</script>

	<?php endif;
}
add_action( 'wp_footer', 'gt3_add_lwa_modal_in_footer' );