<?php
/**
 * Template Name: Error
 *
 * @package WordPress
 * @subpackage Test Theme
 * @since Test Theme 1.0
 */
?>
<?php  get_header(); ?>
<?php
get_template_part('template-parts/title', null, array(
    'title' => 'Для вашей страны вход запрещён!'
));
?>
<?php get_footer(); ?>
