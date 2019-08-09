<?php
if (post_password_required()) {
    ?>
    <p class="nocomments"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'listingeasy'); ?></p>
    <?php return;
}

$visibility_reviews = '';
if (gt3_option('display_listings_rating') !== "1") {
	$visibility_reviews = ' class="hide_comments_reviews"';
}

?>

<div id="comments" <?php echo $visibility_reviews; ?>><?php
#Required for nested reply function that moves reply inline with JS
if (is_singular()) wp_enqueue_script('comment-reply');

if (have_comments()) : 
	if (get_post_type() === 'job_listing') {
	?>
		<div class="listing_post_reviews_wrapper">
			<h4 class="listing_post_reviews_title"><?php echo comments_number('0', '1', '%'); ?> <?php echo esc_html__('Reviews', 'listingeasy'); ?></h4>
			<ol class="commentlist">
			<?php
				if (gt3_option("post_pingbacks") == "1") {
					wp_list_comments('type=all&callback=gt3_theme_comment');
				} else {
					wp_list_comments('type=comment&callback=gt3_theme_comment');
				}
			?>
			</ol>
		</div>
	<?php } else { ?>
		<h3><?php echo comments_number('0', '1', '%'); ?> <?php echo esc_html__('comments on this post', 'listingeasy'); ?></h3>
		<ol class="commentlist">
		<?php
			if (gt3_option("post_pingbacks") == "1") {
				wp_list_comments('type=all&callback=gt3_theme_comment');
			} else {
				wp_list_comments('type=comment&callback=gt3_theme_comment');
			}
		?>
		</ol>
	<?php } ?>
    <div class="dn"><?php paginate_comments_links(); ?></div>
    <?php if ('open' == $post->comment_status) : ?>
    <?php else : // comments are closed ?>
    <?php endif; ?>
<?php endif; ?>
<?php
	$comment_form = '';

	if (get_post_type() === 'job_listing') {
		if ('open' == $post->comment_status)  {
			$comment_form = array(
				'fields' => apply_filters('comment_form_default_fields', array(
					'author' => '<div class="comment_form_name_wrapper"><input type="text" placeholder="' . esc_html__('Your Name *', 'listingeasy') . '" title="' . esc_html__('Name *', 'listingeasy') . '" id="author" name="author" class="form_field"></div>',
					'email' => '<div class="comment_form_email_wrapper"><input type="text" placeholder="' . esc_html__('Email Address *', 'listingeasy') . '" title="' . esc_html__('Email *', 'listingeasy') . '" id="email" name="email" class="form_field"></div>',
					'url' => '',
					'rate' => (class_exists( 'WP_Job_Manager_Reviews' ) || gt3_option('display_listings_rating') == "0" ) ? '' : '<div class="listing_rating_wrapper">
							<div class="rating_for_not_user">'.
						esc_html__('Your Rating', 'listingeasy') .'
								<div class="comment-rating">
									<ul class="star-rating">
										<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Really bad - 1 star', 'listingeasy') .'" class="one-star" onclick="rateClick(1); return false;">1</a></li>
										<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Bad - 2 stars', 'listingeasy') .'" class="two-stars" onclick="rateClick(2); return false;">2</a></li>
										<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Good - 3 stars', 'listingeasy') .'" class="three-stars" onclick="rateClick(3); return false;">3</a></li>
										<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Very good - 4 stars', 'listingeasy') .'" class="four-stars" onclick="rateClick(4); return false;">4</a></li>
										<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Excellent - 5 stars', 'listingeasy') .'" class="five-stars" onclick="rateClick(5); return false;">5</a></li>
									</ul>
								</div>
								<input type="hidden" name="rate" class="rate" value="'. (isset($comment_author_rate) ? esc_attr($comment_author_rate) : '0') .'"/>
							</div>
						</div>',
				)),
				'comment_field' => (class_exists( 'WP_Job_Manager_Reviews' ) || gt3_option('display_listings_rating') == "0" ) ? '<div class="comment_form_text_wrapper"><textarea name="comment" cols="45" rows="5" placeholder="' . esc_html__('Tell us your experience...', 'listingeasy') . '" id="comment-message" class="form_field"></textarea></div>' : '<div class="listing_rating_wrapper rating_for_user">
						'. esc_html__('Your Rating', 'listingeasy') .'
						<div class="comment-rating">
							<ul class="star-rating">
								<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Really bad - 1 star', 'listingeasy') .'" class="one-star" onclick="rateClick(1); return false;">1</a></li>
								<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Bad - 2 stars', 'listingeasy') .'" class="two-stars" onclick="rateClick(2); return false;">2</a></li>
								<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Good - 3 stars', 'listingeasy') .'" class="three-stars" onclick="rateClick(3); return false;">3</a></li>
								<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Very good - 4 stars', 'listingeasy') .'" class="four-stars" onclick="rateClick(4); return false;">4</a></li>
								<li><a href="'. esc_js("javascript:void(0)") .'" title="'. esc_html__('Excellent - 5 stars', 'listingeasy') .'" class="five-stars" onclick="rateClick(5); return false;">5</a></li>
							</ul>
						</div>
						<input type="hidden" name="rate" class="rate" value="'. (isset($comment_author_rate) ? esc_attr($comment_author_rate) : '0') .'"/>
					</div>
					<div class="comment_form_text_wrapper"><textarea name="comment" cols="45" rows="5" placeholder="' . esc_html__('Tell us your experience...', 'listingeasy') . '" id="comment-message" class="form_field"></textarea></div>',
				'comment_form_before' => '',
				'comment_form_after' => '',
				'must_log_in' => esc_html__('You must be logged in to post a comment.', 'listingeasy'),
				'title_reply_before' => '<h4 id="reply-title" class="listing_post_reviews_title">',
				'title_reply_after' => '</h4>',
				'title_reply' => esc_html__('Rate & Write Reviews', 'listingeasy'),
				'label_submit' => esc_html__('Submit your review', 'listingeasy'),
				'logged_in_as' => '<p class="logged-in-as">' . esc_html__('Logged in as', 'listingeasy') . ' <a href="' . esc_url(admin_url('profile.php')) . '">' . $user_identity . '</a>. <a href="' . esc_url(wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '">' . esc_html__('Log out?', 'listingeasy') . '</a></p>',
			);
		}
	} else {
		if ('open' == $post->comment_status) {
			$comment_form = array(
				'fields' => apply_filters('comment_form_default_fields', array(
					'author' => '<div class="comment_form_name_wrapper"><input type="text" placeholder="' . esc_html__('Name *', 'listingeasy') . '" title="' . esc_html__('Name *', 'listingeasy') . '" id="author" name="author" class="form_field"></div>',
					'email' => '<div class="comment_form_email_wrapper"><input type="text" placeholder="' . esc_html__('Email *', 'listingeasy') . '" title="' . esc_html__('Email *', 'listingeasy') . '" id="email" name="email" class="form_field"></div>',
					'url' => '<div class="comment_form_url_wrapper"><input type="text" placeholder="' . esc_html__('Website', 'listingeasy') . '" title="' . esc_html__('Website', 'listingeasy') . '" id="url" name="url" class="form_field"></div>'
				)),
				'comment_field' => '<div class="comment_form_text_wrapper"><textarea name="comment" cols="45" rows="5" placeholder="' . esc_html__('Your Comment', 'listingeasy') . '" id="comment-message" class="form_field"></textarea></div>',
				'comment_form_before' => '',
				'comment_form_after' => '',
				'must_log_in' => esc_html__('You must be logged in to post a comment.', 'listingeasy'),
				'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
				'title_reply_after' => '</h3>',
				'title_reply' => esc_html__('Leave a Comment', 'listingeasy'),
				'label_submit' => esc_html__('Post comment', 'listingeasy'),
				'logged_in_as' => '<p class="logged-in-as">' . esc_html__('Logged in as', 'listingeasy') . ' <a href="' . esc_url(admin_url('profile.php')) . '">' . $user_identity . '</a>. <a href="' . esc_url(wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '">' . esc_html__('Log out?', 'listingeasy') . '</a></p>',
			);
		}
	}

	add_filter('comment_form_fields', 'gt3_reorder_comment_fields');
	
	if (!function_exists('gt3_reorder_comment_fields')) {
		function gt3_reorder_comment_fields($fields ) {
			$new_fields = array();
			if (get_post_type() === 'job_listing') {
				$myorder = array('rate', 'author', 'email', 'url', 'comment');
			} else {
				$myorder = array('author', 'email', 'url', 'comment');
			}

			foreach( $myorder as $key ){
				$new_fields[ $key ] = $fields[ $key ];
				unset( $fields[ $key ] );
			}

			if( $fields ) {
				foreach( $fields as $key => $val ) {
					$new_fields[ $key ] = $val;
				}
			}

			return $new_fields;
		}
	}
    

    comment_form($comment_form, $post->ID);

?></div>