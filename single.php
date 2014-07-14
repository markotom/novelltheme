<?php get_header(); ?>

<!-- .container -->
<div class="container">

  <!-- .col-(3|2|1)-(left|right|full) -->
  <div class="<?php novell_global_layout(); ?>">

    <!-- .content -->
    <div class="content" role="main">
      <?php
        // Start the loop
        while ( have_posts() ) : the_post();

          // Get template content
          get_template_part( 'templates/content' );

        endwhile;
      ?>
    </div><!-- /.content -->

    <?php
      // Hide main sidebar if specified full column
      if (  novell_get_global_layout() !== 'col-1-full' ) :

        // Get main sidebar
        get_sidebar( 'main' );

      endif;

      // Show secondary sidebar if specified three columns
      if (  novell_get_global_layout() === 'col-3-middle' ||
            novell_get_global_layout() === 'col-3-right' ||
            novell_get_global_layout() === 'col-3-left'   ) :

        // Get secondary sidebar
        get_sidebar( 'secondary' );

      endif;
    ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
