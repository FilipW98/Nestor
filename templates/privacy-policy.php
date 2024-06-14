<?php
/*
Template Name: Polityka prywatności
*/


get_header(); ?>

<main class="privacy-policy__main">
    <section class="privacy-policy">
        <div class="privacy-policy__title h1"><?php  the_title();?></div>
        <div class="privacy-policy__outer">
            <div class="privacy-policy__inner">

                <div class="privacy-policy__text wysiwyg body4">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>