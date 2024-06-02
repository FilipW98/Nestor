<?php
/*

Template Name: O nas

*/

get_header(); ?>


<main class="about-us">

<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p class="fade animate" id="breadcrumbs">','</p>' );
}
?>

    <?php get_template_part( 'template-parts/about-us/intro' ) ?>
    <?php get_template_part( 'template-parts/about-us/we-experts' ) ?>
    <?php get_template_part( 'template-parts/about-us/who-we-are' ) ?>
    <?php get_template_part( 'template-parts/about-us/professional-wipers' ) ?>

</main>

<?php get_footer(); ?>