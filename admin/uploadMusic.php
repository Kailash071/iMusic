<?php include("./upload.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Music</title>
    <link rel="stylesheet" href="./uploadMusic.css">
</head>

<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data" id="uploadMusicForm">
            <div class="formContent">
                <div class="form-label">
                    <h1>iMusic - Admin Control</h1>
                    <span>Upload Music</span>
                </div>
                <div class="form-controls">
                    <label for="Title">Song Title</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="form-controls">
                    <label for="artistsName">Artist Name</label>
                    <input type="text" name="artistName" id="artistName">
                </div>
                <!-- <div class="form-controls">
                    <label for="trackTime">Track Time</label>
                    <input type="text" name="trackTime" id="trackTime">
                </div> -->
                <div class="form-controls">
                    <label for="file">Song File</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="form-buttons">
                    <input type="submit" value="Upload" name="upload" id="upload">
                    <button name="reset" id="reset">Reset</button>
                </div>
            </div>
        </form>
        <div class="messageCardSuccess" id="messageCardSuccess">
            <div class="card">
                <img src="../assets/logos/checked.png" alt="not found">
                   <!-- 128px -->
            </div>
        </div>
        <div class="messageCardFailure" id="messageCardFailure">
            <div class="card">
                <img src="../assets/logos/cancel (2).png" alt="not found">
                   <!-- 128px -->
            </div>
        </div>
        <div class="messageCardError" id="messageCardError">
            <div class="card">
                <img src="../assets/logos/warning (2).png" alt="not found">
                <!-- 128px -->
            </div>
        </div>
    </div>
    <!-- <script src="./uploadMusic.js"></script> -->
</body>
</html>
<!-- <script src="./spotify-web-api.js"></script>
<script>
    var spotifyApi = new SpotifyWebApi();
    spotifyApi.setAccessToken('8bd1fa30abe44e7690039c3a296f921c');
    
    // get Elvis' albums, passing a callback. When a callback is passed, no Promise is returned
    spotifyApi.getArtistAlbums('43ZHCT0cAZBISjO8DG9PnE', function(err, data) {
        if (err) console.error(err);
        else console.log('Artist albums', data);
    });
    spotifyApi.getArtistAlbums('43ZHCT0cAZBISjO8DG9PnE').then(
  function (data) {
    console.log('Artist albums', data);
  },
  function (err) {
    console.error(err);
  }
);
</script> -->