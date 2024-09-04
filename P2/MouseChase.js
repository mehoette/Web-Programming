/*

Mary Hoette
CSC 390 Web Programming
10/18/2023

This is the Mouse Chase java script for project 2.
It moves the button away from you so you can never
press it. It gives you a suprise if you somehow
catch up to it. Also it changes color every 2 seconds

*/

window.addEventListener('load', setupThePage);//once the page loads, run the setupThePage function
let theButton;//we have to initialize the button up here so it can be used across all methods without having to be passed

setInterval(changeColor, 3000); //every 3 seconds (3000 milliseconds) the changeColor function is run

function setupThePage(){

    //the button gets the element with the tag buttons and listens for if it is hovered over or clicked
    theButton = document.querySelector('#button');
    
    theButton.addEventListener('mouseover', relocate);
    theButton.addEventListener('click', money);

}//end page set up

//if it is hovered over, it relocates to a random location
function relocate(event){

    //using the math function and then the height and width of my screen we generate a random (x,y) coordinate to go to
    theButton.style.left = (Math.random()*1200)+'px';
    theButton.style.top = (Math.random()*600)+'px';

}//end relocate

//if you do somehow press the button, the window is replaced by a jpg of 10 trillion Zimbabwe Dollars
function money(event){
    window.location.replace("10TrillionZimbabweDollar.jpg");
}

function changeColor()
{
    //generate random r,g & b values between 0 and 256
    let r = Math.round(Math.random() * 256);
    let g = Math.round(Math.random() * 256);
    let b = Math.round(Math.random() * 256);

    //set the background color to the randomized rgb values
    document.body.style.backgroundColor = ("rgb(" + r + "," + g + "," + b + ")");
}
