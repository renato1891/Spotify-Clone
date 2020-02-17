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

    public function getError(){
        
    }

    private function validateUsername($un)
    {
        if (strlen($un > 25) || strlen($un < 5)) {
            array_push($this->errorArray, "Your name must be between 5 and 25 characters");
            return;
        }
        // TODO: check if username exist

    }

    private function validateFirstName($fn)
    {
        if (strlen($fn > 25) || strlen($fn < 2)) {
            array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
            return;
        }
    }

    private function validateLastName($ln)
    {
        if (strlen($ln > 25) || strlen($ln < 2)) {
            array_push($this->errorArray, "Your last name must be between 2 and 25 characters");
            return;
        }
    }

    private function validateEmails($em, $em2)
    {
        if ($em != $em2) {
            array_push($this->errorArray, "Your emails don't mtach");
            return;
        }
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, "Email is invalid");
            return;
        }

        // TODO: check that username hasn't already been udes 

    }

    private function validatePasswords($pw, $pw2)
    {
        if ($pw != $pw2) {
            array_push($this->errorArray, "Your passwords don't mtach");
            return;
        }
        // $regex = "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=[#?!@$%^*-]).{8,20}$";
        $regex = "^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z!@#$%]{8,20}$";
        if (preg_match($regex, $pw)) {
            echo "entrou";
            array_push($this->errorArray, "Invalid Password. Your password must be at least 8 character long and contain the following: 1 Uppercase letter, 1 lowercase letter, and 1 number.  It can contain the charcters #?!@$%^&*-");
            return;
        }
    }
}
