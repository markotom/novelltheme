<?php get_header(); ?>

<!-- .container -->
<div class="container">

  <!-- .col-(3|2|1)-(left|right|full) -->
  <div class="<?php novell_global_layout(); ?>">

    <!-- .content -->
    <div class="content" role="main">

      <?php if ( have_posts() ) : ?>

      <!-- .page-title -->
      <h1 class="page-title">
        <?php if ( is_day() ) : ?>
          <span class="glyphicon glyphicon-calendar"></span> <?php _e( 'Daily Archive:', 'novell' ); ?> <?php echo get_the_time('F j, Y'); ?>
        <?php elseif ( is_month() ) : ?>
          <span class="glyphicon glyphicon-calendar"></span> <?php _e( 'Monthly Archive:', 'novell' ); ?> <?php echo get_the_time('F Y'); ?>
        <?php elseif ( is_year() ) : ?>
          <span class="glyphicon glyphicon-calendar"></span> <?php _e( 'Yearly Archive:', 'novell' ); ?> <?php echo get_the_time('Y'); ?>
        <?php elseif ( is_category() ) : ?>
          <?php _ex( 'Category', 'taxonomy singular name' ); ?>: <?php single_cat_title(); ?>
        <?php elseif ( is_tag() ) : ?>
          <?php _ex( 'Tag', 'taxonomy singular name' ); ?>: <?php single_tag_title(); ?>
        <?php elseif ( is_author() ) : ?>
          <?php $author = get_userdata( get_query_var('author') );?>
          <span class="glyphicon glyphicon-user"></span> <?php _e( 'Author' ); ?>: <?php echo $author->display_name;?>
        <?php else : ?>
          <?php the_title(); ?>
        <?php endif; ?>
      </h1><!-- /.page-title -->

      <?php
          // Start the loop
          while ( have_posts() ) : the_post();

            // Get template content
            get_template_part( 'templates/content' );

          endwhile;

          novell_pagination();

        else :

          // Get "No post found" template
          get_template_part( 'content', 'none' );

        endif;
      ?>
    </div><!-- /.content -->

    <?php novell_main_sidebar(); ?>
    <?php novell_secondary_sidebar(); ?>

  </div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
