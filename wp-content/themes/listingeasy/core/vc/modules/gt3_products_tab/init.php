<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

add_action('init', 'my_get_woo_cats');

function my_get_woo_cats() {
    $product_categories = array();
    $product_cat = array();
    if(class_exists( 'WooCommerce' )){
        $product_categories = get_terms('product_cat', 'orderby=count&hide_empty=0');
        if ( is_array( $product_categories ) ) {
            foreach ( $product_categories as $cat ) {
                $product_cat[$cat->name.' ('.$cat->slug.')'] = $cat->slug;
            }
        }
    }

    if (function_exists('vc_map')) {
        vc_map(array(
            'base' => 'gt3_products_tab',
            'name' => esc_html__('GT3 Products Tab', 'listingeasy'),
            "description" => esc_html__("Products Tab by Category", 'listingeasy'),
            'category' => esc_html__('GT3 Modules', 'listingeasy'),
            'icon' => 'gt3_icon',
            'params' => array(
                array(
                    'type' => 'gt3-multi-select',
                    'heading' => esc_html__('Product Category', 'listingeasy' ),
                    'param_name' => 'category',
                    'options' => $product_cat
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Items Per Page", 'listingeasy'),
                    "param_name" => "per_page",
                    "value"       => '4',
                    "description" => esc_html__("How much items per page to show.", 'listingeasy')
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Columns", 'listingeasy'),
                    "param_name" => "columns",
                    "value"       => '4',
                    "description" => esc_html__("How much columns grid.", 'listingeasy')
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Order by', 'listingeasy' ),
                    'param_name'  => 'orderby',
                    'value'       => array( esc_html__('Date', 'listingeasy' ) => 'date', esc_html__('ID', 'listingeasy' ) => 'ID',
                        esc_html__('Author', 'listingeasy' ) => 'author', esc_html__('Modified', 'listingeasy' ) => 'modified',
                        esc_html__('Random', 'listingeasy' ) => 'rand', esc_html__('Comment count', 'listingeasy' ) => 'comment_count',
                        esc_html__('Menu Order', 'listingeasy' ) => 'menu_order'
                    ),
                    'description' => esc_html__('Select how to sort retrieved products.', 'listingeasy' )
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Order way', 'listingeasy' ),
                    'param_name'  => 'order',
                    'value'       => array( esc_html__('Descending', 'listingeasy' ) => 'DESC', esc_html__('Ascending', 'listingeasy' ) => 'ASC'),
                    'description' => esc_html__('Designates the ascending or descending orde.', 'listingeasy' )
                )
            ),


        ));

        class WPBakeryShortCode_Gt3_products_tab extends WPBakeryShortCode { }

    }
}