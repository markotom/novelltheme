<?php

/**
 * -----------------------------------------------------------------------------
 * Navigation
 * -----------------------------------------------------------------------------
 *
 */

// After setup theme
add_action( 'after_setup_theme', 'novell_register_nav_menus' );

function novell_register_nav_menus() {

  // Register nav main menu
  register_nav_menu( 'main', __( 'Main menu', 'novell' ) );

}

?>
