<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Listing Categories', 'listingeasy'),
        'base' => 'gt3_listing_categories',
        'class' => 'gt3_listing_categories',
        "description" => esc_html__("Display listing categories", 'listingeasy'),
        'category' => esc_html__('GT3 Modules', 'listingeasy'),
        'icon' => 'gt3_icon',
        'params' => array(
            // Title
            array(
                "type" => "textfield",
                "heading" => esc_html__("Module Title", 'listingeasy'),
                "param_name" => "module_title",
                "description" => esc_html__("Enter title.", 'listingeasy')
            ),
            // Subtitle
            array(
                "type" => "textfield",
                "heading" => esc_html__("Module Subtitle", 'listingeasy'),
                "param_name" => "module_subtitle",
                "description" => esc_html__("Enter subtitle.", 'listingeasy')
            ),
            // Grid Type
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'View type', 'listingeasy' ),
                'param_name' => 'view_type',
                "value"         => array(
                    esc_html__( 'Grid', 'listingeasy' ) => 'type_grid',
                    esc_html__( 'Masonry', 'listingeasy' ) => 'type_masonry',
                    esc_html__( 'Packery', 'listingeasy' ) => 'type_packery'
                ),
                "description" => esc_html__("Select type.", 'listingeasy')
            ),
            // Items per line
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Items Per Line', 'listingeasy' ),
                'param_name' => 'items_per_line',
                "value"         => array(
                    esc_html__( '2', 'listingeasy' ) => '2',
                    esc_html__( '3', 'listingeasy' ) => '3',
                    esc_html__( '4', 'listingeasy' ) => '4'
                ),
                "description" => esc_html__("Select items per line.", 'listingeasy'),
                "dependency" => Array("element" => "view_type","value" => array("type_grid", "type_masonry")),
            ),
            array(
                "type" => "gt3_packery_layout_select",
                "heading" => esc_html__("Select Layout", 'listingeasy'),
                "param_name" => "packery_layout",
                "val" => '',
                "dependency" => Array("element" => "view_type","value" => array("type_packery")),
            ),
            // Spacing beetween items
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Spacing beetween items', 'listingeasy' ),
                'param_name' => 'spacing_beetween_items',
                "value"         => array(
                    esc_html__( '30px', 'listingeasy' )      => '30',
                    esc_html__( '25px', 'listingeasy' )      => '25',
                    esc_html__( '20px', 'listingeasy' )      => '20',
                    esc_html__( '15px', 'listingeasy' )      => '15',
                    esc_html__( '10px', 'listingeasy' )      => '10',
                    esc_html__( '5px', 'listingeasy' )      => '5',
                    esc_html__( '0px', 'listingeasy' )      => '0'
                ),
                'std' => '30',
                "description" => esc_html__("Select spacing beetween items.", 'listingeasy')
            ),
            // Items Count
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Number of items to show', 'listingeasy' ),
                'param_name' => 'number_of_items',
                'value' => '',
                'description' => esc_html__( 'Enter number of items to show (Available only if "Categories Slug" field isn\'t filled).', 'listingeasy' ),
            ),
            // Order
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Order by', 'listingeasy' ),
                'param_name' => 'orderby',
                "value"         => array(
                    esc_html__( 'Default', 'listingeasy' ) => 'name',
                    esc_html__( 'Number of Listings', 'listingeasy' ) => 'count',
                    esc_html__( 'Random', 'listingeasy' ) => 'rand'
                ),
                "description" => esc_html__("Select order by.", 'listingeasy')
            ),
            // Categories Slug
            array(
                "type" => "textfield",
                "heading" => esc_html__("Categories Slug (optional)", 'listingeasy'),
                "param_name" => "categories_slug",
                "description" => esc_html__("Separate by comas (In brackets the preferred name). Example: food-drink(Food & Drink), entertainment(Entertainment)", 'listingeasy')
            ),
            vc_map_add_css_animation( true ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class", 'listingeasy'),
                "param_name" => "item_el_class",
                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'listingeasy')
            ),
        ),

    ));

    class WPBakeryShortCode_Gt3_listing_categories extends WPBakeryShortCode {
    }
}