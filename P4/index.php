<?php
/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

This is the front page of project 4
It displays all the tasks in the database
under a certain user id.
It has buttons to log out and add a new task
as well as buttons to complete or delete
any task

*/
require 'UserAuthenticator.php';
$login = new UserAuthenticator;
$login->startSession();

//if they aren't signed in, kick them out to the login page
if(!$login->isLoggedIn()){
    header('Location: '.'login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="style.css" type="text/css" rel="stylesheet" /> <!--  include the style.css file -->
    <script src="script.js"></script>
</head>
<body>
    <div id = header>
        <div id = title class = flexbox>
            <h1 id = words class = titleItem>woah! Task list</h1>
            <div class = titleItem>
                <div class = flexbox id = buttons> <!--here are the 2 buttons for adding a task and logging out-->
                    <a href="add.php"><h2 class = buttons>+</h2></a>
                    <a href="logout.php"><p class = buttons>logout</p></a>
                </div>
            </div>
        </div>

        <!--here are all the headers-->
        <div id = headings class = flexbox>
                <h2 class = item>Task Description</h2>
                <p class = item>Date Created</p>
                <p class = item>Date Completed</p>
                <p class = item>complete</p>
                <p class = item>delete</p>
                
        </div> 
    </div>
    <!--this paragraph is currently empty, but will be filled with the list using java script later-->
    <p id = tasks></p>
   

</body>
</html>