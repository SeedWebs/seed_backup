<?php
/**
 * seed functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package seed
 */

/* LAYOUT */
if (!isset($GLOBALS['s_blog_layout']))          {$GLOBALS['s_blog_layout']          = 'full-width';}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_blog_layout_single']))   {$GLOBALS['s_blog_layout_single']   = 'full-width';}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_blog_columns_m']))       {$GLOBALS['s_blog_columns_m']       = '1';}             // 1,2,3
if (!isset($GLOBALS['s_blog_columns_d']))       {$GLOBALS['s_blog_columns_d']       = '3';}             // 1,2,3,4,5,6
if (!isset($GLOBALS['s_blog_columns_d_style'])) {$GLOBALS['s_blog_columns_d_style'] = 'card';}          // list, card, caption
if (!isset($GLOBALS['s_blog_profile']))         {$GLOBALS['s_blog_profile']         = 'enable';}        // disable, enable
if (!isset($GLOBALS['s_shop_layout']))          {$GLOBALS['s_shop_layout']          = 'full-width';}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_shop_pagebuilder']))     {$GLOBALS['s_shop_pagebuilder']     = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_logo_path']))            {$GLOBALS['s_logo_path']            = 'none';}          // theme folder relative path, such as img/logo.svg .
if (!isset($GLOBALS['s_logo_width']))           {$GLOBALS['s_logo_width']           = '200';}           // any number, use in Custom Logo
if (!isset($GLOBALS['s_logo_height']))          {$GLOBALS['s_logo_height']          = '100';}           // any number, use in Custom Logo
if (!isset($GLOBALS['s_thumb_width']))          {$GLOBALS['s_thumb_width']          = '360';}           // any number
if (!isset($GLOBALS['s_thumb_height']))         {$GLOBALS['s_thumb_height']         = '189';}           // any number
if (!isset($GLOBALS['s_thumb_crop']))           {$GLOBALS['s_thumb_crop']           = true;}            // true, false
if (!isset($GLOBALS['s_title_style']))          {$GLOBALS['s_title_style']          = 'banner';}        // minimal, banner

/* ADD-ON */
if (!isset($GLOBALS['s_member_url']))           {$GLOBALS['s_member_url']           = 'none';}          // none, url path such as: /my-account/
if (!isset($GLOBALS['s_member_label']))         {$GLOBALS['s_member_label']         = 'Member';}        // ex: Member, สมาชิก
if (!isset($GLOBALS['s_keen_slider']))          {$GLOBALS['s_keen_slider']          = 'enable';}        // disable, enable
if (!isset($GLOBALS['s_style_css']))            {$GLOBALS['s_style_css']            = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_jquery']))               {$GLOBALS['s_jquery']               = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_fontawesome']))          {$GLOBALS['s_fontawesome']          = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_wp_comments']))          {$GLOBALS['s_wp_comments']          = 'disable';}       // disable, enable
if (!isset($GLOBALS['s_admin_bar']))            {$GLOBALS['s_admin_bar']            = 'hide';}          // hide, show

/* CHECK WOOCOMMERCE */
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if (is_plugin_active('woocommerce/woocommerce.php')) {
    $GLOBALS['s_is_woo']       = true;
    $GLOBALS['s_member_url']   = '/my-account/';
} else {
    $GLOBALS['s_is_woo']       = false;
}

/* Admin Bar */
if ($GLOBALS['s_admin_bar'] == 'hide') {
    add_filter('show_admin_bar', '__return_false');
}

/**
 * Setup Theme
 */
if (!function_exists('seed_setup')) {
    function seed_setup()
    {
        load_theme_textdomain('seed', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('custom-logo', array(
            'width'       => $GLOBALS['s_logo_width'],
            'height'      => $GLOBALS['s_logo_height'],
            'flex-width'  => true,
            'flex-height' => true,
        ));
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size($GLOBALS['s_thumb_width'], $GLOBALS['s_thumb_height'], $GLOBALS['s_thumb_crop']);
        register_nav_menus(array(
            'primary' => esc_html__('Main Menu', 'seed'),
            'mobile'  => esc_html__('Mobile Menu', 'seed'),
        ));
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_theme_support('custom-background');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('align-wide');
    }
}
add_action('after_setup_theme', 'seed_setup');

function seed_content_width()
{
    $GLOBALS['content_width'] = apply_filters('seed_content_width', 750);
}
add_action('after_setup_theme', 'seed_content_width', 0);

/**
 * Register widget area.
 */
function seed_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Right Sidebar', 'seed'),
        'id'            => 'rightbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Left Sidebar', 'seed'),
        'id'            => 'leftbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Shop Sidebar', 'seed'),
        'id'            => 'shopbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Home Banner', 'seed'),
        'id'            => 'home_banner',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Page Banner', 'seed'),
        'id'            => 'page_banner',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Action', 'seed'),
        'id'            => 'action',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Mobile Menu', 'seed'),
        'id'            => 'mobile_menu',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Headbar Mobile', 'seed'),
        'id'            => 'headbar_m',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="head-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Headbar Desktop', 'seed'),
        'id'            => 'headbar_d',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="head-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footbar', 'seed'),
        'id'            => 'footbar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

}
add_action('widgets_init', 'seed_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function seed_scripts()
{

    wp_enqueue_style('s-mobile', get_theme_file_uri('/css/mobile.css'), array(), false);
    wp_enqueue_style('s-desktop', get_theme_file_uri('/css/desktop.css'), array(), false , '(min-width: 992px)');

    if ($GLOBALS['s_style_css'] == 'enable') {
        wp_enqueue_style('s-style', get_stylesheet_uri());
    }

    if ($GLOBALS['s_is_woo']) {
        wp_enqueue_style('s-woo', get_theme_file_uri('/css/woo.css'));
    }

    if ($GLOBALS['s_fontawesome'] == 'enable') {
        wp_enqueue_style('s-fa', get_theme_file_uri('/fonts/fontawesome/css/all.min.css'), array(),'5.10.1');
    }

    wp_enqueue_script('s-scripts', get_theme_file_uri('/js/scripts.js'), array(), false, true);
    
    if ($GLOBALS['s_keen_slider'] == 'enable') {
        wp_enqueue_script('s-slider', get_theme_file_uri('/js/keen-slider.js'), array(), false, true);
    }
    
    wp_enqueue_script('s-vanilla', get_theme_file_uri('/js/main-vanilla.js'), array(), false, true);

    if ($GLOBALS['s_jquery'] == 'enable') {
        wp_enqueue_script('s-jquery', get_theme_file_uri('/js/main-jquery.js'), array('jquery'), false, true);
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'seed_scripts');

/**
 * Add backend styles for Gutenberg.
 */
add_action('enqueue_block_editor_assets', 'seed_add_gutenberg_assets');
function seed_add_gutenberg_assets()
{
    wp_enqueue_style('seed-gutenberg', get_theme_file_uri('/css/wp-gutenberg.css'), false);
}

/**
 * Admin CSS
 */
function seed_admin_style()
{
    wp_enqueue_style('seed-admin-style', get_template_directory_uri() . '/css/wp-admin.css');
}
add_action('admin_enqueue_scripts', 'seed_admin_style');


/**
 * Remove "Category: ", "Tag: ", "Taxonomy: " from archive title
 */
add_filter('get_the_archive_title', 'seed_get_the_archive_title');
function seed_get_the_archive_title($title)
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }
    return $title;
}

/**
 * Custom WooCommerce Settings
 */
if ($GLOBALS['s_is_woo']) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Custom Shortcode
 */
require get_template_directory() . '/inc/shortcode.php';

/**
 * Redirect after login -  to current page
 */
function seed_redirect_to_request( $redirect_to, $request, $user ){
    return $request;
}
if($GLOBALS['s_member_url'] != 'none') {  
    add_filter('login_redirect', 'seed_redirect_to_request', 10, 3);
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {require get_template_directory() . '/inc/jetpack.php';}