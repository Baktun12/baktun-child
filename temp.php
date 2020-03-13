<?php
/**
*
* @package WordPress
* @subpackage Baktun12 Child Theme
* @since Twenty Fourteen 1.0
*/
get_header();
?>
<style>



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
        ?>
        </div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>

    </div>
</div>


</main><!-- #site-content -->

<?php	
get_footer();
?>
