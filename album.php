<?php include './navbar.php';
require('./phpDatabase/database.php'); ?>
<div class="main">
    <div class="contentAlbum">
        <div class="albums" id="albums">
            <div class="albumTitle">Albums</div>
            <div class="albumItems">
                <?php
                $sql = "SELECT * FROM `albums`";
                $albums = array();
                $result = mysqli_query($conn, $sql);
                while ($album = mysqli_fetch_assoc($result)) {
                    $albums[] = $album;
                }
                $count = 0;
                foreach ($albums as $album) {
                    $count++;
                    echo '
                         <div class="albumItem">
                         <div class="poster">
                             <img src="./assets/posters/80Romance.jpg" alt="poster ot found">
                             <a href="playSongs.php?id=' . $album["artistName"] . '" class="playBtn" id="playBtn" ><img src="./assets/logos/play-button.png" alt="not found"></a>
                         </div>
                         <div class="posterDetails">
                             <span class="posterTitle">' . $album["albumName"] . '</span>
                             <span class="posterDesc">Album • <span class="albumArtist">' . $album["artistName"] . '</span>
                             </span>
                         </div>
                     </div>
                         ';
                }
                ?>
                <!-- <div class="albumItem">
                    <div class="poster">
                        <img src="./assets/posters/80Romance.jpg" alt="poster ot found">
                        <a href="playSongs?id=" class="playBtn" id="romance" ><img src="./assets/logos/play-button.png" alt="not found"></a>
                    </div>
                    <div class="posterDetails">
                        <span class="posterTitle">Dushman Zamana
                        </span>
                        <span class="posterDesc">Album • <span class="albumArtist">Udit Narayan
                            </span>
                        </span>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<script src="./album.js"></script>
<?php include './footer.php'; ?>
