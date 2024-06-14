<section class="cat-seo">
    <div class="cat-seo__outer">
        <div class="cat-seo__inner">
            <div class="cat-seo__para cat-seo__para--first wysiwyg fade animate">
                <?php $para_first = get_field('paragraph_first'); 
                echo $para_first; ?>
            </div>
            <div class="cat-seo__para cat-seo__para--rest wysiwyg fade animate">
                <?php $para_rest = get_field('paragraph_rest'); 
                echo $para_rest; ?>
            </div>
        </div>
    </div>
</section>