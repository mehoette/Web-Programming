<?php
/*

Mary Hoette
CSC 390 Web Programming
11/7/2023

This is the index/menu page of Project 3
It simply asks the user what it wants to do and gives the 4 (right now 5) options

*/

include('startSession.php');//start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P3 Index</title>
    <link href="style.css" type="text/css" rel="stylesheet" /> <!-- give it the css page style -->
</head>
<body>
    <h1>What do you want to do?</h1>
    <div class = flexbox><!-- give links to each of the 3 pages and also the option to log out -->
        <div>
        <a href="date.php">See the Date</a>
        </div>

        <div>
        <a href="rps.php">Play Rock Paper Scissors</a>
        </div>

        <div>
        <a href="repeater.php">Repeat</a>
        </div>
        
        <div>
        <a href="logout.php">Log Out</a>
        </div>
    </div>
</body>
</html>