
function currentTime() {            
   // Get the current date and time
    let date = new Date(); 

    // Extract hours, minutes, and seconds from the date
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let seconds = date.getSeconds();

    
    // Add leading zeros to hours, minutes, and seconds if they are less than 10
    hours = (hours < 10) ? "0" + hours : hours;
    minutes = (minutes < 10) ? "0" + minutes : minutes;
    seconds = (seconds < 10) ? "0" + seconds : seconds;

    // Create a formatted time string (e.g., "hh:mm:ss AM/PM")
    let time = hours + ":" + minutes + ":" + seconds + " ";

    // Set the formatted time as the content of the HTML element with the ID "clock"
    document.getElementById("clock").innerText = time;

    // Call the currentTime() function again after a 1000ms (1 second) delay using setTimeout
    let t = setTimeout(function() {
        currentTime()
    }, 1000);

    //The Variance is always updated
    // Get elements with the class 'add', 'variance', and 'plan'
    let actual = document.getElementsByClassName('progress-value-actual')[0];
    let actualVar = parseInt(actual.innerHTML);

    let variance = document.getElementsByClassName('progress-value-variance')[0];
    let varianceVar = parseInt(variance.innerHTML);

    let plan = document.getElementsByClassName('progress-value-plan')[0];
    let planVar = parseInt(plan.innerHTML);

    // Perform the subtraction and update the 'variance' element
    varianceVar = actualVar - planVar;
    variance.innerHTML = varianceVar;

    let vari = document.getElementsByClassName('vari')[0];
    // Check the value of 'no' and change the color accordingly
    if (varianceVar == 0){
        variance.style.color = 'black'; //set color red if negative
        vari.style.color = 'black';
    } else if (varianceVar < 1){
        variance.style.color = 'red'; //set color red if negative
        vari.style.color = 'red';
    }
    else {
        variance.style.color = 'green'; // set color green if positive
        vari.style.color = 'green';
    }

   
   
    
}

const inputElement = document.getElementById("model_actual");

inputElement.addEventListener("keyup", function(event) {
  if (event.key === "Enter") {
    const model_actual = document.getElementById('model_actual').value;
    //beep after adding in actual
    const beepsound = new Audio("sound/beep.mp3");
    beepsound.play();
    $.ajax({
        url: 'update_actual.php',
        type: 'POST',
        data: { model_actual: model_actual },
        dataType: 'json',
        success: function (data) {
            $('#actual').text(data.updatedValue);
            

            
function runCircularProgress(circularProgressSelector, progressValueSelector, valueFromDb , color) {
    let circularProgress = document.querySelector(circularProgressSelector);
    let progressValue = document.querySelector(progressValueSelector);

    let progressStartValue = 0;
    let speed = 2;

    let progress = setInterval(() => {
        progressStartValue++;

        progressValue.textContent = `${progressStartValue}`;
        circularProgress.style.background = `conic-gradient(${color} ${progressStartValue * 3.6}deg, red 0deg)`;

        if (progressStartValue === valueFromDb) {
            clearInterval(progress);
        }
    }, speed);
}

// Usage:
runCircularProgress(".circular-progress-actual", ".progress-value-actual", data, "green"); // For Actual


        },
        error: function () {
            console.error('Error incrementing value.');
        }
    });
  }
});



currentTime(); //call function of the current time of the clock

function updateData() {
    // Make an AJAX request to fetch new data
    $.ajax({
        url: 'update_shift.php', 
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            // Update the content of the shift-code id
            $('#shift_code').html(data);
        },
        
    });

    $.ajax({
        url: 'update_table.php', 
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            // Update the content of the table-database id
            $('#table-database').html(data);
        },
    });

    $.ajax({
        url: 'plan_per_day.php', 
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            // Update the content of the total_plan id
            $('#total_plan').html(data);
        },
    });

    $.ajax({
        url: 'plan_current.php', 
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            // Update the content of the total_plan id
            $('#current_plan').html(data);
        },
    });

    $.ajax({
        url: 'update_plan.php', 
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            // Update the content of the running_plan id
            $('#running_plan').html(data);
            let runningPlanValue; 
            runningPlanValue = $('#running_plan').text();
        },
        
    });
    
}

// Call the updateData function 
updateData();

setInterval(updateData, 500); // Update every .5 second

function runCircularProgress(circularProgressSelector, progressValueSelector, valueFromDb , color) {
    let circularProgress = document.querySelector(circularProgressSelector);
    let progressValue = document.querySelector(progressValueSelector);

    let progressStartValue = 0;
    let speed = 2;

    let progress = setInterval(() => {
        progressStartValue++;

        progressValue.textContent = `${progressStartValue}`;
        circularProgress.style.background = `conic-gradient(${color} ${progressStartValue * 3.6}deg, red 0deg)`;

        if (progressStartValue === valueFromDb) {
            clearInterval(progress);
        }
    }, speed);
}

// Usage:
runCircularProgress(".circular-progress-plan", ".progress-value-plan", 1000, "green"); // For Plan
runCircularProgress(".circular-progress-variance", ".progress-value-variance", 10, "green"); // For Variance
