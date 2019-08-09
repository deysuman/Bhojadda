<?php global $wp; ?>
<form method="post" action="<?php echo defined( 'DOING_AJAX' ) ? '' : esc_url( remove_query_arg( array(
	'page',
	'paged'
), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) ) ); ?>" class="save_listing_form job-manager-form  wp-job-manager-bookmarks-form">
	<div class="save_listing_wrap  tooltip-container">
		<?php if ( $is_bookmarked ) { ?>
			<a class="btn_save_listing btn_save_listing--saved" href="<?php echo wp_nonce_url( add_query_arg( 'remove_bookmark', absint( $post->ID ), get_permalink() ), 'remove_bookmark' ); ?>">
				<i class="btn_save_listing__icon"></i>				
				<span class="btn_save_listing__value"><?php esc_html_e('Saved','listingeasy') ?></span>
			</a>
		<?php } else { ?>
			<a href="#" class="btn_save_listing tooltip-trigger  js-tooltip-trigger">
				<i class="btn_save_listing__icon"></i>	
				<span class="btn_save_listing__value"><?php esc_html_e('Save','listingeasy') ?></span>
			</a>		
			<div class="tooltip tooltip_element">
				<span class="bookmark_notes tooltip_element">
					<label for="bookmark_notes" class="tooltip_element">
						<?php esc_html_e( 'Notes:', 'listingeasy' ); ?>
					</label>
					<textarea class="tooltip_element" name="bookmark_notes" id="bookmark_notes" cols="25" rows="3"><?php echo esc_textarea( $note ); ?></textarea>
				</span>
				<span class="bookmark_submit">
					<?php wp_nonce_field( 'update_bookmark' ); ?>
					<input type="hidden" name="bookmark_post_id" value="<?php echo absint( $post->ID ); ?>"/>
					<input class="btn" type="submit" name="submit_bookmark" value="<?php echo ($is_bookmarked ? esc_html__( 'Update Bookmark', 'listingeasy' ) : esc_html__( 'Add Bookmark', 'listingeasy' )); ?>"/>
					<?php if ( $is_bookmarked ) { ?>
						<a class="remove-bookmark btn" href="<?php echo wp_nonce_url( add_query_arg( 'remove_bookmark', absint( $post->ID ), get_permalink() ), 'remove_bookmark' ); ?>">
							<?php esc_html_e( 'Clear', 'listingeasy' ); ?>
						</a>
					<?php } ?>
				</span>
			</div>
		<?php } ?>
	</div>
</form>


