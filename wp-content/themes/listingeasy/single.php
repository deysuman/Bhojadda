<?php 
if ( !post_password_required() ) {
	get_header();
	the_post();

	$layout = gt3_option('blog_single_sidebar_layout');
	$sidebar = gt3_option('blog_single_sidebar_def');
	if (class_exists( 'RWMB_Loader' )) {
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
	$row_class = ' sidebar_'.$layout;

	$show_likes = gt3_option('blog_post_likes');
	$show_share = gt3_option('blog_post_share');

	$all_likes = gt3pb_get_option("likes");

	$comments_num = '' . get_comments_number(get_the_ID()) . '';

	if ($comments_num == 1) {
		$comments_text = '' . esc_html__('comment', 'listingeasy') . '';
	} else {
		$comments_text = '' . esc_html__('comments', 'listingeasy') . '';
	}

	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');

	$pf = get_post_format();
	if (empty($pf)) $pf = "standard";

	$width = '1170';
	$height = '835';

	$pf_media = gt3_get_pf_type_output($pf, $width, $height, $featured_image);
	$pf = $pf_media['pf'];

	$post_title = get_the_title();

	$pf_post_icon = gt3_option('blog_post_listing_icon');
?>

<div class="container">
        <div class="row<?php echo esc_attr($row_class); ?>">
            <div class="content-container span<?php echo (int)esc_attr($column); ?>">
                <section id='main_content'>
					<div class="blog_post_preview format-<?php echo esc_attr($pf); ?>">
						<div <?php post_class("single_meta"); ?>>
							<div class="item_wrapper">
								<div class="blog_content">
									<?php
										echo  $pf_media['content'];

										ob_start();
										the_category(', ');
										$post_cats = ob_get_clean();
										if (!empty($post_cats)) {
											echo '<div class="post_meta_categories">'. $post_cats .'</div>';
										}
									
										if (strlen($post_title) > 0) {
											$pf_icon = '';
											if ($pf_post_icon == "1") {
												if ($pf == 'standard-image') {
													$pf_icon = '<i class="fa fa-camera"></i>';
												} else if ($pf == 'gallery') {
													$pf_icon = '<i class="fa fa-files-o"></i>';
												} else if ($pf == 'audio') {
													$pf_icon = '<i class="fa fa-headphones"></i>';
												} else if ($pf == 'video') {
													$pf_icon = '<i class="fa fa-youtube-play"></i>';
												} else if ($pf == 'link' || $pf == 'quote') {
													$pf_icon = '';
												} else {
													$pf_icon = '<i class="fa fa-file-text"></i>';
												}
											}
											if ( is_sticky() ) {
												$pf_icon = '<i class="fa fa-thumb-tack"></i>';
											}

											$page_title_conditional = ((gt3_option('page_title_conditional') == '1' || gt3_option('page_title_conditional') == true)) ? 'yes' : 'no' ;

											if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
												$mb_page_title_conditional = rwmb_meta('mb_page_title_conditional');
									            if ($mb_page_title_conditional == 'yes') {
									                $page_title_conditional = 'yes';
									            }elseif($mb_page_title_conditional == 'no'){
									                $page_title_conditional = 'no';
									            }
											}

											$blog_title_conditional = ((gt3_option('blog_title_conditional') == '1' || gt3_option('blog_title_conditional') == true)) ? 'yes' : 'no';

									        if (is_singular('post') && $page_title_conditional == 'yes' && $blog_title_conditional == 'no') {
									            $page_title_conditional = 'no';
									        }

											if ( $page_title_conditional != 'yes') {
												echo '<h2 class="blogpost_title">' . $pf_icon . esc_html($post_title) . '</h2>';
											}
										}
										?>
										<div class="listing_meta">
											<span><?php echo esc_html(get_the_time(get_option( 'date_format' ))); ?></span><span><?php echo esc_html__("by", 'listingeasy'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author_meta('display_name')); ?></a></span><span><a href="<?php echo esc_url(get_comments_link()); ?>"><?php echo esc_html(get_comments_number(get_the_ID())); ?> <?php echo  $comments_text; ?></a></span>
										</div>
										<?php
										the_content();
										wp_link_pages(array('before' => '<div class="page-link"><span class="pagger_info_text">' . esc_html__('Pages', 'listingeasy') . ': </span>', 'after' => '</div>'));
									?>
									<div class="dn"><?php posts_nav_link(); ?></div>
									<div class="clear"></div>
									<div class="post_tags text-center">
										<?php 
											ob_start();
												the_tags("", ' ', ''); 
											$post_tags = ob_get_clean();
										?>
										<div class="tagcloud">
											<?php echo  $post_tags; ?>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="post_info">
						<?php if ($show_share == "1") {	?>
							<!-- post share block -->
							<div class="post_share">
								<ul>
									<li class="post_facebook"><a target="_blank" href="<?php echo  esc_url('https://www.facebook.com/share.php?u='. get_permalink()); ?>"><span class="fa fa-facebook"></span></a></li>
									<li class="post_tweet"><a target="_blank" href="<?php echo esc_url('https://twitter.com/intent/tweet?text='. get_the_title() .'&amp;url='. get_permalink()); ?>"><span class="fa fa-twitter"></span></a></li>
									<li class="post_google"><a target="_blank" href="<?php echo esc_url('https://plus.google.com/share?url='.urlencode(get_permalink())); ?>" class="share_gplus"><span class="fa fa-google-plus"></span></a></li>
									<?php
									if (strlen($featured_image[0]) > 0) {
										echo '<li class="post_pinterest"><a target="_blank" href="'. esc_url('https://pinterest.com/pin/create/button/?url='. get_permalink() .'&media='. $featured_image[0]) .'"><span class="fa fa-pinterest"></span></a></li>';
									}
									?>
								</ul>
							</div>
							<!-- //post share block -->
						<?php
						}
						if ($show_likes == "1") {
							if (isset($all_likes[get_the_ID()]) && $all_likes[get_the_ID()] == 1) {
								$likes_text_label = esc_html__('Like', 'listingeasy');
							} else {
								$likes_text_label = esc_html__('Likes', 'listingeasy');
							}
							echo'<div class="likes_block post_likes_add '. (isset($_COOKIE['like_post'.get_the_ID()]) ? "already_liked" : "") .'" data-postid="'. esc_attr(get_the_ID()).'" data-modify="like_post">
	                                            <span class="icon"><i class="fa fa-heart-o"></i></span>
	                                            <span class="like_count">'.((isset($all_likes[get_the_ID()]) && $all_likes[get_the_ID()]>0) ? $all_likes[get_the_ID()] : 0).'</span> <span class="like_title">'.$likes_text_label.'</span>
	                                        </div>';
						} ?>
						<div class="clear"></div>
					</div>
					<?php if(gt3_option('author_box')) { ?>
						<div class="gt3_author_box">
							<div class="gt3_author_box__avatar">
								<?php
									$user = get_the_author_meta('ID');
									echo get_avatar($user,200);
								?>
							</div>
							<h5 class="gt3_author_box__name">
								<?php echo esc_html( get_the_author_meta( 'display_name' ) );?>
							</h5>
							<div class="gt3_author_box__desc"><?php echo get_the_author_meta('user_description');?></div>
						</div>
					<?php } ?>
					<!-- prev next links -->
					<div class="prev_next_links">
						<?php
						$prev_post = get_adjacent_post(false, '', true);
						$next_post = get_adjacent_post(false, '', false);
						if($prev_post){
							$post_url = get_permalink($prev_post->ID);
							echo '<div class="fleft"><a href="' . esc_url($post_url) . '" title="' . esc_html($prev_post->post_title) . '"><i class="fa fa-angle-left"></i>' . esc_html__('Prev', 'listingeasy') . '</a></div>';
						}
						if($next_post) {
							$post_url = get_permalink($next_post->ID);
							echo '<div class="fright"><a href="' . esc_url($post_url) . '" title="' . esc_html($next_post->post_title) . '">' . esc_html__('Next', 'listingeasy') . '<i class="fa fa-angle-right"></i></a></div>';
						}
						?>
						<div class="clear"></div>
					</div>
					<!-- //prev next links -->





					<?php
						// Related Posts
						$show_post_featured = gt3_option("related_posts");
						if ($show_post_featured == "1" && class_exists('Vc_Manager')) {
							// Get Cats_ID
							if (get_the_category()) $categories = get_the_category();
							if ($categories) {
								$post_categ = '';
								$post_category_compile = '';
								foreach ($categories as $category) {
									$post_categ = $post_categ . $category->cat_ID . ',';
								}
								$post_category_compile .= '' . trim($post_categ, ',') . '';
							}
							echo '<div class="gt3_module_title"><h2>' . esc_html__('Related Posts', 'listingeasy') . '</h2></div>';
							echo do_shortcode('[gt3_featured_posts
							view_type => "type4",
							module_title=""
							meta_author="yes"
							meta_comments="" 
							meta_categories="yes"
							meta_position="after_title"
							pf_post_icon="no"
							image_proportions="4_3"
							post_read_more_link=""
							boxed_text_content=""
							items_per_line="'.(($layout == "none") ? "3" : "2").'"
							content_letter_count="0"
							build_query="size:'.(($layout == "none") ? "3" : "2").'|order_by:rand|categories:'.$post_category_compile.'"]');
						}
					?>
					<?php if (gt3_option('post_comments') == "1") {?>
						<div class="row">
							<div class="span12">
								<?php comments_template(); ?>
							</div>
						</div>
					<?php } ?>
				</section>
			</div>
			<?php
			if ($layout == 'left' || $layout == 'right') {
				echo '<div class="sidebar-container span'.(12 - (int)esc_attr($column)).'">';
				if (is_active_sidebar( $sidebar )) {
					echo "<aside class='sidebar'>";
					dynamic_sidebar( $sidebar );
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