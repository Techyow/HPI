<?php
	include_once 'includes/connect_af.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> DTR LINE 3 </title>
        <link rel="stylesheet" type="text/css" href="..\testj\style\3dtr.css">   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!--  Include jQuery  to simplify the AJAX request handling.-->
        
</head>
<body>
  
  <div class = "all">
    <div class="top1">
      <div class = "top">
        <span style= 'font-size: 40px;'>&emsp;AF LINE 1 PRODUCTION MONITORING </span><a class = "rbutton" href="logout.php">LOGOUT</a> 
      </div>
      <div class="top2">
      <div class="left-top">
        <span style = 'color: green;'> Date:  <span style = 'color: black;'><?php $currentDate = date('F j, Y'); echo $currentDate; ?></span> </span>
         
      </div>
      <div class="right-top">
      <span style = 'color: green;'> Time: <span id = "clock" onload="currentTime()" style = 'color: black;'></span> </span>  
        
      </div>
      </div>
    </div>
      <div class="container">
        <div class="output-monitoring">
          <span class = "output-monitoring-title">Output Monitoring</span>
          <div class="grid-output">
            <div class="output1">
            <span style = 'color: green;'>Plan/Day:&emsp;&emsp;&nbsp;<strong><span style = 'color: black;' id = "total_plan" ></span></strong></span>
            </div>
            <div class="output2">
            <span style = 'color: green;'>Plan/Shift:&nbsp;<strong><span style = 'color: black;' id = "current_plan"></span></strong></span>
            </div>
            <div class="output3">
              <span style = 'color: green;'>Last Shift Var: <span id = "last_var" style = 'color: black;'>0</span></span>
            </div>
            <div class="output4">
              <span style = 'color: green;'>Timer: &emsp; &nbsp; &nbsp;<span id = "timer" style = 'color: black;'>0</span></span>
            </div>
            <div class="output5">
              <span style = 'color: green;'> Current Shift: &nbsp; <span id = "shift_code" style = 'color: black;'></span> </span>
            </div>
          </div>
          
        </div> 
        <div class="running-plan">
          
          <span class="plan" id="running_plan">0</span><br>
          <span class="text">Plan</span>
        </div>

        <div class="running-actual">
          
          <span><span class="actual" id="actual">0</span></span><br>
          <span class="text">Actual</span>
        </div>

        <div class="running-variance">

          <span class="vari"><span class="variance">0</span></span><br>
          <span class="text">Variance</span>
        </div>

      </div>
      <div class = "grid-mid">
        <div class = "mid-right">
            <div class="mid-right-title">
                <span class="mid-database">Production Details</span>
            </div>
          <span class = "table"><span id = "table-database"></span></span>
        </div>
        <div class = "mid-left">
        <div class = "bottom-right-dpr">
            <div class="bottom-right-dpr-title">
                <span class="dpr">DPR Scanning</span>
            </div>
            <div class="eng-frame">
                <h4>Engine No. :  <span id='eng_no'>TEST123E</span></h4>
                <h4>Frame No. : <span id='frm_no'>TEST123F</span></h4>
            </div>
            <span><label for = "model_actual" class = 'scan-here'>Scan Here:</label>
            <input type= "text" id= "model_actual"  class = 'scan-input' placeHolder="Click Here" oninput="updateProgressBar()"/><br></span>
        </div>
        <div class = "bottom-right">
            <div class="bottom-right-jo">
            <span class = 'next-jo'>Next JO NO. : <span id = 'next_jo'>1234-567-89</span></span> 
            </div>
            <div class="bottom-right-ready">
            <span class = "scan">READY...</span>
            </div>
          
       </div>
          
    </div>
        
      
    </div>
  
    
<script src="..\testj\script\3dtr.js"></script>
</body>
</html> 


