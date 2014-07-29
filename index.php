<?php get_header(); ?>

<!-- .container -->
<div class="container">

  <!-- .col-(3|2|1)-(left|right|full) -->
  <div class="<?php novell_global_layout(); ?>">

    <!-- .content -->
    <div class="content" role="main">
      <?php

        if ( is_home() ) :

          // Carousel
          get_template_part( 'templates/carousel' );

        endif;


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

    <?php novell_main_sidebar(); ?>
    <?php novell_secondary_sidebar(); ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
