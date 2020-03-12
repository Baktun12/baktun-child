<?php
/**
* Template Name: New Home
*
* @package WordPress
* @subpackage Baktun12 Child Theme
* @since Twenty Fourteen 1.0
*/
get_header();
?>
<style>

.home h4 {
  text-align: center;
}

.home .sub-heading {
  display: block;
  font-size: 1em;
  text-align: center;
}

.swipper-container{
  background: #000; 
}

.info-cards{
  list-style-type: none;
}

</style>

<main id="site-content" role="main">

<!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="home swiper-slide">
        <h4><?php _e('Teatro for the People','baktun-text'); ?></h4>
        <span class="sub-heading"><?php _e('Exploring the art of teatro as a tool for social change in East Salinas Ca. and beyond.','baktun-text'); ?></span>
        <?php
 
          // The Query
          $args = array(
            'post_type' => array(
              'tribe_events', 'post',
            )
          );
          $the_query = new WP_Query( $args );
            
          // The Loop
          if ( $the_query->have_posts() ) {
              echo '<ul class="info-cards">';
              while ( $the_query->have_posts() ) {
                  $the_query->the_post();
                  echo '<li>' . get_the_title() . ' ' . get_the_content() . '</li>';
                  the_post_thumbnail();
                  echo '<li>' . tribe_get_start_date() . '</li>';
              }
              echo '</ul>';
          } else {

              _e('No Posts found.', 'baktun-text');
          }
          /* Restore original Post Data */
          wp_reset_postdata();

          $events = tribe_get_events();
          ?>
          <pre> 
          <?php
          echo '<ul>';
          foreach ( $events as $event ) {
            echo '<li>' . tribe_get_start_date($event) . '</li>';
          }
          echo '</ul>';
          ?>
          </pre>

        </div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>

    </div>
</div>


</main><!-- #site-content -->
<!-- remove swipper css form header.js -->
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script>
  var mySwiper = new Swiper ('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
  })
  </script>
<?php	
get_footer();
?>
