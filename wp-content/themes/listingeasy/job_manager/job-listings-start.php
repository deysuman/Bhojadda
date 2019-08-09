<?php
/**
 * The template for displaying the WP Job Manager start part of the listings list
 *
 * @package Listingeasy
 */

if ( is_archive() ) :
	global $wp_query;
	$term = $wp_query->queried_object;

	if ( isset( $term->description ) && !empty( $term->description ) ) : ?>

	<div class="listing_category_description" itemprop="description"><?php echo  $term->description; ?></div>

<?php endif;
endif;

?>

<div class="grid list job_listings">