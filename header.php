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
          <img src="<?php echo ot_get_option( 'novell_logo' ) ?>" alt="<?php bloginfo( 'sitename' ) ?>">
        </a>
      </div><!-- /.site-logo -->

      <?php elseif ( ot_get_option( 'novell_heading' ) ) : ?>

      <!-- .site-name -->
      <h1 class="site-name">
        <a href="<?php echo home_url() ; ?>" rel="home">
          <?php echo ot_get_option( 'novell_heading' ) ?>
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

      <?php

        if ( ot_get_option( 'novell_search_form' ) !== 'off' ) {
          get_search_form();
        }

      ?>

    </div><!-- /.container -->

    <?php if ( has_nav_menu( 'main' ) ) : ?>
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

        <div id="navbar-collapse-1" class="collapse navbar-collapse">
          <?php

            // Shows main nav menu
            wp_nav_menu(
              array(
                'depth'           => 3,
                'theme_location'  => 'main',
                'menu_class'      => 'nav navbar-nav',
                'container'       => false
              )
            );

          ?>

          <?php

            $socials = array();

            if ( ot_get_option('novell_social_links_facebook') ) {
              $socials[] = array(
                'icon' => 'fa fa-facebook',
                'url' => ot_get_option('novell_social_links_facebook')
              );
            }

            if ( ot_get_option('novell_social_links_twitter') ) {
              $socials[] = array(
                'icon' => 'fa fa-twitter',
                'url' => ot_get_option('novell_social_links_twitter')
              );
            }

            if ( ot_get_option('novell_social_links_google') ) {
              $socials[] = array(
                'icon' => 'fa fa-google-plus',
                'url' => ot_get_option('novell_social_links_google')
              );
            }

            if ( ot_get_option('novell_social_links_youtube') ) {
              $socials[] = array(
                'icon' => 'fa fa-youtube',
                'url' => ot_get_option('novell_social_links_youtube')
              );
            }

          ?>

          <?php if ( count( $socials ) > 0 ) : ?>
          <ul class="nav navbar-nav navbar-right nav-socials">
            <?php foreach ( $socials as $social ) : ?>
              <li>
                <a href="<?php echo $social[ 'url' ]; ?>">
                  <span class="<?php echo $social[ 'icon' ] ?>"></span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </div>

      </div><!-- /.container -->
    </nav><!-- /#navbar-main.navbar.navbar-default -->
    <?php endif; ?>

  </div><!-- /#header -->
  <?php if ( ! is_home() ) : ?>
  <!-- #breadcrumb -->
  <div id="breadcrumb">
    <div class="container">
      <?php if ( ot_get_option( 'novell_subheading' ) ) : ?>
        <h2 class="breadcrumb-title text-muted">
          <?php echo ot_get_option( 'novell_subheading' ) ?>
        </h2>
      <?php endif; ?>

      <?php the_breadcrumb(); ?>
    </div>
  </div><!-- /#breadcrumb -->
  <?php endif; ?>

  <!-- #main -->
  <div id="main">
