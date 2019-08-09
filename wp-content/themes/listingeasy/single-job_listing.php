<?php
if ( !post_password_required() ) {
	get_header();
	the_post();
?>
	
    <?php
	$gt3_meta_listing_tags_area = '';
	$gt3_show_listing_tags_area = gt3_option('show_listing_tags_area');

    $layout = gt3_option('listing_single_sidebar_layout');
    $sidebar = gt3_option('listing_single_sidebar_def');
    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
        $mb_layout = rwmb_meta('mb_page_sidebar_layout');
        if (!empty($mb_layout) && $mb_layout != 'default') {
            $layout = $mb_layout;
            $sidebar = rwmb_meta('mb_page_sidebar_def');
        }
		$gt3_meta_listing_tags_area = rwmb_meta('mb_display_tags_area');
    }

	switch ($gt3_meta_listing_tags_area) {
		case "default":
			break;
		case "on":
			$gt3_show_listing_tags_area = true;
			break;
		case "off":
			$gt3_show_listing_tags_area = false;
			break;
	}

    $column = 12;
    if ( $layout == 'left' || $layout == 'right' ) {
        $column = 8;
    }else{
        $sidebar = '';
    }
    $row_class = ' sidebar_'.esc_attr($layout);
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
	$job_manager = $GLOBALS['job_manager'];

	$post_meta = get_post_meta($post->ID);

	$post_location = !empty($post_meta['_job_location']) ? $post_meta['_job_location'][0] : '';
	$post_hours = !empty($post_meta['_job_hours']) ? $post_meta['_job_hours'][0] : '';
	$post_phone = !empty($post_meta['_company_phone']) ? $post_meta['_company_phone'][0] : '';
	$post_email = !empty($post_meta['_company_email']) ? $post_meta['_company_email'][0] : '';
	$post_discount = !empty($post_meta['_discount']) ? $post_meta['_discount'][0] : '';

	$postCateg = '';
	$postCategBreadcrumb = '';
	$new_term_list = get_the_terms(get_the_id(), "job_listing_category");
	if (is_array($new_term_list)) {
		foreach ($new_term_list as $term) {
			$tempname = strtr($term->name, array(
				' ' => ' ',
			));
			$postCateg .= $tempname . ", ";
			$postCategBreadcrumb .= '<a href="'. get_term_link($term->slug, "job_listing_category") .'">' . $tempname .'</a>, ';
		}
	} else {
		$postCateg = 'Uncategorized  ';
		$postCategBreadcrumb = '<span>Uncategorized</span>  ';
	}
	$postCategBreadcrumb = substr($postCategBreadcrumb, 0, -2);
	$postCateg = substr($postCateg, 0, -2);

	// Claim Listing >= 3.x
	$listing_is_claimed  = get_post_meta( $post->ID, '_claimed', true );

	$job_listing_heading_bg = rwmb_meta('mb_job_listing_heading_bg');

	if (!empty($job_listing_heading_bg)) {
		if (is_array($job_listing_heading_bg)) {
			foreach ($job_listing_heading_bg as $key => $image) {
				$heading_bg = wp_get_attachment_url($key);
				if (!empty($heading_bg) && $heading_bg !== '') {
					$single_listing_img = $heading_bg;
				}
			}
		}else{
			$single_listing_img = $job_listing_heading_bg;
		}

	} else {
		$single_listing_img = $featured_image[0];
	}

	$card_author = $card_image_class = '';
	$job_listing_card_avatar = rwmb_meta('mb_job_listing_card_avatar');
	if (gt3_option('display_listings_author') == "1") {
		$card_image_class = 'card_has_author_info';
		if ( $listing_is_claimed === '1') {
			$claimed_icon_author = '<span class="listing-claimed-icon"><i class="fa fa-check" aria-hidden="true"></i></span>';
		} else {
			$claimed_icon_author = '';
		}

		if (!empty($job_listing_card_avatar) && gt3_option('listings_author_type') == 'custom') {
			if (is_array($job_listing_card_avatar)) {
				foreach ($job_listing_card_avatar as $key => $image) {
					$card_avatar = wp_get_attachment_url($key);
					if (!empty($card_avatar) && $card_avatar !== '') {
						$card_listing_img = $card_avatar;
					}
				}
			}else{
				$card_listing_img = $job_listing_card_avatar;
			}

			$card_listing_image = '';
			$card_listing_image_bg = ' style="background-image: url('.$card_listing_img.');"';
			$card_author_title = '';

		} else {
			$card_listing_image = get_avatar(get_the_author_meta('ID'),100);
			$card_author_title = ' title="'. esc_html( get_the_author_meta( 'display_name' ) ) .'"';
			$card_listing_image_bg = '';
		}

		if (gt3_option('listings_author_type') == 'gravatar') {
			$card_listing_image = get_avatar(get_the_author_meta('ID'),100);
			$card_author_title = ' title="'. esc_html( get_the_author_meta( 'display_name' ) ) .'"';
			$card_listing_image_bg = '';
		}

		$card_author = '
	<div class="card_author_box_avatar" '.$card_author_title.' '.$card_listing_image_bg.'>
		'. $card_listing_image .'
	</div>' . $claimed_icon_author;

		if (gt3_option('listings_author_type') == 'custom' && empty($job_listing_card_avatar)) {
			$card_author = $card_image_class = '';
		}
	}

    ?>
    <div class="listing_single_top gt3_js_bg_img single_job_listing" data-src="<?php echo esc_url($single_listing_img); ?>"
		data-latitude="<?php echo get_post_meta($post->ID, 'geolocation_lat', true); ?>"
		data-longitude="<?php echo get_post_meta($post->ID, 'geolocation_long', true); ?>">
    	<div class="gt3_lst_overlay"></div>
    	<div class="listing_single_top_content">
    		<div class="container">
	        	<div class="listing_single_top_content_inner">
	                <div class="gt3_lst_left_part <?php echo esc_attr($card_image_class); ?>">
						<?php echo $card_author; ?>
						<?php
						if (isset($post_discount) && $post_discount !== '' && $post_discount !== '0%') {
							echo '<div class="discount_label">'. esc_html__('Discount', 'listingeasy') . ' ' . esc_attr($post_discount) .'</div>';
						}
						?>
						<h1><?php the_title(); ?>
						<?php
							if ( $listing_is_claimed === '1' && (gt3_option('display_listings_author') != "1" || gt3_option('listings_author_type') == 'custom' && empty($job_listing_card_avatar)) ) {
								echo '<span class="listing-claimed-icon"><i class="fa fa-check"></i></span>';
							}
						?>
						</h1>
						<?php
							if (gt3_option('display_listings_rating') == "1") {
								echo '<div class="gt3_lst_stars">';
								if ( class_exists( 'WP_Job_Manager_Reviews' ) ) {
									// Job Manager Reviews
									$star_count = esc_attr(wpjmr_get_reviews_average( get_the_ID() ));
									$total_reviews_count = esc_attr(wpjmr_get_reviews_count( get_the_ID() ));
									$stars_code = wpjmr_reviews_get_stars( get_the_ID() );

									if ($total_reviews_count == 1) {
										$review_text = esc_html__('Review', 'listingeasy');
									} else {
										$review_text = esc_html__('Reviews', 'listingeasy');
									}
									echo '<div class="gt3_stars_wrapper" title="'.$star_count.'" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><meta itemprop="ratingValue" content="'.$star_count.'"><meta itemprop="reviewCount" content="'.$total_reviews_count.'">'.$stars_code . '</div> (' . esc_html($total_reviews_count) . ' ' . $review_text . ')';
								} else {
									// Default Reviews
									$total_reviews = gt3_get_total_ratings_count(get_the_ID());
									if ($total_reviews == 1) {
										$review_text = esc_html__('Review', 'listingeasy');
									} else {
										$review_text = esc_html__('Reviews', 'listingeasy');
									}
									echo '<div class="head_rating_stars listing_stars'. gt3_get_average_ratings(get_the_ID()) .'"></div> (' . $total_reviews . ' ' . $review_text . ')';
								}
								echo '</div>';
							}
						?>
						<div class="gt3_lst_meta">
							<?php
							if (isset($post_location) && $post_location !== '') {
								echo '<span><i class="fa fa-map-marker"></i>'. esc_attr($post_location) .'</span>';
							}
							if (isset($post_phone) && $post_phone !== '') {
								echo '<span><i class="fa fa-phone"></i><a href="tel:'. esc_attr($post_phone) .'">'. esc_attr($post_phone) .'</a></span>';
							}
							if (isset($post_email) && $post_email !== '') {
								echo '<span><i class="fa fa-envelope"></i><a href="mailto:'. esc_attr($post_email) .'">'. esc_attr($post_email) .'</a></span>';
							}
							?>
						</div>
					</div><!-- .gt3_lst_left_part -->
	                <div class="gt3_lst_right_part">
						<?php 
							//do_action( 'gt3_listing_bookmark_out', $post );
							global $job_manager_bookmarks;
							if ( method_exists( $job_manager_bookmarks, 'bookmark_form' ) ) {
								$job_manager_bookmarks->bookmark_form();
							}
						?>
						<div class="listing_single_share_wrapper">
							<a href="<?php echo esc_js("javascript:void(0)"); ?>" class="btn_share_toggler"><i class="fa fa-share-alt"></i><?php echo esc_html__('Share','listingeasy'); ?></a>
							<div class="listing_single_share_inner">
								<a target="_blank" class="listing_share_facebook" href="<?php echo  esc_url('https://www.facebook.com/share.php?u='. get_permalink()); ?>"><span class="fa fa-facebook"></span></a>
								<a target="_blank"  class="listing_share_twitter" href="<?php echo esc_url('https://twitter.com/intent/tweet?text='. get_the_title() .'&amp;url='. get_permalink()); ?>"><span class="fa fa-twitter"></span></a>
								<a target="_blank"  class="listing_share_google share_gplus" href="<?php echo esc_url('https://plus.google.com/share?url='.urlencode(get_permalink())); ?>"><span class="fa fa-google-plus"></span></a>
								<?php
									if (strlen($featured_image[0]) > 0) {
										echo '<a target="_blank" class="listing_share_pinterest" href="'. esc_url('https://pinterest.com/pin/create/button/?url='. get_permalink() .'&media='. $featured_image[0]) .'"><span class="fa fa-pinterest-p"></span></a>';
									}
								?>
							</div>
						</div><!-- .listing_single_share_wrapper -->

						<?php if ('open' == $post->comment_status) { ?>
						<a href="<?php echo esc_js("javascript:void(0)"); ?>" class="single_listing_go2review"><?php echo esc_html__('Submit review','listingeasy'); ?><i class="fa fa-angle-right"></i></a>
						<?php }	?>
	                </div><!-- .gt3_lst_right_part -->
	            </div>
	        </div>
        </div>
    </div>
    <div class="lisging_single_breadcrumb container">
    	<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home', 'listingeasy'); ?></a>
        <span class="listing_categ_divider"></span>
        <?php echo  $postCategBreadcrumb; ?>
        <span class="listing_categ_divider"></span>
		<span class="lisging_single_breadcrumb_posttitle"><?php echo get_the_title(); ?></span>
    </div>
    <div class="container">
        <div class="row<?php echo esc_attr($row_class); ?>">
            <div class="content-container span<?php echo (int)$column; ?>">
				<?php
				$jl_post_images = rwmb_meta('mb_job_listing_images');

				if (count($jl_post_images) == 1) {
					$onlyOneImage = "oneImage";
				} else {
					$onlyOneImage = "";
				}

				if (is_array($jl_post_images) && !empty($jl_post_images)) {
					wp_enqueue_script('gt3_single_slider', get_template_directory_uri() . '/js/gt3_single_slider.js', array('jquery'), false, true);
					$img_width = 1170;
					$img_height = 760;
					$img_ratio = $img_height/$img_width;
					$thmb_width = 340;
					$thmb_height = 240;
					$thmb_ratio = $thmb_height/$thmb_width;
					//gt3_pre($jl_post_images);
					?>
					<div class="gt3_single_slider_wrapper <?php echo esc_attr($onlyOneImage); ?>">
						<div class="gt3_single_slider_large_image">
							<div class="gt3_single_slider" data-ratio="<?php echo esc_attr($img_ratio); ?>">
							<?php 
							$count = 0;
							foreach ($jl_post_images as $key => $image) {
								$count++;
								$featured_image = wp_get_attachment_url($key);
								if (!empty($featured_image) && $featured_image !== '') {
									echo '<div class="gt3_single_slide gt3_js_bg_img gt3_single_slide'. $count .'" data-count="'. $count .'" data-src="'. aq_resize(esc_url($featured_image), 1170, 760, true, true, true) .'"></div>';
								}					
							}
							?>
							</div><!-- .gt3_single_slider -->
							<div class="gt3_single_slider_controls">
								<a href="<?php echo esc_js("javascript:void(0)"); ?>" class="gt3_single_slider_prev_btn"><i class="fa fa-angle-left"></i></a>
								<a href="<?php echo esc_js("javascript:void(0)"); ?>" class="gt3_single_slider_next_btn"><i class="fa fa-angle-right"></i></a>
							</div><!-- .gt3_single_slider_controls -->
						</div><!-- .gt3_single_slider_large_image -->
						<div class="gt3_single_slider_thumbs_wrapper">
							<div class="gt3_single_slider_thumbs">
									<?php 
									$count = 0;
									foreach ($jl_post_images as $key => $image) {
										$count++;
										$featured_image = wp_get_attachment_url($key);
										if (!empty($featured_image) && $featured_image !== '') {
											echo '<div class="gt3_single_thmb gt3_js_bg_img gt3_single_thmb'. $count .'" data-count="'. $count .'" data-src="'. aq_resize(esc_url($featured_image), 340, 240, true, true, true) .'" data-ratio="'. $img_ratio .'"></div>';
										}					
									}
									?>
							</div><!-- .gt3_single_slider_thumbs -->
						</div><!-- .gt3_single_slider_thumbs_wrapper -->
					</div><!-- .listing_single_slider_wrapper -->		
					<?php 
				}
				?>
   
                <section id='main_content' class="listing_post_main_content gt3_listing_preview_post">
					<?php
						$tags = wp_get_object_terms( $post->ID, 'job_listing_tag' );

						if (isset($gt3_show_listing_tags_area) && $gt3_show_listing_tags_area) {
							if ($tags && is_array($tags)) { ?>
								<div class="single_listing_tags">
									<?php foreach ($tags as $tag) { ?>
										<div class="tag_item">
											<?php $tag_link = esc_url(get_term_link($tag)); ?>
											<a href="<?php echo esc_url($tag_link); ?>" class="listing-tag">
												<?php
												$term_icon_array = gt3_get_term_icon_url( $tag->term_id ,'');
												if (!empty($term_icon_array[0])) {
													$term_icon_url = $term_icon_array[0];
												}else{
													$term_icon_url = '';
												}
												if (!empty($term_icon_array[1])) {
													$term_icon_width = $term_icon_array[1];
												}else{
													$term_icon_width = '';
												}
												if (!empty($term_icon_array['attachment_id'])) {
													$term_icon_id = $term_icon_array['attachment_id'];
												}else{
													$term_icon_id = gt3_get_term_icon_id($tag->term_id);
												}

												ob_start();
												$tag_icon_code = gt3_display_image( $term_icon_url, '', true, $term_icon_id, $term_icon_width);
												$tag_icon_code = ob_get_clean();
												if ($term_icon_url) :
													?>
													<div class="tag_icon"><?php echo  $tag_icon_code ?></div>
												<?php endif; ?>
												<div class="tag_name"><?php echo esc_html($tag->name); ?></div>
											</a>
										</div>
									<?php } ?>
								</div>
							<?php }
						}

						ob_start();

						the_content();

						$desc_content = ob_get_clean();

						if (!empty($desc_content )) {
							echo '<div class="single_job_description" itemprop="description">' . $desc_content . '</div>';
						}
						if (gt3_option("page_comments") == "1") { ?>
							<div class="clear"></div>
							<?php comments_template(); ?>
					<?php } ?>
                </section>
            </div>
            <?php
            if ($layout == 'left' || $layout == 'right') {
                echo '<div class="sidebar-container span'.(12 - (int)$column).'">';
					if (is_active_sidebar($sidebar)) {
						echo "<aside class='sidebar'>";
						dynamic_sidebar($sidebar);
						echo "</aside>";
					}
                echo "</div>";
            }
            ?>           
        </div>
     
    </div>

	<?php

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