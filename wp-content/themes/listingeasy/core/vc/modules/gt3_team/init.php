<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'gt3_team',
        'name' => esc_html__('Team', 'listingeasy'),
        "description" => esc_html__("Display team members", 'listingeasy'),
        'category' => esc_html__('GT3 Modules', 'listingeasy'),
        'icon' => 'gt3_icon',
        'params' => array(
            array(
                'type' => 'loop',
                'heading' => esc_html__('Team Items', 'listingeasy'),
                'param_name' => 'build_query',
                'settings' => array(
                    'size' => array('hidden' => false, 'value' => 4 * 3),
                    'order_by' => array('value' => 'date'),
                    'post_type' => array('value' => 'team', 'hidden' => true),
                    'categories' => array('hidden' => true),
                    'tags' => array('hidden' => true),
                ),
                'description' => esc_html__('Create WordPress loop, to populate content from your site.', 'listingeasy')
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Module title", 'listingeasy'),
                "param_name" => "title",
                "description" => esc_html__("Module title.", 'listingeasy'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle', 'listingeasy'),
                'param_name' => 'subtitle',
                "description" => esc_html__("Module subtitle.", 'listingeasy'),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use Filter?', 'listingeasy' ),
                'param_name' => 'use_filter',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'not',
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Enable Link to Post', 'listingeasy' ),
                'param_name' => 'link_post',
                'std' => 'yes',
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Show View All Link', 'listingeasy'),
                'param_name' => 'show_view_all',
                'admin_label' => true,
                'value' => array(
                    esc_html__("No", 'listingeasy') => 'no',
                    esc_html__("Yes", 'listingeasy') => 'yes',
                ),
            ),
            array(
                "type" => "vc_link",
                "heading" => esc_html__("Link", 'listingeasy'),
                "param_name" => "view_all_link",
                'dependency' => array(
                    'element' => 'show_view_all', 'value' => array( 'yes' ),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Items Per Line', 'listingeasy'),
                'param_name' => 'posts_per_line',
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'value' => array(
                    esc_html__("1", 'listingeasy') => '1',
                    esc_html__("2", 'listingeasy') => '2',
                    esc_html__("3", 'listingeasy') => '3',
                    esc_html__("4", 'listingeasy') => '4',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Grid Gap', 'listingeasy'),
                'param_name' => 'grid_gap',
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'value' => array(
                    esc_html__("0", 'listingeasy') => '0px',
                    esc_html__("1", 'listingeasy') => '1px',
                    esc_html__("2", 'listingeasy') => '2px',
                    esc_html__("3", 'listingeasy') => '3px',
                    esc_html__("4", 'listingeasy') => '4px',
                    esc_html__("5", 'listingeasy') => '5px',
                    esc_html__("10", 'listingeasy') => '10px',
                    esc_html__("15", 'listingeasy') => '15px',
                    esc_html__("20", 'listingeasy') => '20px',
                    esc_html__("25", 'listingeasy') => '25px',
                    esc_html__("30", 'listingeasy') => '30px',
                    esc_html__("35", 'listingeasy') => '35px',
                ),
            ),
            vc_map_add_css_animation( true ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class", 'listingeasy'),
                "param_name" => "item_el_class",
                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'listingeasy')
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'listingeasy' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'listingeasy' ),
                'edit_field_class' => 'no-vc-background no-vc-border',
            ),
        )
    ));

    class WPBakeryShortCode_Gt3_Team extends WPBakeryShortCode
    {
    }
}