<section class="products">
    <div class="products__outer">
        <div class="products__inner">
            <div class="products__top-box">
                <div class="products__heading-box slide-to-right animate">
                    <h2 class="products__heading h2">
                        <?php the_field('products_heading') ?>
                    </h2>
                    <span class="products__small-text bodytext-18-regular">
                        <?php the_field('products_small_text') ?>
                    </span>
                </div>
                <div class="products__btn slide-to-left animate">
                    <?php 
                    $link = get_field('products_btn');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="products__link bodytext-16-regular1 button-brown" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="products__products-box">
                <?php if( have_rows('products_repeater') ):
                    while( have_rows('products_repeater') ) : the_row(); ?>
                        <div class="products__link-box">
                            <?php 
                            $link = get_sub_field('products__link');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="products__product-link fade animate" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <div class="products__product">
                                        <div class="products__image">
                                            <?php
                                            $image = get_sub_field('products_image');
                                            $size = array(442, 583); // (thumbnail, medium, large, full or custom size)
                                            if( $image ) {
                                                echo wp_get_attachment_image( $image, $size );
                                            }
                                            ?>
                                        </div>
                                        <div class="products__image-hover">
                                            <?php
                                            $image = get_sub_field('products_image_hover');
                                            $size = array(442, 583); // (thumbnail, medium, large, full or custom size)
                                            if( $image ) {
                                                echo wp_get_attachment_image( $image, $size );
                                            }
                                            ?>
                                        </div>
                                        <div class="products__product-text">
                                            <span class="products__product-name h5">
                                                <?php echo esc_html( $link_title ); ?>
                                            </span>
                                            <span class="products__tag bodytext-18-light">
                                                <?php the_sub_field('products_text') ?>
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