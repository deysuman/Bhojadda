<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Blog Posts', 'listingeasy'),
        'base' => 'gt3_blog',
        'class' => 'gt3_blog',
        "description" => esc_html__("Display blog posts", 'listingeasy'),
        'category' => esc_html__('GT3 Modules', 'listingeasy'),
        'icon' => 'gt3_icon',
        'params' => array(
            array(
                'type' => 'loop',
                'heading' => esc_html__('Blog Items', 'listingeasy'),
                'param_name' => 'build_query',
                'settings' => array(
                    'size' => array('hidden' => false, 'value' => 4 * 3),
                    'order_by' => array('value' => 'date'),
                    'post_type' => array('value' => 'post', 'hidden' => true),
                    'categories' => array('hidden' => false),
                    'tags' => array('hidden' => false)
                ),
                'description' => esc_html__('Create WordPress loop, to populate content from your site.', 'listingeasy')
            ),
            // Post meta
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Cut off text in blog listing', 'listingeasy' ),
                'param_name' => 'blog_post_listing_content_module',
                'description' => esc_html__( 'If checked, cut off text in blog listing.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Post Format Label
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-format label?', 'listingeasy' ),
                'param_name' => 'pf_post_icon',
                'description' => esc_html__( 'If checked, post-format label is visible.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-meta author?', 'listingeasy' ),
                'param_name' => 'meta_author',
                'description' => esc_html__( 'If checked, post-meta will have author.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-meta comments?', 'listingeasy' ),
                'param_name' => 'meta_comments',
                'description' => esc_html__( 'If checked, post-meta will have comments.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-meta categories?', 'listingeasy' ),
                'param_name' => 'meta_categories',
                'description' => esc_html__( 'If checked, post-meta will have categories.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-meta date?', 'listingeasy' ),
                'param_name' => 'meta_date',
                'description' => esc_html__( 'If checked, post-meta will have date.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            // Items per line
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Items Per Line', 'listingeasy' ),
                'param_name' => 'items_per_line',
                "value"         => array(
                    esc_html__( '1', 'listingeasy' ) => '1',
                    esc_html__( '2', 'listingeasy' ) => '2',
                    esc_html__( '3', 'listingeasy' ) => '3',
                    esc_html__( '4', 'listingeasy' ) => '4'
                ),
                "description" => esc_html__("Select post items per line.", 'listingeasy')
            ),
            // Spacing beetween items
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Spacing beetween items', 'listingeasy' ),
                'param_name' => 'spacing_beetween_items',
                "value"         => array(
                    esc_html__( '5px', 'listingeasy' )      => '5',
                    esc_html__( '10px', 'listingeasy' )      => '10',
                    esc_html__( '15px', 'listingeasy' )      => '15',
                    esc_html__( '20px', 'listingeasy' )      => '20',
                    esc_html__( '25px', 'listingeasy' )      => '25',
                    esc_html__( '30px', 'listingeasy' )      => '30'
                ),
                'std' => '30',
                "description" => esc_html__("Select spacing beetween items.", 'listingeasy'),
                "dependency" => Array("element" => "items_per_line","value" => array("2", "3", "4")),
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

    class WPBakeryShortCode_Gt3_Blog extends WPBakeryShortCode {
    }
}