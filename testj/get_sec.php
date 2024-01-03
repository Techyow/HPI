<?php
include_once 'includes/connect.php';
session_start();

$sql = "SELECT * FROM PCS_TimeTable WHERE SEQ = 1"
$stmt = odbc_exec($conn,$sql);

if(!$stmt) {
    echo 'Error';
}
while ($data = odbc_fetch_array($stmt)) {
    $sec = $data['CTSec'];
    echo $sec;
}

?>