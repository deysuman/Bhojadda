<?php
if (!class_exists( 'WP_Job_Manager' )) {
    return;
}
$defaults = array(
    'css' => '',
    'css_animation' => '',
    'item_el_class' => '',
    'module_title' => '',
    'module_subtitle' => '',
    'view_type' => 'type_grid',
    'number_of_items' => '',
    'orderby' => 'name',
    'categories_slug' => '',
    'items_per_line' => '1',
    'spacing_beetween_items' => '30',
    'packery_layout' => ''
);

$atts = vc_shortcode_attribute_parse($defaults, $atts);
extract($atts);
$compile = '';

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $item_el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$image_width = $image_height = $items_in_layout = '';

$uniqid = mt_rand(0, 9999);

// Packery part
$item_in_row = 3;
$width = '1000';
$height = '1000';

if ($packery_layout == 'pls_3items') {
    $item_in_row = 3;
    $items_in_layout = 6;
}
if ($packery_layout == 'pls_4items') {
    $item_in_row = 4;
    $items_in_layout = 8;
}
if ($packery_layout == 'pls_4_12items') {
    $item_in_row = 412;
    $items_in_layout = 12;
}
if ($packery_layout == 'pls_5items') {
    $item_in_row = 5;
    $items_in_layout = 10;
}
if ($packery_layout == 'pls_6items') {
    $item_in_row = 6;
    $items_in_layout = 12;
}

if ($view_type == 'type_packery') {
    $wrapper_class = 'packery_gallery personal_preloader packery_columns'.esc_attr($item_in_row).'';
    $item_wrap_attrs = 'data-pad="'.esc_attr($spacing_beetween_items).'" data-layout="'.esc_attr($item_in_row).'"';
} else {
    $wrapper_class = 'gt3_isotope_wrapper items_per_line'.$items_per_line.' spacing_'.$spacing_beetween_items;
    $item_wrap_attrs = '';

    // Default Image Size
    switch ($items_per_line) {
        case '1':
            $image_width = '1170';
            $image_height = '877';
            break;
        case '2':
            $image_width = '800';
            $image_height = '600';
            break;
        case '3':
            $image_width = '600';
            $image_height = '450';
            break;
        case '4':
            $image_width = '400';
            $image_height = '300';
            break;
    }
    if ($view_type == 'type_masonry') {
        $image_height = '';
    }
}

// Animation
if (! empty($atts['css_animation'])) {
    $animation_class = $this->getCSSAnimation( $atts['css_animation'] );
} else {
    $animation_class = '';
}

$term_list = array();
$custom_category_labels = array();

//first let's do only one query and get all the terms - we will reuse this info to avoid multiple queries
$query_args = array( 'order' => 'DESC', 'hide_empty' => false, 'hierarchical' => true, 'pad_counts' => true );
if ( ! empty( $orderby ) && is_string( $orderby ) ) {
    $query_args['orderby'] = $orderby;
}

$all_terms = get_terms(
    'job_listing_category',
    $query_args
);

// if there was an error
if ( is_wp_error( $all_terms ) ) {
    return;
}

if ( $query_args['orderby'] === 'rand' ) {
    shuffle($all_terms);
}

//now create an array with the category slug as key so we can reference/search easier
$all_categories = array();
foreach ( $all_terms as $key => $term ) {
    $all_categories[ $term->slug ] = $term;
}

//if we have received a list of categories to display (their slugs and optional label), use that
if ( ! empty( $categories_slug ) && is_string( $categories_slug ) ) {
    $categories = explode( ',', $categories_slug );
    foreach ( $categories as $key => $category ) {
        if ( strpos( $category, '(' ) !== false ) {
            $category  = explode( '(', $category );
            $term_slug = trim( $category[0] );

            if ( substr( $category[1], - 1, 1 ) == ')' ) {
                $custom_category_labels[ $term_slug ] = trim( substr( $category[1], 0, - 1 ) );
            }

            if ( array_key_exists( $term_slug, $all_categories ) ) {
                $term_list[] = $all_categories[ $term_slug ];
            }
        } else {
            $term_slug = trim( $category );
            if ( array_key_exists( $term_slug, $all_categories ) ) {
                $term_list[] = $all_categories[ $term_slug ];
            }
        }
    }

    //now if the user has chosen to sort these according to the number of posts, we should do that
    // since we will, by default, respect the order of the categories he has used
    if ( 'count' == $orderby ) {
        // Define the custom sort function
        function sort_by_post_count( $a, $b ) {
            return $a->count < $b->count;
        }

        // Sort the multidimensional array
        usort( $term_list, "sort_by_post_count" );
    } elseif ( 'rand' == $orderby ) {
        //randomize things a bit if this is what the user ordered
        shuffle( $term_list );
    }

} else {
    //it seems we will have to figure out ourselves what categories to display
    if (intval( $number_of_items ) == '0') {
        $term_list = array_slice( $all_categories, 0);
    } else {
        $term_list = array_slice( $all_categories, 0, $number_of_items );
    }
}

// Items Count
$items_on_start = count($term_list);

// Title Section
if ( ! empty( $module_title ) ) {
    $module_title_value = '<h2>' . esc_attr( $module_title ) . '</h2>';
} else {
    $module_title_value = '';
}

if ( ! empty( $module_subtitle ) ) {
    $module_subtitle_value = '<h5>' . esc_attr( $module_subtitle ) . '</h5>';
} else {
    $module_subtitle_value = '';
}

$title_section_var = $module_title_value . $module_subtitle_value;

?>
<div class="vc_row">
    <div class="vc_col-sm-12 gt3_listing_categories <?php echo esc_attr($animation_class); ?> <?php echo esc_attr($css_class); ?>">
        <?php
            if (strlen($title_section_var) > 0) {
                $compile .= '<div class="gt3_module_title_section text-center">'.$title_section_var.'</div>';
            }
            if ( ! empty( $term_list ) ) {

                $rtl_sufix = '';
                if (is_rtl()) {
                   $rtl_sufix = '_rtl';
                }
                wp_enqueue_script('gt3_isotope', get_template_directory_uri() . '/js/jquery.isotope'.$rtl_sufix.'.min.js', array(), false, true);

                if ($view_type == 'type_packery') {
                    wp_enqueue_script('gt3_isotope_sorting_packery', get_template_directory_uri() . '/js/sorting_packery.js', array(), false, true);
                } else {
                    wp_enqueue_script('gt3_isotope_sorting', get_template_directory_uri() . '/js/sorting.js', array(), false, true);
                }

                if ($view_type == 'type_packery') {
                    $compile .= '<div class="packery_gallery_wrapper personal_preloader packery_'. esc_attr($uniqid) .' packery_spacing_'.$spacing_beetween_items.'"
    	data-uniqid="'.esc_attr($uniqid).'"
        data-pad="'.esc_attr($spacing_beetween_items).'"
        data-onstart="'.esc_attr($items_on_start).'"
        data-layout="'.esc_attr($item_in_row).'">';
                }
                $compile .= '<div class="' . esc_attr($wrapper_class) . '" '.$item_wrap_attrs.'>';
                $imgCounter = 0;
                foreach ($term_list as $key => $term) {
                    if (!$term) {
                        continue;
                    }

                    $imgCounter++;
                    if ($imgCounter > $items_in_layout) {
                        $imgCounter = 1;
                    }

                    $icon_url = gt3_get_term_icon_url($term->term_id, '');
                    $image_url = gt3_get_term_image_url($term->term_id, 'gt3-card-image');
                    $attachment_id = gt3_get_term_icon_id($term->term_id);
                    $image_src = '';
                    $gt3_listing_label_color = get_term_meta( $term->term_id, 'gt3_listing_label_color', true );

                    if (strlen($gt3_listing_label_color) > 0) {
                        $label_color_style = ' style="background: '.esc_attr($gt3_listing_label_color).'"';
                    } else {
                        $label_color_style = '';
                    }

                    if (!empty($image_url)) {
                        $image_src = $image_url;
                    } else {
                        $thumbargs = array(
                            'posts_per_page' => 1,
                            'post_type' => 'job_listing',
                            'meta_key' => 'main_image',
                            'orderby' => 'rand',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'job_listing_category',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                ),
                            )
                        );
                        $latest_thumb = new WP_Query($thumbargs);

                        if ($latest_thumb->have_posts()) {
                            //get the first image in the listing's gallery or the featured image, if present
                            $image_ID = gt3_get_post_image_id($latest_thumb->post->ID);
                            $image_src = '';
                            if (!empty($image_ID)) {
                                $image = wp_get_attachment_image_src($image_ID, 'medium');
                                $image_src = $image[0];
                            }
                        }
                    }

                    if (!empty($image_src)) {
                        $image_src = preg_replace('/\?.*/', '', $image_src);
                    }                    

                    $img_url = aq_resize($image_src, $image_width, $image_height, true, true, true);

                    if ($view_type == 'type_packery') {
                        $img_url = $image_src;
                    }

                    if (!empty($img_url)) {
                        $img_url = $img_url;
                    } else {
                        $img_url = get_template_directory_uri().'/core/integrations/img/category_holder.jpg';
                    }

                    if (isset($custom_category_labels[$term->slug])) {
                        $category_text = $custom_category_labels[$term->slug];
                    } else {
                        $category_text = $term->name;
                    }

                    // Location count
                    $location_count = $term->count;
                    if ($location_count == 1) {
                        $location_text = '' . esc_html__('Location', 'listingeasy') . '';
                    } else {
                        $location_text = '' . esc_html__('Locations', 'listingeasy') . '';
                    }

                    if ($view_type == 'type_packery') {
                        $item_class = 'class="packery-item element anim_el anim_el2 loading packery_block2preload packery-item'.esc_attr($imgCounter).'" data-count="'.esc_attr($imgCounter).'"';
                        $item_inner_class = 'packery_item_inner gt3_js_bg_img';
                    } else {
                        $item_class = 'class="element"';
                        $item_inner_class = '';
                    }

                    $compile .= '
                    <div ' . $item_class . '>
                        <div class="item_wrapper '.$item_inner_class.'" data-src="'. esc_url($img_url).'">
                            <div class="item_content">
                                <img src="' . esc_url($img_url) . '" alt="" />
                                <a href="' . esc_url(get_term_link($term)) . '">'. esc_html($category_text) .'</a>
                                <div class="gt3_item_overlay"></div>
                                <div class="listing_category_info">';
                                    ob_start();
                                    $cat_icon_code = gt3_display_image( $icon_url, '', true, $attachment_id );
                                    $cat_icon_code = ob_get_clean();
                                    if (!empty($icon_url)) {
                                        $compile .= '<div class="category-icon">'. $cat_icon_code .'</div>';
                                    }
                                    $compile .= '
                                    <div class="category-text">' . esc_html($category_text)  . '</div>
                                    <div class="category-count" ' . $label_color_style . '>' . esc_html($term->count) .' <span>' . $location_text . '</span></div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                $compile .= '</div>';
                if ($view_type == 'type_packery') {
                    $compile .= '</div>';
                }
            }

            echo  $compile;
        ?>
    </div>
</div>
<div class="clear"></div>