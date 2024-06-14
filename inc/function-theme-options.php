<?php

/* 
    NEEDED FOR LOCO TRANSLATE 
*/
// load_theme_textdomain('happy', get_stylesheet_directory() . '/languages');
/*

 ===========================
 Integration ACF and Sierotki
 ===========================

*/

function acf_orphans($value, $post_id, $field) {
    if ( class_exists( 'iworks_orphan' ) ) {
      $orphan = new \iworks_orphan();
      $value = $orphan->replace( $value );
    }
    return $value;
}
add_filter('acf/format_value/type=textarea', 'acf_orphans', 10, 3);
add_filter('acf/format_value/type=wysiwyg', 'acf_orphans', 10, 3);
add_filter('acf/format_value/type=text', 'acf_orphans', 10, 3);


/*

 =========================
 Sidebar function
 =========================

*/

function happy_widget_setup(){
 
    register_sidebar( array(
      'name' => 'Sidebar',
      'id' => 'sidebar-1',
      'class' => 'custom',
      'description' => 'Standard Sidebar',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h1 class="widget-title">',
      'after_title' => '</h1>',
     )
    );
   
}
   
add_action('widgets_init', 'happy_widget_setup');


/*

 =========================
 Global ACF init
 =========================

*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
        'page_title' => "Opcje dodatkowe",
        'menu_title' => "Opcje dodatkowe",
        'menu_slug' => "global_settings",
        'capability' => "edit_posts",
        'parent_slug' => '',
        'position' => false,
        'icon_url' => false,
    ));

    acf_add_options_sub_page(array(
        'page_title' => "Nagłówek",
        'menu_title' => "Nagłówek",
        'menu_slug' => "global_settings-header",
        'capability' => "edit_posts",
        'parent_slug' => 'global_settings',
        'position' => false,
        'icon_url' => false,
    ));

    acf_add_options_sub_page(array(
        'page_title' => "Stopka",
        'menu_title' => "Stopka",
        'menu_slug' => "global_settings-footer",
        'capability' => "edit_posts",
        'parent_slug' => 'global_settings',
        'position' => false,
        'icon_url' => false,
    ));
    acf_add_options_sub_page(array(
      'page_title' => "Globalne",
      'menu_title' => "Globalne",
      'menu_slug' => "global_settings-global",
      'capability' => "edit_posts",
      'parent_slug' => 'global_settings',
      'position' => false,
      'icon_url' => false,
  ));
}

/*

 ===========================
 Delete author info from links
 ===========================

*/
add_filter( 'oembed_response_data', 'disable_embeds_filter_oembed_responsedata' );
function disable_embeds_filter_oembed_responsedata( $data ) {
    unset($data['author_url']);
    unset($data['author_name']);
    return $data;
}


/*

 ===========================
 Redirect to Homepage
 ===========================

*/


// add_action( 'template_redirect', 'redirect_to_homepage' );

// function redirect_to_homepage() {
//     $homepage_id = get_option('page_on_front');
//     if ( ! is_page( $homepage_id ) ) {                                                                                  
//          wp_redirect( home_url( 'index.php?page_id=' . $homepage_id ) ); 
//     }    
// }


/*

 ====================
 Activate menus
 ==================== 

*/
 
function happy_theme_setup(){
 add_theme_support( 'menus' );
 register_nav_menu( 'main-menu', 'Menu Główne' );
 register_nav_menu('second-menu', 'Footer navigation');
}

add_action( 'init', 'happy_theme_setup' );