<section class="contact-us-main">

    <div class="contact-us-main__outer">
        <div class="contact-us-main__inner">
            <div class="contact-us-main__img slide-to-right animate">
                <?php
                    $image = get_field('contact_us_main_img');
                    // $size = 'full';
                    $size = array(728, 803);
                    if($image){
                    echo wp_get_attachment_image($image, $size);
                    }
                    ?>

            </div>
            <div class="contact-us-main__content slide-up animate">
                <p class="h2 contact-us-main__content-title">
                    <?php the_field('contact_us_main_title') ?></p>
                <p class="contact-us-main__content-desc body4"><?php the_field('contact_us_main_desc') ?></p>

                <?php 
                        $link = get_field('contact_us_main_btn');
                        if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>

                <a class=" default-button  body-medium contact-us-main__content-btn "
                    href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                </a>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>