  </div><!-- /#main -->

  <?php

    // This is a horizontal sidebar.
    // Please use Columnify: http://wordpress.org/plugins/columnify

    get_sidebar( 'bottom' );

  ?>

  <!-- #footer -->
  <div id="footer">
    <!-- .container -->
    <div class="container">
      <?php echo date( 'Y' ); ?> @ <?php bloginfo( 'sitename' ); ?>
    </div><!-- /.container -->
  </div><!-- /#footer -->

  <?php wp_footer(); ?>
</body>
</html>
