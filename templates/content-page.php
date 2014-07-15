<!-- #post-? -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!-- .entry-header -->
  <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
  </header><!-- /.entry-header -->

  <!-- .entry-content -->
  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- /.entry-content -->

</article><!-- /#post-? -->

