<?php
/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

This page takes a get request called id
and deletes that item off the database

*/

//get the task id from the button that calls this
$task_id = $_GET['id'];
//run the delete item function
deleteItem($task_id);

function deleteItem($task_id){
    require 'UserAuthenticator.php';
    $login = new UserAuthenticator;
    $login->startSession();
    $dbh = $login->getDatabase();
    //start the session and get the database

    //prepare to delete the task
    $query = $dbh->prepare('
    DELETE FROM task
    WHERE task_id = :taskId;
    ');
    
    //say which task needs to be deleted
    $query->bindValue(':taskId', $task_id);

    //execute the deletion
    $query->execute();

}

?>