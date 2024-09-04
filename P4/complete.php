
<?php
/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

//this page takes in a get request called 
ID and marks it as complete in the database

*/

//get the task id passed here by the button that triggers this site
$task_id = $_GET['id'];
//run the delete item function
completeItem($task_id);

function completeItem($task_id){
    require 'UserAuthenticator.php';
    $login = new UserAuthenticator;
    $login->startSession();
    $dbh = $login->getDatabase();
    //make sure to start the session and get the database

    //prepare to update the list
    $query = $dbh->prepare('
    UPDATE task
    SET date_completed = :dateCompleted
    WHERE task_id = :taskId
    ');

    $query->bindValue(':taskId', $task_id);

    $date = new DateTime('now', new DateTimeZone('America/Chicago'));//make a new date time object
    $date = date("Y-m-d H:i:s");
    //bind that to the query
    $query->bindValue(':dateCompleted', $date);

    //excecute the query
    $query->execute();

}

?>