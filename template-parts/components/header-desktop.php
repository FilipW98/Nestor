<div class="header__desktop header-desktop">
    <div class="header-desktop__info-bar">
        <div class="header-desktop__info-bar-inner">
            <div class="header-desktop__info-1 header-desktop__single-info">
                <span class="header-desktop__info-icon-container">
                    <?php 
                    $image = get_field('header_info_1_image','option');
                    $size = array(28,28); 
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    } 
                    ?>
                </span>
                <span class="header-desktop__info-text">
                    <?php the_field('header_info_1_text','option') ?>
                </span>
            </div>
            <div class="header-desktop__info-2 header-desktop__single-info">
                <span class="header-desktop__info-icon-container">
                    <?php 
                    $image = get_field('header_info_2_image','option');
                    $size = array(28,28);
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    } 
                    ?>
                </span>
                <span class="header-desktop__info-text">
                    <?php the_field('header_info_2_text','option') ?>
                </span>
            </div>
            <div class="header-desktop__info-3 header-desktop__single-info">
                <span class="header-desktop__info-icon-container">
                    <?php 
                    $image = get_field('header_info_3_image','option');
                    $size = array(28,28); // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    } 
                    ?>
                </span>
                <span class="header-desktop__info-text">
                    <?php the_field('header_info_3_text','option') ?>
                </span>
            </div>
        </div>
    </div>
    <div class="header-desktop__outer">
        <div class="header-desktop__inner">
            <div class="header-desktop__logo-container">
                <a href="<?php echo site_url(); ?>" class="header-desktop__logo-link">
                    <?php $custom_logo_id = get_theme_mod( 'custom_logo' ); 
                                echo wp_get_attachment_image( $custom_logo_id , array(85, 66) ); ?>
                </a>
            </div>
            <div class="header-desktop__menu-side">
                <nav class="header-desktop__nav nav-systemy-komunikacji">
                    <?php
                    $menu_depth = 2; 
                    
                    wp_nav_menu(array(
                                        'theme_location' => 'main-menu',
                                        'menu_class' => 'header-desktop__menu main-menu',
                                        'menu_id' => 'main-menu',
                                        'add_li_class' => 'main-menu__el',
                                        'container' => false,
                                        'depth' => $menu_depth
                                        )); ?>
                </nav>
            </div>
            <div class="header-desktop__rest-side">
                <div class="header-desktop__rest-container-inner">
                    <span class="header-desktop__search-icon">
                        <?php print_svg(262); ?>
                    </span>
                    <a href="tel:<?php delete_spaces('header_tel', 'option') ?>" class="header-desktop__tel-icon">
                        <?php print_svg(264); ?>
                    </a>
                    <a href="mailto:<?php the_field('header_mail', 'option') ?>" class="header-desktop__envelope-icon">
                        <?php print_svg(266); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>