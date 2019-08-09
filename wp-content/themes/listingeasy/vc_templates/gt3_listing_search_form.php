<?php

if (!class_exists( 'WP_Job_Manager' )) {
    return;
}

$main_font = gt3_option('main-font');

$defaults = array(
    'css' => '',
    'css_animation' => '',
    'item_el_class' => '',
    'use_keywords_field' => 'yes',
    'use_location_field' => 'yes',
    'use_categories_field' => 'yes',
    'enable_popular_searches' => 'yes',
    'popular_searches_text' => esc_html__("Popular searches:", 'listingeasy'),
    'popular_searches_count' => '3',
    'popular_searches_slug' => '',
    'popular_searches_color' => esc_attr($main_font['color']),
    'location_field_style' => 'select_regions'
);

$atts = vc_shortcode_attribute_parse($defaults, $atts);
extract($atts);
$compile = '';

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $item_el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$image_width = $image_height = $items_in_layout = '';

// Animation
if (! empty($atts['css_animation'])) {
    $animation_class = $this->getCSSAnimation( $atts['css_animation'] );
} else {
    $animation_class = '';
}
$popular_searches_count = (int)$popular_searches_count;

// Button Icon Style
$popular_searches_color_style = '';
if ($popular_searches_color != '' && $popular_searches_color != esc_attr($main_font['color'])) {
    $popular_searches_color_style = ' style="color: ' . $popular_searches_color . ';"';
}
?>

<div class="vc_row">
    <div class="vc_col-sm-12 gt3_listing_search_form <?php echo esc_attr($animation_class); ?> <?php echo esc_attr($css_class); ?>">
<?php
    $show_categories = true;
    if ( ! get_option( 'job_manager_enable_categories' ) ) {
        $show_categories = false;
    }
    $atts = apply_filters( 'job_manager_ouput_jobs_defaut', array(
        'per_page' => get_option( 'job_manager_per_page' ),
        'orderby' => 'featured',
        'order' => 'DESC',
        'show_categories' => $show_categories,
        'show_tags' => false,
        'categories' => true,
        'selected_category' => false,
        'job_types' => false,
        'location' => false,
        'keywords' => false,
        'selected_job_types' => false,
        'show_category_multiselect' => false,
        'selected_region' => false
    ));

    $fields_options = array();
    if ($use_keywords_field == 'yes') {
        array_push($fields_options, "keywords");
    }
    if ($use_location_field == 'yes') {
        array_push($fields_options, "location");
    }
    if ($use_categories_field == 'yes') {
        array_push($fields_options, "categories");
    }

    //it isn't sufficient to check for emptiness since one can uncheck all options resulting in an empty array
    if (empty($fields_options)) {
        //in case the defaults were not saved in the database, impose them - only the keywords search field is shown by default
        $fields_options = array( 'keywords' );
    }
    $fields_num = count( $fields_options );

    do_action( 'job_manager_job_filters_before', $atts );

    if ( $fields_num >= 1 ) : ?>
        <form class="search-form   job_search_form  js-search-form" action="<?php echo esc_url(gt3_get_listings_page_url()) ?>" method="get" role="search">
            <?php if ( ! get_option('permalink_structure') ) {
                //if the permalinks are not activated we need to put the listings page id in a hidden field so it gets passed
                $listings_page_id = get_option( 'job_manager_jobs_page_id', false );
                //only do this in case we do have a listings page selected
                if ( false !== $listings_page_id ) {
                    echo '<input type="hidden" name="p" value="' . $listings_page_id . '">';
                }
            }

            do_action( 'job_manager_job_filters_start', $atts ); ?>

            <div class="search_jobs">
                <?php do_action( 'job_manager_job_filters_search_jobs_start', $atts ); ?>

                <?php if ( in_array( 'keywords', $fields_options ) ):
                    ?>

                    <div class="search-field-wrapper  search-filter-wrapper">
                        <label for="search_keywords"><?php _e( 'Keywords', 'listingeasy' ); ?></label>
                        <input class="search-field  js-search-suggestions-field" type="text" name="search_keywords" id="search_keywords" placeholder="<?php esc_html_e( 'What are you looking for?', 'listingeasy' ); ?>" autocomplete="off" value="<?php the_search_query(); ?>"/>
                    </div>

                <?php endif; ?>

                <?php if ( in_array( 'location', $fields_options ) ): ?>
                    <?php
                        if ($location_field_style == 'location_textfield_style') {
                            $location_wrap_class = 'search_location_text';
                        } else {
                            $location_wrap_class = 'search_location';
                        }
                    ?>
                    <div class="<?php echo esc_attr($location_wrap_class); ?>  search-filter-wrapper">
                        <?php if ( class_exists( 'Astoundify_Job_Manager_Regions' ) && "1" === get_option('job_manager_regions_filter') && $location_field_style == 'select_regions') { ?>
                            <div class="search_region-dummy">
                                <input type="text" name="search_location" id="search_location" placeholder="<?php esc_html_e( 'Location', 'listingeasy' ); ?>" class="hidden" />
                                <input type="text" class="select-region-dummy  search-field" disabled="disabled" placeholder="<?php esc_html_e( 'All Regions', 'listingeasy' ); ?>" />
                            </div>
                        <?php } else {
                            if ( class_exists( 'WP_Job_Manager_Extended_Location' ) ) {
                                $gt3_auto_loacate_id = 'gt3_auto_locate_searchform';
                                $gt3_auto_loacate_class = 'class="gt3_auto_locate_view"';
                            } else {
                                $gt3_auto_loacate_id = 'search_location';
                                $gt3_auto_loacate_class = '';
                            }
                            ?>
                            <input type="text" name="search_location" id="<?php echo esc_attr($gt3_auto_loacate_id); ?>" <?php echo $gt3_auto_loacate_class; ?> placeholder="<?php esc_html_e( 'Location', 'listingeasy' ); ?>" />
                        <?php } ?>
                    </div>
                <?php endif; ?>

                <?php if ( in_array( 'categories', $fields_options ) ):
                    if ( true === $show_categories ) : ?>

                        <div class="search_categories  search-filter-wrapper">
                            <label for="search_categories"><?php esc_html_e( 'Category', 'listingeasy' ); ?></label>
                            <?php job_manager_dropdown_categories( array( 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'show_option_all' => esc_html__( 'Any Category', 'listingeasy' ), 'name' => 'search_categories', 'orderby' => 'name', 'multiple' => false ) ); ?>
                        </div>

                    <?php endif;
                endif; ?>

                <?php do_action( 'job_manager_job_filters_search_jobs_end', $atts ); ?>
                <div class="search_submit_wrapper">
                    <button class="search-submit" name="submit" id="searchsubmit">
                        <span><?php esc_html_e( 'Search', 'listingeasy' ); ?></span><i class="fa fa-angle-right"></i>
                    </button>
                </div>
            </div>

            <?php do_action( 'job_manager_job_filters_end', $atts ); ?>
        </form>
    <?php endif; // if ( $fields_num >= 1 )?>

    <?php do_action( 'job_manager_job_filters_after', $atts ); ?>

    </div>
    <div class="clear"></div>
    <div class="popular_searches_module vc_col-sm-12"<?php echo  $popular_searches_color_style ?>>
        <?php
            if ($enable_popular_searches == 'yes') {
                gt3_display_popular_listing_categories($popular_searches_count, $popular_searches_text, $popular_searches_slug);
            }
        ?>
    </div>
</div>
