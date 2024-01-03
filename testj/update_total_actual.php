<?php
include_once 'includes/connect_af.php';

// Assuming $Shift is defined elsewhere in your code or set it as needed
$Shift = 1;

$query = "SELECT SUM(ACTUAL_QTY) as total_actual FROM AF WHERE SHIFT = $Shift";
$result = odbc_exec($conn, $query);

if ($result) {
    $row = odbc_fetch_array($result);
    $totalActual = $row['total_actual'];
    echo json_encode(['total_actual' => $totalActual]);
} else {
    echo json_encode(['error' => 'Database query failed']);
}

odbc_close($conn);
?>
