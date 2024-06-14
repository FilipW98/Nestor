<section class="selected-mat">
    <div class="selected-mat__outer">
        <div class="selected-mat__inner">
            <div class="selected-mat__navigator">
                <div class="selected-mat__navigator-top">
                    <a class="body2 selected-mat__navigator-top-main" href="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/">Strona Główna</a>
                    <span>|</span>
                    <a class="body2 selected-mat__navigator-top-mats" href="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/?page_id=103">Wycieraczki</a>
                    <span>|</span>
                    <span class="body2">
                        <?php the_field('mat_name') ?>
                    </span>
                </div>
                <a class="selected-mat__navigator-back" href="/wycieraczki/">
                    <img class="selected-mat__navigator-back-img"
                        src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159//wp-content/uploads/2024/01/solar_arrow-up-linear.svg" alt="arrow back">
                    <p class="body2 selected-mat__navigator-back-text">Wróć</p>
                </a>
            </div>
            <?php
            if (have_rows('general_flex_fields')):
            while (have_rows('general_flex_fields')):
            the_row(''); ?>

            <div class="selected-mat__box">

                <div class="selected-mat__big-images">
                    <div class="selected-mat__big-images-items">
                        <?php  
                        if (have_rows('flex_mats_imgs')):
                        $group_counter = 0;
                        while (have_rows('flex_mats_imgs')):
                            the_row(); 
                            ?>
                        <div class="selected-mat__big-images-items-group"
                            data-number="<?php echo esc_attr($group_counter); ?>">
                            <?php  
                                if (have_rows('flex_mat_main_imgs')):
                                $item_counter = 0;
                                while (have_rows('flex_mat_main_imgs')):
                                the_row(); 
                                ?>
                            <?php  
                                 $image = get_sub_field('mat_main_img', "global");
                                $size = 'main-mat';
                                ?>
                            <a class="selected-mat__big-images-items-group-item"
                                data-number="<?php echo esc_attr( $item_counter); ?>"
                                href="<?php echo wp_get_attachment_image_url($image, $size) ?>"
                                data-pswp-width="<?php print_r(wp_get_attachment_image_src($image, 'full')[1]) ?>"
                                data-pswp-height="<?php print_r(wp_get_attachment_image_src($image, 'full')[2]) ?>"
                                data-cropped="true">
                                <span class="selected-mat__big-images-items-group-item-image">
                                    <?php
                               
                                    if ($image) {
                                        echo wp_get_attachment_image($image, $size);
                                    }
                                    ?>
                                </span>

                            </a>
                            <?php $item_counter++; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <?php $group_counter++; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>


                    <div class="selected-mat__additionals-container">
                        <?php
                        $additional_img_choose = get_sub_field('additional_img_choose'); 
                        if ($additional_img_choose === 'tak' && have_rows('flex_mats_imgs')):
                            $counter = '0';
                            $group_counter = '0';
                            while (have_rows('flex_mats_imgs')):
                                the_row('');
                                if (have_rows('flex_mat_main_imgs')):
                                    $second_counter = '0';
                                        while (have_rows('flex_mat_main_imgs')):
                                            the_row('');
                            ?>

                        <div class="selected-mat__single-additional" data-number="<?php echo esc_attr($counter); ?>"
                            data-second-number="<?php echo esc_attr($second_counter); ?>">
                            <?php
                                $image = get_sub_field('mat_main_img', "global");
                                $size = 'additional-img';
                                if ($image) {
                                    echo wp_get_attachment_image($image, $size);
                                }
                                ?>
                        </div>
                        <?php $second_counter++; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php $group_counter++; ?>
                        <?php $counter++; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="selected-mat__right">
                    <div class="selected-mat__right-details">
                        <p class="selected-mat__right-details-title h3">
                            <?php the_field('mat_name') ?>
                        </p>
                        <p class="selected-mat__right-details-pattern body4">
                            Wzór:
                            <?php
                                if (have_rows('flex_mats_imgs')):
                                    $counter = '0';
                                    while (have_rows('flex_mats_imgs')):
                                        the_row('');
                                        $mat_pattern = get_sub_field('mat_pattern', 'global');
                                        if (!empty($mat_pattern)): 
                                            ?>
                            <span class="body2 selected-mat__right-details-pattern-name"
                                data-number="<?php echo esc_attr($counter);  ?>">
                                <?php echo $mat_pattern ?>
                            </span>
                            <?php $counter++ ?>
                            <?php endif; endwhile; endif;?>
                        </p>

                        <p class="selected-mat__right-details-color body4">
                            Kolor:
                            <?php
                            if (have_rows('flex_mats_imgs')):
                                 $counter = '0';
                                while (have_rows('flex_mats_imgs')):
                                    the_row('');
                                    $mat_color = get_sub_field('mat_color', 'global');
                                        if (!empty($mat_color)): 
                                    ?>
                            <span class=" selected-mat__right-details-color-name body2"
                                data-number="<?php echo esc_attr($counter);  ?>">
                                <?php the_sub_field('mat_color','global') ?>
                            </span>
                            <?php $counter++ ?>
                            <?php endif; endwhile; endif; ?>
                        </p>

                    </div>

                    <div class="selected-mat__right-imgs">
                        <?php
                                        $mat_name = get_field('mat_name');
                                        $mat_name_without_spaces = str_replace(' ', '', $mat_name);
                                        $mat_name_without_polish_chars = stripAccents($mat_name_without_spaces);
                                        
                                        if (have_rows('flex_mats_imgs')):
                                            $counter = '0';
                                            while (have_rows('flex_mats_imgs')):
                                                the_row('');
                                                $color_mat_name = get_sub_field('mat_color_name');
                                         if (have_rows('flex_mat_main_imgs')):
                                    
                                             while (have_rows('flex_mat_main_imgs')):
                                            the_row('');
                                        
                                        $color_mat_name_without_spaces = str_replace(' ', '', $color_mat_name);
                                        $color_mat_name_without_polish_chars = stripAccents($color_mat_name_without_spaces);
                                        ?>
                        <div class="selected-mat__right-imgs-item" data-number="<?php echo esc_attr($counter); ?>"
                            data-filter="<?php echo $mat_name_without_polish_chars . '-' . $color_mat_name_without_polish_chars; ?>">

                            <div class="selected-mat__right-imgs-item-img">
                                <?php
                                                    $image = get_sub_field('mat_main_img', "global");
                                                    $size = 'selected-mat';
                                                    if ($image) {
                                                        echo wp_get_attachment_image($image, $size);
                                                    }
                                                    ?>
                            </div>
                        </div>
                        <?php $counter ++  ?>
                        <?php break;
                        endwhile; endif; ?>
                        <?php 
                        endwhile; endif; ?>
                    </div>
                    <div class="selected-mat__right-dimensions">
                        <p class="selected-mat__right-dimensions-title body2">
                            <span>
                                Wymiary
                            </span>
                            <img class="arrow-down" src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159//wp-content/uploads/2023/12/chevron-down.svg" alt="arrow-down">
                        </p>
                        <div class="selected-mat__right-dimensions-dropdown">
                            <p class="selected-mat__right-dimensions-text item-name active-dimension">
                                40 x 60
                            </p>
                            <p class="selected-mat__right-dimensions-text item-name">
                                60 x 80
                            </p>
                            <p class="selected-mat__right-dimensions-text item-name">
                                60 x 90
                            </p>
                            <p class="selected-mat__right-dimensions-text item-name">
                                60 x 180
                            </p>
                            <p class="selected-mat__right-dimensions-text item-name">
                                80 x 120
                            </p>
                            <p class="selected-mat__right-dimensions-text item-name">
                                90 x 120
                            </p>
                            <p class="selected-mat__right-dimensions-text item-name">
                                120 x 180
                            </p>
                            <p class="selected-mat__right-dimensions-text item-name">
                                120 x 240
                            </p>
                        </div>
                    </div>
                    <div class="selected-mat__right-btn body-medium">Skontaktuj
                        się z nami</div>
                </div>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>