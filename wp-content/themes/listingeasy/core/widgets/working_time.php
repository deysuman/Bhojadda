<?php

class gt3_working_hours extends WP_Widget {

	function __construct() {
		parent::__construct(
				'gt3_working_hours', // Base ID
				'&#x1F537; ' . esc_html__( 'Listings Working Time', 'listingeasy'), // Name
				array(
					'description' => esc_html__( 'Listings Working Time', 'listingeasy' ),
				) // Widget Options
		);
	}

	function widget( $args, $instance ) {
		extract($args);
		if (get_post_type() === 'job_listing') {
			echo  $before_widget;
			$post_meta = get_post_meta(get_the_ID());
			if (!empty($post_meta['_job_hours']) && !empty($post_meta['_job_hours'][0])) {
			?>
			<div class="working_time_widget">
				<div class="working_time_title">
					<span class="working_clock_icon"><i class="fa fa-clock-o"></i></span>
					<?php echo esc_attr($instance['widget_title']); ?>
				</div>
				<div class="working_time_text">
					<?php 
						$job_hours = json_decode($post_meta['_job_hours'][0],true);	
						if (is_array($job_hours)) {
							foreach ($job_hours as $key => $job_hour) {
								if (!empty($job_hour)) {
									echo "<div class='working_time_text__item'>";
										echo !empty($job_hour['days']) ? "<div class='working_time_text__day'>".$job_hour['days']."</div>" : "";
										echo !empty($job_hour['hours']) ? "<div class='working_time_text__hours'>".$job_hour['hours']."</div>" : "";
									echo "</div>";
								}
							}
						}else{
							echo  $post_meta['_job_hours'][0];
						}
									
					?>
				</div>
			</div>
			<?php
			}
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
            'widget_title' => 'Opening hours',
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

function gt3_working_hours_register_widgets() { register_widget( 'gt3_working_hours' ); } 
add_action( 'widgets_init', 'gt3_working_hours_register_widgets' );

?>