<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'gt3_video_popup',
        'name' => esc_html__('Video Popup', 'listingeasy'),
        "description" => esc_html__("Video Popup Widget", 'listingeasy'),
        'category' => esc_html__('GT3 Modules', 'listingeasy'),
        'icon' => 'gt3_icon',
        'params' => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__("Title", 'listingeasy'),
                "param_name" => "video_title",
                "description" => esc_html__("Enter title.", 'listingeasy')
            ),
            array(
                "type" => "attach_image",
                "heading" => esc_html__("Background Image Video", 'listingeasy'),
                "param_name" => "bg_image",
                "description" => esc_html__("Select video background image.", 'listingeasy'),
                'std' => ''
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Video Link", 'listingeasy'),
                "param_name" => "video_link",
                "description" => esc_html__("Enter video link from youtube or vimeo.", 'listingeasy')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Icon Align', 'listingeasy' ),
                'param_name' => 'align',
                "value"         => array(
                    esc_html__( 'left', 'listingeasy' ) => 'left',
                    esc_html__( 'center', 'listingeasy' ) => 'center',
                    esc_html__( 'right', 'listingeasy' ) => 'right',
                ),
                'std' => 'center',
            ),

            /* styling video popup */
            array(
                "type" => "colorpicker",
                "heading" => esc_html__("Title color", 'listingeasy'),
                "param_name" => "title_color",
                "value" => esc_attr("#ffffff"),
                "description" => esc_html__("Select custom color for title.", 'listingeasy'),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            // Video Popup Title Fonts
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for Video Popup title?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_vpopup_title',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_vpopup_title',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_vpopup_title',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
            ),
            // Icon Box content Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Video Popup Content Font Size', 'listingeasy'),
                'param_name' => 'title_size',
                'value' => '24',
                'description' => esc_html__( 'Enter Video Popup Title font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),

            
        ),


    ));

    class WPBakeryShortCode_Gt3_Video_Popup extends WPBakeryShortCode { }

}