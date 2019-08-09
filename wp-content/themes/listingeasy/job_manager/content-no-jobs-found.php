<?php
/**
 * The template for displaying the WP Job Manager no found message
 *
 * @package Listingeasy
 */


$submit_listing_page_id = get_option( 'job_manager_submit_job_form_page_id', false ); ?>

<div class="no-results">
    <h2><?php esc_html_e( 'No Results', 'listingeasy' ); ?></h2>
    <p class="no-margins"><?php esc_html_e( 'There are no listings matching your search.', 'listingeasy' ); ?></p>
    <?php if ( ! empty( $submit_listing_page_id ) ) { ?>
        <p class="no-margins">
            <?php esc_html_e( 'Try changing your filters or ', 'listingeasy' ); ?>
            <a href="<?php echo get_permalink($submit_listing_page_id); ?>" class="underlined-link">
            <?php esc_html_e( 'create a listing', 'listingeasy' ); ?></a>.
        </p>
    <?php } ?>
    <div class="gt3_module_button">
        <a class="clear-results-btn reset button_size_normal btn_icon_position_right" href="<?php echo gt3_get_listings_page_url(); ?>">
            <span class="gt3_btn_text"><?php esc_html_e( 'Clear Filters ', 'listingeasy' ); ?></span>
            <div class="btn_icon_container"><span class="gt3_btn_icon fa fa-angle-right"></span></div>
        </a>
    </div>
</div>
