<?php
/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

This page displays a form to add new items to the list.
Once you submit that form, it adds that task to the database

*/
require 'UserAuthenticator.php';
$login = new UserAuthenticator;
$login->startSession();
if(!$login->isLoggedIn()){ //is the user isn't logged in, redirect them to the log in page
    header('Location: '.'login.php');
}
$dbh = $login->getDatabase(); //get the database

function addItem($dbh){

    //get the user id, date started and description for the new task
    $userId = $_SESSION['userId']; //the user id will be whatever user is logged in now.
    $date = new DateTime('now', new DateTimeZone('America/Chicago'));//get the date and time for now in the chicago timezone
    $date = date("Y-m-d H:i:s");
    $description = $_POST['description']; 

    //prepare a query to add the new task
    $query = $dbh->prepare('
    INSERT INTO task (user_id, date_created, description)
    VALUES (:userId, :dateCreated, :description)
    ');

    //bind the values we got earlier
    $query->bindValue(':userId', $userId);
    $query->bindValue(':dateCreated', $date);
    $query->bindValue(':description', $description);

    $query->execute();

    //after the new task is made, redirect them back to the main list
    header('Location: '.'index.php');
}

//once the submit button has been pushed, run the add item function
if(isset($_POST['submit']))
{
   addItem($dbh);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
    <link href="style.css" type="text/css" rel="stylesheet" /> <!--  include the style.css file -->
    
</head>
<body>
    <div class = title>
            <h2 class = add> ADD A NEW TASK</h2>
            <a id = arrow href="index.php"><h2>⮌</h2></a>
            <!-- these 2 paragraphs are to nudge the arrow over so it isn't so far away-->
            <p></p>
            <p></p>
    </div>
    
    <div class = add>
        <!-- this form just has a text box to enter your task description and a submit button -->
        <form action="add.php" method="post">
            <h3>Please Describe Your New Task:</h3>
            <p> <textarea name="description"></textarea></p>
            <input type="submit" value="Add Task" name="submit">
        </form>
    </div>

</body>
</html>
