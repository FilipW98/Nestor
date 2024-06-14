<?php 
    $first_pattern = '';
    $first_color = '';
    // Zamysłem kodu będzie to, ze kolory nie beda sie powtarzać. W przypadku jakby się mialy powtarzać, to trzeba by było do pseudo ID, czyli koloru, dodać np numer wiersza (get_row_index())
?>
<section class="product-content">
    <div class="product-content__outer">
        <div class="product-content__inner">
            <div class="product-content__left">
                <div class="product-content__left-photos slide-up animate">
                    <div class="product-content__left-photos-inside splide">
                        <?php if( have_rows('product_colors') ): ?>
                        <div class="product-content__left-photos-track splide__track">
                            <ul class="product-content__left-photos-list splide__list">
                                <?php while( have_rows('product_colors') ) : the_row(); ?>
                                <?php 
                                if(get_row_index() == 1 ){
                                    $first_pattern = get_sub_field('pattern');
                                    $first_color = get_sub_field('color');
                                }
                                $image = get_sub_field('image');
                                if($image): ?>
                                <li class="product-content__left-photos-slide splide__slide <?php if(get_row_index() == 1 ){echo ' active-pick';} ?>"
                                    data-color-slug="<?php echo slugify(get_sub_field('color')); ?>"
                                    data-index="<?php echo get_row_index()-1; ?>">
                                    <a class="product-content__left-photos-slide-block"
                                        href="<?php echo wp_get_attachment_image_url($image, 'full') ?>"
                                        data-pswp-width="<?php print_r(wp_get_attachment_image_src($image, 'full')[1]) ?>"
                                        data-pswp-height="<?php print_r(wp_get_attachment_image_src($image, 'full')[2]) ?>"
                                        data-cropped="true">
                                        <?php $size = array(728,728);
                                        echo wp_get_attachment_image( $image , $size); ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="product-content__left-desc-container product-content__desktop slide-up animate ">
                    <div class="product-content__left-desc wysiwyg bodytext-16-regular2">
                        <?php echo get_field('product_desc'); ?>
                    </div>
                </div>
                <div class=" product-content__contact-form-container product-content__left-contact-container"
                    id="desktop_form">
                    <div class="product-content__form-headline">
                        <h3 class="product-content__form-headline h2">Skontaktuj się z nami</h3>
                    </div>
                    <div class="product-content__form-container">
                        <?php echo do_shortcode( '[contact-form-7 id="f0fedc5" title="Formularz kontaktowy na stronie produktu"]' ) ?>
                    </div>
                </div>
            </div>


            <div class="product-content__right slide-up animate">
                <div class="product-content__right-inside">
                    <div class="product-content__right-heading ">
                        <h1 class="product-content__right-heading-headline h3">
                            <?php echo get_the_title(); ?>
                        </h1>
                        <span class="product-content__right-heading-desc bodytext-16-regular2">
                            <?php echo get_field('product_title_desc'); ?>
                        </span>
                    </div>
                    <div class="product-content__right-variant">
                        <div class="product-content__right-variant-texts">
                            <span class="product-content__right-variant-pattern">
                                Wzór: <span class="product-content__right-variant-pattern-value">
                                    <?php 
                                        if($first_pattern == '' || $first_pattern == ' '){
                                            echo 'Brak';
                                        }else{
                                            echo $first_pattern;
                                        }
                                    ?>
                                </span>
                            </span>
                            <span class="product-content__right-variant-color">
                                Kolor: <span class="product-content__right-variant-color-value">
                                    <?php echo $first_color;   ?>
                                </span>
                            </span>
                        </div>
                        <div class="product-content__right-variant-images">
                            <?php if( have_rows('product_colors') ): ?>
                            <?php while( have_rows('product_colors') ) : the_row(); ?>
                            <?php $image = get_sub_field('image');
                            if($image): ?>
                            <div class="product-content__right-variant-images-item <?php if(get_row_index() == 1 ){echo ' chosen-item';} ?>"
                                data-color-slug="<?php echo slugify(get_sub_field('color')); ?>"
                                data-color-name="<?php echo get_sub_field('color'); ?>"
                                data-pattern-name="<?php echo get_sub_field('pattern'); ?>">
                                <?php $size = array(100,100);
                                        echo wp_get_attachment_image( $image , $size); ?>
                            </div>
                            <?php endif; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <div class="product-content__right-variant-sizes">
                            <span class="product-content__right-variant-sizes-text bodytext-16-bold">
                                wymiary
                            </span>
                            <div class="product-content__right-variant-sizes-container">
                                <?php if( have_rows('product_colors') ): 
                                     ?>
                                <?php while( have_rows('product_colors') ) : the_row(); ?>
                                <div class="product-content__right-variant-sizes-set <?php if(get_row_index() == 1 ){echo ' active-pick';$once=false;} ?>"
                                    data-color-slug="<?php echo slugify(get_sub_field('color')); ?>">
                                    <div class="product-content__right-variant-sizes-set-blocks-container">
                                        <?php if( have_rows('sizes') ): ?>
                                        <?php while( have_rows('sizes') ) : the_row(); ?>
                                        <div
                                            class="product-content__right-variant-sizes-set-block <?php if(get_row_index() == 1 && $once==false){echo ' chosen-size';$once=true;} ?>">
                                            <span
                                                class="product-content__right-variant-sizes-set-block-text bodytext-16-regular2">
                                                <?php echo get_sub_field('dimension'); ?> CM
                                            </span>
                                        </div>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>

                                </div>
                                <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                    <div class="product-content__right-button-wrapper">
                        <a class="product-content__right-button " href="#desktop_form">
                            zapytaj o wycenę
                        </a>
                    </div>
                    <div class="product-content__right-specs">
                        <span class="product-content__right-specs-name bodytext-16-bold">Specyfikacja</span>
                        <div class="product-content__right-specs-set">
                            <?php if( have_rows('product_parameters') ): ?>
                            <?php while( have_rows('product_parameters') ) : the_row(); ?>
                            <span class="product-content__right-specs-set-each ">
                                <?php echo get_sub_field('parameter'); ?>
                            </span>
                            <span class="product-content__right-specs-set-each">
                                <?php echo get_sub_field('parameter_value'); ?>
                            </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="product-content__right-prod-desc-container product-content__mobile">
                        <div class="product-content__right-prod-desc wysiwyg bodytext-16-regular2">
                            <?php echo get_field('product_desc'); ?>
                        </div>
                    </div>
                    <div class="product-content__right-contact-container product-content__mobile" id="mobile_form">
                    </div>
                </div>
            </div>
        </div>
</section>
<script type="module">
import PhotoSwipeLightbox from '/wp-content/themes/happytheme/dist/libraries/photoswipe/js/photoswipe-lightbox.esm.js';
import PhotoSwipe from '/wp-content/themes/happytheme/dist/libraries/photoswipe/js/photoswipe.esm.js';
import ObjectPosition from '/wp-content/themes/happytheme/dist/libraries/photoswipe/js/photoswipe-object-position.js';



// console.log('paprika photo swipe' + index);
const sliderLightBox = new PhotoSwipeLightbox({
    gallery: `.product-content__left-photos-list`,
    children: 'li a',
    pswpModule: PhotoSwipe,
});

new ObjectPosition(sliderLightBox);

sliderLightBox.init();
</script>