<?php



function sanitazeFormUsername($inputText)
{
    // $inputText =  htmlspecialchars($inputText);
    $inputText =  strip_tags($inputText);
    $inputText =  trim($inputText);
    return $inputText;
}

function sanitazeFormString($inputText)
{

    $inputText =  strip_tags($inputText);
    $inputText =  trim($inputText);
    $inputText =  ucwords($inputText);
    return $inputText;
}

function sanitazeFormPassword($inputText)
{
    $inputText =  strip_tags($inputText);
}


function sanitazeFormEmail($inputText)
{
    $inputText =  strip_tags($inputText);
    $inputText =  trim($inputText);
    return $inputText;
}




if (isset($_POST['registerButton'])) {
    // echo "register button was press";
    $username = sanitazeFormUsername($_POST['username']);
    $firstName = sanitazeFormString($_POST['firstName']);
    $lastName = sanitazeFormString($_POST['lastName']);
    $email = sanitazeFormEmail($_POST['email']);
    $email2 = sanitazeFormEmail($_POST['email2']);
    $password = sanitazeFormPassword($_POST['password']);
    $password2 = sanitazeFormPassword($_POST['password2']);

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

    if ($wasSuccessful) {
        header("Location: index.php");
    }
    // $result = validateUsername($username);

    // echo $username;
}
