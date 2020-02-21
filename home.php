<?php
/**
 * Copied form default index file
 * Home page markup 
 */

get_header();
?>

<main id="site-content" role="main">

<div style="position: fixed; z-index: -99; width: 100%; height: 100%">
    <video loop="loop" autoplay="" playsinline="" muted="" id="mejs_24989800046482813_html5" preload="none" src="https://www.youtube.com/watch?v=1gJyppALe_g" style="margin: 0px; width: 1425px; height: 801.562px;">
        <source type="video/mp4" src="https://www.youtube.com/watch?v=1gJyppALe_g">
    </video>
</div>

<!------- LINKS SECTION -------->

   <div id="links-section">
   
      <ul>
         <li><a href="#"><button id="events-btn">Events</button></a></li>
         <li><a href="#"><button id="videos-btn">Videos</button></a></li>
         <li><a href="#"><button id="workshops-btn">Workshops</button></a></li>
         <li><a href="#"><button id="volunteer-btn">Volunteer</button></a></li>
      </ul>
   
   </div>


<!---- OPEN BOOK EFFECT - STLL WORKING ON THIS ------->

<div id="book-effect">
    
    <div class="book">
        <div class="back"></div>

        <div class="front">
          <div id="events">Box 1</div>
      </div>
    </div>

    <div class="book2">
           <div class="back"> <div id="shows-info">This is some information</div></div>
           <div class="front">
             <div id="events">Box2</div>
         </div>
   </div>
   
</div>



<!----- Comment Section ----->


<div id="comment-box">
   
   Let us know what you think?
   
   
</div>



</main><!-- #site-content -->
<?php	
get_footer();
?>