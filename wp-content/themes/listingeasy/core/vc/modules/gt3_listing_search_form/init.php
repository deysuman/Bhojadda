<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$main_font = gt3_option('main-font');

if (function_exists('vc_map')) {
    $params_array = array(
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use keywords field?', 'listingeasy' ),
            'param_name' => 'use_keywords_field',
            'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
            'std' => 'yes',
            'edit_field_class' => 'vc_col-sm-3',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use location field?', 'listingeasy' ),
            'param_name' => 'use_location_field',
            'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
            'std' => 'yes',
            'edit_field_class' => 'vc_col-sm-3',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use categories field?', 'listingeasy' ),
            'param_name' => 'use_categories_field',
            'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
            'std' => 'yes',
            'edit_field_class' => 'vc_col-sm-3',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Enable popular searches?', 'listingeasy' ),
            'param_name' => 'enable_popular_searches',
            'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
            'std' => 'yes',
            'edit_field_class' => 'vc_col-sm-3',
        ),
        // Popular Searches Text
        array(
            "type" => "textfield",
            "heading" => esc_html__("Popular Searches Text", 'listingeasy'),
            "param_name" => "popular_searches_text",
            "value" => esc_html__("Popular searches:", 'listingeasy'),
            "dependency" => Array("element" => "enable_popular_searches", "not_empty" => true),
        ),
        // Popular Searches Slug
        array(
            "type" => "textfield",
            "heading" => esc_html__("Popular Searches Slug (optional)", 'listingeasy'),
            "param_name" => "popular_searches_slug",
            "description" => esc_html__("Separate by comas (In brackets the preferred name). Example: food-drink(Food & Drink), entertainment(Entertainment)", 'listingeasy'),
            "dependency" => Array("element" => "enable_popular_searches", "not_empty" => true),
        ),
    );



    // Location Field Style
    if ( class_exists( 'Astoundify_Job_Manager_Regions' ) && "1" === get_option('job_manager_regions_filter')) {
        $location_field_array = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Location Field Style', 'listingeasy'),
            'param_name' => 'location_field_style',
            'value' => array(
                esc_html__("Regions Dropdown", "listingeasy") => 'select_regions',
                esc_html__("Text Field", "listingeasy") => 'location_textfield_style',
            ),
            "dependency" => Array("element" => "use_location_field", "not_empty" => true),
        );
        array_push($params_array, $location_field_array);
    }

    array_push($params_array,
        // Popular Searches Count
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Popular Searches Count', 'listingeasy'),
            'param_name' => 'popular_searches_count',
            'value' => '3',
            'description' => esc_html__( '(Available only if "Popular Searches Slug" field isn\'t filled)', 'listingeasy' ),
            "dependency" => Array("element" => "enable_popular_searches", "not_empty" => true),
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_html__("Popular Searches Color", 'listingeasy'),
            "param_name" => "popular_searches_color",
            "value" => esc_attr($main_font['color']),
            "description" => esc_html__("Select popular searches color.", 'listingeasy'),
            "dependency" => Array("element" => "enable_popular_searches", "not_empty" => true),
            'save_always' => true,
        ),
        vc_map_add_css_animation( true ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra Class", 'listingeasy'),
            "param_name" => "item_el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'listingeasy')
        )
    );

    vc_map(array(
        'name' => esc_html__('Listing Search Form', 'listingeasy'),
        'base' => 'gt3_listing_search_form',
        'class' => 'gt3_listing_search_form',
        "description" => esc_html__("Display listing search form", 'listingeasy'),
        'category' => esc_html__('GT3 Modules', 'listingeasy'),
        'icon' => 'gt3_icon',
        'params' => $params_array
    ));

    class WPBakeryShortCode_Gt3_listing_search_form extends WPBakeryShortCode {
    }
}