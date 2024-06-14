<footer class="footer">
    <div class="footer__outer">
        <div class="footer__inner">
            <div class="footer__top">
                <div class="footer__contact-data">
                    <p class="footer__contact-headline">
                        <?php the_field('footer_contact_headline', 'option') ?>
                    </p>
                    <div class="footer__contact-mail-and-tel">
                        <a href="mailto:<?php the_field('footer_mail', 'option'); ?>" class="footer__contact-mail">
                            <?php the_field('footer_mail', 'option'); ?>
                        </a>
                        <a href="tel:<?php delete_spaces('footer_tel', 'option') ?>" class="footer__contact-tel">
                            <?php the_field('footer_tel', 'option'); ?>
                        </a>
                    </div>
                </div>
                <div class="footer__menu-container">
                    <ul class="footer__menu">
                        <?php if( have_rows('footer_menu', 'option') ): 
                            while( have_rows('footer_menu', 'option') ) : the_row(); ?>
                        <li class="footer__single-menu-el">
                            <?php 
                                $link = get_sub_field('footer_single_link');
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                            <a class="footer__single-menu-link" href="<?php echo esc_url( $link_url ); ?>"
                                target="<?php echo esc_attr( $link_target ); ?>">
                                <?php echo esc_html( $link_title ); ?>
                            </a>
                            <?php endif; ?>
                        </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="footer__middle">
                <div class="footer__middle-col-1">
                    <div class="footer__copyright-container">
                        <span class="footer__copyright-text">
                            Copyright Wszelkie prawa zastrzeżone
                        </span>
                    </div>
                </div>
                <div class="footer__middle-col-2">
                    <div class="footer__logo-container">
                        <a href="<?php echo site_url( ) ?>" class="footer__logo-link">
                            <?php $custom_logo_id = get_theme_mod( 'custom_logo' ); 
                                echo wp_get_attachment_image( $custom_logo_id , array(98, 84) );
                            ?>
                        </a>
                    </div>
                </div>
                <div class="footer__middle-col-3">
                    <ul class="footer__docs-menu">
                        <?php if( have_rows('footer_docs_menu', 'option') ): 
                            while( have_rows('footer_docs_menu', 'option') ) : the_row(); ?>
                        <li class="footer__single-docs-menu-el">
                            <?php 
                                $link = get_sub_field('footer_single_docs_link');
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                            <a class="footer__single-docs-menu-link" href="<?php echo esc_url( $link_url ); ?>"
                                target="<?php echo esc_attr( $link_target ); ?>">
                                <?php echo esc_html( $link_title ); ?>
                            </a>
                            <?php endif; ?>
                        </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__made-by-container">
                    <a href="https://code-hi.pl/?link-src=nestor" class="footer__made-by" target="_blank">
                        Strona stworzona przez
                        <div class="footer__made-by-logo-container">
                            <img src="/wp-content/uploads/2024/05/code-logo-image.svg" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="search-section">
    <div class="search-section__outer">
        <div class="search-section__inner">
            <div class="search-section__heading-container">
                <p class="search-section__heading h2">
                    Znajdź produkt:
                </p>
            </div>
            <div class="search-section__form">
                <div class="search-section__form-inner">
                    <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                </div>
            </div>
            <div class="search-section__close-button">
                <span class="search-section__close-button-line-1 search-section__close-button-line"></span>
                <span class="search-section__close-button-line-2 search-section__close-button-line"></span>
            </div>
        </div>
    </div>
</div>
<?php wp_footer( ); ?>
</body>

</html>