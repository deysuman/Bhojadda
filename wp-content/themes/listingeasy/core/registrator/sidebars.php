<?php
if (!function_exists('gt3_sidebar_generator')) {
    function gt3_sidebar_generator(){
        $sidebars = gt3_option('sidebars');
        if (!empty($sidebars)) {
            foreach($sidebars as $sidebar){  
                register_sidebar( array(  
                    'name' => esc_attr($sidebar),
                    'description' => esc_html__('Add the widgets appearance for Custom Sidebar. Drag the widget from the available list on the left, configure widgets options and click Save button. Select the sidebar on the posts or pages in just few clicks.', 'listingeasy'),
                    'id' => "sidebar_".esc_attr(strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $sidebar)))),
                    'before_widget' => '<div id="%1$s" class="widget gt3_widget gt3_widget_box %2$s">',  
                    'after_widget' => '</div>',
                    'before_title' => '<h3 class="widget-title">',
                    'after_title' => '</h3>',
                ));  
            }
        }
    }
    add_action('widgets_init', 'gt3_sidebar_generator');
}

if (!function_exists('gt3_register_sidebar')) {
    function gt3_register_sidebar(){
        $listing_sidebar = array(
            'name'          => esc_html__( 'Listing Posts Widgets', 'listingeasy' ),
            'id'            => 'listing_post_sidebar',
            'description' => esc_html__('Widgets for Listing Post Type. Simply drag the widgets from the left, make the adjustments to the widget according the needs. Preview the front end.', 'listingeasy'),
            'before_widget' => '<div id="%1$s" class="widget gt3_widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        );
    
        register_sidebar( $listing_sidebar );

        $footer_1 = array(
            'name'          => esc_html__( 'Column Footer 1', 'listingeasy' ),
            'id'            => 'footer_column_1',
            'description' => esc_html__('Display and style the footer area with multiple widgets. Simply drag the widgets from the left, make the adjustments to the widget according the needs. Preview the front end.', 'listingeasy'),
            'before_widget' => '<div id="%1$s" class="widget gt3_widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        );
    
        register_sidebar( $footer_1 );

        $footer_2 = array(
            'name'          => esc_html__( 'Column Footer 2', 'listingeasy' ),
            'id'            => 'footer_column_2',
            'description' => esc_html__('Display and style the footer area with multiple widgets. Simply drag the widgets from the left, make the adjustments to the widget according the needs. Preview the front end.', 'listingeasy'),
            'before_widget' => '<div id="%1$s" class="widget gt3_widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        );
    
        register_sidebar( $footer_2 );

        $footer_3 = array(
            'name'          => esc_html__( 'Column Footer 3', 'listingeasy' ),
            'id'            => 'footer_column_3',
            'description' => esc_html__('Display and style the footer area with multiple widgets. Simply drag the widgets from the left, make the adjustments to the widget according the needs. Preview the front end.', 'listingeasy'),
            'before_widget' => '<div id="%1$s" class="widget gt3_widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        );
    
        register_sidebar( $footer_3 );

        $footer_4 = array(
            'name'          => esc_html__( 'Column Footer 4', 'listingeasy' ),
            'id'            => 'footer_column_4',
            'description' => esc_html__('Display and style the footer area with multiple widgets. Simply drag the widgets from the left, make the adjustments to the widget according the needs. Preview the front end.', 'listingeasy'),
            'before_widget' => '<div id="%1$s" class="widget gt3_widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        );
    
        register_sidebar( $footer_4 );

        /** Copyrights widget area */

        $copyright_1 = array(
            'name'          => esc_html__( 'Column Copyright 1', 'listingeasy' ),
            'id'            => 'copyright_column_1',
            'description' => esc_html__('Display and style the copyright area with multiple widgets. Simply drag the widgets from the left, make the adjustments to the widget according the needs. Preview the front end.', 'listingeasy'),
            'before_widget' => '<div id="%1$s" class="widget gt3_widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        );
    
        register_sidebar( $copyright_1 );

        $copyright_2 = array(
            'name'          => esc_html__( 'Column Copyright 2', 'listingeasy' ),
            'id'            => 'copyright_column_2',
            'description' => esc_html__('Display and style the copyright area with multiple widgets. Simply drag the widgets from the left, make the adjustments to the widget according the needs. Preview the front end.', 'listingeasy'),
            'before_widget' => '<div id="%1$s" class="widget gt3_widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        );
    
        register_sidebar( $copyright_2 );

        $copyright_3 = array(
            'name'          => esc_html__( 'Column Copyright 3', 'listingeasy' ),
            'id'            => 'copyright_column_3',
            'description' => esc_html__('Display and style the copyright area with multiple widgets. Simply drag the widgets from the left, make the adjustments to the widget according the needs. Preview the front end.', 'listingeasy'),
            'before_widget' => '<div id="%1$s" class="widget gt3_widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        );
    
        register_sidebar( $copyright_3 );
        /** end Copyright */
    }
    add_action( 'widgets_init', 'gt3_register_sidebar' );
}