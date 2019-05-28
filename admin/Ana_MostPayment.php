<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT p.CardType AS Type,COUNT(*) AS Count
            FROM PaymentMethod p JOIN Billing b ON p.CardNo = b.CardNo
            WHERE b.PayDate BETWEEN '2019-01-01' AND '2019-12-31'
            GROUP BY p.CardType
            ORDER BY Count DESC";
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
        <title>Most Payment method Report</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <div class="row d-flex justify-content-center">
    <div class="card-container col-md-6">
    <div class="card-body">
        <div>
            <h1><b>Most Payment method</b></h1>
            <table class='table text-center'>
                <tr>
                    <td><b>Type</b></td>
                    <td><b>Count</b></td>
                </tr>
                <?php
                while($row= mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$row["Type"]."</td>";
                    echo "<td>".$row["Count"]."</td>";
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