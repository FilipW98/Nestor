<section class="cat-header">
    <div class="cat-header__outer">
        <div class="cat-header__inner">
            <div class="cat-header__text-block slide-to-right animate">

                <h1 class="cat-header__text-block-headline h2">
                    <?php $heading = get_field('header_headline'); 
                    echo $heading; ?>
                </h1>
                <p class="cat-header__text-block-desc bodytext-16-regular2">
                    <?php $desc = get_field('header_desc'); 
                    echo $desc; 
                    //slugify(); ?>
                </p>
            </div>
        </div>
    </div>
</section>