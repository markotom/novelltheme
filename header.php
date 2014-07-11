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
      <?php if ( ot_get_option( 'novell_logo' ) ) : ?>
      <div class="site-logo">
        <a href="<?php echo home_url() ; ?>">
          <img src="<?php echo ot_get_option( 'novell_logo' ) ?>" alt="">
        </a>
      </div>
      <?php elseif ( ot_get_option( 'novell_heading_text' ) ) : ?>
      <h1 class="site-name">
        <a href="<?php echo home_url() ; ?>">
          <?php echo ot_get_option( 'novell_heading_text' ) ?>
        </a>
      </h1>
      <?php else : ?>
      <h1 class="site-name">
        <a href="<?php echo home_url() ; ?>">
          <?php bloginfo( 'sitename' ) ?>
        </a>
      </h1>
      <?php endif ?>
    </div><!-- /.container -->
  </div><!-- /#header -->

  <!-- #content -->
  <div id="content">
