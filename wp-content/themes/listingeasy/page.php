<?php
if ( !post_password_required() ) {
	get_header();
	the_post();
?>
	
    <?php
    $layout = gt3_option('page_sidebar_layout');
    $sidebar = gt3_option('page_sidebar_def');
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

    $start_container_tags = '<div class="container"><div class="row'. esc_attr($row_class).'"><div class="content-container span'. (int)$column .'">';
    $end_section_tag = '</div>';
    $end_container_tags = '</div></div>';

    if ( class_exists( 'WP_Job_Manager' ) ) {
        global $post;
        if ( ! empty( $post->post_content ) && has_shortcode( $post->post_content, 'jobs' ) ) {
            $layout = 'none';
            $start_container_tags = $end_section_tag = $end_container_tags = '';
        }
    }
    ?>
        <?php echo  $start_container_tags; ?>
            <section id='main_content'>
            <?php
                the_content(esc_html__('Read more!', 'listingeasy'));
                wp_link_pages(array('before' => '<div class="page-link">' . esc_html__('Pages', 'listingeasy') . ': ', 'after' => '</div>'));
            if (gt3_option("page_comments") == "1") { ?>
                <div class="clear"></div>
                <?php comments_template(); ?>
            <?php } ?>
            </section>
        <?php
        echo  $end_section_tag;
        if ($layout == 'left' || $layout == 'right') {
            echo '<div class="sidebar-container span'.(12 - (int)$column).'">';
                if (is_active_sidebar( $sidebar )) {
                    echo "<aside class='sidebar'>";
                    dynamic_sidebar( $sidebar );
                    echo "</aside>";
                }
            echo "</div>";
        }
    echo  $end_container_tags;

get_footer(); 

} else {
	get_header();
?>
	<div class="wrapper_404 height_100percent pp_block">
        <div class="container_vertical_wrapper">
            <div class="container a-center pp_container">
                <h1><?php echo esc_html__('Password Protected', 'listingeasy'); ?></h1>
                <h2><?php echo esc_html__('This content is password protected. Please enter your password below to continue.', 'listingeasy'); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
	</div>
<?php 
	get_footer();
} ?>