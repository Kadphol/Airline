<?php
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = mysqli_query($db, "SELECT * 
                                FROM route
                                WHERE RouteID='" . $_GET["RouteID"] . "'");
while ($result = mysqli_fetch_array($query)) {
    $RouteID = $result['RouteID'];
    $Origin = $result['Origin'];
    $Destination = $result['Destination'];
    $Miles = $result['Miles'];
}
error_reporting(~E_NOTICE);
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
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="row d-flex justify-content-center">
        <div class="card-container col-md-8">
            <div class="card-body">
                <div class="form-row">
                    <input type="button" value="<Back" class='btn btn-primary btn-sm my-2 mx-2' style="height:30px;" onclick="window.location.href = 'AirportInformation.php'">
                    <h1><b>RouteID : <?php echo $RouteID ?></b></h1>
                </div>
                <hr>
                <div class="text-right">
                    <div class="form-inline offset-md-10">
                        <form action="EditRoute.php" method="get">
                            <button type="submit" name="Edit" class='btn btn-primary mx-2' value="<?php echo $RouteID ?>">Edit</button>
                        </form>
                        <form action="#" method="post">
                            <button type="submit" name="Delete" class='btn btn-primary' value="1">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-left:5%; margin-bottom:5%">
                    <b>Origin:</b> <?php echo $Origin ?><br>
                    <b>Destination:</b> <?php echo $Destination ?><br>
                    <b>Miles:</b> <?php echo $Miles ?><br>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
<?php
$Delete = $_POST['Delete'];
if ($Delete == 1) {
    $sql = "DELETE FROM route WHERE RouteID='$RouteID'";
    if (!mysqli_query($db, $sql)) {
        die('Error: ' . mysqli_error($db));
    }
    header('location: AirportInformation.php');
}

?>