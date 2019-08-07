<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seed
 */

if ( ! is_active_sidebar( 'leftbar' ) ) {
	return;
}
?>

<aside id="leftbar" class="widget-area _heading">
    <?php dynamic_sidebar( 'leftbar' ); ?>
</aside>