<section class="form-image">
    <div class="form-image__outer">
        <div class="form-image__inner">
            <div class="form-image__image-side">
                <div class="form-image__image-container fade animate">
                    <?php 
                    $image = get_field('contact_form_image');
                    $size = array(1200, 1200); // (thumbnail, medium, large, full or custom size)
                    if( $image ) {
                        echo wp_get_attachment_image( $image, $size );
                    }
                ?>
                </div>
            </div>
            <div class="form-image__form-side slide-to-left animate">
                <div class="form-image__headline-container">
                    <?php if(is_page_template('templates/contact.php')): ?>
                    <h1 class="form-image__headline h2">
                        <?php the_field('contact_form_headline') ?>
                    </h1>
                    <?php else: ?>
                    <h3 class="form-image__headline h2">
                        <?php the_field('contact_form_headline') ?>
                    </h3>
                    <?php endif; ?>
                </div>
                <div class="form-image__form-container">
                    <?php echo do_shortcode('[contact-form-7 id="e7a8c48" title="Formularz kontaktowy zwyczajny"]') ?>
                </div>

            </div>
        </div>
    </div>
</section>