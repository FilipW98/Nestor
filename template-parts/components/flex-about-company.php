<section class="about-company">
    <div class="about-company__outer">
        <div class="about-company__inner">



            <div class="about-company__left slide-up animate">
                <p class="h2"><?php the_sub_field('about_company_title'); ?></p>

                <p class="body4"><?php the_sub_field('company_desc'); ?></p>

                <?php 
                        $link = get_sub_field('about_company_btn');
                        if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>

                <a class=" default-button  body-medium about-company__left-btn "
                    href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                </a>

                <?php endif; ?>

            </div>

            <div class="about-company__right">

                <div class="about-company__right-info slide-to-left animate">
                    <p class="h1">2023</p>
                    <p class="h5">Jesteśmy na ryknu od 2023 r.</p>
                </div>
                <div class="about-company__right-info slide-to-left animate">
                    <p class="about-company__right-info-stars">
                        <img src="/wp-content/uploads/2024/01/Star-4.svg" alt="">
                        <img src="/wp-content/uploads/2024/01/Star-4.svg" alt="">
                        <img src="/wp-content/uploads/2024/01/Star-4.svg" alt="">
                        <img src="/wp-content/uploads/2024/01/Star-4.svg" alt="">
                        <img src="/wp-content/uploads/2024/01/Star-4.svg" alt="">
                    </p>
                    <p class="h5 about-company__right-info-desc quality-info">Wysokie standardy jakości</p>
                </div>
                <div class=" about-company__right-info slide-to-left animate">
                    <p class="h1">100%</p>
                    <p class=" h5 about-company__right-info-desc">Satysfakcji klientów</p>
                </div>
                <div class="about-company__right-info slide-to-left animate">
                    <p class="h1">24h</p>
                    <p class="about-company__right-info-desc h5">Szybka dostawa</p>
                </div>

            </div>


        </div>
    </div>




</section>