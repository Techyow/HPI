<?php
	include_once 'includes/connect_af.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> DTR LINE 2 </title>
        <link rel="stylesheet" type="text/css" href="..\testj\style\2dtr.css">   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!--  Include jQuery  to simplify the AJAX request handling.-->

</head>
<body>
  
  <div class = "all">
      <div class = "top">
      
        <h1>&emsp;AF LINE 2 Production Monitoring </h1>
        <div class="right-top">
        <span> Date:  <span style = 'color: black;'><?php $currentDate = date('F j, Y'); echo $currentDate; ?></span> </span>
        <br><span> Time: <span id = "clock" onload="currentTime()" style = 'color: black;'></span> </span>  
        </div>
        <a class = "rbutton" href="logout.php">LOGOUT</a>
        
      </div>
      
          
      
      <div class="container">
        <div class="output-monitoring">
          <span class = "output-monitoring-title">OUTPUT MONITORING</span>
          <div class="grid-output">
            <div class="output1">
            <span>Plan/Day:&nbsp;<strong><span id = "total_plan"></span></strong></span>
            </div>
            <div class="output2">
            <span>Cur. Shift Plan:&nbsp;<strong><span id = "current_plan"></span></strong></span>
            </div>
            <div class="output3">
              <span>Last Shift Var: <span id = "last_var" style = 'color: black;'>0</span></span>
            </div>
            <div class="output4">
              <span>Timer: <span id = "timer" style = 'color: black;'>0</span></span>
            </div>
            
          </div>
          <div class="output5">
              <span> Current Shift: <span id = "shift_code" style = 'color: black;'></span> </span>
            </div>
        </div> 
        <div class="running-plan">
        <span class="text">&emsp;&emsp;&nbsp;&nbsp;Plan</span>
          <span class="circular-progress-plan"><span class="progress-value-plan" id = "running-plan">0</span></span>
          
        </div>
        <div class="running-actual">
        <span class="text">&emsp;&emsp;&nbsp;Actual</span>
        <span class="circular-progress-actual"><span class="progress-value-actual">0</span></span>
          
        </div>
        <div class="running-variance">
        <span class="text">&emsp;&emsp;Variance</span>
        <span class="circular-progress-variance"><span class="progress-value-variance">0</span></span>
          
        </div>
      </div>
      <div class = "grid-mid">
      <div class = "mid-right">
            <div class="mid-right-title">
                <span class="mid-database">DATABASE</span>
            </div>
          <span class = "title"><span id = "table-database"></span></span>
        </div>
        <div class = "mid-left">
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
      
      <div class = "grid-bottom">
        
      <div class="mid-left-title">
          <span class = 'mid-output'>OUTPUT MONITORING</span>
          </div>
          <div class="grid-mid-left">
            
            <div class = "mid-left3">
              <h1>&nbsp;PLAN   &nbsp;&emsp;&emsp;:</h1><br>
              <h1>&nbsp;ACTUAL &emsp;:</h1><br>
              <h1 class = "vari" >&nbsp;VAR &emsp;&emsp;&emsp;:</h1>
            </div>
            <div class = "mid-left4">
              
              <span><span class = "actual" id= "actual">0</span></span><br><br>
              <span class = "vari"><span class = "variance">0</span></span>
            </div>
          </div>
        
        
      </div>
    </div>

<script src="..\testj\script\script.js"></script>
</body>
</html> 