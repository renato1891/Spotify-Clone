<?php
include("includes\config.php");
include("includes\classes\Constants.php");
include("includes\classes\Account.php");
$account = new Account($con);
include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Spotify</title>
    <link rel="stylesheet" type="text/css" href="assets\css\register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets\js\register.js"></script>
</head>

<body>

    <?php
    if (isset($_POST['registerButton'])) {
        echo '  <script>
                    $(document).ready(function() {
                    $("#loginForm").hide();
                    $("#registerForm").show();
                    });
            </script>';
    } else {
        echo '  <script>
                $(document).ready(function() {
                $("#loginForm").show();
                $("#registerForm").hide();
                });
                </script>';
    }
    ?>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername"> Username: </label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g bartSimpson" required>
                    </p>
                    <p>
                        <label for="loginPassword"> Password: </label>
                        <input id="loginPassword" name="loginPassword" type="password" required>
                    </p>
                    <button type="submit" name="loginButton">LOG IN</button>
                    <div class="hasAccountText">
                        <!-- <a href="#"></a> -->
                        <span id="hideLogin">Don't have an account yet? Signup here.</span>
                    </div>
                </form>

                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create your free account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameInvalid); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="username"> Username </label>
                        <input id="username" name="username" type="text" placeholder="e.g bartSimpson" value="<?php getInputValue('username') ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$firstNameInvalid); ?>
                        <label for="firstName"> First name </label>
                        <input id="firstName" name="firstName" type="text" placeholder="e.g Bart" value="<?php getInputValue('firstName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameInvalid); ?>
                        <label for="lastName"> Last name </label>
                        <input id="lastName" name="lastName" type="text" placeholder="e.g Simpson" value="<?php getInputValue('lastName') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNoMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="email"> Email </label>
                        <input id="email" name="email" type="email" placeholder="e.g bart@gmail.com" value="<?php getInputValue('email') ?>" required>
                    </p>
                    <p>
                        <label for="email2"> Confirm email </label>
                        <input id="email2" name="email2" type="email" placeholder="e.g bart@gmail.com" value="<?php getInputValue('email2') ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$passwordInvalid); ?>
                        <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                        <label for="password"> Password </label>
                        <input id="password" name="password" type="password" placeholder="Your pasword" required>
                    </p>

                    <p>
                        <label for="password2"> Confirm password </label>
                        <input id="password2" name="password2" type="password" placeholder="Your pasword" required>
                    </p>
                    <button type="submit" name="registerButton">SIGN UP</button>

                    <div class="hasAccountText">
                        <!-- <a href="#"></a> -->
                        <span id="hideRegister">Already have an account? Log in here.</span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>