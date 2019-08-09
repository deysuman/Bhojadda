<?php

#main config
if (class_exists( 'RWMB_Loader' )) {
	function gt3_metabox_init(){
    	require_once(get_template_directory() . "/core/metabox_config.php");
    }
	add_action('init', 'gt3_metabox_init', 20);
}


require_once(get_template_directory() . "/core/metabox_config.php");

require_once(get_template_directory() . "/core/config.php");
require_once(get_template_directory() . "/core/redux-config.php");
require_once(get_template_directory() . "/core/default-options.php");
require_once(get_template_directory() . "/core/aq_resizer.php");
require_once(get_template_directory() . "/core/vc/init.php");


#all registration
require_once(get_template_directory() . "/core/registrator/css-js.php");
require_once(get_template_directory() . "/core/registrator/ajax-handlers.php");
require_once(get_template_directory() . "/core/registrator/sidebars.php");
require_once(get_template_directory() . "/core/registrator/misc.php");
require_once(get_template_directory() . "/core/registrator/license_verification.php");

#widgets
require_once(get_template_directory() . "/core/widgets/flickr.php");
require_once(get_template_directory() . "/core/widgets/posts.php");
require_once(get_template_directory() . "/core/widgets/working_time.php");
require_once(get_template_directory() . "/core/widgets/contact_widget.php");
require_once(get_template_directory() . "/core/widgets/listings_recently.php");

#TGM init
require_once(get_template_directory() . "/core/tgm/gt3-tgm.php");

#Load WP Job Manager compatibility file.
if ( class_exists( 'WP_Job_Manager' ) ) {
	require_once(get_template_directory() . "/core/integrations/wp-job-manager.php");
}
/**
 * Load WP Job Manager Bookmarks compatibility file.
 * https://wpjobmanager.com/add-ons/bookmarks/
 */
if ( class_exists( 'WP_Job_Manager_Bookmarks' ) ) {
	require get_template_directory() . '/core/integrations/wp-job-manager-bookmarks.php';
}

/**
 * Load Login with Ajax compatibility file.
 * https://wordpress.org/plugins/login-with-ajax/
 */
if ( class_exists( 'LoginWithAjax' ) ) {
	require get_template_directory() . '/core/integrations/login-with-ajax.php';
}


/**
 * Load WP Job Manager Products compatibility file.
 * https://astoundify.com/downloads/wp-job-manager-products/
 */
if ( class_exists( 'WP_Job_Manager_Products' ) || class_exists( 'GT3_JM_Products_Integration' ) ) {
	require get_template_directory() . '/core/integrations/wp-job-manager-products.php';
}
