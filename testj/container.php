<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Container and Row Example</title>
    <style>
        /* Define a container class */
        .container {
            max-width: 100%; /* Container width expands to the full viewport width */
            padding: 20px; /* Add some padding for spacing */
            background-color: #f0f0f0; /* Optional background color */
        }

        /* Define a row class for creating a row of columns */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        /* Define a column class for creating individual columns within the row */
        .column {
            flex: 1; /* Each column takes up an equal portion of the row */
            padding: 10px; /* Add some padding for spacing between columns */
            box-sizing: border-box; /* Include padding in the column's width */
        }

        /* Example styles for the columns */
        .column {
            background-color: #3498db;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="column">Column 1</div>
            <div class="column">Column 2</div>
            <div class="column">Column 3</div>
        </div>
    </div>
</body>
</html>
