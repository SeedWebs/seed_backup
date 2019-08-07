<?php 
/**
 * Template Name: Right Sidebar
 */
get_header(); ?>

<div class="main-header -<?php seed_banner_class(get_the_ID()); ?>">
    <?php seed_banner_bg(get_the_ID()); ?>
    <div class="s-container">
        <h2 class="main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </div>
</div>

<div class="s-container main-body -rightbar">

    <div id="primary" class="content-area">
        <main id="main" class="site-main -hide-title">
            <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'page' ); ?>
            <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
            <?php endwhile; ?>
        </main>
    </div>

    <?php get_sidebar('right'); ?>
</div>

<?php get_footer(); ?>