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
    font-size: 12px;
    line-height: 32px;
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    padding-left: 0;
    font-family: sans-serif;
}

.demo-icons li {
    list-style: none;
    min-width: 140px;
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

        <ol>
            <li>Using PHP Function <code>&#60;?php seed_icon('ICON_NAME'); ?&#62;</code>, such as
                <code>&#60;?php seed_icon('activity'); ?&#62;</code>.
            </li>
            <li>Using Shortcode <code>[s_icon i="ICON_NAME"]</code>, such as
                <code>[s_icon i="activity"]</code>.
            </li>

        </ol>

        <h3>Icons from <a href="https://feathericons.com/" target="_blank">Feather Icons</a></h3>

        <ul class="demo-icons">
            <li><?php seed_icon('activity'); ?> activity</li>
            <li><?php seed_icon('airplay'); ?> airplay</li>
            <li><?php seed_icon('alert-circle'); ?> alert-circle</li>
            <li><?php seed_icon('alert-octagon'); ?> alert-octagon</li>
            <li><?php seed_icon('alert-triangle'); ?> alert-triangle</li>
            <li><?php seed_icon('align-center'); ?> align-center</li>
            <li><?php seed_icon('align-justify'); ?> align-justify</li>
            <li><?php seed_icon('align-left'); ?> align-left</li>
            <li><?php seed_icon('align-right'); ?> align-right</li>
            <li><?php seed_icon('anchor'); ?> anchor</li>
            <li><?php seed_icon('aperture'); ?> aperture</li>
            <li><?php seed_icon('archive'); ?> archive</li>
            <li><?php seed_icon('arrow-down-circle'); ?> arrow-down-circle</li>
            <li><?php seed_icon('arrow-down-left'); ?> arrow-down-left</li>
            <li><?php seed_icon('arrow-down-right'); ?> arrow-down-right</li>
            <li><?php seed_icon('arrow-down'); ?> arrow-down</li>
            <li><?php seed_icon('arrow-left-circle'); ?> arrow-left-circle</li>
            <li><?php seed_icon('arrow-left'); ?> arrow-left</li>
            <li><?php seed_icon('arrow-right-circle'); ?> arrow-right-circle</li>
            <li><?php seed_icon('arrow-right'); ?> arrow-right</li>
            <li><?php seed_icon('arrow-up-circle'); ?> arrow-up-circle</li>
            <li><?php seed_icon('arrow-up-left'); ?> arrow-up-left</li>
            <li><?php seed_icon('arrow-up-right'); ?> arrow-up-right</li>
            <li><?php seed_icon('arrow-up'); ?> arrow-up</li>
            <li><?php seed_icon('at-sign'); ?> at-sign</li>
            <li><?php seed_icon('award'); ?> award</li>
            <li><?php seed_icon('bar-chart-2'); ?> bar-chart-2</li>
            <li><?php seed_icon('bar-chart'); ?> bar-chart</li>
            <li><?php seed_icon('battery-charging'); ?> battery-charging</li>
            <li><?php seed_icon('battery'); ?> battery</li>
            <li><?php seed_icon('bell-off'); ?> bell-off</li>
            <li><?php seed_icon('bell'); ?> bell</li>
            <li><?php seed_icon('bluetooth'); ?> bluetooth</li>
            <li><?php seed_icon('bold'); ?> bold</li>
            <li><?php seed_icon('book-open'); ?> book-open</li>
            <li><?php seed_icon('book'); ?> book</li>
            <li><?php seed_icon('bookmark'); ?> bookmark</li>
            <li><?php seed_icon('box'); ?> box</li>
            <li><?php seed_icon('briefcase'); ?> briefcase</li>
            <li><?php seed_icon('calendar'); ?> calendar</li>
            <li><?php seed_icon('camera-off'); ?> camera-off</li>
            <li><?php seed_icon('camera'); ?> camera</li>
            <li><?php seed_icon('cast'); ?> cast</li>
            <li><?php seed_icon('check-circle'); ?> check-circle</li>
            <li><?php seed_icon('check-square'); ?> check-square</li>
            <li><?php seed_icon('check'); ?> check</li>
            <li><?php seed_icon('chevron-down'); ?> chevron-down</li>
            <li><?php seed_icon('chevron-left'); ?> chevron-left</li>
            <li><?php seed_icon('chevron-right'); ?> chevron-right</li>
            <li><?php seed_icon('chevron-up'); ?> chevron-up</li>
            <li><?php seed_icon('chevrons-down'); ?> chevrons-down</li>
            <li><?php seed_icon('chevrons-left'); ?> chevrons-left</li>
            <li><?php seed_icon('chevrons-right'); ?> chevrons-right</li>
            <li><?php seed_icon('chevrons-up'); ?> chevrons-up</li>
            <li><?php seed_icon('chrome'); ?> chrome</li>
            <li><?php seed_icon('circle'); ?> circle</li>
            <li><?php seed_icon('clipboard'); ?> clipboard</li>
            <li><?php seed_icon('clock'); ?> clock</li>
            <li><?php seed_icon('cloud-drizzle'); ?> cloud-drizzle</li>
            <li><?php seed_icon('cloud-lightning'); ?> cloud-lightning</li>
            <li><?php seed_icon('cloud-off'); ?> cloud-off</li>
            <li><?php seed_icon('cloud-rain'); ?> cloud-rain</li>
            <li><?php seed_icon('cloud-snow'); ?> cloud-snow</li>
            <li><?php seed_icon('cloud'); ?> cloud</li>
            <li><?php seed_icon('code'); ?> code</li>
            <li><?php seed_icon('codepen'); ?> codepen</li>
            <li><?php seed_icon('codesandbox'); ?> codesandbox</li>
            <li><?php seed_icon('coffee'); ?> coffee</li>
            <li><?php seed_icon('columns'); ?> columns</li>
            <li><?php seed_icon('command'); ?> command</li>
            <li><?php seed_icon('compass'); ?> compass</li>
            <li><?php seed_icon('copy'); ?> copy</li>
            <li><?php seed_icon('corner-down-left'); ?> corner-down-left</li>
            <li><?php seed_icon('corner-down-right'); ?> corner-down-right</li>
            <li><?php seed_icon('corner-left-down'); ?> corner-left-down</li>
            <li><?php seed_icon('corner-left-up'); ?> corner-left-up</li>
            <li><?php seed_icon('corner-right-down'); ?> corner-right-down</li>
            <li><?php seed_icon('corner-right-up'); ?> corner-right-up</li>
            <li><?php seed_icon('corner-up-left'); ?> corner-up-left</li>
            <li><?php seed_icon('corner-up-right'); ?> corner-up-right</li>
            <li><?php seed_icon('cpu'); ?> cpu</li>
            <li><?php seed_icon('credit-card'); ?> credit-card</li>
            <li><?php seed_icon('crop'); ?> crop</li>
            <li><?php seed_icon('crosshair'); ?> crosshair</li>
            <li><?php seed_icon('database'); ?> database</li>
            <li><?php seed_icon('delete'); ?> delete</li>
            <li><?php seed_icon('disc'); ?> disc</li>
            <li><?php seed_icon('dollar-sign'); ?> dollar-sign</li>
            <li><?php seed_icon('download-cloud'); ?> download-cloud</li>
            <li><?php seed_icon('download'); ?> download</li>
            <li><?php seed_icon('droplet'); ?> droplet</li>
            <li><?php seed_icon('edit-2'); ?> edit-2</li>
            <li><?php seed_icon('edit-3'); ?> edit-3</li>
            <li><?php seed_icon('edit'); ?> edit</li>
            <li><?php seed_icon('external-link'); ?> external-link</li>
            <li><?php seed_icon('eye-off'); ?> eye-off</li>
            <li><?php seed_icon('eye'); ?> eye</li>
            <li><?php seed_icon('facebook'); ?> facebook</li>
            <li><?php seed_icon('fast-forward'); ?> fast-forward</li>
            <li><?php seed_icon('feather'); ?> feather</li>
            <li><?php seed_icon('figma'); ?> figma</li>
            <li><?php seed_icon('file-minus'); ?> file-minus</li>
            <li><?php seed_icon('file-plus'); ?> file-plus</li>
            <li><?php seed_icon('file-text'); ?> file-text</li>
            <li><?php seed_icon('file'); ?> file</li>
            <li><?php seed_icon('film'); ?> film</li>
            <li><?php seed_icon('filter'); ?> filter</li>
            <li><?php seed_icon('flag'); ?> flag</li>
            <li><?php seed_icon('folder-minus'); ?> folder-minus</li>
            <li><?php seed_icon('folder-plus'); ?> folder-plus</li>
            <li><?php seed_icon('folder'); ?> folder</li>
            <li><?php seed_icon('framer'); ?> framer</li>
            <li><?php seed_icon('frown'); ?> frown</li>
            <li><?php seed_icon('gift'); ?> gift</li>
            <li><?php seed_icon('git-branch'); ?> git-branch</li>
            <li><?php seed_icon('git-commit'); ?> git-commit</li>
            <li><?php seed_icon('git-merge'); ?> git-merge</li>
            <li><?php seed_icon('git-pull-request'); ?> git-pull-request</li>
            <li><?php seed_icon('github'); ?> github</li>
            <li><?php seed_icon('gitlab'); ?> gitlab</li>
            <li><?php seed_icon('globe'); ?> globe</li>
            <li><?php seed_icon('grid'); ?> grid</li>
            <li><?php seed_icon('hard-drive'); ?> hard-drive</li>
            <li><?php seed_icon('hash'); ?> hash</li>
            <li><?php seed_icon('headphones'); ?> headphones</li>
            <li><?php seed_icon('heart'); ?> heart</li>
            <li><?php seed_icon('help-circle'); ?> help-circle</li>
            <li><?php seed_icon('hexagon'); ?> hexagon</li>
            <li><?php seed_icon('home'); ?> home</li>
            <li><?php seed_icon('image'); ?> image</li>
            <li><?php seed_icon('inbox'); ?> inbox</li>
            <li><?php seed_icon('info'); ?> info</li>
            <li><?php seed_icon('instagram'); ?> instagram</li>
            <li><?php seed_icon('italic'); ?> italic</li>
            <li><?php seed_icon('key'); ?> key</li>
            <li><?php seed_icon('layers'); ?> layers</li>
            <li><?php seed_icon('layout'); ?> layout</li>
            <li><?php seed_icon('life-buoy'); ?> life-buoy</li>
            <li><?php seed_icon('link-2'); ?> link-2</li>
            <li><?php seed_icon('link'); ?> link</li>
            <li><?php seed_icon('linkedin'); ?> linkedin</li>
            <li><?php seed_icon('list'); ?> list</li>
            <li><?php seed_icon('loader'); ?> loader</li>
            <li><?php seed_icon('lock'); ?> lock</li>
            <li><?php seed_icon('log-in'); ?> log-in</li>
            <li><?php seed_icon('log-out'); ?> log-out</li>
            <li><?php seed_icon('mail'); ?> mail</li>
            <li><?php seed_icon('map-pin'); ?> map-pin</li>
            <li><?php seed_icon('map'); ?> map</li>
            <li><?php seed_icon('maximize-2'); ?> maximize-2</li>
            <li><?php seed_icon('maximize'); ?> maximize</li>
            <li><?php seed_icon('meh'); ?> meh</li>
            <li><?php seed_icon('menu'); ?> menu</li>
            <li><?php seed_icon('message-circle'); ?> message-circle</li>
            <li><?php seed_icon('message-square'); ?> message-square</li>
            <li><?php seed_icon('mic-off'); ?> mic-off</li>
            <li><?php seed_icon('mic'); ?> mic</li>
            <li><?php seed_icon('minimize-2'); ?> minimize-2</li>
            <li><?php seed_icon('minimize'); ?> minimize</li>
            <li><?php seed_icon('minus-circle'); ?> minus-circle</li>
            <li><?php seed_icon('minus-square'); ?> minus-square</li>
            <li><?php seed_icon('minus'); ?> minus</li>
            <li><?php seed_icon('monitor'); ?> monitor</li>
            <li><?php seed_icon('moon'); ?> moon</li>
            <li><?php seed_icon('more-horizontal'); ?> more-horizontal</li>
            <li><?php seed_icon('more-vertical'); ?> more-vertical</li>
            <li><?php seed_icon('mouse-pointer'); ?> mouse-pointer</li>
            <li><?php seed_icon('move'); ?> move</li>
            <li><?php seed_icon('music'); ?> music</li>
            <li><?php seed_icon('navigation-2'); ?> navigation-2</li>
            <li><?php seed_icon('navigation'); ?> navigation</li>
            <li><?php seed_icon('octagon'); ?> octagon</li>
            <li><?php seed_icon('package'); ?> package</li>
            <li><?php seed_icon('paperclip'); ?> paperclip</li>
            <li><?php seed_icon('pause-circle'); ?> pause-circle</li>
            <li><?php seed_icon('pause'); ?> pause</li>
            <li><?php seed_icon('pen-tool'); ?> pen-tool</li>
            <li><?php seed_icon('percent'); ?> percent</li>
            <li><?php seed_icon('phone-call'); ?> phone-call</li>
            <li><?php seed_icon('phone-forwarded'); ?> phone-forwarded</li>
            <li><?php seed_icon('phone-incoming'); ?> phone-incoming</li>
            <li><?php seed_icon('phone-missed'); ?> phone-missed</li>
            <li><?php seed_icon('phone-off'); ?> phone-off</li>
            <li><?php seed_icon('phone-outgoing'); ?> phone-outgoing</li>
            <li><?php seed_icon('phone'); ?> phone</li>
            <li><?php seed_icon('pie-chart'); ?> pie-chart</li>
            <li><?php seed_icon('play-circle'); ?> play-circle</li>
            <li><?php seed_icon('play'); ?> play</li>
            <li><?php seed_icon('plus-circle'); ?> plus-circle</li>
            <li><?php seed_icon('plus-square'); ?> plus-square</li>
            <li><?php seed_icon('plus'); ?> plus</li>
            <li><?php seed_icon('pocket'); ?> pocket</li>
            <li><?php seed_icon('power'); ?> power</li>
            <li><?php seed_icon('printer'); ?> printer</li>
            <li><?php seed_icon('radio'); ?> radio</li>
            <li><?php seed_icon('refresh-ccw'); ?> refresh-ccw</li>
            <li><?php seed_icon('refresh-cw'); ?> refresh-cw</li>
            <li><?php seed_icon('repeat'); ?> repeat</li>
            <li><?php seed_icon('rewind'); ?> rewind</li>
            <li><?php seed_icon('rotate-ccw'); ?> rotate-ccw</li>
            <li><?php seed_icon('rotate-cw'); ?> rotate-cw</li>
            <li><?php seed_icon('rss'); ?> rss</li>
            <li><?php seed_icon('save'); ?> save</li>
            <li><?php seed_icon('scissors'); ?> scissors</li>
            <li><?php seed_icon('search'); ?> search</li>
            <li><?php seed_icon('send'); ?> send</li>
            <li><?php seed_icon('server'); ?> server</li>
            <li><?php seed_icon('settings'); ?> settings</li>
            <li><?php seed_icon('share-2'); ?> share-2</li>
            <li><?php seed_icon('share'); ?> share</li>
            <li><?php seed_icon('shield-off'); ?> shield-off</li>
            <li><?php seed_icon('shield'); ?> shield</li>
            <li><?php seed_icon('shopping-bag'); ?> shopping-bag</li>
            <li><?php seed_icon('shopping-cart'); ?> shopping-cart</li>
            <li><?php seed_icon('shuffle'); ?> shuffle</li>
            <li><?php seed_icon('sidebar'); ?> sidebar</li>
            <li><?php seed_icon('skip-back'); ?> skip-back</li>
            <li><?php seed_icon('skip-forward'); ?> skip-forward</li>
            <li><?php seed_icon('slack'); ?> slack</li>
            <li><?php seed_icon('slash'); ?> slash</li>
            <li><?php seed_icon('sliders'); ?> sliders</li>
            <li><?php seed_icon('smartphone'); ?> smartphone</li>
            <li><?php seed_icon('smile'); ?> smile</li>
            <li><?php seed_icon('speaker'); ?> speaker</li>
            <li><?php seed_icon('square'); ?> square</li>
            <li><?php seed_icon('star'); ?> star</li>
            <li><?php seed_icon('stop-circle'); ?> stop-circle</li>
            <li><?php seed_icon('sun'); ?> sun</li>
            <li><?php seed_icon('sunrise'); ?> sunrise</li>
            <li><?php seed_icon('sunset'); ?> sunset</li>
            <li><?php seed_icon('tablet'); ?> tablet</li>
            <li><?php seed_icon('tag'); ?> tag</li>
            <li><?php seed_icon('target'); ?> target</li>
            <li><?php seed_icon('terminal'); ?> terminal</li>
            <li><?php seed_icon('thermometer'); ?> thermometer</li>
            <li><?php seed_icon('thumbs-down'); ?> thumbs-down</li>
            <li><?php seed_icon('thumbs-up'); ?> thumbs-up</li>
            <li><?php seed_icon('toggle-left'); ?> toggle-left</li>
            <li><?php seed_icon('toggle-right'); ?> toggle-right</li>
            <li><?php seed_icon('tool'); ?> tool</li>
            <li><?php seed_icon('trash-2'); ?> trash-2</li>
            <li><?php seed_icon('trash'); ?> trash</li>
            <li><?php seed_icon('trello'); ?> trello</li>
            <li><?php seed_icon('trending-down'); ?> trending-down</li>
            <li><?php seed_icon('trending-up'); ?> trending-up</li>
            <li><?php seed_icon('triangle'); ?> triangle</li>
            <li><?php seed_icon('truck'); ?> truck</li>
            <li><?php seed_icon('tv'); ?> tv</li>
            <li><?php seed_icon('twitch'); ?> twitch</li>
            <li><?php seed_icon('twitter'); ?> twitter</li>
            <li><?php seed_icon('type'); ?> type</li>
            <li><?php seed_icon('umbrella'); ?> umbrella</li>
            <li><?php seed_icon('underline'); ?> underline</li>
            <li><?php seed_icon('unlock'); ?> unlock</li>
            <li><?php seed_icon('upload-cloud'); ?> upload-cloud</li>
            <li><?php seed_icon('upload'); ?> upload</li>
            <li><?php seed_icon('user-check'); ?> user-check</li>
            <li><?php seed_icon('user-minus'); ?> user-minus</li>
            <li><?php seed_icon('user-plus'); ?> user-plus</li>
            <li><?php seed_icon('user-x'); ?> user-x</li>
            <li><?php seed_icon('user'); ?> user</li>
            <li><?php seed_icon('users'); ?> users</li>
            <li><?php seed_icon('video-off'); ?> video-off</li>
            <li><?php seed_icon('video'); ?> video</li>
            <li><?php seed_icon('voicemail'); ?> voicemail</li>
            <li><?php seed_icon('volume-1'); ?> volume-1</li>
            <li><?php seed_icon('volume-2'); ?> volume-2</li>
            <li><?php seed_icon('volume-x'); ?> volume-x</li>
            <li><?php seed_icon('volume'); ?> volume</li>
            <li><?php seed_icon('watch'); ?> watch</li>
            <li><?php seed_icon('wifi-off'); ?> wifi-off</li>
            <li><?php seed_icon('wifi'); ?> wifi</li>
            <li><?php seed_icon('wind'); ?> wind</li>
            <li><?php seed_icon('x-circle'); ?> x-circle</li>
            <li><?php seed_icon('x-octagon'); ?> x-octagon</li>
            <li><?php seed_icon('x-square'); ?> x-square</li>
            <li><?php seed_icon('x'); ?> x</li>
            <li><?php seed_icon('youtube'); ?> youtube</li>
            <li><?php seed_icon('zap-off'); ?> zap-off</li>
            <li><?php seed_icon('zap'); ?> zap</li>
            <li><?php seed_icon('zoom-in'); ?> zoom-in</li>
            <li><?php seed_icon('zoom-out'); ?> zoom-out</li>
        </ul>

        <h3>More icons from SeedThemes</h3>

        <ul class="demo-icons">
            <li><?php seed_icon('s-user'); ?> s-user</li>
            <li><?php seed_icon('s-facebook'); ?> s-facebook</li>
            <li><?php seed_icon('s-twitter'); ?> s-twitter</li>
            <li><?php seed_icon('s-line'); ?> s-line</li>
            <li><?php seed_icon('s-youtube'); ?> s-youtube</li>
            <li><?php seed_icon('s-messenger'); ?> s-messenger</li>
            <li><?php seed_icon('s-vimeo'); ?> s-vimeo</li>
            <li><?php seed_icon('s-pinterest'); ?> s-pinterest</li>
            <li><?php seed_icon('s-linkedin'); ?> s-linkedin</li>
            <li><?php seed_icon('s-apple'); ?> s-apple</li>
            <li><?php seed_icon('s-googleplay'); ?> s-googleplay</li>
            <li><?php seed_icon('s-wordpress'); ?> s-wordpress</li>
        </ul>

    </div>
</div>

<?php get_footer(); ?>