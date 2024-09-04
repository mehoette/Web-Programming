/*

Mary Hoette
CSC 390 Web Programming
11/27/2023

This javascript is what displays all the tasks.
It also has 2 functions to call complete.php or
delete.php when the respective buttons are pressed.

It also uses ajax to update every 5 seconds or once
any button is pressed

*/

// This will cause the updateOrderCount function to run every 5 seconds
setInterval(updateTasks, 5000);


// This will cause the order count to update as soon as the page is loaded
window.onload = updateTasks();

// This will do an AJAX call to get updated order data
// and then update the page
async function updateTasks() {
    console.log("Updating tasks!");

    // make an ajax call to get the json
    let response = await fetch("getJson.php");

    //make an ajax call to read that json
    let taskData = await response.json();

    //find that empty paragraph from earlier on the index page
    let tasks = document.querySelector('#tasks');
    //make a variable for what's going to go into that empty paragraph
    let out = "";
    for (let task of taskData){//for each task in the database
        //read the json and display it one piece at a time in the appropriate html code
        out += `
            
            <div class = flexbox>
                <h2 class = item>${task.description}</h2>
                <p class = item>${task.date_created}</p>
                <p class = item>${task.date_completed}</p>
                <a href="javascript:complete(${task.task_id})" class = item id = check >✔</a>
                <a href="javascript:leave(${task.task_id})" class = item id = x >X</a>
            </div>
            <hr>
        `;
    }
    
    tasks.innerHTML = out; //make that empty paragraph from earlier display this big list of tasks.
}

async function leave(task_id){ //I wanted to name this function delete, but that's not allowed so...

    console.log(task_id);//log the task Id given in
    
    //make a variable to store the file we need which depends on which button is pushed
    let file = ("delete.php?id=" + task_id);

    //log the whole file name
    console.log("file name = " + file);
    
    //make an ajax call to that file
    await fetch(file);
    
    //log that the file has been executed
    console.log("done");

    //update the list after the file has been deleted
    updateTasks();
}

async function complete(task_id){
    //log the task id
    console.log(task_id);
    
    //now call the php function maybe?
    //get the full file name you need to run including the get for the task id you need
    let file = ("complete.php?id=" + task_id);
    //log which file it is
    console.log("file name = " + file);
    
    //do an ajax call to run that file
    await fetch(file);
    //log that its done
    console.log("done");
    //update the list with the completed time stated
    updateTasks();
}

//note: the console.log functions in the leave and complete functions aren't necessary, but they helped me when i was having trouble with those functions