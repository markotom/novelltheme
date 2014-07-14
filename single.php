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

    <?php novell_main_sidebar(); ?>
    <?php novell_secondary_sidebar(); ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
