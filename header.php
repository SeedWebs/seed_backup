<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<?php $bodyClass = ''; if (is_active_sidebar( 'headbar_d' )) { $bodyClass = 'headbar-d'; } if (is_active_sidebar( 'headbar_m' )) { $bodyClass .= ' headbar-m'; } ?>

<body <?php body_class($bodyClass); ?>>
    <?php 
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    } ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'seed' ); ?></a>
    <div id="page" class="site">

        <header id="masthead" class="site-header _heading">
            <div class="s-container">

                <div class="site-branding">
                    <div class="site-logo"><?php seed_logo(); ?></div>
                    <?php seed_title(); ?>
                </div>

                <div class="site-toggle"><b></b></div>

                <?php if (is_active_sidebar( 'headbar_m' )): ?>
                <div id="headbar_m" class="_mobile"><?php dynamic_sidebar( 'headbar_m' ); ?></div>
                <?php endif; ?>

                <?php if (is_active_sidebar( 'headbar_d' )): ?>
                <div id="headbar_d" class="_desktop"><?php dynamic_sidebar( 'headbar_d' ); ?></div>
                <?php else: ?>
                <nav id="site-navigation" class="site-nav-d _desktop">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );?>
                </nav>
                <?php endif; ?>

                <a class="site-search s-modal-trigger m-user" onclick="return false;"
                    data-popup-trigger="site-search"><?php seed_icon('search'); ?></a>

                <?php seed_member_menu() ?>

                <?php if (is_active_sidebar( 'action' )) : ?>
                <div class="site-action _desktop"><?php dynamic_sidebar( 'action' ); ?></div>
                <?php endif; ?>

            </div>
            <nav id="site-nav-m" class="site-nav-m">
                <div class="s-container">
                    <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
                </div>
            </nav>
        </header>

        <div class="s-modal -full" data-s-modal="site-search">
            <span class="s-modal-close"><?php seed_icon('x'); ?></span>
            <?php get_search_form(); ?>
        </div>

        <div class="site-header-space"></div>

        <?php 
		if (is_front_page()) {
			if (is_active_sidebar( 'home_banner' )) {
				echo '<div class="home-banner">'; dynamic_sidebar( 'home_banner' ); echo '</div>';
			} 
		} else {
			if (is_active_sidebar( 'page_banner' )) {
				echo '<div class="page-banner">'; dynamic_sidebar( 'page_banner' ); echo '</div>';
			}
		}
		?>

        <div id="content" class="site-content">