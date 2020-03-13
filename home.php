<?php
/**
 * Copied form default index file
 * Home page markup 
 */

get_header();
?>


<main id="site-content" role="main">

<!-- Slider main container -->
<div class="swiper-container">
<!-- Add Scrollbar -->
<div class="swiper-scrollbar"></div>
<div class="swiper-pagination"></div>
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="home swiper-slide">
        <h4><?php _e('For our Community. With Love.','baktun-text'); ?></h4>
        <span class="heart-emoji">❤️</span>
        <span class="sub-heading"><?php _e('Civic Action Teatro in East Salinas California, and beyond.','baktun-text'); ?></span>
        <div class="grid">         
        <?php
          // First loop query for column one 
          $args = array(
            'post_type' => array(
              'tribe_events', 'post',
            )
          );
          $the_query = new WP_Query( $args );
          // The Loop
          if ( $the_query->have_posts() ) {
            $post_count = $the_query->found_posts;
            $half_count = $post_count/2;
            $loop_count = 0;
              echo '<div class="column col-1">';
              $ids = array();
              while ( $the_query->have_posts() ) {
                  if ( $loop_count > $half_count ) break;
                  $the_query->the_post();
                  $ids[] = get_the_ID();
                  echo '<div class="box">';
                  echo '<h3 class="info-card-heading">' ;
                  echo get_the_title() . ' </h3>' . get_the_content() ;
                  the_post_thumbnail();
                  echo tribe_get_start_date() . '</div>';
                  $loop_count++;
              }
              echo '</div>';
          } else {

              _e('No Posts found.', 'baktun-text');
          }
          /* Restore original Post Data */
          wp_reset_postdata();

          /*  second loop column two */
          $args = array(
            'post_type' => array(
              'tribe_events', 'post',
            ),
            'post__not_in' => $ids
          );
          $the_query = new WP_Query( $args );
          // The Loop
          if ( $the_query->have_posts() ) {
              echo '<div class="column col-2">';
              while ( $the_query->have_posts() ) {
                  $the_query->the_post();
                  echo '<div class="box">';
                  echo '<h3 class="info-card-heading">' ;
                  echo get_the_title() . ' </h3>' .  get_the_content() ;
                  the_post_thumbnail();
                  echo tribe_get_start_date() . '</div>';
              }
              echo '</div>';
          } else {

              _e('No Posts found.', 'baktun-text');
          }
          /* Restore original Post Data */
          wp_reset_postdata();

        ?>
        </div> <!-- end grid -->
        </div> <!-- end Page 1 -->
        <?php
        /*  Loop for pages */
          $args = array(
            'post_type' => array(
              'page',
            ),
          );
          $the_query = new WP_Query( $args );
          // The Loop
          if ( $the_query->have_posts() ) {
              
              while ( $the_query->have_posts() ) {
                  $the_query->the_post();
                  echo '<div class="swiper-slide">';
                
                  echo '<h3>' . get_the_title() . ' </h3>' .  get_the_content() ;
                 
                  echo '</div>';
              }
            
          } else {

              _e('No Page found.', 'baktun-text');
          }
          /* Restore original Post Data */
          wp_reset_postdata();
          ?>
       

    </div>
</div>


</main><!-- #site-content -->
<?php	
get_footer();
?>
