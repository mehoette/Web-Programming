<?php
/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

This file is a class that gets the data base,
adds new users, starts the session, sees if
there is a user logged in, authenticates any
new log in, actually logs the user in and 
logs the user out. It doesn't dispay anything.

*/
class UserAuthenticator
{
    public function getDatabase(){
        // This defines how to connect to the database
        $dsn = 'mysql:dbname=fa23_390_mhoette;host=localhost';

        // Credentials to use to connect to the database
        $user = 'fa23_390_mhoette';
        $password = 'ufgiftaj1g';

        // connect to the database
        $dbh = new PDO($dsn, $user, $password);
        return $dbh; //return the database
    }

    public function addUser($inputName, $inputEmail, $inputPassword){
        
        $dbh = $this->getDatabase();//get the database

        $name = $inputName;
        $email = $inputEmail;
        $password = hash('sha256', $inputPassword);//make sure you store the password hashed for security reasons
    
        //prepare to insert the new user
        $query = $dbh->prepare('
        INSERT INTO user (name, email, password_hash)
        VALUES (:name, :email, :passwordHash)
        ');
    
        //bind the values in the query using the values from before
        $query->bindValue(':name', $name);
        $query->bindValue(':email', $email);
        $query->bindValue(':passwordHash', $password);
    
        //actually input the new user into the database
        $query->execute();


        //return you to the log in screen
        header('Location: '.'login.php');
    }

    public function startSession(){
        if(!isset($_SESSION['loggedIn'])) { //if the session hasn't been started before, set the loggedIn session to false
            $_SESSION['loggedIn'] = false; //if they haven't started the session, they couldn't have been here to log in.
            session_start(); //start the session
        }
    }

    public function isLoggedIn(){ //if you're logged in, return true
        return $_SESSION['loggedIn'];
    }//end isLoggedIn

    public function authenticate($email, $password){
        $dbh = $this->getDataBase(); //get the database
        
        //prepare to get stuff off of the array
        $query = $dbh->prepare('
            SELECT *
            FROM user
            WHERE email = :email;
        ');
        //bind the value to the query
        $query->bindValue(':email', $email);
        //get the information for that email off the database
        $query->execute();
        $result = $query->fetch(); // the result is an array

        $password = hash('sha256', $password);//passwords in databases aren't store in hashes, they're stored as hashes, so we have to hash the password they give us to compare it to the one in the database
        if($password == $result[3])//if the password they put in is the same as the password in the database for that email, which is in the array at index 2
        {
            $_SESSION['userId'] = $result[0]; //make a session to remeber what the user Id is. this is stored at index 0
            return true;
        }
        else{
            return false;
        }

        //take the username they put in and see if it matches the password in the database I'll do that later
    }//end authenticate function

    public function logUserIn(){
        $_SESSION['loggedIn'] = true; //mark that they're logged in
        header('Location: '.'index.php'); //redirect them to the index page
        
    }//end logUserIn

    public function logUserOut(){
        $_SESSION['loggedIn'] = false; //mark that they've logged out
        header('Location: '.'login.php'); //redirect them to the login page
    }//end logUserOut
}
?>