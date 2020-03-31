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
        <div id="modal-content"></div>   
        <?php $home_id = 50;?>
        <div class="header" style="background-image: linear-gradient(to bottom, transparent,black),url('<?php echo get_the_post_thumbnail_url( $home_id ,'full' )?>');
          height: 212px;
          background-size: cover;
          background-repeat: no-repeat;
          color: white;
          text-shadow: black 2px 2px 15px;">

          <?php 
          echo apply_filters('the_content', get_post_field('post_content', $home_id )); ?>
        </div>
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
                  if ( $loop_count > $half_count - 1 ) break;
                  $the_query->the_post();
                  $ids[] = get_the_ID();
                  get_template_part('template-parts/content/cards');
                  
                  $loop_count++;
              }
              echo '</div>';
          } else {

              /* no Posts Found */
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
                  get_template_part('template-parts/content/cards');
              }
              echo '</div>';
          } else {

              /* No posts found */
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
            'post__not_in' => array(43)
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

              /* No Extra Pages Found */
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
