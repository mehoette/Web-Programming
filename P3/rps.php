<?php
/*

Mary Hoette
CSC 390 Web Programming
11/7/2023

This is the RPS page. It lets you pick between
rock paper and scissors using radio buttons.
When you hit the submit button, it redirects 
you to the playrps.php page.

*/

include('startSession.php');//start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPS</title>
    <link href="style.css" type="text/css" rel="stylesheet" /> <!-- include the style.css file -->
    
</head>
<body>
    <?php include('header.php'); //put the header at the top?>
    <!--here's 3 exclusive radio buttons to give the choices.-->
    <form action="playrps.php" method="post">        
        
    <h2>
    <input type="radio" name="rps" value="r" class = "options"/>     rock🪨
    <input type="radio" name="rps" value="p" class = "options"/>     paper📃
    <input type="radio" name="rps" value="s" class = "options"/>     scissors✂️
    </h2>
    
    <br>
    <!--There's also a submit button at the bottom-->
    <button id="submit">Submit</button>
    
    </form>
</body>
</html>