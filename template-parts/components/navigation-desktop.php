        <div class="navigation-desktop">
            <div class="navigation-desktop__outer">
                <div class="navigation-desktop__inner">
                    <div class="navigation-desktop__left">
                        <span class="navigation-desktop__left-email body5">
                            <a href="mailto:<?php the_field('email','option')?>">
                                <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2023/12/letter-icon-1.svg" alt="">
                                <?php the_field('email','option')  ?>
                            </a>
                        </span>
                        <span class=" navigation-desktop__left-phone body5">
                            <a href="tel:<?php delete_spaces('phone_number', 'option'); ?>">
                                <img class="phone-icon" src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2023/12/phone-icon.svg" alt="">
                                <?php the_field('phone_number', 'option')  ?>
                            </a>
                        </span>
                    </div>
                    <div class="navigation-desktop__logo-box">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full'); ?>
                        <a href="<?php echo home_url(); ?>" id="footer-logo-link">
                            <img src="<?php echo $custom_logo_url; ?>" alt="Logo" id="footer-logo">
                        </a>
                    </div>
                    <div class="navigation-desktop__right">
                        <?php
                    wp_nav_menu(array(
                                        'theme_location' => 'main-menu',
                                        'menu_class' => 'navigation-desktop__menu main-menu',
                                        'menu_id' => 'main-menu',
                                        'add_li_class' => 'main-menu__el',
                                        'container' => false,
                                        'depth' => 2
                                        )); ?>
                    </div>
                </div>
            </div>
        </div>

        <script>
document.addEventListener('DOMContentLoaded', function() {

    const navigation = document.querySelector('.navigation-desktop');
    let lastScrollTop = 0;

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            navigation.classList.add('sticky');
        } else {
            navigation.classList.remove('sticky');
        }

        lastScrollTop = scrollTop;
    });

    const ul = document.querySelector('.sub-menu');
    const clickableElement = document.querySelector('.menu-item-104');

    clickableElement.addEventListener('click', function() {
        ul.classList.toggle('active');
    });

    if (!document.querySelector('.navigation-desktop__menu-activator')) {
        const linksWithChilds = document.querySelectorAll(
            '.navigation-desktop__menu li.menu-item-has-children');

        linksWithChilds.forEach(link => {
            const arrow = document.createElement('span');
            arrow.innerHTML = `<img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2023/12/chevron-down.svg" alt=">">`;
            arrow.classList.add('navigation-desktop__menu-activator');
            link.insertBefore(arrow, link.childNodes[2]);

            arrow.addEventListener('click', function() {
                arrow.classList.toggle('active3');
            });
        });
    }

    const activator = document.querySelector('.navigation-desktop__menu-activator');
    activator.addEventListener('click', function() {
        activator.classList.toggle('arrow-rotate');
    })

});
        </script>