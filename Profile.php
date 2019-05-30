<?php
    $db = mysqli_connect("localhost","root","","airline"); //database connect
    session_start(); //start session
    if(isset($_SESSION['MEmail'])) { //check if already logged in
        $email = $_SESSION['MEmail'];
        $query = "SELECT * FROM Member WHERE Email = '$email'";
        $result = mysqli_query($db,$query); //query profile information
        $row = mysqli_fetch_assoc($result);
        $email = $row['Email'];
        $name = $row['FirstName']." ".$row['LastName'];
        $passport = $row['Passport'];
        $miles = $row['MilesPoint'];
        $DOB = $row['DOB'];
        $phone = "(".$row['Country'].")".$row['PhoneNumber'];
    }
?>



<!-- import font roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<!-- import style -->
<link rel="stylesheet" type="text/css" href="DefaultStyle.css">

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
    <div class="row">
        <div class="card-container col-md-8">
            <div class="card-body">
            <h1><b>Profile</b></h1>
                <h2>Account</h2>
                <hr>
                <p>
                    <b>Email</b><br>
                    &emsp;<?echo $email;?> 
                </p>
            </div>
        </div>
    </div>
    <div class="row bottom-margin">
        <div class="card-container col-md-8 mt-3">
            <div class="card-body">
                <h2>Profile</h2>
                <hr>
                <p>
                <b>Personal Info</b><br>
                    &emsp;<b>Name</b><br>
                    &emsp;<?echo $name;?><br><br>
                    &emsp;<b>Passport No.</b><br>
                    &emsp;<?echo $passport;?><br><br>
                    &emsp;<b>Milespoint</b><br>
                    &emsp;<?echo $miles;?><br><br>
                    &emsp;<b>Date of Birth</b><br>
                    &emsp;<?echo $DOB;?><br><br>
                    &emsp;<b>Phone Number</b><br>
                    &emsp;<?echo $phone;?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>