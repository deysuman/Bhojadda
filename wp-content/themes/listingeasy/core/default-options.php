<?php
    function gt3_get_default_option(){
        $option = get_option( 'wize_default_options' );
        if (empty($option)) {
            $option = '{"last_tab":"1","responsive":"1","page_comments":"1","preloader":"1","preloader_background":"#f9f9f9","preloader_item_color":"#334e6f","preloader_item_logo":{"url":"http://gt3demo.com/wp/listingeasy/wp-content/uploads/2017/10/listing_logo_dark.png","id":"11686","height":"66","width":"340","thumbnail":"http://gt3demo.com/wp/listingeasy/wp-content/uploads/2017/10/listing_logo_dark-150x66.png"},"preloader_full":"1","back_to_top":"1","add_default_typography_sapcing":"","custom_css":"","custom_js":"jQuery(document).ready(function(){\r\n\r\n});","header_custom_js":"<script type=\'text/javascript\'>\r\njQuery(document).ready(function(){\r\n\r\n});\r\n</script>","page_title_conditional":"1","blog_title_conditional":"","page_title_breadcrumbs_conditional":"1","page_title_vert_align":"middle","page_title_horiz_align":"center","page_title_font_color":"#ffffff","page_title_bg_color":"#d9d9d9","page_title_bg_image":{"background-repeat":"no-repeat","background-size":"cover","background-attachment":"scroll","background-position":"center center","background-image":"http://gt3demo.com/wp/listingeasy/wp-content/uploads/2017/10/page_title_bg_typography.jpg","media":{"id":"11726","height":"350","width":"1920","thumbnail":"http://gt3demo.com/wp/listingeasy/wp-content/uploads/2017/10/page_title_bg_typography-150x150.jpg"}},"page_title_height":{"height":"350"},"page_title_top_border":"","page_title_top_border_color":{"color":"#eff0ed","alpha":"1","rgba":"rgba(239,240,237,1)"},"page_title_bottom_border":"","page_title_bottom_border_color":{"color":"#eff0ed","alpha":"1","rgba":"rgba(239,240,237,1)"},"page_title_bottom_margin":{"margin-bottom":"30"},"footer_full_width":"","footer_bg_color":"#1f1f1f","footer_text_color":"#9fa6ae","footer_heading_color":"#ffffff","footer_bg_image":{"background-repeat":"repeat","background-size":"cover","background-attachment":"scroll","background-position":"center center","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"footer_switch":"1","footer_column":"4","footer_column2":"6-6","footer_column3":"4-4-4","footer_column5":"2-3-2-2-3","footer_align":"left","footer_spacing":{"padding-top":"60","padding-right":"0","padding-bottom":"30","padding-left":"0"},"copyright_switch":"1","copyright_column":"3","copyright_align":"left","copyright_align_2":"center","copyright_align_3":"right","copyright_spacing":{"padding-top":"14","padding-right":"0","padding-bottom":"14","padding-left":"0"},"copyright_bg_color":"#1f1f1f","copyright_text_color":"#9fa6ae","copyright_top_border":"1","copyright_top_border_color":{"color":"#323232","alpha":"1","rgba":"rgba(50,50,50,1)"},"related_posts":"0","author_box":"","post_comments":"1","post_pingbacks":"1","blog_post_likes":"0","blog_post_share":"0","blog_post_listing_content":"","blog_post_listing_icon":"","page_sidebar_layout":"none","page_sidebar_def":"","blog_single_sidebar_layout":"none","blog_single_sidebar_def":"","sidebars":["Main Sidebar"],"theme-custom-color":"#28b8dc","theme-custom-color2":"#fd4851","theme-custom-color3":"#fbaf2a","body-background-color":"#f9f9f9","menu-font":{"font-family":"Work Sans","font-options":"","google":"1","font-weight":"400","font-style":"","subsets":"","font-size":"16px","line-height":"24px"},"main-font":{"font-family":"Work Sans","font-options":"","google":"1","font-weight":"400","font-style":"","subsets":"","font-size":"16px","line-height":"24px","color":"#8995a2"},"header-font":{"font-family":"Work Sans","font-options":"","google":"1","font-weight":"500","font-style":"","subsets":"","color":"#334e6f"},"h1-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","font-size":"48px","line-height":"58px"},"h2-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","font-size":"36px","line-height":"46px"},"h3-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","font-size":"30px","line-height":"40px"},"h4-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","font-size":"20px","line-height":"30px"},"h5-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","font-size":"18px","line-height":"28px"},"h6-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","font-size":"16px","line-height":"26px","letter-spacing":""},"show_contact_widget":"","title_contact_widget":"","label_contact_icon":{"url":"","id":"","height":"","width":"","thumbnail":""},"label_contact_widget_color":{"color":"#2d628f","alpha":"1","rgba":"rgba(45,98,143,1)"},"shortcode_contact_widget":"","products_layout":"container","products_sidebar_layout":"none","products_sidebar_def":"","products_per_page":"9","woocommerce_def_columns":"4","product_layout":"","product_container":"container","sticky_thumb":"1","product_sidebar_layout":"none","product_sidebar_def":"","shop_title_conditional":"","formatted_address":"0","geolocation_formats":{"geolocation_street":"1","geolocation_street_number":"1","geolocation_city":"","geolocation_postcode":"","geolocation_country_short":""},"show_listing_tags_area":"1","dashboard_page_title_font_color":"#ffffff","dashboard_page_title_bg_color":"#8c8c8c","dashboard_page_title_bg_image":{"background-repeat":"repeat","background-size":"cover","background-attachment":"scroll","background-position":"center center","background-image":"","media":{"id":"","height":"","width":"","thumbnail":""}},"show_woo_account_menu":"1","map_skin_style":"bluewater_skin_map","listing_single_sidebar_layout":"none","listing_single_sidebar_def":"","gt3_registration_id":"","gt3_auto_update":"1","gt3_header_builder_id":{"all_item":{"layout":"all","title":"All Item","content":{"placebo":"placebo","search":{"title":"Search"},"burger_sidebar":{"title":"Burger Sidebar","has_settings":"1"},"text1":{"title":"Text/HTML 1","has_settings":"1"},"text2":{"title":"Text/HTML 2","has_settings":"1"},"text3":{"title":"Text/HTML 3","has_settings":"1"},"text4":{"title":"Text/HTML 4","has_settings":"1"},"text5":{"title":"Text/HTML 5","has_settings":"1"},"text6":{"title":"Text/HTML 6","has_settings":"1"},"delimiter1":{"title":"|"},"delimiter2":{"title":"|"},"delimiter3":{"title":"|"},"delimiter4":{"title":"|"},"delimiter5":{"title":"|"},"delimiter6":{"title":"|"},"empty_space2":{"title":"&#8592;&#8594;"},"empty_space3":{"title":"&#8592;&#8594;"},"empty_space4":{"title":"&#8592;&#8594;"},"empty_space5":{"title":"&#8592;&#8594;"}}},"top_left":{"layout":"one-thirds","title":"Top Left","has_settings":"1","content":{"placebo":"placebo"}},"top_center":{"layout":"one-thirds","title":"Top Center","has_settings":"1","content":{"placebo":"placebo"}},"top_right":{"layout":"one-thirds","title":"Top Right","has_settings":"1","content":{"placebo":"placebo"}},"middle_left":{"layout":"one-thirds clear-item","title":"Middle Left","has_settings":"1","content":{"placebo":"placebo","logo":{"title":"Logo","has_settings":"1"}}},"middle_center":{"layout":"one-thirds","title":"Middle Center","has_settings":"1","content":{"placebo":"placebo"}},"middle_right":{"layout":"one-thirds","title":"Middle Right","has_settings":"1","content":{"placebo":"placebo","menu":{"title":"Menu","has_settings":"1"}}},"bottom_left":{"layout":"one-thirds clear-item","title":"Bottom Left","has_settings":"1","content":{"placebo":"placebo"}},"bottom_center":{"layout":"one-thirds","title":"Bottom Center","has_settings":"1","content":{"placebo":"placebo"}},"bottom_right":{"layout":"one-thirds","title":"Bottom Right","has_settings":"1","content":{"placebo":"placebo"}}},"header_full_width":"","header_sticky":"1","header_sticky_appearance_style":"classic","header_sticky_appearance_from_top":"auto","header_sticky_appearance_number":{"height":"300"},"header_sticky_shadow":"1","top_left-align":"left","top_center-align":"center","top_right-align":"right","middle_left-align":"left","middle_center-align":"center","middle_right-align":"right","bottom_left-align":"left","bottom_center-align":"center","bottom_right-align":"right","header_logo":{"url":"","id":"","height":"","width":"","thumbnail":""},"logo_height_custom":"1","logo_height":{"height":""},"logo_max_height":"","sticky_logo_height":{"height":""},"logo_sticky":{"url":"","id":"","height":"","width":"","thumbnail":""},"logo_mobile":{"url":"","id":"","height":"","width":"","thumbnail":""},"logo_limit_on_mobile":"0","menu_select":"main-menu","menu_ative_top_line":"","sub_menu_background":{"color":"#ffffff","alpha":"1","rgba":"rgba(255,255,255,1)"},"sub_menu_color":"#334e6f","burger_sidebar_select":"","button_select":"11822","icon_select__button":"fa fa-plus","login_select":"dashboard-menu","side_top_background":{"color":"#f5f5f5","alpha":"1","rgba":"rgba(245,245,245,1)"},"side_top_color":"#334e6f","side_top_color_hover":"#28b8dc","side_top_height":{"height":"40"},"side_top_border":"","side_top_border_color":{"color":"#ffffff","alpha":".15","rgba":"rgba(255,255,255,0.15)"},"side_top_sticky":"","side_top_background_sticky":{"color":"#f5f5f5","alpha":"1","rgba":"rgba(245,245,245,1)"},"side_top_color_sticky":"#334e6f","side_top_color_hover_sticky":"#28b8dc","side_top_height_sticky":{"height":"38"},"side_top_mobile":"","side_middle_background":{"color":"#ffffff","alpha":"1","rgba":"rgba(255,255,255,1)"},"side_middle_color":"#334e6f","side_middle_color_hover":"#28b8dc","side_middle_height":{"height":"90"},"side_middle_border":"","side_middle_border_color":{"color":"#ffffff","alpha":".15","rgba":"rgba(255,255,255,0.15)"},"side_middle_sticky":"1","side_middle_background_sticky":{"color":"#ffffff","alpha":"1","rgba":"rgba(255,255,255,1)"},"side_middle_color_sticky":"#334e6f","side_middle_color_hover_sticky":"#28b8dc","side_middle_height_sticky":{"height":"90"},"side_middle_mobile":"1","side_bottom_background":{"color":"#ffffff","alpha":"1","rgba":"rgba(255,255,255,1)"},"side_bottom_color":"#334e6f","side_bottom_color_hover":"#28b8dc","side_bottom_height":{"height":"38"},"side_bottom_border":"","side_bottom_border_color":{"color":"#ffffff","alpha":".15","rgba":"rgba(255,255,255,0.15)"},"side_bottom_sticky":"","side_bottom_background_sticky":{"color":"#ffffff","alpha":"1","rgba":"rgba(255,255,255,1)"},"side_bottom_color_sticky":"#334e6f","side_bottom_color_hover_sticky":"#28b8dc","side_bottom_height_sticky":{"height":"38"},"side_bottom_mobile":"","text1_editor":"","text2_editor":"","text3_editor":"","text4_editor":"","text5_editor":"","text6_editor":"","page_title-start":"","page_title-end":"","footer-start":"","footer-end":"","copyright-start":"","copyright-end":"","wbc_demo_importer":"","main_header_settings-start":"","main_header_settings-end":"","top_left-start":"","top_left-end":"","top_center-start":"","top_center-end":"","top_right-start":"","top_right-end":"","middle_left-start":"","middle_left-end":"","middle_center-start":"","middle_center-end":"","middle_right-start":"","middle_right-end":"","bottom_left-start":"","bottom_left-end":"","bottom_center-start":"","bottom_center-end":"","bottom_right-start":"","bottom_right-end":"","logo-start":"","logo-end":"","menu-start":"","menu-end":"","burger_sidebar-start":"","burger_sidebar-end":"","button-start":"","button-end":"","login-start":"","login-end":"","side_top-start":"","side_top-end":"","side_middle-start":"","side_middle-end":"","side_bottom-start":"","side_bottom-end":"","text1-start":"","text1-end":"","text2-start":"","text2-end":"","text3-start":"","text3-end":"","text4-start":"","text4-end":"","text5-start":"","text5-end":"","text6-start":"","text6-end":"","redux_import_export":"","redux-backup":1}';
            $option = json_decode($option,true);
            update_option( 'wize_default_options', $option );
        }
        //update_option( 'wize_default_options', '' );
    }
    gt3_get_default_option();
    if (  !class_exists( 'Redux' ) ) {
        function gt3_default_fonts(){
            $link = 'http://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900';
            wp_enqueue_style('gt3-default-font',$link);
        }
        add_action('wp_enqueue_scripts', 'gt3_default_fonts');
    }

    function gt3_header_presets(){
        $header_presets = array();
        return $header_presets;
    }
    
?>