<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package seed
 */

if ( ! function_exists( 'seed_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function seed_posted_on($show_icon = true) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<span class="posted-on _heading">';
		if($show_icon) {
			seed_icon('clock');
		}
		echo ' <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
		echo '</span>';

	}
endif;

if ( ! function_exists( 'seed_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function seed_posted_by($show_icon = true) {
		echo '<span class="byline _heading">';
		if($show_icon) {
			seed_icon('s-user');
		}
		echo ' <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
		echo '</span>';

	}
endif;

if ( ! function_exists( 'seed_posted_cats' ) ) :
	/**
	 * Show Categories
	 */
	function seed_posted_cats($show_icon = true) {
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( esc_html__( ', ', 'seed' ) );
			if ( $categories_list ) {
				echo '<span class="cat-links _heading">';
				if($show_icon) {
					seed_icon('folder');
				}
				echo ' ' . $categories_list;
				echo '</span>';
			}
		}
	}
endif;



if ( ! function_exists( 'seed_posted_tags' ) ) :
	/**
	 * Show Tags
	 */
	function seed_posted_tags() {
		if ( 'post' === get_post_type() ) {
			$tags_list = get_the_tag_list( '',' ' );
			if ( $tags_list ) {
				echo '<p class="tags-links _heading">'. $tags_list . '</p>';
			}
		}
	}
endif;


if ( ! function_exists( 'seed_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function seed_entry_footer() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'seed' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Output Numbered Pagination
 * https://codex.wordpress.org/Function_Reference/paginate_links
 */
function seed_posts_navigation($wp_query = NULL) {
	if(!$wp_query) {
		global $wp_query; 
	}
	printf('<div class="content-pagination">');
	$big = 9999999; 
	echo paginate_links( 
		array(
				'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' 	=> '?paged=%#%',
				'current'	=> max( 1, get_query_var('paged') ),
				'mid_size'	=> 1,
				'total' 	=> $wp_query->max_num_pages,
				'prev_text'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>',
				'next_text'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>',
		));
	printf('</div>');
}

/**
 * Output Logo (from functions.php or Custom Logo)
 */
function seed_logo() {
	if($GLOBALS['s_logo_path'] != 'none') {
		echo '<a href="' . esc_url( home_url( '/' ) ) .'" rel="home">';
		echo '<img src="' . get_stylesheet_directory_uri() . '/'. $GLOBALS['s_logo_path']. '" width="'. $GLOBALS['s_logo_width'] . '"  height="'. $GLOBALS['s_logo_height'] . '" alt="Logo">';
		echo '</a>';
	} else {
		the_custom_logo();
	} 
}

/**
 * Output Title (h1/p)
 */
function seed_title() {
	if ( is_front_page() && is_home() ) {
		$tag = 'h1';
	} else {
		$tag = 'p';
	}
    echo '<' . $tag . ' class="site-title"><a href="' . esc_url( home_url( '/' ) ) .'" rel="home">' . get_bloginfo( 'name' ) . '</a></' . $tag. '>';
}

/*
 * Output Member Menu
 */
function seed_member_menu() {
if($GLOBALS['s_member_url'] != 'none'): ?>
<div class="site-member">
    <a href="<?php echo $GLOBALS['s_member_url']; ?>" <?php
		if(!is_user_logged_in()) {
			echo 'class="s-modal-trigger m-user" onclick="return false;" data-popup-trigger="site-login"';
		} else {
			echo 'class="m-user"';
		}
		?>>
        <span class="pic">
            <?php 
				$current_user = wp_get_current_user(); 
				if( 0 != $current_user->ID) { echo get_avatar($current_user->ID, 64 ); } else {  seed_icon('s-user');} 
			?>
        </span>
        <span class="info">
            <?php 
				if($GLOBALS['s_member_label'] == 'Member') { _e( 'Member', 'seed' ); } else {echo $GLOBALS['s_member_label'];} 
			?>
        </span>
    </a>
</div>
<?php endif; 
}

/*
* Get Post Thumbnail URL from Post ID
*/
function seed_get_thumbnail($post_id) {
	$thumb_id = get_post_thumbnail_id($post_id);
	if ($thumb_id) {
		$thumb_url = wp_get_attachment_image_src($thumb_id, 'full', true);
		$banner_url = $thumb_url[0];
	} else {
		$banner_url = false;
	}
	return $banner_url;
}

/*
 * Output Main Header with Title
 */
function seed_banner_title($post_id) {
	// Title Style
	$post_title_style = '';
	$default_title_style = get_theme_mod( 'body_title_style', $GLOBALS['s_title_style'] );
	$title_style = $default_title_style;
	if (function_exists('get_field')) {
		$post_title_style = get_field( 'title_style', $post_id );
		if( ($post_title_style) && ($post_title_style != 'default') ) {
			$title_style = $post_title_style;
		}
	}
	// Load Banner Var
	$banner_bg = '';
	if ($title_style == 'banner' ) {
		$banner_url = seed_get_thumbnail($post_id);
		if($post_title_style == 'banner' && function_exists('get_field')) {
			$img_banner = get_field( 'banner', $post_id );
			$img_banner_blur = get_field( 'banner_blur', $post_id );
			$img_banner_opacity = get_field( 'banner_opacity', $post_id );
			if ($img_banner) {
				$banner_url = $img_banner;
			}
		} else {
			// $post_title_style == 'default'
			if( !$banner_url ) {
				$banner_url = get_theme_mod( 'body_title_banner', '' );
			}
			$img_banner_blur = get_theme_mod( 'body_title_banner_blur', '20' );
			$img_banner_opacity = get_theme_mod( 'body_title_banner_opacity', '0.7' );
		}
		$style ='';
		if($banner_url) {
			$style = 'background-image: url(' . $banner_url . ');';
			if ($img_banner_blur != '') {
				$style .= ' filter: blur(' . $img_banner_blur . 'px);';
			}
			$style .= ' opacity: ' . $img_banner_opacity . ';';
			$style = 'style="' . $style . '"';
			$banner_bg .= '<div class="bg" ' . $style . '></div>'; 
		} else {
			$banner_bg .= '<div class="bg -blank"></div>'; 
		}
	}
	$permalink = get_the_permalink($post_id);
	$breadcrumb='' ; 
	if ( function_exists('yoast_breadcrumb') ) { 
		$breadcrumb = yoast_breadcrumb( '<div id="breadcrumbs" class="bc">' ,'</div>',false); 
	} 
	if( is_front_page() ) { 
		$title = get_bloginfo( 'name' ) . '<small>' . get_bloginfo( 'description' ) . '</small>' ; 
		$breadcrumb = '' ;
	} elseif ( is_archive() ) { 
		$title = get_the_archive_title($post_id); 
		$breadcrumb = '' ;
	} elseif ( is_404() ) { 
		$title = __('Page not found', 'seed' ); 
	} else { 
		if ($title_style == 'banner' && function_exists('get_field')) {
			$headline_title    = get_field('headline_title', $post_id);
			$headline_subtitle = get_field('headline_subtitle', $post_id);
			if ( $headline_title ) {
				$title = $headline_title; 
				if ( $headline_subtitle ) {
					$title .= '<small>' . $headline_subtitle . '</small>';
				}
			} else {
				$title = get_the_title($post_id); 
			}
		} else {
			$title = get_the_title($post_id); 
		}
	} 
	if (function_exists('is_shop') ) { 
		if (is_shop()) { 
			$title = get_the_title($post_id); 
		} 
	}
	$output = '<div class="main-header -' . $title_style .  '">' . $banner_bg . 
			  '<div class="s-container"><div class="main-title _heading"><div class="title"><a href="' . $permalink . '">' . $title .
			  '</a> </div>' . $breadcrumb . '</div></div></div>' ; 
    echo $output; 
} 

/*
 * Output Author Avatar & Profile in .content-item
 */
function seed_author($author_id) {
	$output = '<a class="author" href="' . esc_url( get_author_posts_url($author_id) ) .'">'
			. get_avatar($author_id, 40)
			. '<div class="name">'
			. '<h2>' . get_the_author_meta('display_name', $author_id) . '</h2>'
			. '<small>' . get_the_date() . '</small>'
			. '</div>'
			. '</a>';
	echo $output;
}

/*
 * Output SVG icons from /img/i/[ICON-NAME].svg
 */
if ( ! function_exists( 'seed_icon' ) ) :
	function seed_icon($i = NULL) {
		if(!$i) {
			return;
		}
		$file = get_theme_file_path( '/img/i/' . $i . '.svg');
		if(file_exists($file)) {
			include get_theme_file_path( '/img/i/' . $i . '.svg');
		}
	}
endif;