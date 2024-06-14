<div class="header__mobile header-mobile">
    <div class="header-mobile__outer">
        <div class="header-mobile__inner">
            <div class="header-mobile__logo-container">
                <a class="header-mobile__logo-link" href="<?php echo home_url(); ?>">
                    <?php $custom_logo_id = get_theme_mod( 'custom_logo' ); 
                                echo wp_get_attachment_image( $custom_logo_id , array(85, 66) );
                            ?>
                </a>
            </div>
            <div class="header-mobile__right-side">
                <span class="header-mobile__search-icon">
                    <?php print_svg(262); ?>
                </span>
                <div class="header-mobile__menu-button-container">
                    <div class="header-mobile__menu-button-container-inner">
                        <div class="header-mobile__hamburger">
                            <span class="header-mobile__hamburger-line"></span>
                            <span class="header-mobile__hamburger-line"></span>
                            <span class="header-mobile__hamburger-line"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="header-mobile__menu-container">
        <div class="header-mobile__menu-top">
            <a class="header-mobile__logo-link logo-in-menu" href="<?php echo home_url(); ?>">
                <?php $custom_logo_id = get_theme_mod( 'custom_logo' ); 
                                echo wp_get_attachment_image( $custom_logo_id , array(85, 66) );
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
                <div class="header-mobile__contact-el">
                    <div class="header-mobile__contact-info">
                        <a class="header-mobile__tel-icon" href="tel:<?php delete_spaces('header_tel', 'option') ?>"
                            class="header-mobile__contact-text">
                            <?php print_svg(264); ?>
                        </a>
                    </div>
                </div>
                <div class="header-mobile__contact-el">
                    <div class="header-mobile__contact-info">
                        <a class="header-mobile__envelope-icon"
                            href="mailto:<?php the_field('header_mail', 'option') ?>"
                            class="header-mobile__contact-text">
                            <?php print_svg(266); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>