<style>
    table {
        border-collapse: collapse;
        margin: 10px; /* Reduce the margin */
        font-size: 15px; /* Decrease the font size for all rows */
        font-family: sans-serif;
        min-width: 820px; /* Increase the minimum width for the table */
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.15); /* Reduce the shadow */
    }

    tr {
        text-align: center;
    }

    th, td {
        padding: 8px 15px; /* Increase the padding for cells to make data wider */
    }

    th {
        background-color: #D1F3C8;
    }

    /* Add a CSS class to highlight rows */
    .highlighted {
        background-color: #f7f734; /* Change this to your desired highlight color */
        
    } 
    
    .highlighted-red {
        background-color: #ee3939; /* Red color for highlighting */
        padding: 10px 15px; /* Increase the padding for highlighted rows to match the table cells */
        color: white;
    }

    .highlighted-green {
        background-color: #83d471; /* Green color for highlighting */
        padding: 10px 15px; /* Increase the padding for highlighted rows to match the table cells */
      /*   box-shadow: 2px 2px rgba(0, 0, 0, 0.15); Reduce shadow for highlighted rows */
        font-size:24.2px;
        border:4px solid black;
        
    }
</style>




<?php
include_once 'includes/connect_af.php';
session_start();

$currentTimeUTC = date('H:i:s');
$currentTimeph = date('H:i:s', strtotime($currentTimeUTC) + 8 * 3600); // Format: HH:MM:SS
$sql = "select * from WorkSched where TimeIn < '$currentTimeph' and TimeOut > '$currentTimeph'";

$stmt = odbc_exec($conn, $sql);

if (!$stmt) {
    echo 'Error';
}

echo "<table>";
echo "<tr>";
echo '<th>MN</th>';
echo '<th>J.O. No.</th>';
echo '<th>CLR</th>';
echo '<th>TS</th>';
echo '<th>TE</th>';
echo '<th>SEC</th>';
echo '<th>PLN</th>';
echo '<th>ACT</th>';
echo '</tr>';

while ($data = odbc_fetch_array($stmt)) {
    $s1timein = $data['Shift'];
    $sql = "select * from AF where SHIFT = '$s1timein'";
    $stmt = odbc_exec($conn, $sql);

    if (!$stmt) {
        echo 'Error';
    }

    while ($obj = odbc_fetch_array($stmt)) {
        // Check if TS < current time and TE > current time
        $ts = strtotime($obj['TIME_START']);
        $te = strtotime($obj['TIME_END']);
        $highlightClass = '';

        if ($ts < strtotime($currentTimeph) && $te > strtotime($currentTimeph)) {
            $highlightClass = 'highlighted-green';
        } else if ( strtotime($currentTimeph) > $te && $obj['PLAN_QTY'] > $obj['ACTUAL_QTY'] ) {
            $highlightClass = 'highlighted-red';
        }else if ( $obj['PLAN_QTY'] <= $obj['ACTUAL_QTY'] ) {
            $highlightClass = 'highlighted';
        }

        echo '<tr class="' . $highlightClass . '">';
        echo "<td>" . $obj['MODEL_NAME'] . "</td>";
        echo "<td>" . $obj['JO_NO'] . "</td>";
        echo "<td>" . $obj['COLOR'] . "</td>";
        echo "<td>" . $obj['TIME_START'] . "</td>";
        echo "<td>" . $obj['TIME_END'] . "</td>";
        echo "<td>" . $obj['SPEED'] . "</td>";
        echo "<td>" . $obj['PLAN_QTY'] . "</td>";

        // Check the value of 'ACTUAL_QTY' and print accordingly
        echo "<td>";
        if ($obj['ACTUAL_QTY'] == 0) {
            echo "-";
        } else {
            echo $obj['ACTUAL_QTY'];
        }
        echo "</td>";
        echo '</tr>';
    }
}
echo '</table>';
?>