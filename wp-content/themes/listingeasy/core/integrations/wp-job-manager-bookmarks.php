<?php

// Display bookmark heart on listing archives
function gt3_add_bookmark_heart_to_listing( $post ) {
	global $job_manager_bookmarks;

	if ( $job_manager_bookmarks !== null && method_exists( $job_manager_bookmarks, 'is_bookmarked' ) ) {
		$bookmark_state = '';
		$bookmark_state_text = esc_html__('Save','listingeasy');
		

		if (  $job_manager_bookmarks->is_bookmarked( $post->ID ) ) {
			$bookmark_state = ' btn_save_listing--saved';
			$bookmark_state_text = esc_html__('Saved','listingeasy');
		} ?>
		<div class="btn_save_listing<?php echo esc_html($bookmark_state); ?>">
			<i class="btn_save_listing__icon"></i>
			<span class="btn_save_listing__value"><?php echo  $bookmark_state_text ?></span>
		</div>
	<?php }
}
add_action( 'gt3_listing_bookmark_out', 'gt3_add_bookmark_heart_to_listing', 10, 1 );

global $job_manager_bookmarks;
remove_action( 'single_job_listing_meta_after', array( $job_manager_bookmarks, 'bookmark_form' ) );
remove_action( 'single_resume_start', array( $job_manager_bookmarks, 'bookmark_form' ) );
