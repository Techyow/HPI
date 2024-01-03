<?php
include_once 'includes/connect_af.php';
session_start();
      //  $time = "select * from WorkSched where shift = 1"
        $currentTimeUTC = date('H:i:s');
        $currentTimeph = date('H:i:s', strtotime($currentTimeUTC) + 8 * 3600); // Format: HH:MM:SS
        $sql = "select * from WorkSched where TimeIn < '$currentTimeph' and TimeOut > '$currentTimeph'";
        
        $stmt = odbc_exec($conn,$sql);
        // echo'<br>estab';

        if(!$stmt) {
            echo 'Error';
        }
        while ($data = odbc_fetch_array($stmt)) {
            $s1timein = $data['Shift'];
            
           $sqlsum = "SELECT SUM(PLAN_QTY) AS current_plan FROM AF WHERE SHIFT = ?";
           $stmtsum = odbc_prepare($conn, $sqlsum);
          
         if ($stmtsum) {
           if (odbc_execute($stmtsum,array($s1timein))) {
            $row = odbc_fetch_array($stmtsum);
            if ($row !== false){
                $totalPlanQty = $row['current_plan'];
                echo $totalPlanQty;
            }
           } 
        } 
        }
?> 