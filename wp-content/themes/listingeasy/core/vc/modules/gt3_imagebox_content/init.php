<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$header_font = gt3_option('header-font');
$main_font = gt3_option('main-font');
$theme_color = esc_attr(gt3_option("theme-custom-color"));

if (function_exists('vc_map')) {
// Add list item
    vc_map(array(
        "name" => esc_html__("Image Box with Content", 'listingeasy'),
        "base" => "gt3_imagebox_content",
        "class" => "gt3_imagebox_content",
        "category" => esc_html__('GT3 Modules', 'listingeasy'),
        "icon" => 'gt3_icon',
        "content_element" => true,
        "description" => esc_html__("Image Box with Content",'listingeasy'),
        "params" => array(
            // Image selection
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Box Image', 'listingeasy' ),
                'param_name' => 'box_image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'listingeasy' ),
            ),
            // Icon Section
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( 'Icon Type', 'listingeasy' ),
                "param_name"    => "icon_type",
                "value"         => array(
                    esc_html__( 'None', 'listingeasy' )      => 'none',
                    esc_html__( 'Font', 'listingeasy' )      => 'font',
                    esc_html__( 'Image', 'listingeasy' )     => 'image',
                ),
                'save_always' => true,
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'listingeasy' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-adjust', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    'iconsPerPage' => 200,
                ),
                'description' => esc_html__( 'Select icon from library.', 'listingeasy' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font',
                ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'listingeasy' ),
                'param_name' => 'thumbnail',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'listingeasy' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => array( 'image' ),
                ),
            ),
            // Number
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Number', 'listingeasy' ),
                "param_name"    => "number",
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( 'Image Position', 'listingeasy' ),
                "param_name"    => "image_position",
                "value"         => array(
                    esc_html__( 'Left', 'listingeasy' )              => 'left',
                    esc_html__( 'Right', 'listingeasy' )             => 'right',
                ),
                'save_always' => true,
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Heading", 'listingeasy'),
                "param_name" => "heading",
                "description" => esc_html__("Enter text for heading line.", 'listingeasy'),
                'admin_label' => true,
            ),
            array(
                "type" => "textarea",
                "heading" => esc_html__("Text", 'listingeasy'),
                "param_name" => "text",
                "description" => esc_html__("Enter text.", 'listingeasy')
            ),            
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Link', 'listingeasy' ),
                "param_name"    => "url",
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Link Text', 'listingeasy' ),
                "param_name"    => "url_text",
            ),            
            array(
                "type"          => "checkbox",
                "heading"       => esc_html__( 'Open in New Tab', 'listingeasy' ),
                "param_name"    => "new_tab",
                'save_always' => true,
            ),
            vc_map_add_css_animation( true ),
            // Styling
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( 'Icon Size', 'listingeasy' ),
                "param_name"    => "icon_size",
                "value"         => array(
                    esc_html__( 'Regular', 'listingeasy' )   => 'regular',
                    esc_html__( 'Mini', 'listingeasy' )      => 'mini',
                    esc_html__( 'Small', 'listingeasy' )     => 'small',
                    esc_html__( 'Large', 'listingeasy' )     => 'large',
                    esc_html__( 'Huge', 'listingeasy' )      => 'huge',
                    esc_html__( 'Custom', 'listingeasy')     => 'custom'
                ),              
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                'save_always' => true,
            ),
            // Custom icon size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Custom Icon Size', 'listingeasy'),
                'param_name' => 'custom_icon_size',
                'value' => '50',
                'description' => esc_html__( 'Enter Icon size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'dependency' => array(
                    'element' => 'icon_size',
                    'value' => 'custom',
                ),
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Content Background Color', 'listingeasy' ),
                "param_name"    => "content_bg",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => '#ffffff',
                'save_always' => true,
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Circle Background Color', 'listingeasy' ),
                "param_name"    => "circle_bg",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => $theme_color,
                'save_always' => true,
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Icon Color', 'listingeasy' ),
                "param_name"    => "icon_color",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => '#eff1f4',
                'save_always' => true,
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => array('font'),
                ),
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( 'Title Tag', 'listingeasy' ),
                "param_name"    => "title_tag",
                "value"         => array(
                    esc_html__( 'H2', 'listingeasy' )    => 'h2',
                    esc_html__( 'H3', 'listingeasy' )    => 'h3',
                    esc_html__( 'H4', 'listingeasy' )    => 'h4',
                    esc_html__( 'H5', 'listingeasy' )    => 'h5',
                    esc_html__( 'H6', 'listingeasy' )    => 'h6',
                ),
                'std'           => "h3",
                'save_always' => true,
                "group"         => esc_html__( "Styling", 'listingeasy' ),
            ),
            // Icon Box title Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Icon Box Title Font Size', 'listingeasy'),
                'param_name' => 'module_title_size',
                'value' => '30',
                'description' => esc_html__( 'Enter Icon Box title font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Module Title Fonts
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for module title?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_module_title',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_module_title',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_module_title',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            // Icon Box content Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Module Content Font Size', 'listingeasy'),
                'param_name' => 'module_content_size',
                'value' => '16',
                'description' => esc_html__( 'Enter Icon Box content font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Module content Fonts
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for module content?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_module_content',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_module_content',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_module_content',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Title Color', 'listingeasy' ),
                "param_name"    => "title_color",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => esc_attr($header_font['color']),
                'save_always' => true,
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Text Color', 'listingeasy' ),
                "param_name"    => "text_color",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => esc_attr($main_font['color']),
                'save_always' => true,
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Link Color', 'listingeasy' ),
                "param_name"    => "link_color",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => esc_attr(gt3_option("theme-custom-color")),
                'save_always' => true,
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Link Hover Color', 'listingeasy' ),
                "param_name"    => "link_hover_color",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => esc_attr($header_font['color']),
                'save_always' => true,
            ),                
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Gt3_imagebox_content extends WPBakeryShortCode {

        }
    } 
}
