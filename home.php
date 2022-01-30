<?php include './navbar.php'; ?>
<?php require './phpDatabase/database.php'; ?>
<div class="main">
   <!-- <link type="text/css" rel="stylesheet" href="magicscroll/magicscroll.css" />
   <script type="text/javascript" src="magicscroll/magicscroll.js"></script> -->

   <div class="contentMusic">
      <div class="musics">
         <?php
         $sql = "SELECT * FROM `musics` WHERE artistName='eminem' OR artistName='taylor swift' LIMIT 8";
         $songs = array();
         $result = mysqli_query($conn, $sql);
         while ($song = mysqli_fetch_assoc($result)) {
            $songs[] = $song;
         }
         $count = 0;
         foreach ($songs as $song) {
            $count++;
            echo ' <div class="music" >
               <span class="title" onclick="playMe('.$count.')">' . $song['title'] . '</span>
                <div class="btns" id="btns">
                <a href="uploadedMusics/' . $song["songFilePath"] . '"  class="downloadSong" id="downloadSong" download><img src="./assets/logos/download.png" alt="not found"></a>              
            </div>
               </div>';
            }
            ?>
             <!-- <div class="btns" id="btns">
               <button onclick="pauseMe()"  id="pauseBtn"><img src="./assets/logos/icons8-pause-24.png" alt="not found"></button>
               <button   id="playBtn"><img src="./assets/logos/icons8-playBlue-24.png" alt="not found"></button>              
            </div> -->

      </div>
      <div class="mainPlayerBar" id="mainPlayerBar">
        <div class="progressBar">
            <input type="range" name="range" id="myProgressBar" min="0" max="100" value="0">
        </div>
        <div class="icons">
            <img src="./assets/logos/icons8-back-arrow-32.png" id="backSong" alt="not found">
            <img src="./assets/logos/icons8-circled-play-32.png" id="playSong" alt="not found">
            <img src="./assets/logos/icons8-pause-button-32.png" id="pauseSong" alt="not found">
            <img src="./assets/logos/icons8-forward-button-32.png" id="nextSong" alt="not found">
        </div>
        <div class="songInfo">
            <img src="./assets/logos/playing.gif" width="42px" alt="gif not found" id="songGif">
            <span id="masterSongName"> </span><span>-</span><span id="masterSongArtist"></span>
        </div>
    </div>
      <script>
         const btns = document.querySelector('#btns')
         // Initialize the Variables
         let songIndex = 0;
        let masterPlaySong = document.getElementById('playSong');
        let masterPauseSong = document.getElementById('pauseSong');
        let masterBackSong = document.getElementById('backSong');
        let masterNextSong = document.getElementById('nextSong');
        let myProgressBar = document.getElementById('myProgressBar');
        let gif = document.getElementById('songGif');
        let masterSongName = document.getElementById('masterSongName');
        let masterSongArtist = document.getElementById('masterSongArtist');
         const mainPlayerBar = document.querySelector('#mainPlayerBar')
         mainPlayerBar.style.display = "none"
         const songFolder = './uploadedMusics/';
         const audioElement = new Audio();
         const songs = <?php echo json_encode($songs) ?>;
         //console.log(songs.length)
         console.log(songs)

               //playing particular song
        function playMe(count) {
            const song_count = count
            audioElement.src = `./uploadedMusics/${songs[song_count-1].songFilePath}`;
            audioElement.play();
            masterPlaySong.style.display = "none"
            masterPauseSong.style.display = "block"
            mainPlayerBar.style.display = "flex"
            gif.style.opacity = 1;
            masterSongName.innerText = songs[song_count-1].title;
            masterSongArtist.innerHTML = songs[song_count-1].artistName;
            console.log("music playing..:" + audioElement.src)
        }

        // Handle play/pause click
        masterPlaySong.addEventListener('click', () => {
            if (audioElement.paused || audioElement.currentTime <= 0) {
                audioElement.play();
                masterPlaySong.style.display = "none"
                masterPauseSong.style.display = "block"
                gif.style.opacity = 1;
                mainPlayerBar.style.display = "flex"
            }
        })
        masterPauseSong.addEventListener('click', () => {
            if (audioElement.played || audioElement.currentTime >= 0) {
                audioElement.pause();
                masterPlaySong.style.display = "block"
                masterPauseSong.style.display = "none"
                gif.style.opacity = 0;
                mainPlayerBar.style.display = "none"
            }
        })
        // Listen to Events
        audioElement.addEventListener('timeupdate', () => {
            // Update Seekbar
            progress = parseInt((audioElement.currentTime / audioElement.duration) * 100);
            myProgressBar.value = progress;
        })

        myProgressBar.addEventListener('change', () => {
            audioElement.currentTime = myProgressBar.value * audioElement.duration / 100;
        })


        masterNextSong.addEventListener('click', () => {
            if (songIndex >= songs.length) {
                songIndex = 0
            } else {
                songIndex += 1;
            }

            audioElement.src = `./uploadedMusics/${songs[songIndex].songFilePath}`;
            console.log(audioElement.src)
            masterSongName.innerText = songs[songIndex].title;
            masterSongArtist.innerHTML = songs[songIndex].artistName;
            console.log(masterSongName)
            audioElement.currentTime = 0;
            audioElement.play();
            masterPlaySong.style.display = "none"
            masterPauseSong.style.display = "block"
            mainPlayerBar.style.display = "flex"
        })

        masterBackSong.addEventListener('click', () => {
            if (songIndex <= 0) {
                songIndex = 0
            } else {
                songIndex -= 1;
            }
            audioElement.src = `./uploadedMusics/${songs[songIndex].songFilePath}`;
            masterSongName.innerText = songs[songIndex].title;
            masterSongArtist.innerHTML = songs[songIndex].artistName;
            audioElement.currentTime = 0;
            audioElement.play();
            masterPlaySong.style.display = "none"
            masterPauseSong.style.display = "block"
            mainPlayerBar.style.display = "flex"

        })

      </script>
      <!-- <div class="photos">
         <img src="./assets/images/arijitSingh.jpg" alt="not found">
         <img src="./assets/images/nehaKakkar.jpg" alt="not found">
         <img src="./assets/images/kk.jpg" alt="not found">
         <img src="./assets/images/selena.jpg" alt="not found">
      </div> -->
   </div>

   <div class="mixCharts">
      <div class="heading">
         Playlists and charts <br> that keeps you in the mix.
      </div>
      <div class="cardsLists">
         <div class="title">
            <button>New Music</button>
            <button>We Recommend</button>
            <button>Daily Top</button>
         </div>
         <!-- class="cards MagicScroll" data-options="speed: 2400; autoplay: 1000; items: 4;" -->
         <div class="cards">
            <div class="card">
               <a href="./album.php"> <img src="./assets/posters/pop.jpg" alt="poster not found">
                  <div class="cardDetails">
                     <span>Pop</span>
                     <p>iMusic Pop</p>
                  </div>
               </a>
            </div>
            <div class="card"><a href="./album.php">
                  <img src="./assets/posters/hip.jpg" alt="poster not found">
                  <div class="cardDetails">
                     <span>Hip-hop</span>
                     <p>iMusic Hip-hop</p>
                  </div>
               </a>
            </div>
            <div class="card"><a href="./album.php">
                  <img src="./assets/posters/rock.jpg" alt="poster not found">
                  <div class="cardDetails">
                     <span>Rock</span>
                     <p>iMusic Rock</p>
                  </div>
               </a>
            </div>
            <div class="card"><a href="./album.php">
                  <img src="./assets/posters/pop.jpg" alt="poster not found">
                  <div class="cardDetails">
                     <span>Pop</span>
                     <p>iMusic Pop</p>
                  </div>
               </a>
            </div>
            <!-- <div class="card"><a href="">
            <img src="./assets/posters/hip.jpg" alt="poster not found">
               <div class="cardDetails">
                  <span>Hip-hop</span>
                  <p>iMusic Hip-hop</p>
               </div>
            </a>
            </div>
          
            <div class="card"><a href="">
            <img src="./assets/posters/hip.jpg" alt="poster not found">
               <div class="cardDetails">
                  <span>Hip-hop</span>
                  <p>iMusic Hip-hop</p>
               </div>
            </a>
            </div> -->

         </div>
      </div>
   </div>

   <div class="phoneCover"></div>

   <div class="artistsPhoto">
      <img src="./assets/images/artistsPhoto.png" alt="not found">
      <div class="btn">
         <span>Listen to every artists</span>
         <button><a href="./artists.php">Let's Go</a></button>
      </div>
   </div>
   <div class="scrollTopBtn">
      <button id="scrollBtn"><img src="./assets/logos/up-arrow.png" alt="arrow img not found" class="imgArrowTop">
         <img src="./assets/logos/icons8-double-up.gif" alt="gif not found" class="gifArrowTop">
      </button>

   </div>
  
</div>
<script src="./home.js"></script>
<?php include './footer.php'; ?>