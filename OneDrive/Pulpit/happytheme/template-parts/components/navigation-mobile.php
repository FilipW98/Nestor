 <div class="navigation-mobile">
     <div class="navigation-mobile__outer">
         <div class="navigation-mobile__inner">
             <div class="navigation-mobile__burger-box">
                 <img class="burger-icon" src="/wp-content/uploads/2023/12/hamburger.svg"
                     alt="ikona mobilnej nawigacji">
             </div>

             <div class="navigation-mobile__logo-box">
                 <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

                        ?>

                 <a href="<?php echo home_url(); ?>" id="footer-logo-link">
                     <img src="<?php echo $custom_logo_url; ?>" alt="Logo" id="footer-logo">
                 </a>
             </div>

             <div class="navigation-mobile__menu-container">
                 <div class="navigation-mobile__menu-top">

                     <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');?>

                     <a href="<?php echo home_url(); ?>" id="footer-logo-link">
                         <img src="<?php echo $custom_logo_url; ?>" alt="Logo" id="footer-logo">
                     </a>

                     <div class="navigation-mobile__close-button">
                         <img class="exit-icon" src="/wp-content/uploads/2023/12/material-symbols-light_close.svg"
                             alt="ikona wyjścia z nawigacji">
                     </div>

                 </div>
                 <div class="navigation-mobile__menu-bottom">



                     <?php
                               
                    wp_nav_menu(array(
                                        'theme_location' => 'main-menu',
                                        'menu_class' => 'navigation-mobile__menu main-menu',
                                        'menu_id' => 'main-menu',
                                        'add_li_class' => 'main-menu__el',
                                        'container' => false,
                                        'depth' => 2
                                        )); ?>

                 </div>

             </div>

         </div>
     </div>
 </div>
 <script>
document.addEventListener('DOMContentLoaded', function() {
    const burgerIcon = document.querySelector('.burger-icon');
    const closeButton = document.querySelector('.exit-icon');
    const menuContainer = document.querySelector('.navigation-mobile__menu-container');
    const body = document.querySelector('body');
console.log(body);
    burgerIcon.addEventListener('click', function() {
        menuContainer.classList.add('active');
body.style.overflow = "hidden";
    });

    closeButton.addEventListener('click', function() {
        menuContainer.classList.remove('active');
body.style.overflow = "scroll";

    });


    const ul = document.querySelector('.navigation-mobile__menu .menu-item-104 .sub-menu');
    const clickableElement = document.querySelector(
        '.navigation-mobile__menu .menu-item-104 ');

    clickableElement.addEventListener('click', function() {
        ul.classList.toggle('show-sub-menu');
    });

    const makingArrowForMenu = () => {
        const linksWithChilds = document.querySelectorAll(
            '.navigation-mobile__menu li.menu-item-has-children');


        for (let i = 0; i < linksWithChilds.length; i++) {
            const arrow = document.createElement('span');
            arrow.innerHTML = `<img src="/wp-content/uploads/2023/12/chevron-down.svg" alt=">" />`;
            arrow.classList.add('navigation-mobile__menu-activator');
            linksWithChilds[i].insertBefore(arrow, linksWithChilds[i].childNodes[2]);
        }
    };

    makingArrowForMenu();


    const activator = document.querySelector('.navigation-mobile__menu-activator');
    activator.addEventListener('click', function() {
        activator.classList.toggle('arrow-rotate');
    })

});
 </script>