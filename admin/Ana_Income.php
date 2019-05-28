<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}
$sql = "SELECT 
            CASE WHEN m = 1 THEN 'JAN 2019'
                WHEN m = 2 THEN 'FEB 2019'
                WHEN m = 3 THEN 'MAR 2019'
                WHEN m = 4 THEN 'APR 2019'
                WHEN m = 5 THEN 'MAY 2019'
                WHEN m = 6 THEN 'JUN 2019'
                WHEN m = 7 THEN 'JUL 2019'
                WHEN m = 8 THEN 'AUG 2019'
                WHEN m = 9 THEN 'SEP 2019'
                WHEN m = 10 THEN 'OCT 2019'
                WHEN m = 11 THEN 'NOV 2019'
                WHEN m = 12 THEN 'DEC 2019'
                END AS m,
                SUM(Billing.AmountPaid) AS Amount
            FROM (SELECT MONTH(PayDate) as m FROM Billing) b,Billing
            GROUP BY CASE WHEN m = 1 THEN 'JAN 2019'
                WHEN m = 2 THEN 'FEB 2019'
                WHEN m = 3 THEN 'MAR 2019'
                WHEN m = 4 THEN 'APR 2019'
                WHEN m = 5 THEN 'MAY 2019'
                WHEN m = 6 THEN 'JUN 2019'
                WHEN m = 7 THEN 'JUL 2019'
                WHEN m = 8 THEN 'AUG 2019'
                WHEN m = 9 THEN 'SEP 2019'
                WHEN m = 10 THEN 'OCT 2019'
                WHEN m = 11 THEN 'NOV 2019'
                WHEN m = 12 THEN 'DEC 2019'
                END";
$query = mysqli_query($db, $sql);
?>

<!-- import font roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<!-- import style -->
<link rel="stylesheet" type="text/css" href="StaffStyle.css">

<!-- font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!DOCTYPE html>

<head>
    <title>Income Report</title>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="row d-flex justify-content-center">
        <div class="card-container col-md-6">
            <div class="card-body">
                <h1><b>Income per month</b></h1>
                <table class='table text-center'>
                    <tr>
                        <td><b>Month</b></td>
                        <td><b>Amount(Baht)</b></td>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $row["m"] . "</td>";
                        echo "<td>" . $row["Amount"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table> 
            </div> 
        </div> 
    </div> 
</body> 
</html>