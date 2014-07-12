<?php

/**
 * -----------------------------------------------------------------------------
 * Sidebars
 * -----------------------------------------------------------------------------
 *
 */

// Register sidebars
add_action( 'widgets_init', 'novell_register_sidebars' );

function novell_register_sidebars() {

  // Main sidebar
  register_sidebar(
    array(
      'id'            => 'main-sidebar',
      'name'          => 'Main Sidebar',
      'description'   => 'Main Sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>'
    )
  );

  // Bottom sidebar
  register_sidebar(
    array(
      'id'            => 'bottom-sidebar',
      'name'          => 'Bottom Sidebar',
      'description'   => 'Bottom Sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>'
    )
  );

}

?>
