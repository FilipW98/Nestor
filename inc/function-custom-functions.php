<?php

function delete_spaces($field_name, $option = ""){
    if($option != ""){
      $phone_number = get_field($field_name, $option);
    }
    else{
      $phone_number = get_field($field_name);
    }
   
    $phone_no_spaces = strtr($phone_number,[' '=>'']);
    echo $phone_no_spaces;
}
  
function delete_sub_spaces($field_name){
    $phone_number = get_sub_field($field_name);
    $phone_no_spaces = strtr($phone_number,[' '=>'']);
    echo $phone_no_spaces;
}
function delete_group_spaces($field_name){
  // $phone_number = get_sub_field($field_name);
  $phone_no_spaces = strtr($field_name,[' '=>'']);
  echo $phone_no_spaces;
}

function print_svg($image_id){
  $image = $image_id;

  $url = wp_get_attachment_image_url($image, 'full');
  $ext = pathinfo( $url, PATHINFO_EXTENSION );   

  if ( $ext == 'svg' ){
      echo file_get_contents( $url ) ;
  }
  else{
      echo '<img src="'.$url.'" alt="">';
  }                    
}


function numeric_posts_nav() {
 
  if( is_singular() )
  return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
    return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
    $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="blog-list__pagination"><ul>' . "\n";

  /** Previous Post Link */
  //   if ( get_previous_posts_link() )
  //     printf( '<li class="blog-list__navigation-previous-pagination">' . get_previous_posts_link( __( '<img src="/wp-content/uploads/2022/12/arrow-left-1.svg">', 'textdomain' ) ), '</li>' );


  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
        echo '<li class="dots-pagination"><span>…</span></li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
        echo '<li class="dots-pagination"><span>…</span></li>' . "\n";

    $class = $paged == $max ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  //   if ( get_next_posts_link() )
  //     printf( '<li  class="blog-list__navigation-next-pagination">' . get_next_posts_link( __( '<img src="/wp-content/uploads/2022/12/arrow-right-1.svg">', 'textdomain' ) ), '</li>' );
      
    
    

  echo '</ul></div>' . "\n";


}




// remove polish chars

// https://stackoverflow.com/questions/1017599/how-do-i-remove-accents-from-characters-in-a-php-string

function stripAccents($str) {
  return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}