<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT 
    CASE WHEN hour = 0 THEN '00.00 - 01.00'
         WHEN hour = 1 THEN '01.00 - 02.00'
         WHEN hour = 2 THEN '02.00 - 03.00'
         WHEN hour = 3 THEN '03.00 - 04.00'
         WHEN hour = 4 THEN '04.00 - 05.00'
         WHEN hour = 5 THEN '05.00 - 06.00'
         WHEN hour = 6 THEN '06.00 - 07.00'
         WHEN hour = 7 THEN '07.00 - 08.00'
         WHEN hour = 8 THEN '08.00 - 09.00'
         WHEN hour = 9 THEN '09.00 - 10.00'
         WHEN hour = 10 THEN '10.00 - 11.00'
         WHEN hour = 11 THEN '11.00 - 12.00'
         WHEN hour = 12 THEN '12.00 - 13.00'
         WHEN hour = 13 THEN '13.00 - 14.00'
         WHEN hour = 14 THEN '14.00 - 15.00'
         WHEN hour = 15 THEN '15.00 - 16.00'
         WHEN hour = 16 THEN '16.00 - 17.00'
         WHEN hour = 17 THEN '17.00 - 18.00'
         WHEN hour = 18 THEN '18.00 - 19.00'
         WHEN hour = 19 THEN '19.00 - 20.00'
         WHEN hour = 20 THEN '20.00 - 21.00'
         WHEN hour = 21 THEN '21.00 - 22.00'
         WHEN hour = 22 THEN '22.00 - 23.00'
         WHEN hour = 23  THEN '23.00 - 00.00'
         END AS hour,
     COUNT(*) AS Amount
     FROM (SELECT FLOOR(HOUR(DepartureDate)/1) as hour FROM Flight) f
     GROUP BY CASE WHEN hour = 0 THEN '00.00 - 01.00'
         WHEN hour = 1 THEN '01.00 - 02.00'
         WHEN hour = 2 THEN '02.00 - 03.00'
         WHEN hour = 3 THEN '03.00 - 04.00'
         WHEN hour = 4 THEN '04.00 - 05.00'
         WHEN hour = 5 THEN '05.00 - 06.00'
         WHEN hour = 6 THEN '06.00 - 07.00'
         WHEN hour = 7 THEN '07.00 - 08.00'
         WHEN hour = 8 THEN '08.00 - 09.00'
         WHEN hour = 9 THEN '09.00 - 10.00'
         WHEN hour = 10 THEN '10.00 - 11.00'
         WHEN hour = 11 THEN '11.00 - 12.00'
         WHEN hour = 12 THEN '12.00 - 13.00'
         WHEN hour = 13 THEN '13.00 - 14.00'
         WHEN hour = 14 THEN '14.00 - 15.00'
         WHEN hour = 15 THEN '15.00 - 16.00'
         WHEN hour = 16 THEN '16.00 - 17.00'
         WHEN hour = 17 THEN '17.00 - 18.00'
         WHEN hour = 18 THEN '18.00 - 19.00'
         WHEN hour = 19 THEN '19.00 - 20.00'
         WHEN hour = 20 THEN '20.00 - 21.00'
         WHEN hour = 21 THEN '21.00 - 22.00'
         WHEN hour = 22 THEN '22.00 - 23.00'
         WHEN hour = 23  THEN '23.00 - 00.00'
         END";
    $query = mysqli_query($db,$sql);
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
        <title>Peaktime Report</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <div class="row d-flex justify-content-center">
    <div class="card-container col-md-6">
    <div class="card-body">
        <div>
            <h1><b>Peaktime</b></h1>
            <table class='table text-center'>
                <tr>
                    <td><b>Time</b></td>
                    <td><b>Amount</b></td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$row["hour"]."</td>";
                    echo "<td>".$row["Amount"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>