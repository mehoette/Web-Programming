<?php
/*

Mary Hoette
CSC 390 Web Programming
11/7/2023

This is the playrps page. It randomly chooses
an option for the computer. It then uses an
if/elseif statement to determine what the right
thing to set winner to. It then echos out the
winner statement in a header 1 element.

*/

//start the session
include('startSession.php');
$player; //make the player variable
if(!isset($_POST['rps']))//if they didn't check one of the radio buttons
{
    $player = "";//set $player to an empty string
}//end if
else{
    $player = $_POST['rps'];//get what radio button they clicked
}//end else
$comp = rand(1,3); //1 = rock, 2 = paper, 3 = scissors


if($player == ""){
    $winner = "ERROR! You didn't pick rock, paper or scissors.";
}//end if no input
elseif ($player == 'r' && $comp == 3){ //if player r and comp s, player wins
    $winner = "Player: Rock. CPU: Scissors. Result: Win!";
}//end else if r/s
elseif ($player == 's' && $comp == 2){ //if player s and comp p, player wins
    $winner = "Player: Scissors. CPU: Paper. Result: Win!";
}//end else if s/p
elseif ($player == 'p' && $comp == 1){ //if player p and comp r, player wins
    $winner = "Player: Paper. CPU: Rock. Result: Win!";
}//end else if p/r
elseif($player == 'p' && $comp == 3){ //if player p and comp s, comp wins
    $winner = "Player: Paper. CPU: Scissors. Result: Lose :(";
}//end else if p/s
elseif($player == 'r' && $comp == 2){ //if player r and comp p, comp wins
    $winner = "Player: Rock. CPU: Paper. Result: Lose :(";
}//end else if r/p
elseif($player == 's' && $comp == 1){ //if player s and comp r, comp wins
    $winner = "Player: Scissors. CPU: Rock. Result: Lose :(";
}//end else if s/r
else{ //all other cases mean you have the same thing which means tie game
    //reassign the player to the full name not just the initial
    if($player == 'p'){
        $player = "Paper";
    }
    elseif($player == 's'){
        $player = "Scissors";
    }
    else{
        $player = "Rock";
    }
    $winner = "Player: $player CPU:  $player. Result: Tie Game."; //the player and comp will enter the same thing so you can use just one variable
}//end else
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🪨📃✂️Results</title>
    <link href="style.css" type="text/css" rel="stylesheet" /> <!-- use the style.css file -->
</head>
<body>
    <?php include('header.php'); ?> <!-- put in the header -->
    <h2> <?php echo $winner; ?></h2> <!-- put out the error message -->
    <br>
    <a href="rps.php"> Play again?</a> <!-- give them the option to play again -->
</body>
</html>