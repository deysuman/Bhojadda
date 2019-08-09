<?php

#job manager css-js
add_action( 'wp_enqueue_scripts', 'gt3_job_manager_css_js', 11, 1);
function gt3_job_manager_css_js() {
    wp_enqueue_style("chosen", get_template_directory_uri() . '/core/integrations/css/chosen.min.css');
    wp_enqueue_script('chosen', get_template_directory_uri() . '/core/integrations/js/chosen.jquery.min.js', array(), false, true);

    wp_enqueue_style("gt3_job_manager", get_template_directory_uri() . '/core/integrations/css/gt3-job-manager.css');
    if ( class_exists( 'LoginWithAjax' ) ) {
        wp_enqueue_style( 'listingeasy-login-with-ajax', get_template_directory_uri() . '/core/integrations/css/login-with-ajax.css' );
    }
}

/**
 * Custom functions that setup/change/alter the behaviour of WP Job Manager.
 * See: https://wpjobmanager.com/
 *
 * @package ListingEasy
 */

/**
 * ======  Wp Jobs Manager Filters START  ======
 */
function gt3_change_job_into_listing( $args ) {

    $singular = esc_html__( 'Listing', 'listingeasy' );
    $plural   = esc_html__( 'Listings', 'listingeasy' );

    $args['labels']      = array(
        'name'               => $plural,
        'singular_name'      => $singular,
        'menu_name'          => $plural,
        'all_items'          => sprintf( esc_html__( 'All %s', 'listingeasy' ), $plural ),
        'add_new'            => esc_html__( 'Add New', 'listingeasy' ),
        'add_new_item'       => sprintf( esc_html__( 'Add %s', 'listingeasy' ), $singular ),
        'edit'               => esc_html__( 'Edit', 'listingeasy' ),
        'edit_item'          => sprintf( esc_html__( 'Edit %s', 'listingeasy' ), $singular ),
        'new_item'           => sprintf( esc_html__( 'New %s', 'listingeasy' ), $singular ),
        'view'               => sprintf( esc_html__( 'View %s', 'listingeasy' ), $singular ),
        'view_item'          => sprintf( esc_html__( 'View %s', 'listingeasy' ), $singular ),
        'search_items'       => sprintf( esc_html__( 'Search %s', 'listingeasy' ), $plural ),
        'not_found'          => sprintf( esc_html__( 'No %s found', 'listingeasy' ), $plural ),
        'not_found_in_trash' => sprintf( esc_html__( 'No %s found in trash', 'listingeasy' ), $plural ),
        'parent'             => sprintf( esc_html__( 'Parent %s', 'listingeasy' ), $singular )
    );
    $args['description'] = sprintf( esc_html__( 'This is where you can create and manage %s.', 'listingeasy' ), $plural );
    $args['supports']    = array( 'title', 'editor', 'custom-fields', 'publicize', 'comments', 'thumbnail' );
    $args['rewrite']     = array( 'slug' => 'listings' );

    $permalinks = get_option( 'gt3_permalinks_settings' );
    if ( isset( $permalinks['listing_base'] ) && ! empty( $permalinks['listing_base'] ) ) {
        $args['rewrite']['slug'] = $permalinks['listing_base'];
    }

    return $args;
}

add_filter( 'register_post_type_job_listing', 'gt3_change_job_into_listing' );

function gt3_change_taxonomy_job_listing_type_args( $args ) {
    $singular = esc_html__( 'Listing Type', 'listingeasy' );
    $plural   = esc_html__( 'Listings Types', 'listingeasy' );

    $args['label']  = $plural;
    $args['labels'] = array(
        'name'              => $plural,
        'singular_name'     => $singular,
        'menu_name'         => esc_html__( 'Types', 'listingeasy' ),
        'search_items'      => sprintf( esc_html__( 'Search %s', 'listingeasy' ), $plural ),
        'all_items'         => sprintf( esc_html__( 'All %s', 'listingeasy' ), $plural ),
        'parent_item'       => sprintf( esc_html__( 'Parent %s', 'listingeasy' ), $singular ),
        'parent_item_colon' => sprintf( esc_html__( 'Parent %s:', 'listingeasy' ), $singular ),
        'edit_item'         => sprintf( esc_html__( 'Edit %s', 'listingeasy' ), $singular ),
        'update_item'       => sprintf( esc_html__( 'Update %s', 'listingeasy' ), $singular ),
        'add_new_item'      => sprintf( esc_html__( 'Add New %s', 'listingeasy' ), $singular ),
        'new_item_name'     => sprintf( esc_html__( 'New %s Name', 'listingeasy' ), $singular )
    );

    if ( isset( $args['rewrite'] ) && is_array( $args['rewrite'] ) ) {
        $args['rewrite']['slug'] = _x( 'listing-type', 'Listing type slug - resave permalinks after changing this', 'listingeasy' );
    }

    return $args;
}

add_filter( 'register_taxonomy_job_listing_type_args', 'gt3_change_taxonomy_job_listing_type_args' );

function gt3_change_taxonomy_job_listing_category_args( $args ) {
    $singular = esc_html__( 'Listing Category', 'listingeasy' );
    $plural   = esc_html__( 'Listings Categories', 'listingeasy' );

    $args['label'] = $plural;

    $args['labels'] = array(
        'name'              => $plural,
        'singular_name'     => $singular,
        'menu_name'         => esc_html__( 'Categories', 'listingeasy' ),
        'search_items'      => sprintf( esc_html__( 'Search %s', 'listingeasy' ), $plural ),
        'all_items'         => sprintf( esc_html__( 'All %s', 'listingeasy' ), $plural ),
        'parent_item'       => sprintf( esc_html__( 'Parent %s', 'listingeasy' ), $singular ),
        'parent_item_colon' => sprintf( esc_html__( 'Parent %s:', 'listingeasy' ), $singular ),
        'edit_item'         => sprintf( esc_html__( 'Edit %s', 'listingeasy' ), $singular ),
        'update_item'       => sprintf( esc_html__( 'Update %s', 'listingeasy' ), $singular ),
        'add_new_item'      => sprintf( esc_html__( 'Add New %s', 'listingeasy' ), $singular ),
        'new_item_name'     => sprintf( esc_html__( 'New %s Name', 'listingeasy' ), $singular )
    );

    if ( isset( $args['rewrite'] ) && is_array( $args['rewrite'] ) ) {
        $args['rewrite']['slug'] = _x( 'listing-category', 'Listing category slug - resave permalinks after changing this', 'listingeasy' );
    }

    $permalinks = get_option( 'gt3_permalinks_settings' );
    if ( isset( $permalinks['category_base'] ) && ! empty( $permalinks['category_base'] ) ) {
        $args['rewrite']['slug'] = $permalinks['category_base'];
    }

    return $args;
}

add_filter( 'register_taxonomy_job_listing_category_args', 'gt3_change_taxonomy_job_listing_category_args' );


/**
 * Change "Job" into "Listing" on the wp-job-manager setup pages.
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function gt3_change_comment_field_names( $translated_text, $text, $domain ) {

    switch ( $translated_text ) {
        case 'Post a Job' :
            $translated_text = __( 'Post a Listing', 'listingeasy' );
            break;

        case 'Job Dashboard' :
            $translated_text = __( 'Listing Dashboard', 'listingeasy' );
            break;

        case 'Jobs':
            $translated_text = __( 'Listings', 'listingeasy' );
            break;

        default:
            break;
    }

    return $translated_text;
}

/**
 * Change "Job" into "Listing" only on the wp-job-manager setup pages.
 */
function gt3_admin_head_thing( $thing ) {
    if ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] === 'job-manager-setup' ) {
        add_filter( 'gettext_with_context', 'gt3_change_comment_field_names', 999999, 3 );
    }
}

add_action( 'admin_init', 'gt3_admin_head_thing' );


function gt3_filter_wp_jobs_manager_settings( $args ) {
    /**
     * Now we are gone replace in all settings descriptions the "Job" with "Listing"
     */
    array_walk_recursive( $args, 'gt3_replace_jobs_with_listings' );

    if ( ! empty(  $args['job_listings'][1] ) ) {
        foreach( $args['job_listings'][1] as $key => $field ) {
            if ( 'job_manager_enable_default_category_multiselect' === $field['name'] ) {
                unset( $args['job_listings'][1][$key] );
                break;
            }
        }
    }

    return $args;
}

add_filter( 'job_manager_settings', 'gt3_filter_wp_jobs_manager_settings', 9999999 );

function gt3_replace_jobs_with_listings( &$item, $key ) {

    if ( $item === 'Job Listings' ) {
        $item = esc_html__( 'Listing', 'listingeasy' );
    }

    if ( $item === 'Job Submission' ) {
        $item = esc_html__( 'Submission', 'listingeasy' );
    }

    if ( $key === 'desc' || $key === 'any' || $key === 'all' || $key === 'label' ) {
        if ( is_numeric( strpos( $item, 'Job' ) ) ) {
            $item = str_replace( 'Job', esc_html__( 'Listing', 'listingeasy' ), $item );
        }
    }

    return $item;
}

function gt3_get_term_image_url( $term_id = null, $size = 'thumbnail' ) {

    $attachment_id = gt3_get_term_image_id( $term_id );

    if ( ! empty( $attachment_id ) ) {
        $attach_args = wp_get_attachment_image_src( $attachment_id, $size );

        // $attach_args[0] should be the url
        if ( isset( $attach_args[0] ) ) {
            return $attach_args[0];
        }
    }

    return false;
}

function gt3_get_term_image_id( $term_id = null, $taxonomy = null ) {

    if ( function_exists( 'get_term_meta' ) ) {

        if ( null === $term_id ) {
            global $wp_query;
            $term    = $wp_query->queried_object;
            $term_id = $term->term_id;

        }

        return get_term_meta( $term_id, 'pix_term_image', true );
    }

    return false;
}

function gt3_get_term_icon_id( $term_id = null, $taxonomy = null ) {

    if ( function_exists( 'get_term_meta' ) ) {

        if ( null === $term_id ) {
            global $wp_query;
            $term    = $wp_query->queried_object;
            $term_id = $term->term_id;

        }

        return get_term_meta( $term_id, 'pix_term_icon', true );
    }

    return false;
}

function gt3_get_term_icon_url( $term_id = null, $size = 'thumbnail' ) {

    $attachment_id = gt3_get_term_icon_id( $term_id );

    if ( ! empty( $attachment_id ) ) {
        $attach_args = wp_get_attachment_image_src( $attachment_id, $size );
        if (!empty($attach_args) && is_array($attach_args)) {
            $attach_args['attachment_id'] = $attachment_id;
            return $attach_args;
        }
        return $attach_args;
        // $attach_args[0] should be the url
        if ( isset( $attach_args[0] ) ) {
            return $attach_args[0];
        }
    }

    return false;
}

#Add Listing Category Color Page
function gt3_job_listing_category_add_meta_fields( $taxonomy ) {
    ?>
    <div class="form-field term-group gt3_cpicker_wrap">
        <label for="gt3_listing_label_color"><?php _e( 'Label Color', 'listingeasy' ); ?></label>
        <input type="text" class="cpicker" id="gt3_listing_label_color" name="gt3_listing_label_color" value="<?php echo esc_attr(gt3_option("theme-custom-color")); ?>" />
    </div>
<?php
}
add_action( 'job_listing_category_add_form_fields', 'gt3_job_listing_category_add_meta_fields', 10, 2 );

#The Edit Listing Category Color Page
function gt3_job_listing_category_edit_meta_fields( $term, $taxonomy ) {
    $gt3_listing_label_color = get_term_meta( $term->term_id, 'gt3_listing_label_color', true );
    if (strlen($gt3_listing_label_color) > 0) {
        $gt3_listing_label_color_value = $gt3_listing_label_color;
    } else {
        $gt3_listing_label_color_value = gt3_option("theme-custom-color");
    }
    ?>
    <tr class="form-field term-group-wrap gt3_cpicker_wrap">
        <th scope="row">
            <label for="gt3_listing_label_color"><?php _e( 'Label Color', 'listingeasy' ); ?></label>
        </th>
        <td>
            <input type="text" class="cpicker" id="gt3_listing_label_color" name="gt3_listing_label_color" value="<?php echo esc_attr($gt3_listing_label_color_value); ?>" />
        </td>
    </tr>
<?php
}
add_action( 'job_listing_category_edit_form_fields', 'gt3_job_listing_category_edit_meta_fields', 10, 2 );

#Saving Listing Category Color Page Meta
function gt3_job_listing_category_save_taxonomy_meta( $term_id, $tag_id ) {
    if( isset( $_POST['gt3_listing_label_color'] ) ) {
        update_term_meta( $term_id, 'gt3_listing_label_color', esc_attr( $_POST['gt3_listing_label_color'] ) );
    }
}
add_action( 'created_job_listing_category', 'gt3_job_listing_category_save_taxonomy_meta', 10, 2 );
add_action( 'edited_job_listing_category', 'gt3_job_listing_category_save_taxonomy_meta', 10, 2 );

#Adding Listing Category Color in table
function gt3_job_listing_category_add_field_columns( $columns ) {
    $columns['gt3_listing_label_color'] = __( 'Label Color', 'listingeasy' );

    return $columns;
}
add_filter( 'manage_edit-job_listing_category_columns', 'gt3_job_listing_category_add_field_columns' );

function gt3_job_listing_category_add_field_column_contents( $content, $column_name, $term_id ) {
    switch( $column_name ) {
        case 'gt3_listing_label_color' :
            $content = get_term_meta( $term_id, 'gt3_listing_label_color', true );
            break;

    }
    if (strlen($content) > 0) {
        $gt3_listing_label_color_value = $content;
    } else {
        $gt3_listing_label_color_value = gt3_option("theme-custom-color");
    }
    echo '<span class="color_icon_label" style="background: '.esc_attr($gt3_listing_label_color_value).'"></span>';
}
add_filter( 'manage_job_listing_category_custom_column', 'gt3_job_listing_category_add_field_column_contents', 10, 3 );

function gt3_permalink_settings_init() {
    // Add our settings
    add_settings_field(
        'gt3_listing_slug',            // id
        esc_html__( '&#x1F4CE; Listing URL Base', 'listingeasy' ),   // setting title
        'gt3_listing_slug_input',  // display callback
        'permalink',                                    // settings page
        'optional'                                      // settings section
    );
    add_settings_field(
        'gt3_listing_category_slug',            // id
        esc_html__( '&#x1F4C2; Listing Category Base', 'listingeasy' ),   // setting title
        'gt3_listing_category_slug_input',  // display callback
        'permalink',                                    // settings page
        'optional'                                      // settings section
    );
    add_settings_field(
        'gt3_listing_tag_slug',                 // id
        esc_html__( '&#128204; Listing Tag Base', 'listingeasy' ),        // setting title
        'gt3_listing_tag_slug_input',       // display callback
        'permalink',                                    // settings page
        'optional'                                      // settings section
    );

    // now let's save these options
    if ( ! is_admin() ) {
        return;
    }

    // We need to save the options ourselves; settings api does not trigger save for the permalinks page
    if ( isset( $_POST['gt3_listing_category_slug'] ) && isset( $_POST['gt3_listing_tag_slug'] ) ) {
        // Cat and tag bases
        $gt3_listings_slug = sanitize_text_field( $_POST['gt3_listing_base_slug'] );
        $gt3_category_slug = sanitize_text_field( $_POST['gt3_listing_category_slug'] );
        $gt3_tag_slug      = sanitize_text_field( $_POST['gt3_listing_tag_slug'] );

        $permalinks = get_option( 'gt3_permalinks_settings' );

        if ( ! $permalinks ) {
            $permalinks = array();
        }

        $permalinks['listing_base']  = untrailingslashit( $gt3_listings_slug );
        $permalinks['category_base'] = untrailingslashit( $gt3_category_slug );
        $permalinks['tag_base']      = untrailingslashit( $gt3_tag_slug );

        update_option( 'gt3_permalinks_settings', $permalinks );


    }
}

add_action( 'admin_init', 'gt3_permalink_settings_init' );

function gt3_listing_slug_input() {
    $permalinks = get_option( 'gt3_permalinks_settings' ); ?>
    <input name="gt3_listing_base_slug" type="text" class="regular-text code" value="<?php if ( isset( $permalinks['listing_base'] ) ) {
        echo esc_attr( $permalinks['listing_base'] );
    } ?>" placeholder="<?php echo esc_attr_x( 'listings', 'slug', 'listingeasy' ) ?>"/>
<?php
}

function gt3_listing_category_slug_input() {
    $permalinks = get_option( 'gt3_permalinks_settings' ); ?>
    <input name="gt3_listing_category_slug" type="text" class="regular-text code" value="<?php if ( isset( $permalinks['category_base'] ) ) {
        echo esc_attr( $permalinks['category_base'] );
    } ?>" placeholder="<?php echo esc_attr_x( 'listing-category', 'slug', 'listingeasy' ) ?>"/>
<?php
}

function gt3_listing_tag_slug_input() {
    $permalinks = get_option( 'gt3_permalinks_settings' ); ?>
    <input name="gt3_listing_tag_slug" type="text" class="regular-text code" value="<?php if ( isset( $permalinks['tag_base'] ) ) {
        echo esc_attr( $permalinks['tag_base'] );
    } ?>" placeholder="<?php echo esc_attr_x( 'listing-tag', 'slug', 'listingeasy' ) ?>"/>
<?php
}

function gt3_display_popular_listing_categories($popular_searches_count, $popular_searches_text, $popular_searches_slug) {
    $term_list = array();

    //first let's do only one query and get all the terms - we will reuse this info to avoid multiple queries
    $query_args = array( 'orderby' => 'count', 'order' => 'DESC', 'hide_empty' => false, 'hierarchical' => true, 'pad_counts' => true );

    $all_terms = get_terms(
        'job_listing_category',
        $query_args
    );

    //bail if there was an error
    if ( is_wp_error( $all_terms ) ) {
        return;
    }

    //now create an array with the category slug as key so we can reference/search easier
    $all_categories = array();
    foreach ( $all_terms as $key => $term ) {
        $all_categories[ $term->slug ] = $term;
    }

    $categories = esc_attr($popular_searches_slug);
    $custom_category_labels = array();

    //if we have received a list of categories to display (their slugs and optional label), use that
    if ( ! empty( $categories ) ) {
        $categories = explode( ',', $categories );
        foreach ( $categories as $key => $category ) {
            if ( strpos( $category, '(' ) !== false ) {
                $category  = explode( '(', $category );
                $term_slug = trim( $category[0] );

                if ( substr( $category[1], - 1, 1 ) == ')' ) {
                    $custom_category_labels[ $term_slug ] = trim( substr( $category[1], 0, - 1 ) );
                }

                if ( array_key_exists( $term_slug, $all_categories ) ) {
                    $term_list[] = $all_categories[ $term_slug ];
                }
            } else {
                $term_slug   = trim( $category );

                if ( array_key_exists( $term_slug, $all_categories ) ) {
                    $term_list[] = $all_categories[ $term_slug ];
                }
            }
        }
    } else {
        //it seems we will have to figure out ourselves what categories to display
        $term_list = array_slice( $all_categories, 0, $popular_searches_count);
    }

    if ( $term_list && strlen($popular_searches_text) > 0 ) {
        echo '<div class="popular_searches_label">' . esc_attr($popular_searches_text) . '</div>';
    }

    foreach ( $term_list as $key => $term ) :
        if ( ! $term || ( is_array( $term ) && isset( $term['invalid_taxonomy'] ) ) ) {
            continue;
        } ?>

        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo isset( $custom_category_labels[ $term->slug ] ) ? $custom_category_labels[ $term->slug ] : $term->name; ?></a>

    <?php endforeach;

}

function gt3_listings_page_shortcode_get_show_map_param() {
    //if there is a page set in the Listings settings use that
    $listings_page_id = get_option( 'job_manager_jobs_page_id', false );
    if ( false !== $listings_page_id ) {
        $listings_page = get_post( $listings_page_id );
        if ( ! is_wp_error( $listings_page ) ) {
            return gt3_jobs_shortcode_get_show_map_param( $listings_page->post_content );
        }
    }

    //by default we will show the map
    return true;
}

function gt3_jobs_shortcode_get_show_map_param( $content = '' ) {
    global $post;

    if ( empty( $content ) && isset( $post->post_content ) ) {
        $content = get_the_content();
        //if we are on an archive (like category or tag) ignore the description (content)
        if ( is_archive() || empty( $content ) ) {
            //check to see if we have a global shortcode - probably coming from a archive template
            global $current_jobs_shortcode;
            if ( isset( $current_jobs_shortcode ) && ! empty( $current_jobs_shortcode ) ) {
                $content = $current_jobs_shortcode;
            } else {
                //if there is no content of the current page/post and no global shortcode
                return true;
            }
        }
    }

    //lets see if we have a show_map parameter
    $show_map = gt3_get_shortcode_param_value( $content, 'jobs', 'show_map', true );
    //if it is a string like "true" we need to remove the "
    if ( is_string( $show_map ) ) {
        $show_map = str_replace( '"', '', $show_map );
    }

    //make sure that $show_map is actually bool
    return gt3_string_to_bool( $show_map );
}

function gt3_get_shortcode_param_value( $content, $shortcode, $param, $default ) {
    $param_value = $default;
    if ( has_shortcode( $content, $shortcode ) ) {
        $pattern = get_shortcode_regex( array( $shortcode ) );

        if ( preg_match_all( '/'. $pattern .'/s', $content, $matches ) ) {
            $keys = array();
            $result = array();
            foreach( $matches[0] as $key => $value) {
                // $matches[3] return the shortcode attribute as string
                // replace space with '&' for parse_str() function
                $get = str_replace(" ", "&" , $matches[3][$key] );
                parse_str($get, $output);

                //get all shortcode attribute keys
                $keys = array_unique( array_merge(  $keys, array_keys($output)) );
                $result[] = $output;

            }

            if ( ! empty( $result ) ) {
                $value = gt3_preg_match_array_get_value_by_key( $result, $param );

                if ( null !== $value ) {
                    //just in case someone has magic_quotes activated
                    $param_value = stripslashes_deep( $value );
                }
            }
        }
    }

    return $param_value;
}

function gt3_preg_match_array_get_value_by_key( $arrs, $searched ) {
    foreach ( $arrs as $arr ) {
        foreach ( $arr as $key => $value ) {
            if (  $key == $searched ) {
                return $value;
            }
        }
    }

    return null;
}

function gt3_string_to_bool( $value ) {
    return ( is_bool( $value ) && $value ) || in_array( $value, array( '1', 'true', 'yes' ) ) ? true : false;
}

function gt3_listings_page_shortcode_get_orderby_param() {
    //if there is a page set in the Listings settings use that
    $listings_page_id = get_option( 'job_manager_jobs_page_id', false );
    if ( false !== $listings_page_id ) {
        $listings_page = get_post( $listings_page_id );
        if ( ! is_wp_error( $listings_page ) ) {
            return gt3_jobs_shortcode_get_orderby_param( $listings_page->post_content );
        }
    }

    //the default orderby
    return 'featured';
}

function gt3_jobs_shortcode_get_orderby_param( $content = '' ) {
    if ( empty( $content ) ) {
        $content = get_the_content();
        if ( empty( $content ) ) {
            //check to see if we have a global shortcode - probably coming from a archive template
            global $current_jobs_shortcode;
            if ( isset( $current_jobs_shortcode ) && ! empty( $current_jobs_shortcode ) ) {
                $content = $current_jobs_shortcode;
            } else {
                //if there is no content of the current page/post and no global shortcode
                return true;
            }
        }
    }
    //lets see if we have a orderby parameter
    $orderby = gt3_get_shortcode_param_value( $content, 'jobs', 'orderby', 'featured' );
    //if it is a string like "true" we need to remove the "
    if ( is_string( $orderby ) ) {
        $orderby = str_replace( '"', '', $orderby );
    }

    return $orderby;
}

function gt3_listings_page_shortcode_get_order_param() {
    //if there is a page set in the Listings settings use that
    $listings_page_id = get_option( 'job_manager_jobs_page_id', false );
    if ( false !== $listings_page_id ) {
        $listings_page = get_post( $listings_page_id );
        if ( ! is_wp_error( $listings_page ) ) {
            return gt3_jobs_shortcode_get_order_param( $listings_page->post_content );
        }
    }

    //the default order
    return 'DESC';
}

function gt3_jobs_shortcode_get_order_param( $content = '' ) {
    if ( empty( $content ) ) {
        $content = get_the_content();
        if ( empty( $content ) ) {
            //check to see if we have a global shortcode - probably coming from a archive template
            global $current_jobs_shortcode;
            if ( isset( $current_jobs_shortcode ) && ! empty( $current_jobs_shortcode ) ) {
                $content = $current_jobs_shortcode;
            } else {
                //if there is no content of the current page/post and no global shortcode
                return true;
            }
        }
    }
    //lets see if we have a order parameter
    $order = gt3_get_shortcode_param_value( $content, 'jobs', 'order', 'DESC' );
    //if it is a string like "true" we need to remove the "
    if ( is_string( $order ) ) {
        $order = str_replace( '"', '', $order );
    }

    return $order;
}

function gt3_submit_form_preview() {
    global $post, $job_preview;

    $instance = WP_Job_Manager_Form_Submit_Job::instance();
    if ( $instance->get_job_id() ) {
        $job_preview = true;
        $action      = $instance->get_action();
        $post        = get_post( $instance->get_job_id() );
        setup_postdata( $post );
        $post->post_status = 'preview';
        ?>
        <form method="post" id="job_preview" action="<?php echo esc_url( $action ); ?>">
            <div class="job_listing_preview_title">
                <input type="submit" name="continue" id="job_preview_submit_button" class="button job-manager-button-submit-listing" value="<?php echo apply_filters( 'submit_job_step_preview_submit_text', __( 'Submit Listing', 'listingeasy' ) ); ?>"/>
                <input type="submit" name="edit_job" class="button job-manager-button-edit-listing" value="<?php _e( 'Edit listing', 'listingeasy' ); ?>"/>
                <input type="hidden" name="job_id" value="<?php echo esc_attr( $instance->get_job_id() ); ?>"/>
                <input type="hidden" name="step" value="<?php echo esc_attr( $instance->get_step() ); ?>"/>
                <input type="hidden" name="job_manager_form" value="<?php echo  $instance->form_name; ?>"/>

                <h2>
                    <?php _e( 'Preview', 'listingeasy' ); ?>
                </h2>
            </div>
            <?php get_job_manager_template_part( 'content-single', 'job_listing-preview' ); ?>
        </form>
        <?php
        wp_reset_postdata();
    }
}

function gt3_change_submit_preview_function( $settings ) {
    $settings['preview']['view'] = 'gt3_submit_form_preview';

    return $settings;
}

add_filter( 'submit_job_steps', 'gt3_change_submit_preview_function', 10, 1 );


function gt3_sort_array_by_priority( $a, $b ) {
    if ( $a['priority'] == $b['priority'] ) {
        return 0;
    }

    return ( $a['priority'] < $b['priority'] ) ? - 1 : 1;
}

function gt3_wrap_the_listings( $html ) {
    $output = '';

    global $post;

    // if this is a page with [jobs] shortcode, extract the show_map param
    if ( ! empty( $post->post_content ) && has_shortcode( $post->post_content, 'jobs' ) ) {
        $show_map = gt3_jobs_shortcode_get_show_map_param();
    } else {
        // we may be on a archive page, in this case get the default listings page params
        $show_map = gt3_listings_page_shortcode_get_show_map_param();
    }

    
    //we need to know a little more about the current page (that holds [jobs] the shortcode )

    if ( false === $show_map ) {
        $classes .= 'gt3_listing_without_map no-map';
        $container_start = '<div class="container">';
        $container_end = '</div>';
    }else{
        $classes = 'gt3_listing_with_map';
        $container_start = $container_end = '';
    }

    $output .= '<div class="' . $classes . '">'. $container_start .'';
    if ( true === $show_map ) {
        $output .= '<div class="gt3_listing_part" data-load-btn-text="'.esc_html__('Load More', 'listingeasy').'">' . $html . '</div>';
        $output .= '<div id="map" class="map gt3_map_part"></div>';
        ob_start();
        get_template_part( 'core/integrations/svg/map_marker' );
        $pin_map_mapker_svg = ob_get_clean();
        $output .= '<div class="pin_map_mapker_svg">' . $pin_map_mapker_svg . '</div>';
    } else {
        $output .= $html;
    }
    $output .= ''. $container_end .'</div>';

    return $output;
}

add_filter( 'job_manager_job_listings_output', 'gt3_wrap_the_listings', 10, 1 );

function gt3_add_total_jobs_found_number_to_ajax_response( $results, $jobs ) {
    if ( true === $results['found_jobs'] ) {
        $results['total_found'] = $jobs->found_posts;
    } else {
        $results['total_found'] = 0;
    }

    return $results;
}

add_filter( 'job_manager_get_listings_result', 'gt3_add_total_jobs_found_number_to_ajax_response', 10, 2 );

if (!function_exists('gt3_geolocation_formats')) {
    function gt3_geolocation_formats(){ 
        $is_formatted_address = gt3_option('formatted_address');
        if (!empty($is_formatted_address) && $is_formatted_address) {
            add_filter('gt3_localisation_address_formats','gt3_localisation_address_formats_filter');            
        }else{
            add_filter('gt3_skip_geolocation_formatted_address' , 'gt3_skip_geolocation_formatted_address_filter');
        }
    }
    function gt3_skip_geolocation_formatted_address_filter(){
        return true;
    }

    function gt3_localisation_address_formats_filter ($post){
        $geolocation_formats_array = gt3_option('geolocation_formats');
        $geolocation_out = '';
        $is_any_formats_active = false;
        foreach ($geolocation_formats_array as $geolocation_format => $value) {
            if ($value == '1' || $geolocation_format == 'geolocation_street') {
                $is_any_formats_active = true;
                switch ($geolocation_format) {
                    case 'geolocation_street':
                        $geolocation_street = get_post_meta( $post->ID, 'geolocation_street', true );
                        if (!empty($geolocation_street) && $value == '1') {
                            $geolocation_out .= '<span class="address__street" itemprop="streetAddress">'.esc_html(trim( $geolocation_street, '' )).'</span> ';
                        }elseif($geolocation_formats_array['geolocation_city'] != '1'){
                            $geolocation_city = get_post_meta( $post->ID, 'geolocation_city', true );
                            if (!empty($geolocation_city)) {
                            $geolocation_out .= '<span class="address__city" itemprop="addressLocality">'.esc_html(trim( $geolocation_city, '' )).'</span> ';
                            }  
                        }                      
                        break;

                    case 'geolocation_street_number':
                        $geolocation_street_number = get_post_meta( $post->ID, 'geolocation_street_number', true );
                        if (!empty($geolocation_street_number)) {
                            $geolocation_out .= '<span class="address__street-no">'.esc_html(trim( $geolocation_street_number, '' )).'</span> ';
                        }                        
                        break;

                    case 'geolocation_city':
                        $geolocation_city = get_post_meta( $post->ID, 'geolocation_city', true );
                        if (!empty($geolocation_city)) {
                            $geolocation_out .= '<span class="address__city" itemprop="addressLocality">'.esc_html(trim( $geolocation_city, '' )).'</span> ';
                        }                        
                        break;

                    case 'geolocation_postcode':
                        $geolocation_postcode = get_post_meta( $post->ID, 'geolocation_postcode', true );
                        if (!empty($geolocation_postcode)) {
                            $geolocation_out .= '<span class="address__postcode" itemprop="postalCode">'.esc_html(trim( $geolocation_postcode, '' )).'</span> ';
                        }
                        break;

                    case 'geolocation_state_short':
                        $geolocation_state_short = get_post_meta( $post->ID, 'geolocation_state_short', true );
                        if (!empty($geolocation_state_short)) {
                            $geolocation_out .= '<span class="address__state-short" itemprop="addressRegion">'.esc_html(trim( $geolocation_state_short, '' )).'</span> ';
                        }                        
                        break;

                    case 'geolocation_country_short':
                        $geolocation_country_short = get_post_meta( $post->ID, 'geolocation_country_short', true );
                        if (!empty($geolocation_country_short)) {
                            $geolocation_out .= '<span class="address__country-short" itemprop="addressCountry">'.esc_html(trim( $geolocation_country_short), '' ).'</span> ';
                        }                        
                        break;                        
                    
                    default:
                        break;
                }
            }
        }
        if ($is_any_formats_active == true && empty($geolocation_out)) {
            $geolocation_out = get_post_meta( $post->ID, '_job_location', true );
        }
        return $geolocation_out;
    }

    gt3_geolocation_formats();
}


function gt3_display_formatted_address( $args = array() ) {
    echo gt3_get_formatted_address();
}

function gt3_get_formatted_address ( $post = null, $args = array() ) {

    if ( $post === null ) {
        global $post;
    }

    $address = get_the_job_location();

    if ( empty( $address ) && isset( $post->_job_location ) ) {
        $address = $post->_job_location;
    }

    if ( empty( $address ) ) {
        return false;
    }

    if ( true == apply_filters( 'gt3_skip_geolocation_formatted_address', false ) ) {
        //we will use the address inputed by the user
        return $address;
    }

    $default_args = array(
        'country'    => get_locale()
    );

    $args = array_map( 'trim', wp_parse_args( $args, $default_args ) );


    extract( $args );

    // Get all formats
    $formatted_address = apply_filters( 'gt3_localisation_address_formats', $post);

    // Clean up white space
    $formatted_address = preg_replace( '/  +/', ' ', trim( $formatted_address ) );
    $formatted_address = preg_replace( '/\n\n+/', "\n", $formatted_address );

    // We're done!
    return $formatted_address;
}

/**
 * Display an image from the given url
 * We use this function when the url may contain a svg file
 *
 * @param $url
 * @param string $class A CSS class
 * @param bool|true $wrap_as_img If the function should wrap the url in an image tag or not
 */
function gt3_display_image( $url, $class = '', $wrap_as_img = true, $attachment_id = null, $icon_width = null ) {
    if ( ! empty( $url ) && is_string( $url ) ) {

        //we try to inline svgs
        if ( substr( $url, - 4 ) === '.svg' ) {

            if ( ! empty( $attachment_id ) && function_exists('gt3_file_reader') && false !== gt3_file_reader( get_attached_file( $attachment_id ) ) ) {
                //all good
            } elseif ( false !== ( $svg_code = get_transient( md5( $url ) ) ) ) {
                //now try to get the svg code from cache
                echo  $svg_code;
            } else {

                //if not let's get the file contents using WP_Filesystem
                require_once( ABSPATH . 'wp-admin/includes/file.php' );

                WP_Filesystem();

                global $wp_filesystem;

                $svg_code = $wp_filesystem->get_contents( $url );

                if ( ! empty( $svg_code ) ) {
                    set_transient( md5( $url ), $svg_code, 12 * HOUR_IN_SECONDS );

                    echo  $svg_code;
                }
            }

        } elseif ( $wrap_as_img ) {

            if ( ! empty( $class ) ) {
                $class = ' class="' . $class . '"';
            }

            if (empty($icon_width)) {
                $icon_data = getimagesize($url);
                $icon_width = $icon_data[0]/2;
            }else{
                $icon_width = (int)((int)$icon_width/2);
            }        

            echo '<img src="' . $url . '"' . $class . ' width="'. esc_attr($icon_width) .'" alt="" />';

        } else {
            echo  $url;
        }
    }
}

function gt3_get_listings_page_url( $default_link = null  ) {
    //if there is a page set in the Listings settings use that
    $listings_page_id = get_option( 'job_manager_jobs_page_id', false );
    if ( ! empty( $listings_page_id ) ) {
        return get_permalink( $listings_page_id );
    }

    if ( $default_link !== null ) {
        return $default_link;
    }
    return get_post_type_archive_link( 'job_listing' );
}

/**
 * Enqueue scripts and styles.
 */
function gt3_listing_scripts() {
    wp_localize_script( 'gt3listing-scripts', 'gt3listing_params', array(
		'login_url' => rtrim( esc_url( wp_login_url() ) , '/'),
		'listings_page_url' => gt3_get_listings_page_url(),
		'strings' => array(
			'wp-job-manager-file-upload' => esc_html__( 'Add Image', 'listingeasy' ),
			'no_job_listings_found' => esc_html__( 'No results', 'listingeasy' ),
			'results-no' => esc_html__( 'Results', 'listingeasy'), //@todo this is not quite right as it is tied to the number of results - they can 1 or 0
			'select_some_options' => esc_html__( 'Select Some Options', 'listingeasy' ),
			'select_an_option' => esc_html__( 'Select an Option', 'listingeasy' ),
			'no_results_match' => esc_html__( 'No results match', 'listingeasy' ),
		)
	) );
}

add_action( 'wp_enqueue_scripts', 'gt3_listing_scripts' );

//We need to add it to the defaults because otherwise it will be scrapped as an option that is not valid
function gt3_default_for_show_map_option_jobs_shortcode( $atts ) {
    $atts['show_map'] = true;

    return $atts;
}

add_filter( 'job_manager_output_jobs_defaults', 'gt3_default_for_show_map_option_jobs_shortcode' );

function gt3_job_listing_admin_columns( $columns ) {
    if ( ! is_array( $columns ) ) {
        $columns = array();
    }
    unset ( $columns["job_listing_type"] );

    return $columns;
}

add_filter( 'manage_edit-job_listing_columns', 'gt3_job_listing_admin_columns' );


function gt3_get_login_url() {
    $url = esc_url( wp_login_url( get_permalink() ) ) . '&modal_login=true#login';

    return $url;
}

function gt3_get_login_link_class( $class = '') {
    $class .= ' iframe-login-link';

    return $class;
}

function gt3_color_picker_scripts() {
    global $post;
    if ( is_a( $post, 'WP_Post' ) && ( has_shortcode( $post->post_content, 'submit_job_form' ) || has_shortcode( $post->post_content, 'job_dashboard' ))) {
        wp_enqueue_style( 'wp-color-picker' );
        
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script(
            'iris',
            admin_url( 'js/iris.min.js' ),
            array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
            false,
            1
        );
        wp_enqueue_script(
            'wp-color-picker',
            admin_url( 'js/color-picker.min.js' ),
            array( 'iris' ),
            false,
            1
        );
        $colorpicker_l10n = array(
            'clear' => esc_html__( 'Clear', 'listingeasy' ),
            'defaultString' => esc_html__( 'Default', 'listingeasy' ),
            'pick' => esc_html__( 'Select Color', 'listingeasy' ),
            'current' => esc_html__( 'Current Color', 'listingeasy' ),
        );
        wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n ); 
    }    

}
add_action( 'wp_enqueue_scripts', 'gt3_color_picker_scripts', 100 );

function gt3_custom_submit_job_form_fields( $fields ) {
    array_walk_recursive( $fields, 'gt3_replace_jobs_with_listings' );

    $fields['job']['job_title']['label']       = esc_html__( 'Listing Name', 'listingeasy' );
    $fields['job']['job_title']['placeholder'] = esc_html__( 'Your listing name', 'listingeasy' );

    $fields['company']['company_tagline']['priority']    = 2.1;
    $fields['company']['company_tagline']['placeholder'] = esc_html__( 'e.g This cafe is small but bustling', 'listingeasy' );
    $fields['company']['company_tagline']['description'] = esc_html__( 'Keep it short and intelligible.', 'listingeasy' );

    $fields['job']['job_description']['priority']    = 2.2;
//	$fields['job']['job_description']['type']        = 'textarea';
    $fields['job']['job_description']['placeholder'] = esc_html__( 'An overview of your listing.', 'listingeasy' );

    $fields['job']['job_category']['priority']    = 2.3;
    $fields['job']['job_category']['placeholder'] = esc_html__( 'Choose one or more categories', 'listingeasy' );

    $fields['job']['job_category']['label'] = esc_html__( 'Listing category', 'listingeasy' );
    $fields['job']['job_category']['description'] = esc_html__( 'You can choose one or more categories.', 'listingeasy' );

    if ( class_exists( 'WP_Job_Manager_Job_Tags' ) ) {
        $fields['job']['job_tags']['priority']    = 2.4;
        $fields['job']['job_tags']['required']    = false;
        $fields['job']['job_tags']['placeholder'] = esc_html__( 'Add tags', 'listingeasy' );
        $fields['job']['job_tags']['label']       = esc_html__( 'Listing tags', 'listingeasy' );
        $fields['job']['job_tags']['description'] = esc_html__( 'You can choose one or more tags.', 'listingeasy' );

        $fields['job']['job_tags_area_status'] = array(
            'label'       => esc_html__( 'Show Tags on Single Listing?', 'listingeasy' ),
            'type'        => 'select',
            'required'    => false,
            'options'    => array(
                'default' => esc_html__( 'Default', 'listingeasy' ),
                'on' => esc_html__( 'Show', 'listingeasy' ),
                'off' => esc_html__( 'Hide', 'listingeasy' ),
            ),
            'priority'    => 2.41
        );
    }

    $fields['job']['job_location']['priority']    = 2.5;
    $fields['job']['job_location']['placeholder'] = esc_html__( 'e.g Hilton St. Louis at the Ballpark', 'listingeasy' );
    $fields['job']['job_location']['description'] = esc_html__( 'Leave this blank if the location is not important.', 'listingeasy' );

    $fields['job']['discount'] = array(
        'label'       => esc_html__( 'Discount', 'listingeasy' ),
        'type'        => 'text',
        'placeholder' => esc_html__( 'e.g 30%', 'listingeasy' ),
        'description' => esc_html__( 'Leave this blank if the discount is not important.', 'listingeasy' ),
        'required'    => false,
        'priority'    => 2.51
    );

    $fields['company']['company_email'] = array(
        'label'       => esc_html__( 'Company email', 'listingeasy' ),
        'type'        => 'text',
        'placeholder' => esc_html__( 'e.g company@domain.com', 'listingeasy' ),
        'required'    => false,
        'priority'    => 2.52
    );

    $fields['company']['gallery_image']['label']              = esc_html__( 'Listing Images', 'listingeasy' );
    $fields['company']['gallery_image']['priority']           = 2.6;
    $fields['company']['gallery_image']['required']           = false;
    $fields['company']['gallery_image']['type']               = 'file';
    $fields['company']['gallery_image']['ajax']               = true;
    $fields['company']['gallery_image']['placeholder']        = '';
    $fields['company']['gallery_image']['sanitizer']          = array();
    $fields['company']['gallery_image']['allowed_mime_types'] = $fields['company']['company_logo']['allowed_mime_types'];
    $fields['company']['gallery_image']['multiple']           = true;
    $fields['company']['gallery_image']['description']        = esc_html__( 'Images will be shown on listing single post.', 'listingeasy' );

    $fields['company']['company_logo']['label']       = esc_html__( 'Cover', 'listingeasy' );
    $fields['company']['company_logo']['priority']    = 2.7;
    $fields['company']['company_logo']['multiple']    = false;
    $fields['company']['company_logo']['description'] = esc_html__( 'The image will be shown on listing cards.', 'listingeasy' );

    $fields['job']['listing_heading_bg']['label']              = esc_html__( 'Header Background Image (Single Listing)', 'listingeasy' );
    $fields['job']['listing_heading_bg']['priority']           = 2.75;
    $fields['job']['listing_heading_bg']['required']           = false;
    $fields['job']['listing_heading_bg']['type']               = 'file';
    $fields['job']['listing_heading_bg']['ajax']               = true;
    $fields['job']['listing_heading_bg']['placeholder']        = '';
    $fields['job']['listing_heading_bg']['multiple']           = false;
    $fields['job']['listing_heading_bg']['description']        = esc_html__( 'The image will be shown on single listing. If you leave header image area empty the cover will be used as the background one automatically.', 'listingeasy' );

    $fields['job']['listing_card_avatar']['label']              = esc_html__( 'Listing Author Image', 'listingeasy' );
    $fields['job']['listing_card_avatar']['priority']           = 2.78;
    $fields['job']['listing_card_avatar']['required']           = false;
    $fields['job']['listing_card_avatar']['type']               = 'file';
    $fields['job']['listing_card_avatar']['ajax']               = true;
    $fields['job']['listing_card_avatar']['placeholder']        = '';
    $fields['job']['listing_card_avatar']['multiple']           = false;
    $fields['job']['listing_card_avatar']['description']        = esc_html__( 'The image will be shown on the listings.', 'listingeasy' );

    $fields['job']['job_hours'] = array(
        'label'       => esc_html__( 'Hours of Operation', 'listingeasy' ),
        'type'        => 'textarea',
        'placeholder' => esc_html__( "Days | Hours", 'listingeasy' ),
        'description' => esc_html__( 'You can change the text format to fit your needs.', 'listingeasy' ),
        'required'    => false,
        'priority'    => 2.8
    );

    $fields['company']['company_phone'] = array(
        'label'       => esc_html__( 'Phone', 'listingeasy' ),
        'type'        => 'text',
        'placeholder' => esc_html__( 'e.g 545-985-8727', 'listingeasy' ),
        'required'    => false,
        'priority'    => 2.9
    );

    $fields['company']['gt3_social'] = array(
        'label'       => esc_html__( 'Socials', 'listingeasy' ),
        'type'        => 'text',
        'placeholder' => esc_html__( 'Socials', 'listingeasy' ),
        'required'    => false,
        'priority'    => 2.95
    );

    $soc_icons = array();

    if (function_exists('gt3_get_all_icon')) {
        $soc_icons = gt3_get_all_icon();
    }

    $fields['company']['gt3_social_icon'] = array(
        'label'       => esc_html__( 'Choose Icon', 'listingeasy' ),
        'type'        => 'select',
        'placeholder' => esc_html__( 'Choose Icon', 'listingeasy' ),
        'required'    => false,
        'options'    => $soc_icons,
        'priority'    => 2.96
    );

    $fields['company']['gt3_social_link'] = array(
        'label'       => esc_html__( 'Social Link', 'listingeasy' ),
        'type'        => 'text',
        'placeholder' => esc_html__( '#', 'listingeasy' ),
        'required'    => false,
        'priority'    => 2.97
    );

    $fields['company']['company_website']['priority']    = 2.10;
    $fields['company']['company_website']['placeholder'] = esc_html__( 'e.g yourwebsite.com', 'listingeasy' );

    // temporary unsets
    unset( $fields['company']['company_video'] );
    unset( $fields['job']['job_type'] );
    unset( $fields['company']['company_name'] );
    unset( $fields['job']['application'] );
    unset( $fields['company']['company_twitter'] );

    return $fields;
}
add_filter( 'submit_job_form_fields', 'gt3_custom_submit_job_form_fields' );

function gt3_maybe_clean_gallery_images_on_submit( $job_data, $post_title, $post_content, $status, $values ) {
    if ( empty( $values['gallery_image'] ) ) {
        $listing = get_page_by_title( $post_title, null, 'job_listing' );
        if ( ! is_wp_error( $listing ) && isset( $listing->ID ) ) {
            update_post_meta( $listing->ID, 'mb_job_listing_heading_bg', '' );
            update_post_meta( $listing->ID, 'mb_job_listing_card_avatar', '' );
        }
    }
    if ( empty( $values['listing_heading_bg'] ) ) {
        $listing = get_page_by_title( $post_title, null, 'job_listing' );
        if ( ! is_wp_error( $listing ) && isset( $listing->ID ) ) {
            update_post_meta( $listing->ID, 'mb_job_listing_heading_bg', '' );
        }
    }
    if ( empty( $values['listing_card_avatar'] ) ) {
        $listing = get_page_by_title( $post_title, null, 'job_listing' );
        if ( ! is_wp_error( $listing ) && isset( $listing->ID ) ) {
            update_post_meta( $listing->ID, 'mb_job_listing_card_avatar', '' );
        }
    }
    return $job_data;
}
add_filter( 'submit_job_form_save_job_data', 'gt3_maybe_clean_gallery_images_on_submit', 10, 5);

add_action( 'job_manager_update_job_data', 'gt3_on_listing_submit', 10, 2 );

function gt3_on_listing_submit( $id, $values ) {

    $company_logo = $values['company']['gallery_image'];

    // turn company logo in featured image
    if ( isset( $company_logo ) && ! empty( $company_logo ) ) {

        $gallery_image_string = '';
        $gallery_image_array = array();

        // we may have a simple string(on image upload) or an array of images, so we need to treat them all
        if ( is_numeric( $company_logo ) ) {
            $attach_id = gt3_get_attachment_id_from_url( $company_logo );
            if ( ! empty( $attach_id ) && is_numeric( $attach_id ) ) {
                $gallery_image_string = $attach_id;
                $gallery_image_array = $company_logo;
            }
        } elseif ( is_array( $company_logo ) && ! empty( $company_logo ) ) {
            $gallery_image_string_arr = array();
            delete_post_meta($id, 'mb_job_listing_images');
            foreach ( $company_logo as $key => $url ) {
                $attach_id = gt3_get_attachment_id_from_url( $url );
                if ( ! empty( $attach_id ) && is_numeric( $attach_id ) ) {
                    add_post_meta( $id, 'mb_job_listing_images', $attach_id, false );
                }
            }
        }
    }
    $listing_heading_bg = $values['job']['listing_heading_bg'];

    if ( isset( $listing_heading_bg ) && ! empty( $listing_heading_bg ) ) {

        $listing_heading_bg_string = '';
        $listing_heading_bg_array = array();

        // we may have a simple string(on image upload) or an array of images, so we need to treat them all
        if ( is_numeric( $listing_heading_bg ) ) {
            $listing_heading_bg_attach_id = gt3_get_attachment_id_from_url( $listing_heading_bg );
            if ( ! empty( $attach_id ) && is_numeric( $attach_id ) ) {
                $listing_heading_bg_string = $listing_heading_bg_attach_id;
                $listing_heading_bg_array = $listing_heading_bg;
            }
        } elseif ( ! empty( $listing_heading_bg ) ) {
            $listing_heading_bg_string_arr = array();
            $listing_heading_bg_attach_id = gt3_get_attachment_id_from_url( $listing_heading_bg );
            if ( ! empty( $listing_heading_bg_attach_id ) && is_numeric( $listing_heading_bg_attach_id ) ) {
                add_post_meta( $id, 'mb_job_listing_heading_bg', $listing_heading_bg_attach_id, false );
            }
        }
    }

    $listing_card_avatar = $values['job']['listing_card_avatar'];

    if ( isset( $listing_card_avatar ) && ! empty( $listing_card_avatar ) ) {

        $listing_card_avatar_string = '';
        $listing_card_avatar_array = array();

        // we may have a simple string(on image upload) or an array of images, so we need to treat them all
        if ( is_numeric( $listing_card_avatar ) ) {
            $listing_card_avatar_attach_id = gt3_get_attachment_id_from_url( $listing_card_avatar );
            if ( ! empty( $attach_id ) && is_numeric( $attach_id ) ) {
                $listing_card_avatar_string = $listing_card_avatar_attach_id;
                $listing_card_avatar_array = $listing_card_avatar;
            }
        } elseif ( ! empty( $listing_card_avatar ) ) {
            $listing_card_avatar_string_arr = array();
            $listing_card_avatar_attach_id = gt3_get_attachment_id_from_url( $listing_card_avatar );
            if ( ! empty( $listing_card_avatar_attach_id ) && is_numeric( $listing_card_avatar_attach_id ) ) {
                add_post_meta( $id, 'mb_job_listing_card_avatar', $listing_card_avatar_attach_id, false );
            }
        }
    }

    // Social Icons
    $company_social = $values['company']['gt3_social'];
    $company_social = json_decode($company_social,true);
    $social_meta = get_post_meta( $id, 'listing_social_icon', false );
    if ($company_social != NULL && empty($social_meta)) {
        add_post_meta( $id, 'listing_social_icon', $company_social, false );
    }else{
        update_post_meta( $id, 'listing_social_icon', $company_social );
    }

    // Tags Area Status
    if ( in_array( 'wp-job-manager-tags/wp-job-manager-tags.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        $job_tags_area_status = $values['job']['job_tags_area_status'];
        $tags_area_meta = get_post_meta($id, 'mb_display_tags_area', false);
        if (empty($tags_area_meta)) {
            add_post_meta($id, 'mb_display_tags_area', $job_tags_area_status, false);
        } else {
            update_post_meta($id, 'mb_display_tags_area', $job_tags_area_status);
        }
    }

}

function gt3_keep_gallery_images_synced_with_logo( $post_id ) {
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( ! empty( $_POST['gallery_image'] ) ) {
        $array = explode( ',', $_POST['gallery_image'] );

        foreach ( $array as $key => $id ) {
            $src = wp_get_attachment_image_src( $id );
            if ( ! is_wp_error( $src ) && ! empty( $src[0] ) ) {
                $array[$key] = $src[0];
            } else {
                unset( $array[$key] );
            }
        }

        //update_post_meta( $post_id, '_mb_job_listing_images', $array );
    }
}
add_action( 'save_post', 'gt3_keep_gallery_images_synced_with_logo' );

function gt3_validate_job_submission_fields( $tru = true, $fields, $values ) {
    $company_logo = $values['company']['company_logo'];


    // turn company logo in featured image
    if ( isset( $company_logo ) && ! empty( $company_logo ) ) {

        $gallery_image_string = '';

        // we may have a simple string(on image upload) or an array of images, so we need to treat them all
        if ( is_numeric( $company_logo ) ) {
            $attach_id = gt3_get_attachment_id_from_url( $company_logo );
            if ( ! empty( $attach_id ) && is_numeric( $attach_id ) ) {
                $gallery_image_string = $attach_id;
            }
        } elseif ( is_array( $company_logo ) && ! empty( $company_logo ) ) {

            foreach ( $company_logo as $key => $url ) {
                $attach_id = gt3_get_attachment_id_from_url( $url );
                if ( ! empty( $attach_id ) && is_numeric( $attach_id ) ) {
                    $gallery_image_string .= $attach_id;

                    if ( $key < count( $company_logo ) ) {
                        $gallery_image_string .= ',';
                    }
                }
            }
        }
    }

    return $values;
}

add_filter( 'submit_job_form_validate_fields', 'gt3_validate_job_submission_fields', 10, 3 );

/**
 * Given an URL we will try to find and return the ID of the attachment, if present
 *
 * @param string $attachment_url
 *
 * @return bool|null|string
 */
function gt3_get_attachment_id_from_url( $attachment_url = '' ) {
    global $wpdb;
    $attachment_id = false;
    // If there is no url, bail.
    if ( '' == $attachment_url ) {
        return false;
    }
    // Get the upload directory paths
    $upload_dir_paths = wp_upload_dir();

    // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

        // If this is the URL of an auto-generated thumbnail, get the URL of the original image
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

        // Remove the upload path base directory from the attachment URL
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

        // Finally, run a custom database query to get the attachment ID from the modified attachment URL
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

    }
    return $attachment_id;
}


function gt3_register_widget_areas_wpjm_tags() {
    global $job_manager_tags;
    if ( $job_manager_tags !== null ) {
        remove_filter( 'the_job_description', array( $job_manager_tags, 'display_tags' ), 10 );
    }
}

add_action( 'init', 'gt3_register_widget_areas_wpjm_tags' );

/**
 * Return the ID of the featured image
 *
 * @param null $post_ID
 *
 * @return array|bool|string
 */

if ( ! function_exists( 'gt3_get_post_image_id' ) ) {
    function gt3_get_post_image_id( $post_ID = null ) {

        if ( empty( $post_ID ) ) {
            $post_ID = get_the_ID();
        }

        return esc_sql( get_post_thumbnail_id( $post_ID ) );

        return false;
    }
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function gt3_body_classes( $classes ) {
    global $post;

    if (gt3_option("add_default_typography_sapcing") == '1') {
        $classes[] = 'gt3_default_typography_sapcing';
    }

    if ( isset( $post->post_content ) && has_shortcode( $post->post_content, 'job_dashboard' ) ) {
        $classes[] = 'page-job-dashboard';
    }

    if ( isset( $post->post_content ) && has_shortcode( $post->post_content, 'submit_job_form' ) ) {
        $classes[] = 'page-add-listing';
    }

    if ( isset( $post->post_content ) && has_shortcode( $post->post_content, 'jobs_by_tag' ) ) {
        $classes[] = 'jobs-by-tags-page';
    }

    return $classes;
}

add_filter( 'body_class', 'gt3_body_classes' );

/**
 * Email Lising owner when listing approved
 * @param  [type] $post_id [lising id]
 * @return [type]          [mail to listing owner]
 */
function gt3_listing_published_send_email($post_id) {
    if( 'job_listing' != get_post_type( $post_id ) ) {
        return;
    }
    $post = get_post($post_id);
    $author = get_userdata($post->post_author);

    $listing_approved_email = gt3_option('listing_approved_email');
    $listing_approved_email_subject = gt3_option('listing_approved_email_subject');
    if (empty($listing_approved_email_subject)) {
        $listing_approved_email_subject = esc_html__("Your job listing is online",'listingeasy');
    }

    
    if (!empty($listing_approved_email)) {
        $message = str_replace(array('[listing-author]', '[listing-title]', '[listing-link]'), array($author->display_name, $post->post_title , trim(get_permalink( $post_id ))), $listing_approved_email);
    }else{
       $message = "Hi ".$author->display_name.",
      Your listing, ".$post->post_title." has just been approved at ".get_permalink( $post_id ).". Well done!
        "; 
    }
    if (!empty($author->user_email)) {
        wp_mail($author->user_email, $listing_approved_email_subject, $message);
    }    
}
if (gt3_option('listing_email_sending')) {
    add_action('pending_to_publish', 'gt3_listing_published_send_email');
    add_action('pending_payment_to_publish', 'gt3_listing_published_send_email');
}

/**
 * Email Lising owner when listing expires
 * @param  [type] $post_id [lising id]
 * @return [type]          [mail to listing owner]
 */
function gt3_listing_expires_send_email($new_status, $old_status, $post) {
    if ( 'job_listing' !== $post->post_type || 'expired' !== $new_status || $old_status === $new_status ) {
        return;
    }
    $post = get_post($post_id);
    $author = get_userdata($post->post_author);

    $listing_expires_email = gt3_option('listing_approved_email');
    $listing_expires_email_subject = gt3_option('listing_expires_email_subject');
    if (empty($listing_expires_email_subject)) {
        $listing_approved_email_subject = esc_html__("Your job listing has expired",'listingeasy');
    }

    
    if (!empty($listing_expires_email)) {
        $message = str_replace(array('[listing-author]', '[listing-title]', '[listing-link]'), array($author->display_name, $post->post_title , trim(get_permalink( $post_id ))), $listing_approved_email);
    }else{
       $message = "Hi ".$author->display_name.",
      Your listing, ".$post->post_title." has now expired: ".get_permalink( $post_id ).".
        "; 
    }
    if (!empty($author->user_email)) {
        wp_mail($author->user_email, $listing_expires_email_subject, $message);
    }    
}
if (gt3_option('listing_email_sending_expired')) {
    add_action( 'transition_post_status', 'gt3_listing_expires_send_email', 10, 3 );
}

if ( class_exists( 'WP_Job_Manager_Extended_Location' ) ) {
    $args_gt3_listing = array(
        'start_geo_lat'		=> apply_filters( 'wpjmgel_map_start_geo_lat', get_option( 'wpjmel_start_geo_lat' ) ),
        'start_geo_long'	=> apply_filters( 'wpjmgel_map_start_geo_long', get_option( 'wpjmel_start_geo_long' ) ),
        'enable_map' 		=> get_option( 'wpjmel_enable_map', 1 ),
        'map_elements' 		=> apply_filters( 'wpjmel_map_elements', '#job_location, #setting-wpjmel_map_start_location' ),
        'list_geo_lat' => '',
        'list_geo_long' => ''
    );
    wp_enqueue_script( 'geo-tag-text', get_template_directory_uri() . '/core/integrations/js/plugins/geo-tag-text.js', array('jquery'), false, true);
    wp_add_inline_script( 'jquery-migrate', 'var gt3_wpjmel = '. json_encode($args_gt3_listing).';' );
}

/* Data structure disable */
add_filter( 'wpjm_output_job_listing_structured_data', '__return_false' );