<?php
/**
 * Copied form default index file
 * Home page markup 
 */

get_header();
?>

<main id="site-content" role="main">

<!------- MARQUEE SECTION -------->

<section class="marquee">
    <div class="marquee-video" >
        <video playsinline="" muted="" onplaying="this.controls=false" autoplay loop>
        <source src="/wp-content/uploads/2020/02/banner-video.mp4" type='video/mp4;'> <!-- webm, ogg -->
        </video>
    </div>
    <div class="marquee-highlights">
        <div class="marquee-item">
            <h4>Release Party</h4>
            <p>La Sofa Queen Album Release Party</p>
            <a href="#"><button class="link-btns" >Read More</button></a>
        </div>
        <div class="marquee-item">
            <h4>Census 2020</h4>
            <p>Telenovela Shoot</p>
            <a href="#"><button class="link-btns" >Read More</button></a>
        </div>
        <div class="marquee-item">
            <h4>Let Us Know</h4>
            <p>Where should our attention be? </p>
            <a href="#"><button class="link-btns" >Events</button></a>
        </div>
    </div>
</section>

<!------- LINKS SECTION -------->

   <div id="links-section">
   
      <ul>
         <li><a href="#"><button class="link-btns" id="events-btn">Events</button></a></li>
         <li><a href="#"><button class="link-btns" id="videos-btn">Videos</button></a></li>
         <li><a href="#"><button class="link-btns" id="workshops-btn">Workshops</button></a></li>
         <li><a href="#"><button class="link-btns" id="volunteer-btn">Volunteer</button></a></li>
      </ul>
   
   </div>

<!---- OPEN BOOK EFFECT - STLL WORKING ON THIS ------->

<div id="logo-wrapper">
   

<svg style="cursor:pointer" onclick="openNav()" id="logo1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 498.92 567.62"><defs><style>.cls-1{fill:#fff;}</style></defs><title>logo_svg_shirt</title><g id="Layer_3" data-name="Layer 3"><path class="cls-1" d="M61.53,397.3,48.81,379.17l6.08-4.37c-3.37-19.14-6.73-38.32-10.13-57.68H39.35l-6.79-25.76,23.93-11,0-.46h-14c-2.25,0-2.56-.31-2.56-2.62q0-15.76,0-31.51c0-2.33.33-2.63,2.54-2.67H44q202.08,0,404.17,0c4.59,0,4.15.23,4.14,4.45q0,14.72,0,29.44c0,2.69-.22,2.92-2.7,2.93H59.73c4.84,5.5,9.59,10.48,14.23,15.58s9.41,10.24,14.12,15.36l14.28,15.52L90.21,337l19.71,16.77c2.18-7.43,4.28-14.55,6.47-22H106.26l5.43-26.54L161.79,286c0,2.88.07,5.39,0,7.89,0,.52-.63,1.15-1.12,1.49-1.76,1.2-3.59,2.29-5.53,3.52,6.78,26.15,13.53,52.2,20.32,78.35H182c-.89-15.63-1.78-31.12-2.68-46.88l-10.7.61c-.05-.84-.13-1.51-.13-2.18q0-9,0-17.94c0-2,0-2,1.67-2.67q12.85-5.06,25.73-10.08c.46-.18,1-.3,1.69-.52v35.86c1.45-1.24,14.1-23.83,17.48-31-1-1.34-2.09-2.76-3.24-4.3L220,286C225.3,295.11,230.5,304,235.77,313l19.59-9.61c.07-1,.14-2,.22-3.24l19.51-13.49v7.83L316.22,291c-.09.85-.11,1.57-.25,2.27-.86,4.26-1.76,8.53-2.63,12.79-.12.58-.15,1.17-.26,2.07l14.37-5.45c.63,5.89.51,11.61.83,17.29s.41,11.34.63,17,.5,11.48.73,17.23.42,11.28.64,17.27a13.89,13.89,0,0,0,1.42-1c3.16-2.94,6.28-5.94,9.48-8.83a3.32,3.32,0,0,0,1.17-3c-.37-6.27-.66-12.55-1-18.82-.36-6.43-.76-12.85-1.11-19.28q-.56-10.44-1.05-20.9c0-.6,0-1.21,0-2.09l29.67-12.8c.72,6,1.4,11.76,2.15,18l15.37-12.92,50.68,75.24.37-.18c-5.92-23.33-11.85-46.66-17.82-70.16l24.16-14.56C450.53,317.24,457.25,354,464,391c-1.63.17-3.12.36-4.61.48-7.83.62-15.66,1.17-23.49,1.85-1.34.12-1.78-.71-2.34-1.59L419.69,370Q409,353.23,398.26,336.44a3.37,3.37,0,0,0-1.33-1.32C402.86,352,408.78,368.86,414.8,386l-20.36,10.54c-6.62-20.14-13.17-40.07-19.8-60.22l-5.87,3.35-8.43-20.52-2.28,1.38c1.79,22.73,3.59,45.45,5.4,68.33H316c-2.7-17.75-5.38-35.43-8.1-53.31h-5.37c-.89-3.89-1.73-7.6-2.63-11.59H290c.9-4.35,1.72-8.36,2.63-12.78-4.41,1.53-8.45,3.22-12.71,4.88,1.68,21.67,3.36,43.26,5.05,64.92L265,391c-.59-7.86-.93-15.47-1.37-23.08s-.87-15.3-1.31-22.95-.89-15.24-1.35-23.16l-11.55,3.55V341l-14.86,4.3c-2-8.27-3.53-16.57-5.4-24.73-.14-.06-.2-.11-.27-.13s-.17,0-.2,0c-2.81,3-5.64,6-8.42,9-5,5.43-10,10.9-15.12,16.54l53.07,21.84L243.34,391.7l-40.93-33.5c.68,11.37,1.33,22.23,2,33.07-1.57.48-27.33.6-30.44.13.12-2.84.24-5.72.38-8.87-7.53-.26-15,0-22.67-.16-.9-6.31-1.79-12.56-2.71-19a9.27,9.27,0,0,0-1.49.31c-5.11,2-10.21,4-15.33,6a2.92,2.92,0,0,0-1.9,2.22c-1.62,5.89-3.32,11.74-5,17.61-.19.66-.4,1.31-.62,2H98.87c3.34-11.41,6.65-22.7,9.95-34l-.35-.24L63.86,397.15a9.78,9.78,0,0,0,1.38.27c.8,0,1.6,0,2.4,0H447.82c.95,0,1.89,0,2.84,0a1.54,1.54,0,0,1,1.6,1.75c0,.38,0,.77,0,1.15v30.82c0,.38,0,.77,0,1.15-.11,1.33-.44,1.73-1.75,1.86-.86.08-1.74,0-2.61,0H44c-4.07,0-4.07,0-4.07-4.31V401c0-.62,0-1.23,0-1.84a1.5,1.5,0,0,1,1.49-1.63c.58,0,1.17,0,1.75,0H59.07C59.77,397.43,60.46,397.36,61.53,397.3Zm71.23-43.19,12.76-4.62c-2.07-10.09-4.1-20-6.14-29.95h-.46C136.89,330.92,134.86,342.3,132.76,354.11Zm-61.89-7.72c.36,7.09.69,13.63,1,20.55l17.45-10.27Zm-6.51-32.28-.39.32c1.69,7.91,3.39,15.83,5.21,24.28,3.09-4.46,5.85-8.44,8.71-12.55Z"/><path class="cls-1" d="M315.22,231.54H251.55c-.66,0-1.32,0-2,0-1.76-.12-2.63-1-2.77-2.86,0-.54,0-1.08,0-1.61,0-13.26,0-26.53-.05-39.79a4.71,4.71,0,0,1,3-4.91c14.52-7.27,27.59-16.69,38.33-29.43a70.2,70.2,0,0,0,14.79-27.82,60.3,60.3,0,0,0,1.93-14.53c.06-5.25-2.17-8.67-6.82-10.61a18.76,18.76,0,0,0-7.24-1.38q-19.74,0-39.48,0c-.58,0-1.16,0-1.74,0a2.67,2.67,0,0,1-2.67-2.74c0-.53,0-1.07,0-1.61V42.49c0-.54,0-1.08,0-1.61a2.65,2.65,0,0,1,2.61-2.79,13,13,0,0,1,1.53,0h36.42a11,11,0,0,1,1.52,0,2.54,2.54,0,0,1,2.49,2.65c.06.61,0,1.22,0,1.84V58c0,3.68.4,4.18,3.91,4.62a54.22,54.22,0,0,1,19.72,6.24c12.49,6.89,19.78,17.75,21.62,32.48,2.16,17.33-1.65,33.32-10.37,48.07a99.11,99.11,0,0,1-26,28.51,19.52,19.52,0,0,0-1.74,1.38,2.41,2.41,0,0,0-.65,2.52,2.38,2.38,0,0,0,2,1.88,15.83,15.83,0,0,0,2.18.07h76.54c.58,0,1.16,0,1.75,0,2.5,0,3.35.93,3.36,3.64q0,20.11,0,40.24c0,3.1-.77,3.88-3.79,3.88Z"/><path class="cls-1" d="M199.72,136.79v34.72c0,.62,0,1.23,0,1.84a1.6,1.6,0,0,1-1.63,1.75c-.58.05-1.16.05-1.75.05H135.05c-3.36,0-3.46-.11-3.46-3.57V138.24c0-.46,0-.92,0-1.38.1-1.53.42-1.89,1.82-2,.58,0,1.16,0,1.74,0h25.73c.58,0,1.17,0,1.75,0,1.44-.13,1.93-.64,2.05-2.13.05-.6,0-1.22,0-1.83V102.11c0-.61,0-1.22,0-1.83a1.55,1.55,0,0,1,1.65-1.71c.43,0,.87,0,1.31,0h29a11.49,11.49,0,0,1,1.31,0c1.23.13,1.6.54,1.71,1.9,0,.6,0,1.22,0,1.83Z"/>
 <path class="cls-1" d="M246.8,141.83V114.24c0-.54,0-1.07,0-1.61.11-1.79.73-2.49,2.37-2.67.5,0,1,0,1.52,0q19.64,0,39.26,0c3.68,0,4.2.55,3.89,4.45a59.68,59.68,0,0,1-8.55,26.25c-6.25,10.41-14.56,18.67-24.1,25.62-3.22,2.35-6.64,4.39-10,6.55a5.73,5.73,0,0,1-1.36.72,2.23,2.23,0,0,1-3-2,14.13,14.13,0,0,1,0-1.84Z"/><path class="cls-1" d="M430,231.54c-12.61,0-22.89-10.82-23-24.13s10.26-24.28,23-24.27,22.88,10.73,23,24.09S442.68,231.55,430,231.54Z"/><path class="cls-1" d="M39.89,207.38c0-13.46,10.2-24.26,23-24.24s22.88,10.78,22.92,24.12S75.59,231.45,63,231.54,39.93,220.84,39.89,207.38Z"/><path class="cls-1" d="M234.72,134.79v92.44c0,4-.27,4.31-4.09,4.31h-118c-.51,0-1,0-1.52,0A2.45,2.45,0,0,1,108.6,229c0-.53,0-1.07,0-1.6V188.05c0-.54,0-1.08,0-1.61.15-1.79.93-2.57,2.66-2.67.65,0,1.3,0,2,0H207c3.92,0,4.12-.21,4.12-4.24V90.31c0-2.43-.69-3.16-3-3.18-4.94,0-9.88,0-14.83,0a12.61,12.61,0,0,1-1.74,0,2.1,2.1,0,0,1-2-2.07,16,16,0,0,1,0-1.84V42c0-.46,0-.93,0-1.38.14-1.73.8-2.42,2.48-2.57.43,0,.87,0,1.31,0h37.5c.37,0,.73,0,1.09,0,2.09.1,2.73.76,2.8,2.91,0,.69,0,1.38,0,2.07Z"/>  <text x="25" y="510" fill="white" font-size="75px" font-weight="bold">EDUCATION</text>
</g></svg>


<svg id="logo2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 438 399"><defs><style>.cls-1{fill:#fff;}</style></defs><title>logo_svg_production</title><path class="cls-1" d="M290,200l-12.89,7.54,16.49,19.27-52.26,30L232.06,238l6.12-3.36c0-16.44,0-33.05,0-49.66,0-.86-.27-2.4-.64-2.47-7.42-1.44-4.32-7.67-5.24-11.84s-.77-8.32-1.14-13.12c8-1.91,15.92-3.92,23.89-5.58a4.85,4.85,0,0,1,3.93,1.84C269.32,169.07,279.53,184.39,290,200Zm-32.47,12.33-2.31,18.51,18.1-6.1Zm-.62-29.4v21.42l1.14.47,8.5-10.12Z"/><path class="cls-1" d="M203.2,204.34c0,14.6-.13,29.21.07,43.81.07,4.47-1.33,6.13-6,6.06-10.64-.15-10.6,0-10.59-10.72q0-40.8,0-81.61c0-7.08.42-7.5,7.3-7.49,9.14,0,9.15,0,9.15,9.42Q203.21,184.08,203.2,204.34Z"/><path class="cls-1" d="M209.68,204.58c0-14.64.18-29.27-.1-43.9-.09-4.92,1.69-6.72,6.37-6.26a22.42,22.42,0,0,0,3.84-.06c4.62-.33,6.39,1.49,6.36,6.39q-.28,43.63,0,87.26c0,4.94-1.79,6.66-6.44,6.12a15.91,15.91,0,0,0-3.84,0c-4.8.62-6.39-1.39-6.31-6.21C209.83,233.48,209.67,219,209.68,204.58Z"/><path class="cls-1" d="M182.32,166.87c-.09,7.12-5.16,12.58-11.65,12.55s-11.45-5.67-11.42-12.78,5.32-12.7,11.65-12.6S182.4,159.87,182.32,166.87Z"/><path class="cls-1" d="M182.31,241.22c-.09,6.91-5.55,12.82-11.69,12.66s-11.46-6.12-11.34-13c.12-7.14,5.15-12.48,11.69-12.44C177.33,228.49,182.4,234.2,182.31,241.22Z"/> <text x="100" y="320" fill="white" font-size="30px" font-weight="bold">PRODUCTIONS</text></svg>   

  
</div><p>





<!----- Comment Section ----->


<div id="comment-box">
   
 
   
</div>



<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <div class="overlay-content">
      <div id="book">
            <div style="background-color: blue;">Front Page</div>
            <div style="background-color: pink;">Page One</div>
            <div style="background-color: green;">Page Two</div>
            <div style="background-color: orange;">Page Four</div>
             <div style="background-color: purple;">Page Five</div>
             <div style="background-color: white;">Back Page</div>
               
        </div>
   
      
   </div>
   
</div>
  </div>
</div>


<script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
            
</script>

</main><!-- #site-content -->


<?php	
get_footer();
?>