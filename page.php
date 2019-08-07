<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seed
 */

get_header();

?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="main-header -<?php seed_banner_class(get_the_ID()); ?>">
    <?php seed_banner_bg(get_the_ID()); ?>
    <div class="s-container">
        <div class="main-title">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<h4 id="breadcrumbs">','</h4>' );}?>
        </div>
    </div>
</div>

<div class="s-container main-body">

    <div id="primary" class="content-area">
        <main id="main" class="site-main -hide-title">

            <?php get_template_part( 'template-parts/content', 'page' ); ?>
            <?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
            <?php wp_reset_postdata(); ?>

        </main>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>