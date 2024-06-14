<section class="intro">
    <div class="intro__outer">
        <div class="intro__inner">
            <div class="intro__splide splide" role="group">
                <div class="intro__track splide__track">
		            <ul class="intro__list splide__list">
                        <?php if( have_rows('intro_repeater') ):
                            while( have_rows('intro_repeater') ) : the_row(); ?>
                                <li class="intro__splide splide__slide">
                                    <div class="intro__bg-image">
                                        <?php
                                        $image = get_sub_field('intro_image');
                                        $size = array(1440, 728); // (thumbnail, medium, large, full or custom size)
                                        if( $image ) {
                                            echo wp_get_attachment_image( $image, $size );
                                        }
                                        ?>
                                    </div>
                                    <div class="intro__text-box fade animate">
                                        <h1 class="intro__big-text display">
                                            <?php the_sub_field('intro_big_text') ?>
                                        </h1>
                                        <p class="intro__small-text bodytext-20-regular">
                                            <?php the_sub_field('intro_small_text') ?>
                                        </p>
                                    </div>
                                </li>
                            <?php endwhile;
                        endif; ?>
		            </ul>
                </div>
            </div>
        </div>
    </div>
</section>