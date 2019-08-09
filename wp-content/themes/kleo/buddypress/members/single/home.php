<?php
/**
 * BuddyPress - Members Home
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

?>

<?php if ( sq_option( 'bp_full_profile', 0 ) == 0 || sq_option( 'bp_nav_overlay', 0 ) == 0 ) : ?>
<div id="buddypress">
<?php endif; ?>
	
    <?php

    /**
     * Fires before the display of member home content.
     *
     * @since 1.2.0
     */
    do_action( 'bp_before_member_home_content' ); ?>
  
  <div class="row">

      <?php if( sq_option( 'bp_full_profile', 0 ) == 0 ) : ?>
      <div class="col-sm-12">
          <div id="item-header" role="complementary">

              <?php
              /**
               * If the cover image feature is enabled, use a specific header
               */
              if ( version_compare( BP_VERSION, '2.4', '>=' ) && bp_displayed_user_use_cover_image_header() ) :
                  bp_get_template_part( 'members/single/cover-image-header' );
              else :
                  bp_get_template_part( 'members/single/member-header' );
              endif;
              ?>

          </div>
          <!-- #item-header -->
      </div>
      <?php endif ?>
	
	  <?php if ( ! sq_option( 'bp_nav_overlay', 0 ) == 1 ) : ?>
      <div class="col-sm-12">
          <div id="item-nav">
              <div class="item-list-tabs no-ajax" id="object-nav" aria-label="<?php esc_attr_e( 'Member primary navigation', 'buddypress' ); ?>" role="navigation">
                  <ul class="responsive-tabs">

                      <?php bp_get_displayed_user_nav(); ?>

                      <?php

                      /**
                       * Fires after the display of member options navigation.
                       *
                       * @since 1.2.4
                       */
                      do_action( 'bp_member_options_nav' ); ?>

                  </ul>
              </div>
          </div>
          <!-- #item-nav -->
      </div>
	  <?php endif ?>

      <div id="item-body" role="main" class="col-sm-12">

          <?php

          /**
           * Fires before the display of member body content.
           *
           * @since 1.2.0
           */
          do_action( 'bp_before_member_body' );
          
          if ( bp_is_user_front() ) :
            bp_displayed_user_front_template_part();
              
          elseif (bp_is_user_activity()) :
              bp_get_template_part('members/single/activity');

          elseif (bp_is_user_blogs()) :
              bp_get_template_part('members/single/blogs');

          elseif (bp_is_user_friends()) :
              bp_get_template_part('members/single/friends');

          elseif (bp_is_user_groups()) :
              bp_get_template_part('members/single/groups');

          elseif (bp_is_user_messages()) :
              bp_get_template_part('members/single/messages');

          elseif (bp_is_user_profile()) :
              bp_get_template_part('members/single/profile');

          elseif (bp_is_user_notifications()) :
              bp_get_template_part('members/single/notifications');

          elseif (bp_is_user_settings()) :
              bp_get_template_part('members/single/settings');

          // If nothing sticks, load a generic template
          else :
              bp_get_template_part('members/single/plugins');

          endif;

          /**
           * Fires after the display of member body content.
           *
           * @since 1.2.0
           */
          do_action('bp_after_member_body'); ?>

      </div>
      <!-- #item-body -->

  </div>
    <!-- end .row -->

    <?php

    /**
     * Fires after the display of member home content.
     *
     * @since 1.2.0
     */
    do_action( 'bp_after_member_home_content' ); ?>
	
<?php if ( sq_option( 'bp_full_profile', 0 ) == 0 || sq_option( 'bp_nav_overlay', 0 ) == 0 ) : ?>
</div><!-- #buddypress -->
<?php endif; ?>

