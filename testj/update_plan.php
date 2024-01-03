<?php
include_once 'includes/connect.php';
session_start();
    date_default_timezone_set('Asia/Manila');
    $phTime = date('H:i:s');

    $sql = "SELECT TOP 1 * FROM TimeTable_Copy WHERE PTime <= '$phTime' ORDER BY PTime DESC ";
    //$sql = "select * from PCS_TimeTable where Ptime = '$currentTimeph' and Line = '$line'";
    //$sql = "SELECT * FROM PCS_TimeTable ORDER BY ABS(TIMESTAMPDIFF(SECOND,Ptime, $currentTimeph))ASC LIMIT 1";
    $stmt = odbc_exec($conn,$sql);
        // echo'<br>estab';
    if(!$stmt) {
        echo 'Error';
    }
    if ($data = odbc_fetch_array($stmt)) {
        $plan = $data['Plan'];
        echo $plan;
      }
    else{
        echo 0;
      }
      
?> 

