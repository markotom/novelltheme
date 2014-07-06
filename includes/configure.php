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

  // Head cleanup
  add_action( 'init', 'novell_head_cleanup' );

}

// Theme support
function novell_theme_support() {

  // Add menus support
  add_theme_support( 'menus' );

  // Add post thumbnails support
  add_theme_support( 'post-thumbnails' );

}

// Head cleanup
function novell_head_cleanup() {

  // Rsd link
  remove_action( 'wp_head', 'rsd_link' );

  // Windows live writer
  remove_action( 'wp_head', 'wlwmanifest_link' );

  // Index link
  remove_action( 'wp_head', 'index_rel_link' );

  // Previous link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

  // Start link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

  // Links for adjacent posts
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

  // WP version
  remove_action( 'wp_head', 'wp_generator' );

}

?>
