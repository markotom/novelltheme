<?php

  if ( ! defined( 'ABSPATH' ) ) exit();

  if ( ! isset( $content_width ) )
    $content_width = 720;

  // Theme Options
  require get_template_directory() . '/includes/theme-options.php';

  // Initialize
  require get_template_directory() . '/includes/configure.php';

  // Navigation
  require get_template_directory() . '/includes/navigation.php';

  // Sidebars
  require get_template_directory() . '/includes/sidebars.php';

?>
