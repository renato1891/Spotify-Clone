<?php
include("includes\config.php");
// session_destroy();


if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("LOCATION: register.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Wellcome</title>
    <link rel="stylesheet" href="assets\css\style.css">
</head>

<body>
    <div id="nowPlayingBarContainer">
        <div id="nowPlayingBar">
            <div id="nowPlayingLeft">
                <div class="content">
                    <span class="albumLink">
                        <img src="https://i.pinimg.com/originals/27/56/e6/2756e6e14a8206f3a702558bec753661.jpg" class="albumArtwork">
                    </span>

                    <div class="trackInfo">
                        <span class="trackName">
                            <span>Happy</span>
                        </span>
                        <span class="artistName">
                            <span>Renato Boaventura</span>
                        </span>
                    </div>
                </div>
            </div>
            <div id="nowPlayingCenter">
                <div class="content playerControls">
                    <div class="buttons">
                        <button class="controlButton shuffle" title="Shuffle button">
                            <img src="assets\images\icons\shuffle.png" alt="Shuffle">
                        </button>
                        <button class="controlButton previous" title="Previous button">
                            <img src="assets\images\icons\previous.png" alt="Previous">
                        </button>
                        <button class="controlButton play" title="Play button">
                            <img src="assets\images\icons\play.png" alt="Play">
                        </button>
                        <button class="controlButton pause" title="Pause button" style="display: none;">
                            <img src="assets\images\icons\pause.png" alt="Pause">
                        </button>
                        <button class="controlButton next" title="Next button">
                            <img src="assets\images\icons\next.png" alt="Next">
                        </button>
                        <button class="controlButton repeat" title="Repeat button">
                            <img src="assets\images\icons\repeat.png" alt="Repeat">
                        </button>
                    </div>
                    <div class="playbackBar">
                        <span class="progressTime current">0.00</span>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                        <span class="progressTime remaining">0.00</span>
                    </div>
                </div>
            </div>
            <div id="nowPlayingRight">
                <div class="volumeBar">
                    <button class="controlButton" title="Volume button">
                        <img src="assets\images\icons\volume.png" alt="Volume">
                    </button>
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>