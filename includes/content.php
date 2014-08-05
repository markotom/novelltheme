<?php

/**
 * -----------------------------------------------------------------------------
 * Content
 * -----------------------------------------------------------------------------
 *
 */

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
