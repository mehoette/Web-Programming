<?php
/*

Mary Hoette
CSC 390 Web Programming
11/7/2023

This is the date page.
It uses the dateTime class to
find the time and format it as
dd-mm-yyyy hh:mm AM/PM

*/
include('startSession.php');//make sure you start the session
$currentDateTime = new DateTime('now', new DateTimeZone('America/Chicago'));//get the date and time for now in the chicago timezone
$currentDate = $currentDateTime->format('m/d/Y g:i A');//format it so its mm/dd/yyyy hh:mm AM/PM
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date</title>
    <link href="style.css" type="text/css" rel="stylesheet" /> 
</head>
<body>
    <?php include('header.php'); ?> <!-- put the header up top -->
    <h1 id ="date"> <?php echo $currentDate ?> </h1> <!-- display the date -->
</body>
</html>