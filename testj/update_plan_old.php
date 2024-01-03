<?php
include_once 'includes/connect.php';
session_start();
    date_default_timezone_set('Asia/Manila');
    $phTime = date('H:i:s');
  
    $sqlCtime = "SELECT * FROM PCS_TimeTable WHERE SEQ = 1/*PTime >= '$phTime'*/ ";
    $stmtCtime = odbc_exec($conn,$sqlCtime);
        // echo'<br>estab';
    if(!$stmtCtime) {
        echo 'Error';
    }
    while ($data = odbc_fetch_array($stmtCtime)) {
        $ctime = $data ['CTSec'];
      

      }

      $currentTime = time();  //current timestamp
      $phTimeTimestamp = $currentTime - $ctime;  // Add 
      $deductedTimeph = date('H:i:s', $phTimeTimestamp);
    //$addedTimeph = date('H:i:s', strtotime($currentTimeUTC) + 8 * 3600 );

    $sql = "SELECT * FROM PCS_TimeTable WHERE PTime <= '$phTime' AND PTime > '$deductedTimeph' ";
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

