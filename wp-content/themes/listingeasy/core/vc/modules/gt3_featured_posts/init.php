<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$header_font = gt3_option('header-font');
$main_font = gt3_option('main-font');

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'gt3_featured_posts',
        'name' => esc_html__('Featured Blog Posts', 'listingeasy'),
        "description" => esc_html__("Display the featured blog posts", 'listingeasy'),
        'category' => esc_html__('GT3 Modules', 'listingeasy'),
        'icon' => 'gt3_icon',
        'params' => array(
            array(
                'type' => 'loop',
                'heading' => esc_html__('Blog Items', 'listingeasy'),
                'param_name' => 'build_query',
                'settings' => array(
                    'size' => array('hidden' => false, 'value' => 4 * 3),
                    'order_by' => array('value' => 'date'),
                    'post_type' => array('value' => 'post', 'hidden' => true),
                    'categories' => array('hidden' => false),
                    'tags' => array('hidden' => false)
                ),
                'description' => esc_html__('Create WordPress loop, to populate content from your site.', 'listingeasy')
            ),
            // Module Title
            array(
                "type" => "textfield",
                'heading' => esc_html__('Module title', 'listingeasy'),
                "param_name" => "module_title",
                "value" => "",
                "description" => esc_html__("Enter text used as module title (Note: located above content element).", 'listingeasy')
            ),
            // Link Text
            array(
                "type" => "textfield",
                "heading" => esc_html__("Module Link Text", 'listingeasy'),
                "param_name" => "external_link_text",
                "value" => "",
                "description" => esc_html__("Text on the module link.", 'listingeasy'),
            ),
            // Link Setts
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Module Link', 'listingeasy' ),
                'param_name' => 'external_link',
                "dependency" => Array("element" => "external_link_text", "not_empty" => true),
            ),
            // View Type
            array(
                'type' => 'gt3_dropdown',
                'class' => '',
                'heading' => esc_html__('Style select', 'listingeasy'),
                'param_name' => 'view_type',
                'fields' => array(
                    'type1' => array(
                        'image' => get_template_directory_uri() . '/img/gt3_composer_addon/blog_type1.jpg',
                        'descr' => esc_html__('Type 1', 'listingeasy')),
                    'type2' => array(
                        'image' => get_template_directory_uri() . '/img/gt3_composer_addon/blog_type2.jpg',
                        'descr' => esc_html__('Type 2', 'listingeasy')),
                    'type3' => array(
                        'image' => get_template_directory_uri() . '/img/gt3_composer_addon/blog_type3.jpg',
                        'descr' => esc_html__('Type 3', 'listingeasy')),
                    'type4' => array(
                        'image' => get_template_directory_uri() . '/img/gt3_composer_addon/blog_type4.jpg',
                        'descr' => esc_html__('Type 4', 'listingeasy')),
                ),
                'value' => 'type4',
            ),
            // Post meta
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Allow uppercase post-meta text?', 'listingeasy' ),
                'param_name' => 'post_meta_uppercase',
                'description' => esc_html__( 'If checked, allow uppercase post-meta text.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-meta author?', 'listingeasy' ),
                'param_name' => 'meta_author',
                'description' => esc_html__( 'If checked, post-meta will have author.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-meta comments?', 'listingeasy' ),
                'param_name' => 'meta_comments',
                'description' => esc_html__( 'If checked, post-meta will have comments.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-meta categories?', 'listingeasy' ),
                'param_name' => 'meta_categories',
                'description' => esc_html__( 'If checked, post-meta will have categories.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-meta date?', 'listingeasy' ),
                'param_name' => 'meta_date',
                'description' => esc_html__( 'If checked, post-meta will have date.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            // Post Format Label
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post-format label?', 'listingeasy' ),
                'param_name' => 'pf_post_icon',
                'description' => esc_html__( 'If checked, post-format label is visible.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'edit_field_class' => 'vc_col-sm-4',
                "dependency" => Array("element" => "view_type","value" => array("type4"))
            ),
            // Post Read More Link
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show post read more link?', 'listingeasy' ),
                'param_name' => 'post_read_more_link',
                'description' => esc_html__( 'If checked, post read more link is visible.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'edit_field_class' => 'vc_col-sm-4',
                "dependency" => Array("element" => "view_type","value" => array("type4"))
            ),
            // Post Read More Link
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Allow boxed text content?', 'listingeasy' ),
                'param_name' => 'boxed_text_content',
                'description' => esc_html__( 'If checked, allow boxed text content.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'edit_field_class' => 'vc_col-sm-4',
                "dependency" => Array("element" => "view_type","value" => array("type3", "type4")),
            ),
            // Image Proportions
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image Proportions', 'listingeasy' ),
                'param_name' => 'image_proportions',
                "value"         => array(
                    esc_html__( '4/3', 'listingeasy' ) => '4_3',
                    esc_html__( 'Horizontal', 'listingeasy' ) => 'horizontal',
                    esc_html__( 'Vertical', 'listingeasy' ) => 'vertical',
                    esc_html__( 'Square', 'listingeasy' ) => 'square',
                    esc_html__( 'Original', 'listingeasy' ) => 'original'
                ),
                'std' => 'square',
                "description" => esc_html__("Select image proportions.", 'listingeasy'),
                "dependency" => Array("element" => "view_type","value" => array("type3", "type4")),
            ),
            // Items per line
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Items Per Line', 'listingeasy' ),
                'param_name' => 'items_per_line',
                "value"         => array(
                    esc_html__( '1', 'listingeasy' ) => '1',
                    esc_html__( '2', 'listingeasy' ) => '2',
                    esc_html__( '3', 'listingeasy' ) => '3',
                    esc_html__( '4', 'listingeasy' ) => '4'
                ),
                "description" => esc_html__("Select post items per line.", 'listingeasy'),
                "dependency" => Array("element" => "view_type","value" => array("type3", "type4")),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Items Per Line', 'listingeasy' ),
                'param_name' => 'items_per_line_type2',
                "value"         => array(
                    esc_html__( '1', 'listingeasy' ) => '1',
                    esc_html__( '2', 'listingeasy' ) => '2'
                ),
                "description" => esc_html__("Select post items per line.", 'listingeasy'),
                "dependency" => Array("element" => "view_type","value" => array("type2")),
            ),
            // Spacing beetween items
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Spacing beetween items', 'listingeasy' ),
                'param_name' => 'spacing_beetween_items',
                "value"         => array(
                    esc_html__( '30px', 'listingeasy' )      => '30',
                    esc_html__( '25px', 'listingeasy' )      => '25',
                    esc_html__( '20px', 'listingeasy' )      => '20',
                    esc_html__( '15px', 'listingeasy' )      => '15',
                    esc_html__( '10px', 'listingeasy' )      => '10',
                    esc_html__( '5px', 'listingeasy' )      => '5'
                ),
                "description" => esc_html__("Select spacing beetween items.", 'listingeasy'),
                "dependency" => Array("element" => "view_type","value" => array("type2", "type3", "type4")),
            ),
            // Post meta position
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Post meta position', 'listingeasy' ),
                'param_name' => 'meta_position',
                "value"         => array(
                    esc_html__( 'Before Title', 'listingeasy' ) => 'before_title',
                    esc_html__( 'After Title', 'listingeasy' ) => 'after_title'
                ),
                'std' => 'after_title',
                "description" => esc_html__("Select post-meta position.", 'listingeasy'),
                "dependency" => Array("element" => "view_type","value" => array("type1","type2", "type3", "type4")),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Make first post with image', 'listingeasy' ),
                'param_name' => 'first_post_image',
                'description' => esc_html__( 'If checked, make first post with image.', 'listingeasy' ),
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                "dependency" => Array("element" => "view_type","value" => array("type1")),
                'save_always' => true,
                'std' => 'yes'
            ),
            // Content alignment
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Content alignment', 'listingeasy' ),
                'param_name' => 'content_alignment',
                "value"         => array(
                    esc_html__( 'Left', 'listingeasy' ) => 'left',
                    esc_html__( 'Center', 'listingeasy' ) => 'center',
                    esc_html__( 'Right', 'listingeasy' ) => 'right',
                    esc_html__( 'Justify', 'listingeasy' ) => 'justify'
                ),
                "description" => esc_html__("Select content alignment.", 'listingeasy'),
                "dependency" => Array("element" => "view_type","value" => array("type3", "type4")),
            ),
            // Content Letter Count
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Letter Count', 'listingeasy'),
                'param_name' => 'content_letter_count',
                'value' => '85',
                'description' => esc_html__( 'Enter content letter count.', 'listingeasy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // --- CAROUSEL GROUP --- //
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use blog-posts carousel?', 'listingeasy' ),
                'param_name' => 'use_carousel',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                "group" => esc_html__( "Carousel", 'listingeasy' )
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Autoplay carousel', 'listingeasy' ),
                'param_name' => 'autoplay_carousel',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Autoplay time.', 'listingeasy' ),
                'param_name' => 'auto_play_time',
                'value' => '3000',
                'description' => esc_html__( 'Enter autoplay time in milliseconds.', 'listingeasy' ),
                'dependency' => array(
                    'element' => 'autoplay_carousel',
                    'value' => array("yes"),
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Single slide to scroll', 'listingeasy' ),
                'param_name' => 'scroll_items',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                'std' => 'yes',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Infinite Scroll', 'listingeasy' ),
                'param_name' => 'infinite_scroll',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Hide Pagination control', 'listingeasy' ),
                'param_name' => 'use_pagination_carousel',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Hide prev/next buttons', 'listingeasy' ),
                'param_name' => 'use_prev_next_carousel',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Adaptive Height', 'listingeasy' ),
                'param_name' => 'adaptive_height',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'std' => 'yes',
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Items Per Column', 'listingeasy' ),
                'param_name' => 'items_per_column',
                "value"         => array(
                    esc_html__( '1', 'listingeasy' ) => '1',
                    esc_html__( '2', 'listingeasy' ) => '2',
                    esc_html__( '3', 'listingeasy' ) => '3',
                    esc_html__( '4', 'listingeasy' ) => '4'
                ),
                "description" => esc_html__("Select post items per column.", 'listingeasy'),
                'dependency' => array(
                    'element' => 'use_carousel',
                    "value" => array("yes")
                ),
                "group" => esc_html__( "Carousel", 'listingeasy' ),
            ),
            // --- CUSTOM GROUP --- //
            // Blog Font
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for blog?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_blog',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_blog',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_blog',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
            ),
            // Blog Headings Font
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family for blog headings?', 'listingeasy' ),
                'param_name' => 'use_theme_fonts_blog_headings',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use font family from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'std' => 'yes',
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_blog_headings',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'listingeasy' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'listingeasy' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'use_theme_fonts_blog_headings',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default blog style?', 'listingeasy' ),
                'param_name' => 'use_theme_blog_style',
                'value' => array( esc_html__( 'Yes', 'listingeasy' ) => 'yes' ),
                'description' => esc_html__( 'Use default blog style from the theme.', 'listingeasy' ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'std' => 'yes',
            ),
            // Custom blog style
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Custom Theme Color", 'listingeasy'),
                "param_name" => "custom_theme_color",
                "value" => esc_attr(gt3_option("theme-custom-color")),
                "description" => esc_html__("Select custom theme color.", 'listingeasy'),
                'dependency' => array(
                    'element' => 'use_theme_blog_style',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Custom Headings Color", 'listingeasy'),
                "param_name" => "custom_headings_color",
                "value" => esc_attr($header_font['color']),
                "description" => esc_html__("Select custom headings color.", 'listingeasy'),
                'dependency' => array(
                    'element' => 'use_theme_blog_style',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Custom Content Color", 'listingeasy'),
                "param_name" => "custom_content_color",
                "value" => esc_attr($main_font['color']),
                "description" => esc_html__("Select custom content color.", 'listingeasy'),
                'dependency' => array(
                    'element' => 'use_theme_blog_style',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // Heading Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Heading Font Size', 'listingeasy'),
                'param_name' => 'heading_font_size',
                'value' => '18',
                'description' => esc_html__( 'Enter heading font-size in pixels.', 'listingeasy' ),
                'dependency' => array(
                    'element' => 'use_theme_blog_style',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Heading Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Font Size', 'listingeasy'),
                'param_name' => 'content_font_size',
                'value' => '16',
                'description' => esc_html__( 'Enter content font-size in pixels.', 'listingeasy' ),
                'dependency' => array(
                    'element' => 'use_theme_blog_style',
                    'value_not_equal_to' => 'yes',
                ),
                "group" => esc_html__( "Custom", 'listingeasy' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            vc_map_add_css_animation( true ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra Class", 'listingeasy'),
                "param_name" => "item_el_class",
                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'listingeasy')
            ),
        ),

    ));

    class WPBakeryShortCode_Gt3_Featured_Posts extends WPBakeryShortCode
    {
    }
}