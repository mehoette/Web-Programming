/*

Mary Hoette
CSC 390 Web Programming
10/18/2023

This is the Calculator java script for project 2.
It does all the hard math and keeps checking to
make sure the values inputed don't change

*/

//once the page is loaded run the setupThePage function
window.addEventListener('load', setupThePage);

//we have to initialize these variables so they can be across functions without passing them
let num1;
let num2;

//constantly be running the read values function to check for any updates
setInterval(readValues, 1); 

function setupThePage(){

    //if there's one number
    if(num1 != undefined){
        //you can run the square root function
        let sqrt = document.querySelector('#sqrt');
        sqrt.addEventListener('click', squareRoot);
        
        //if there's 2 numbers
        if(num2!= undefined)
        {
            //you can run all the other functions
            //these groups of code add event listeners to the different operation buttons
            //then they call the apropriate functions on click
            let addition = document.querySelector('#add');
            addition.addEventListener('click', add);

            let subtraction = document.querySelector('#subtract');
            subtraction.addEventListener('click', subtract);

            let multiplication = document.querySelector('#multiply');
            multiplication.addEventListener('click', multiply);

            let division = document.querySelector('#divide');
            division.addEventListener('click', divide);

            let exponents = document.querySelector('#exponent');
            exponents.addEventListener('click', exponent);
        }
    }
}

//the read values function reassigns num1 and num2 to what is typed in their respective functions
function readValues(){
    num1 = document.querySelector('#N1').value;
    num2 = document.querySelector('#N2').value;
    console.log("reloaded");
}

//the square root function takes the square root of the first number
function squareRoot(event){
    document.querySelector('#answer').innerHTML = (Math.sqrt(num1));
    console.log(" √" + num1 + " = " + (Math.sqrt(num1)));
}

//the rest of the functions do exactly what they say on the tin
//add adds, subtract subtracts, etc.
function add(event){
    document.querySelector('#answer').innerHTML = (parseInt(num1) + parseInt(num2));
    console.log(num1 + " + " + num2 + " = " + (parseInt(num1) + parseInt(num2)));
}
function subtract(event){
    document.querySelector('#answer').innerHTML = (num1-num2);
    console.log(num1 + " + " + num2 + " = " + (num1-num2));
}
function multiply(event){
    document.querySelector('#answer').innerHTML = (num1*num2);
    console.log(num1 + " * " + num2 + " = " + (num1*num2));
}
function divide(event){
    document.querySelector('#answer').innerHTML = (num1/num2);
    console.log(num1 + " / " + num2 + " = " + (num1/num2));
}
function exponent(event){
    document.querySelector('#answer').innerHTML = (num1**num2);
    console.log(num1 + " ^ " + num2 + " = " + (num1**num2));
}
