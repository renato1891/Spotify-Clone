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

            </div>
            <div id="nowPlayingCenter">

            </div>
            <div id="nowPlayingRight">


            </div>
        </div>
    </div>
</body>

</html>