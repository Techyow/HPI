<?php
include_once 'includes/connect_af.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="..\testj\style\style1.css">   
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!--  Include jQuery  to simplify the AJAX request handling.-->
        <title>AF LINE 1 Production Monitoring</title>
    </head>
    <body>
    <div class = "all">
      <div class = "top">
        <h1>
            AF LINE 1 Production Monitoring
        </h1>
      </div>
      <div class = "grid-top">
        <div class = "top-left">
          <h2>
            Current Shift:<span id = "shift_code"></span>
          </h2>
        </div>
        <div class = "top-mid">
          <h2>
            Date:  <?php $currentDate = date('F j, Y'); echo $currentDate; ?>  
          </h2>
        </div>
        <div class = "top-right">
          <h2>
            Time: <span id = "clock" onload="currentTime()"></span>
          </h2>
        </div>
      </div>
      <div class = "grid-mid">
        <div class = "mid-left">
          <h3 style = "text-align: right;">
            OUTPUT M
          </h3><h3> ONITORING</h3>
          <div class = "mid-left1">
            <p>PLAN/DAY:</p>
            <h1>PLAN:</h1>
            <h1>ACTUAL:</h1>
            <h1>VARIANCE:</h1>
          </div>
          <div class = "mid-left2">
            <p>CUR. SHIFT PLAN:</p>
            <h1>0</h1>
            <h1>0</h1>
            <h1>0</h1>
          </div>
        </div>
        <div class = "mid-right">
          <h3 class = "title">
            DATABASE
            <span id = "table-database"></span>
          </h3>
        </div>
      </div>
      <div class = "grid-bottom">
        <div class = "bottom-left">
          <h3 style = "text-align: right;">
            DP
          </h3><h3>R</h3>
          <div class = "bottom-left1">
            <h3>ENGINE NO.</h3>
          </div>
          <div class = "bottom-left2">
            <h3>FRAME NO.</h3>
          </div>
        </div>
        <div class = "bottom-right">
          <h1 class = "scan">
            WAIT....
          </h1>
        </div>
      </div>
      <script src="..\testj\script\script.js"></script>
    
    </div>

    
    </body>
</html>