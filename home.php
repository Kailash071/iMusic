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
            echo ' <div class="music" onclick="playMe('.$count.')">
               <span class="title">' . $song['title'] . '</span>
                <div class="btns" id="btns">
               <button   id="downloadSong"><img src="./assets/logos/download.png" alt="not found"></button>              
            </div>
               </div>';
            }
            ?>
             <!-- <div class="btns" id="btns">
               <button onclick="pauseMe()"  id="pauseBtn"><img src="./assets/logos/icons8-pause-24.png" alt="not found"></button>
               <button   id="playBtn"><img src="./assets/logos/icons8-playBlue-24.png" alt="not found"></button>              
            </div> -->

      </div>
      <script>
         const btns = document.querySelector('#btns')
         const pauseBtn = document.querySelector('#pauseBtn')
                  
         const songFolder = './uploadedMusics/';
         const audioElement = new Audio();
         const songs = <?php echo json_encode($songs) ?>;
         //console.log(songs.length)
         console.log(songs)

         function playMe(count) {
            const song_count =count
            audioElement.src = `./uploadedMusics/${songs[song_count-1].songFilePath}`;
            audioElement.play();
           // btns.style.display = "flex"
            //pauseBtn.style.display = "block";
            console.log("music playing..:"+audioElement.src)
         }


         function pauseMe(count) {
            const song_count =count
            audioElement.pause();
           // pauseBtn.style.display = "none";
            console.log("music paused :"+audioElement.src)
            
         }
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