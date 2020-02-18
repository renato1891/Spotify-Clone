<?php
class Account
{
    private $con;
    private $errorArray;

    public function __construct($con)
    {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function login($un, $pw)
    {
        $pw = md5($pw);

        $query = mysqli_query($this->con, "select * from users where username='$un' and password = '$pw'");

        if (mysqli_num_rows($query) == 1) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    public function register($username, $firstName, $lastName, $email, $email2, $password, $password2)
    {

        $this->validateUsername($username);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $email2);
        $this->validatePasswords($password, $password2);

        if (empty($this->errorArray)) {
            //Insert into db
            return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
        } else {

            return false;
        }
    }

    public function getError($error)
    {
        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($un, $fn, $ln, $email, $pw)
    {
        $encryptedPw = md5($pw);
        $profilePic = "assets\images\profile-pics\head_emerald.png";
        $date = date("Y-m-d");

        // echo ' '.$un.' '. $fn. ' '. $ln . ' ' .  $email. ' '. $encryptedPw;
        $result = mysqli_query($this->con, "INSERT INTO users VALUES ('','$un','$fn','$ln','$email','$encryptedPw','$date','$profilePic')");
        // echo "Error: " . mysqli_error($this->con);
        return $result;
    }

    private function validateUsername($un)
    {
        if (strlen($un) > 25 || strlen($un) < 5) {

            array_push($this->errorArray, Constants::$usernameInvalid);
            return;
        }


        $checkUsernameQuery = mysqli_query($this->con, "select username from users where username = '$un'");

        if (mysqli_num_rows($checkUsernameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
    }

    private function validateFirstName($fn)
    {
        if (strlen($fn) > 25 || strlen($fn) < 2) {
            array_push($this->errorArray, Constants::$firstNameInvalid);
            return;
        }
    }

    private function validateLastName($ln)
    {

        if (strlen($ln) > 25 || strlen($ln) < 2) {
            array_push($this->errorArray, Constants::$lastNameInvalid);
            return;
        }
    }

    private function validateEmails($em, $em2)
    {
        if ($em != $em2) {
            array_push($this->errorArray, Constants::$emailsDoNoMatch);
            return;
        }
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $checkEmailQuery = mysqli_query($this->con, "select email from users where email = '$em'");

        if (mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }
    }

    private function validatePasswords($pw, $pw2)
    {
        if ($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDoNoMatch);
            return;
        }
        // $regex = "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=[#?!@$%^*-]).{8,20}$";
        $regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z!@#$%]{8,20}$/';
        if (!preg_match($regex, $pw)) {
            array_push($this->errorArray, Constants::$passwordInvalid);
            return;
        }
    }
}
