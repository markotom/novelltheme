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

?>
