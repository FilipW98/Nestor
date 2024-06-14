<?php
/*
Template Name: Szablon Wycieraczek
*/

 get_header(); ?>

<main class="main">

 <?php if(have_rows('general_flex_fields')):
         while(have_rows('general_flex_fields')): the_row('') ?>

    <?php get_template_part('/template-parts/products/select-mat') ?>

      <?php endwhile; endif ?>
</main>

<?php get_footer(); ?>