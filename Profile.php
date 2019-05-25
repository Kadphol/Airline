<?php
    #include("admin/config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(isset($_SESSION['MEmail'])) {
        $email = $_SESSION['MEmail'];
        $query = "SELECT * FROM Member WHERE Email = '$email'";
        $result = mysqli_query($db,$query);
        $row = mysqli_fetch_assoc($result);
        $email = $row['Email'];
        $name = $row['FirstName']." ".$row['LastName'];
        $passport = $row['Passport'];
        $miles = $row['MilesPoint'];
        $DOB = $row['DOB'];
        $phone = "(".$row['Country'].")".$row['PhoneNumber'];
    }
?>
<html>

<body>
    <h1>Profile</h1>
    <h2>Account</h2>
    <hr>
    <p>
        Email<br>
        &emsp;<?echo $email;?> <!--eiei@gmail.com-->
    </p>
    <h2>Profile</h2>
    <hr>
    <p>
        Personal Info<br>
        &emsp;Name<br>
        &emsp;<?echo $name;?><!--Namjoon Kim--><br><br>
        &emsp;Passport No.<br>
        &emsp;<?echo $passport;?><!--pa123456789--><br><br>
        &emsp;Milespoint<br>
        &emsp;<?echo $miles;?><!--223.77--><br><br>
        &emsp;Date of Birth<br>
        &emsp;<?echo $DOB;?><!--31/10/1999--><br><br>
        &emsp;Phone Number<br>
<<<<<<< HEAD
        &emsp;(+66)65445620<br><br>
=======
        &emsp;<?echo $phone;?><!--(+66)65445620-->
>>>>>>> ad11531ce8a4b28dd940d4af4e0a632e51c3d9f0
    </p>
</body>

</html>