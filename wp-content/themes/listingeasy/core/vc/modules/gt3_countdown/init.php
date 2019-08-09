<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$header_font = gt3_option('header-font');
$main_font = gt3_option('main-font');

if (function_exists('vc_map')) {
// Add list item
    vc_map(array(
        "name" => esc_html__("Countdown", 'listingeasy'),
        "base" => "gt3_countdown",
        "class" => "gt3_countdown",
        "category" => esc_html__('GT3 Modules', 'listingeasy'),
        "icon" => 'gt3_icon',
        "content_element" => true,
        "description" => esc_html__("Countdown",'listingeasy'),
        "params" => array(
            array(
                "type"          => "backend_divider",
                "heading" => esc_html__("Countdown Date:", 'listingeasy'),
                "param_name"    => "backend_divider",
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Year", 'listingeasy'),
                "param_name" => "countdown_year",
                "description" => esc_html__("Enter year EX.: 2017", 'listingeasy'),
                'edit_field_class' => 'vc_col-sm-2',
            ),
             array(
                "type" => "textfield",
                "heading" => esc_html__("Month", 'listingeasy'),
                "param_name" => "countdown_month",
                "description" => esc_html__("Enter month EX.: 08", 'listingeasy'),
                'edit_field_class' => 'vc_col-sm-2',
            ),
              array(
                "type" => "textfield",
                "heading" => esc_html__("Day", 'listingeasy'),
                "param_name" => "countdown_day",
                "description" => esc_html__("Enter day EX.: 20", 'listingeasy'),
                'edit_field_class' => 'vc_col-sm-2',
            ),
                array(
                "type" => "textfield",
                "heading" => esc_html__("Hours", 'listingeasy'),
                "param_name" => "countdown_hours",
                "description" => esc_html__("Enter hours EX.: 13", 'listingeasy'),
                'edit_field_class' => 'vc_col-sm-2',
            ),
              array(
                "type" => "textfield",
                "heading" => esc_html__("Minutes", 'listingeasy'),
                "param_name" => "countdown_min",
                "description" => esc_html__("Enter min. EX.: 24", 'listingeasy'),
                'edit_field_class' => 'vc_col-sm-2',
            ),
            array(
                "type"          => "backend_divider",
                "heading" => esc_html__("Countdown Show:", 'listingeasy'),
                "param_name"    => "backend_divider",
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Show Days?', 'listingeasy' ),
                'param_name' => 'show_day',
                'edit_field_class' => 'vc_col-sm-3',
                'std' => 'true'
            ),            
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Show Hours?', 'listingeasy' ),
                'param_name' => 'show_hours',
                'edit_field_class' => 'vc_col-sm-3',
                'std' => 'true'
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Show Minutes?', 'listingeasy' ),
                'param_name' => 'show_minutes',
                'edit_field_class' => 'vc_col-sm-3',
                'std' => 'true'
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Show Seconds?', 'listingeasy' ),
                'param_name' => 'show_seconds',
                'edit_field_class' => 'vc_col-sm-3',
                'std' => 'true'
            ),
            array(
                "type"          => "backend_divider",
                "heading" => esc_html__("Countdown Style:", 'listingeasy'),
                "param_name"    => "backend_divider",
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Size", 'listingeasy'),
                "param_name" => "size",
                "value" => array(
                    esc_html__("Small",'listingeasy') => "small",
                    esc_html__("Medium",'listingeasy') => "medium",
                    esc_html__("Large",'listingeasy') => "large",
                    esc_html__("Extra Large",'listingeasy') => "e_large",
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Align', 'listingeasy' ),
                'param_name' => 'align',
                "value"         => array(
                    esc_html__( 'left', 'listingeasy' ) => 'left',
                    esc_html__( 'center', 'listingeasy' ) => 'center',
                    esc_html__( 'right', 'listingeasy' ) => 'right',
                ),
                'std' => 'center',
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use Box Shadow?', 'listingeasy' ),
                'param_name' => 'box_shadow',
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Countdown Background", 'listingeasy'),
                "param_name" => "counter_bg",
                "value" => "#ffffff",
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Counter Value Color", 'listingeasy'),
                "param_name" => "color",
                "value" => "#27323d",
                "description" => esc_html__("Select color for this item.", 'listingeasy'),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),  
            vc_map_add_css_animation( true ),                          
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_gt3_countdown extends WPBakeryShortCode {

            
        }
    } 
}