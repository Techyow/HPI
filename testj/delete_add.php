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
        <h2 style = "color:green; font-size:2.5vw">Current Shift:<span id = "shift-code"></h2> <hr>
        <h1>PLAN : <span class = "plan">0</span></h1>
        <h1>ACTUAL :  <span class = "actual">0</span></h1>
        <h1 class = "vari">VARIANCE : <span class = "variance">0</span></h1><br>
        
        <!-- Input for Serial Number -->
        <label for = "serial">Enter Serial Here</label><br>
        <input type= "text" id= "serial" PlaceHolder="Enter Serial Here"/><br>
        <input id="beepbutton" class = "gbutton" type= "button" onclick="incrementValue()" value="Enter"/>
        
        <!-- Add Information form -->
      <h1>Add Information</h1>
        <form id = "upload">
            <label for = "MN">Model Name:</label>
            <input type = "text" name = "MN" id = "MN" placeholder = "Enter Model Name here"><br>
            <label for = "JO">J.O. No.</label>
            <input type = "text" name = "JO" id = "JO" placeholder = "Enter J.O. No. here"><br>
            <label for = "CLR">Color</label>
            <input type = "text" name = "CLR" id = "CLR" placeholder = "Enter Color here"><br>
            <label for = "SEC">Speed (in Second/s):</label>
            <input type = "text" name = "SEC" id = "SEC" placeholder = "Enter second/s here"><br>
            <label for = "PJO">Plan per J.O. :</label>
            <input type = "text" name = "PJO" id = "PJO" placeholder = "Enter plan per J.O. here"><br>
            <button type="submit" id = "noreload" class="gbutton" onclick="ctime()">SAVE AND START</button>
        </form>

        <h1>Delete Information</h1>
        <form action="af_delete.php" method="post">
            <label for="criteria_column">Column Name:</label>
            <input type="text" id="criteria_column" name="criteria_column"><br>
            <label for="criteria_value">Value to Delete:</label>
            <input type="text" id="criteria_value" name="criteria_value"><br>
            <button type="submit" class = "rbutton">Delete</button>
        </form>
        <script src="..\testj\script\script.js"></script>
    </div>

    <div class = "item3">  <!-- Start of Right Column -->
 <!-- Show database-->
    <span id = "table-database"></span>
    
    </div> 
    
</div> 

    
    
</body>
</html> 