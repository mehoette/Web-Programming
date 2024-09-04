<?php
class UserAuthenticator
{
    //we have a hardcoded "correct" password. obviously in a real site you would have a database with logins for each user
    public $username = "David";//this is the second most common username (the first is ยศกร which is title or rank in Thai, but that's harder to type)
    public $password = "123456";//this is the most common password

    public function startSession(){
        session_start(); //start the session
        if(!isset($_SESSION['loggedIn'])) { //if the session hasn't been started before, set the loggedIn session to false
            $_SESSION['loggedIn'] = false; //if they haven't started the session, they couldn't have been here to log in.
        }
    }

    public function isLoggedIn(){ //if you're logged in, return true
        return $_SESSION['loggedIn'];
    }//end isLoggedIn

    public function authenticate($username, $password){
        if($this->username == $username && $this->password == $password){ //if the username and password line up
            return true;
        }//end if same username & password
        else{
            return false;
        }//end else
    }//end authenticate function

    public function logUserIn(){
        $_SESSION['loggedIn'] = true; //mark that they're logged in
        header('Location: '.'index.php'); //redirect them to the index page
        
    }//end logUserIn

    public function logUserOut(){
        $_SESSION['loggedIn'] = false; //mark that they've logged out
        header('Location: '.'login.php'); //redirect them to the login page
    }//end logUserOut

    public function redirectToLogIn(){
        header('Location: '.'login.php');//redirect them to the login page
    }//end redirectToLogIn
}
?>