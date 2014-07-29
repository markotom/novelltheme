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
<body <?php body_class(); ?>>

  <!-- #header -->
  <div id="header">

    <!-- .container -->
    <div class="container">

      <?php if ( ot_get_option( 'novell_logo' ) ) : ?>

      <!-- .site-logo -->
      <div class="site-logo">
        <a href="<?php echo home_url() ; ?>" rel="home">
          <img src="<?php echo ot_get_option( 'novell_logo' ) ?>" alt="">
        </a>
      </div><!-- /.site-logo -->

      <?php elseif ( ot_get_option( 'novell_heading_text' ) ) : ?>

      <!-- .site-name -->
      <h1 class="site-name">
        <a href="<?php echo home_url() ; ?>" rel="home">
          <?php echo ot_get_option( 'novell_heading_text' ) ?>
        </a>
      </h1><!-- /.site-name -->

      <?php else : ?>

      <!-- .site-name -->
      <h1 class="site-name">
        <a href="<?php echo home_url() ; ?>" rel="home">
          <?php bloginfo( 'sitename' ) ?>
        </a>
      </h1><!-- /.site-name -->

      <?php endif ?>

    </div><!-- /.container -->

    <!-- #navbar-main.navbar.navbar-default -->
    <nav id="navbar-main" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- .container -->
      <div class="container">
        <!-- .navbar-header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div><!-- /.navbar-header -->

        <?php

          // Shows main nav menu
          wp_nav_menu(
            array(
              'theme_location'  => 'main',
              'menu_class'      => 'nav navbar-nav',
              'container_class' => 'collapse navbar-collapse',
              'container_id'    => 'navbar-collapse-1',
            )
          );

        ?>
      </div><!-- /.container -->
    </nav><!-- /#navbar-main.navbar.navbar-default -->

  </div><!-- /#header -->

  <!-- #main -->
  <div id="main">
