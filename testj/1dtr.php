<?php
	include_once 'includes/connect_af.php';

  
?>

<!DOCTYPE html>
<html>
    <head>
        <title> DTR LINE 1 </title>
        <link rel="stylesheet" type="text/css" href="..\testj\style\1dtr.css">   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!--  Include jQuery  to simplify the AJAX request handling.-->

</head>
<body>
  
  <div class = "all">
      <div class = "top">
        <h1>AF LINE 1 Production Monitoring </h1>
        <a class = "rbutton" href="logout.php">LOGOUT</a>
        
      </div>
      <div class = "top2">
          <h3>&emsp; 
          Last Shift Var: <span id = "last_var" style = 'color: black;'>0</span>  &emsp; &emsp; &emsp; &emsp; &emsp; 
          Timer: <span id = "timer" style = 'color: black;'>0</span>  &emsp; &emsp; &emsp; &emsp; &emsp; 
          Current Shift: <span id = "shift_code" style = 'color: black;'></span>  &emsp;   &emsp; &emsp; &emsp; &emsp; 
          Time: <span id = "clock" onload="currentTime()" style = 'color: black;'></span> &emsp; &emsp; &emsp; &emsp; &emsp;  
          Date:  <span style = 'color: black;'><?php $currentDate = date('F j, Y'); echo $currentDate; ?></span> 
        </h3>
        </div>
      
      <div class = "grid-mid">
        <div class = "mid-left">
          <div class="mid-left-title">
          <span class = 'mid-output'>OUTPUT MONITORING</span>
          </div>
          <div class="grid-mid-left">
            <div class = "mid-left1">
              <span>PLAN/DAY:&nbsp;<strong><span id = "total_plan"></span></strong></span>
            </div>
            <div class = "mid-left2">
              <span>CUR. SHIFT PLAN:&nbsp;<strong><span id = "current_plan"></span></strong></span>
            </div>
            <div class = "mid-left3">
              <h1>&nbsp;PLAN   &nbsp;&emsp;&emsp;:</h1><br>
              <h1>&nbsp;ACTUAL &emsp;:</h1><br>
              <h1 class = "vari" >&nbsp;VAR &emsp;&emsp;&emsp;:</h1>
            </div>
            <div class = "mid-left4">
              <h1><span class = "plan" id = "running_plan">0<span></h1>
              <span><span class = "actual" id= "actual">0</span></span><br><br>
              <span class = "vari"><span class = "variance">0</span></span>
            </div>
          </div>
        </div>
        <div class = "mid-right">
            <div class="mid-right-title">
                <span class="mid-database">DATABASE</span>
            </div>
          <span class = "title"><span id = "table-database"></span></span>
        </div>
      </div>
      
      <div class = "grid-bottom">
        <div class = "bottom-left">
            <div class="bottom-left-title">
                <span class="dpr">DPR</span>
            </div>
            <div class="grid-bottom-left">
                <div class="bottom-left1">
                <h4>Engine No. :  <span id='eng_no'>TEST123E</span></h4>
                </div>
                <div class="bottom-left2">
                <h4>Frame No. : <span id='frm_no'>TEST123F</span></h4>
                </div>
            </div>
            <span><label for = "model_actual" class = 'scan-here'>Scan Here:</label>
            <input type= "text" id= "model_actual"  class = 'scan-input' placeHolder="Enter Model Name Here"/><br></span>
        </div>
      
        <div class = "bottom-right">
            <div class="bottom-right-up">
            <span class = 'next-jo'>Next JO NO. : <span id = 'next_jo'></span></span> 
            </div>
            <div class="bottom-right-down">
            <span class = "scan">READY...</span>
            </div>
          
        </div>
        
      </div>
    </div>

<script src="..\testj\script\script.js"></script>
</body>
</html> 