<?php get_header(); ?>

<div class="main-header -banner <?php if($GLOBALS['s_title_style'] == 'minimal') {echo '-blank'; } ?>">
    <?php seed_banner_bg(get_the_ID()); ?>
    <div class="s-container">
        <div class="main-title">
            <h2>
                <a href="<?php global $wp; echo home_url( $wp->request ) ?>">
                    <?php 
					if(is_front_page()) {
						echo get_bloginfo( 'name' ) . '<small>' . get_bloginfo( 'description' ) . '</small>';
					} else {
						single_post_title();
					} ?>
                </a>
            </h2>
            <?php if ( function_exists('yoast_breadcrumb') && !is_front_page()) { yoast_breadcrumb( '<h4 id="breadcrumbs">','</h4>' );}?>
        </div>
    </div>
</div>

<div class="s-container main-body <?php echo '-'.$GLOBALS['s_blog_layout']; ?>">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php 
				echo '<div class="s-grid -m'.$GLOBALS['s_blog_columns_m'].' -d'.$GLOBALS['s_blog_columns_d'].'">';
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', $GLOBALS['s_blog_columns_d_style']);
				endwhile; 
				echo '</div>';
				seed_posts_navigation(); 
			?>

        </main>
    </div>

    <?php 
		switch ($GLOBALS['s_blog_layout']) {
			case 'rightbar':
			get_sidebar('right'); 
			break;
			case 'leftbar':
			get_sidebar('left'); 
			break;
			case 'full-width':
			break;
			default:
			break;
		}
		?>
</div>

<?php get_footer(); ?>