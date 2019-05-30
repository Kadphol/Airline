<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * 
                                FROM staff
                                WHERE StaffID='".$_GET["StaffID"]."'");
    while ($result = mysqli_fetch_array($query)) {
        $StaffID = $result['StaffID'];
        $Email = $result['Email'];
        $Password = $result['Password'];
        $Passport = $result['Passport'];
        $FirstName = $result['FirstName'];
        $LastName = $result['LastName'];
        $Sex = $result['Sex'];
        $DOB = $result['DOB'];
        $Country = $result['Country'];
        $PhoneNumber = $result['PhoneNumber'];
        $Address = $result['Address'];
        $Position = $result['Position'];
        $AirportID = $result['AirportID'];
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
        <title>Staff Profile</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
    <div class="row d-flex justify-content-center">
            <div class="card-container col-md-8">
                <div class="card-body">

                <div class="form-row">
                    <input type="button" value="<Back" class='btn btn-primary btn-sm my-2 mx-2' style="height:30px;" onclick="window.location.href = 'AirportInformation.php'">  <h1><b>Staff Profile :</b> <?php echo $StaffID?></h1>    
                </div>

        <hr>
        <div class="text-right">
                    <div class="form-inline offset-md-10">
                        <form action="EditStaff.php" method="get">
                            <button type="submit" name="Edit" class='btn btn-primary mx-2' value="<?php echo $StaffID ?>">Edit</button>
                        </form>
                        <form action="#" method="post">
                            <button type="submit" name="Delete" class='btn btn-primary' value="1">Delete</button>
                        </form>
                    </div>
        </div>
        <p>
            <b>Email:</b>&emsp;<?php echo $Email?><br>
            <b>Name:</b>&emsp;<?php echo $FirstName." ".$LastName?><br>
            <b>Sex:</b>&emsp;<?php if($Sex=='m'){echo "Male";}
                        else{echo "Female";} ?><br>
            <b>Passport No.:</b>&emsp;<?php echo $Passport?><br>
            <b>Date of Birth:</b>&emsp;<?php echo $DOB?><br>
            <b>Phone Number:</b>&emsp;<?php echo "(".$Country.")".$PhoneNumber?><br>
            <b>Address:</b>&emsp;<?php echo $Address?><br>
            <b>AirportID:</b>&emsp;<?php echo $AirportID?><br>
            <b>Position:</b>&emsp;<?php echo $Position?>
        </p>
        </div>
            </div>
        </div>
    </body>
</html>

<?php
    $Delete=$_POST['Delete'];
    if($Delete==1){
        $sql = "DELETE FROM staff WHERE StaffID='$StaffID'";
        if (!mysqli_query($db,$sql)) {
            die('Error: ' . mysqli_error($db));
        }
        header('location: AirportInformation.php');
    }
    

?>