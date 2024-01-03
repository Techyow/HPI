<?php
include_once 'includes/connect_af.php'; // Include your database connection code

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Retrieve the current value from the database based on MODEL_NAME
    $model_actual = $_GET['model_actual'];
    $sql = "SELECT ACTUAL_QTY FROM AF WHERE MODEL_NAME = ?";
    $stmt = odbc_prepare($conn, $sql);

    if ($stmt && odbc_execute($stmt, array($model_actual))) {
        $row = odbc_fetch_array($stmt);

        if (is_array($row) && isset($row['ACTUAL_QTY'])) {
            $currentValue = $row['ACTUAL_QTY'];
        } else {
            $currentValue = $row['ACTUAL_QTY']; // Set a default value if the data is not found or invalid
        }
    } else {
        $currentValue = $row['ACTUAL_QTY']; // Set a default value if no data is found
    }

    // Close the database connection
    odbc_close($conn);

    // Return the current value as JSON
    echo json_encode(['currentValue' => $currentValue]);
}
?>
