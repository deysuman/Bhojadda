<div class="job-manager-uploaded-file">
	<?php
	$extension = ! empty( $extension ) ? $extension : substr( strrchr( $value, '.' ), 1 );

	if (wp_get_attachment_url($value)) {
		$value_link = wp_get_attachment_url($value);
	} else {
		$value_link = $value;
	}

	if ( 3 !== strlen( $extension ) || in_array( $extension, array( 'jpg', 'gif', 'png', 'jpeg', 'jpe' ) ) ) : ?>
		<span class="job-manager-uploaded-file-preview"><img src="<?php echo esc_url( $value_link ); ?>" /> <a class="job-manager-remove-uploaded-file" href="#"><?php _e( 'Remove', 'listingeasy' ); ?></a></span>
	<?php else : ?>

	<?php endif; ?>

	<input type="hidden" class="input-text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" />
</div>