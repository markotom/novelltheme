<!-- .search-form -->
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <div class="form-group">
    <input type="search" class="search-field" placeholder="<?php _ex( 'Search &hellip;', 'placeholder' ); ?>" value="<?php get_search_query(); ?>" name="s" title="<?php _ex( 'Search for:', 'label' ); ?>">
    <input type="submit" class="search-submit" value="<?php _ex( 'Search', 'submit button' ); ?>" />
  </div>
</form><!-- /.search-form -->
