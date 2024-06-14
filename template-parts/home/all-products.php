<section class="all-products">
    <div class="all-products__outer">
        <div class="all-products__inner">
            <div class="all-products__header slide-to-right animate">
                <h2 class="all-products__header-title h2"><?php the_field('title_section')?></h2>
                <p class="all-products__header-subtitle h4"><?php the_field('all_mats_text')?></p>
            </div>

            <div class="all-products__items">
                <?php
                if(have_rows('all_products')):
                    while(have_rows('all_products')): the_row();
                    ?>

                <div class="all-products__items-item fade animate">
                    <a class="all-products__items-item-img item-name" href="<?php the_sub_field('mat_link') ?>">
                        <span class="all-products__items-item-image">
                            <?php
                            $image = get_sub_field('mat_img');
                            $size = 'main-mats';
                            if($image){
                                echo wp_get_attachment_image($image, $size);
                            }
                            ?>
                        </span>

                        <span class="all-products__items-item-img-name">
                            <?php the_sub_field('mat_name') ?>
                        </span>
                    </a>


                    <div class="all-products__items-item-arrow">
                        <a href="<?php the_sub_field('mat_link') ?>">
                            <div class="arrow-right body2">
                                <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2023/12/arrow-right.svg" alt="strzałka">

                            </div>
                        </a>
                    </div>

                </div>
                <?php endwhile; endif; ?>

                <div class="all-products__special-box slide-to-left animate">
                    <p class="h2 all-products__special-box-title"><?php the_field('special_box_title'); ?></p>


                    <?php 
                        $link = get_field('special_box_btn');
                        if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>

                    <a class=" default-button  body-medium all-products__special-box-btn "
                        href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    const arrowsRight = document.querySelectorAll('.arrow-right');
    const itemsCards = document.querySelectorAll('.all-products__items-item');

    itemsCards.forEach(itemCard => {
        const arrowRight = itemCard.querySelector('.arrow-right');

        itemCard.addEventListener('mouseover', function() {
            arrowRight.classList.add('active-arrow');
        });

        itemCard.addEventListener('mouseout', function() {
            arrowRight.classList.remove('active-arrow');
        });
    });
    </script>

</section>