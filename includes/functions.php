<?php

/**
 * -----------------------------------------------------------------------------
 * Functions
 * -----------------------------------------------------------------------------
 *
 */

function novell_global_layout() {

  // Echo global layout
  $global_layout = novell_get_global_layout();
  echo $global_layout;

}

    function novell_get_global_layout() {

      // Get global layout
      $column_global_layout = ot_get_option( 'novell-layout-global' );
      return $column_global_layout;

    }

function novell_current_layout() {

  // Echo current layout
  $current_layout = novell_get_current_layout();
  echo $current_layout;

}

    function novell_get_current_layout() {

      // Set global layout name
      $layout_name = 'novell-layout-global';

      // Set home layout name
      if ( is_home() ) {
        $layout_name = 'novell-layout-home';
      }

      // Set single layout name
      if ( is_single() ) {
        $layout_name = 'novell-layout-single';
      }

      // Set page layout name
      if ( is_page() ) {
        $layout_name = 'novell-layout-page';
      }

      // Set archive layout name
      if ( is_archive() ) {
        $layout_name = 'novell-layout-archive';
      }

      // Set category layout name
      if ( is_category() ) {
        $layout_name = 'novell-layout-category';
      }

      // Set search layout name
      if ( is_search() ) {
        $layout_name = 'novell-layout-search';
      }

      // Set error 404 layout name
      if ( is_404() ) {
        $layout_name = 'novell-layout-404';
      }

      // Get global layout
      $global_layout = novell_get_global_layout();

      // Set current layout
      $current_layout = ot_get_option( $layout_name );


      return  ! $current_layout || $current_layout === 'inherit'
              ? $global_layout
              : $current_layout;

    }

function novell_main_sidebar() {

  // Hide main sidebar if specified full column
  if (  novell_get_global_layout() !== 'col-1-full' ) :

    // Get main sidebar
    get_sidebar();

  endif;

}

function novell_secondary_sidebar() {

  // Show secondary sidebar if specified three columns
  if (  novell_get_global_layout() === 'col-3-middle' ||
        novell_get_global_layout() === 'col-3-right' ||
        novell_get_global_layout() === 'col-3-left'   ) :

    // Get secondary sidebar
    get_sidebar( 'secondary' );

  endif;

}

function novell_pagination() {

  // You can use WP-PageNavi plugin
  // https://wordpress.org/plugins/wp-pagenavi
  if ( function_exists( 'wp_pagenavi' ) ) :

    wp_pagenavi();

  else:

    echo '<ul class="pager"><li class="previous">';

      previous_posts_link();

    echo '</li><li class="next right">';

      next_posts_link();

    echo '</li></ul>';

  endif;

}

function novell_post_thumbnail( $thumb_size = 'thumb-large' ) {

  if ( has_post_thumbnail() ) :

    if ( is_singular() ) :

      the_post_thumbnail( $thumb_size, array( 'class' => 'post-thumbnail img-responsive' ) );

    else :

      $permalink       = get_permalink();
      $title_attribute = the_title_attribute( array( 'echo' => 0 ) );

      echo '<a href="' . $permalink . '" title="' . $title_attribute . '" class="post-thumbnail" rel="bookmark">';
        the_post_thumbnail( $thumb_size, array( 'class' => 'img-responsive' ) );
      echo '</a>';

    endif;

  endif;

}

// Get attachment id by url
// More info: http://frankiejarrett.com/get-an-attachment-id-by-url-in-wordpress
function wp_get_attachment_id_by_url( $url ) {

  $parsed_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

  $this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
  $file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

  if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
    return;
  }

  global $wpdb;

  $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );

  return $attachment[0];

}

?>
