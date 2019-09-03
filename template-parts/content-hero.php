<?php
/**
 * Loop Name: Content Hero
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('content-item -hero'); ?>>
    <div class="pic">
        <a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark">
            <?php if(has_post_thumbnail()) { the_post_thumbnail('large');} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
        </a>
    </div>
    <div class="info">

        <header class="entry-header">
            <?php
                $category = get_the_category();
                if ( $category[0] ) {
                   echo '<p class="cat _heading"><a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a></p>';
                }
            ?>
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </header>

        <div class="entry-summary">
            <?php the_excerpt();?>
        </div>

        <?php seed_author(get_the_author_meta('ID'));?>
    </div>
</article>