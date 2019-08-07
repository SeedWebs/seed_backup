<?php
/**
 * Loop Name: News Table
 */
?>
<?php if ( have_posts() ) : ?>
<div class="table-responsive">
    <table class="table">

        <?php while ( have_posts() ) : the_post(); ?>

        <tr class="content-table">
            <td class="content-table-date"><?php echo get_the_date(); ?></td>
            <td class="content-table-title">
                <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
            </td>
        </tr>

        <?php endwhile; ?>

    </table>
</div>

<?php endif; ?>