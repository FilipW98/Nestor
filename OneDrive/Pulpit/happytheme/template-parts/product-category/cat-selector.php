<section class="cat-selector">

    <?php 
    $main_site_id = get_the_ID();
    // echo $main_site_id;

    $left_args = array(
        'post_type'  => 'page',
        'orderby' => 'menu_order', 
        'meta_query' => array( 
            array(
                'key'   => '_wp_page_template', 
                'value' => 'templates/product-category.php'
            )
        )
    );

    
    //repeater z grafikami, na kazdy kolor produktu, jedno okienko z linkiem, z parametrem

    $query = new WP_Query($left_args);
                ?>


    <div class="cat-selector__outer">
        <div class="cat-selector__inner">
            <div class="cat-selector__menu">
                <div class="cat-selector__menu-inside slide-to-right animate">
                    <span class="cat-selector__close-button">
                        <span class="cat-selector__close-button-line-1 cat-selector__close-button-line"></span>
                        <span class="cat-selector__close-button-line-2 cat-selector__close-button-line"></span>
                    </span>
                    <?php 
                    
                       if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) :
                            $query->the_post();

                            $object_id = get_the_ID();
                            $object_title_slug = slugify(get_the_title($object_id));
                    ?>
                    <div class="cat-selector__menu-item">

                        <a class="cat-selector__menu-item-link <?php if($object_id == $main_site_id){echo 'active-category';} ?>"
                            href="<?php echo get_the_permalink();?>">
                            <span class="cat-selector__menu-item-link-name bodytext-18-medium">
                                <?php echo get_field('cat_title',$object_id); ?>
                            </span>
                            <span class="cat-selector__menu-item-link-desc bodytext-16-regular1">
                                <?php echo get_field('cat_desc',$object_id); ?>

                            </span>
                        </a>
                    </div>
                    <?php  endwhile; ?>
                    <?php  endif; wp_reset_postdata(); ?>
                </div>
            </div>

            <button class="cat-selector__menu-activator button-brown bodytext-16-regular1">Wybierz rodzaj</button>

            <div class="cat-selector__products">
                <div class="cat-selector__products-inside">
                    <?php 

                    $right_args = array(
                        'post_type'  => 'page', 
                        'post_parent'    => $main_site_id,
                        'orderby'        => 'title'
                    );
                        $products_query = new WP_Query($right_args);
                        if ( $products_query->have_posts() ) :
                            while ( $products_query->have_posts() ) :
                                $products_query->the_post();
                                // echo $main_site_id;

                                $product_id = get_the_ID();

                                // echo '<a href="'.get_the_permalink( $product_id ).'" class="test">'.get_the_title( $product_id ).'</a> </br>';

                        if( have_rows('product_colors',$product_id) ):
                                while( have_rows('product_colors',$product_id) ) : the_row();

                    ?>
                    <a class="cat-selector__products-inside-item fade animate"
                        href="<?php echo get_the_permalink(); ?>">
                        <div class="cat-selector__products-inside-item-image">
                            <?php   $image = get_sub_field('image'); 
                                    $size = array(310,310);
                                        if($image){
                                            echo wp_get_attachment_image( $image, $size);
                                        }
                                ?>
                        </div>
                        <div class="cat-selector__products-inside-item-textbox">
                            <span class="cat-selector__products-inside-item-textbox-name bodytext-20-medium">
                                <?php $spare_title = get_field('product_title',$product_id);
                                if($spare_title != '' && $spare_title != ' '){
                                    echo $spare_title;
                                }else{
                                    echo get_the_title($product_id);
                                }
                             ?>
                            </span>
                            <?php $color =  get_sub_field('color'); 
                            if($color != '' && $color != ' '): ?>
                            <span class="cat-selector__products-inside-item-textbox-color bodytext-18-light">
                                <?php echo $color ?>
                            </span>
                            <?php endif; $color=''; ?>

                        </div>

                    </a>
                    <?php  endwhile; // acf end ?>
                    <?php  endif; //acf end ?>
                    <?php  endwhile; ?>
                    <?php  endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
    </div>


</section>