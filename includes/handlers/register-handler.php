<?php



function sanitazeFormUsername($inputText)
{
    $inputText =  htmlspecialchars($inputText);
    $inputText =  trim($inputText);
    return $inputText;
}

function sanitazeFormPassword($inputText)
{
    $inputText =  htmlspecialchars($inputText);
    return $inputText;
}

function sanitazeFormString($inputText)
{
    $inputText =  htmlspecialchars($inputText);
    $inputText =  trim($inputText);
    $inputText =  ucwords($inputText);
}




if (isset($_POST['registerButton'])) {
    // echo "register button was press";
    $username = sanitazeFormUsername($_POST['username']);
    $firstName = sanitazeFormString($_POST['firstName']);
    $lastName = sanitazeFormString($_POST['lastName']);
    $email = sanitazeFormString($_POST['email']);
    $email2 = sanitazeFormString($_POST['email2']);
    $password = sanitazeFormPassword($_POST['password']);
    $password2 = sanitazeFormPassword($_POST['password2']);

    $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

    if ($wasSuccessful) {
        header("Location: index.php");
    }
    // $result = validateUsername($username);

    // echo $username;
}
