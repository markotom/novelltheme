<?php

  if ( ! defined( 'ABSPATH' ) ) exit();

  // Theme Options
  require get_template_directory() . '/includes/theme-options.php';

  // Initialize
  require get_template_directory() . '/includes/configure.php';

  // Navigation
  require get_template_directory() . '/includes/navigation.php';

  // Sidebars
  require get_template_directory() . '/includes/sidebars.php';

?>
