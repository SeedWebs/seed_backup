<?php 
/**
 * Template Name: Left Sidebar (Sub Page)
 */
get_header(); 
global $post;
$parents = get_post_ancestors( $post->ID );
$root_id = ($parents) ? $parents[count($parents)-1]: $post->ID;
?>

<div class="main-header -<?php seed_banner_class(get_the_ID()); ?>">
    <?php seed_banner_bg($root_id); ?>
    <div class="s-container">
        <div class="main-title">
            <h2><a href="<?php echo get_permalink($root_id); ?>"><?php echo get_the_title($root_id); ?></a></h2>
            <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<h4 id="breadcrumbs">','</h4>' );}?>
        </div>
    </div>
</div>

<div class="s-container main-body -leftbar">

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'page' ); ?>
            <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
            <?php endwhile; ?>

        </main>
    </div>

    <?php get_sidebar('left'); ?>
</div>

<?php get_footer(); ?>