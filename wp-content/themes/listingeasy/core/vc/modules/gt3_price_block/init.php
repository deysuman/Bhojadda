<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'gt3_price_block',
        'name' => esc_html__('Price Block', 'listingeasy'),
        "description" => esc_html__("Create price table", 'listingeasy'),
        'category' => esc_html__('GT3 Modules', 'listingeasy'),
        'icon' => 'gt3_icon',
        'params' => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__("Package Name / Title", 'listingeasy'),
                "param_name" => "title",
                "description" => esc_html__("Enter title of price block.", 'listingeasy')
            ),
            array(
                "type" => "attach_image",
                "heading" => esc_html__("Section Icon", 'listingeasy'),
                "param_name" => "header_img",
                "description" => esc_html__("Select section icon.", 'listingeasy')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Active package', 'listingeasy'),
                'param_name' => 'package_is_active',
                'admin_label' => true,
                'value' => array(
                    esc_html__("No", 'listingeasy') => 'no',
                    esc_html__("Yes", 'listingeasy') => 'yes',
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Package Price", 'listingeasy'),
                "param_name" => "price",
                "description" => esc_html__("Enter the price for this package. e.g. '157'", 'listingeasy')
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Price Prefix", 'listingeasy'),
                "param_name" => "price_prefix",
                "description" => esc_html__("Enter the price prefix for this package. e.g. '$'", 'listingeasy')
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Package Suffix", 'listingeasy'),
                "param_name" => "price_suffix",
                "description" => esc_html__("Enter the price suffix for this package. e.g. '/ person'", 'listingeasy')
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Package description", 'listingeasy'),
                "param_name" => "price_description",
                "description" => esc_html__("Enter the price block short description", 'listingeasy')
            ),
            array(
                "type" => "vc_link",
                "heading" => esc_html__("Link", 'listingeasy'),
                "param_name" => "button_link",
            ),
            array(
                "type" => "textarea_html",
                "heading" => esc_html__("Price field", 'listingeasy'),
                "param_name" => "content",
            ),
            
            // General Params
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
                'edit_field_class' => '',
            ),
            // Price Title Fonts
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for price table header?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_price_header',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_price_header',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_price_header',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for price table content?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_price_content',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_price_content',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_price_content',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            // Button COLOR
            array(
                "type" => "colorpicker",
                "heading" => esc_html__("Section color", 'listingeasy'),
                "param_name" => "section_color",
                "value" => esc_attr(gt3_option("theme-custom-color")),
                "description" => esc_html__("Select custom color for section.", 'listingeasy'),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use alternative button style?', 'listingeasy' ),
                'param_name' => 'use_alt_button_style',
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => '',
            ),
        ),


    ));

    class WPBakeryShortCode_Gt3_Price_block extends WPBakeryShortCode { }

}