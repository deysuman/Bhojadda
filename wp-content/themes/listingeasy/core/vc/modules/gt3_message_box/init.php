<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
// Add list item
    $main_font = gt3_option('main-font');
    vc_map(array(
        "name" => esc_html__("Message Box", 'listingeasy'),
        "base" => "gt3_message_box",
        "class" => "gt3_message_box",
        "category" => esc_html__('GT3 Modules', 'listingeasy'),
        "icon" => 'gt3_icon',
        "content_element" => true,
        "description" => esc_html__("Message Box",'listingeasy'),
        "params" => array(
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'listingeasy' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-adjust', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 200,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'description' => esc_html__( 'Select icon from library.', 'listingeasy' ),
            ),
            array(
                "type" => "textarea",
                "heading" => esc_html__("Text", 'listingeasy'),
                "param_name" => "text",
                "description" => esc_html__("Enter text.", 'listingeasy')
            ),            
            array(
                "type"          => "checkbox",
                "heading"       => esc_html__( 'Closable?', 'listingeasy' ),
                "param_name"    => "closable",
                'save_always' => true,
            ),
            vc_map_add_css_animation( true ),
            // Styling
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Background Color', 'listingeasy' ),
                "param_name"    => "background",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => esc_attr(gt3_option("theme-custom-color")),
                'save_always' => true,
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Text Color', 'listingeasy' ),
                "param_name"    => "text_color",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => '#ffffff',
                'save_always' => true,
            ),                
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Gt3_message_box extends WPBakeryShortCode {
            
        }
    } 
}
