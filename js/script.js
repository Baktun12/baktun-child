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

        //random hights for grid
        var boxes = $(".info-card");
        boxes.addClass(function( index ) {
          var sizes = ['260', '240', '280'];
          return "box-height-" + sizes[Math.floor(Math.random() * 3)];
        });

        //AJAX for modal for post content
        $('.ajax').click(function(e) {
          e.preventDefault();
          this.blur(); // Manually remove focus from clicked link.
          $.get(this.href, function(res) {
          let modal = document.createElement('div');
          modal.classList.add('modal');
          let title = (typeof res.title === 'object') ? res.title.rendered : res.title;
          let content = ( typeof res.description == 'undefined') ? res.content.rendered : res.description;          
          let newContent = `<h2>${title}</h2><p>${content}</p>`;
          modal.innerHTML= newContent;
          let modalWrapper = document.getElementById('modal-content');
          modalWrapper.appendChild(modal);
          }).done( function (){
            $('#modal-content > .modal').modal();
          }); 
        });
        //mobile translation button
        if (document.querySelector(".wpml-ls-native") != null) {
        let translationLink = document.querySelector(".wpml-ls-native").parentElement.href;
        let translationNode = document.querySelector(".translate-link");
        translationNode.href = translationLink; 
        }
        
        //initialize swiper when document ready
        //desktop view adjust
        let sliderAdjust =  function(){
          let w = document.documentElement.clientWidth;
          if( w > 1000 ){
            var mySwiper = new Swiper ('.swiper-container', {
              // Optional parameters
              direction: 'horizontal',
              loop: false,
              slidesPerView:2,
              scrollbar: {
                el: '.swiper-scrollbar',
                hide: false,
              },
            });
          } else {
            var mySwiper = new Swiper ('.swiper-container', {
              // Optional parameters
              direction: 'horizontal',
              loop: false,
              slidesPerView:1,
              scrollbar: {
                el: '.swiper-scrollbar',
                hide: false,
              },
            });
          }
        };
        window.addEventListener("resize", sliderAdjust);
        sliderAdjust();
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
