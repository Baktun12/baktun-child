// Book Effects and page turning

jQuery(document).ready(function() {
      /* $("#book1").turn({
                width: 600,
                height: 500,
                autoCenter: true
            });
       
       $("#book2").turn({
                width: 600,
                height: 500,
                autoCenter: true
            });
            */

        //initialize swiper when document ready
        var mySwiper = new Swiper ('.swiper-container', {
          // Optional parameters
          direction: 'horizontal',
          loop: false,
          scrollbar: {
            el: '.swiper-scrollbar',
            hide: false,
          },
        })
});
  

function on() {
  document.getElementById("book1-overlay").style.display = "block";
    $("#book1").turn('page', 2);

}

function off() {
  document.getElementById("book1-overlay").style.display = "none";
}


function on2() {
  document.getElementById("book2-overlay").style.display = "block";
    $("#book2").turn('page', 2);

}

function off2() {
  document.getElementById("book2-overlay").style.display = "none";
}
