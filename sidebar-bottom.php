<?php if ( is_active_sidebar( 'bottom-sidebar' ) ) : ?>

<!-- .sidebar.sidebar-bottom -->
<div class="sidebar sidebar-bottom" role="complementary">
  <!-- .row -->
  <div class="row">
    <?php dynamic_sidebar( 'bottom-sidebar' ); ?>
  </div><!-- /.row -->
</div><!-- /.sidebar.sidebar-bottom -->

<?php endif; ?>
