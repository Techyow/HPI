<?php
	include_once 'includes/connect_af.php';
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Test </title>
        <link rel="stylesheet" type="text/css" href="..\testj\style\style.css">   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!--  Include jQuery  to simplify the AJAX request handling.-->

</head>
<body>
<div class = "grid-container">
     <!-- print current running time and date today -->
    <div class ="item1" style="font-size:4vw"> <?php $currentDate = date('F j, Y'); echo $currentDate; ?> <span style="font-size:4vw" id = "clock" onload="currentTime()"> </span>  </div>
    <div class = "item2"> <!-- Start of Left Column -->
        <h2 style = "color:green; font-size:2.5vw">Current Shift:<span id = "shift_code"></h2> <hr>
        <p>Plan per Day:  <span id = "total_plan"></span>  /   Current Shift Plan: <span id = "current_plan"></span> </p>
        
        <h1>PLAN : <span class = "plan">0</span></h1>
        <h1>ACTUAL :  <span class = "actual" id= "actual" >0</span></h1>
        <h1 class = "vari">VARIANCE : <span class = "variance">0</span></h1>
        
        <!-- Add Information form -->
        <h2>Add Data here:</h2>
        <form id = "upload">
            <label for = "MN">Model Name:</label>
            <input type = "text" name = "MN" id = "MN" placeholder = "Enter Model Name here"><br>
            <label for = "JO">J.O. No.</label>
            <input type = "text" name = "JO" id = "JO" placeholder = "Enter J.O. No. here"><br>
            <label for = "CLR">Color</label>
            <input type = "text" name = "CLR" id = "CLR" placeholder = "Enter Color here"><br>
            <label for = "SHFT">Shift</label>
            <input type = "number" name = "SHFT" id = "SHFT" placeholder = "Enter Shift here"><br>
            <button type="submit" id = "noreload" class="gbutton">SAVE</button>
        </form>

        <h2>Edit Settings here:</h2>
        <form id="edit_settings">
        <label for="model_name">Model Name:</label>
        <input type="text" id="model_name" placeholder="Enter Model Name Here" required><br>
        <label for="time_start">Time Start:</label>
        <input type="time" step = "2" name="time_start" id="time_start" placeholder="Enter Time Start" required><br>
        <label for="speed">Speed(In Second/s):</label>
        <input type="number" name="speed" id="speed" placeholder="Enter Speed" required><br>
        <label for="plan">Plan:</label>
        <input type="number" name="plan" id="plan" placeholder="Enter Plan" required><br>
        <label for="time_end">Time End:</label>
        <input type="time" name="time_end" id="time_end" placeholder="Calculated Time End" readonly><br>
        <button type="button" id="update-button" class="gbutton" onclick = "ctime()">SAVE AND START</button>
        </form>

      

          <!-- Input for Serial Number -->
        <h2>Scanning</h2>
        <form>
        <label for = "model_actual">Model Name:</label>
        <input type= "text" id= "model_actual" placeHolder="Enter Model Name Here"/><br>
        <button type="button" id="increment-button" class="gbutton">Enter</button>
        </form>

  <!--
        <h1>Delete Information</h1>
        <form action="af_delete.php" method="post">
            <label for="criteria_column">Column Name:</label>
            <input type="text" id="criteria_column" name="criteria_column"><br>
            <label for="criteria_value">Value to Delete:</label>
            <input type="text" id="criteria_value" name="criteria_value"><br>
            <button type="submit" class = "rbutton">Delete</button>
        </form>
-->
        <script src="..\testj\script\script.js"></script>
    </div>

    <div class = "item3">  <!-- Start of Right Column -->
 <!-- Show database-->
    <span id = "table-database"></span>
    
    
    </div> 
    
</div> 

    
    
</body>
</html> 