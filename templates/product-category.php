<?php
/*
Template Name: Strona Kategorii Produktu
*/

 get_header(); ?>

<main class="main product-cat">

<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p class="fade animate" id="breadcrumbs">','</p>' );
}
?>

    <?php get_template_part('/template-parts/product-category/cat-header') ?>
    <?php get_template_part('/template-parts/product-category/cat-selector') ?>
    <?php get_template_part('/template-parts/product-category/cat-seo') ?>

    <?php ?>
</main>

<?php get_footer(); ?>