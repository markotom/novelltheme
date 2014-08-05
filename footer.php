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
      <?php if ( ot_get_option( 'novell_footer_text' ) ) : ?>
        <?php echo ot_get_option( 'novell_footer_text' ); ?>
      <?php else : ?>
        <?php echo date( 'Y' ); ?> @ <?php bloginfo( 'sitename' ); ?>
      <?php endif; ?>
    </div><!-- /.container -->
  </div><!-- /#footer -->

  <?php wp_footer(); ?>
</body>
</html>
