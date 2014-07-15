<header class="page-header">
  <h1 class="page-title"><?php _e( 'Nothing Found', 'novell' ); ?></h1>
</header>

<div class="page-content">
  <?php if ( is_search() ) : ?>

  <p><?php _e( 'Sorry, but nothing found. Try again with some different keywords.', 'novell' ); ?></p>
  <?php get_search_form(); ?>

  <?php else : ?>

  <p><?php _e( 'It seems the content has been lost. Perhaps  searching can help you.', 'novell' ); ?></p>
  <?php get_search_form(); ?>

  <?php endif; ?>
</div><!-- .page-content -->
