<div class="header__mobile header-mobile">
    <div class="header-mobile__outer">
        <div class="header-mobile__inner">
            <div class="header-mobile__menu-button-container">
                <div class="header-mobile__menu-button-container-inner">
                    <div class="header-mobile__hamburger">
                        <span class="header-mobile__hamburger-line"></span>
                        <span class="header-mobile__hamburger-line"></span>
                        <span class="header-mobile__hamburger-line"></span>
                    </div>
                </div>
            </div>
            <div class="header-mobile__logo-container">
                <a class="header-mobile__logo-link" href="<?php echo home_url(); ?>">
                    <?php $custom_logo_id = get_theme_mod( 'custom_logo' ); 
                                echo wp_get_attachment_image( $custom_logo_id , array(47, 40) );
                            ?>
                </a>
            </div>
        </div>
    </div>
    <div class="header-mobile__menu-container">
        <div class="header-mobile__menu-top">
            <a class="header-mobile__logo-link logo-in-menu" href="<?php echo home_url(); ?>">
                <?php $custom_logo_id = get_theme_mod( 'custom_logo' ); 
                                echo wp_get_attachment_image( $custom_logo_id , array(47, 40) );
                            ?>
            </a>

            <div class="header-mobile__close-button">
                <span class="header-mobile__close-button-line-1 header-mobile__close-button-line"></span>
                <span class="header-mobile__close-button-line-2 header-mobile__close-button-line"></span>
            </div>

        </div>
        <div class="header-mobile__menu-bottom">

            <nav class="header-mobile__nav">
                <?php wp_nav_menu(array(
                                      'theme_location' => 'main-menu',
                                      'menu_class' => 'header-mobile__menu mobile-menu',
                                      'menu_id' => 'mobile-menu',
                                      'add_li_class' => 'mobile-menu__el',
                                      'container' => false,
                                      'depth' => 2
                                      )); 
                                    
                    ?>
            </nav>

            <div class="header-mobile__contact">
                <p class="header-mobile__contact-headline">
                    <?php _e('Porozmawiajmy!', 'hi'); ?>
                </p>
                <div class="header-mobile__contact-el">
                    <div class="header-mobile__contact-info">
                        <a href="tel:<?php delete_spaces('phone_number', 'option') ?>"
                            class="header-mobile__contact-text">
                            <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2023/12/phone-icon.svg" alt="tel">
                            <span class="header-mobile__contact-text-inner">
                                <?php the_field('phone_number', 'option') ?>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="header-mobile__contact-el">
                    <div class="header-mobile__contact-info">
                        <a href="mailto:<?php the_field('email','option') ?>" class="header-mobile__contact-text">
                            <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2023/12/letter-icon-1.svg" alt="">
                            <span class="header-mobile__contact-text-inner">
                                <?php the_field('email','option')?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>