<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT s.AirportID,a.AirportName,COUNT(StaffID) 
                            FROM staff s, airport a
                            WHERE s.AirportID = a.AirportID
                            GROUP BY AirportID");
while ($result = mysqli_fetch_array($query)) {
    $AirportID[] = $result['AirportID'];
    $Staff[] = $result['COUNT(StaffID)'];
    $AirportName[] = $result['AirportName'];
}
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
<html>

<head>

    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="row d-flex justify-content-center">
        <div class="card-container">
            <div class="card-body">
                <h2><b>Count Staff Report</b></h2>

                <table class="table text-center">
                    <tr class="header">
                        <th>AirportID</th>
                        <th>AirportName</th>
                        <th>Count Staff</th>
                    </tr>
                    <?php for ($i = 0; $i < sizeof($AirportID); $i++) { ?>
                        <tr>
                            <td><?php echo $AirportID[$i] ?></td>
                            <td><?php echo $AirportName[$i] ?></td>
                            <td><?php echo $Staff[$i] ?></td>
                            <!-- <td>Manage</td> -->
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>