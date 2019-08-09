<?php

// declare woocomerece custom theme stylesheets and js
function gt3_wp_enqueue_woocommerce_style() {
    wp_register_style( 'woocommerce', get_template_directory_uri() . '/woocommerce/css/woocommerce.css' );
    wp_enqueue_style( 'woocommerce' );
}
add_action( 'wp_enqueue_scripts', 'gt3_wp_enqueue_woocommerce_style' );

function gt3_css_js_woocomerce() {
    wp_enqueue_script('gt3_main_woo_js', get_template_directory_uri() . '/woocommerce/js/theme-woo.js', array(), false, false);
    wp_enqueue_script('gt3_slick_js', get_template_directory_uri() . '/js/slick.min.js', array(), false, false);
    wp_enqueue_script('gt3_zoom', get_template_directory_uri() . '/woocommerce/js/easyzoom.js', array('jquery'), false, false);
    wp_enqueue_script('gt3_sticky_thumb', get_template_directory_uri() . '/woocommerce/js/jquery.sticky-kit.min.js', array('jquery'), false, false);
    $rtl_sufix = '';
    if (is_rtl()) {
        $rtl_sufix = '_rtl';
    }
    wp_enqueue_script('gt3_isotope', get_template_directory_uri() . '/js/jquery.isotope'.$rtl_sufix.'.min.js', array(), false, true);
    wp_enqueue_script('imagesloaded');
    if (class_exists( 'WC_List_Grid' )) {
        global $WC_List_Grid;
        add_action( 'wp_enqueue_scripts', array( $WC_List_Grid, 'setup_scripts_styles' ), 20);
    }
}
add_action('wp_enqueue_scripts', 'gt3_css_js_woocomerce');

// end of declare woocomerece custom theme stylesheets and js

// Remove action if ListGrid Plugin is active
if (class_exists('WC_List_Grid')) {
    function gt3_remove_plugin_actions(){
        global $WC_List_Grid;

        // Remove ListGrid plugin defaul wrapper in product
        remove_action( 'woocommerce_after_shop_loop_item', array( $WC_List_Grid, 'gridlist_buttonwrap_open' ), 9);
        remove_action( 'woocommerce_after_shop_loop_item', array( $WC_List_Grid, 'gridlist_buttonwrap_close' ), 11);
        remove_action( 'woocommerce_after_shop_loop_item', array( $WC_List_Grid, 'gridlist_hr' ), 30);

        // Add pagination if products view not container
        $layout = gt3_option('products_layout');
        if ($layout !== 'container') {
            remove_action( 'woocommerce_before_shop_loop', array( $WC_List_Grid, 'gridlist_toggle_button' ), 30);
            add_action('woocommerce_before_shop_loop', 'woocommerce_pagination', 30);
        }
        add_action('woocommerce_shortcode_after_recent_products_loop', 'woocommerce_pagination', 10);
    }
    add_action('woocommerce_archive_description','gt3_remove_plugin_actions');    
}


function gt3_open_controll_tag () {
	echo '<div class="gt3_woocommerce_open_controll_tag">';
}

function gt3_close_controll_tag () {
	echo '</div>';
}

function gt3_add_second_thumbnail ($product) {

	$attachment_ids = $product->get_gallery_image_ids();
    if ( $attachment_ids ) {
        $loop = 0;
        foreach ( $attachment_ids as $attachment_id ) {
            $image_link = wp_get_attachment_url( $attachment_id );
            if (!$image_link) continue;
            $loop++;
            $product_thumbnail_second = wp_get_attachment_image_src($attachment_id, 'full');
            if ($loop == 1) break;
        }
    }

    $style = '';       
    if (isset($product_thumbnail_second[0])) {            
        $style = 'background-image:url(' . $product_thumbnail_second[0] . ')';
        echo '<span class="gt3-second-thumbnail" style="'.esc_attr($style).'"></span>';
    }  

    
}

function gt3_wrapper_product_thumbnail_open () {
	echo '<div class="gt3-product-thumbnail-wrapper">';
}

function gt3_wrapper_product_thumbnail_close () {
	echo '</div>';
}

function gt3_product_title_wrapper () {
    echo '<h3 class="gt3-product-title">'.get_the_title().'</h3>'; 
}

function gt3_add_title_quantity () {
    echo '<div class="gt3-product-title_quantity">'.esc_html__('Quantity', 'listingeasy').'</div>';
}

function gt3_product_image_wrap_open () {
    echo '<div class="gt3-product-image-wrapper">';
}

function gt3_product_image_wrap_close () {
    echo '</div>';
}

// Pagination Arrows change to custom
function gt3_change_pagination ($args) {
    $args['prev_text'] = '<i class="fa fa-angle-left"></i>';
    $args['next_text'] = '<i class="fa fa-angle-right"></i>';
    return $args;
}
add_filter('woocommerce_pagination_args', 'gt3_change_pagination', 30, 1);

function gt3_add_label_outofstock () {
    global $product;
    if (!($product->is_in_stock())) {
        echo '<div class="gt3-product-outofstock"><span class="gt3-product-outofstock__inner">'.esc_html__('Out Of Stock', 'listingeasy').'</span></div>';
    }
}
add_action('woocommerce_before_shop_loop_item_title', 'gt3_add_label_outofstock', 6);

// Remove woocommerce breadcrumb
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
//add breadcrumb to single product
if (gt3_option('shop_title_conditional') != '1' && gt3_option('page_title_breadcrumbs_conditional') == '1' && gt3_option('page_title_conditional') == '1' ) {
    add_action('woocommerce_single_product_summary','woocommerce_breadcrumb', 4);
}
if (gt3_option('shop_title_conditional') == '1' && gt3_option('page_title_conditional') == '1') {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
}


add_action( 'yith_wcqv_product_image', 'gt3_product_image_wrap_open', 9 );
add_action( 'yith_wcqv_product_image', 'gt3_product_image_wrap_close', 21 );



function gt3_add_thumb_wcqv () {
    add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 2);
}
add_action( 'wp_ajax_yith_load_product_quick_view', "gt3_add_thumb_wcqv", 1);
add_action( 'wp_ajax_nopriv_yith_load_product_quick_view', 'gt3_add_thumb_wcqv',1 );

//Replace Ratings in popup
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 4 );

remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 30 );
add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 17 );
add_action( 'yith_wcqv_product_summary' , 'gt3_add_title_quantity', 18 );


function gt3_add_instock () {
    global $product;
    $availability      = $product->get_availability();
    $availability_icon = !empty($availability['class']) && $availability['class'] === "in-stock" ? '<i class="fa fa-check"></i>' : '';
    $availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . $availability_icon . esc_html( $availability['availability'] ) . '</p>';
    // escaped before
    echo  $availability_html;
}
add_action( 'yith_wcqv_product_summary', 'gt3_add_instock', 16 );
add_action( 'woocommerce_single_product_summary', 'gt3_add_instock', 11 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25 );

function gt3_remove_stockhtml ($content) {
    return '';
}
add_filter( 'woocommerce_get_stock_html', 'gt3_remove_stockhtml');


/* Woocomerce Template */

add_filter( 'woocommerce_show_page_title', function () { return false; } );

// set custom count pro
function gt3_products_per_page () {
    $products_count = gt3_option('products_per_page');
    $products_count = !empty($products_count) ? $products_count : 9;
    return $products_count;
}
add_filter(  'loop_shop_per_page', 'gt3_products_per_page', 20 );

function gt3_page_template () {

    switch (is_single()) {
        case true:
            $layout = gt3_option('product_sidebar_layout');
            $sidebar = gt3_option('product_sidebar_def');
            break;
        case false:
            $layout = gt3_option('products_sidebar_layout');
            $sidebar = gt3_option('products_sidebar_def');
            break;
        default:
            $layout = gt3_option('products_sidebar_layout');
            $sidebar = gt3_option('products_sidebar_def');
    }
    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
        $mb_layout = rwmb_meta('mb_page_sidebar_layout');
        if (!empty($mb_layout) && $mb_layout != 'default') {
            $layout = $mb_layout;
            $sidebar = rwmb_meta('mb_page_sidebar_def');
        }
    }
    $column = 12;
    if ( $layout == 'left' || $layout == 'right' ) {
        $column = 8;
    }else{
        $sidebar = '';
    }
    $row_class = ' sidebar_'.esc_attr($layout);

    $class_columns = '';
    $container_style = 'container';
    if ( !is_single() && get_post_type() == 'product') {
        global $woocommerce_loop;
        $columns = gt3_option('woocommerce_def_columns');
        $columns = empty($columns) ? 4 : $columns;
        $columns                     = absint( $columns );
        $woocommerce_loop['columns'] = $columns;

        $class_columns = 'class="woocommerce columns-'.esc_attr($columns).'"';

        $container_style = gt3_option('products_layout');
    } elseif (class_exists( 'RWMB_Loader' ) && is_single() && get_post_type() == 'product') {
        if (rwmb_meta('mb_single_product') === 'custom' ) {
            $container_style = rwmb_meta('mb_product_container');
        } else {
            $container_style = gt3_option('product_container');
        }
    }
    switch ($container_style) {
        case 'container':
            $container_class = 'container';
            break;
        case 'full_width':
            $container_class = 'fullwidth-wrapper';
            break;
        case 'masonry':
            $container_class = 'fullwidth-wrapper massonry';
            break;
        default:
            $container_class = 'container';
    }
 
    ?>

    <div class="<?php echo esc_html($container_class) ?>">
        <div class="row<?php echo esc_attr($row_class); ?>">
            <div class="content-container span<?php echo (int)$column; ?>">
                <section id='main_content' <?php echo  $class_columns; ?> >
    <?php
}
add_action('woocommerce_before_main_content', 'gt3_page_template', 9);

// add bottom part of page template

function gt3_page_template_close () {
    switch (is_single()) {
        case true:
            $layout = gt3_option('product_sidebar_layout');
            $sidebar = gt3_option('product_sidebar_def');
            break;
        case false:
            $layout = gt3_option('products_sidebar_layout');
            $sidebar = gt3_option('products_sidebar_def');
            break;
        default:
            $layout = gt3_option('products_sidebar_layout');
            $sidebar = gt3_option('products_sidebar_def');
    }
    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
        $mb_layout = rwmb_meta('mb_page_sidebar_layout');
        if (!empty($mb_layout) && $mb_layout != 'default') {
            $layout = $mb_layout;
            $sidebar = rwmb_meta('mb_page_sidebar_def');
        }
    }
    $column = 12;
    if ( $layout == 'left' || $layout == 'right' ) {
        $column = 8;
    }else{
        $sidebar = '';
    }
    ?>
     </section>
            </div>
            <?php
            if ($layout == 'left' || $layout == 'right') {
                echo '<div class="sidebar-container span'.(12 - (int)$column).'">';
                    if (is_active_sidebar( $sidebar )) {
                        echo "<aside class='sidebar'>";
                        dynamic_sidebar( $sidebar );
                        echo "</aside>";
                    }
                echo "</div>";
            }
            ?>           
        </div>
     
    </div>
    <?php
}
add_action('woocommerce_after_main_content', 'gt3_page_template_close', 11);

/* Woocommerce Template */


/* Products Page filter bar */

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );

function gt3_woo_header_products_open () {
    echo '<div class="gt3-products-header">';
}
function gt3_woo_header_products_close () {
    echo '</div>';
}
add_action('woocommerce_before_shop_loop', 'gt3_woo_header_products_open', 9);
add_action('woocommerce_before_shop_loop', 'gt3_woo_header_products_close', 31);

/* ! Products Page filter bar */


/* zoom image */
function gt3_wrapper_zoom ($content) {
    global $post, $product;
    $attachment_ids = $product->get_gallery_image_ids();
    $thumb_str = '';
    if ( $attachment_ids ) {
        $loop = 0;
        $columns = 1;
        foreach ( $attachment_ids as $attachment_id ) {

            $classes = array( 'zoom' );

            if ( $loop === 0 || $loop % $columns === 0 ) {
                $classes[] = 'first';
            }

            if ( ( $loop + 1 ) % $columns === 0 ) {
                $classes[] = 'last';
            }

            $image_class = implode( ' ', $classes );
            $props       = wc_get_product_attachment_props( $attachment_id, $post );

            if ( ! $props['url'] ) {
                continue;
            }

            $thumb_str .= sprintf(
                    '<div class="easyzoom"><a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a></div>',
                    esc_url( $props['url'] ),
                    esc_attr( $image_class ),
                    esc_attr( $props['caption'] ),
                    wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'full' ), 0, $props )
                );

            $loop++;
        }
    }

    return '<div class="gt3-single-woo-slick"><div class="easyzoom">'.$content.'</div>'.$thumb_str.'</div>';
}
add_filter('woocommerce_single_product_image_html', 'gt3_wrapper_zoom', 30, 1);

/* !zoom image */


/**/
/********** AFTER UPDATE WOOO ******************/
/**/
function gt3_wrap_single_product_open () {
    echo '<div class="gt3-single-content-wrapper">';
}
function gt3_wrap_single_product_close () {
    echo '</div>';
}
function gt3_add_sticky_parent_open () {
    echo '<div class="gt3-single-product-sticky">';
}
function gt3_add_sticky_parent_close () {
    echo '</div>';
}
// Add theme support for single product
function gt3_add_single_product_opts () {
    add_image_size( 'gt3_540x600', 540, 600, true );
    add_image_size( 'gt3_442x350', 442, 350, true );
    add_image_size( 'gt3_442x730', 442, 730, true );
    add_image_size( 'gt3_912x730', 912, 730, true );

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('wc-product-gallery-lightbox');
}
add_action('after_setup_theme','gt3_add_single_product_opts');


// add vertical thumbnails options
function gt3_option_thumbnail_slider () {
    return array(
        'rtl'            => is_rtl(),
        'animation'      => "fade",
        'smoothHeight'   => false,
        'directionNav'   => false,
        'controlNav'     => 'thumbnails',
        'slideshow'      => false,
        'animationSpeed' => 500,
        'animationLoop'  => false, // Breaks photoswipe pagination if true.
    );
}
add_filter('woocommerce_single_product_carousel_options', 'gt3_option_thumbnail_slider');


// Remove script in single 
function gt3_dequeue_script() {
   if (class_exists( 'RWMB_Loader' ) && rwmb_meta('mb_single_product') === 'custom') {
        $gt3_single_layout = rwmb_meta('mb_thumbnails_layout');
        $gt3_sticky_thumb = rwmb_meta('mb_sticky_thumb');
    } else {
        $gt3_single_layout = gt3_option('product_layout');
        $gt3_sticky_thumb = gt3_option('sticky_thumb');
    }

    if ($gt3_single_layout === "thumb_grid") {
        wp_dequeue_script( 'zoom' );
        wp_dequeue_script( 'flexslider' );
    }

    if ($gt3_single_layout === 'vertical' || $gt3_single_layout === 'horizontal' ) {
        wp_dequeue_script( 'photoswipe-ui-default' );
    }

    if ($gt3_sticky_thumb) {
        add_action( 'woocommerce_before_single_product_summary', 'gt3_add_sticky_parent_open', 1 );
        add_action( 'woocommerce_after_single_product_summary', 'gt3_add_sticky_parent_close', 12  );

        add_action('woocommerce_before_single_product_summary', 'gt3_wrap_single_product_open', 30);
        add_action('woocommerce_after_single_product_summary', 'gt3_wrap_single_product_close', 11);
    }
}
add_action( 'wp_print_scripts', 'gt3_dequeue_script', 100 );

// Add class to thumbnails wrapper's 
function gt3_thumb_class_view ($content) {
    if (class_exists( 'RWMB_Loader' ) && rwmb_meta('mb_single_product') === 'custom') {
        $thumb_direction = rwmb_meta('mb_thumbnails_layout');
        $gt3_sticky_thumb = rwmb_meta('mb_sticky_thumb');
    } else {
        $thumb_direction = gt3_option('product_layout');
        $gt3_sticky_thumb = gt3_option('sticky_thumb');
    }
    
    switch ($thumb_direction) {
        case 'vertical':
            array_push($content, 'gt3_thumb_vertical');
            break;
        case 'horizontal':
            array_push($content, 'gt3_thumb_horizontal');
            break;
        case 'thumb_grid':
            array_push($content, 'gt3_thumb_grid');
            break;
        default:
            array_push($content, 'gt3_thumb_horizontal');
            break;
    }
    if ($gt3_sticky_thumb) {
        array_push($content, 'gt3_sticky_thumb');
    }
    return $content;
}
add_filter( 'woocommerce_single_product_image_gallery_classes', 'gt3_thumb_class_view');

function gt3_get_template ($tmpl, $extension = NULL) {
    get_template_part( 'woocommerce/gt3-templates/' . $tmpl, $extension );
}

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action("woocommerce_product_thumbnails", "woocommerce_show_product_sale_flash", 5);

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);