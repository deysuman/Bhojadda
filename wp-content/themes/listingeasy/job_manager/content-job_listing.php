<?php
/**
 * The template for displaying the WP Job Manager listing on archives
 *
 * @package Listingeasy
 */

global $post;

$taxonomies  = array();
$terms       = get_the_terms( get_the_ID(), 'job_listing_category' );
$termString  = '';
$label_color_style = '';
$cat_icon_code = '';

$image_width = 800;
$image_height = 600;
$img_url = aq_resize(get_the_post_thumbnail_url(), $image_width, $image_height, true, true, true);
if (empty($img_url)) {
	$img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
}

if ( ! is_wp_error( $terms ) && ( is_array( $terms ) || is_object( $terms ) ) ) {
	$firstTerm = $terms[0];
	if ( ! $firstTerm == null ) {
		$term_id = $firstTerm->term_id;
		$count = 1;
		foreach ( $terms as $term ) {
			$termString .= $term->name;
			if ( $count != count( $terms ) ) {
				$termString .= ', ';
			}
			$count ++;
		}

		// Category icon code
		$term_icon_array = gt3_get_term_icon_url( $term_id );
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
			$term_icon_id = gt3_get_term_icon_id($term_id);
		}
		ob_start();
		$cat_icon_code = gt3_display_image( $term_icon_url, '', true, $term_icon_id, $term_icon_width);
		$cat_icon_code = ob_get_clean();

		// Category label color
		$gt3_listing_label_color = get_term_meta( $term_id, 'gt3_listing_label_color', true );
		if (strlen($gt3_listing_label_color) > 0) {
			$label_color_style = ' data-color="'.esc_attr($gt3_listing_label_color).'"';
		}
	}
}

$listing_classes = 'card  card--listing';
// Claim Listing >= 3.x
$listing_is_claimed  = get_post_meta( $post->ID, '_claimed', true );
$listing_is_featured = false;

if ( is_position_featured( $post ) ) {
	$listing_is_featured = true;
}

if ( true === $listing_is_featured ) {
	$listing_classes .= '  is--featured';
}

$listing_classes = apply_filters( 'gt3_listing_archive_classes', $listing_classes, $post );

$card_discount = get_post_meta( $post->ID, '_discount', true );

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

$gt3_listing_phone = get_post_meta( $post->ID, '_company_phone', true );

?>

<div class="grid__item">
	<article class="<?php echo esc_attr( $listing_classes ); ?>" itemscope itemtype="http://schema.org/LocalBusiness"
	         data-latitude="<?php echo esc_attr( get_post_meta( $post->ID, 'geolocation_lat', true ) ); ?>"
	         data-longitude="<?php echo esc_attr( get_post_meta( $post->ID, 'geolocation_long', true ) ); ?>"
	         data-img="<?php echo esc_url($img_url); ?>"
	         data-permalink="<?php echo esc_attr( get_the_job_permalink() ); ?>"
	         data-categories="<?php echo esc_attr( $termString ); ?>"
		<?php echo  $label_color_style; ?> >
		<h3 class="gt3_hidden"><?php echo get_the_title();	?></h3>
		<a href="<?php the_job_permalink(); ?>" class="card__link"></a>
		<aside class="card__image <?php echo esc_attr($card_image_class); ?>" <?php echo (strlen($img_url) ? 'style="background-image: url('. esc_url($img_url).');"' : ''); ?>>
			<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
	            <meta itemprop="url" content="<?php echo esc_url($img_url); ?>">
            </div>
            <?php 
            if (!empty($gt3_listing_phone)) {
            ?><meta itemprop="telephone" content="<?php echo esc_html($gt3_listing_phone); ?>"><?php 
        	} ?>
			<div class="card_labels">
			<?php
				if (strlen($card_discount > 0)) {
					echo '<div class="card_discount"><span>'.esc_html__('Discount', 'listingeasy').' '.$card_discount.'</span></div>';
				}
				if ( true === $listing_is_featured ): ?>
					<div class="card_featured"><span><?php esc_html_e( 'Featured', 'listingeasy' ); ?></span></div>
				<?php endif;
				
				// do_action( 'gt3_job_listing_card_image_top', $post );
				// do_action( 'gt3_job_listing_card_image_bottom', $post );
			?>
			</div>
			<?php
				if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
					ob_start();
					if ( class_exists( 'WP_Job_Manager_Products' ) || class_exists( 'GT3_JM_Products_Integration' ) ) {
						gt3_listing_product_price($post);
					}
					$gt3_listing_product_price = ob_get_clean();
					if (!empty($gt3_listing_product_price)) {
						?>
						<div class="card_price"><?php echo  $gt3_listing_product_price; ?></div>
					<?php
					}
				}
			?>
			<?php echo $card_author; ?>
		</aside><!-- .card__image -->
		<div class="card__content">
			<h3 class="card__title" itemprop="name"><?php
				if ( $listing_is_claimed === '1' && (gt3_option('display_listings_author') != "1" || gt3_option('listings_author_type') == 'custom' && empty($job_listing_card_avatar)) ) {
					echo '<span class="listing-claimed-icon">';
					echo '<i class="fa fa-check" aria-hidden="true"></i>';
					echo '</span>';
				}
				echo get_the_title();
				 ?></h3>
			<div class="card__tagline" itemprop="description"><?php the_company_tagline(); ?></div>
			<footer class="card__footer">
				<?php
				$ID = get_the_ID();
				if ( class_exists( 'WP_Job_Manager_Reviews' ) ) {
					// Job Manager Reviews
					$rating = esc_attr(wpjmr_get_reviews_average( get_the_ID() ));
					$total_reviews = esc_attr(wpjmr_get_reviews_count( get_the_ID() ));
					$stars_code = wpjmr_reviews_get_stars( get_the_ID() );
				} else {
					// Default Reviews
					$rating = gt3_get_average_ratings($ID);
					$total_reviews = gt3_get_total_ratings_count($ID);
				}

				if ( ! empty( $rating ) && gt3_option('display_listings_rating') == "1" ) { ?>
					<div class="rating  card__rating" title="<?php echo $rating; ?>" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
						<meta itemprop="ratingValue" content="<?php echo  $rating; ?>"><meta itemprop="reviewCount" content="<?php echo  $total_reviews; ?>">
						<?php if ( class_exists( 'WP_Job_Manager_Reviews' ) ) { ?>
							<div class="gt3_stars_wrapper"><?php echo $stars_code; ?></div>
						<?php } else { ?>
							<div class="head_rating_stars listing_stars<?php echo  $rating; ?>"></div>
						<?php } ?>
					</div>
				<?php 
				}

				$listing_address = gt3_get_formatted_address( $post );
				?><div class="card_footer__container"><?php
				if ( ! empty( $listing_address ) ) { ?>
					<div class="address  card__address" itemprop="address" itemscope
					     itemtype="http://schema.org/PostalAddress">
					     <i class="fa fa-map-marker" aria-hidden="true"></i> 
						<?php echo  $listing_address ?>
						<div class="hover_label"><?php esc_html_e( 'Explore', 'listingeasy' ); ?><i class="fa fa-angle-right"></i></div>
					</div>
				<?php 
				} else { ?>
					<div class="address card__address empty_address"></div>
				<?php
				}
				global $job_manager_bookmarks;
				if ( method_exists( $job_manager_bookmarks, 'bookmark_form' ) ) {
					$job_manager_bookmarks->bookmark_form();
				} 
				?>
				</div>
			</footer>
		</div><!-- .card__content -->
		
		<div class="gt3_listing_category_icon category-icon"><?php echo (strlen($cat_icon_code) ? $cat_icon_code : 'i'); ?></div>
	</article>
</div><!-- .grid__item -->

