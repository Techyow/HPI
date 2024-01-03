<?php
include_once 'includes/connect.php';
session_start();

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password']; // Get the user's password from the registration form
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $line = $_POST['line'];
    $process = $_POST['process'];

    $sql = "INSERT INTO [dbo].[PCS_LogIn]
    ([username]
    ,[password]
    ,[line]
    ,[process]) VALUES (?,?,?,?)";
    $stmt = odbc_prepare($conn, $sql);

    if(!$stmt){
       die("SQL statement preparation failed: " . odbc_errormsg($conn));
    }

    if (!odbc_execute($stmt, array($username , $hashed_password , $line , $process))) {
       die ("SQLs statement preparation failed: " . odbc_errormsg($conn));
    } else {
       echo "Added Successfully";
    }

    odbc_close($conn);
 }

?>