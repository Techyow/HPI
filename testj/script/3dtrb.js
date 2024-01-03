
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
     }, 100);
 
     //The Variance is always updated
     // Get elements with the class 'add', 'variance', and 'plan'
     let actual = document.getElementsByClassName('actual')[0];
     let actualVar = parseInt(actual.innerHTML);
 
     let variance = document.getElementsByClassName('variance')[0];
     let varianceVar = parseInt(variance.innerHTML);
 
     let plan = document.getElementsByClassName('plan')[0];
     let planVar = parseInt(plan.innerHTML);
 
  
     varianceVar = actualVar - planVar;
     variance.innerHTML = varianceVar;
 
     let vari = document.getElementsByClassName('vari')[0];
     let runningvariance = document.getElementsByClassName('running-variance')[0];
     if (varianceVar == 0){
         variance.style.color = 'white'; 
         vari.style.color = 'white';
         runningvariance.style.boxShadow = '2px 2px 5px white'
     } else if (varianceVar < 1){
         variance.style.color = 'red'; 
         vari.style.color = 'red';
         runningvariance.style.boxShadow = '2px 2px 5px red';
     }
     else {
        variance.style.color = '#61fc61'; 
        vari.style.color = '#61fc61';
        runningvariance.style.boxShadow = '2px 2px 5px #61fc61'
     }
      
    if (actualVar >= 1000) {
        actual.style.fontSize = '130px';
    } else if(actualVar < 1000) {
        actual.style.fontSize = '140px';
        
        

    }
    
    if (varianceVar >= 1000) {
        variance.style.fontSize = '130px';
    }else if (varianceVar < 1000){
        variance.style.fontSize = '140px';
    }
    
    if (planVar >= 1000) {
        plan.style.fontSize = '130px';
    }else if (planVar < 1000){
        plan.style.fontSize = '140px';
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
          // $('#actual').text(data.updatedValue);
        }
    });
s
 
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
        url: 'update_total_actual.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#actual').html(data.total_actual);
        },
    });
    

     $.ajax({
         url: 'update_tableB.php', 
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
 

