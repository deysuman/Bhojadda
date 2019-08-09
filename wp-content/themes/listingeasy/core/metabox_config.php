<?php 


if (!class_exists( 'RWMB_Loader' )) {
	return;
}



add_filter( 'rwmb_meta_boxes', 'gt3_pteam_meta_boxes' );
function gt3_pteam_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => esc_html__( 'Team Options', 'listingeasy' ),
        'post_types' => array( 'team' ),
        'context' => 'advanced',
        'fields'     => array(	        
        	array(
	            'name' => esc_html__( 'Member Job', 'listingeasy' ),
	            'id'   => 'position_member',
	            'type' => 'text',
	            'class' => 'field-inputs'
	        ),

	        array(
	            'name' => esc_html__( 'Short Description', 'listingeasy' ),
	            'id'   => 'member_short_desc',
	            'type' => 'textarea'
	        ),
			array(
				'name' => esc_html__( 'Fields', 'listingeasy' ),
	            'id'   => 'social_url',
	            'type' => 'social',
	            'clone' => true,
	            'sort_clone'     => true,
	            'desc' => esc_html__( 'Description', 'listingeasy' ),
	            'options' => array(
					'name'    => array(
						'name' => esc_html__( 'Title', 'listingeasy' ),
						'type_input' => "text"
						),
					'description' => array(
						'name' => esc_html__( 'Text', 'listingeasy' ),
						'type_input' => "text"
						),
					'address' => array(
						'name' => esc_html__( 'Url', 'listingeasy' ),
						'type_input' => "text"
						),
				),
	        ),
	        array(
				'name'     => esc_html__( 'Icons', 'listingeasy' ),
				'id'          => "icon_selection",
				'type'        => 'select_icon',
				'options'     => function_exists('gt3_get_all_icon') ? gt3_get_all_icon() : '',
				'clone' => true,
				'sort_clone'     => true,
				'placeholder' => esc_html__( 'Select an icon', 'listingeasy' ),
				'multiple'    => false,
				'std'         => 'default',
			),
        ),
    );
    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_blog_meta_boxes' );
function gt3_blog_meta_boxes( $meta_boxes ) {
	$meta_boxes[] = array(
		'title'      => esc_html__( 'Post Format Layout', 'listingeasy' ),
		'post_types' => array( 'post' ),
		'context' => 'advanced',
		'fields'     => array(
			// Standard Post Format
			array(
				'name'             => esc_html__( 'You can use only featured image for this post-format', 'listingeasy' ),
				'id'               => "post_format_standard",
				'type'             => 'static-text',
				'attributes' => array(
					'data-dependency' => array(
						array(
							array('formatdiv','=','0')
						),
					),
				),
			),
			// Gallery Post Format
			array(
				'name'             => esc_html__( 'Gallery images', 'listingeasy' ),
				'id'               => "post_format_gallery_images",
				'type'             => 'image_advanced',
				'max_file_uploads' => '',
				'attributes' => array(
					'data-dependency' => array(
						array(
							array('formatdiv','=','gallery')
						),
					),
				),
			),
			// Video Post Format
			array(
				'name' => esc_html__( 'oEmbed', 'listingeasy' ),
				'id'   => "post_format_video_oEmbed",
				'desc' => esc_html__( 'enter URL', 'listingeasy' ),
				'type' => 'oembed',
				'attributes' => array(
					'data-dependency' => array(
						array(
							array('formatdiv','=','video')
						),
						array(
							array('post_format_video_select','=','oEmbed')
						)
					),
				),
			),
			// Audio Post Format
			array(
				'name' => esc_html__( 'oEmbed', 'listingeasy' ),
				'id'   => "post_format_audio_oEmbed",
				'desc' => esc_html__( 'enter URL', 'listingeasy' ),
				'type' => 'oembed',
				'attributes' => array(
					'data-dependency' => array(
						array(
							array('formatdiv','=','audio')
						),
						array(
							array('post_format_audio_select','=','oEmbed')
						)
					),
				),
			),
			// Quote Post Format
			array(
				'name'             => esc_html__( 'Quote Author', 'listingeasy' ),
				'id'               => "post_format_qoute_author",
				'type'             => 'text',
				'attributes' => array(
					'data-dependency' => array(
						array(
							array('formatdiv','=','quote')
						),
					),
				),
			),
			array(
				'name'             => esc_html__( 'Author Image', 'listingeasy' ),
				'id'               => "post_format_qoute_author_image",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'attributes' => array(
					'data-dependency' => array(
						array(
							array('formatdiv','=','quote')
						),
					),
				),
			),
			array(
				'name'             => esc_html__( 'Quote Content', 'listingeasy' ),
				'id'               => "post_format_qoute_text",
				'type'             => 'textarea',
				'attributes' => array(
					'data-dependency' => array(
						array(
							array('formatdiv','=','quote')
						),
					),
				),
			),
			// Link Post Format
			array(
				'name'             => esc_html__( 'Link URL', 'listingeasy' ),
				'id'               => "post_format_link",
				'type'             => 'url',
				'attributes' => array(
					'data-dependency' => array(
						array(
							array('formatdiv','=','link')
						),
					),
				),
			),
			array(
				'name'             => esc_html__( 'Link Text', 'listingeasy' ),
				'id'               => "post_format_link_text",
				'type'             => 'text',
				'attributes' => array(
					'data-dependency' => array(
						array(
							array('formatdiv','=','link')
						),
					),
				),
			),


		)
	);
	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_job_listing_meta_boxes' );
function gt3_job_listing_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'title'      => esc_html__( 'Listings Settings', 'listingeasy' ),
        'post_types' => array('job_listing'),
        'context' => 'normal',
        'fields'     => array(
        	array(
                'name'     => esc_html__( 'Select Header Background Image (Single Listing)', 'listingeasy' ),
                'id'          => "mb_job_listing_heading_bg",
                'type'        => 'image_advanced',
                'size'        => 'full',
                'max_file_uploads' => 1,
            ),
        	array(
				'name'     => esc_html__( 'Select Images', 'listingeasy' ),
				'id'          => "mb_job_listing_images",
				'type'        => 'image_advanced'
			),
	        array(
				'name'     => esc_html__( 'Social Icons', 'listingeasy' ),
				'id'          => "listing_social_icon",
				'type'        => 'select_icon',
				'options'     => function_exists('gt3_get_all_icon') ? gt3_get_all_icon() : '',
				'clone' => true,
				'sort_clone'     => true,
				'placeholder' => esc_html__( 'Select an icon', 'listingeasy' ),
				'multiple'    => false,
				'std'         => 'default',
			),
			array(
				'name'     => esc_html__( 'Tags', 'listingeasy' ),
				'id'          => "mb_display_tags_area",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'Default', 'listingeasy' ),
					'on' => esc_html__( 'Show', 'listingeasy' ),
					'off' => esc_html__( 'Hide', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
				'desc' => esc_html__( 'Display on Post Single Listing', 'listingeasy' ),
			),
			array(
				'name'     => esc_html__( 'Select Listing Author Image', 'listingeasy' ),
				'id'          => "mb_job_listing_card_avatar",
				'type'        => 'image_advanced',
				'size'        => 'full',
				'max_file_uploads' => 1,
			),
        )
    );	
    return $meta_boxes;
}

if (in_array( 'wp-job-manager-wc-paid-listings/wp-job-manager-wc-paid-listings.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
	add_filter( 'rwmb_meta_boxes', 'gt3_product_package_meta_boxes' );
}
function gt3_product_package_meta_boxes( $meta_boxes ) {
	$meta_boxes[] = array(
		'title'      => esc_html__( 'Product Package Settings', 'listingeasy' ),
		'post_types' => array('product'),
		'context' => 'normal',
		'fields'     => array(
			array(
				'name' => esc_html__( 'Package Background Color', 'listingeasy' ),
				'id'   => "mb_job_package_background",
				'type' => 'color',
				'std'         => esc_attr(gt3_option("theme-custom-color")),
				'js_options' => array(
					'defaultColor' => esc_attr(gt3_option("theme-custom-color")),
				),
			),
			array(
				'name'     => esc_html__( 'Select Package Icon', 'listingeasy' ),
				'id'          => "mb_job_package_icon",
				'type'        => 'image_advanced',
				'size'		=> 'full',
				'max_file_uploads' => 1,
			),
		)
	);
	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_page_layout_meta_boxes' );
function gt3_page_layout_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'title'      => esc_html__( 'Page Layout', 'listingeasy' ),
        'post_types' => array( 'page', 'post', 'team', 'practice', 'product', 'job_listing' ),
        'context' => 'advanced',
        'fields'     => array(
        	array(
				'name'     => esc_html__( 'Page Sidebar Layout', 'listingeasy' ),
				'id'          => "mb_page_sidebar_layout",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'none' => esc_html__( 'None', 'listingeasy' ),
					'left' => esc_html__( 'Left', 'listingeasy' ),
					'right' => esc_html__( 'Right', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
			),
			array(
				'name'     => esc_html__( 'Page Sidebar', 'listingeasy' ),
				'id'          => "mb_page_sidebar_def",
				'type'        => 'select',
				'options'     => gt3_get_all_sidebar(),
				'multiple'    => false,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_sidebar_layout','!=','default'),
						array('mb_page_sidebar_layout','!=','none'),
					)),
				),
			),
        )
    );
    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_logo_meta_boxes' );
function gt3_logo_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => esc_html__( 'Logo Options', 'listingeasy' ),
        'post_types' => array( 'page' ),
        'context' => 'advanced',
        'fields'     => array(
        	array(
				'name'     => esc_html__( 'Logo', 'listingeasy' ),
				'id'          => "mb_customize_logo",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'custom', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
			),
			array(
				'name'             => esc_html__( 'Header Logo', 'listingeasy' ),
				'id'               => "mb_header_logo",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_logo','=','custom')
					)),
				),
			),
			array(
				'id'   => 'mb_logo_height_custom',
				'name' => esc_html__( 'Enable Logo Height', 'listingeasy' ),
				'type' => 'checkbox',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_customize_logo','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Set Logo Height', 'listingeasy' ),
				'id'   => "mb_logo_height",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 50,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_logo','=','custom'),
						array('mb_logo_height_custom','=',true)
					)),
				),
			),
			array(
				'name' => esc_html__( 'Don\'t limit maximum height', 'listingeasy' ),
				'id'   => "mb_logo_max_height",
				'type' => 'checkbox',
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_logo','=','custom'),
						array('mb_logo_height_custom','=',true)
					)),
				),
			),
			array(
				'name' => esc_html__( 'Set Sticky Logo Height', 'listingeasy' ),
				'id'   => "mb_sticky_logo_height",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_logo','=','custom'),
						array('mb_logo_height_custom','=',true),
						array('mb_logo_max_height','=',true),
					)),
				),
			),
			array(
				'name'             => esc_html__( 'Sticky Logo', 'listingeasy' ),
				'id'               => "mb_logo_sticky",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_logo','=','custom')
					)),
				),
			),
			array(
				'name'             => esc_html__( 'Mobile Logo', 'listingeasy' ),
				'id'               => "mb_logo_mobile",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_logo','=','custom')
					)),
				),
			),
        )
    );
    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_header_option_meta_boxes' );
function gt3_header_option_meta_boxes( $meta_boxes ) {
	$meta_boxes[] = array(
        'title'      => esc_html__( 'Header Layout and Color', 'listingeasy' ),
        'post_types' => array( 'page' ),
        'context' => 'advanced',
        'fields'     => array(
        	array(
				'name'     => esc_html__( 'Header Settings', 'listingeasy' ),
				'id'          => "mb_customize_header_layout",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'custom', 'listingeasy' ),
					'none' => esc_html__( 'none', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
			),
			// Top header settings
			array(
				'name'     => esc_html__( 'Top Header Settings', 'listingeasy' ),
				'id'          => "mb_customize_top_header_layout",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'custom', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Top Header Background', 'listingeasy' ),
				'id'   => "mb_top_header_background",
				'type' => 'color',
				'std'         => '#f5f5f5',
				'js_options' => array(
					'defaultColor' => '#f5f5f5',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_top_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Top Header Background Opacity', 'listingeasy' ),
				'id'   => "mb_top_header_background_opacity",
				'type' => 'number',
				'std'  => 0.44,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_top_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Text Color', 'listingeasy' ),
				'id'   => "mb_top_header_color",
				'type' => 'color',
				'std'         => '#334e6f',
				'js_options' => array(
					'defaultColor' => '#334e6f',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_top_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Text Hover Color', 'listingeasy' ),
				'id'   => "mb_top_header_color_hover",
				'type' => 'color',
				'std'         => '#28b8dc',
				'js_options' => array(
					'defaultColor' => '#28b8dc',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_top_header_layout','=','custom')
					)),
				),
			),
			array(
				'id'   => 'mb_top_header_bottom_border',
				'name' => esc_html__( 'Set Top Header Bottom Border', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_top_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Top Header Border color', 'listingeasy' ),
				'id'   => "mb_header_top_bottom_border_color",
				'type' => 'color',
				'std'         => '#000000',
				'js_options' => array(
					'defaultColor' => '#000000',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_top_header_layout','=','custom'),
						array('mb_top_header_bottom_border','=',true)
					)),
				),
			),
			array(
				'name' => esc_html__( 'Top Header Border Opacity', 'listingeasy' ),
				'id'   => "mb_header_top_bottom_border_color_opacity",
				'type' => 'number',
				'std'  => 0.1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_top_header_layout','=','custom'),
						array('mb_top_header_bottom_border','=',true)
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Middle Header Settings', 'listingeasy' ),
				'id'          => "mb_customize_middle_header_layout",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'custom', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom')
					)),
				),
			),

			// Middle header settings
			array(
				'name' => esc_html__( 'Middle Header Background', 'listingeasy' ),
				'id'   => "mb_middle_header_background",
				'type' => 'color',
				'std'         => '#ffffff',
				'js_options' => array(
					'defaultColor' => '#ffffff',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_middle_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Middle Header Background Opacity', 'listingeasy' ),
				'id'   => "mb_middle_header_background_opacity",
				'type' => 'number',
				'std'  => 0.44,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_middle_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Middle Header Text Color', 'listingeasy' ),
				'id'   => "mb_middle_header_color",
				'type' => 'color',
				'std'         => '#334e6f',
				'js_options' => array(
					'defaultColor' => '#334e6f',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_middle_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Middle Header Text Hover Color', 'listingeasy' ),
				'id'   => "mb_middle_header_color_hover",
				'type' => 'color',
				'std'         => '#28b8dc',
				'js_options' => array(
					'defaultColor' => '#28b8dc',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_middle_header_layout','=','custom')
					)),
				),
			),
			array(
				'id'   => 'mb_middle_header_bottom_border',
				'name' => esc_html__( 'Set Middle Header Bottom Border', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_middle_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Middle Header Border color', 'listingeasy' ),
				'id'   => "mb_header_middle_bottom_border_color",
				'type' => 'color',
				'std'         => '#000000',
				'js_options' => array(
					'defaultColor' => '#000000',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_middle_header_layout','=','custom'),
						array('mb_middle_header_bottom_border','=',true)
					)),
				),
			),
			array(
				'name' => esc_html__( 'Middle Header Border Opacity', 'listingeasy' ),
				'id'   => "mb_header_middle_bottom_border_color_opacity",
				'type' => 'number',
				'std'  => 0.1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_middle_header_layout','=','custom'),
						array('mb_middle_header_bottom_border','=',true)
					)),
				),
			),

			// Bottom header settings
			array(
				'name'     => esc_html__( 'Bottom Header Settings', 'listingeasy' ),
				'id'          => "mb_customize_bottom_header_layout",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'custom', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Bottom Header Background', 'listingeasy' ),
				'id'   => "mb_bottom_header_background",
				'type' => 'color',
				'std'         => '#ffffff',
				'js_options' => array(
					'defaultColor' => '#ffffff',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_bottom_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Bottom Header Background Opacity', 'listingeasy' ),
				'id'   => "mb_bottom_header_background_opacity",
				'type' => 'number',
				'std'  => 0.44,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_bottom_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Bottom Header Text Color', 'listingeasy' ),
				'id'   => "mb_bottom_header_color",
				'type' => 'color',
				'std'         => '#334e6f',
				'js_options' => array(
					'defaultColor' => '#334e6f',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_bottom_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Bottom Header Text Hover Color', 'listingeasy' ),
				'id'   => "mb_bottom_header_color_hover",
				'type' => 'color',
				'std'         => '#28b8dc',
				'js_options' => array(
					'defaultColor' => '#28b8dc',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_bottom_header_layout','=','custom')
					)),
				),
			),
			array(
				'id'   => 'mb_bottom_header_bottom_border',
				'name' => esc_html__( 'Set Bottom Header Bottom Border', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_bottom_header_layout','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Bottom Header Border color', 'listingeasy' ),
				'id'   => "mb_header_bottom_bottom_border_color",
				'type' => 'color',
				'std'         => '#000000',
				'js_options' => array(
					'defaultColor' => '#000000',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_bottom_header_layout','=','custom'),
						array('mb_bottom_header_bottom_border','=',true)
					)),
				),
			),
			array(
				'name' => esc_html__( 'Bottom Header Border Opacity', 'listingeasy' ),
				'id'   => "mb_header_bottom_bottom_border_color_opacity",
				'type' => 'number',
				'std'  => 0.1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_customize_header_layout','=','custom'),
						array('mb_customize_bottom_header_layout','=','custom'),
						array('mb_bottom_header_bottom_border','=',true)
					)),
				),
			),





			//mobile options 
			array(
				'id'   => 'mb_header_on_bg',
				'name' => esc_html__( 'Header Above Content', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 0,
			),



			// Mobile Top header settings
			array(
				'name'     => esc_html__( 'Top Mobile Header Settings', 'listingeasy' ),
				'id'          => "mb_customize_top_header_layout_mobile",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'custom', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_header_on_bg','=','1')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Top Mobile Header Background', 'listingeasy' ),
				'id'   => "mb_top_header_background_mobile",
				'type' => 'color',
				'std'         => '#f5f5f5',
				'js_options' => array(
					'defaultColor' => '#f5f5f5',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_header_on_bg','=','1'),
						array('mb_customize_top_header_layout_mobile','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Top Mobile Header Background Opacity', 'listingeasy' ),
				'id'   => "mb_top_header_background_opacity_mobile",
				'type' => 'number',
				'std'  => 1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_header_on_bg','=','1'),
						array('mb_customize_top_header_layout_mobile','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Top Mobile Header Text Color', 'listingeasy' ),
				'id'   => "mb_top_header_color_mobile",
				'type' => 'color',
				'std'         => '#94958d',
				'js_options' => array(
					'defaultColor' => '#94958d',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_header_on_bg','=','1'),
						array('mb_customize_top_header_layout_mobile','=','custom')
					)),
				),
			),



			// Mobile Middle header settings
			array(
				'name'     => esc_html__( 'Middle Mobile Header Settings', 'listingeasy' ),
				'id'          => "mb_customize_middle_header_layout_mobile",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'custom', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_header_on_bg','=','1')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Middle Mobile Header Background', 'listingeasy' ),
				'id'   => "mb_middle_header_background_mobile",
				'type' => 'color',
				'std'         => '#ffffff',
				'js_options' => array(
					'defaultColor' => '#ffffff',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_header_on_bg','=','1'),
						array('mb_customize_middle_header_layout_mobile','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Middle Mobile Header Background Opacity', 'listingeasy' ),
				'id'   => "mb_middle_header_background_opacity_mobile",
				'type' => 'number',
				'std'  => 1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_header_on_bg','=','1'),
						array('mb_customize_middle_header_layout_mobile','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Middle Mobile Header Text Color', 'listingeasy' ),
				'id'   => "mb_middle_header_color_mobile",
				'type' => 'color',
				'std'         => '#000000',
				'js_options' => array(
					'defaultColor' => '#000000',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_header_on_bg','=','1'),
						array('mb_customize_middle_header_layout_mobile','=','custom')
					)),
				),
			),


			// Mobile Bottom header settings
			array(
				'name'     => esc_html__( 'Bottom Mobile Header Settings', 'listingeasy' ),
				'id'          => "mb_customize_bottom_header_layout_mobile",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'custom', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_header_on_bg','=','1')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Bottom Mobile Header Background', 'listingeasy' ),
				'id'   => "mb_bottom_header_background_mobile",
				'type' => 'color',
				'std'         => '#ffffff',
				'js_options' => array(
					'defaultColor' => '#ffffff',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_header_on_bg','=','1'),
						array('mb_customize_bottom_header_layout_mobile','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Bottom Mobile Header Background Opacity', 'listingeasy' ),
				'id'   => "mb_bottom_header_background_opacity_mobile",
				'type' => 'number',
				'std'  => 1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_header_on_bg','=','1'),
						array('mb_customize_bottom_header_layout_mobile','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Bottom Mobile Header Text Color', 'listingeasy' ),
				'id'   => "mb_bottom_header_color_mobile",
				'type' => 'color',
				'std'         => '#000000',
				'js_options' => array(
					'defaultColor' => '#000000',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_header_on_bg','=','1'),
						array('mb_customize_bottom_header_layout_mobile','=','custom')
					)),
				),
			),

        )

	);
	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_header_meta_boxes' );
function gt3_header_meta_boxes( $meta_boxes ) {
	if (function_exists('gt3_header_presets')) {
		$presets = gt3_header_presets ();
		$presets_array = array();
		$i = 1;
		if (!empty($presets)) {
			$presets_array['default'] = esc_url(ReduxFramework::$_url) . 'assets/img/header_0.jpg';
		}

		foreach ($presets as $key => $value) {
			$presets_array[$key] = esc_url(ReduxFramework::$_url) . 'assets/img/header_'.(int)$i.'.jpg';
			$i++;
		}
	}else{
		$presets_array = array();
	}

	if (!empty($presets_array)) {
	
	    $meta_boxes[] = array(
	        'title'      => esc_html__( 'Header Builder', 'listingeasy' ),
	        'post_types' => array( 'page' ),
	        'context' => 'advanced',
	        'fields'     => array(
				array(
					'name'     => esc_html__( 'Choose presets', 'listingeasy' ),
					'id'          => "mb_header_presets",
					'type'        => 'image_select',
					'options'     => $presets_array,
					'multiple'    => false,
					'std'         => 'default', 
				),
	        )
	    );	    

    }
    return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'gt3_page_title_meta_boxes' );
function gt3_page_title_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => esc_html__( 'Page Title Options', 'listingeasy' ),
        'post_types' => array( 'page', 'post', 'team', 'practice' ),
        'context' => 'advanced',
        'fields'     => array(
			array(
				'name'     => esc_html__( 'Show Page Title', 'listingeasy' ),
				'id'          => "mb_page_title_conditional",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'yes' => esc_html__( 'yes', 'listingeasy' ),
					'no' => esc_html__( 'no', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
			),
			array(
				'name' => esc_html__( 'Page Sub Title Text', 'listingeasy' ),
				'id'   => "mb_page_sub_title",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_page_title_conditional','!=','no'),
					)),
				),
			),
			array(
				'id'   => 'mb_show_breadcrumbs',
				'name' => esc_html__( 'Show Breadcrumbs', 'listingeasy' ),
				'type' => 'checkbox',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Vertical Alignment', 'listingeasy' ),
				'id'       => 'mb_page_title_vertical_align',
				'type'     => 'select_advanced',
				'options'  => array(
					'top' => esc_html__( 'top', 'listingeasy' ),
					'middle' => esc_html__( 'middle', 'listingeasy' ),
					'bottom' => esc_html__( 'bottom', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'middle',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Horizontal Alignment', 'listingeasy' ),
				'id'       => 'mb_page_title_horizontal_align',
				'type'     => 'select_advanced',
				'options'  => array(
					'left' => esc_html__( 'left', 'listingeasy' ),
					'center' => esc_html__( 'center', 'listingeasy' ),
					'right' => esc_html__( 'right', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'left',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Font Color', 'listingeasy' ),
				'id'   => "mb_page_title_font_color",
				'type' => 'color',
				'std'         => '#ffffff',
				'js_options' => array(
					'defaultColor' => '#ffffff',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Background Color', 'listingeasy' ),
				'id'   => "mb_page_title_bg_color",
				'type' => 'color',
				'std'  => '#d9d9d9',
				'js_options' => array(
					'defaultColor' => '#d9d9d9',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name'             => esc_html__( 'Page Title Background Image', 'listingeasy' ),
				'id'               => "mb_page_title_bg_image",
				'type'             => 'file_advanced',
				'max_file_uploads' => 1,
				'mime_type'        => 'image',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Background Repeat', 'listingeasy' ),
				'id'       => 'mb_page_title_bg_repeat',
				'type'     => 'select_advanced',
				'options'  => array(
					'no-repeat' => esc_html__( 'no-repeat', 'listingeasy' ),
					'repeat' => esc_html__( 'repeat', 'listingeasy' ),
					'repeat-x' => esc_html__( 'repeat-x', 'listingeasy' ),
					'repeat-y' => esc_html__( 'repeat-y', 'listingeasy' ),
					'inherit' => esc_html__( 'inherit', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'repeat',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Background Size', 'listingeasy' ),
				'id'       => 'mb_page_title_bg_size',
				'type'     => 'select_advanced',
				'options'  => array(
					'inherit' => esc_html__( 'inherit', 'listingeasy' ),
					'cover' => esc_html__( 'cover', 'listingeasy' ),
					'contain' => esc_html__( 'contain', 'listingeasy' )
				),
				'multiple' => false,
				'std'         => 'cover',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Background Attachment', 'listingeasy' ),
				'id'       => 'mb_page_title_bg_attachment',
				'type'     => 'select_advanced',
				'options'  => array(
					'fixed' => esc_html__( 'fixed', 'listingeasy' ),
					'scroll' => esc_html__( 'scroll', 'listingeasy' ),
					'inherit' => esc_html__( 'inherit', 'listingeasy' )
				),
				'multiple' => false,
				'std'         => 'scroll',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Background Position', 'listingeasy' ),
				'id'       => 'mb_page_title_bg_position',
				'type'     => 'select_advanced',
				'options'  => array(
					'left top' => esc_html__( 'left top', 'listingeasy' ),
					'left center' => esc_html__( 'left center', 'listingeasy' ),
					'left bottom' => esc_html__( 'left bottom', 'listingeasy' ),
					'center top' => esc_html__( 'center top', 'listingeasy' ),
					'center center' => esc_html__( 'center center', 'listingeasy' ),
					'center bottom' => esc_html__( 'center bottom', 'listingeasy' ),
					'right top' => esc_html__( 'right top', 'listingeasy' ),
					'right center' => esc_html__( 'right center', 'listingeasy' ),
					'right bottom' => esc_html__( 'right bottom', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'center center',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Height', 'listingeasy' ),
				'id'   => "mb_page_title_height",
				'type' => 'number',
				'std'  => 200,
				'min'  => 0,
				'step' => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'id'   => 'mb_page_title_top_border',
				'name' => esc_html__( 'Set Page Title Top Border?', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Page Title Top Border Color', 'listingeasy' ),
				'id'   => "mb_page_title_top_border_color",
				'type' => 'color',
				'std'         => '#eff0ed',
				'js_options' => array(
					'defaultColor' => '#eff0ed',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_page_title_conditional','=','yes'),
						array('mb_page_title_top_border','=',true)
					)),
				),
			),
			array(
				'name' => esc_html__( 'Page Title Top Border Opacity', 'listingeasy' ),
				'id'   => "mb_page_title_top_border_color_opacity",
				'type' => 'number',
				'std'  => 1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_page_title_conditional','=','yes'),
						array('mb_page_title_top_border','=',true)
					)),
				),
			),

			array(
				'id'   => 'mb_page_title_bottom_border',
				'name' => esc_html__( 'Set Page Title Bottom Border?', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_page_title_conditional','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Page Title Bottom Border Color', 'listingeasy' ),
				'id'   => "mb_page_title_bottom_border_color",
				'type' => 'color',
				'std'         => '#eff0ed',
				'js_options' => array(
					'defaultColor' => '#eff0ed',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_page_title_conditional','=','yes'),
						array('mb_page_title_bottom_border','=',true)
					)),
				),
			),
			array(
				'name' => esc_html__( 'Page Title Bottom Border Opacity', 'listingeasy' ),
				'id'   => "mb_page_title_bottom_border_color_opacity",
				'type' => 'number',
				'std'  => 1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_page_title_conditional','=','yes'),
						array('mb_page_title_bottom_border','=',true)
					)),
				),
			),
        ),
    );
    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_footer_meta_boxes' );
function gt3_footer_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => esc_html__( 'Footer Options', 'listingeasy' ),
        'post_types' => array( 'page' ),
        'context' => 'advanced',
        'fields'     => array(
        	array(
				'name'     => esc_html__( 'Show Footer', 'listingeasy' ),
				'id'          => "mb_footer_switch",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'yes' => esc_html__( 'yes', 'listingeasy' ),
					'no' => esc_html__( 'no', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
			),
			array(
				'name'     => esc_html__( 'Footer Column', 'listingeasy' ),
				'id'          => "mb_footer_column",
				'type'        => 'select',
				'options'     => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',				
				),
				'multiple'    => false,
				'std'         => '4',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Footer Column 1', 'listingeasy' ),
				'id'          => "mb_footer_sidebar_1",
				'type'        => 'select',
				'options'     => gt3_get_all_sidebar(),
				'multiple'    => false,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Footer Column 2', 'listingeasy' ),
				'id'          => "mb_footer_sidebar_2",
				'type'        => 'select',
				'options'     => gt3_get_all_sidebar(),
				'multiple'    => false,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes'),
						array('mb_footer_column','!=','1')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Footer Column 3', 'listingeasy' ),
				'id'          => "mb_footer_sidebar_3",
				'type'        => 'select',
				'options'     => gt3_get_all_sidebar(),
				'multiple'    => false,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes'),
						array('mb_footer_column','!=','1'),
						array('mb_footer_column','!=','2')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Footer Column 4', 'listingeasy' ),
				'id'          => "mb_footer_sidebar_4",
				'type'        => 'select',
				'options'     => gt3_get_all_sidebar(),
				'multiple'    => false,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes'),
						array('mb_footer_column','!=','1'),
						array('mb_footer_column','!=','2'),
						array('mb_footer_column','!=','3')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Footer Column Layout', 'listingeasy' ),
				'id'          => "mb_footer_column2",
				'type'        => 'select',
				'options'     => array(
					'6-6' => '50% / 50%',
                    '3-9' => '25% / 75%',
                    '9-3' => '75% / 25%',
                    '4-8' => '33% / 66%',
                    '8-3' => '66% / 33%',				
				),
				'multiple'    => false,
				'std'         => '6-6',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes'),
						array('mb_footer_column','=','2')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Footer Column Layout', 'listingeasy' ),
				'id'          => "mb_footer_column3",
				'type'        => 'select',
				'options'     => array(
					'4-4-4' => '33% / 33% / 33%',
                    '3-3-6' => '25% / 25% / 50%',
                    '3-6-3' => '25% / 50% / 25%',
                    '6-3-3' => '50% / 25% / 25%',				
				),
				'multiple'    => false,
				'std'         => '4-4-4',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes'),
						array('mb_footer_column','=','3')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Footer Title Text Align', 'listingeasy' ),
				'id'          => "mb_footer_align",
				'type'        => 'select',
				'options'     => array(
					'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right'			
				),
				'multiple'    => false,
				'std'         => 'left',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Padding Top (px)', 'listingeasy' ),
				'id'   => "mb_padding_top",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 70,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Padding Bottom (px)', 'listingeasy' ),
				'id'   => "mb_padding_bottom",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 70,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Padding Left (px)', 'listingeasy' ),
				'id'   => "mb_padding_left",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Padding Right (px)', 'listingeasy' ),
				'id'   => "mb_padding_right",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'id'   => 'mb_footer_full_width',
				'name' => esc_html__( 'Full Width Footer', 'listingeasy' ),
				'type' => 'checkbox',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Background Color', 'listingeasy' ),
				'id'   => "mb_footer_bg_color",
				'type' => 'color',
				'std'  => '#ffffff',
				'js_options' => array(
					'defaultColor' => '#ffffff',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Footer Text Color', 'listingeasy' ),
				'id'   => "mb_footer_text_color",
				'type' => 'color',
				'std'  => '#000000',
				'js_options' => array(
					'defaultColor' => '#000000',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Footer Heading Color', 'listingeasy' ),
				'id'   => "mb_footer_heading_color",
				'type' => 'color',
				'std'  => '#fafafa',
				'js_options' => array(
					'defaultColor' => '#fafafa',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'             => esc_html__( 'Footer Background Image', 'listingeasy' ),
				'id'               => "mb_footer_bg_image",
				'type'             => 'file_advanced',
				'max_file_uploads' => 1,
				'mime_type'        => 'image',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Background Repeat', 'listingeasy' ),
				'id'       => 'mb_footer_bg_repeat',
				'type'     => 'select_advanced',
				'options'  => array(
					'no-repeat' => esc_html__( 'no-repeat', 'listingeasy' ),
					'repeat' => esc_html__( 'repeat', 'listingeasy' ),
					'repeat-x' => esc_html__( 'repeat-x', 'listingeasy' ),
					'repeat-y' => esc_html__( 'repeat-y', 'listingeasy' ),
					'inherit' => esc_html__( 'inherit', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'repeat',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Background Size', 'listingeasy' ),
				'id'       => 'mb_footer_bg_size',
				'type'     => 'select_advanced',
				'options'  => array(
					'inherit' => esc_html__( 'inherit', 'listingeasy' ),
					'cover' => esc_html__( 'cover', 'listingeasy' ),
					'contain' => esc_html__( 'contain', 'listingeasy' )
				),
				'multiple' => false,
				'std'         => 'cover',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Background Attachment', 'listingeasy' ),
				'id'       => 'mb_footer_attachment',
				'type'     => 'select_advanced',
				'options'  => array(
					'fixed' => esc_html__( 'fixed', 'listingeasy' ),
					'scroll' => esc_html__( 'scroll', 'listingeasy' ),
					'inherit' => esc_html__( 'inherit', 'listingeasy' )
				),
				'multiple' => false,
				'std'         => 'scroll',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Background Position', 'listingeasy' ),
				'id'       => 'mb_footer_bg_position',
				'type'     => 'select_advanced',
				'options'  => array(
					'left top' => esc_html__( 'left top', 'listingeasy' ),
					'left center' => esc_html__( 'left center', 'listingeasy' ),
					'left bottom' => esc_html__( 'left bottom', 'listingeasy' ),
					'center top' => esc_html__( 'center top', 'listingeasy' ),
					'center center' => esc_html__( 'center center', 'listingeasy' ),
					'center bottom' => esc_html__( 'center bottom', 'listingeasy' ),
					'right top' => esc_html__( 'right top', 'listingeasy' ),
					'right center' => esc_html__( 'right center', 'listingeasy' ),
					'right bottom' => esc_html__( 'right bottom', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'center center',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				),
			),

			array(
				'id'   => 'mb_copyright_switch',
				'name' => esc_html__( 'Show Copyright', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				), 
			),
			array(
				'name' => esc_html__( 'Copyright Editor', 'listingeasy' ),
				'id'   => "mb_copyright_editor",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),


			array(
				'name'     => esc_html__( 'Copyright Column', 'listingeasy' ),
				'id'          => "mb_copyright_column",
				'type'        => 'select',
				'options'     => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',			
				),
				'multiple'    => false,
				'std'         => '3',
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Copyright Column 1', 'listingeasy' ),
				'id'          => "mb_copyright_sidebar_1",
				'type'        => 'select',
				'options'     => gt3_get_all_sidebar(),
				'multiple'    => false,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Copyright Column 2', 'listingeasy' ),
				'id'          => "mb_copyright_sidebar_2",
				'type'        => 'select',
				'options'     => gt3_get_all_sidebar(),
				'multiple'    => false,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes'),
						array('mb_copyright_column','!=','1')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Copyright Column 3', 'listingeasy' ),
				'id'          => "mb_copyright_sidebar_3",
				'type'        => 'select',
				'options'     => gt3_get_all_sidebar(),
				'multiple'    => false,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes'),
						array('mb_copyright_column','!=','1'),
						array('mb_copyright_column','!=','2')
					)),
				),
			),


			array(
				'name'     => esc_html__( 'Copyright Text Align', 'listingeasy' ),
				'id'       => 'mb_copyright_align',
				'type'     => 'select',
				'options'  => array(
					'left' => esc_html__( 'left', 'listingeasy' ),
					'center' => esc_html__( 'center', 'listingeasy' ),
					'right' => esc_html__( 'right', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'left',
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Copyright Text Align 2 Column', 'listingeasy' ),
				'id'       => 'mb_copyright_align_2',
				'type'     => 'select',
				'options'  => array(
					'left' => esc_html__( 'left', 'listingeasy' ),
					'center' => esc_html__( 'center', 'listingeasy' ),
					'right' => esc_html__( 'right', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'center',
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes'),
						array('mb_copyright_column','!=','1')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Copyright Text Align 3 Column', 'listingeasy' ),
				'id'       => 'mb_copyright_align_3',
				'type'     => 'select',
				'options'  => array(
					'left' => esc_html__( 'left', 'listingeasy' ),
					'center' => esc_html__( 'center', 'listingeasy' ),
					'right' => esc_html__( 'right', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'right',
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes'),
						array('mb_copyright_column','!=','1'),
						array('mb_copyright_column','!=','2')
					)),
				),
			),










			array(
				'name' => esc_html__( 'Copyright Padding Top (px)', 'listingeasy' ),
				'id'   => "mb_copyright_padding_top",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 20,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Copyright Padding Bottom (px)', 'listingeasy' ),
				'id'   => "mb_copyright_padding_bottom",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 20,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Copyright Padding Left (px)', 'listingeasy' ),
				'id'   => "mb_copyright_padding_left",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Copyright Padding Right (px)', 'listingeasy' ),
				'id'   => "mb_copyright_padding_right",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Copyright Background Color', 'listingeasy' ),
				'id'   => "mb_copyright_bg_color",
				'type' => 'color',
				'std'  => '#ffffff',
				'js_options' => array(
					'defaultColor' => '#ffffff',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Copyright Text Color', 'listingeasy' ),
				'id'   => "mb_copyright_text_color",
				'type' => 'color',
				'std'  => '#000000',
				'js_options' => array(
					'defaultColor' => '#000000',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'id'   => 'mb_copyright_top_border',
				'name' => esc_html__( 'Set Copyright Top Border?', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Copyright Border Color', 'listingeasy' ),
				'id'   => "mb_copyright_top_border_color",
				'type' => 'color',
				'std'         => '#2b4764',
				'js_options' => array(
					'defaultColor' => '#2b4764',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes'),
						array('mb_copyright_top_border','=',true)
					)),
				),
			),
			array(
				'name' => esc_html__( 'Copyright Border Opacity', 'listingeasy' ),
				'id'   => "mb_copyright_top_border_color_opacity",
				'type' => 'number',
				'std'  => 1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_copyright_switch','=',true),
						array('mb_footer_switch','=','yes'),
						array('mb_copyright_top_border','=',true)
					)),
				),
			),

			//prefooter
			array(
				'id'   => 'mb_pre_footer_switch',
				'name' => esc_html__( 'Show Pre Footer Area', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_footer_switch','=','yes')
					)),
				), 
			),
			array(
				'name' => esc_html__( 'Pre Footer Editor', 'listingeasy' ),
				'id'   => "mb_pre_footer_editor",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_pre_footer_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Pre Footer Title Text Align', 'listingeasy' ),
				'id'       => 'mb_pre_footer_align',
				'type'     => 'select',
				'options'  => array(
					'left' => esc_html__( 'left', 'listingeasy' ),
					'center' => esc_html__( 'center', 'listingeasy' ),
					'right' => esc_html__( 'right', 'listingeasy' ),
				),
				'multiple' => false,
				'std'         => 'left',
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_pre_footer_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Pre Footer Padding Top (px)', 'listingeasy' ),
				'id'   => "mb_pre_footer_padding_top",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 20,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_pre_footer_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Pre Footer Padding Bottom (px)', 'listingeasy' ),
				'id'   => "mb_pre_footer_padding_bottom",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 20,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_pre_footer_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Pre Footer Padding Left (px)', 'listingeasy' ),
				'id'   => "mb_pre_footer_padding_left",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_pre_footer_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Pre Footer Padding Right (px)', 'listingeasy' ),
				'id'   => "mb_pre_footer_padding_right",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
				'std'  => 0,
				'attributes' => array(
				    'data-dependency'  =>  array( array(						
						array('mb_pre_footer_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'id'   => 'mb_pre_footer_bottom_border',
				'name' => esc_html__( 'Set Pre Footer Bottom Border?', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_pre_footer_switch','=',true),
						array('mb_footer_switch','=','yes')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Pre Footer Border Color', 'listingeasy' ),
				'id'   => "mb_pre_footer_bottom_border_color",
				'type' => 'color',
				'std'         => '#f0f0f0',
				'js_options' => array(
					'defaultColor' => '#f0f0f0',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_pre_footer_switch','=',true),
						array('mb_footer_switch','=','yes'),
						array('mb_pre_footer_bottom_border','=',true)
					)),
				),
			),
			array(
				'name' => esc_html__( 'Pre Footer Border Opacity', 'listingeasy' ),
				'id'   => "mb_pre_footer_bottom_border_color_opacity",
				'type' => 'number',
				'std'  => 1,
				'min'  => 0,
				'max'  => 1,
				'step' => 0.01,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_pre_footer_switch','=',true),
						array('mb_footer_switch','=','yes'),
						array('mb_pre_footer_bottom_border','=',true)
					)),
				),
			),
        ),
     );
    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_preloader_meta_boxes' );
function gt3_preloader_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => esc_html__( 'Preloader Options', 'listingeasy' ),
        'post_types' => array( 'page' ),
        'context' => 'advanced',
        'fields'     => array(
        	array(
				'name'     => esc_html__( 'Preloader', 'listingeasy' ),
				'id'          => "mb_preloader",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'custom', 'listingeasy' ),
					'none' => esc_html__( 'none', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
			),
			array(
				'name' => esc_html__( 'Preloader Background', 'listingeasy' ),
				'id'   => "mb_preloader_background",
				'type' => 'color',
				'std'         => '#ffffff',
				'js_options' => array(
					'defaultColor' => '#ffffff',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_preloader','=','custom')
					)),
				),
			),
			array(
				'name' => esc_html__( 'Preloader Item Color', 'listingeasy' ),
				'id'   => "mb_preloader_item_color",
				'type' => 'color',
				'std'         => '#000000',
				'js_options' => array(
					'defaultColor' => '#000000',
				),
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_preloader','=','custom')
					)),
				),
			),
			array(
				'name'             => esc_html__( 'Preloader Logo', 'listingeasy' ),
				'id'               => "mb_preloader_item_logo",
				'type'             => 'image_advanced',
				'size'		=> 'full',
				'max_file_uploads' => 1,
				'max_status' => true,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_preloader','=','custom')
					)),
				),
			),
			array(
				'id'   => 'mb_preloader_full',
				'name' => esc_html__( 'Preloader Fullscreen', 'listingeasy' ),
				'type' => 'checkbox',
				'std'  => 1,
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_preloader','=','custom')
					)),
				),
			),
        )
    );
    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_contact_widget_meta_boxes' );
function gt3_contact_widget_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'title'      => esc_html__( 'Contact Widget', 'listingeasy' ),
        'post_types' => array( 'page' , 'post', 'team', 'practice' ),
        'context' => 'advanced',
        'fields'     => array(
        	array(
				'name'     => esc_html__( 'Display Contact Widget', 'listingeasy' ),
				'id'          => "mb_display_contact_widget",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'on' => esc_html__( 'On', 'listingeasy' ),
					'off' => esc_html__( 'Off', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
			),
        )
    );
    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'gt3_shortcode_meta_boxes' );
function gt3_shortcode_meta_boxes( $meta_boxes ) {
	$meta_boxes[] = array(
		'title'      => esc_html__( 'Shortcode Above Content', 'listingeasy' ),
		'post_types' => array( 'page' ),
		'context' => 'advanced',
		'fields'     => array(
			array(
				'name' => esc_html__( 'Shortcode', 'listingeasy' ),
				'id'   => "mb_page_shortcode",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3
			),
		),
     );
    return $meta_boxes;
}



add_filter( 'rwmb_meta_boxes', 'gt3_single_product_meta_boxes' );
function gt3_single_product_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = array(
        'title'      => esc_html__( 'Single Product Settings', 'listingeasy' ),
        'post_types' => array( 'product' ),
        'context' => 'advanced',
        'fields'     => array(
        	array(
				'name'     => esc_html__( 'Single Product Page Settings', 'listingeasy' ),
				'id'          => "mb_single_product",
				'type'        => 'select',
				'options'     => array(
					'default' => esc_html__( 'default', 'listingeasy' ),
					'custom' => esc_html__( 'Custom', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'default',
			),
			// Thumbnails Layout Settings
			array(
				'name'     => esc_html__( 'Thumbnails Layout', 'listingeasy' ),
				'id'          => "mb_thumbnails_layout",
				'type'        => 'select',
				'options'     => array(
					'horizontal' => esc_html__( 'Thumbnails Bottom', 'listingeasy' ),
					'vertical' => esc_html__( 'Thumbnails Left', 'listingeasy' ),
					'thumb_grid' => esc_html__( 'Thumbnails Grid', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'horizontal',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_single_product','=','custom')
					)),
				),
			),

			array(
				'name'     => esc_html__( 'Product Page Layout', 'listingeasy' ),
				'id'          => "mb_product_container",
				'type'        => 'select',
				'options'     => array(
					'container' => esc_html__( 'Container', 'listingeasy' ),
					'full_width' => esc_html__( 'Full Width', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'container',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
						array('mb_single_product','=','custom')
					)),
				),
			),
			array(
				'id'   => 'mb_sticky_thumb',
				'name' => esc_html__( 'Sticky Thumbnails', 'listingeasy' ),
				'type' => 'checkbox',
				'attributes' => array(
				    'data-dependency'  =>  array( array(
				    	array('mb_single_product','=','custom')
					)),
				),
			),
			array(
				'name'     => esc_html__( 'Image Size for Masonry Layout', 'listingeasy' ),
				'id'          => "mb_img_size_masonry",
				'type'        => 'select',
				'options'     => array(
					'small_h_rect' => esc_html__( 'Small Horizontal Rectangle', 'listingeasy' ),
					'large_h_rect' => esc_html__( 'Large Horizontal Rectangle', 'listingeasy' ),
					'large_v_rect' => esc_html__( 'Large Vertical Rectangle', 'listingeasy' ),
				),
				'multiple'    => false,
				'std'         => 'small_h_rect',
			),

        )
    );
	return $meta_boxes;
}

?>