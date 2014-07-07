<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <!-- Wordpress titles -->
  <title><?php wp_title( '' ); ?></title>

  <!-- Set encoding -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <!-- Pingback -->
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <!-- Mobile meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Wordpress head -->
  <?php wp_head(); ?>
</head>
<body>
  <!-- #header -->
  <div id="header">
    <!-- .container -->
    <div class="container">
      Header and so on
    </div><!-- /.container -->
  </div><!-- /#header -->

  <!-- #content -->
  <div id="content">
