<section class="we-experts">
    <div class="we-experts__outer">
        <div class="we-experts__inner">
            <div class="we-experts__top-box">
                <h2 class="we-experts__heading h1 slide-to-right animate">
                    <?php the_field('we_experts_heading') ?>
                </h2>
            </div>
            <div class="we-experts__bottom-box">
                <?php if( have_rows('we_experts_repeater') ):
                    while( have_rows('we_experts_repeater') ) : the_row(); ?>
                        <div class="we-experts__info-box fade animate">
                            <span class="we-experts__info-big display">
                                <?php if(get_row_index() == 1) {
                                    echo date("Y") - 2004 . " lat";
                                    } else {
                                        the_sub_field('we_experts_info_big');
                                    } ?>   
                            </span>
                            <span class="we-experts__info-small h6">
                                <?php the_sub_field('we_experts_info_small') ?>
                            </span>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>