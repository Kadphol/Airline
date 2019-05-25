<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(isset($_SESSION['StaffID'])) {
        $id = $_SESSION['StaffID'];
        $query = "SELECT * FROM Staff WHERE StaffID = '$id'";
        $result = mysqli_query($db,$query);
        $row = mysqli_fetch_assoc($result);
        $id = "S".$row['StaffID'];
        $email = $row['Email'];
        $name = $row['FirstName']." ".$row['LastName'];
        $sex = $row['Sex'];
        $passport = $row['Passport'];
        $address = $row['Address'];
        $DOB = $row['DOB'];
        $phone = "(".$row['Country'].")".$row['PhoneNumber'];
        $airport = $row['AirportID'];
        $position = $row['Position'];
    }
?>
<html>
    <body>
        <h1>Staff Profile : <?echo $id;?>S234234</h1>
        <h3>Account</h3>
        <hr>
        <p>
            Email<br>
            &emsp;<?echo $email?>jungkookisgoldenmaknae@gmail.com
        </p>
        <br>
        <h3>Profile</h3>
        <hr>
        <p>
            Personal Info<br>
            &emsp;Name<br>
            &emsp;<?echo $name?>Jungkookie Jeon<br><br>
            &emsp;Sex<br>
            &emsp;<?if($sex==='m') echo "Male"; else echo "Female";?>Male<br><br>
            &emsp;Passport No.<br>
            &emsp;<?echo $passport;?>234234234234234<br><br>
            &emsp;Street Address<br>
            &emsp;<?echo $address;?>3/100 The cube pracha Uthit Building B Soi Pracha Uthit37 Ratchaburana Bangkok 10140<br><br>
        &emsp;Date of Birth<br>
        &emsp;<?echo $DOB;?>01/09/1999<br><br>
        &emsp;Phone Number<br>
        &emsp;<?echo $phone?>(+66)345345345<br><br>
        Staff Info<br>
        &emsp;AirportID<br>
        &emsp;<?echo $airport;?>CMX<br><br>
        &emsp;StaffID<br>
        &emsp;<?echo $id?>S234234<br><br>
        &emsp;Position<br>
        &emsp;<?echo $position?>Pilot
        </p>
    </body>
</html>