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
<div class="main-header -center -<?php seed_banner_class(get_the_ID()); ?>">
    <?php seed_banner_bg(get_the_ID()); ?>
    <div class="s-container">
        <div class="main-title">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<h4 id="breadcrumbs">','</h4>' );}?>
        </div>
    </div>
</div>
<div class="s-container main-body <?php echo($singleclass);?> <?php echo '-'.$GLOBALS['s_blog_layout_single']; ?>">
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
<?php endwhile; ?>
<?php get_footer(); ?>