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

        // Music Player for Podcasts
        const musicContainer = document.getElementById('music-container');
        const playBtn = document.getElementById('play');
        const rewindBtn = document.getElementById('rewind');
        const skipBtn = document.getElementById('skip');

        const audio = document.getElementById('audio');
        const progress = document.getElementById('progress');
        const progressContainer = document.getElementById('progress-container');

        const nowListeningTo = document.getElementById('pod-listening-to');
        const nowFeaturing = document.getElementById('pod-featuring');

        let piece1 = {
          name : 'Them ALL Crazy',
          featuring : ['Diana Castillo', 'La Sofa Queen', 'El Gigante', 'Chui Ramirez']
        }

        let piece2 = {
          name : 'La MILPA',
          featuring : ['Airam Coronado', 'Edgar Ibarra']
        }

        let piece3 = {
          name : 'El Verano de 1993',
          featuring : ['Carolina Perez']
        }

        let piece4 = {
          name : 'Rap de T.V.',
          featuring : ['Diana Castillo', 'La Sofa Queen', 'El Gigante',]
        }

        // Play song
        function playSong() {
          musicContainer.classList.add('play');
          playBtn.querySelector('span.dashicons').classList.remove('dashicons-controls-play');
          playBtn.querySelector('span.dashicons').classList.add('dashicons-controls-pause');

          audio.play();
        }

        // Pause song
        function pauseSong() {
          musicContainer.classList.remove('play');
          playBtn.querySelector('span.dashicons').classList.add('dashicons-controls-play');
          playBtn.querySelector('span.dashicons').classList.remove('dashicons-controls-pause');

          audio.pause();
        }
        // Rewind
        function rewindSong() {
          let currentTime = audio.currentTime;
          if ( currentTime - 15 > 0 ){
            audio.currentTime = currentTime - 15;
            playSong();
          } else {
            audio.currentTime = 0;
            playSong();
          }
        } 

        // Skip
        function skipSong() {
          let currentTime = audio.currentTime;
          let durationTime = audio.duration;
          if ( currentTime < durationTime ){
            audio.currentTime = currentTime + 15;
            playSong();
          } else {
            audio.currentTime = 0;
            playSong();
          }
        } 

        function addPieceInfo(piece) {
          nowListeningTo.innerText = `Now Listening to: ${piece.name}`;
          nowFeaturing.innerText = (piece.featuring.length > 1) ? `Featuring: ${piece.featuring.join(', ')}`: `Feauring: ${piece.featuring[0]}`;
        }

        function updatePieceInfo(currentTime){
          if( currentTime < 416 && currentTime > 120  ) { //Them All Crazy
            addPieceInfo(piece1);
            nowListeningTo.classList.add('now-listening-to');
            nowFeaturing.classList.add('now-listening-to');
          } else if ( currentTime < 763 && currentTime > 455 ){ //La Milpa
            addPieceInfo(piece2);
            nowListeningTo.classList.add('now-listening-to');
            nowFeaturing.classList.add('now-listening-to');
          }else if ( currentTime < 1462 && currentTime > 888){ // Verano de 1993
            addPieceInfo(piece3);
            nowListeningTo.classList.add('now-listening-to');
            nowFeaturing.classList.add('now-listening-to');
          }else if ( currentTime < 1781 && currentTime > 1520){ // Rap de T.V.
            addPieceInfo(piece4);
            nowListeningTo.classList.add('now-listening-to');
            nowFeaturing.classList.add('now-listening-to');
          } else {
            nowListeningTo.classList.remove('now-listening-to');
            nowFeaturing.classList.remove('now-listening-to');
          } 
        }

        // Set progress bar
        function setProgress(e) {
          const width = this.clientWidth;
          const clickX = e.offsetX;
          const duration = audio.duration;

          audio.currentTime = (clickX / width) * duration;
        }

        // Update progress bar
        function updateProgress(e) {
          const { duration, currentTime } = e.srcElement;
          const progressPercent = (currentTime / duration) * 100;
          progress.style.width = `${progressPercent}%`;
          // Song info Update
          updatePieceInfo(currentTime); //Them All Crazy
        
        }

        // Event listeners
        playBtn.addEventListener('click', () => {
          const isPlaying = musicContainer.classList.contains('play');

          if (isPlaying) {
            pauseSong();
          } else {
            playSong();
          }
        });

        // Time/song update
        audio.addEventListener('timeupdate', updateProgress);

        // Click on progress bar
        progressContainer.addEventListener('click', setProgress);

        // Skip and Rewind song
        rewindBtn.addEventListener('click', rewindSong);
        skipBtn.addEventListener('click', skipSong);

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
