<?php
/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

This is the page where you get to log in.
It asks for your username and password.
There is also an option where also an option
to sign up for a new account.

You are redirected here if you try to sneak into
any of the other pages.

*/

require 'UserAuthenticator.php';
$login = new UserAuthenticator;
$login->startSession();

$retry = false; //whenever you reload this page, set retry to false

if(isset($_POST["submit"])){//if they hit the sumbit button
    if($login->authenticate($_POST["email"], $_POST["password"])){//if it is autheniticated
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
    <link href="style.css" type="text/css" rel="stylesheet" /> <!--  include the style.css file -->
</head>
<body id = loginPage>
    <div class = flexbox id = login>
        <h2>Please enter your username and password</h2>   
        <a href="newUser.php" id = signUp>sign up</a>
    </div>

    <?php if($retry) : //if they are retrying to put in the right username/password?>
        <h3>hey! wrong email/password!</h3> <!-- display an error message -->
    <?php endif; ?>

    <form method="post">
        <div>
            <!-- have inputs for username and password -->
            <p>email: <input type="text" name="email"/> <p>
            <p>password: <input type="text" name="password"/> <p>
        </div>
        <br> <!--line break-->
        <!-- also have a submit button -->
        <input type="submit" name="submit" value="log in"/>
    </form>
</body>
</html>