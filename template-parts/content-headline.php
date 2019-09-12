<?php
/**
 * Loop Name: Content Headline
 */

/*
HEADLINE STYLE
1 : Title on faded banner
2 : Title on bright banner
3 : Banner image only
*/
$headline_style = '';
$headline_title    = '';
$headline_subtitle = '';
$banner_style      = '';

if (function_exists('get_field')) {
    $headline_style    = get_field("headline_style");
}

switch ($headline_style) {
    case "1":
        $headline_title    = get_field("headline_title");
        $headline_subtitle = get_field("headline_subtitle");
        break;
    case "2":
        $headline_title    = get_field("headline_title");
        $headline_subtitle = get_field("headline_subtitle");
        $banner_style = '-bright';
        break;
    case "3":
        $banner_style = '-bright -notitle';
        break;
    default:
        break;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('content-headline ' . $banner_style); ?>>
    <a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark">
        <div class="pic">
            <?php if(has_post_thumbnail()) { the_post_thumbnail('full');} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
        </div>
        <div class="info">
            <header class="entry-header">
                <?php 
                if( $headline_title ) {
                    echo '<h2 class="entry-title">' . $headline_title . '</h2>' ;
                    if( $headline_subtitle ) {
                        echo '<h3>' . $headline_subtitle . '</h2>' ;
                    }
                } else {
                    the_title('<h2 class="entry-title">', '</h2>' );
                }
                ?>
            </header>
        </div>
    </a>
</article>