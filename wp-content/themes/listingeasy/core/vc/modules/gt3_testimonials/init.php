<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'gt3_testimonials',
        'name' => esc_html__('Testimonials', 'listingeasy'),
        'description' => esc_html__('Display testimonials', 'listingeasy'),
        'category' => esc_html__('GT3 Modules', 'listingeasy'),
        'icon' => 'gt3_icon',
        'js_view' => 'VcColumnView',
        "as_parent" => array('only' => 'gt3_testimonial_item'),
        "content_element" => true,
        'show_settings_on_create' => false,
        'params' => array(
            array(
                'type' => 'gt3_dropdown',
                'class' => '',
                'heading' => esc_html__('Style select', 'listingeasy'),
                'param_name' => 'view_type',
                'fields' => array(
                    'type1' => array(
                        'image' => get_template_directory_uri() . '/img/gt3_composer_addon/img1.jpg', 
                        'descr' => esc_html__('Type 1', 'listingeasy')),
                    'type2' => array(
                        'image' => get_template_directory_uri() . '/img/gt3_composer_addon/img2.jpg', 
                        'descr' => esc_html__('Type 2', 'listingeasy')),
                    'type3' => array(
                        'image' => get_template_directory_uri() . '/img/gt3_composer_addon/img3.jpg', 
                        'descr' => esc_html__('Type 3', 'listingeasy')),
                    'type4' => array(
                        'image' => get_template_directory_uri() . '/img/gt3_composer_addon/img4.jpg', 
                        'descr' => esc_html__('Type 4', 'listingeasy')),
                ),
                'value' => 'type1',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use testimonials carousel?', 'listingeasy' ),
                'param_name' => 'use_carousel',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'dependency' => array(
                    'element' => 'view_type',
                    'value_not_equal_to' => array("type4"),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Align', 'listingeasy' ),
                'param_name' => 'item_align',
                'value' => array(
                    esc_html__("left", 'listingeasy') => 'left',
                    esc_html__("center", 'listingeasy') => 'center',
                    esc_html__("right", 'listingeasy') => 'right',
                ),
                'std' => 'center',
                'dependency' => array(
                    'element' => 'view_type',
                    'value' => array("type4"),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Autoplay time.', 'listingeasy' ),
                'param_name' => 'auto_play_time',
                'value' => '3000',
                'description' => esc_html__( 'Enter autoplay time in milliseconds.', 'listingeasy' ),
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Items Per Line', 'listingeasy'),
                'param_name' => 'posts_per_line',
                'value' => array(
                    esc_html__("1", 'listingeasy') => '1',
                    esc_html__("2", 'listingeasy') => '2',
                    esc_html__("3", 'listingeasy') => '3',
                    esc_html__("4", 'listingeasy') => '4',
                ),
                'dependency' => array(
                    'element' => 'view_type',
                    'value_not_equal_to' => array("type4"),
                ),
            ),
            vc_map_add_css_animation( true ), 
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class", 'listingeasy'),
                "param_name" => "item_el_class",
                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'listingeasy')
            ),
            // Testimonials Text Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Testimonials Text Font Size', 'listingeasy'),
                'param_name' => 'testimonilas_text_size',
                'value' => '16',
                'description' => esc_html__( 'Enter testimonials text font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Testimonials Text Fonts
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Text Color", 'listingeasy'),
                "param_name" => "text_color",
                "value" => "",
                "description" => esc_html__("Select text color for this item.", 'listingeasy'),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Testimonials Author Font Size', 'listingeasy'),
                'param_name' => 'testimonilas_author_size',
                'value' => '16',
                'description' => esc_html__( 'Enter testimonials author font-size in pixels.', 'listingeasy' ),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Author Color", 'listingeasy'),
                "param_name" => "sign_color",
                "value" => "",
                "description" => esc_html__("Select sign color for this item.", 'listingeasy'),
                "group" => esc_html__( "Styling", 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Image setting section
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image Width', 'listingeasy' ),
                'param_name' => 'img_width',
                'value' => '70',
                'description' => esc_html__( 'Enter image width in pixels.', 'listingeasy' ),
                "group" => "Styling",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image Height', 'listingeasy' ),
                'param_name' => 'img_height',
                'value' => '70',
                'description' => esc_html__( 'Enter image height in pixels.', 'listingeasy' ),
                "group" => "Styling",
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Circular Images?', 'listingeasy' ),
                'param_name' => 'round_imgs',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                "group" => "Styling",
            ),
        )
    ));
    
    // Testimonial item options
    vc_map(array(
        "name" => esc_html__("Testimonial item", 'listingeasy'),
        "base" => "gt3_testimonial_item",
        "class" => "gt3_info_list",
        "category" => esc_html__('GT3 Modules', 'listingeasy'),
        "icon" => site_url(str_replace(ABSPATH, '', __DIR__ . '/')) . 'icon.png',
        "content_element" => true,
        "as_child" => array('only' => 'gt3_testimonials'),
        "params" => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Author name", 'listingeasy'),
                "param_name" => "tstm_author",
                "value" => "",
                "description" => esc_html__("Provide a title for this list item.", 'listingeasy'),
                'admin_label' => true,
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Author Position", 'listingeasy'),
                "param_name" => "tstm_author_position",
                "value" => "",
                "description" => esc_html__("Provide an author position for this list item.", 'listingeasy'),
                'admin_label' => true,
            ),
            // Image Section
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'listingeasy' ),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'listingeasy' ),
                'admin_label' => true,
            ),
            array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => esc_html__("Description", 'listingeasy'),
                "param_name" => "content",
                "value" => "",
                "description" => esc_html__("Description about this list item", 'listingeasy')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Select Rate', 'listingeasy'),
                'param_name' => 'select_rate',
                'value' => array(
                    esc_html__("none", 'listingeasy') => 'none',
                    esc_html__("1", 'listingeasy') => '1',
                    esc_html__("2", 'listingeasy') => '2',
                    esc_html__("3", 'listingeasy') => '3',
                    esc_html__("4", 'listingeasy') => '4',
                    esc_html__("5", 'listingeasy') => '5',
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class", 'listingeasy'),
                "param_name" => "item_el_class",
                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'listingeasy')
            )
        )
    ));

    /*class WPBakeryShortCode_Gt3_Testimonials extends WPBakeryShortCode
    {
    }*/
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Gt3_Testimonials extends WPBakeryShortCodesContainer
        {
        }
    }
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Gt3_Testimonial_Item extends WPBakeryShortCode
        {
        }
    }
}