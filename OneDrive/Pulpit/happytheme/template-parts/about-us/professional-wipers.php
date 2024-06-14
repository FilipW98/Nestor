<section class="professional-wipers">
    <div class="professional-wipers__outer">
        <div class="professional-wipers__inner">
            <div class="professional-wipers__top-box">
                <h2 class="professional-wipers__heading h1 slide-to-right animate">
                    <?php the_field('professional_wipers_heading') ?>
                </h2>
                <div class="professional-wipers__text-box slide-to-left animate">
                    <span class="professional-wipers__small-text bodytext-16-regular2">
                        <?php the_field('professional_wipers_small_text') ?>
                    </span>
                    <div class="professional-wipers__btn">
                        <?php 
                        $link = get_field('professional_wipers_btn');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="professional-wipers__link bodytext-16-regular1 button-brown" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="professional-wipers__products-box">
                <?php if( have_rows('professional_wipers_repeater') ):
                    while( have_rows('professional_wipers_repeater') ) : the_row(); ?>
                        <div class="professional-wipers__link-box">
                            <?php 
                            $link = get_sub_field('professional_wipers_link');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="professional-wipers__product-link fade animate" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <div class="professional-wipers__product">
                                        <div class="professional-wipers__image">
                                            <?php
                                            $image = get_sub_field('professional_wipers_image');
                                            $size = array(681, 659); // (thumbnail, medium, large, full or custom size)
                                            if( $image ) {
                                                echo wp_get_attachment_image( $image, $size );
                                            }
                                            ?>
                                        </div>
                                        <div class="professional-wipers__product-text">
                                            <span class="professional-wipers__product-name h3">
                                                <?php echo esc_html( $link_title ); ?>
                                            </span>
                                            <span class="professional-wipers__tag h4">
                                                <?php the_sub_field('professional_wipers_text') ?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>