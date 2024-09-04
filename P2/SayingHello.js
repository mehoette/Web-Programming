/*

Mary Hoette
CSC 390 Web Programming
10/18/2023

This is the Saying Hello java script for project 2.
When you hit the button to submit your information,
it looks it over and makes sure you put in the right
age. If you do, it says hello. :) If you put in the 
wrong age, it yells at you.

*/

//once the page is loaded run the setupThePage function
window.addEventListener('load', setupThePage);

function setupThePage(){

    //get the submit button
    let theButton = document.querySelector('#submit');
    console.log("found button");
    //when its clicked run the helloButtonClick function
    theButton.addEventListener('click', helloButtonClick);
}//end page set up

function helloButtonClick(event){

    //get the name and age out of the text boxes
    let name = document.querySelector('#name').value;
    let age = document.querySelector('#age').value;
    
    if(age > 0 && age < 150)//if its an appropriate age
    {
        //alert them and say hello
        alert("Hello " + name +". You are "+ age +" years old");

    }//end if valid age
    else //if they enter an invalid age
    {
        //display a message that says its invalid and clear the textbox for them to put in a new age
        console.log("out of range");
        document.querySelector('#errorMessage').innerHTML = "PLEASE INPUT A VALID AGE!!";
        document.querySelector('#age').value = "";
    }//end else
}//end helloButtonClick

