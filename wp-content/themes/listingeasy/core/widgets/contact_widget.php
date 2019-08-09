<?php

class gt3_contact_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				'gt3_contact_widget', // Base ID
				'&#x1F537; ' . esc_html__( 'Listings Contact Widget', 'listingeasy'), // Name
				array(
						'description' => esc_html__( 'Listings Contact Widget', 'listingeasy' ),
				) // Widget Options
		);
	}

	function widget( $args, $instance ) {
		extract($args);
		if (get_post_type() === 'job_listing') {
			echo  $before_widget;
			$post_meta = get_post_meta(get_the_ID());
			$post_location = $post_meta['_job_location'][0];
			$post_hours = !empty($post_meta['_job_hours']) ? $post_meta['_job_hours'][0] : '';
			$post_phone = !empty($post_meta['_company_phone']) ? $post_meta['_company_phone'][0] : '';
			$post_email = !empty($post_meta['_company_email']) ? $post_meta['_company_email'][0] : '';
			$post_website = !empty($post_meta['_company_website']) ? $post_meta['_company_website'][0] : '';

			$icon_array = get_post_meta(get_the_id(), "listing_social_icon", true);
			$icon_str = "";

			if (isset($icon_array) && !empty($icon_array)) {
		        for ( $i=0; $i<count( $icon_array ); $i++ ){
		            $icon = $icon_array[$i];
		            $icon_name = !empty($icon['select']) ? $icon['select'] : '';
		            $icon_address = !empty($icon['input']) ? $icon['input'] : '#';
		            $icon_color = !empty($icon['color']) ? $icon['color'] : '';
		            $icon_str .= !empty($icon['select']) ? '<a target="_blank" href="'.esc_url($icon_address).'" '.(!empty($icon_color) ? ' style="color:'.esc_attr($icon_color).';"' : '').' class="gt3_soc_icon '.esc_attr($icon_name).'"></a>' : '';
		        }
		    }

			$geolocation_lat  = get_post_meta( get_the_ID(), 'geolocation_lat', true );
			$geolocation_long = get_post_meta( get_the_ID(), 'geolocation_long', true );

			$get_directions_link = '';
			if ( ! empty( $geolocation_lat ) && ! empty( $geolocation_long ) && is_numeric( $geolocation_lat ) && is_numeric( $geolocation_long ) ) {
				$get_directions_link = '//maps.google.com/maps?daddr=' . $geolocation_lat . ',' . $geolocation_long;
			}
			?>
			<div class="contact_widget_wrapper listing_widget_wrapper">
				<?php 
					if ($instance['widget_title'] !== '') {
						echo  $before_title;
						echo esc_attr($instance['widget_title']);
						echo  $after_title;
					}
				?>
				<?php if (!empty( $get_directions_link )) { ?>
					<div class="contact_widget_map">
						<div id="map" class="map listing-map"></div>
					</div>
					<div class="contact_widget_address">
						<i class="fa fa-map-marker contact_widget_address_icon"></i><?php echo  $post_location; ?><br><a href="<?php echo esc_url($get_directions_link); ?>" class="listing-address-directions" target="_blank"><?php echo esc_html__('Get Direction', 'listingeasy');?><i class="fa fa-angle-right"></i></a>
					</div>
				<?php } ?>
				<?php if (!empty($post_phone)) { ?>
					<div class="contact_widget_phone">
						<i class="fa fa-phone"></i><a href="tel:<?php echo esc_html($post_phone); ?>"><?php echo esc_html($post_phone); ?></a>
					</div>
				<?php } ?>
				<?php if (!empty($post_email)) { ?>
					<div class="contact_widget_email">
						<i class="fa fa-envelope"></i><a href="mailto:<?php echo  $post_email; ?>"><?php echo  $post_email; ?></a>
					</div>
				<?php } ?>
				<?php if (!empty($post_website)) { ?>
					<div class="contact_widget_email">
						<i class="fa fa-globe"></i><a href="<?php echo  esc_url($post_website); ?>"><?php echo  esc_attr($post_website); ?></a>
					</div>
				<?php } ?>
				<?php if($icon_str) : ?>
					<div class="contact_widget_socials"><div class="gt3_social_icons gt3_social_icons--team"><?php echo  $icon_str; ?></div></div>
				<?php endif; ?>
			</div>
			<?php
			echo  $after_widget;
		}
	}
	function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['widget_title'] = esc_attr( $new_instance['widget_title'] );

        return $instance;
	}

	function form($instance) {
        $defaultValues = array(
            'widget_title' => ''
        );
        $instance = wp_parse_args((array) $instance, $defaultValues);
	?>
		<table class="fullwidth">
			<tr>
				<td><?php echo esc_html__( 'Title: ', 'listingeasy' ) ?></td>
				<td><input type='text' class="fullwidth" name='<?php echo esc_attr($this->get_field_name( 'widget_title' )); ?>' value='<?php echo esc_attr($instance['widget_title']); ?>'/></td>
			</tr>
		</table>
	<?php
	}
}

function gt3_contact_widget_register_widgets() { register_widget( 'gt3_contact_widget' ); } 
add_action( 'widgets_init', 'gt3_contact_widget_register_widgets' );

?>