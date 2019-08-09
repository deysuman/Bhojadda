<?php
global $wp_post_types;

switch ( $job->post_status ) :
	case 'publish' :
		echo '<p class="m_b80">';
		printf( __( '%s listed successfully. To view your listing <a href="%s">click here</a>.', 'listingeasy' ), $wp_post_types['job_listing']->labels->singular_name, get_permalink( $job->ID ) );
		echo '</p>';
	break;
	case 'pending' :
		echo '<p class="m_b80">';
		printf( __( '%s submitted successfully. Your listing will be visible once approved.', 'listingeasy' ), $wp_post_types['job_listing']->labels->singular_name, get_permalink( $job->ID ) );
		echo '</p>';
	break;
	default :
		do_action( 'job_manager_job_submitted_content_' . str_replace( '-', '_', sanitize_title( $job->post_status ) ), $job );
	break;
endswitch;

do_action( 'job_manager_job_submitted_content_after', sanitize_title( $job->post_status ), $job );