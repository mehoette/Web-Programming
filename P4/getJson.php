<?php

/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

this file returns a json file

*/

    require 'UserAuthenticator.php';
    $login = new UserAuthenticator;
    $login->startSession();
    $dbh = $login->getDatabase();

    $query = $dbh->prepare//prepare a query to get every task from the task list that has the user_id of the account logged
    ('
        SELECT *
        FROM task
        WHERE user_id = :userId;
        ');
    $query->bindValue(':userId', $_SESSION['userId']);  //get the user Id from the session 
    $query->execute();
    $tasks = $query->fetchAll(); //now we should have the number of collumns in the array
    $json = json_encode($tasks);

    echo($json);
?>