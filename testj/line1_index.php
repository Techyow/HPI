<?php
	include_once 'includes/connect_af.php';
	session_start();
    
  if (!$_SESSION['loggedin']) {
    header("location: index.php");
  } else { //For testing
		$_SESSION = array();
		// unset($_SESSION);
    
	}
  
  
?>

<!DOCTYPE html>
<html>
    <head>
        <title> DTR LINE 1 </title>
        <link rel="stylesheet" type="text/css" href="..\testj\style\line.css">   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!--  Include jQuery  to simplify the AJAX request handling.-->

</head>
<body>
  
  <div class = "all">
      <div class = "top">
        <h1>AF LINE 1 Production Monitoring <a style = "text-align: left;" class = "rbutton" href="logout.php">LOGOUT</a></h1> 
      </div>
      <div class = "grid-top">
        <div class = "top-left">
          <h2>Current Shift: <span id = "shift_code"></span></h2>
        </div>
        <div class = "top-mid">
          <h2> Date:  <?php $currentDate = date('F j, Y'); echo $currentDate; ?> </h2>
        </div>
        <div class = "top-right">
          <h2>Time: <span id = "clock" onload="currentTime()"></span></h2>
        </div>
      </div>
      <div class = "grid-mid">
        <div class = "mid-left">
          <h3 style = "text-align: right;">OUTPUT M</h3><h3> ONITORING</h3>
          <div class = "mid-left1">
            <p>PLAN/DAY:<strong><span id = "total_plan"></span></strong></p>
          </div>
          <div class = "mid-left2">
            <p>CUR. SHIFT PLAN:<strong><span id = "current_plan"></span></strong></p>
          </div>
          <div class = "mid-left3">
            <h1 >PLAN:</h1><br>
            <h1>ACTUAL:</h1><br>
            <h1 class = "vari"  >VAR:</h1>
          </div>
          <div class = "mid-left4">
            <h1><span class = "plan" id = "running_plan">0<span></h1>
            <h1><span class = "actual" id= "actual">0</span></h1>
            <h1 class = "vari"><span class = "variance">0</span></h1>
          </div>
        </div>
        <div class = "mid-right">
          <h3 class = "title"><span id = "table-database"></span></h3>
        </div>
      </div>
      <div class = "grid-bottom">
        <div class = "bottom-left">
          <h3 style = "text-align: right;">DP</h3><h3>R</h3>
          <div class = "bottom-left1">
            <h3>ENGINE NO.</h3>
          </div>
          <div class = "bottom-left2">
            <h3>FRAME NO.</h3>
          </div><label for = "model_actual">Model Name:</label>
           <input type= "text" id= "model_actual" placeHolder="Enter Model Name Here"/><br>
        <button type="button" id="increment-button" class="gbutton">Enter</button>
      </div>
        <div class = "bottom-right">
          <h1 class = "scan">READY...</h1>
        </div>
      </div>
    </div>
        <!-- Add Information form -->
        <h2>Add Data here:</h2>
        <form id = "upload">
            <label for = "MN">Model Name:</label>
            <input type = "text" name = "MN" id = "MN" placeholder = "Enter Model Name here" style = "text-transform:uppercase">
            <label for = "JO">J.O. No.</label>
            <input type = "text" name = "JO" id = "JO" placeholder = "Enter J.O. No. here">
            <label for = "CLR">Color</label>
            <input type = "text" name = "CLR" id = "CLR" placeholder = "Enter Color here">
            <label for = "SHFT">Shift</label>
            <input type = "number" name = "SHFT" id = "SHFT" placeholder = "Enter Shift here">
            <button type="submit" id = "noreload" class="gbutton">SAVE</button>
        </form>
        <!-- Edit Information form -->
        <h2>Edit Settings here:</h2>
        <form id="edit_settings">
        <label for="model_name">Model Name:</label>
        <input type="text" id="model_name" placeholder="Enter Model Name Here" style = "text-transform:uppercase" required>
        <label for="time_start">Time Start:</label>
        <input type="time" step = "2" name="time_start" id="time_start" placeholder="Enter Time Start">
        <label for="speed">Speed(SEC):</label>
        <input type="number" name="speed" id="speed" placeholder="Enter Speed" required>
        <label for="tplan">Plan:</label>
        <input type="number" name="tplan" id="tplan" placeholder="Enter Plan" required>
        <label for="time_end">Time End:</label>
        <input type="time" name="time_end" id="time_end" placeholder="Calculated Time End" readonly>
        <button type="button" id="update-button" class="gbutton">SAVE AND START</button>
        </form>

        
<script src="..\testj\script\script.js"></script>
</body>
</html> 