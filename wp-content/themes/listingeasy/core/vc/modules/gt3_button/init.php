<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    // Add button
    vc_map(array(
        "name" => esc_html__("Button", 'listingeasy'),
        "base" => "gt3_button",
        "class" => "gt3_button",
        "category" => esc_html__('GT3 Modules', 'listingeasy'),
        "icon" => 'gt3_icon',
        "content_element" => true,
        "description" => esc_html__("Add custom button",'listingeasy'),
        "params" => array(
            // Text
            array(
                "type" => "textfield",
                "heading" => esc_html__("Text", 'listingeasy'),
                "param_name" => "button_title",
                "value" => esc_html__("Text on the button", 'listingeasy'),
                'admin_label' => true,
            ),
            // Link
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Link', 'listingeasy' ),
                'param_name' => 'link',
                "description" => esc_html__("Add link to button.", 'listingeasy')
            ),
            // Size
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Size', 'listingeasy' ),
                'param_name' => 'button_size',
                "value"         => array(
                    esc_html__( 'Normal', 'listingeasy' )   => 'normal',
                    esc_html__( 'Mini', 'listingeasy' )      => 'mini',
                    esc_html__( 'Small', 'listingeasy' )     => 'small',
                    esc_html__( 'Large', 'listingeasy' )     => 'large'
                ),
                "description" => esc_html__("Select button display size.", 'listingeasy')
            ),
            // Alignment
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Alignment', 'listingeasy' ),
                'param_name' => 'button_alignment',
                "value"         => array(
                    esc_html__( 'Inline', 'listingeasy' )      => 'inline',
                    esc_html__( 'Left', 'listingeasy' )     => 'left',
                    esc_html__( 'Right', 'listingeasy' )   => 'right',
                    esc_html__( 'Center', 'listingeasy' )     => 'center',
                    esc_html__( 'Block', 'listingeasy' )      => 'block'
                ),
                "description" => esc_html__("Select button alignment.", 'listingeasy')
            ),
            // Button Border
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Button Border Radius', 'listingeasy' ),
                'param_name' => 'btn_border_radius',
                "value"         => array(
                    esc_html__( 'None', 'listingeasy' )      => 'none',
                    esc_html__( '1px', 'listingeasy' )      => '1px',
                    esc_html__( '2px', 'listingeasy' )      => '2px',
                    esc_html__( '3px', 'listingeasy' )      => '3px',
                    esc_html__( '4px', 'listingeasy' )      => '4px',
                    esc_html__( '5px', 'listingeasy' )      => '5px',
                    esc_html__( '10px', 'listingeasy' )      => '10px',
                    esc_html__( '15px', 'listingeasy' )      => '15px',
                    esc_html__( '20px', 'listingeasy' )      => '20px',
                    esc_html__( '25px', 'listingeasy' )      => '25px',
                    esc_html__( '30px', 'listingeasy' )      => '30px',
                    esc_html__( '35px', 'listingeasy' )      => '35px'
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Button Border Style', 'listingeasy' ),
                'param_name' => 'btn_border_style',
                "value"         => array(
                    esc_html__( 'Solid', 'listingeasy' )     => 'solid',
                    esc_html__( 'Dashed', 'listingeasy' )   => 'dashed',
                    esc_html__( 'Dotted', 'listingeasy' )     => 'dotted',
                    esc_html__( 'Double', 'listingeasy' )      => 'double',
                    esc_html__( 'Inset', 'listingeasy' )      => 'inset',
                    esc_html__( 'Outset', 'listingeasy' )      => 'outset',
                    esc_html__( 'None', 'listingeasy' )      => 'none'
                ),
                'dependency' => array(
                    'callback' => 'gt3ButtonDependency',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Button Border Width', 'listingeasy' ),
                'param_name' => 'btn_border_width',
                "value"         => array(
                    esc_html__( '1px', 'listingeasy' )      => '1px',
                    esc_html__( '2px', 'listingeasy' )      => '2px',
                    esc_html__( '3px', 'listingeasy' )      => '3px',
                    esc_html__( '4px', 'listingeasy' )      => '4px',
                    esc_html__( '5px', 'listingeasy' )      => '5px',
                    esc_html__( '6px', 'listingeasy' )      => '6px',
                    esc_html__( '7px', 'listingeasy' )      => '7px',
                    esc_html__( '8px', 'listingeasy' )      => '8px',
                    esc_html__( '9px', 'listingeasy' )      => '9px',
                    esc_html__( '10px', 'listingeasy' )      => '10px'
                ),
                'dependency' => array(
                    'element' => 'btn_border_style',
                    'value_not_equal_to' => 'none',
                ),
            ),
            // --- ICON GROUP --- //
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Icon Type", 'listingeasy'),
                "param_name" => "btn_icon_type",
                "value" => array(
                    esc_html__("None",'listingeasy') => "none",
                    esc_html__("Font",'listingeasy') => "font",
                    esc_html__("Image",'listingeasy') => "image",
                ),
                'group' => esc_html__( 'Icon', 'listingeasy' ),
                "description" => esc_html__("Use an existing font icon or upload a custom image.", 'listingeasy'),
                'dependency' => array(
                    'callback' => 'gt3ButtonDependency',
                ),
            ),
            // Icon
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon', 'listingeasy'),
                'param_name' => 'btn_icon_fontawesome',
                'value' => 'fa fa-adjust', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 200, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                "dependency" => Array("element" => "btn_icon_type","value" => array("font")),
                'description' => esc_html__( 'Select icon from library.', 'listingeasy' ),
                'group' => esc_html__( 'Icon', 'listingeasy' ),
            ),
            // Image
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'listingeasy'),
                'param_name' => 'btn_image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'listingeasy' ),
                "dependency" => Array("element" => "btn_icon_type","value" => array("image")),
                'group' => esc_html__( 'Icon', 'listingeasy' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image Width', 'listingeasy'),
                'param_name' => 'btn_img_width',
                'value' => '',
                'description' => esc_html__( 'Enter image width in pixels.', 'listingeasy' ),
                "dependency" => Array("element" => "btn_icon_type","value" => array("image")),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Icon', 'listingeasy' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Position', 'listingeasy'),
                'param_name' => 'btn_icon_position',
                'value' => array(
                    esc_html__("Left", 'listingeasy') => 'left',
                    esc_html__("Right", 'listingeasy') => 'right'
                ),
                "dependency" => Array("element" => "btn_icon_type","value" => array("image", "font")),
                'group' => esc_html__( 'Icon', 'listingeasy' ),
            ),
            // Icon Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Icon Font Size', 'listingeasy'),
                'param_name' => 'icon_font_size',
                'value' => '14',
                'description' => esc_html__( 'Enter icon font-size in pixels.', 'listingeasy' ),
                "dependency" => Array("element" => "btn_icon_type","value" => array("font")),
                "group" => esc_html__( "Icon", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // --- TYPOGRAPHY GROUP --- //
            // Button Font
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for button?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_button',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Typography", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_button',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_button',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Typography", 'listingeasy' ),
            ),
            // Button Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Font Size', 'listingeasy'),
                'param_name' => 'btn_font_size',
                'value' => '14',
                'description' => esc_html__( 'Enter button font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Typography", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // --- SPACING GROUP --- //
            array(
                'type' => 'css_editor',
                'param_name' => 'css',
                'group' => esc_html__( 'Spacing', 'listingeasy' ),
            ),
            vc_map_add_css_animation( true ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class", 'listingeasy'),
                "param_name" => "item_el_class",
                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'listingeasy')
            ),
            // --- CUSTOM GROUP --- //
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default button?', 'listingeasy' ),
                'param_name' => 'use_theme_button',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use button from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'std' => 'yes',
            ),
            // Button Bg
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Background", 'listingeasy'),
                "param_name" => "btn_bg_color",
                "value" => esc_attr(gt3_option("theme-custom-color")),
                "description" => esc_html__("Select custom background for button.", 'listingeasy'),
                'save_always' => true,
                'dependency' => array(
                    'element' => 'use_theme_button',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Button text-color
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Text Color", 'listingeasy'),
                "param_name" => "btn_text_color",
                "value" => "#ffffff",
                "description" => esc_html__("Select custom text color for button.", 'listingeasy'),
                'save_always' => true,
                'dependency' => array(
                    'element' => 'use_theme_button',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Button Hover Bg
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Button Hover Background", 'listingeasy'),
                "param_name" => "btn_bg_color_hover",
                "value" => "#ffffff",
                "description" => esc_html__("Select custom background for hover button.", 'listingeasy'),
                'dependency' => array(
                    'element' => 'use_theme_button',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Button Hover text-color
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Button Hover Text Color", 'listingeasy'),
                "param_name" => "btn_text_color_hover",
                "value" => esc_attr(gt3_option("theme-custom-color")),
                "description" => esc_html__("Select custom text color for hover button.", 'listingeasy'),
                'dependency' => array(
                    'element' => 'use_theme_button',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Button icon-color
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Icon Color", 'listingeasy'),
                "param_name" => "btn_icon_color",
                "value" => "#ffffff",
                "description" => esc_html__("Select icon color for button.", 'listingeasy'),
                'dependency' => array(
                    'element' => 'use_theme_button',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Button Hover icon-color
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Button Hover Icon Color", 'listingeasy'),
                "param_name" => "btn_icon_color_hover",
                "value" => "#ffffff",
                "description" => esc_html__("Select icon color for hover button.", 'listingeasy'),
                'dependency' => array(
                    'element' => 'use_theme_button',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Button border-color
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Button Border Color", 'listingeasy'),
                "param_name" => "btn_border_color",
                "value" => esc_attr(gt3_option("theme-custom-color")),
                "description" => esc_html__("Select custom border color for button.", 'listingeasy'),
                'save_always' => true,
                'dependency' => array(
                    'element' => 'use_theme_button',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Button Hover border-color
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Button Hover Border Color", 'listingeasy'),
                "param_name" => "btn_border_color_hover",
                "value" => esc_attr(gt3_option("theme-custom-color")),
                "description" => esc_html__("Select custom border color for hover button.", 'listingeasy'),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'dependency' => array(
                    'element' => 'use_theme_button',
                    'value_not_equal_to' => 'yes',
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),


        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Gt3_Button extends WPBakeryShortCode {
        }
    }
}