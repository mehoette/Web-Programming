<?php
/*

Mary Hoette
CSC 390 Web Programming
11/7/2023

This is the repeater page. 
It uses the rand method and
then a for loop to print a sentence
a random number of times.

*/

include('startSession.php');//start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>repeater</title>
    <link href="style.css" type="text/css" rel="stylesheet" /> <!-- include the style.css file -->
</head>
<body>
    <?php include('header.php'); ?>
    <?php
        $numLines = rand(0,500); //generate a random number 0-500
        for ($i = 0; $i < $numLines; $i++) //set i to 0. While i is less than the random number of lines, add one every loop
        {
            echo("<h1>Please wait outside of the house.</h1>");//echo a random sentence
        }//end for loop
    ?>
</body>
</html>