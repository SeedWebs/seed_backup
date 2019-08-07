<?php 
/**
 * Template Name: Form
 */
get_header(); ?>

<div class="page-form">

    <div class="main-header">
        <div class="s-container">
            <h2 class="main-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </div>
    </div>

    <div class="s-container main-body">

        <div id="primary" class="content-area">
            <main id="main" class="site-main -hide-title">

                <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'page' ); ?>

                <?php endwhile; ?>

            </main>
        </div>
    </div>


</div>

<?php get_footer(); ?>