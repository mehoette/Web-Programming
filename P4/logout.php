<?php
/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

This button just logs the user out.
Nothing is displayed.

*/
//start the session
require 'UserAuthenticator.php';
$login = new UserAuthenticator;
$login->startSession();
//use the logUserOut function from UserAuthenticator
$login->logUserOut();
?>
