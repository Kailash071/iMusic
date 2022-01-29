<?php require('./phpDatabase/database.php'); ?>
<?php include('./navbar.php'); ?>
<div class="main">

    <div class="playlistContent" id="playlistContent">
        <div class="artistsPlayList" id="artistsPlayList">
            <div class="artistName" id="artistName"><?php echo $_REQUEST['id']; ?></div>
            <div class="artistSongs" id="artistSongs">
                <div class="songHeading">
                    <div class="songName" id="songName">Song No.</div>
                    <div class="songName" id="songName">Song Name</div>
                    <div class="songArtist" id="songArtist">Artist Name</div>
                    <div class="downloadBtn" id="downloadBtn">Download</div>
                    <div class="moreOptions" id="moreOptions"></div>
                </div>
                <?php
                $idName = $_REQUEST['id'];
                //  echo $idName;
                if ($idName != null) {
                    $sql = "SELECT * FROM `musics` WHERE artistName='$idName' or genre='$idName' ";
                    $songs = array();
                    $result = mysqli_query($conn, $sql);
                    while ($song = mysqli_fetch_assoc($result)) {
                        $songs[] = $song;
                    }
                    $count = 0;
                    foreach ($songs as $song) {
                        $count++;
                        echo ' <div class="song" id="song" onclick="playMe(' . $count . ')">
                        <div class="songNo" id="songNo">' . $count . '</div>
                        <div class="songName" id="songName">' . $song["title"] . '</div>
                        <div class="songArtist" id="songArtist">' . $song["artistName"] . '</div>
                        <div class="downloadBtn">
                        <button   class="downloadSong" id="downloadSong"><img src="./assets/logos/download.png" alt="not found"></button>              
                        </div>
                        <div class="moreOptions" id="moreOptions">
                        <button   class="downloadSong" id="downloadSong"><img src="./assets/logos/more.png" alt="not found"></button>              
                        </div>
                      
                    </div>';
                    }
                    //     <div class="songPlayBtn" id="songPlayBtn">
                    //     <button id="' . $count . '" class="playBtn" name="songItemPlay"><img src="./assets/logos/icons8-playBlue-24.png" alt="not found"></button>
                    //     <button id="' . $count . '" class="pauseBtn" name="songItemPlay"><img src="./assets/logos/icons8-pause-24.png" alt="not found"></button>
                    // </div>
                }
                ?>
            </div>
        </div>
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
                mainPlayerBar.style.display = "flex"
        const songFolder = './uploadedMusics/';
        let audioElement = new Audio(songFolder + '<?php echo $songs[0]["songFilePath"] ?>');
        masterSongName.innerHTML = "<?php echo $songs[0]["title"] ?>";
        masterSongArtist.innerHTML = "<?php echo $songs[0]["artistName"] ?>";
        const songs = <?php echo json_encode($songs) ?>;
        //console.log(songs.length)
        console.log(songs)

        // console.log(songFolder + '<?php echo $songs[0]["songFilePath"] ?>')

        //playing particular song
        function playMe(count) {
            const song_count = count
            audioElement.src = `./uploadedMusics/${songs[song_count-1].songFilePath}`;
            audioElement.play();
            masterPlaySong.style.display = "none"
            masterPauseSong.style.display = "block"
            gif.style.opacity = 1;
            mainPlayerBar.style.display = "flex"
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
                mainPlayerBar.style.display = "flex"
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

        // const playBtn = document.querySelector('#playBtn')


        // const makeAllPlays = () => {
        //     Array.from(document.getElementsByName('songItemPlay')).forEach((element) => {
        //         element.classList.remove('fa-pause-circle');
        //         element.classList.add('fa-play-circle');
        //     })
        // }

        // Array.from(document.getElementsByClassName('songItemPlay')).forEach((element) => {
        //     element.addEventListener('click', (e) => {
        //         makeAllPlays();
        //         songIndex = parseInt(e.target.id);
        //         // e.target.classList.remove('fa-play-circle');
        //         // e.target.classList.add('fa-pause-circle');
        //         audioElement.src = `./uploadedMusics/${songs[songIndex].songFilePath}`;
        //     masterSongName.innerText = songs[songIndex].title;
        //     masterSongArtist.innerHTML = songs[songIndex].artistName;
        //         audioElement.currentTime = 0;
        //         audioElement.play();
        //         gif.style.opacity = 1;
        //         masterPlaySong.style.display = "none"
        //         masterPauseSong.style.display = "block"
        //     })
        // })
    </script>