<?php

/*

Template Name: Polityka prywatności

*/

get_header(); ?>

<main class="privacy-policy-main">

<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p class="fade animate" id="breadcrumbs">','</p>' );
}
?>

    <section class="privacy-policy">
        <div class="privacy-policy__outer">
            <div class="privacy-policy__inner fade animate">
                <div class="privacy-policy__text ">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>