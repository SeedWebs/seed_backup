<?php get_header(); 

$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
$author->ID;

?>

<div class="s-container main-body">
    <div id="primary" class="content-area <?php echo '-'.$GLOBALS['s_blog_layout']; ?>">
        <main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>

            <header class="entry-author -head">
                <div class="pic">
                    <?php echo get_avatar( $author->ID, apply_filters( 'author_bio_avatar_size', 100 ) ); ?>
                </div>
                <div class="info">
                    <?php the_archive_title( '<h1 class="page-title entry-title">', '</h1>' );?>
                    <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                </div>
            </header>

            <?php 
				echo '<div class="s-grid -m'.$GLOBALS['s_blog_columns_m'].' -d'.$GLOBALS['s_blog_columns_d'].'">';
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', $GLOBALS['s_blog_columns_d_style']);
				endwhile; 
				echo '</div>';
				seed_posts_navigation(); 
			?>

            <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>

        </main>
    </div>

    <?php 
	switch ($GLOBALS['s_blog_layout']) {
		case 'rightbar':
		get_sidebar('right'); 
		break;
		case 'leftbar':
		get_sidebar('left'); 
		break;
		case 'full-width':
		break;
		default:
		break;
	}
	?>
</div>
<?php get_footer(); ?>