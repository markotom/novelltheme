<?php

/**
 * -----------------------------------------------------------------------------
 * OptionTree Framework
 * -----------------------------------------------------------------------------
 *
 */

// Hide pages from admin menu
add_filter( 'ot_show_pages', '__return_false' );

// Avoid create a default layout
add_filter( 'ot_show_new_layout', '__return_false' );

// Turn on theme mode
add_filter( 'ot_theme_mode', '__return_true' );

// Load template
require get_template_directory() . '/option-tree/ot-loader.php';

/**
 * -----------------------------------------------------------------------------
 * Theme Options
 * -----------------------------------------------------------------------------
 *
 */

// Set custom theme options
add_action( 'admin_init', 'custom_theme_options', 1 );

function custom_theme_options() {

  // OptionTree is not loaded yet
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;

  // Get saved settings
  $saved_settings = get_option( ot_settings_id(), array() );

  // Column layouts
  $global_column_layouts = novell_get_column_layouts();
  array_shift( $global_column_layouts );

  $column_layouts = novell_get_column_layouts();

  // Set custom settings
  $custom_settings = array(

    // Contextual help
    'contextual_help' => array(
      'content' => array(
        array(
          'id' => 'information',
          'title' => __( 'Information', 'novell' ),
          'content' => '
            <h1>Novell Theme</h1>
            <p>Thanks for using this Wordpress Theme!</p>
            <hr>
            <p>
              You can help with development this theme on
              <a href="https://github.com/markotom/novelltheme">Github</a>.
            </p>
            <p>Developed by <a href="http://about.me/markotom">Marco Godínez</a></p>
          '
        )
      )
    ),

    // Sections
    'sections' => array(
      array(
        'id' => 'general',
        'title' => __( 'General', 'novell' )
      ),
      array(
        'id' => 'blog',
        'title' => __( 'Blog', 'novell' )
      ),
      array(
        'id' => 'frontpage',
        'title' => __( 'Front page', 'novell' )
      ),
      array(
        'id' => 'layout',
        'title' => __( 'Layout', 'novell' )
      ),
      array(
        'id' => 'carousel',
        'title' => __( 'Carousel', 'novell' )
      ),
      array(
        'id' => 'social-links',
        'title' => __( 'Social links', 'novell' )
      )
    ),

    // Settings
    'settings' => array(

      // Heading Text
      array(
        'id' => 'novell_heading_text',
        'label' => __( 'Heading Text', 'novell' ),
        'desc' => __( 'Shows heading text instead site name', 'novell' ),
        'type' => 'text',
        'section' => 'general',
      ),

      // Logo
      array(
        'id'          => 'novell_logo',
        'label'       => __( 'Logo', 'novell' ),
        'desc'        => __( 'Upload your own logo. If you don\'t upload the logo, your heading text or site name will be displayed instead', 'novell' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general'
      ),

      // Excerpt Length
      array(
        'id' => 'novell_excerpt_length',
        'label' => __( 'Excerpt Length', 'novell' ),
        'desc' => __( 'Set max number of words', 'novell' ),
        'std' => '55',
        'type' => 'numeric-slider',
        'section' => 'blog',
        'min_max_step' => '0,100,1'
      ),

      // Featured Category
      array(
        'id' => 'novell_featured_category',
        'label' => __( 'Featured Category', 'novell' ),
        'desc' => __( 'Shows posts from this category instead all posts from all categories', 'novell' ),
        'type' => 'category-select',
        'section' => 'frontpage',
      ),

      // Social Links
      array(
        'id' => 'novell_social_links',
        'label' => __( 'Social Links', 'novell' ),
        'desc' => __( 'Create and organize your social links', 'novell' ),
        'std' => '',
        'type' => 'social-links',
        'section' => 'social-links'
      ),

      array(
        'id'          => 'novell-layout-global',
        'label'       => __( 'Global layout', 'novell' ),
        'desc'        => __( 'Global layout. Other layouts will override this layout if they are set.', 'novell' ),
        'std'         => 'col-3-right',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $global_column_layouts
      ),

      array(
        'id'          => 'novell-layout-home',
        'label'       => __( 'Home', 'novell' ),
        'desc'        => __( 'Home layout. If is not defined, it inherits global layout', 'novell' ),
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      array(
        'id'          => 'novell-layout-single',
        'label'       => __( 'Single', 'novell' ),
        'desc'        => __( 'Single layout. If is not defined, it inherits global layout', 'novell' ),
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      array(
        'id'          => 'novell-layout-page',
        'label'       => __( 'Page', 'novell' ),
        'desc'        => __( 'Page layout. If is not defined, it inherits global layout', 'novell' ),
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      array(
        'id'          => 'novell-layout-archive',
        'label'       => __( 'Archive', 'novell' ),
        'desc'        => __( 'Archive layout. If is not defined, it inherits global layout', 'novell' ),
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      array(
        'id'          => 'novell-layout-category',
        'label'       => __( 'Category', 'novell' ),
        'desc'        => __( 'Category layout. If is not defined, it inherits global layout', 'novell' ),
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      array(
        'id'          => 'novell-layout-search',
        'label'       => __( 'Search', 'novell' ),
        'desc'        => __( 'Search layout. If is not defined, it inherits global layout', 'novell' ),
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      array(
        'id'          => 'novell-layout-404',
        'label'       => __( 'Error 404', 'novell' ),
        'desc'        => __( 'Error 404 layout. If is not defined, it inherits global layout', 'novell' ),
        'std'         => 'inherit',
        'type'        => 'radio-image',
        'section'     => 'layout',
        'choices'     => $column_layouts
      ),

      array(
        'id'          => 'novell_carousel_slides',
        'label'       => __( 'Slides', 'novell' ),
        'desc'        => __( 'Add new slide to carousel', 'novell' ),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'carousel',
        'settings'    => array(
          array(
            'id'          => 'caption',
            'label'       => __( 'Caption', 'novell' ),
            'std'         => '',
            'type'        => 'text'
          ),
          array(
            'id'          => 'image',
            'label'       => __( 'Featured Image', 'novell' ),
            'std'         => '',
            'type'        => 'upload'
          ),
          array(
            'id'          => 'url',
            'label'       => __( 'Link', 'novell' ),
            'std'         => '',
            'type'        => 'text'
          )
        )
      )
    )

  );

  // Save custom settings if are not the same
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings );
  }

}

// To get column layouts
function novell_get_column_layouts() {

  return array(
    array(
      'value'     => 'inherit',
      'label'     => __( 'Inherit', 'novell' ),
      'src'       => get_template_directory_uri() . '/assets/images/layouts/inherit.gif'
    ),
    array(
      'value'     => 'col-1-full',
      'label'     => __( '1 Column Full', 'novell' ),
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-1-full.gif'
    ),
    array(
      'value'     => 'col-2-right',
      'label'     => __( '2 Column Right', 'novell' ),
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-2-right.gif'
    ),
    array(
      'value'     => 'col-2-left',
      'label'     => __( '2 Column Left', 'novell' ),
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-2-left.gif'
    ),
    array(
      'value'     => 'col-3-middle',
      'label'     => __( '3 Column Middle', 'novell' ),
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-3-middle.gif'
    ),
    array(
      'value'     => 'col-3-right',
      'label'     => __( '3 Column Right', 'novell' ),
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-3-right.gif'
    ),
    array(
      'value'     => 'col-3-left',
      'label'     => __( '3 Column Left', 'novell' ),
      'src'       => get_template_directory_uri() . '/assets/images/layouts/col-3-left.gif'
    )
  );

}

// Default social links
add_action( 'ot_type_social_links_defaults', function () {
  return array(
    array(
        'name'    => __( 'Facebook', 'option-tree' ),
        'title'   => '',
        'href'    => ''
    ),
    array(
      'name'    => __( 'Twitter', 'option-tree' ),
      'title'   => '',
      'href'    => ''
    ),
    array(
      'name'    => __( 'Google+', 'option-tree' ),
      'title'   => '',
      'href'    => ''
    ),
    array(
      'name'    => __( 'Youtube', 'option-tree' ),
      'title'   => '',
      'href'    => ''
    )
  );
});

?>
