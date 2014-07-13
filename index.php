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
      Main content
    </div><!-- /.content -->

    <?php
      // Hide main sidebar if specified full column
      if (  $column_global_layout !== 'col-1-full' ) :
    ?>

    <!-- .sidebar.sidebar-main -->
    <div class="sidebar sidebar-main" role="complementary">
      Sidebar 1
    </div><!-- /.sidebar.sidebar-main -->

    <?php endif; ?>

    <?php
      // Show secondary sidebar if specified three columns
      if (  $column_global_layout === 'col-3-middle' ||
            $column_global_layout === 'col-3-right' ||
            $column_global_layout === 'col-3-left'   ) :
    ?>

    <!-- .sidebar.sidebar-secondary -->
    <div class="sidebar sidebar-secondary" role="complementary">
      Sidebar 2
    </div><!-- /.sidebar.sidebar-secondary -->

    <?php endif; ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
