<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * FROM airport");
    while ($result = mysqli_fetch_array($query)) {
        $airport[] = $result['AirportID'];
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
    <div class="row justify-content-center" style="margin-bottom:10%">
    <div class="card-container col-md-6">
        <div class="card-body">
   
    <h1><b>Staff Regis Form</b></h1>
    <hr>
    <form action="StaffRegis_php.php" method="post">
        <h3>Profile</h3>
        <!-- AirportID query from database -->
        <div class="container col-md-6">
        <select name="AirportID" class="form-control">
            <option value="" Selected>--AirportID--</option>
            <?php
            for ($i = 0; $i<sizeof($airport); $i++) { ?>
                <option> <?php echo $airport[$i] ?> </option>
            <?php } ?>
        </select><br>
        <input type="email" name="Email" placeholder="Email" class="form-control"> <br>
        <input type="password" name="Password" placeholder="Password" class="form-control"><br>
        <input type="password" name="ConPassword" placeholder="Confirm Password" class="form-control"><br>
        <input type="text" name="Passport" placeholder="Passport No." class="form-control"><br>
        <input type="text" name="FirstName" placeholder="First Name" class="form-control"><br>
        <input type="text" name="LastName" placeholder="Last Name" class="form-control"><br>
        <div class="form-row">
            <input type="radio" name="sex" value="m" checked class="mx-2"> Male
            <input type="radio" name="sex" value="f" class="mx-2"> Female<br><br>
        </div>
        <p>Dath of Birth :</p>
        <input type="Date" name="DOB" value="DOB" class="form-control"><br>
        <input type="text" name="Country" placeholder="+66" class="form-control"><br>
        <input type="tel" name="PhoneNumber" placeholder="Phone Number" class="form-control"><br>
        <input type="text" name="Address" placeholder="Address" class="form-control"> <br>
        <input type="text" name="Position" placeholder="Position" class="form-control"> <br>
        </div>
                <div class="container d-flex justify-content-center">
        <input type="submit" value="Sign Up" class="btn btn-success">
        </div>
    </form>
    </div>
    </div>
    </div>
</body>

</html>