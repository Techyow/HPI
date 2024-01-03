<?php
include_once 'includes/connect_af.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $MN = $_POST["MN"];
    $JO = $_POST["JO"];
    $CLR = $_POST["CLR"];
    $SHFT = $_POST["SHFT"];


    $sql = "INSERT INTO [dbo].[AF]
        ([MODEL_NAME]
           ,[JO_NO]
           ,[COLOR]
           ,[SHIFT])
     VALUES (?,?,?,?)";

     $stmt = odbc_prepare($conn, $sql);

     if(!$stmt){
        die("SQL statement preparation failed: " . odbc_errormsg($conn));
     }

     if (!odbc_execute($stmt, array($MN , $JO , $CLR , $SHFT ))) {
        die ("SQL statement preparation failed: " . odbc_errormsg($conn));
     } else {
        echo "Added Successfully";
     }

     odbc_close($conn);
}   





?>