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

?>
