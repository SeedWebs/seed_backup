<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

get_header(); ?>

<?php 
	$singleclass ='';
	if ($GLOBALS['s_blog_layout_single'] == 'full-width') {
		$singleclass = 'single-area';
	} 
?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="site-single <?php echo($singleclass);?>">

    <?php seed_banner_title(get_the_ID()); ?>

    <div class="s-container main-body <?php echo '-'.$GLOBALS['s_blog_layout_single']; ?>">
        <div id="primary" class="content-area">
            <main id="main" class="site-main -hide-title">

                <?php get_template_part( 'template-parts/content-single', get_post_type() ); ?>

                <?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

                <?php wp_reset_postdata(); ?>

            </main>
        </div>

        <?php 
		switch ($GLOBALS['s_blog_layout_single']) {
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

</div>

<?php endwhile; ?>
<?php get_footer(); ?>