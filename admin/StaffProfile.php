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

<html>
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
    </body>
</html>