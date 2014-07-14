<!-- #post-? -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <!-- .entry-header -->
  <header class="entry-header">
    <!-- .entry-meta -->
    <div class="entry-meta">
      <span class="entry-meta-categories"><?php the_category(', '); ?></span>
    </div><!-- /.entry-meta -->

    <?php if ( is_single() ) : ?>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php else : ?>
    <h1 class="entry-title">
      <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
    </h1>
    <?php endif; ?>

    <!-- .entry-meta -->
    <div class="entry-meta">
      <!-- .entry-meta-author -->
      <div class="entry-meta-author">
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
          <span class="glyphicon glyphicon-user"></span>
          <?php the_author_meta( 'display_name' ); ?>
        </a>
      </div><!-- /.entry-meta-author -->

      <!-- .entry-meta-date -->
      <div class="entry-meta-date">
        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_time() ); ?>">
          <span class="glyphicon glyphicon-time"></span>
          <?php the_time( get_option( 'date_format' ) ); ?>
        </a>
      </div><!-- /.entry-meta-date -->

      <?php if ( comments_open() || get_comments_number() ) : ?>
      <!-- .entry-meta-comments -->
      <div class="entry-meta-comments">
        <?php
          $comment_icon = '<span class="glyphicon glyphicon-comment"></span> ';
          comments_popup_link( null, $comment_icon . __( '1 Comment' ), $comment_icon . __( '% Comments' ) );
        ?>
      </div><!-- /.entry-meta-comments -->
      <?php endif; ?>
    </div><!-- /.entry-meta -->
  </header><!-- /.entry-header -->

  <?php if ( is_single() ) : ?>
  <!-- .entry-content -->
  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- /.entry-content -->
  <?php else : ?>
  <!-- .entry-summary -->
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div><!-- /.entry-summary -->
  <?php endif; ?>

  <!-- .entry-meta -->
  <footer class="entry-meta">
    <span class="entry-meta-tags">
      <?php
        $tag_list = get_the_tag_list( null, ' ' );
        if ( ! empty( $tag_list ) )
          echo $tag_list;
      ?>
    </span>
  </footer><!-- /.entry-meta -->

</article><!-- /#post-? -->
