<?php
/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

This page takes an email, username and
password for a new user. It then adds
that information to the database

*/
require 'UserAuthenticator.php';
$login = new UserAuthenticator;
$login->startSession();
//if you've running this page again
//then send this to the useruthenticator to make a new username and password and send you to log in
if(isset($_POST["submit"])){//if they hit the sumbit button
    //make an if tatement to see if there's already a user with that email
    $login->addUser($_POST["name"],$_POST["email"], $_POST["password"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link href="style.css" type="text/css" rel="stylesheet" />  <!--  include the style.css file -->
    
</head>
<body>
<h2>Please enter your username and password</h2>

    <form method="post">
        <div>
            <!-- have inputs for username and password -->
            <p>Name: <input type="text" name="name"/> <p>
            <p>Email: <input type="text" name="email"/> <p>
            <p>Password: <input type="text" name="password"/> <p>
        </div>
        <br> <!--line break-->
        <!-- also have a submit button -->
        <input type="submit" name="submit" value="log in"/>
    </form>

</body>
</html>