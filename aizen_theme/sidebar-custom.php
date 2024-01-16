<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aizen_theme
 */

if ( ! is_active_sidebar( 'custom_sidebar' ) ) {
	return;
}
?>

<aside id="custom-sidebar" class="widget-area">
    <?php dynamic_sidebar('custom_sidebar'); ?>
</aside><!-- #secondary -->
