<?php
/**
 * Job dashboard shortcode content if user is not logged in.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-dashboard-login.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.19.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div id="job-manager-job-dashboard">

	<p class="account-sign-in<?php echo gt3_is_lwa() ? ' lwa' : ''; ?>"><?php _e( 'You need to be signed in to manage your listings.', 'listingeasy' ); ?> <a class="button<?php echo gt3_is_lwa() ? ' lwa-links-modal lwa-login-link' : ''; ?>" href="<?php echo apply_filters( 'job_manager_job_dashboard_login_url', wp_login_url( get_permalink() ) ); ?>"><?php _e( 'Sign in', 'listingeasy' ); ?></a></p>

</div>