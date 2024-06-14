<?php

function happy_script_enqueue(){
 
    wp_enqueue_script("jquery");      
   
    wp_enqueue_script( 'splide-script', get_template_directory_uri() . '/dist/libraries/splide-slider/js/splide.min.js', array(), '1.0.0', true);

    wp_enqueue_style( 'photoswipe', get_template_directory_uri() . '/dist/libraries/photoswipe/css/photoswipe.css', false, '1.0', 'all' );  

    // wp_enqueue_script( 'splide-extension-intersection', get_template_directory_uri() . '/dist/libraries/splide-slider/js/splide-extension-intersection.min.js', array(), '1.0.0', true);
    
    
    wp_enqueue_style( 'splide-style', get_template_directory_uri() . '/dist/libraries/splide-slider/css/splide.min.css', false, '1.0', 'all' );  
    wp_enqueue_style( 'live-stylesheet', get_template_directory_uri() . '/dist/css/live.css', false, '1.0', 'all' );  
  
      
     wp_enqueue_style( 'photoswipe', get_template_directory_uri() . '/dist/libraries/photoswipe/css/photoswipe.css', false, '1.0', 'all' );  

    wp_enqueue_script( 'photoswpiwe-script-1', get_template_directory_uri() . '/dist/libraries/photoswipe/js/photoswipe-lightbox.esm.js', array(), '1.0.0', true);
    wp_enqueue_script( 'photoswpiwe-script-2', get_template_directory_uri() . '/dist/libraries/photoswipe/js/photoswipe.esm.js', array(), '1.0.0', true);

    wp_register_script('jQueryMaskPlugin', get_template_directory_uri() . '/dist/libraries/jQueryMaskPlugin/js/jquery.mask.min.js', array(), '1.0.0');
    



    // wp_register_script('lottiefiles-player', get_template_directory_uri() . '/dist/libraries/lottiefiles/js/lottie-player.js', array(), '1.7.0', true);
    // wp_enqueue_script('lottiefiles-player'); 

    // wp_register_script('lottie-min', get_template_directory_uri() . '/dist/libraries/lottiefiles/js/lottie.min.js', array(), '5.7.3', true);
    // wp_enqueue_script('lottie-min'); 


    // Styles and scripts for Contact
    // if(is_page_template( 'templates/contact.php' )){
    //     wp_enqueue_script('jQueryMaskPlugin');
    // }

    if(is_page_template('templates/home.php')){
     wp_enqueue_style('home-stylesheet', get_template_directory_uri() . '/dist/css/home.css',false,'1.0', 'all');
     }

    if(is_page_template('templates/product.php')){
     wp_enqueue_style('product-stylesheet', get_template_directory_uri() . '/dist/css/product.css',false,'1.0', 'all');
     wp_enqueue_script('jQueryMaskPlugin');

    }

     if(is_page_template('templates/products.php')){
      wp_enqueue_style('products-stylesheet', get_template_directory_uri() . '/dist/css/products.css',false,'1.0', 'all');
     }

    if(is_page_template('templates/contact.php')){
        
     wp_enqueue_style('contact-stylesheet', get_template_directory_uri() . '/dist/css/contact.css',false,'1.0', 'all');
        wp_enqueue_script('jQueryMaskPlugin');
    }

    if(is_page_template('404.php')){
     wp_enqueue_style('404-stylesheet', get_template_directory_uri() . '/dist/css/404.css',false,'1.0', 'all');
    }

    if(is_page_template('templates/privacy-policy.php')){
     wp_enqueue_style('privacy-policy-stylesheet', get_template_directory_uri() . '/dist/css/privacy-policy.css',false,'1.0', 'all');
    }

     if(is_page_template('templates/about-us.php')){
     wp_enqueue_style('about-us-stylesheet', get_template_directory_uri() . '/dist/css/about-us.css',false,'1.0', 'all');
    }
        
    wp_enqueue_style( '404-stylesheet', get_template_directory_uri() . '/dist/css/404.css', false, '1.0', 'all' );  
    
    wp_enqueue_script( 'happy', get_template_directory_uri() . '/src/js/happy.js', array(), '1.0.0', true);

    wp_enqueue_script( 'happy-animations', get_template_directory_uri() . '/src/js/happy-animations.js', array(), '1.0.0', true);

            // // Wpis blogowy
            // if(is_single() ){
            //     wp_enqueue_style( 'blog-post-stylesheet', get_template_directory_uri() . '/dist/css/blog_post.css', false, '1.0', 'all' );  
            // }
            // // Strona Blogu, wypisane blogi
            // if(get_post_type() == 'post'){
            //     wp_enqueue_style( 'blog-page-stylesheet', get_template_directory_uri() . '/dist/css/blog_page.css', false, '1.0', 'all' );  
            // }
            // // Strona Blogu REALIZACJI 
            // if(is_archive('realizations')){ 
                
            //     wp_enqueue_style( 'realizations-stylesheet', get_template_directory_uri() . '/dist/css/realizations.css', false, '1.0', 'all' ); 
            //     wp_register_script('isotope-min', get_template_directory_uri() . '/dist/libraries/isotope/js/isotope.pkgd.min.js', array(), '2.0.1', true);
            //     wp_enqueue_script('isotope-min'); 
            // }

            // // Wpis Realizacji
            // if(is_singular('realizations') ){
            //     wp_enqueue_style( 'flex-components-stylesheet', get_template_directory_uri() . '/dist/css/flex-components.css', false, '1.0', 'all' );  
            //     wp_enqueue_script('jQueryMaskPlugin');
            // }

}
   
  
add_action( 'wp_enqueue_scripts', 'happy_script_enqueue');