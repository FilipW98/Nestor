<?php
/*
Template Name: O nas
*/

get_header(); ?>

<main class="about-us">

    <?php if(have_rows('general_flex_fields')):
           while(have_rows('general_flex_fields')): the_row(); ?>

    <?php $component_name = get_row_layout();
    // echo //$component_name; ?>
    <?php get_template_part('/template-parts/components/flex', $component_name ); ?>

    <?php endwhile; endif ?>

</main>

<?php get_footer(); ?>