<?php
/**
 * Copied form default index file
 * Podcast Page
 */

get_header();

?>
<style>
* {
  box-sizing: border-box;
}

#site-content{
  background-image: linear-gradient(
    0deg,
    rgba(4,4,4, 1) 23.8%,
    rgba(33, 109, 57, 1) 92%
  );
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-family: 'Lato', sans-serif;
  margin: 0;
  color: #fff;
}
#site-content > .sub {
    text-align: center;
    padding: 0 30px;
    font-size: .8em;
}

.music-container {
  background-color: #fff;
  border-radius: 15px;
  box-shadow: 0 20px 20px 0 rgba(115, 216, 123, 0.6);
  display: flex;
  padding: 20px 30px;
  position: relative;
  margin: 100px 0;
  z-index: 10;
}

.img-container {
  position: relative;
  width: 110px;
}

.img-container::after {
  content: '';
  background-color: #fff;
  border-radius: 50%;
  position: absolute;
  bottom: 100%;
  left: 50%;
  width: 20px;
  height: 20px;
  transform: translate(-50%, 50%);
}

.img-container img {
  border-radius: 50%;
  object-fit: cover;
  height: 110px;
  width: inherit;
  position: absolute;
  bottom: 0;
  left: 0;
  animation: rotate 3s linear infinite;

  animation-play-state: paused;
}

.music-container.play .img-container img {
  animation-play-state: running;
}

@keyframes rotate {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}

.navigation {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  z-index: 1;
}

button.action-btn {
  background-color: #fff;
  border: 0;
  color: #dfdbdf;
  font-size: 30px;
  cursor: pointer;
  padding: 10px;
  margin: 0 20px;
}

.action-btn span{
  font-size: 30px;
  margin-left: -5px;
}

.action-btn.action-btn-big{
margin-top: -15px;
}

.action-btn.action-btn-big span:before{
  color: #c3bac5;
  font-size: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding-left: 10px;
}

.action-btn:focus {
  outline: 0;
}

.music-info {
  background-color: rgba(255, 255, 255, 0.5);
  border-radius: 15px 15px 0 0;
  position: absolute;
  top: 0;
  left: 20px;
  width: calc(100% - 40px);
  padding: 10px 10px 10px 150px;
  opacity: 0;
  transform: translateY(0%);
  transition: transform 0.3s ease-in, opacity 0.3s ease-in;
  z-index: 0;
}

.music-info h6{
    font-size: .8rem;
    margin: 5px;
    color: #000;
}
.music-info p{
    font-size: 1rem;
    font-style: bold;
    margin: 0;
    color: #000;
    opacity: 0;
    height: 0;
    transition: height 0.3s ease-in, opacity 0.3s ease-in;
}

.music-info p.now-listening-to{
    opacity: 1;
    height: 100%;
}



.music-container.play .music-info {
  opacity: 1;
  transform: translateY(-100%);
}

.music-info h4 {
  margin: 0;
}

.progress-container {
  background: #fff;
  border-radius: 5px;
  cursor: pointer;
  margin: 10px 0;
  height: 4px;
  width: 100%;
}

.progress {
  background-color: #29c500;
  border-radius: 5px;
  height: 100%;
  width: 0%;
  transition: width 0.1s linear;
}

</style>
<main id="site-content" role="main">
<!-- Slider main container -->
<h1>B12 Live!</h1>
<p class="sub">Amidst the COVID-19 outbreak, Baktun12 comes together to bring you the voices of our partners and community, in the form of spoken word and audio theatre.</p>

    <div class="music-container" id="music-container">
      <div class="music-info">
        <h6 id="title">Ep.1 – Voces de nuestra Comunidad</h6>
        <div class="progress-container" id="progress-container">
          <div class="progress" id="progress"></div>
        </div>
        <p id="pod-listening-to">Now Listening to: B12 Live!</p>
        <b><p id="pod-featuring">Featuring: Airam Coronodo, Edgar Ibarra</p></b>
      </div>

      <audio src="<?php echo get_option( 'live-stream-link' ); ?>" id="audio">
        <p>
            Your browser doesn't support HTML5 audio.
            Here is a <a href="myAudio.mp4">link to download the audio</a> instead.
        </p>
      </audio>

      <div class="img-container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/music/podcast_cover_small.png" alt="music-cover" id="cover" />
      </div>
      <div class="navigation">
        <button id="rewind" class="action-btn">
            <span class="dashicons dashicons-undo"></span>
        </button>
        <button id="play" class="action-btn action-btn-big">
            <span class="dashicons dashicons-controls-play"></span>
        </button>
        <button id="skip" class="action-btn">
            <span class="dashicons dashicons-redo"></span>
        </button>
      </div>
    </div>


</main><!-- #site-content -->
<script>
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
</script>
<?php	
get_footer();
?>
