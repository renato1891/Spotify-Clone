<?php
class Account
{

    private $errorArray;

    public function __construct()
    {
        $this->errorArray = array();
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
            return true;
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

    private function validateUsername($un)
    {
        if (strlen($un) >25 || strlen($un) < 5) {
          
            array_push($this->errorArray, Constants::$usernameInvalid);
            return;
        }

        // TODO: check if username exist

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

        // TODO: check that username hasn't already been udes 

    }

    private function validatePasswords($pw, $pw2)
    {
        if ($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordsDoNoMatch);
            return;
        }
        // $regex = "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=[#?!@$%^*-]).{8,20}$";
        $regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z!@#$%]{8,20}$/';
        $a = preg_match($regex, $pw);
        if (!preg_match($regex, $pw)) {
            array_push($this->errorArray, Constants::$passwordInvalid);
            return;
        }
    }
}
