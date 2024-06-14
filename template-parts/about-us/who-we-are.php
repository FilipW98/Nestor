<section class="who-we-are">
    <div class="who-we-are__outer">
        <div class="who-we-are__inner">
            <div class="who-we-are__left-box slide-to-right animate">
                <h2 class="who-we-are__heading h1">
                    <?php the_field('who_we_are_heading') ?>
                </h2>
                <p class="who-we-are__text bodytext-16-regular2">
                    <?php the_field('who_we_are_text') ?>
                </p>
            </div>
            <div class="who-we-are__right-box slide-to-left animate">
                <?php if( have_rows('who_we_are_repeater') ):
                    while( have_rows('who_we_are_repeater') ) : the_row(); ?>
                        <span class="who-we-are__line h6">
                            <?php the_sub_field('who_we_are_line') ?>
                        </span>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>