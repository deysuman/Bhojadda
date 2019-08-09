<?php
$comments_num = '' . get_comments_number(get_the_ID()) . '';

if ($comments_num == 1) {
	$comments_text = '' . esc_html__('comment', 'listingeasy') . '';
} else {
	$comments_text = '' . esc_html__('comments', 'listingeasy') . '';
}

$post_date = $post_author = $post_category_compile = $post_comments = '';

// Categories
if (get_the_category()) $categories = get_the_category();
if (!empty($categories)) {
	$post_categ = '';
	$post_category_compile = '<div class="post_meta_categories">';
	foreach ($categories as $category) {
		$post_categ = $post_categ . '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . ', ';
	}
	$post_category_compile .= ' ' . trim($post_categ, ', ') . '</div>';
}else{ $post_category_compile = '';}

$post = get_post();

$post_date = '<span>' . esc_html(get_the_time(get_option( 'date_format' ))) . '</span>';

$post_author = '<span>' . esc_html__("by", 'listingeasy') . ' <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author_meta('display_name')) . '</a></span>';

$post_comments = '<span><a href="' . esc_url(get_comments_link()) . '">' . esc_html(get_comments_number(get_the_ID())) . ' ' . $comments_text . '</a></span>';

// Post meta
$post_meta =  $post_date . $post_author . $post_comments;

$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');

$pf = get_post_format();
if (empty($pf)) $pf = "standard";

ob_start();
if (has_excerpt()) {
	$post_excerpt = the_excerpt();
} else {
	$post_excerpt = the_content();
}
$post_excerpt = ob_get_clean();

$width = '1170';
$height = '835';

$pf_media = gt3_get_pf_type_output($pf, $width, $height, $featured_image);

$pf = $pf_media['pf'];


$symbol_count = '400';

if (gt3_option('blog_post_listing_content') == "1") {
	$post_excerpt = preg_replace( '~\[[^\]]+\]~', '', $post_excerpt);
	$post_excerpt_without_tags = strip_tags($post_excerpt);
	$post_descr = gt3_smarty_modifier_truncate($post_excerpt_without_tags, $symbol_count, "...");
} else {
	$post_descr = $post_excerpt;
}

$post_title = get_the_title();

$pf_post_icon = gt3_option('blog_post_listing_icon');

?>
<div class="blog_post_preview format-<?php echo esc_attr($pf); ?>">
	<div class="item_wrapper">
		<div class="blog_content">
			<?php
			echo  $pf_media['content'];

			echo  $post_category_compile;

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
				echo '<h2 class="blogpost_title">' . $pf_icon . '<a href="' . esc_url(get_permalink()) . '">' . esc_html($post_title) . '</a></h2>';
			}

			echo '' . (strlen($post_meta) ? '<div class="listing_meta">' . $post_meta . '</div>' : '') . '';

			echo '' . (strlen($post_descr) ? $post_descr : '') . '<div class="clear post_clear"></div><a href="'. esc_url(get_permalink()) .'" class="read_more">'. esc_html__('Read More', 'listingeasy') .' <i class="fa fa-angle-right"></i></a>';
			?>
		<div class="clear"></div>
	</div>
</div>
</div>