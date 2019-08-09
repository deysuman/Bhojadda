<?php
 
    if ( !class_exists( 'Gt3_wize_core' ) ) {
        return;
    }

    $theme = wp_get_theme(); 
    $opt_name = 'listingeasy';

    $args = array(
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_type'            => 'menu',
        'allow_sub_menu'       => true,
        'menu_title'           => esc_html__('Theme Options', 'listingeasy' ),
        'page_title'           => esc_html__('Theme Options', 'listingeasy' ),
        'google_api_key'       => '',
        'google_update_weekly' => false,
        'async_typography'     => true,
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-admin-generic',
        'admin_bar_priority'   => 50,
        'global_variable'      => '',
        'dev_mode'             => false,
        'update_notice'        => true,
        'customizer'           => false,
        'page_priority'        => null,
        'page_parent'          => 'themes.php',
        'page_permissions'     => 'manage_options',
        'menu_icon'            => 'dashicons-admin-generic',
        'last_tab'             => '',
        'page_icon'            => 'icon-themes',
        'page_slug'            => '',
        'save_defaults'        => true,
        'default_show'         => false,
        'default_mark'         => '',
        'show_import_export'   => true,
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        'output_tag'           => true,
        'database'             => '',
        'use_cdn'              => true,
    );


    Redux::setArgs( $opt_name, $args );

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'listingeasy' ),
        'id'               => 'general',
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields'           => array(
            array(
                'id'       => 'responsive',
                'type'     => 'switch',
                'title'    => esc_html__( 'Responsive', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'page_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Comments', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'listingeasy' ),
                'default'  => false,
            ),
            array(
                'id'       => 'preloader_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Preloader Background', 'listingeasy' ),
                'subtitle' => esc_html__( 'Set Preloader Background', 'listingeasy' ),
                'default'  => '#ffffff',
                'transparent' => false,
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'preloader_item_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Preloader Item Color', 'listingeasy' ),
                'subtitle' => esc_html__( 'Set Plreloader Item Color', 'listingeasy' ),
                'default'  => '#000000',
                'transparent' => false,
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'preloader_item_logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Preloader Logo', 'listingeasy' ),
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'preloader_full',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader Fullscreen', 'listingeasy' ),
                'default'  => true,
                'required' => array( 'preloader', '=', '1' ),
            ),
            array(
                'id'       => 'back_to_top',
                'type'     => 'switch',
                'title'    => esc_html__( 'Back to Top', 'listingeasy' ),
                'default'  => false,
            ),
            array(
                'id'       => 'add_default_typography_sapcing',
                'type'     => 'switch',
                'title'    => esc_html__( 'Add Default Typography Spacings', 'listingeasy' ),
                'default'  => false,
            ),
            array(
                'id'       => 'custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom CSS', 'listingeasy' ),
                'subtitle' => esc_html__( 'Paste your CSS code here.', 'listingeasy' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => ""
            ),
            array(
                'id'       => 'custom_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom JS', 'listingeasy' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'listingeasy' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            ),
            array(
                'id'       => 'header_custom_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom JS', 'listingeasy' ),
                'subtitle' => esc_html__( 'Code to be added inside HEAD tag', 'listingeasy' ),
                'mode'     => 'html',
                'theme'    => 'chrome',
                'default'  => "<script type='text/javascript'>\njQuery(document).ready(function(){\n\n});\n</script>"
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Title', 'listingeasy' ),
        'id'               => 'page_title',
        'icon'             => 'el-icon-screen',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'page_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Page Title', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Blog Post Title', 'listingeasy' ),
                'default'  => false,
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
            array(
                'id'       => 'page_title-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Page Title Settings', 'listingeasy' ),
                'indent'   => true,
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
            array(
                'id'       => 'page_title_breadcrumbs_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Breadcrumbs', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'page_title_vert_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Vertical Align', 'listingeasy' ),
                'options'  => array(
                    'top' => esc_html__( 'Top', 'listingeasy' ),
                    'middle' => esc_html__( 'Middle', 'listingeasy' ),
                    'bottom' => esc_html__( 'Bottom', 'listingeasy' )
                ),
                'default'  => 'middle'
            ),
            array(
                'id'       => 'page_title_horiz_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Page Title Text Align?', 'listingeasy' ),
                'options'  => array(
                    'left' =>  esc_html__( 'Left', 'listingeasy' ),
                    'center' => esc_html__( 'Center', 'listingeasy' ),
                    'right' => esc_html__( 'Right', 'listingeasy' )
                ),
                'default'  => 'center'
            ),
            array(
                'id'       => 'page_title_font_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Page Title Font Color', 'listingeasy' ),
                'default'  => '#ffffff',
                'transparent' => false
            ),
            array(
                'id'       => 'page_title_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Page Title Background Color', 'listingeasy' ),
                'default'  => '#c4c4c4',
                'transparent' => false
            ),
            array(
                'id'       => 'page_title_bg_image',
                'type'     => 'media',
                'title'    => esc_html__( 'Page Title Background Image', 'listingeasy' ),
            ),
            array(
                'id'       => 'page_title_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Page Title Background Image', 'listingeasy' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),
            array(
                'id'             => 'page_title_height',
                'type'           => 'dimensions',
                'units'          => false, 
                'units_extended' => false,
                'title'          => esc_html__( 'Page Title Height', 'listingeasy' ),
                'height'         => true,
                'width'          => false,
                'default'        => array(
				'height'		 => 350,
                )
            ),
            array(
                'id'       => 'page_title_top_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Title Top Border', 'listingeasy' ),
                'default'  => false,
            ),
            array(
                'id'       => 'page_title_top_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Page Title Top Border Color', 'listingeasy' ),
                'default'  => array(
                    'color' => '#eff0ed',
                    'alpha' => '1',
                    'rgba'  => 'rgba(239,240,237,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'page_title_top_border', '=', '1' ),
                ), 
            ),
            array(
                'id'       => 'page_title_bottom_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Title Bottom Border', 'listingeasy' ),
                'default'  => false,
            ),
            array(
                'id'       => 'page_title_bottom_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Page Title Bottom Border Color', 'listingeasy' ),
                'default'  => array(
                    'color' => '#eff0ed',
                    'alpha' => '1',
                    'rgba'  => 'rgba(239,240,237,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'page_title_bottom_border', '=', '1' ),
                ), 
            ),
            array(
                'id'       => 'page_title_bottom_margin',
                'type'     => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                'all'      => false,
                'bottom'   => true,
                'top'   => false,
                'left'   => false,
                'right'   => false,
                'title'    => esc_html__( 'Page Title Bottom Margin', 'listingeasy' ),
                'default'  => array(
                    'margin-bottom' => '60px',                
                    )
            ),
            array(
                'id'     => 'page_title-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
            
        )
    ) );

    // -> START Footer Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Footer', 'listingeasy' ),
        'id'               => 'footer-option',
        'customizer_width' => '400px',
        'icon' => 'el-icon-screen',
        'fields'           => array(
            array(
                'id'       => 'footer_full_width',
                'type'     => 'switch',
                'title'    => esc_html__( 'Full Width Footer', 'listingeasy' ),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Background Color', 'listingeasy' ),
                'default'  => '#1f1f1f',
                'transparent' => false
            ),
            array(
                'id'       => 'footer_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Text color', 'listingeasy' ),
                'default'  => '#9fa6ae',
                'transparent' => false
            ),
            array(
                'id'       => 'footer_heading_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Footer Heading color', 'listingeasy' ),
                'default'  => '#ffffff',
                'transparent' => false
            ),
            array(
                'id'       => 'footer_bg_image',
                'type'     => 'background',
                'background-color' => false,
                'preview_media' => true,
                'preview' => false,
                'title'    => esc_html__( 'Footer Background Image', 'listingeasy' ),
                'default'  => array(
                    'background-repeat' => 'repeat',
                    'background-size' => 'cover',
                    'background-attachment' => 'scroll',
                    'background-position' => 'center center',
                    'background-color' => '#1e73be',
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Content', 'listingeasy' ),
        'id'               => 'footer_content',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'footer_switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Footer', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'footer-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Footer Settings', 'listingeasy' ),
                'indent'   => true,
                'required' => array( 'footer_switch', '=', '1' ),
            ),
            array(
                'id'       => 'footer_column',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Column', 'listingeasy' ),
                'options'  => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4'
                ),
                'default'  => '4'
            ),
            array(
                'id'       => 'footer_column2',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Column Layout', 'listingeasy' ),
                'options'  => array(
                    '6-6' => '50% / 50%',
                    '3-9' => '25% / 75%',
                    '9-3' => '25% / 75%',
                    '4-8' => '33% / 66%',
                    '8-3' => '66% / 33%',
                ),
                'default'  => '6-6',
                'required' => array( 'footer_column', '=', '2' ),
            ),
            array(
                'id'       => 'footer_column3',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Column Layout', 'listingeasy' ),
                'options'  => array(
                    '4-4-4' => '33% / 33% / 33%',
                    '3-3-6' => '25% / 25% / 50%',
                    '3-6-3' => '25% / 50% / 25%',
                    '6-3-3' => '50% / 25% / 25%',
                ),
                'default'  => '4-4-4',
                'required' => array( 'footer_column', '=', '3' ),
            ),
            array(
                'id'       => 'footer_column5',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Column Layout', 'listingeasy' ),
                'options'  => array(
                    '2-3-2-2-3' => '16% / 25% / 16% / 16% / 25%',
                    '3-2-2-2-3' => '25% / 16% / 16% / 16% / 25%',
                    '3-2-3-2-2' => '25% / 16% / 26% / 16% / 16%',
                    '3-2-3-3-2' => '25% / 16% / 16% / 25% / 16%',
                ),
                'default'  => '2-3-2-2-3',
                'required' => array( 'footer_column', '=', '5' ),
            ),
            array(
                'id'       => 'footer_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Title Text Align', 'listingeasy' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'listingeasy' ),
                    'center' => esc_html__( 'Center', 'listingeasy' ),
                    'right' => esc_html__( 'Right', 'listingeasy' ),
                ),
                'default'  => 'left'
            ),
            array(
                'id'       => 'footer_spacing',
                'type'     => 'spacing',
                'output'   => array( '.gt3-footer' ),
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                'all'      => false,
                'title'    => esc_html__( 'Footer Padding (px)', 'listingeasy' ),
                'default'  => array(
                    'padding-top'    => '60px',
                    'padding-right'  => '0px',
                    'padding-bottom' => '30px',
                    'padding-left'   => '0px'
                )
            ),
            array(
                'id'     => 'footer-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'footer_switch', '=', '1' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Copyright', 'listingeasy' ),
        'id'               => 'copyright',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'copyright_switch',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Copyright', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'copyright-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Copyright Settings', 'listingeasy' ),
                'indent'   => true,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_column',
                'type'     => 'select',
                'title'    => esc_html__( 'Copyright Column', 'listingeasy' ),
                'options'  => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'copyright_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Copyright Column 1 Text Align', 'listingeasy' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'listingeasy' ),
                    'center' => esc_html__( 'Center', 'listingeasy' ),
                    'right' => esc_html__( 'Right', 'listingeasy' ),
                ),
                'default'  => 'left',
            ),
            array(
                'id'       => 'copyright_align_2',
                'type'     => 'select',
                'title'    => esc_html__( 'Copyright Column 2 Text Align', 'listingeasy' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'listingeasy' ),
                    'center' => esc_html__( 'Center', 'listingeasy' ),
                    'right' => esc_html__( 'Right', 'listingeasy' ),
                ),
                'default'  => 'center',
                'required' => array( 'copyright_column', '!=', '1' ),
            ),
            array(
                'id'       => 'copyright_align_3',
                'type'     => 'select',
                'title'    => esc_html__( 'Copyright Column 3 Text Align', 'listingeasy' ),
                'options'  => array(
                    'left' => esc_html__( 'Left', 'listingeasy' ),
                    'center' => esc_html__( 'Center', 'listingeasy' ),
                    'right' => esc_html__( 'Right', 'listingeasy' ),
                ),
                'default'  => 'right',
                'required' => array( 'copyright_column', '=', '3' ),
            ),
            array(
                'id'       => 'copyright_spacing',
                'type'     => 'spacing',
                'mode'     => 'padding',
                'all'      => false,
                'title'    => esc_html__( 'Copyright Padding (px)', 'listingeasy' ),
                'default'  => array(
                    'padding-top'    => '14px',
                    'padding-right'  => '0px',
                    'padding-bottom' => '14px',
                    'padding-left'   => '0px'
                ),
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Background Color', 'listingeasy' ),
                'default'  => '#1f1f1f',
                'transparent' => true,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Copyright Text Color', 'listingeasy' ),
                'default'  => '#9fa6ae',
                'transparent' => false,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_top_border',
                'type'     => 'switch',
                'title'    => esc_html__( 'Set Copyright Top Border', 'listingeasy' ),
                'default'  => true,
                'required' => array( 'copyright_switch', '=', '1' ),
            ),
            array(
                'id'       => 'copyright_top_border_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Copyright Border Color', 'listingeasy' ),
                'default'  => array(
                    'color' => '#323232',
                    'alpha' => '1',
                    'rgba'  => 'rgba(50,50,50,1)'
                ),
                'mode'     => 'background',
                'required' => array(
                    array( 'copyright_top_border', '=', '1' ),
                    array( 'copyright_switch', '=', '1' )
                ), 
            ),
            array(
                'id'     => 'copyright-end',
                'type'   => 'section',
                'indent' => false, 
                'required' => array( 'copyright_switch', '=', '1' ),
            ),

        )
    ));



    // -> START Blog Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Blog', 'listingeasy' ),
        'id'               => 'blog-option',
        'customizer_width' => '400px',
        'icon' => 'el-icon-th-list',
        'fields'           => array(
            array(
                'id'       => 'related_posts',
                'type'     => 'switch',
                'title'    => esc_html__( 'Related Posts', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'author_box',
                'type'     => 'switch',
                'title'    => esc_html__( 'Author Box on Single Post', 'listingeasy' ),
                'default'  => false,
            ),
            array(
                'id'       => 'post_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Comments', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'post_pingbacks',
                'type'     => 'switch',
                'title'    => esc_html__( 'Trackbacks and Pingbacks', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_post_likes',
                'type'     => 'switch',
                'title'    => esc_html__( 'Likes on Single Post', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_post_share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Share on Single Post', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'blog_post_listing_content',
                'type'     => 'switch',
                'title'    => esc_html__( 'Cut Off Text in Blog Listing', 'listingeasy' ),
                'default'  => false,
            ),
            array(
                'id'       => 'blog_post_listing_icon',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show post-format label in Blog Listing?', 'listingeasy' ),
                'default'  => false,
            ),
        )
    ) );

    // -> START Layout Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Sidebars', 'listingeasy' ),
        'id'               => 'layout_options',
        'customizer_width' => '400px',
        'icon' => 'el el-website',
        'fields'           => array(
            array(
                'id'       => 'page_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Page Sidebar Layout', 'listingeasy' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'page_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Page Sidebar', 'listingeasy' ),
                'data'     => 'sidebars',
                'required' => array( 'page_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'blog_single_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Single Sidebar Layout', 'listingeasy' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'blog_single_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Single Sidebar', 'listingeasy' ),
                'data'     => 'sidebars',
                'required' => array( 'blog_single_sidebar_layout', '!=', 'none' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Sidebar Generator', 'listingeasy' ),
        'id'               => 'sidebars_generator_section',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'=>'sidebars', 
                'type' => 'multi_text',
                'validate' => 'no_html',
                'add_text' => esc_html__('Add Sidebar', 'listingeasy' ),
                'title' => esc_html__('Sidebar Generator', 'listingeasy' ),
                'default' => array('Main Sidebar'),
            ),
        )
    ) );   


    // -> START Styling Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Color Options', 'listingeasy' ),
        'id'               => 'color_options',
        'customizer_width' => '400px',
        'icon' => 'el-icon-brush'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Colors', 'listingeasy' ),
        'id'               => 'color_options_color',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'        => 'theme-custom-color',
                'type'      => 'color',
                'title'     => esc_html__('Theme Color 1', 'listingeasy' ),
                'transparent' => false,
                'default'   => '#28b8dc',
                'validate'  => 'color',
            ),
            array(
                'id'        => 'theme-custom-color2',
                'type'      => 'color',
                'title'     => esc_html__('Theme Color 2', 'listingeasy' ),
                'transparent' => false,
                'default'   => '#fd4851',
                'validate'  => 'color',
            ),
            array(
                'id'        => 'theme-custom-color3',
                'type'      => 'color',
                'title'     => esc_html__('Theme Color 3', 'listingeasy' ),
                'transparent' => false,
                'default'   => '#fbaf2a',
                'validate'  => 'color',
            ),
            array(
                'id'        => 'body-background-color',
                'type'      => 'color',
                'title'     => esc_html__('Body Background Color', 'listingeasy' ),
                'transparent' => false,
                'default'   => '#f9f9f9',
                'validate'  => 'color',
                ),
        )
    ));



    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Typography', 'listingeasy' ),
        'id'               => 'typography_options',
        'customizer_width' => '400px',
        'icon' => 'el-icon-font',
        'fields'           => array(
            array(
                'id'          => 'menu-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Menu Font', 'listingeasy' ),
                'google' => true,
                'font-style'    => true,
                'color' => false,
                'line-height' => true,
                'font-size' => true,
                'font-backup' => false,
                'text-align' => false,
                'all_styles'  => true,
                'default'     => array(
                    'font-style'  => '400',
                    'font-family' => 'Work Sans',
                    'google'      => true,
                    'font-size'   => '16px',
                    'line-height' => '24px'
                ),
            ),

            array(
                'id' => 'main-font',
                'type' => 'typography',
                'title' => esc_html__('Main Font', 'listingeasy' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => true,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'default' => array(
                    'font-size' => '16px',
                    'line-height' => '24px',
                    'color' => '#8995a2',
                    'google' => true,
                    'font-family' => 'Work Sans',
                    'font-weight' => '400',
                ),
            ),
            array(
                'id' => 'header-font',
                'type' => 'typography',
                'title' => esc_html__('Headers Font', 'listingeasy' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => false,
                'line-height' => false,
                'color' => true,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'color' => '#334e6f',
                    'google' => true,
                    'font-family' => 'Work Sans',
                    'font-weight' => '500',
                ),
            ),
            array(
                'id' => 'h1-font',
                'type' => 'typography',
                'title' => esc_html__('H1', 'listingeasy' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '48px',
                    'line-height' => '58px',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'h2-font',
                'type' => 'typography',
                'title' => esc_html__('H2', 'listingeasy' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '36px',
                    'line-height' => '46px',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'h3-font',
                'type' => 'typography',
                'title' => esc_html__('H3', 'listingeasy' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '30px',
                    'line-height' => '40px',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'h4-font',
                'type' => 'typography',
                'title' => esc_html__('H4', 'listingeasy' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '20px',
                    'line-height' => '30px',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'h5-font',
                'type' => 'typography',
                'title' => esc_html__('H5', 'listingeasy' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => false,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '18px',
                    'line-height' => '28px',
                    'google' => true
                ),
            ),
            array(
                'id' => 'h6-font',
                'type' => 'typography',
                'title' => esc_html__('H6', 'listingeasy' ),
                'google' => true,
                'font-backup' => false,
                'font-size' => true,
                'line-height' => true,
                'color' => false,
                'word-spacing' => false,
                'letter-spacing' => true,
                'text-align' => false,
                'text-transform' => false,
                'default' => array(
                    'font-size' => '16px',
                    'line-height' => '26px',
                    'google' => true
                ),
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Contact Widget', 'listingeasy' ),
        'id'               => 'contact_widget_options',
        'customizer_width' => '400px',
        'icon' => 'el el-envelope',
        'fields'           => array(
            array(
                'title'    => esc_html__( 'Display on All Pages', 'listingeasy' ),
                'id'       => 'show_contact_widget',
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id' => 'title_contact_widget',
                'type' => 'text',
                'title' => esc_html__('Label Text', 'listingeasy' ),
            ),
            array(
                'id'       => 'label_contact_icon',
                'type'     => 'media',
                'title'    => esc_html__( 'Label\'s Image', 'listingeasy' ),
            ),
            array(
                'id'       => 'label_contact_widget_color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Label Color', 'listingeasy' ),
                'subtitle' => esc_html__( 'Set label\'s color of Contact Widget', 'listingeasy' ),
                'default'  => array(
                    'color' => '#2d628f',
                    'alpha' => '1',
                    'rgba'  => 'rgba(45,98,143,1)'
                ),
                'mode'     => 'background',
            ),
            array(
                'id' => 'shortcode_contact_widget',
                'type' => 'text',
                'title' => esc_html__('Contact Form 7 Shortcode', 'listingeasy' ),
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */

    // -> START Layout Options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Shop', 'listingeasy' ),
        'id'               => 'woocommerce_layout_options',
        'customizer_width' => '400px',
        'icon' => 'el el-shopping-cart',
        'fields'           => array(
            
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Products Page', 'listingeasy' ),
        'id'               => 'products_page_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'products_layout',
                'type'     => 'select',
                'title'    => esc_html__( 'Products Layout', 'listingeasy' ),
                'options'  => array(
                    'container' => esc_html__( 'Container', 'listingeasy' ),
                    'full_width' => esc_html__( 'Full Width', 'listingeasy' ),
                    'masonry' => esc_html__( 'Full Width Massonry', 'listingeasy' ),
                ),
                'default'  => 'container'
            ),
            array(
                'id'       => 'products_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Products Page Sidebar Layout', 'listingeasy' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'none'
            ),
            array(
                'id'       => 'products_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Products Page Sidebar', 'listingeasy' ),
                'data'     => 'sidebars',
                'required' => array( 'products_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id' => 'products_per_page',
                'type' => 'text',
                'title' => esc_html__('Products Per Page', 'listingeasy' ),
                'default' => '9'
            ),
            array(
                'id'       => 'woocommerce_def_columns',
                'type'     => 'select',
                'title'    => esc_html__( 'Default Number of Columns', 'listingeasy' ),
                'desc'  => esc_html__( 'Select the number of columns in products page.', 'listingeasy' ),
                'options'  => array(
                    '2' => esc_html__( '2', 'listingeasy' ),
                    '3' => esc_html__( '3', 'listingeasy' ),
                    '4' => esc_html__( '4', 'listingeasy' ),
                ),
                'default'  => '4'
            ),
        )
    ) ); 
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Single Product Page', 'listingeasy' ),
        'id'               => 'product_page_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'product_layout',
                'type'     => 'select',
                'title'    => esc_html__( 'Thumbnails Layout', 'listingeasy' ),
                'options'  => array(
                    'horizontal' => esc_html__( 'Thumbnails Bottom', 'listingeasy' ),
                    'vertical' => esc_html__( 'Thumbnails Left', 'listingeasy' ),
                    'thumb_grid' => esc_html__( 'Thumbnails Grid', 'listingeasy' ),
                ),
                'default'  => 'thumb_bottom'
            ),
            array(
                'id'       => 'product_container',
                'type'     => 'select',
                'title'    => esc_html__( 'Product Page Layout', 'listingeasy' ),
                'options'  => array(
                    'container' => esc_html__( 'Container', 'listingeasy' ),
                    'full_width' => esc_html__( 'Full Width', 'listingeasy' ),
                ),
                'default'  => 'container'
            ),
            array(
                'id'       => 'sticky_thumb',
                'type'     => 'switch',
                'title'    => esc_html__( 'Sticky Thumbnails', 'listingeasy' ),
                'default'  => true,
            ),
            array(
                'id'       => 'product_sidebar_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Single Product Page Sidebar Layout', 'listingeasy' ),
                'options'  => array(
                    'none' => array(
                        'alt' => 'None',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                    ),
                    'left' => array(
                        'alt' => 'Left',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                    ),
                    'right' => array(
                        'alt' => 'Right',
                        'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'none' 
            ),
            array(
                'id'       => 'product_sidebar_def',
                'type'     => 'select',
                'title'    => esc_html__( 'Single Product Page Sidebar', 'listingeasy' ),
                'data'     => 'sidebars',
                'required' => array( 'product_sidebar_layout', '!=', 'none' ),
            ),
            array(
                'id'       => 'shop_title_conditional',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Single Product Title Area', 'listingeasy' ),
                'default'  => false,
                'required' => array( 'page_title_conditional', '=', '1' ),
            ),
        )
    ) );

    if ( class_exists( 'WP_Job_Manager' ) ) {
        Redux::setSection( $opt_name, array(
            'title'            => esc_html__('Listing', 'listingeasy' ),
            'id'               => 'gt3_listing',
            'customizer_width' => '400px',
            'icon'             => 'el el-map-marker',
            'fields'           => array(
                array(
                    'id'       => 'formatted_address',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Formatted Address', 'listingeasy' ),
                    'default'  => false,
                ),
                array(
                    'id'       => 'geolocation_formats',
                    'type'     => 'sortable',
                    'title'    => esc_html__('Format for the address\' country', 'listingeasy'),
                    'mode'     => 'checkbox',
                    'options'  => array(
                        'geolocation_street'     =>  esc_html__( 'Street', 'listingeasy' ),
                        'geolocation_street_number' => esc_html__( 'Street Number', 'listingeasy' ),
                        'geolocation_city'     => esc_html__( 'City', 'listingeasy' ),
                        'geolocation_postcode' => esc_html__( 'Postcode', 'listingeasy' ),
                        'geolocation_country_short' => esc_html__( 'Country', 'listingeasy' ),
                    ),
                    // For checkbox mode
                    'default' => array(
                        'geolocation_street'     =>  true,
                        'geolocation_street_number' => true,
                        'geolocation_city'     => true,
                        'geolocation_postcode' => true,
                        'geolocation_country_short' => true,
                    ),
                    'required' => array( 'formatted_address', '=', '1' ),
                ),
                array(
                    'title'    => esc_html__( 'Tags', 'listingeasy' ),
                    'id'       => 'show_listing_tags_area',
                    'type'     => 'switch',
                    'default'  => true,
                    'on' => esc_html__( 'Show', 'listingeasy' ),
                    'off' => esc_html__( 'Hide', 'listingeasy' ),
                    'subtitle' => esc_html__( 'Display on Post Single Listing', 'listingeasy' ),
                ),
                array(
                    'id'       => 'dashboard_page_title_font_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Dashboard Title Font Color', 'listingeasy' ),
                    'default'  => '#ffffff',
                    'transparent' => false
                ),
                array(
                    'id'       => 'dashboard_page_title_bg_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Dashboard Title Background Color', 'listingeasy' ),
                    'default'  => '#8c8c8c',
                    'transparent' => false
                ),
                array(
                    'id'       => 'dashboard_page_title_bg_image',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Dashboard Title Background Image', 'listingeasy' ),
                ),
                array(
                    'id'       => 'dashboard_page_title_bg_image',
                    'type'     => 'background',
                    'background-color' => false,
                    'preview_media' => true,
                    'preview' => false,
                    'title'    => esc_html__( 'Dashboard Title Background Image', 'listingeasy' ),
                    'default'  => array(
                        'background-repeat' => 'repeat',
                        'background-size' => 'cover',
                        'background-attachment' => 'scroll',
                        'background-position' => 'center center',
                        'background-color' => '#1e73be',
                    )
                ),
                array(
                    'title'    => esc_html__( 'Woocommerce Account Menu', 'listingeasy' ),
                    'id'       => 'show_woo_account_menu',
                    'type'     => 'switch',
                    'default'  => true,
                    'on' => esc_html__( 'Show', 'listingeasy' ),
                    'off' => esc_html__( 'Hide', 'listingeasy' ),
                ),
                array(
                    'id'       => 'display_listings_rating',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Display Listings Rating', 'listingeasy' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'display_listings_author',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Display Listings Author', 'listingeasy' ),
                    'default'  => false,
                ),
                array(
                    'id'       => 'listings_author_type',
                    'type'     => 'button_set',
                    'title'    => esc_html__( 'Select Listing Author Image', 'listingeasy' ),
                    'options'  => array(
                        'gravatar' => esc_html__( 'From user profile (Gravatar)', 'listingeasy' ),
                        'custom' => esc_html__( 'Custom', 'listingeasy' )
                    ),
                    'default'  => 'custom',
                    'required' => array( 'display_listings_author', '=', '1' ),
                ),
                array(
                    'id'       => 'display_job_filter_types',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Display Job Filter Types', 'listingeasy' ),
                    'default'  => false,
                ),
            )
        ) );

        Redux::setSection( $opt_name, array(
            'title'            => esc_html__( 'Map Options', 'listingeasy' ),
            'id'               => 'listing_map_options',
            'subsection'       => true,
            'customizer_width' => '450px',
            'fields'           => array(
                array(
                    'id'       => 'map_skin_style',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Choose Map Skin', 'listingeasy' ),
                    'options'  => array(
                        'default_skin_map' => array(
                            'alt' => 'Default',
                            'img' => get_template_directory_uri() . '/core/integrations/img/default.png'
                        ),
                        'light_skin_map' => array(
                            'alt' => 'Light',
                            'img' => get_template_directory_uri() . '/core/integrations/img/light.png'
                        ),
                        'grayscale_skin_map' => array(
                            'alt' => 'Grayscale',
                            'img' => get_template_directory_uri() . '/core/integrations/img/grayscale.png'
                        ),
                        'dark_skin_map' => array(
                            'alt' => 'Dark',
                            'img' => get_template_directory_uri() . '/core/integrations/img/dark.png'
                        ),
                        'bluewater_skin_map' => array(
                            'alt' => 'Blue water',
                            'img' => get_template_directory_uri() . '/core/integrations/img/blue_water.png'
                        ),
                        'mutedblue_skin_map' => array(
                            'alt' => 'Muted Blue',
                            'img' => get_template_directory_uri() . '/core/integrations/img/muted_blue.png'
                        ),
                    ),
                    'default'  => 'default_skin_map',
                ),
                array(
                    'id'       => 'default_map_coordinates',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Change default map coordinates', 'listingeasy' ),
                    'default'  => false,
                ),
                array(
                    'id' => 'default_map_latitude',
                    'type' => 'text',
                    'title' => esc_html__('Latitude', 'listingeasy' ),
                    'default' => '51.4825766',
                    'required' => array( 'default_map_coordinates', '=', '1' ),
                ),
                array(
                    'id' => 'default_map_longitude',
                    'type' => 'text',
                    'title' => esc_html__('Longitude', 'listingeasy' ),
                    'default' => '0.0098476',
                    'required' => array( 'default_map_coordinates', '=', '1' ),
                ),
                array(
                    'id'       => 'maxzoom_map_mobile',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Default Mobile MaxZoom Map', 'listingeasy' ),
                    'desc'  => esc_html__( 'Select the number of mobile maxzoom map.', 'listingeasy' ),
                    'options'  => array(
                        '10' => esc_html__( '10', 'listingeasy' ),
                        '11' => esc_html__( '11', 'listingeasy' ),
                        '12' => esc_html__( '12', 'listingeasy' ),
                        '13' => esc_html__( '13', 'listingeasy' ),
                        '14' => esc_html__( '14', 'listingeasy' ),
                        '15' => esc_html__( '15', 'listingeasy' ),
                        '16' => esc_html__( '16', 'listingeasy' ),
                        '17' => esc_html__( '17', 'listingeasy' ),
                        '18' => esc_html__( '18', 'listingeasy' ),
                    ),
                    'default'  => '18'
                ),
            ),
        ) );

        Redux::setSection( $opt_name, array(
            'title'            => esc_html__( 'Listing Email Settings', 'listingeasy' ),
            'id'               => 'listing_email_options',
            'subsection'       => true,
            'customizer_width' => '450px',
            'fields'           => array(
                array(
                    'id'       => 'listing_email_sending',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Email listing Owner when their listings are finally approved', 'listingeasy' ),
                    'default'  => false,
                ),
                array(
                    'id' => 'listing_approved_email_subject',
                    'type' => 'text',
                    'title' => esc_html__('Email subject on listing approve', 'listingeasy' ),
                    'default' => 'Your listing is online',
                    'required' => array( 'listing_email_sending', '=', '1' ),
                ),
                array(
                    'id'      => 'listing_approved_email',
                    'type'    => 'textarea',
                    'title'   => __( 'Email text on listing approve', 'wizeedu' ),
                    'subtitle' => __('In the following fields, you can use these mail-tags:', 'listingeasy').'</br><strong> [listing-author]  [listing-title]  [listing-link] </strong>',
                    'default' => 'Hi [listing-author],
Your listing, "[listing-title]" has just been approved at [listing-link]. Well done!',
                    'allowed_html' => array(),
                    'required' => array( 'listing_email_sending', '=', '1' ),
                ),

                array(
                    'id'       => 'listing_email_sending_expired',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Send an email to the listing owner when a listing expires', 'listingeasy' ),
                    'default'  => false,
                ),
                array(
                    'id' => 'listing_expires_email_subject',
                    'type' => 'text',
                    'title' => esc_html__('Email subject on listing expires', 'listingeasy' ),
                    'default' => 'Your listing has expired',
                    'required' => array( 'listing_email_sending_expired', '=', '1' ),
                ),
                array(
                    'id'      => 'listing_expires_email',
                    'type'    => 'textarea',
                    'title'   => __( 'Email text on listing expires', 'wizeedu' ),
                    'subtitle' => __('In the following fields, you can use these mail-tags:', 'listingeasy').'</br><strong> [listing-author]  [listing-title]  [listing-link] </strong>',
                    'default' => 'Hi [listing-author],
Your listing, "[listing-title]" has now expired: [listing-link].',
                    'allowed_html' => array(),
                    'required' => array( 'listing_email_sending_expired', '=', '1' ),
                ),
            ),
        ) );

        Redux::setSection( $opt_name, array(
            'title'            => esc_html__('Listing Sidebar', 'listingeasy' ),
            'id'               => 'listing_layout_options',
            'subsection'       => true,
            'customizer_width' => '450px',
            'fields'           => array(
                array(
                    'id'       => 'listing_single_sidebar_layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Single Listing Sidebar Layout', 'listingeasy' ),
                    'options'  => array(
                        'none' => array(
                            'alt' => 'None',
                            'img' => esc_url(ReduxFramework::$_url) . 'assets/img/1col.png'
                        ),
                        'left' => array(
                            'alt' => 'Left',
                            'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cl.png'
                        ),
                        'right' => array(
                            'alt' => 'Right',
                            'img' => esc_url(ReduxFramework::$_url) . 'assets/img/2cr.png'
                        )
                    ),
                    'default'  => 'none'
                ),
                array(
                    'id'       => 'listing_single_sidebar_def',
                    'type'     => 'select',
                    'title'    => esc_html__( 'Listing Single Sidebar', 'listingeasy' ),
                    'data'     => 'sidebars',
                    'required' => array( 'listing_single_sidebar_layout', '!=', 'none' ),
                ),
            )
        ) );

    }

    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'remove_demo' );


    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

