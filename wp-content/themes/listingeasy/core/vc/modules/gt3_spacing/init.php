<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}


if (function_exists('vc_map')) {
// Add list item
    vc_map(array(
        "name" => esc_html__("Spacing", 'listingeasy'),
        "base" => "gt3_spacing",
        "class" => "gt3_spacing",
        "category" => esc_html__('GT3 Modules', 'listingeasy'),
        "icon" => 'gt3_icon',
        "content_element" => true,
        "description" => esc_html__("Spacing",'listingeasy'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__("Height", 'listingeasy'),
                "param_name" => "height",
                "description" => esc_html__("Enter empty space height", 'listingeasy'),
                "value" => "32px",
                'save_always' => true,
                'admin_label' => true,
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Set Resonsive Empty Space Height', 'listingeasy' ),
                'param_name' => 'responsive_es',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Height for small Desktops', 'listingeasy'),
                'param_name' => 'height_size_sm_desctop',
                'description' => esc_html__( 'Enter height in pixels.', 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'responsive_es',
                    "value" => "true"
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Height for Tablets', 'listingeasy'),
                'param_name' => 'height_tablet',
                'description' => esc_html__( 'Enter height in pixels.', 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'responsive_es',
                    "value" => "true"
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Height for Mobile', 'listingeasy'),
                'param_name' => 'height_mobile',
                'description' => esc_html__( 'Enter height in pixels.', 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'responsive_es',
                    "value" => "true"
                ),
            ),
                    
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Gt3_spacing extends WPBakeryShortCode {
            
        }
    } 
}
