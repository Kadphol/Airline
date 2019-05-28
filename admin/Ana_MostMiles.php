<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT MemberID,CONCAT(FirstName,' ',LastName) AS Name,MilesPoint
            FROM Member
            ORDER BY MilesPoint DESC";
    $query = mysqli_query($db,$sql);
    $Count = 1;
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
        <title>Most Milespoint of Member Report</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <div class="row d-flex justify-content-center">
    <div class="card-container col-md-6">
    <div class="card-body">
        <div>
            <h1><b>Most Milespoint of Member</b></h1>
            <table class='table text-center'>
                <tr>
                    <td><b>No.</b></td>
                    <td><b>MemberID</b></td>
                    <td><b>Name</b></td>
                    <td><b>Milespoint</b></td>
                </tr>
                <?php
                if($query) {
                    while($row= mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>".$Count."</td>";
                        echo "<td>".$row["MemberID"]."</td>";
                        echo "<td>".$row["Name"]."</td>";
                        echo "<td>".$row["MilesPoint"]."</td>";
                        $Count++;
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>