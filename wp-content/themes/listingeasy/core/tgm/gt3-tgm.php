<?php

require_once get_template_directory() . '/core/tgm/class-tgm-plugin-activation.php'; 

add_action('tgmpa_register', 'gt3_register_required_plugins');
function gt3_register_required_plugins()
{

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $path =  get_template_directory();
    $plugins = array(
        array(
            'name'               => esc_html__('GT3 ListingEasy Core Plugin', 'listingeasy' ), // The plugin name.
            'slug'               => 'gt3-listingeasy-core-plugin', // The plugin slug (typically the folder name).
            'source'             => $path. '/core/tgm/plugins/gt3-listingeasy-core-plugin.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.0.7.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),
        array(
            'name'          => esc_html__('WPBakery Visual Composer', 'listingeasy' ), // The plugin name
            'slug'          => 'js_composer', // The plugin slug (typically the folder name)
            'source'            => $path . '/core/tgm/plugins/js_composer.zip', // The plugin source
            'required'          => true, // If false, the plugin is only 'recommended' instead of required
            'version'           => '5.5.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwize a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        ),
        array(
            'name'      		 => esc_html__('WP Job Manager', 'listingeasy' ), // The plugin name
            'slug'      		 => 'wp-job-manager',
            'required'  		 => true
        ),
        array(
            'name'               => esc_html__('Login With Ajax', 'listingeasy' ), // The plugin name
            'slug'               => 'login-with-ajax',
            'required'           => true
        ),
        array(
            'name'               => esc_html__('Category Icon', 'listingeasy' ), // The plugin name
            'slug'               => 'category-icon',
            'required'  		 => false
        ),
        array(
            'name'               => esc_html__('Regions for WP Job Manager', 'listingeasy' ), // The plugin name
            'slug'               => 'wp-job-manager-locations',
            'required'  		 => false
        ),
        array(
            'name'               => esc_html__('Contact Form 7', 'listingeasy' ),
            'slug'               => 'contact-form-7',
            'required'           => false,
        ),
        array(
            'name'               => esc_html__('oAuth Twitter Feed for Developers', 'listingeasy' ),
            'slug'               => 'oauth-twitter-feed-for-developers',
            'required'           => false,
        ),
        array(
            'name'               => esc_html__('Instagram Feed', 'listingeasy' ),
            'slug'               => 'instagram-feed',
            'required'           => false,
        ),
        array(
            'name'         => esc_html__('GT3 Photo & Video Gallery', 'listingeasy' ),
            'slug'         => 'gt3-photo-video-gallery',
            'required'       => false,
        ),
        array(
            'name'         => esc_html__('WooCommerce', 'listingeasy' ),
            'slug'         => 'woocommerce',
            'required'       => false,
        ),
        array(
            'name'                  => 'Nextend Social Login and Register (Facebook, Google, Twitter)',
            'slug'                  => 'nextend-facebook-connect', 
            'required'       => false,
        ),
        array(
            'name'          => esc_html__('Extended Location', 'listingeasy' ), // The plugin name
            'slug'          => 'gt3-extended-location', // The plugin slug (typically the folder name)
            'source'            => $path . '/core/tgm/plugins/gt3-extended-location.zip', // The plugin source
            'required'          => false, // If false, the plugin is only 'recommended' instead of required
            'version'           => '1.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwize a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        ),
        array(
            'name'          => esc_html__('Products Integration', 'listingeasy' ), // The plugin name
            'slug'          => 'gt3-products-integration', // The plugin slug (typically the folder name)
            'source'            => $path . '/core/tgm/plugins/gt3-products-integration.zip', // The plugin source
            'required'          => false, // If false, the plugin is only 'recommended' instead of required
            'version'           => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwize a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                       // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins',  // Menu slug.
        'has_notices'  => true,                     // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                       // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                     // Automatically activate plugins after installation or not.
        'message'      => '',                       // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'listingeasy' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'listingeasy' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'listingeasy' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'listingeasy' ),
            'notice_can_install_required'     => esc_html__( 'This theme requires the following plugins: %1$s.', 'listingeasy' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => esc_html__( 'This theme recommends the following plugins: %1$s.', 'listingeasy' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => esc_html__( 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'listingeasy' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => esc_html__( 'The following required plugins are currently inactive: %1$s.', 'listingeasy' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => esc_html__( 'The following recommended plugins are currently inactive: %1$s.', 'listingeasy' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => esc_html__( 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'listingeasy' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => esc_html__( 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'listingeasy' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => esc_html__( 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'listingeasy' ), // %1$s = plugin name(s).
            'install_link'                    => esc_html__( 'Begin installing plugins', 'listingeasy' ),
            'activate_link'                   => esc_html__( 'Begin activating plugins', 'listingeasy' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'listingeasy' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'listingeasy' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'listingeasy' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}