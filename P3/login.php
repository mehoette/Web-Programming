<?php
/*

Mary Hoette
CSC 390 Web Programming
11/8/2023

If the user is already logged in it redirects to the 
index page. If the user inputs the correct username
and password (David and 123456 respectively)then it 
also redirects them to the index page. If the user
inputs the incorrect username and password, it shows
and error message
*/

//log in can't use startSession because then it would infinately link to itself
//instead just require the UserAUthenticator.ph and make sure you start the session that way
require 'UserAuthenticator.php';
$login = new UserAuthenticator;
$login->startSession();
$retry = false; //whenever you reload this page, set retry to false


if(isset($_POST["submit"])){//if they hit the sumbit button
        if($login->authenticate($_POST["username"], $_POST["password"])){//if it is autheniticated
            $login->logUserIn(); //login the user
        }
        else{ //if they put in the wrong username/password
            $retry = true;//set retry to true
        }
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="style.css" type="text/css" rel="stylesheet" /> <!-- use the style.css file -->
</head>
<body>
    <h2>Please enter your username and password</h2>   
    
    <?php if($retry) : //if they are retrying to put in the right username/password?>
        <h3>hey! wrong username/password!</h3> <!-- display an error message -->
    <?php endif; ?>

    <form method="post">
        <div>
            <!-- have inputs for username and password -->
            <p>username: <input type="text" name="username"/> <p>
            <p>password: <input type="text" name="password"/> <p>
        </div>
        <br> <!--line break-->
        <!-- also have a submit button -->
        <input type="submit" name="submit" value="log in"/>
    </form>
</body>
</html>