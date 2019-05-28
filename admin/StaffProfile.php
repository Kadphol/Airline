<?php
    session_start();
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * FROM staff WHERE StaffID = '".$_SESSION['StaffID']."'");
    while ($result = mysqli_fetch_array($query)) {
        $StaffID = $result['StaffID'];
        $Email = $result['Email'];
        $Firstname = $result['FirstName'];
        $Lastname = $result['LastName'];
        $Sex = $result['Sex'];
        $Passport = $result['Passport'];
        $Address = $result['Address'];
        $DOB = $result['DOB'];
        $Country = $result['Country'];
        $Phone = $result['PhoneNumber'];
        $AirportID = $result['AirportID'];
        $Position = $result['Position'];
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
        <h1>Staff Profile : <?php echo $StaffID?></h1>

        <h3>Account</h3>
        <hr>
        <p>
            Email<br>
            &emsp;<?php echo $Email?>
        </p>
        <br>
        <h3>Profile</h3>
        <hr>
        <p>
            Personal Info<br>
            &emsp;Name<br>
            &emsp;<?php echo $Firstname." ".$Lastname?><br><br>
            &emsp;Sex<br>
            &emsp;<?php if($Sex=='m'){echo "Male";}
                        else{echo "Female";} ?><br><br>
            &emsp;Passport No.<br>
            &emsp;<?php echo $Passport?><br><br>
            &emsp;Street Address<br>
            &emsp;<?php echo $Address?><br><br>
        &emsp;Date of Birth<br>
        &emsp;<?php echo $DOB?><br><br>
        &emsp;Phone Number<br>
        &emsp;<?php echo "(".$Country.")".$Phone?><br><br>
        Staff Info<br>
        &emsp;AirportID<br>
        &emsp;<?php echo $AirportID?><br><br>
        &emsp;StaffID<br>
        &emsp;<?php echo $StaffID?><br><br>
        &emsp;Position<br>
        &emsp;<?php echo $Position?>
        </p>
        <input type="button" value="Back" onclick="window.location.href = 'WelcomeStaff.php'">
    </body>
</html>