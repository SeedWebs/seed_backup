<?php get_header();?>

<div class="s-container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main -hide-title">

            <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'page' ); ?>

            <?php endwhile;?>

        </main>
    </div>
</div>


<?php /* Example of using wp_query - https://codex.wordpress.org/Class_Reference/WP_Query */ ?>

<div class="sec-news">
    <div class="s-container">

        <h2 class="s-title">NEWS</h2>

        <div class="s-grid -m2 -d3">
            <?php 
			$args = array(
				'category_name' => 'news',
				'posts_per_page' => 6
			);
			$the_query = new WP_Query( $args );
			?>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'card' ); ?>

            <?php // get_template_part( 'template-parts/content', 'list' ); ?>

            <?php endwhile; wp_reset_postdata(); ?>

        </div>

    </div>
</div>

<?php get_footer(); ?>