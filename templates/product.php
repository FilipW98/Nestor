<?php
/*
Template Name: Strona Produktu
*/

 get_header(); ?>

<main class="main product">

    <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p class="fade animate" id="breadcrumbs">','</p>' );
}
?>

    <?php get_template_part('/template-parts/product/product-content'); ?>



    <?php ?>
</main>

<?php get_footer(); ?>