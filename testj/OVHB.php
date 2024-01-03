<?php
	include_once 'includes/connect_af.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> OVH </title>
        <link rel="stylesheet" type="text/css" href="..\testj\style\ovhb.css">   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!--  Include jQuery  to simplify the AJAX request handling.-->
        
</head>
<body>
  
  <div class = "all">
    <div class="top1">
      <div class = "top">
        <span style= 'font-size: 40px;'>&emsp;OVERHEAD 2</span><a class = "rbutton" href="logout.php">LOGOUT</a> 
      </div>
      <div class="top2">
      <div class="left-top">
        <span style = 'color: green;'> Date:  <span style = 'color: white;'><?php $currentDate = date('F j, Y'); echo $currentDate; ?></span> </span>
         
      </div>
      <div class="right-top">
      <span style = 'color: green;'> Time: <span id = "clock" onload="currentTime()" style = 'color: white;'></span> </span>  
        
      </div>
      </div>
    </div>
      <div class="container">
        <div class="output-monitoring">
          <span class = "output-monitoring-title">Output Monitoring</span>
          <div class="grid-output">
            <div class="output1">
            <span style = 'color: green;'>Plan/Day:&emsp;&emsp;&nbsp;<strong><span style = 'color: white;' id = "total_plan" ></span></strong></span>
            </div>
            <div class="output2">
            <span style = 'color: green;'>Plan/Shift:&nbsp;<strong><span style = 'color: white;' id = "current_plan"></span></strong></span>
            </div>
            <div class="output3">
              <span style = 'color: green;'>Last Shift Var: <span id = "last_var" style = 'color: white;'>0</span></span>
            </div>
            <div class="output4">
              <span style = 'color: green;'>Timer: &emsp; &nbsp; &nbsp;<span id = "timer" style = 'color: white;'>0</span></span>
            </div>
            <div class="output5">
              <span style = 'color: green;'> Current Shift: &nbsp; <span id = "shift_code" style = 'color: white;'></span> </span>
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
        <div class = "bottom-right-ovh">
            <div class="bottom-right-ovh-title">
                <span class="ovh">Overhead Scanning</span>
            </div>
            <div class="eng-frame">
                <h4>Engine No. &emsp;&emsp;&nbsp;&nbsp;: <span id='eng_no'>TEST123E</span></h4>
                <h4>Frame No. &emsp;&emsp;&emsp;: <span id='frm_no'>TEST123F</span></h4>
                <h4>JO Engine No.&emsp; :  <span id='jo_eng_no'>TEST123JE</span></h4>
                <h4>JO Frame No. &emsp;&nbsp;: <span id='jo_frm_no'>TEST123JF</span></h4>
                <span><label for = "model_actual" class = 'scan-here'>Scan Here&emsp;&emsp;&nbsp;&nbsp; :</label>
            <input type= "text" id= "model_actual"  class = 'scan-input' placeHolder="Click Here" oninput="updateProgressBar()"/><br></span>
        
            </div>
            </div>
        <div class = "bottom-right">
            <div class="bottom-right-ready">
            <span class = "scan">READY...</span>
            </div>
          
       </div>
          
    </div>
        
      
    </div>
  
    
<script src="..\testj\script\3dtr.js"></script>
</body>
</html> 


