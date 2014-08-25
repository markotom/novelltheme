<?php

/**
 * -----------------------------------------------------------------------------
 * Content
 * -----------------------------------------------------------------------------
 *
 */

// Added titles
add_filter( 'wp_title', 'novell_wp_title', 10, 2 );

function novell_wp_title( $title, $separator ) {
  global $paged, $page;

  if ( is_feed() ) {
    return $title;
  }

  $title .= get_bloginfo( 'name' );

  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title = "$title $separator $site_description";
  }

  if ( $paged >= 2 || $page >= 2 ) {
    $title = sprintf( __( 'Page %s', 'novell' ), max( $paged, $page ) ) . " $separator $title";
  }

  return $title;
}

// Change excerpt length
add_action( 'excerpt_length', 'novell_excerpt_length' );

function novell_excerpt_length() {
  return ot_get_option( 'novell_excerpt_length' );
}

// Filter post classes
add_filter( 'post_class', 'novell_post_class' );

function novell_post_class( $classes ) {

  if ( ! is_single() ) {
    global $wp_query;

    // Set "odd" or "even" class if is not single
    $classes[] = $wp_query->current_post % 2 == 0 ? 'even' : 'odd' ;
  }

  return $classes;
}

?>
