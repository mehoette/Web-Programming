<?php
//this is a short segment of php to make sure the session is started everytime
//it also relocates the user to the login page if they aren't logged in

require 'UserAuthenticator.php';
$login = new UserAuthenticator;
$login->startSession();

if(!$login->isLoggedIn()){
    header('Location: '.'login.php');
}
?>