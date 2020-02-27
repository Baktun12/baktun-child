<?php
/**
 * Copied form default index file
 * Home page markup 
 */

get_header();
?>

<main id="site-content" role="main">


<section class="marquee">
    <div class="marquee-video" >
        <video playsinline="" muted="" onplaying="this.controls=false" autoplay loop>
        <source src="/wp-content/uploads/2020/02/banner-video.mp4" type='video/mp4;'> <!-- webm, ogg -->
        </video>
    </div>
    <div class="marquee-highlights">
        <div class="marquee-item">one</div>
        <div class="marquee-item">two</div>
        <div class="marquee-item">three</div>
    </div>
</section>


<div id="info-links">
    <p>Events</p>
    <p>Videos</p>
    <p>Workshops</p>
    <p>Volunteer</p>
</div>

</main><!-- #site-content -->
<?php	
get_footer();
?>