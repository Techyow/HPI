<?php
include_once 'includes/connect_af.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $model_name = $_POST['model_name'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $speed = $_POST['speed'];
    $plan = $_POST['plan'];

    
    // Update the data in the database
    $sql = "UPDATE AF SET TIME_START = ?, TIME_END = ?, SPEED = ?, PLAN_QTY = ? WHERE MODEL_NAME = ?";
    $stmt = odbc_prepare($conn, $sql);
    //Execute
    if ($stmt && odbc_execute($stmt, array($time_start, $time_end, $speed, $plan, $model_name))) {
        echo json_encode(['message' => 'Data updated successfully.']);
    } else {
        echo json_encode(['error' => 'Error updating data: ' . odbc_errormsg()]);
    }
}
?>
