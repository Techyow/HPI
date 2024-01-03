
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
     let actual = document.getElementsByClassName('actual')[0];
     let actualVar = parseInt(actual.innerHTML);
 
     let variance = document.getElementsByClassName('variance')[0];
     let varianceVar = parseInt(variance.innerHTML);
 
     let plan = document.getElementsByClassName('plan')[0];
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
         },
         error: function () {
             console.error('Error incrementing value.');
         }
     });
   }
 });
 
 
 function submitUpload(event) {
     event.preventDefault(); // Prevent the default form submission behavior
 
     const form = document.getElementById('upload');
     const formData = new FormData(form);
 
     fetch('af_add.php', {
         method: 'POST',
         body: formData
     })
     .then(response => response.json())
     .then(data => {
         console.log(data);
     })
     .catch(error => {
         console.error('Error:', error);
         
     });
 }
 const formUpload = document.getElementById('upload');
 formUpload.addEventListener('submit', submitUpload);
 
 
 function submitUpdate() {
     const form = document.getElementById('update');
     const formData = new FormData(form);
 
     fetch('update_data.php', {
         method: 'POST',
         body: formData
     })
     .then(response => response.json())
     .then(data => {
 
         console.log(data);
 
     })
     .catch(error => {
         console.error('Error:', error);
 
     });
 }
 
 
 
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
             // Update the content of the shift-code id
             $('#running_plan').html(data);
         },
         
     });
 
 }
 
 // Call the updateData function 
 updateData();
 
 setInterval(updateData, 500); // Update every .5 second
 
 // When id update-button is click get the id of the ff and update the data
 document.getElementById('update-button').addEventListener('click', function () {
     const model_name = document.getElementById('model_name').value;
     const time_start = document.getElementById('time_start').value;
     const time_end = document.getElementById('time_end').value;
     const speed = document.getElementById('speed').value;
     const plan = document.getElementById('tplan').value;
 
     const formData = new FormData();
     formData.append('model_name', model_name);
     formData.append('time_start', time_start);
     formData.append('time_end', time_end);
     formData.append('speed', speed);
     formData.append('tplan', plan);
 
     fetch('update_data.php', {
         method: 'POST',
         body: formData
     })
     .then(response => response.json())
     .then(data => {
         console.log(data);
     })
     .catch(error => {
         console.error('Error:', error);
     });
 });
 
 
 $(document).ready(function() {
     // Function to calculate and update time_end based on speed, plan, and time_start
     function updateTimeEnd() {
         var timeStartInput = $("#time_start").val();
         var speedInput = parseFloat($("#speed").val());
         var planInput = parseFloat($("#tplan").val());
 
         if (!isNaN(speedInput) && !isNaN(planInput)) {
             var timeStart = new Date("2023-09-13T" + timeStartInput); // Assuming the date is today
             var timeAddedInSeconds = (planInput * speedInput) ; // Convert speed to seconds
             
             var timeEnd = new Date(timeStart.getTime() + (timeAddedInSeconds * 1000)); // Calculate time_end
             
 
             var formattedTimeEnd = timeEnd.toTimeString().split(" ")[0];
 
             $("#time_end").val(formattedTimeEnd);
         } else {
             $("#time_end").val("");
         }
     }
 
     // Add input event listeners to the speed, plan, and time_start inputs
     $("#speed, #tplan, #time_start").on("input", updateTimeEnd);
 });
 
 