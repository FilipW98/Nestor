<section class="intro">
    <div class="intro__outer">
        <div class="intro__inner">
            <div class="intro__content">
                <div class="intro__content-text slide-to-right animate">
                    <h2 class="intro__content-text-title h1"><?php the_field('page_title') ?></h2>
                    <?php
                    $link = get_field('header_button');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="intro__content-text-btn default-button  body-medium "
                        href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="intro__content-text-img slide-to-left animate">
                    <?php
                    $image = get_field('intro_icon');
                    $size = 'full';
                    if ($image) {
                        echo wp_get_attachment_image($image, $size);
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="intro__info fade animate">
        <div class="intro__info-outer">
            <div class="intro__info-item">
                <span class="intro__info-item-open-icon">
                    <?php
                    $image = get_field('delivery_icon');
                    $size = 'full';
                    if ($image) {
                        echo wp_get_attachment_image($image, $size);
                    } ?></span>
                <span class="intro__info-item-delivery body5"><?php the_field('delivery_text') ?></span>
            </div>
            <div class="intro__info-item">
                <span class="intro__info-item-open-icon">
                    <?php
                    $image = get_field('open_icon');
                    $size = 'full';
                    if ($image) {
                        echo wp_get_attachment_image($image, $size);
                    } ?></span>
                <span class="intro__info-item-days body5"><?php the_field('open_days') ?></span>
                <span class="intro__info-item-delimiter"></span>
                <span class="intro__info-item-hours body5"><?php the_field('open_hours') ?></span>
            </div>
            <div class="intro__info-item">
                <span class="intro__info-item-open-icon">
                    <?php
                    $image = get_field('realisation_icon');
                    $size = 'full';
                    if ($image) {
                        echo wp_get_attachment_image($image, $size);
                    } ?></span>
                <span class="intro__info-item-realisations body5"><?php the_field('realisation_text') ?></span>
            </div>
        </div>
    </div>
</section>