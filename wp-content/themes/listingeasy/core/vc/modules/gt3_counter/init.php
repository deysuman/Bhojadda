<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    // Add list item
    vc_map(array(
        "name" => esc_html__("Counter", 'listingeasy'),
        "base" => "gt3_counter",
        "class" => "gt3_counter",
        "category" => esc_html__('GT3 Modules', 'listingeasy'),
        "icon" => 'gt3_icon',
        "content_element" => true,
        "description" => esc_html__("Adds your milestones, achievements, etc.",'listingeasy'),
        "params" => array(
            // Icon Type
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Icon Type", 'listingeasy'),
                "param_name" => "icon_type",
                "value" => array(
                    esc_html__("Font",'listingeasy') => "font",
                    esc_html__("Image",'listingeasy') => "image",
                    esc_html__("None",'listingeasy') => "none",
                ),
                "description" => esc_html__("Use an existing font icon or upload a custom image.", 'listingeasy')
            ),
            // Icon
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon', 'listingeasy'),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-adjust', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                "dependency" => Array("element" => "icon_type","value" => array("font")),
                'description' => esc_html__( 'Select icon from library.', 'listingeasy' ),
            ),
            // Image
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'listingeasy'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'listingeasy' ),
                "dependency" => Array("element" => "icon_type","value" => array("image")),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image Width', 'listingeasy'),
                'param_name' => 'img_width',
                'value' => '60',
                'description' => esc_html__( 'Enter image width in pixels.', 'listingeasy' ),
                "dependency" => Array("element" => "icon_type","value" => array("image")),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image Proportions', 'listingeasy'),
                'param_name' => 'image_proportions',
                'value' => array(
                    esc_html__("Original", 'listingeasy') => 'original',
                    esc_html__("Square", 'listingeasy') => 'square',
                    esc_html__("Circle", 'listingeasy') => 'circle',
                ),
                "dependency" => Array("element" => "img_width", "not_empty" => true),
            ),
            // General Params
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Position', 'listingeasy'),
                'param_name' => 'icon_position',
                'value' => array(
                    esc_html__("Left", 'listingeasy') => 'left',
                    esc_html__("Top", 'listingeasy') => 'top',
                    esc_html__("Right", 'listingeasy') => 'right',
                    esc_html__("Bottom", 'listingeasy') => 'bottom',
                ),
                "dependency" => Array("element" => "icon_type","value" => array("image", "font")),
            ),
             array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Counter Title ", 'listingeasy'),
                "param_name" => "counter_title",
                "admin_label" => true,
                "value" => "",
                "description" => esc_html__("Enter title for stats counter block", 'listingeasy')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Counter Value", 'listingeasy'),
                "param_name" => "counter_value",
                "value" => "2001",
                "description" => esc_html__("Enter number for counter without any special character. You may enter a decimal number. Eg 12.76", 'listingeasy')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Counter Value Prefix", 'listingeasy'),
                "param_name" => "counter_prefix",
                "value" => "",
                "description" => esc_html__("Enter prefix for counter value", 'listingeasy')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Counter Value Suffix", 'listingeasy'),
                "param_name" => "counter_suffix",
                "value" => "",
                "description" => esc_html__("Enter suffix for counter value", 'listingeasy')
            ),
            vc_map_add_css_animation( true ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class", 'listingeasy'),
                "param_name" => "item_el_class",
                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'listingeasy')
            ),
            // Counter Title Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Counter Title Font Size', 'listingeasy'),
                'param_name' => 'counter_title_size',
                'value' => '16',
                'description' => esc_html__( 'Enter counter title font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Counter Title Fonts
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for counter title?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_counter_title',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_counter_title',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_counter_title',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            // Counter Value Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Counter Value Font Size', 'listingeasy'),
                'param_name' => 'counter_value_size',
                'value' => '48',
                'description' => esc_html__( 'Enter counter value font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Counter Value Fonts
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for counter value?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_counter_value',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_counter_value',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_counter_value',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Icon Color", 'listingeasy'),
                "param_name" => "icon_color",
                "value" => "#27323d",
                "description" => esc_html__("Select color for this item.", 'listingeasy'),
                "dependency" => Array("element" => "icon_type","value" => array("font")),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'save_always' => true,
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon Size', 'listingeasy' ),
                'param_name' => 'icon_size',
                "value"         => array(
                    esc_html__( 'Mini', 'listingeasy' )      => 'mini',
                    esc_html__( 'Small', 'listingeasy' )     => 'small',
                    esc_html__( 'Normal', 'listingeasy' )   => 'normal',
                    esc_html__( 'Large', 'listingeasy' )     => 'large',
                    esc_html__( 'Extra Large', 'listingeasy' )      => 'extralarge'
                ),
                "dependency" => Array("element" => "icon_type","value" => array("font")),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'save_always' => true,
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Counter Value Color", 'listingeasy'),
                "param_name" => "counter_value_color",
                "value" => "#27323d",
                "description" => esc_html__("Select color for this item.", 'listingeasy'),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'save_always' => true,
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Title Color", 'listingeasy'),
                "param_name" => "title_color",
                "value" => "#848d95",
                "description" => esc_html__("Select color for this item.", 'listingeasy'),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'save_always' => true,
            ),
            
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Gt3_Counter extends WPBakeryShortCode {
        }
    }
}