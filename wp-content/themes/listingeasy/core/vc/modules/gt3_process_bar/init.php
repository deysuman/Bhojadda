<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$header_font = gt3_option('header-font');
$main_font = gt3_option('main-font');

if (function_exists('vc_map')) {
// Add list item
    vc_map(array(
        "name" => esc_html__("Process Bar", 'listingeasy'),
        "base" => "gt3_process_bar",
        "class" => "gt3_process_bar",
        "category" => esc_html__('GT3 Modules', 'listingeasy'),
        "icon" => 'gt3_icon',
        "content_element" => true,
        "description" => esc_html__("Process Bar",'listingeasy'),
        "params" => array(
            // Icon Section
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__( 'Steps Count', 'listingeasy' ),
                "param_name"    => "steps",
                "value"         => array(
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ),
                'save_always' => true,
            ),
            array(
                "type"          => "backend_divider",
                "heading" => esc_html__("Step 1:", 'listingeasy'),
                "param_name"    => "backend_divider",
            ),
            /* step 1 */
            array(
                "type" => "textfield",
                "heading" => esc_html__("Step 1 Heading", 'listingeasy'),
                "param_name" => "heading1",
                "description" => esc_html__("Enter text for heading line.", 'listingeasy')
            ),
            array(
                "type" => "textarea",
                "heading" => esc_html__("Step 1 Text", 'listingeasy'),
                "param_name" => "text1",
                "description" => esc_html__("Enter text.", 'listingeasy')
            ),            
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 1 Link', 'listingeasy' ),
                "param_name"    => "url1",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 1 Link Text', 'listingeasy' ),
                "param_name"    => "url_text1",
                'edit_field_class' => 'vc_col-sm-6',
            ),  
            /* step 2 */
            array(
                "type"          => "backend_divider",
                "heading" => esc_html__("Step 2:", 'listingeasy'),
                "param_name"    => "backend_divider",
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Step 2 Heading", 'listingeasy'),
                "param_name" => "heading2",
                "description" => esc_html__("Enter text for heading line.", 'listingeasy')
            ),
            array(
                "type" => "textarea",
                "heading" => esc_html__("Step 2 Text", 'listingeasy'),
                "param_name" => "text2",
                "description" => esc_html__("Enter text.", 'listingeasy')
            ),            
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 2 Link', 'listingeasy' ),
                "param_name"    => "url2",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 2 Link Text', 'listingeasy' ),
                "param_name"    => "url_text2",
                'edit_field_class' => 'vc_col-sm-6',
            ), 
            /* step 3 */
            array(
                "type"          => "backend_divider",
                "heading" => esc_html__("Step 3:", 'listingeasy'),
                "param_name"    => "backend_divider",
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Step 3 Heading", 'listingeasy'),
                "param_name" => "heading3",
                "description" => esc_html__("Enter text for heading line.", 'listingeasy')
            ),
            array(
                "type" => "textarea",
                "heading" => esc_html__("Step 3 Text", 'listingeasy'),
                "param_name" => "text3",
                "description" => esc_html__("Enter text.", 'listingeasy')
            ),            
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 3 Link', 'listingeasy' ),
                "param_name"    => "url3",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 3 Link Text', 'listingeasy' ),
                "param_name"    => "url_text3",
                'edit_field_class' => 'vc_col-sm-6',
            ), 
            /* step 4 */
            array(
                "type"          => "backend_divider",
                "heading" => esc_html__("Step 4:", 'listingeasy'),
                "param_name"    => "backend_divider",
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Step 4 Heading", 'listingeasy'),
                "param_name" => "heading4",
                "description" => esc_html__("Enter text for heading line.", 'listingeasy'),
            ),
            array(
                "type" => "textarea",
                "heading" => esc_html__("Step 4 Text", 'listingeasy'),
                "param_name" => "text4",
                "description" => esc_html__("Enter text.", 'listingeasy'),
            ),            
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 4 Link', 'listingeasy' ),
                "param_name"    => "url4",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 4 Link Text', 'listingeasy' ),
                "param_name"    => "url_text4",
                'edit_field_class' => 'vc_col-sm-6',

            ), 
            /* step 5 */
            array(
                "type"          => "backend_divider",
                "heading" => esc_html__("Step 5:", 'listingeasy'),
                "param_name"    => "backend_divider",
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Step 5 Heading", 'listingeasy'),
                "param_name" => "heading5",
                "description" => esc_html__("Enter text for heading line.", 'listingeasy'),
            ),
            array(
                "type" => "textarea",
                "heading" => esc_html__("Step 5 Text", 'listingeasy'),
                "param_name" => "text5",
                "description" => esc_html__("Enter text.", 'listingeasy'),
            ),            
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 5 Link', 'listingeasy' ),
                "param_name"    => "url5",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Step 5 Link Text', 'listingeasy' ),
                "param_name"    => "url_text5",
                'edit_field_class' => 'vc_col-sm-6',
            ), 
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
                    esc_html__( 'Huge', 'listingeasy' )      => 'huge'
                ),              
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                'save_always' => true,
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Icon Background', 'listingeasy' ),
                "param_name"    => "icon_bg",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => esc_attr(gt3_option("theme-custom-color")),
                'save_always' => true,
            ),
            array(
                "type"          => "colorpicker",
                "heading"       => esc_html__( 'Icon Color', 'listingeasy' ),
                "param_name"    => "icon_color",
                "group"         => esc_html__( "Styling", 'listingeasy' ),
                "value"         => '#ffffff',
                'save_always' => true,
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
                'save_always' => true,
                "group"         => esc_html__( "Styling", 'listingeasy' ),
            ),
            // Icon Box title Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Font Size', 'listingeasy'),
                'param_name' => 'iconbox_title_size',
                'value' => '18',
                'description' => esc_html__( 'Enter title font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Iconbox Title Fonts
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for title?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_iconbox_title',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_iconbox_title',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_iconbox_title',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            // Icon Box content Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Font Size', 'listingeasy'),
                'param_name' => 'iconbox_content_size',
                'value' => '16',
                'description' => esc_html__( 'Enter content font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Iconbox content Fonts
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for content?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_iconbox_content',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_iconbox_content',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_iconbox_content',
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
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Gt3_process_bar extends WPBakeryShortCode {
            
        }
    } 
}
