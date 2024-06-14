<?php
/*

Template Name: Strona główna

*/

get_header(); ?>

<main class="main">
    <?php
    $component_name = get_row_layout();
    echo $component_name ?>
    <?php get_template_part('/template-parts/home/intro') ?>
    <?php get_template_part('/template-parts/home/all-products') ?>
    <?php get_template_part('/template-parts/home/contact-us-main') ?>

    <?php if(have_rows('general_flex_fields')):
    while(have_rows('general_flex_fields')): the_row()?>

    <?php $component_name = get_row_layout();
    //echo //$component_name;?>
    <?php get_template_part('/template-parts/components/flex', $component_name )?>

    <?php endwhile; endif ?>

</main>

<?php get_footer(); ?>