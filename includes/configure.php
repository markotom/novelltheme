<?php

/**
 * -----------------------------------------------------------------------------
 * Configure theme
 * -----------------------------------------------------------------------------
 *
 */

// After setup theme
add_action( 'after_setup_theme', 'novell_configure_theme' );

// Configure theme
function novell_configure_theme() {

  // Theme support
  add_action( 'after_setup_theme', 'novell_theme_support' );

}

// Theme support
function novell_theme_support() {

  // Add menus support
  add_theme_support( 'menus' );

  // Add post thumbnails support
  add_theme_support( 'post-thumbnails' );

}

?>
