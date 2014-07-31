<?php

/**
 * -----------------------------------------------------------------------------
 * Functions
 * -----------------------------------------------------------------------------
 *
 */

function novell_global_layout() {
  // Get global layout
  $column_global_layout = ot_get_option( 'novell-layout-global' );
  echo $column_global_layout;
}

function novell_get_global_layout() {
  // Get global layout
  $column_global_layout = ot_get_option( 'novell-layout-global' );
  return $column_global_layout;
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
  // Please, use WP-PageNavi plugin
  if ( function_exists( "wp_pagenavi" ) ) :
    wp_pagenavi();
  else:
    echo '<ul class="pager"><li class="previous">';
      previous_posts_link();
    echo '</li><li class="next right">';
      next_posts_link();
    echo ' </li></ul>';

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
