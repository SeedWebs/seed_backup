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
$banner_style    = '-faded';
$headline_title    = '';
$headline_subtitle = '';
$headline_style    = get_field("headline_style");

if( $headline_style == '2' || $headline_style == '3') {
    $banner_style = '-bright';
}
if( $headline_style == '2' || $headline_style  == '1') {
    $headline_title    = get_field("headline_title");
    $headline_subtitle = get_field("headline_subtitle");
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('content-headline'); ?>>
    <a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark">
        <div class="pic <?php echo $banner_style; ?>">
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