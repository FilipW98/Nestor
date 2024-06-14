<section class="sales-office">
    <div class="sales-office__outer">
        <div class="sales-office__inner slide-to-right animate">
            <div class="underline"></div>
            <p class="h2 sales-office__title"><?php the_sub_field('sales_title') ?></p>

            <div class="sales-office__contact">
                <a href="https://maps.app.goo.gl/GH5b7vVuNF5Q1GQNA" target="_blank"
                    class="sales-office__contact-item location-box">

                    <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2024/01/location.svg" alt="">
                    <p class="body4 location-box__text"><?php the_sub_field('location') ?></p>
                </a>
                <a href="tel:<?php delete_sub_spaces('phone_number') ?>" class="sales-office__contact-item phone-box">
                    <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2024/01/Vector-5.svg" alt="">
                    <?php the_sub_field('phone_icon') ?>
                    <p class="body4 phone-box__text"><?php the_sub_field('phone_number') ?></p>
                </a>
                <a href="mailto:<?php delete_sub_spaces('mail') ?>" class=" sales-office__contact-item mail-box">
                    <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2024/01/mail-icon.svg" alt="">
                    <p class="body4 mail-box__text"><?php the_sub_field('mail') ?></p>
                </a>
            </div>

            <div class="sales-office__hours">
                <p class=" h4 sales-office__hours-title"><?php the_sub_field('hours_title') ?></p>
                <p class="body4 sales-office__hours-desc"><?php the_sub_field('opening_hours') ?></p>
            </div>

        </div>
    </div>

</section>