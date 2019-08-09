<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <?php echo((gt3_option('responsive') == "1") ? '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">' : ''); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')); ?>">
    <?php 
        wp_head(); 
    ?>
</head>
<body <?php body_class(); ?> data-theme-color="<?php echo esc_attr(gt3_option("theme-custom-color")); ?>" data-map-skin-style="<?php echo esc_attr(gt3_option('map_skin_style')); ?>" data-map-latitude="<?php echo esc_attr(gt3_option('default_map_latitude')); ?>" data-map-longitude="<?php echo esc_attr(gt3_option('default_map_longitude')); ?>" data-mobile-maxzoommap="<?php echo esc_attr(gt3_option('maxzoom_map_mobile')); ?>">
    <?php 
        gt3_preloader();
        gt3_get_header_builder(get_queried_object_id());
		$now_post_type = get_post_type();
		if ($now_post_type !== 'job_listing') {
            if ( get_option('job_manager_jobs_page_id') != get_the_ID() ) {
                gt3_get_page_title(get_queried_object_id());
            }
		}
    ?>
    <div class="site_wrapper fadeOnLoad">
        <?php
            $page_shortcode = '';
            if (class_exists( 'RWMB_Loader' )) {
                $page_shortcode = rwmb_meta('mb_page_shortcode');
                if (strlen($page_shortcode) > 0) {
                    echo do_shortcode($page_shortcode);
                }
            }
        ?>
        <div class="main_wrapper">