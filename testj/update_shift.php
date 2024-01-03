<?php
include_once 'includes/connect.php';

session_start();
      //  $time = "select * from WorkSched where shift = 1"
        $currentTimeUTC = date('H:i:s');
        $currentTimeph = date('H:i:s', strtotime($currentTimeUTC) + 8 * 3600); // Format: HH:MM:SS
        $sql = "select * from PCS_WorkSched where TimeIn <= '$currentTimeph' and TimeOut >= '$currentTimeph'";
        
        $stmt = odbc_exec($conn,$sql);
        // echo'<br>estab';

        if(!$stmt) {
            echo 'Error';
        }
        while ($data = odbc_fetch_array($stmt)) {
            $s1timein = $data['ShiftDesc'];
            echo $s1timein;
           }
?> 