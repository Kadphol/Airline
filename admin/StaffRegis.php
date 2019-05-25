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

<html>

<body>
    <h1>Staff Regis Form</h1>
    <form action="StaffRegis_php.php" method="post">
        <h3>Profile</h3>
        <!-- AirportID query from database -->
        <select name="AirportID">
            <option value="" Selected>--AirportID--</option>
            <?php
            for ($i = 0; $i<sizeof($airport); $i++) { ?>
                <option> <?php echo $airport[$i] ?> </option>
            <?php } ?>
        </select><br><br>
        <input type="email" name="Email" placeholder="Email"> <br><br>
        <input type="password" name="Password" placeholder="Password"><br><br>
        <input type="password" name="ConPassword" placeholder="Confirm Password"><br><br>
        <input type="text" name="Passport" placeholder="Passport No."><br><br>
        <input type="text" name="FirstName" placeholder="First Name">
        <input type="text" name="LastName" placeholder="Last Name"><br><br>
        <input type="radio" name="sex" value="m" checked>Male
        <input type="radio" name="sex" value="f">Female<br><br>
        <p>Dath of Birth :</p>
        <input type="Date" name="DOB" value="DOB"><br><br>
        <select name="Country">
            <option value="" Selected>--Country--</option>
            <option value="+66">+66</option>
            <option value="+81">+81</option>
            <option value="+48">+48</option>
        </select>
        <input type="tel" name="PhoneNumber" placeholder="Phone Number"><br><br>
        <input type="text" name="Address" placeholder="Address"> <br><br>
        <input type="text" name="Position" placeholder="Position"> <br><br>

        <input type="submit" value="Sign Up">
    </form>
</body>

</html>