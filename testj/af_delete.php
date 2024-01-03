
<?php
include_once 'includes/connect_af.php';
session_start();
// Retrieve the criteria for deletion from the form
$criteria_column = $_POST["criteria_column"];
$criteria_value = $_POST["criteria_value"];

// Create the DELETE SQL query
$sql = "DELETE FROM AF WHERE $criteria_column = ?";

// Prepare the SQL statement
$stmt = odbc_prepare($conn, $sql);

if (!$stmt) {
    die("SQL statement preparation failed: " . odbc_errormsg($conn));
}

// Bind the parameter for the criteria value
if (!odbc_execute($stmt, array($criteria_value))) {
    die("Error deleting data: " . odbc_errormsg($conn));
}

echo "Data deleted successfully"


?>