<?php get_header(); ?>

<h1 class="hide">Seed Demo - ตัวอย่างการเขียนโค้ด</h1>

<?php 
/* Example of using wp_query - https://codex.wordpress.org/Class_Reference/WP_Query */ 
/*
<div class="s-grid -m1.2 -d3">
    <?php 
    $args = array(
        'category_name' => 'news',
        'posts_per_page' => 4,
    );
    $the_query = new WP_Query( $args );

    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        get_template_part( 'template-parts/content', 'card' );
    }
    
    wp_reset_postdata();
    ?>
</div>
*/
?>

<div class="s-container">
    <div class="s-slider -full -dots-in">
        <?php 
            $args = array(
                'posts_per_page' => 2,
            );
            $the_query = new WP_Query( $args );
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                echo '<div class="slider">';
                get_template_part( 'template-parts/content', 'headline' );
                echo '</div>';
            }
            wp_reset_postdata();
        ?>
    </div>
</div>


<div class="s-sec" style="background: #eee;">
    <div class="s-container">

        <h2 class="s-title">SLIDER • HEADLINE</h2>
        <div class="s-slider -large -dots-in">
            <?php 
			$args = array(
                'posts_per_page' => 3,
                'orderby' => 'rand'
			);
            $the_query = new WP_Query( $args );
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                echo '<div class="slider">';
                get_template_part( 'template-parts/content', 'headline' );
                echo '</div>';
            }
            wp_reset_postdata();
            ?>
        </div>


        <div class="s-space"></div>


        <h2 class="s-title">GRID • HERO</h2>
        <div class="s-grid">
            <?php 
			$args = array(
                'posts_per_page' => 1,
                'orderby' => 'rand'
			);
            $the_query = new WP_Query( $args );
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                get_template_part( 'template-parts/content', 'hero' );
            }
            wp_reset_postdata();
            ?>
        </div>


        <div class="s-space"></div>


        <h2 class="s-title">GRID • CARD</h2>
        <div class="s-grid -d3">
            <?php 
			$args = array(
                'posts_per_page' => 3,
                'orderby' => 'rand'
			);
            $the_query = new WP_Query( $args );
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                get_template_part( 'template-parts/content', 'card' );
            }
            wp_reset_postdata();
            ?>
        </div>


        <div class="s-space"></div>


        <h2 class="s-title">GRID • LIST • PAGINATION</h2>
        <div class="s-grid -d2">
            <?php 
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			$args = array(
                'posts_per_page' => 6,
                'paged' => $paged 
			);
			$the_query = new WP_Query( $args );
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                get_template_part( 'template-parts/content', 'list' );
            }
            ?>
        </div>
        <?php
            seed_posts_navigation($the_query);
            wp_reset_postdata();
        ?>


        <div class="s-space"></div>


        <h2 class="s-title">GRID • CAPTION</h2>
        <div class="s-grid -m2 -d4 hide-summary">
            <?php 
			$args = array(
                'posts_per_page' => 4,
                'orderby' => 'rand'
			);
            $the_query = new WP_Query( $args );
            
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                get_template_part( 'template-parts/content', 'caption' );
            }
            wp_reset_postdata();
            ?>
        </div>


        <div class="s-space"></div>


        <h2 class="s-title">GRID • CARD • HIDE SUMMARY</h2>
        <div class="s-grid -d4 hide-summary">
            <?php 
			$args = array(
                'posts_per_page' => 4,
                'orderby' => 'rand'
			);
            $the_query = new WP_Query( $args );
            
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                get_template_part( 'template-parts/content', 'card' );
            }
            wp_reset_postdata();
            ?>
        </div>


        <div class="s-space"></div>


        <h2 class="s-title">GRID • CONTENT</h2>
        <div class="s-grid -d3">
            <?php 
			$args = array(
                'posts_per_page' => 3,
                'orderby' => 'rand'
			);
            $the_query = new WP_Query( $args );
            
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                get_template_part( 'template-parts/content' );
            }
            wp_reset_postdata();
            ?>
        </div>


    </div>
</div>

<div class="s-sec" style="background: #ddd;">
    <div class="s-container">

        <h2 class="s-title">MIX</h2>

        <div class="s-grid -d3">

            <div class="s-grid">
                <?php 
                $args = array(
                    'posts_per_page' => 1,
                    'orderby' => 'rand'
                );
                $the_query = new WP_Query( $args );
            
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    get_template_part( 'template-parts/content', 'card' );
                }
                wp_reset_postdata();
                ?>
            </div>

            <div class="s-grid">
                <?php 
                $args = array(
                    'posts_per_page' => 4,
                    'orderby' => 'rand'
                );
                $the_query = new WP_Query( $args );
                
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    get_template_part( 'template-parts/content', 'list' );
                }
                wp_reset_postdata();
                ?>
            </div>

            <div class="s-grid">
                <?php 
                $args = array(
                    'posts_per_page' => 2,
                    'orderby' => 'rand'
                );
                $the_query = new WP_Query( $args );
            
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    get_template_part( 'template-parts/content', 'caption' );
                }
                wp_reset_postdata();
                ?>
            </div>

        </div>
    </div>
</div>



<div class="s-sec" style="background: #eee;">
    <div class="s-container">

        <h2 class="s-title">SLIDER • HERO</h2>
        <div class="s-slider -large">
            <?php 
                $args = array(
                    'posts_per_page' => 2,
                    'orderby' => 'rand'
                );
                $the_query = new WP_Query( $args );
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    echo '<div class="slider">';
                    get_template_part( 'template-parts/content', 'hero' );
                    echo '</div>';
                }
                wp_reset_postdata();
            ?>
        </div>


        <div class="s-space"></div>


        <h2 class="s-title">SLIDER • CARD</h2>
        <div class="s-slider -m1.2 -d3">
            <?php 
                $args = array(
                    'posts_per_page' => 5,
                    'orderby' => 'rand'
                );
                $the_query = new WP_Query( $args );
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    echo '<div class="slider">';
                    get_template_part( 'template-parts/content', 'card' );
                    echo '</div>';
                }
                wp_reset_postdata();
            ?>
        </div>


        <div class="s-space"></div>


        <h2 class="s-title">SLIDER TO GRID • CAPTION</h2>
        <div class="s-slider -m1.2 -d3 -togrid">
            <?php 
                $args = array(
                    'posts_per_page' => 3,
                    'orderby' => 'rand'
                );
                $the_query = new WP_Query( $args );
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    echo '<div class="slider">';
                    get_template_part( 'template-parts/content', 'caption' );
                    echo '</div>';
                }
                wp_reset_postdata();
            ?>
        </div>

    </div>
</div>


<?php get_footer(); ?>