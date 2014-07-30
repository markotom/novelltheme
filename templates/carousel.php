<?php $slides = ot_get_option( 'novell_carousel_slides' ); ?>

<?php if ( is_array( $slides ) ) : ?>

<!-- #carousel-home -->
<div id="carousel-home" class="carousel carousel-home slide" data-ride="carousel">

  <?php if ( count( $slides ) > 1 ) : ?>
  <ol class="carousel-indicators">
    <?php foreach ( $slides as $index => $slide ) : ?>
    <li data-target="#carousel-home" data-slide-to="<?php echo $index ?>"<?php echo $index === 0 ? ' class="active"' : '' ?>></li>
    <?php endforeach; ?>
  </ol>
  <?php endif; ?>

  <div class="carousel-inner">
    <?php foreach ( $slides as $index => $slide ) : ?>
    <div class="item<?php echo $index === 0 ? ' active' : '' ?>" style="background-image: url(<?php echo $slide[ 'image' ] ?>)">
      <div class="carousel-caption">
        <h4>
          <a href="<?php echo $slide[ 'url' ] ?>">
            <?php echo $slide[ 'title' ] ?>
          </a>
        </h4>
        <p><?php echo $slide[ 'caption' ] ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <?php if ( count( $slides ) > 1 ) : ?>
  <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  <?php endif; ?>

</div><!-- /#carousel-home -->

<?php endif; ?>
