<?php 
/**
 * Template Name: Left Sidebar (Sub Page)
 */
get_header(); 
global $post;
$parents = get_post_ancestors( $post->ID );
$root_id = ($parents) ? $parents[count($parents)-1]: $post->ID;
?>

<?php seed_banner_title($root_id); ?>

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