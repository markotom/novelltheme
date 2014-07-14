<?php

/**
 * -----------------------------------------------------------------------------
 * Functions
 * -----------------------------------------------------------------------------
 *
 */

function novell_page_title() {
  if ( is_search() || is_404() ) {
    $page_title = __( 'Nothing Found', 'novell' );
  }

  if ( isset( $page_title ) ) {
    echo '<h1 class="page-title">' . $page_title . '</h1>';
  }
}

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

?>
