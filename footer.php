<footer class="footer">

    <div class="footer__outer">
        <div class="footer__inner">
            <div class="footer__left">
                <div class="footer__left-logo-box">
                    <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                        ?>
                    <a href="<?php echo home_url(); ?>" id="footer-logo-link">
                        <img src="<?php echo $custom_logo_url; ?>" alt="Logo" id="footer-logo">
                    </a>
                </div>
                <div class="footer__left-adress">
                    <p class="h5 footer__left-adress-text"><?php the_field('company_name', 'option') ?></p>
                    <p class="h5 footer__left-adress-text"><?php the_field('company_street', 'option') ?></p>
                    <p class="h5 footer__left-adress-text"><?php the_field('company_city', 'option') ?></p>
                </div>
            </div>
            <div class="footer__right">
                <div class="footer__right-mats">
                    <p class="item-name footer__right-mats-title"> <?php the_field('mats_title','option'); ?></p>
                    <?php   if(have_rows('flex_field_mats','option')):
                        while(have_rows('flex_field_mats','option')): the_row();
                        ?>
                    <a class="body6 footer__right-mats-name"
                        href=<?php the_sub_field('mat_link', 'option') ?>><?php  the_sub_field('mat_name','option') ?></a>
                    <?php  endwhile; endif;?>
                </div>
                <div class="footer__right-know-more">
                    <p class="item-name footer__right-know-more-title"> <?php the_field('know_more_title','option'); ?>
                    </p>
                    <?php   if(have_rows('flex_field_know_more','option')):
                        while(have_rows('flex_field_know_more','option')): the_row();
                        ?>
                    <a class="body6 footer__right-know-more-name" href=<?php the_sub_field('pages_link', 'option') ?>>
                        <?php  the_sub_field('text_link_know_more','option') ?></a>
                    <?php  endwhile; endif;?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-policy__outer">
        <div class="footer-policy__inner">
            <div class="footer-policy__left">
                <a class="body6 footer-policy__left-text" href="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/?page_id=3">Polityka prywatności </a>
            </div>
            <div class="footer-policy__right">
                <div class="footer-policy__right-author">
                    <a class="footer-policy__right-author-logo" href="https://code-hi.pl/?link-src=nestor"
                        target="_blank">
                        <p class="body6 footer-policy__right-author-text">Strona stworzona przez </p>
                        <img src="http://serwer281383.lh.pl/autoinstalator/serwer281383.lh.pl/wordpress70159/wp-content/uploads/2024/01/author-logo.svg" alt="author-logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer( ); ?>

<?php if (is_page_template('templates/product.php')): ?>

<script type="module">
import PhotoSwipeLightbox from '/wp-content/themes/happytheme/dist/libraries/photoswipe/js/photoswipe-lightbox.esm.js';
import PhotoSwipe from '/wp-content/themes/happytheme/dist/libraries/photoswipe/js/photoswipe.esm.js';

const lightbox = new PhotoSwipeLightbox({
    gallery: '.selected-mat__big-images-items',
    children: '.selected-mat__big-images-items-group a.selected-mat__big-images-items-group-item',
    pswpModule: PhotoSwipe,
});
lightbox.init();
</script>
<?php endif; ?>
</body>

</html>