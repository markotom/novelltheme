<?php

/**
 * -----------------------------------------------------------------------------
 * Functions
 * -----------------------------------------------------------------------------
 *
 */

function novell_global_layout() {

  // Echo global layout
  $global_layout = novell_get_global_layout();
  echo $global_layout;

}

    function novell_get_global_layout() {

      // Get global layout
      $column_global_layout = ot_get_option( 'novell-layout-global' );
      return $column_global_layout;

    }

function novell_current_layout() {

  // Echo current layout
  $current_layout = novell_get_current_layout();
  echo $current_layout;

}

    function novell_get_current_layout() {

      if ( is_home() ) {

        // Set home layout name
        $layout_name = 'novell-layout-home';

      } elseif ( is_single() ) {

        // Set single layout name
        $layout_name = 'novell-layout-single';

      } elseif ( is_category() ) {

        // Set category layout name
        $layout_name = 'novell-layout-category';

      } elseif ( is_archive() ) {

        // Set archive layout name
        $layout_name = 'novell-layout-archive';

      } elseif ( is_search() ) {

        // Set search layout name
        $layout_name = 'novell-layout-search';

      } elseif ( is_page() ) {

        // Set page layout name
        $layout_name = 'novell-layout-page';

      } elseif ( is_404() ) {

        // Set error 404 layout name
        $layout_name = 'novell-layout-404';

      } else {

        // Set global layout name by default
        $layout_name = 'novell-layout-global';

      }

      // Get global layout
      $global_layout = novell_get_global_layout();

      // Set current layout
      $current_layout = ot_get_option( $layout_name );


      return  ! $current_layout || $current_layout === 'inherit'
              ? $global_layout
              : $current_layout;

    }

function novell_main_sidebar() {

  // Hide main sidebar if specified full column
  if (  novell_get_global_layout() !== 'col-1-full' ) :

    // Get main sidebar
    get_sidebar();

  endif;

}

function novell_secondary_sidebar() {

  // Show secondary sidebar if specified three columns
  if (  novell_get_global_layout() === 'col-3-middle' ||
        novell_get_global_layout() === 'col-3-right' ||
        novell_get_global_layout() === 'col-3-left'   ) :

    // Get secondary sidebar
    get_sidebar( 'secondary' );

  endif;

}

function novell_pagination() {

  // You can use WP-PageNavi plugin
  // https://wordpress.org/plugins/wp-pagenavi
  if ( function_exists( 'wp_pagenavi' ) ) :

    wp_pagenavi();

  else:

    echo '<ul class="pager"><li class="previous">';

      previous_posts_link();

    echo '</li><li class="next right">';

      next_posts_link();

    echo '</li></ul>';

  endif;

}

function novell_post_thumbnail( $thumb_size = 'thumb-large' ) {

  if ( has_post_thumbnail() ) :

    if ( is_singular() ) :

      the_post_thumbnail( $thumb_size, array( 'class' => 'post-thumbnail img-responsive' ) );

    else :

      $permalink       = get_permalink();
      $title_attribute = the_title_attribute( array( 'echo' => 0 ) );

      echo '<a href="' . $permalink . '" title="' . $title_attribute . '" class="post-thumbnail" rel="bookmark">';
        the_post_thumbnail( $thumb_size, array( 'class' => 'img-responsive' ) );
      echo '</a>';

    endif;

  endif;

}

function the_breadcrumb() {
  global $post;

  if ( ! is_home() ) {
    echo '<ol class="breadcrumb">';
    echo '<li><a href="' . get_option( 'home' ) . '">';
    echo __( 'Home' );
    echo '</a></li>';

    if ( is_single () ) {

      echo '<li>';
        the_category(', ');
      echo '</li>';

      if ( is_single() ) {
        echo '<li>' . get_the_title() . '</li>';
      }

    } elseif ( is_category () ) {

      echo '<li>'; single_cat_title(); echo '</li>';

    } elseif ( is_page () && ! $post->post_parent && ( ! is_front_page () ) ) {

      echo '<li>' . get_the_title() . '</li>';

    } elseif ( is_page () && $post->post_parent && ( ! is_front_page () ) ) {

      $post_array = get_post_ancestors( $post );
      krsort( $post_array );

      foreach ( $post_array as $key=>$postid ) {
        $post_ids = get_post( $postid );
        echo '<li class="active">';
        echo '<a href="' . get_permalink( $post_ids ) . '">';
        echo $post_ids->post_title;
        echo '</a></li>';
      }

      echo '<li>' . get_the_title() . '</li>';

    } elseif ( is_tag() ) {

      echo '<li>';
      echo __( 'Tag', 'novell' ) . ': ';
        single_tag_title();
      echo '</li>';

    } elseif ( is_day() ) {

      echo '<li>';
      printf( __( 'Daily Archive: %s', 'novell' ), get_the_time( 'F jS, Y' ) );
      echo '</li>';

    } elseif ( is_month() ) {

      echo '<li>';
      printf( __( 'Monthly Archive: %s', 'novell' ), get_the_time( 'F, Y' ) );
      echo '</li>';

    } elseif ( is_year() ) {

      echo '<li>';
      printf( __( 'Yearly Archive: %s', 'novell' ), get_the_time( 'Y' ) );
      echo '</li>';

    } elseif ( is_author() ) {
      global $author;

      $user_info = get_userdata( $author );

      echo '<li>';
      printf( __( 'Posted by %s', 'novell' ), $user_info->display_name );
      echo '</li>';

    } elseif ( isset( $_GET[ 'paged' ] ) && ! empty( $_GET[ 'paged' ] ) ) {

      echo '<li>';
      _e( 'Archive' );
      echo '</li>';

    } elseif ( is_search() ) {

      echo'<li>';
      _e( 'Search Results' );
      echo '</li>';

    }

    echo '</ol>';
  }
}

// Get attachment id by url
// More info: http://frankiejarrett.com/get-an-attachment-id-by-url-in-wordpress
function wp_get_attachment_id_by_url( $url ) {

  $parsed_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

  $this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
  $file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

  if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
    return;
  }

  global $wpdb;

  $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );

  return $attachment[0];

}

?>
