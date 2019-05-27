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
<html>
    <body>
        <h1>Staff Profile : <?php echo $StaffID?></h1>
        <hr>
        <p>
            Email:&emsp;<?php echo $Email?><br>
            Name:&emsp;<?php echo $FirstName." ".$LastName?><br>
            Sex:&emsp;<?php if($Sex=='m'){echo "Male";}
                        else{echo "Female";} ?><br>
            Passport No.:&emsp;<?php echo $Passport?><br>
            Date of Birth:&emsp;<?php echo $DOB?><br>
            Phone Number:&emsp;<?php echo "(".$Country.")".$PhoneNumber?><br>
            Address:&emsp;<?php echo $Address?><br>
            AirportID:&emsp;<?php echo $AirportID?><br>
            Position:&emsp;<?php echo $Position?>
        </p>
        <hr>
        <form action="EditStaff_php.php" method="post">
            Email <input type="email" name="Email"><br>
            Password <input type="text" name="Password"><br>
            First Name <input type="text" name="FirstName"><br>
            Last Name <input type="text" name="LastName"><br>
            Country <input type="text" name="Country"><br>
            Phone Number <input type="text" name="PhoneNumber"><br>
            Address<input type="text" name="Address"><br>
            <button type="Submit" name="Edit" value="<?php echo $StaffID ?>" >Edit</button><br>
        </form>
    </body>
</html>