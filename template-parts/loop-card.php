<?php
/**
 * Loop Name: Pagination: Content Card
 */
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('seed-col'); ?>>
    <div class="content-item -card">
        <div class="pic">
            <a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark">
                <?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
            </a>
        </div>
        <!--pic-->
        <div class="info">
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <?php if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php seed_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php the_excerpt();?>
            </div><!-- .entry-summary -->

            <footer class="entry-footer">
                <?php seed_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div>
        <!--info-->
    </div>
</article><!-- #post-## -->
<?php endwhile; endif; ?>
<?php seed_posts_navigation(); ?>