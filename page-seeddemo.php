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
    <div class="s-slider -full -dots-in _space_0">
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
        <div class="s-slider -m1.2 -d1.2 -center-m -center-d">
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

        <h2 class="s-title">SLIDER • HERO</h2>
        <div class="s-slider -m1.2 -d1 -center-m">
            <?php 
			$args = array(
                'posts_per_page' => 3,
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

        <h2 class="s-title">SLIDER • CARD</h2>
        <div class="s-slider -m1.2 -d3">
            <?php 
			$args = array(
                'posts_per_page' => 4,
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
    </div>
</div>

<div class="s-sec" style="background: #ddd;">
    <div class="s-container">

        <h2 class="s-title">SLIDER • CAPTION</h2>
        <div class="s-slider -m2 -d4">
            <?php 
                $args = array(
                    'posts_per_page' => 4,
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


<style>
.demo-icons {
    letter-spacing: 4px;
    line-height: 36px;
}

.demo-icons svg {
    cursor: pointer;
    transition: 0.3s ease;
}

.demo-icons svg:hover {
    color: var(--s-accent-hover);
}
</style>


<div class="s-sec" style="background: #fff;">
    <div class="s-container">
        <h2 class="s-title">ICONS</h2>
        <b>Support all icons from <a href="https://feathericons.com/" target="_blank">Feather
                Icons</a> using</b><br>
        <small><code>&#60;?php seed_icon('ICON-NAME'); ?&#62;</code></small>

        <p class="demo-icons">
            <?php seed_icon('activity'); ?>
            <?php seed_icon('airplay'); ?>
            <?php seed_icon('alert-circle'); ?>
            <?php seed_icon('alert-octagon'); ?>
            <?php seed_icon('alert-triangle'); ?>
            <?php seed_icon('align-center'); ?>
            <?php seed_icon('align-justify'); ?>
            <?php seed_icon('align-left'); ?>
            <?php seed_icon('align-right'); ?>
            <?php seed_icon('anchor'); ?>
            <?php seed_icon('aperture'); ?>
            <?php seed_icon('archive'); ?>
            <?php seed_icon('arrow-down-circle'); ?>
            <?php seed_icon('arrow-down-left'); ?>
            <?php seed_icon('arrow-down-right'); ?>
            <?php seed_icon('arrow-down'); ?>
            <?php seed_icon('arrow-left-circle'); ?>
            <?php seed_icon('arrow-left'); ?>
            <?php seed_icon('arrow-right-circle'); ?>
            <?php seed_icon('arrow-right'); ?>
            <?php seed_icon('arrow-up-circle'); ?>
            <?php seed_icon('arrow-up-left'); ?>
            <?php seed_icon('arrow-up-right'); ?>
            <?php seed_icon('arrow-up'); ?>
            <?php seed_icon('at-sign'); ?>
            <?php seed_icon('award'); ?>
            <?php seed_icon('bar-chart-2'); ?>
            <?php seed_icon('bar-chart'); ?>
            <?php seed_icon('battery-charging'); ?>
            <?php seed_icon('battery'); ?>
            <?php seed_icon('bell-off'); ?>
            <?php seed_icon('bell'); ?>
            <?php seed_icon('bluetooth'); ?>
            <?php seed_icon('bold'); ?>
            <?php seed_icon('book-open'); ?>
            <?php seed_icon('book'); ?>
            <?php seed_icon('bookmark'); ?>
            <?php seed_icon('box'); ?>
            <?php seed_icon('briefcase'); ?>
            <?php seed_icon('calendar'); ?>
            <?php seed_icon('camera-off'); ?>
            <?php seed_icon('camera'); ?>
            <?php seed_icon('cast'); ?>
            <?php seed_icon('check-circle'); ?>
            <?php seed_icon('check-square'); ?>
            <?php seed_icon('check'); ?>
            <?php seed_icon('chevron-down'); ?>
            <?php seed_icon('chevron-left'); ?>
            <?php seed_icon('chevron-right'); ?>
            <?php seed_icon('chevron-up'); ?>
            <?php seed_icon('chevrons-down'); ?>
            <?php seed_icon('chevrons-left'); ?>
            <?php seed_icon('chevrons-right'); ?>
            <?php seed_icon('chevrons-up'); ?>
            <?php seed_icon('chrome'); ?>
            <?php seed_icon('circle'); ?>
            <?php seed_icon('clipboard'); ?>
            <?php seed_icon('clock'); ?>
            <?php seed_icon('cloud-drizzle'); ?>
            <?php seed_icon('cloud-lightning'); ?>
            <?php seed_icon('cloud-off'); ?>
            <?php seed_icon('cloud-rain'); ?>
            <?php seed_icon('cloud-snow'); ?>
            <?php seed_icon('cloud'); ?>
            <?php seed_icon('code'); ?>
            <?php seed_icon('codepen'); ?>
            <?php seed_icon('codesandbox'); ?>
            <?php seed_icon('coffee'); ?>
            <?php seed_icon('columns'); ?>
            <?php seed_icon('command'); ?>
            <?php seed_icon('compass'); ?>
            <?php seed_icon('copy'); ?>
            <?php seed_icon('corner-down-left'); ?>
            <?php seed_icon('corner-down-right'); ?>
            <?php seed_icon('corner-left-down'); ?>
            <?php seed_icon('corner-left-up'); ?>
            <?php seed_icon('corner-right-down'); ?>
            <?php seed_icon('corner-right-up'); ?>
            <?php seed_icon('corner-up-left'); ?>
            <?php seed_icon('corner-up-right'); ?>
            <?php seed_icon('cpu'); ?>
            <?php seed_icon('credit-card'); ?>
            <?php seed_icon('crop'); ?>
            <?php seed_icon('crosshair'); ?>
            <?php seed_icon('database'); ?>
            <?php seed_icon('delete'); ?>
            <?php seed_icon('disc'); ?>
            <?php seed_icon('dollar-sign'); ?>
            <?php seed_icon('download-cloud'); ?>
            <?php seed_icon('download'); ?>
            <?php seed_icon('droplet'); ?>
            <?php seed_icon('edit-2'); ?>
            <?php seed_icon('edit-3'); ?>
            <?php seed_icon('edit'); ?>
            <?php seed_icon('external-link'); ?>
            <?php seed_icon('eye-off'); ?>
            <?php seed_icon('eye'); ?>
            <?php seed_icon('facebook'); ?>
            <?php seed_icon('fast-forward'); ?>
            <?php seed_icon('feather'); ?>
            <?php seed_icon('figma'); ?>
            <?php seed_icon('file-minus'); ?>
            <?php seed_icon('file-plus'); ?>
            <?php seed_icon('file-text'); ?>
            <?php seed_icon('file'); ?>
            <?php seed_icon('film'); ?>
            <?php seed_icon('filter'); ?>
            <?php seed_icon('flag'); ?>
            <?php seed_icon('folder-minus'); ?>
            <?php seed_icon('folder-plus'); ?>
            <?php seed_icon('folder'); ?>
            <?php seed_icon('framer'); ?>
            <?php seed_icon('frown'); ?>
            <?php seed_icon('gift'); ?>
            <?php seed_icon('git-branch'); ?>
            <?php seed_icon('git-commit'); ?>
            <?php seed_icon('git-merge'); ?>
            <?php seed_icon('git-pull-request'); ?>
            <?php seed_icon('github'); ?>
            <?php seed_icon('gitlab'); ?>
            <?php seed_icon('globe'); ?>
            <?php seed_icon('grid'); ?>
            <?php seed_icon('hard-drive'); ?>
            <?php seed_icon('hash'); ?>
            <?php seed_icon('headphones'); ?>
            <?php seed_icon('heart'); ?>
            <?php seed_icon('help-circle'); ?>
            <?php seed_icon('hexagon'); ?>
            <?php seed_icon('home'); ?>
            <?php seed_icon('image'); ?>
            <?php seed_icon('inbox'); ?>
            <?php seed_icon('info'); ?>
            <?php seed_icon('instagram'); ?>
            <?php seed_icon('italic'); ?>
            <?php seed_icon('key'); ?>
            <?php seed_icon('layers'); ?>
            <?php seed_icon('layout'); ?>
            <?php seed_icon('life-buoy'); ?>
            <?php seed_icon('link-2'); ?>
            <?php seed_icon('link'); ?>
            <?php seed_icon('linkedin'); ?>
            <?php seed_icon('list'); ?>
            <?php seed_icon('loader'); ?>
            <?php seed_icon('lock'); ?>
            <?php seed_icon('log-in'); ?>
            <?php seed_icon('log-out'); ?>
            <?php seed_icon('mail'); ?>
            <?php seed_icon('map-pin'); ?>
            <?php seed_icon('map'); ?>
            <?php seed_icon('maximize-2'); ?>
            <?php seed_icon('maximize'); ?>
            <?php seed_icon('meh'); ?>
            <?php seed_icon('menu'); ?>
            <?php seed_icon('message-circle'); ?>
            <?php seed_icon('message-square'); ?>
            <?php seed_icon('mic-off'); ?>
            <?php seed_icon('mic'); ?>
            <?php seed_icon('minimize-2'); ?>
            <?php seed_icon('minimize'); ?>
            <?php seed_icon('minus-circle'); ?>
            <?php seed_icon('minus-square'); ?>
            <?php seed_icon('minus'); ?>
            <?php seed_icon('monitor'); ?>
            <?php seed_icon('moon'); ?>
            <?php seed_icon('more-horizontal'); ?>
            <?php seed_icon('more-vertical'); ?>
            <?php seed_icon('mouse-pointer'); ?>
            <?php seed_icon('move'); ?>
            <?php seed_icon('music'); ?>
            <?php seed_icon('navigation-2'); ?>
            <?php seed_icon('navigation'); ?>
            <?php seed_icon('octagon'); ?>
            <?php seed_icon('package'); ?>
            <?php seed_icon('paperclip'); ?>
            <?php seed_icon('pause-circle'); ?>
            <?php seed_icon('pause'); ?>
            <?php seed_icon('pen-tool'); ?>
            <?php seed_icon('percent'); ?>
            <?php seed_icon('phone-call'); ?>
            <?php seed_icon('phone-forwarded'); ?>
            <?php seed_icon('phone-incoming'); ?>
            <?php seed_icon('phone-missed'); ?>
            <?php seed_icon('phone-off'); ?>
            <?php seed_icon('phone-outgoing'); ?>
            <?php seed_icon('phone'); ?>
            <?php seed_icon('pie-chart'); ?>
            <?php seed_icon('play-circle'); ?>
            <?php seed_icon('play'); ?>
            <?php seed_icon('plus-circle'); ?>
            <?php seed_icon('plus-square'); ?>
            <?php seed_icon('plus'); ?>
            <?php seed_icon('pocket'); ?>
            <?php seed_icon('power'); ?>
            <?php seed_icon('printer'); ?>
            <?php seed_icon('radio'); ?>
            <?php seed_icon('refresh-ccw'); ?>
            <?php seed_icon('refresh-cw'); ?>
            <?php seed_icon('repeat'); ?>
            <?php seed_icon('rewind'); ?>
            <?php seed_icon('rotate-ccw'); ?>
            <?php seed_icon('rotate-cw'); ?>
            <?php seed_icon('rss'); ?>
            <?php seed_icon('save'); ?>
            <?php seed_icon('scissors'); ?>
            <?php seed_icon('search'); ?>
            <?php seed_icon('send'); ?>
            <?php seed_icon('server'); ?>
            <?php seed_icon('settings'); ?>
            <?php seed_icon('share-2'); ?>
            <?php seed_icon('share'); ?>
            <?php seed_icon('shield-off'); ?>
            <?php seed_icon('shield'); ?>
            <?php seed_icon('shopping-bag'); ?>
            <?php seed_icon('shopping-cart'); ?>
            <?php seed_icon('shuffle'); ?>
            <?php seed_icon('sidebar'); ?>
            <?php seed_icon('skip-back'); ?>
            <?php seed_icon('skip-forward'); ?>
            <?php seed_icon('slack'); ?>
            <?php seed_icon('slash'); ?>
            <?php seed_icon('sliders'); ?>
            <?php seed_icon('smartphone'); ?>
            <?php seed_icon('smile'); ?>
            <?php seed_icon('speaker'); ?>
            <?php seed_icon('square'); ?>
            <?php seed_icon('star'); ?>
            <?php seed_icon('stop-circle'); ?>
            <?php seed_icon('sun'); ?>
            <?php seed_icon('sunrise'); ?>
            <?php seed_icon('sunset'); ?>
            <?php seed_icon('tablet'); ?>
            <?php seed_icon('tag'); ?>
            <?php seed_icon('target'); ?>
            <?php seed_icon('terminal'); ?>
            <?php seed_icon('thermometer'); ?>
            <?php seed_icon('thumbs-down'); ?>
            <?php seed_icon('thumbs-up'); ?>
            <?php seed_icon('toggle-left'); ?>
            <?php seed_icon('toggle-right'); ?>
            <?php seed_icon('tool'); ?>
            <?php seed_icon('trash-2'); ?>
            <?php seed_icon('trash'); ?>
            <?php seed_icon('trello'); ?>
            <?php seed_icon('trending-down'); ?>
            <?php seed_icon('trending-up'); ?>
            <?php seed_icon('triangle'); ?>
            <?php seed_icon('truck'); ?>
            <?php seed_icon('tv'); ?>
            <?php seed_icon('twitch'); ?>
            <?php seed_icon('twitter'); ?>
            <?php seed_icon('type'); ?>
            <?php seed_icon('umbrella'); ?>
            <?php seed_icon('underline'); ?>
            <?php seed_icon('unlock'); ?>
            <?php seed_icon('upload-cloud'); ?>
            <?php seed_icon('upload'); ?>
            <?php seed_icon('user-check'); ?>
            <?php seed_icon('user-minus'); ?>
            <?php seed_icon('user-plus'); ?>
            <?php seed_icon('user-x'); ?>
            <?php seed_icon('user'); ?>
            <?php seed_icon('users'); ?>
            <?php seed_icon('video-off'); ?>
            <?php seed_icon('video'); ?>
            <?php seed_icon('voicemail'); ?>
            <?php seed_icon('volume-1'); ?>
            <?php seed_icon('volume-2'); ?>
            <?php seed_icon('volume-x'); ?>
            <?php seed_icon('volume'); ?>
            <?php seed_icon('watch'); ?>
            <?php seed_icon('wifi-off'); ?>
            <?php seed_icon('wifi'); ?>
            <?php seed_icon('wind'); ?>
            <?php seed_icon('x-circle'); ?>
            <?php seed_icon('x-octagon'); ?>
            <?php seed_icon('x-square'); ?>
            <?php seed_icon('x'); ?>
            <?php seed_icon('youtube'); ?>
            <?php seed_icon('zap-off'); ?>
            <?php seed_icon('zap'); ?>
            <?php seed_icon('zoom-in'); ?>
            <?php seed_icon('zoom-out'); ?>

        </p>
        <b>And more from SeedThemes.</b>
        <p class="demo-icons">
            <?php seed_icon('s-user'); ?>
            <?php seed_icon('s-facebook'); ?>
            <?php seed_icon('s-twitter'); ?>
            <?php seed_icon('s-line'); ?>
            <?php seed_icon('s-youtube'); ?>
            <?php seed_icon('s-messenger'); ?>
            <?php seed_icon('s-vimeo'); ?>
            <?php seed_icon('s-pinterest'); ?>
            <?php seed_icon('s-linkedin'); ?>
            <?php seed_icon('s-apple'); ?>
            <?php seed_icon('s-googleplay'); ?>
            <?php seed_icon('s-wordpress'); ?>
        </p>

    </div>
</div>

<?php get_footer(); ?>