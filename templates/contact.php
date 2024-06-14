<?php
/*

Template Name: Kontakt

*/

get_header(); ?>


<main class="contact">

    <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p class="fade animate" id="breadcrumbs">','</p>' );
}
?>

    <?php get_template_part('/template-parts/components/contact-form-with-image') ?>




</main>

<?php get_footer(); ?>