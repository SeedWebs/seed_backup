<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seed
 */

if ( ! is_active_sidebar( 'rightbar' ) ) {
	return;
}
?>

<aside id="rightbar" class="widget-area _heading">
    <?php dynamic_sidebar( 'rightbar' ); ?>
</aside>