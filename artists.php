<?php include('./navbar.php');
require './phpDatabase/database.php'; ?>

<div class="main">
    <div class="contentArtists">
        <form method="get" id="artistForm">
            <div class="artists" id="artists">
                <div class="heading">Artists</div>
                <div class="artistsItems">
                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/adele-0zg-artist-chart-059-180x180.jpg" alt="poster ot found">
                        <a href="playSongs.php?id=adele"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">Adele</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>

                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/anderson-paak-kkp-180x180.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=anderson paak"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">Anderson Paak</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>

                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/eminem-180x180.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=eminem"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">Eminem</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>

                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/kanye-west-0wf-artist-chart-zee-180x180.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=kanye west"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">Kanye West</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>

                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/lil-nas-x-qv4-180x180.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=lil Nas"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">Lil Nas</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>

                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/taylor-swift-5wo-artist-chart-q3b-180x180.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=taylor swift"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">Taylor Swift</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>

                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/ed-sheeran-w3r-artist-chart-1li-180x180.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=ed sheeran"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">Ed Sheeran</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>

                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/the-weeknd-nsd-180x180.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=the weeknd"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">The Weeknd</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>


                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/adsf.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=xyz"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">xyz</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>
                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/sonu.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=sonu nigam"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">Sonu Nigam</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>
                    <div class="artistsItem">
                        <div class="Artistposter">
                            <img src="./assets/artists/shaan.jpg" alt="poster ot found">
                            <a href="playSongs.php?id=shaan"  class="playBtn" id="playBtn"><img src="./assets/logos/play-button.png" alt="not found"></a>   
                        </div>
                        <div class="posterDetails">
                            <span class="posterTitle">Shaan</span>
                            <span class="posterDesc">Artist</span>
                        </div>
                    </div>


                </div>

            </div>
        </form>

    </div>
   
    <script src="./artists.js"></script>
    <?php include './footer.php'; ?>
