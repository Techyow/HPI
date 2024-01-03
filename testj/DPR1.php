<?php
	include_once 'includes/connect_af.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> DTR LINE 3 </title>
        <link rel="stylesheet" type="text/css" href="..\testj\style\dpr1.css">   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!--  Include jQuery  to simplify the AJAX request handling.-->
        
</head>
<body>
    <div class="header">
      <div class="title">
        <span>AF LINE 1 PRODUCTION MONITORING </span><a class = "rbutton" href="logout.php">LOGOUT</a> 
      </div>
      <div class = "top-row">
        <div class="top-column-left">
          <span> Date:  <span style = 'color: white;'><?php $currentDate = date('F j, Y'); echo $currentDate; ?></span> </span>
        </div>
        <div class="top-column-right">
          <span> Time: <span id = "clock" onload="currentTime()" style = 'color: white;'></span> </span>  
        </div>
      </div>
    </div>
    <div class="mid">
      <div class="mid-row">
        <div class="mid-column">
          <div class="mid-title">
            <span>OUTPUT MONITORING</span>
          </div>
          <div class="grid-output">
            <div class="output1">
            <span>Last Shift Var&nbsp;&nbsp;: &nbsp;<span id = "last_var" style = 'color: white;'>0</span></span>
            </div>
            <div class="output2">
            <span >Plan/Day :&nbsp;<strong><span style = 'color: white;' id = "total_plan" ></span></strong></span>
            </div>
            <div class="output3">
            <span>Timer&emsp;&emsp;&emsp;&emsp;&nbsp;: &nbsp;<span id = "timer" style = 'color: white;'>0</span></span>
            </div>
            <div class="output4">
            <span>Plan/Shift: <strong><span style = 'color: white;' id = "current_plan"></span></strong></span>
            </div>
            <div class="output5">
              <span> Current Shift&emsp;: &nbsp; <span id = "shift_code" style = 'color: white;'></span> </span>
            </div>
          </div>
        <div class="mid-column">
          <span>OUTPUT MONITORING</span>
        </div>
        <div class="mid-column">
          <span>OUTPUT MONITORING</span>
        </div>
        <div class="mid-column">
          <span>OUTPUT MONITORING</span>
        </div>
      </div>
    </div>
      
      
        
      
            <input type= "text" id= "model_actual"  class = 'scan-input' placeHolder="Click Here" /><br></span>
        
   
        
      
  
    
<script src="..\testj\script\3dtrb.js"></script>
</body>
</html> 


