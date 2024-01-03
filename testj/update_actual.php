<?php
include_once 'includes/connect_af.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $model_actual = $_POST['model_actual'];
    $sql = "SELECT ACTUAL_QTY FROM AF WHERE MODEL_NAME = ?";
    $stmt = odbc_prepare($conn, $sql);

    if ($stmt) {
        if (odbc_execute($stmt, array($model_actual))) {
            $row = odbc_fetch_array($stmt);
            if ($row !== false) {
                $currentValue = $row['ACTUAL_QTY'];
                $currentValue++;

                $sqlUpdate = "UPDATE AF SET ACTUAL_QTY = ? WHERE MODEL_NAME = ?";
                $stmtUpdate = odbc_prepare($conn, $sqlUpdate);

                if ($stmtUpdate && odbc_execute($stmtUpdate, array($currentValue, $model_actual))) {

                    echo json_encode(['updatedValue' => $currentValue]);
                } 

            } 
        } 
    } 
    odbc_close($conn);
}
?>
