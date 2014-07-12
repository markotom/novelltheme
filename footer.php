  </div><!-- /#content -->

  <!-- #bottom -->
  <div id="bottom">
    <!-- .container -->
    <div class="container">
      <?php get_sidebar( 'bottom' ); ?>
    </div><!-- /.container -->
  </div><!-- /#bottom -->

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
