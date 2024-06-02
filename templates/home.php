<?php
/*

Template Name: Strona główna

*/

get_header(); ?>


<main class="home-main">

    <?php get_template_part( 'template-parts/home/intro' ) ?>
    <?php get_template_part( 'template-parts/home/we-experts' ) ?>
    <?php get_template_part( 'template-parts/home/products' ) ?>
    <?php get_template_part( 'template-parts/home/professional-wipers' ) ?>
    <?php get_template_part('/template-parts/components/contact-form-with-image') ?>

</main>

<?php get_footer(); ?>