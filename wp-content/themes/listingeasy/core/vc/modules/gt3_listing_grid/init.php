<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

function gt3_listing_init () {
    if (function_exists('vc_map')) {
        $params = array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Items Per Line', 'listingeasy'),
                'param_name' => 'items_per_line',
                'admin_label' => true,
                'value' => array(
                    esc_html__("2", "listingeasy") => '2',
                    esc_html__("3", "listingeasy") => '3',
                    esc_html__("4", "listingeasy") => '4',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'std' => '3'
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Items Per Page", "listingeasy"),
                "param_name" => "per_page",
                'edit_field_class' => 'vc_col-sm-6 no_top_padding',
                'value' => get_option( 'job_manager_per_page' )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Orderby', 'listingeasy'),
                'param_name' => 'orderby',
                'admin_label' => true,
                'value' => array(
                    esc_html__("featured", "listingeasy") => 'featured',
                    esc_html__("title", "listingeasy") => 'title',
                    esc_html__("ID", "listingeasy") => 'ID',
                    esc_html__("name", "listingeasy") => 'name',
                    esc_html__("date", "listingeasy") => 'date',
                    esc_html__("modified", "listingeasy") => 'modified',
                    esc_html__("rand", "listingeasy") => 'rand',
                    esc_html__("rand", "listingeasy") => 'rand',
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Order', 'listingeasy'),
                'param_name' => 'order',
                'value' => array(
                    esc_html__("desc", "listingeasy") => 'desc',
                    esc_html__("asc", "listingeasy") => 'asc',
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show Filters', 'listingeasy' ),
                'param_name' => 'show_filters',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__('Available only if don\'t use listings carousel.', 'listingeasy'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Pagination Type', 'listingeasy'),
                'param_name' => 'pagination_type',
                'value' => array(
                    esc_html__("no", "listingeasy") => 'no',
                    esc_html__("numbered pagination", "listingeasy") => 'pagination',
                    esc_html__("load more", "listingeasy") => 'load_more',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__('Available only if don\'t use listings carousel.', 'listingeasy'),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Categories Slug", 'listingeasy'),
                "param_name" => "categories",
                "description" => esc_html__("Comma separate slugs to limit the jobs to certain categories. ", 'listingeasy'),
            ),
        );

        if ( class_exists( 'Astoundify_Job_Manager_Regions' ) && "1" === get_option('job_manager_regions_filter') ) { 

            $terms = get_terms( 'job_listing_region', array(
                'hide_empty' => false,
            ) );

            $region_array = array();

            foreach ($terms as $term) {
                $region_array[$term->name] = $term->term_id;
            }

            $params[] = array(
                "type" => "checkbox",
                "heading" => esc_html__("Location", 'listingeasy'),
                "param_name" => "location",
                "description" => esc_html__("You can choose a Regions to show (leave empty for all) ", 'listingeasy'),
                "value"       => $region_array,
                'dependency' => array(
                    'element' => 'show_filters',
                    "value_not_equal_to" => array("yes")
                ),
            );
        }else{
            $params[] = array(
                "type" => "textfield",
                "heading" => esc_html__("Location", 'listingeasy'),
                "param_name" => "location",
                "description" => esc_html__("You can fill a Location. ", 'listingeasy'),
            );
        }

        array_push($params,
        // --- CAROUSEL GROUP --- //
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use listings carousel?', 'listingeasy' ),
                'param_name' => 'use_carousel',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                "group" => esc_html__( "Carousel", 'listingeasy' )
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Autoplay carousel', 'listingeasy' ),
                'param_name' => 'autoplay_carousel',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Autoplay time.', 'listingeasy' ),
                'param_name' => 'auto_play_time',
                'value' => '3000',
                'description' => esc_html__( 'Enter autoplay time in milliseconds.', 'listingeasy' ),
                'dependency' => array(
                    'element' => 'autoplay_carousel',
                    'value' => array("yes"),
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Single slide to scroll', 'listingeasy' ),
                'param_name' => 'scroll_items',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                'std' => 'yes',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Infinite Scroll', 'listingeasy' ),
                'param_name' => 'infinite_scroll',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Hide Pagination control', 'listingeasy' ),
                'param_name' => 'use_pagination_carousel',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Hide prev/next buttons', 'listingeasy' ),
                'param_name' => 'use_prev_next_carousel',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Adaptive Height', 'listingeasy' ),
                'param_name' => 'adaptive_height',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            )
        );


        vc_map(array(
            'base' => 'gt3_listing_grid',
            'name' => esc_html__('Listings Grid', 'listingeasy'),
            "description" => esc_html__("Job Listings Grid", "listingeasy"),
            'category' => esc_html__('GT3 Modules', 'listingeasy'),
            'icon' => 'gt3_icon',
            'params' => $params
        ));

        class WPBakeryShortCode_GT3_Listing_Grid extends WPBakeryShortCode
        {
        }
    }
}
add_action( 'init', 'gt3_listing_init' );