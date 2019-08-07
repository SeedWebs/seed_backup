<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package seed
 */
get_header();?>

<div class="main-header -<?php seed_banner_class(get_the_ID()); ?>">
    <?php seed_banner_bg(get_the_ID()); ?>
    <div class="s-container">
        <div class="main-title">
            <h2><?php esc_html_e('Page not found', 'seed');?></h2>
            <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<h4 id="breadcrumbs">','</h4>' );}?>
        </div>
    </div>
</div>

<div class="s-container main-body">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <section class="error-404 not-found">
                <header class="page-header hide">
                    <h1 class="page-title"><?php esc_html_e('That page can&rsquo;t be found.', 'seed');?></h1>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e('It looks like nothing was found at this location.', 'seed');?></p>
                    <?php get_search_form();?>
                </div>
            </section>

        </main>
    </div>
</div>

<?php get_footer();?>