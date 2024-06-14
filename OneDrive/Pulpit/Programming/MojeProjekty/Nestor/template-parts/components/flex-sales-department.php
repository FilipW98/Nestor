<section class="sales-department">
    <div class="sales-department__outer">
        <div class="sales-department__inner slide-to-left animate">
            <p class="h2 sales-department__title"><?php the_sub_field('sales_department_title') ?></p>
            <div class="sales-department__data">
                <div class="sales-department__data-person">
                    <p class=" h5 sales-department__data-person-name"><?php the_sub_field('sales_department_name') ?>
                    </p>
                    <a href=" mailto:<?php delete_sub_spaces('sales_department_mail') ?>"
                        class="sales-department__data-person-mail">
                        <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2024/01/mail-icon.svg" alt="ikona koperty">
                        <p class="body4 sales-department__data-person-mail-text"><?php the_sub_field('sales_department_mail') ?></p>
                    </a>

                    <a href="tel:<?php delete_sub_spaces('sales_department_number','option')?>"
                        class="sales-department__data-person-phone">
                        <span class="sales-department__data-person-icon-box">
                            <img src=" http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2024/01/Vector-5.svg" alt="ikona telefonu">
                        </span>
                        <span class="ales-department__data-person-text-box">
                            <p class="body4 sales-department__data-person-phone-text"><?php the_sub_field('sales_department_number') ?></p>
                        </span>
                    </a>

                </div>
                <div class=" sales-department__data-person">
                    <p class="h5 sales-department__data-person-name"><?php the_sub_field('sales_department_name2') ?>
                    </p>
                    <a href="mailto:<?php delete_sub_spaces('sales_department_mail2') ?>"
                        class="sales-department__data-person-mail">
                        <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2024/01/mail-icon.svg" alt="ikona koperty">
                        <p class="body4 sales-department__data-person-mail-text"><?php the_sub_field('sales_department_mail2') ?></p>
                    </a>
                    <a href="tel:<?php delete_sub_spaces('sales_department_number2') ?>"
                        class="sales-department__data-person-phone">
                        <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2024/01/Vector-5.svg" alt="ikona telefonu">
                        <p class="body4 sales-department__data-person-phone-text"><?php the_sub_field('sales_department_number2') ?></p>
                    </a>
                </div>
            </div>

        </div>
    </div>

</section>