<?php get_header(); ?>

<!-- .container -->
<div class="container">

  <!-- .col-(3|2|1)-(left|right|full) -->
  <div class="<?php novell_global_layout(); ?>">

    <!-- .content -->
    <div class="content" role="main">

      <h1 class="page-title"><?php _e( 'Not Found', 'novell' ); ?></h1>

      <!-- .page-content -->
      <div class="page-content">
        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'novell' ); ?></p>

        <?php get_search_form(); ?>
      </div><!-- /.page-content -->

    </div><!-- /.content -->

    <?php novell_main_sidebar(); ?>
    <?php novell_secondary_sidebar(); ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
