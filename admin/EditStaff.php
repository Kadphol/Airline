<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * 
                                    FROM staff
                                    WHERE StaffID='" . $_GET["Edit"] . "'");
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
    // error_reporting(~E_NOTICE);
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
        <title>Edit | Staff Profile</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
    <div class="row d-flex justify-content-center" style="margin-bottom:10%;">
            <div class="card-container col-md-8">
                <div class="card-body">


        <h1><b>Staff Profile : </b><?php echo $StaffID?></h1>
        <hr>
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
        <hr>
        <form action="EditStaff_php.php" method="post">
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                    <label>Email</label>
                    <input type="email" name="Email" class="form-control">
                </div>
            </div>
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                    <label>Password</label>
                    <input type="text" name="Password" class="form-control">
                </div>
            </div>
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                <label>First Name</label>
                <input type="text" class="form-control" name="FirstName">
                </div>
            </div>
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                <label>Last Name</label> 
                <input type="text" class="form-control" name="LastName">
                </div>
            </div>
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                    <label>Country Code (+66)</label> 
                    <input type="text" class="form-control" name="Country">
                </div>
            </div>
            <div class="form-row justify-content-left">
                <div class="form-group col-md-5">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="PhoneNumber"> 
                </div>
            </div>
            <div class="form-row justify-content-left">
                <div class="form-group col-md-10">
                    <label>Address</label>
                    <input type="text" class="form-control" name="Address">
                 </div>
            </div>
            <br>
            <div class="contrainer d-flex justify-content-center">
                <button type="Submit" name="Edit" class="btn btn-primary" value="<?php echo $StaffID ?>" >Edit</button>
            </div>
        </form>
        </div>
            </div>
        </div>
    </body>
</html>