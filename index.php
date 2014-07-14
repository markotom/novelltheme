<?php get_header(); ?>

<?php
  // Get global layout
  $column_global_layout = ot_get_option( 'novell-layout-global' );
?>

<!-- .container -->
<div class="container">

  <!-- .col-(3|2|1)-(left|right|full) -->
  <div class="<?php echo $column_global_layout; ?>">

    <!-- .content -->
    <div class="content" role="main">
      <?php
        if ( have_posts() ) :

          // Start the loop
          while ( have_posts() ) : the_post();

            // Get template content
            get_template_part( 'templates/content' );

          endwhile;

        else :

          // Get "No post found" template
          get_template_part( 'templates/content', 'none' );

        endif;
      ?>
    </div><!-- /.content -->

    <?php
      // Hide main sidebar if specified full column
      if (  $column_global_layout !== 'col-1-full' ) :

        // Get main sidebar
        get_sidebar( 'main' );

      endif;

      // Show secondary sidebar if specified three columns
      if (  $column_global_layout === 'col-3-middle' ||
            $column_global_layout === 'col-3-right' ||
            $column_global_layout === 'col-3-left'   ) :

        // Get secondary sidebar
        get_sidebar( 'secondary' );

      endif;
    ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
