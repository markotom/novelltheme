<?php get_header(); ?>

<!-- .container -->
<div class="container">

  <!-- .col-(3|2|1)-(left|right|full) -->
  <div class="<?php novell_current_layout(); ?>">

    <!-- .content -->
    <div class="content" role="main">
      <?php

        if ( is_home() ) :

          // Carousel
          get_template_part( 'templates/carousel' );

          // Featured content
          get_template_part( 'templates/featured' );


          if ( ot_get_option( 'novell_featured_category_show' ) !== 'off' ) :

            // Get featured category
            query_posts( 'cat=' . ot_get_option( 'novell_featured_category' ) );

          endif;

        endif;


        if ( ! is_home() && ot_get_option( 'novell_show_posts' ) !== 'off' ) :

          if ( have_posts() ) :

            echo '<div class="post-loop">';

            // Start the loop
            while ( have_posts() ) : the_post();

              // Get template content
              get_template_part( 'templates/content' );

            endwhile;

            echo '</div>';

            novell_pagination();

          else :

            // Get "No post found" template
            get_template_part( 'templates/content', 'none' );

          endif;

        endif;

      ?>
    </div><!-- /.content -->

    <?php novell_main_sidebar(); ?>
    <?php novell_secondary_sidebar(); ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
