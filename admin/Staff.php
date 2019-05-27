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

<html>
    <body>
        <h1>Staff Profile : <?php echo $StaffID?></h1>
        <hr>
        <input type="button" value="<Back to AirportInformation" onclick="window.location.href = 'AirportInformation.php'">
        <form action="EditStaff.php" method="get">
            <button type="submit" name="Edit" value="<?php echo $StaffID ?>">Edit</button>
        </form>
        <form action="#" method="post">
            <button type="submit" name="Delete" value="1">Delete</button>
        </form>
        <p>
            Email <?php echo $Email?><br>
            Name<?php echo $FirstName." ".$LastName?><br>
            Sex<?php if($Sex=='m'){echo "Male";}
                        else{echo "Female";} ?><br>
            Passport No. <?php echo $Passport?><br>
            Date of Birth <?php echo $DOB?><br>
            Phone Number <?php echo "(".$Country.")".$PhoneNumber?><br>
            Address <?php echo $Address?><br>
            AirportID<?php echo $AirportID?><br>
            Position<?php echo $Position?>
        </p>
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