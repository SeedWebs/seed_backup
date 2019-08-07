<?php 
get_header(); 
$banner_id = get_the_ID();
if(!is_front_page()): // Show Shop title
	$shop_page_id = get_option( 'woocommerce_shop_page_id' ); 
	global $wp; 
	if(is_shop()) {
		$link = '<a href="' . esc_url( get_permalink( $shop_page_id )) . '">' . get_the_title( $shop_page_id ) . '</a>';
		$banner_id = $shop_page_id;
	} elseif(is_archive()) {
		$link = '<a href="' . home_url( $wp->request ) . '">' . get_the_archive_title() . '</a>';
	} else {
		$link = '<a href="' . esc_url( get_permalink()) . '">' . get_the_title() . '</a>';
	}
?>


<div class="main-header -<?php seed_banner_class(get_the_ID()); ?>">
    <?php seed_banner_bg($banner_id); ?>
    <div class="s-container">
        <div class="main-title">
            <h2><?php echo $link; ?></h2>
            <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<h4 id="breadcrumbs">','</h4>' );}?>
        </div>
    </div>
</div>


<?php endif; ?>

<div class="s-container main-body <?php if($GLOBALS['s_shop_layout'] != 'full-width') echo '-shopbar'; ?>">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php 
			if(is_shop() && !(is_search()) && ($GLOBALS['s_shop_pagebuilder'] == 'enable')) { 
                
				/* Use Shop Page instead of Archive Product */
				edit_post_link('Edit', '<span class="edit-link">','</span>', $shop_page_id);
				$the_query = new WP_Query( array( 'page_id' => $shop_page_id ));
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
				the_content();
				endwhile; 
				wp_reset_postdata();

			} else {
				woocommerce_content();
				if (is_shop()) {
					edit_post_link('Edit', '<span class="edit-link">','</span>', $shop_page_id);
				} else {
					seed_entry_footer();
				}
			}
			?>
        </main>
    </div>
    <?php if($GLOBALS['s_shop_layout'] != 'full-width') get_sidebar('shop'); ?>
</div>

<?php get_footer(); ?>