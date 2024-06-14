<section class="select-mat">
    <div class="select-mat__outer">
        <div class="select-mat__inner">
            <div class="select-mat__navigator slide-to-right animate">
                <a class="body2 select-mat__navigator-main" href="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/">Strona Główna</a>
                <span>|</span>
                <span class="body2 select-mat__navigator-mats">Wycieraczki</span>
            </div>
            <p class="select-mat__title h2 slide-to-right animate">Wycieraczki</p>

            <div class="select-mat__box">
                <div class="select-mat__box-menu slide-to-right animate">
                    <?php
                    $args = array(
                        'post_type' => 'page',
                        'posts_per_page' => -1,
                        'post_parent' => $post->ID,
                        'order' => 'ASC',
                        //'orderby' => 'menu_order'
                    );

                    $parent = new WP_Query($args);

                    $tabs_counter = 0;
                    $tabs_class_active = "";

                    if ($parent->have_posts()):
                        while ($parent->have_posts()):
                            $parent->the_post();

                            if ($tabs_counter === 0) {
                                $tabs_class_active = "active-cat";
                            } else {
                                $tabs_class_active = "";
                            }
                            ?>
                    <p class="select-mat__box-menu-name item-name <?php echo $tabs_class_active; ?>"
                        data-tab-number="<?php echo $parent->current_post; ?>"
                        data-child-slug="<?php echo get_post_field('post_name', get_the_ID()); ?>">
                        <?php echo get_post_field('post_title', get_the_ID()); ?>
                    </p>
                    <?php $tabs_counter++; endwhile; endif;
                    wp_reset_postdata(); ?>
                </div>
                <div class="select-mat__box-items">

                    <?php
                    $args = array(
                        'post_type' => 'page',
                        'posts_per_page' => -1,
                        'post_parent' => $post->ID,
                        'order' => 'ASC',
                        //'orderby' => 'menu_order'
                    );

                    $parent = new WP_Query($args);

                    $tabs_counter = 0;
                    $tabs_class_active = "";
                    if ($parent->have_posts()):
                        while ($parent->have_posts()):
                            $parent->the_post();

                            if ($tabs_counter === 0) {
                                $tabs_class_active = "active-cat";
                            } else {
                                $tabs_class_active = "";
                            }
                            ?>
                    <div class="select-mat__box-items-block <?php echo $tabs_class_active; ?>"
                        data-tab-number="<?php echo $parent->current_post; ?>"
                        data-child-slug="<?php echo get_post_field('post_name', get_the_ID()); ?>">

                        <?php
                            if (have_rows('general_flex_fields', get_the_ID())):
                                while (have_rows('general_flex_fields', get_the_ID())):
                                        the_row(); ?>
                        <?php if (have_rows('flex_mats_imgs', get_the_ID())):
                                            while (have_rows('flex_mats_imgs', get_the_ID())):
                                                the_row(); 
                                                $first_image_generated = false;
                                                ?>
                        <div class="select-mat__item  fade animate">
                            <?php
                                $mat_name = get_field('mat_name');
                                $mat_name_without_spaces = str_replace(' ', '', $mat_name);
                                $mat_name_without_polish_chars = stripAccents($mat_name_without_spaces);

                                $color_mat_name = get_sub_field('mat_color_name');
                                $color_mat_name_without_spaces = str_replace(' ', '', $color_mat_name);
                                $color_mat_name_without_polish_chars = stripAccents($color_mat_name_without_spaces);

                            ?>
                            <?php  
                                if (have_rows('flex_mat_main_imgs')):
                                    $item_counter = 0;
                                    while (have_rows('flex_mat_main_imgs')):
                                        the_row(); 

                                        if (!$first_image_generated) :
                                            $first_image_generated = true;
                                ?>
                            <a class="select-mat__item-img item-name"
                                href='<?php echo get_permalink(get_the_ID()) . '?' . $mat_name_without_polish_chars . '-' . $color_mat_name_without_polish_chars; ?>'>
                                <span class="select-mat__item-img-image">
                                    <?php
                                                            $image = get_sub_field('mat_main_img', 'global');
                                                            $size = 'main-mats';
                                                            if ($image) {
                                                                echo wp_get_attachment_image($image, $size, '', array('loading' => 'lazy'));
                                                            }
                                                            ?>
                                </span>

                            </a>
                            <?php endif; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <div class="select-mat__item-text">
                                <p class="item-name">
                                    <?php the_sub_field('mat_name') ?>
                                </p>
                                <p class="body4 item-spacial-name">
                                    <?php the_sub_field('mat_color_name') ?>
                                </p>
                            </div>
                        </div>
                        <?php endwhile; endif; endwhile; endif; ?>
                    </div>
                    <?php $tabs_counter++; endwhile; endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>

</section>