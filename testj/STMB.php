<?php
include_once 'includes\connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
      <title> STM </title>
      <link rel="stylesheet" type="text/css" href="..\testj\style\stmb.css">   
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <!--  Include jQuery  to simplify the AJAX request handling.-->  
    </head>
    <body>
      <div class="header">
        <h1 class = 'title'>Total Quality Control</h1>
      </div>
      <div class="top-row">
        <div class="top-column">
          <h2>CBU = <span id = 'cbu-database'>0</span></h2>
        </div>
        <div class="top-column">
          <h2>STM = <span id = 'stm-database'>0</span></h2>
        </div>
      </div>
      <div class="mid">
      <span class="engine-no"><h1>Engine Number &emsp;: &emsp;<span id = 'engine-scanned'>TEST123E</span></h1></span>
      <span class="frame-no"><h1>Frame Number &emsp;&nbsp;: &emsp;<span id = 'frame-scanned'>TEST123F</span></h1></span>
      </div>
      <div class="bottom1">
        <span class="scan-here">Scan Here : <input type="text" class = 'scan-input'></span>
      </div>
      <div class="bottom2">
        <span class = 'status'>READY</span>
      </div>
    </body>   
<script src="..\testj\script\stm.js"></script>
</html>