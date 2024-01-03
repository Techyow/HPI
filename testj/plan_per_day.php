<?php
include_once 'includes/connect_af.php';
session_start();

   $sql = "SELECT SUM(PLAN_QTY) AS total_plan_qty FROM AF";
   $stmt = odbc_exec($conn, $sql);
 if ($stmt) {
    $row = odbc_fetch_array($stmt);
    $totalPlanQty = $row['total_plan_qty'];
    echo $totalPlanQty;
} 
?>