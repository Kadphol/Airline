<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * 
                                    FROM staff
                                    WHERE StaffID='" . $_POST["Edit"] . "'");
    while ($result = mysqli_fetch_array($query)) {
        $StaffID = $result['StaffID'];
        $Email = $result['Email'];
        $Password = $result['Password'];
        $FirstName = $result['FirstName'];
        $LastName = $result['LastName'];
        $Country = $result['Country'];
        $PhoneNumber = $result['PhoneNumber'];
        $Address = $result['Address'];
    }
    $NewEmail = $_POST['Email'];
    $NewPassword = $_POST['Password'];
    $NewFirstName = $_POST['FirstName'];
    $NewLastName = $_POST['LastName'];
    $NewCountry = $_POST['Country'];
    $NewPhoneNumber = $_POST['PhoneNumber'];
    $NewAddress = $_POST['Address'];
    if ($NewEmail == "") {
        $NewEmail = $Email;
    }
    if ($NewPassword == "") {
        $NewPassword = $Password;
    }
    if ($NewFirstName == "") {
        $NewFirstName = $FirstName;
    }
    if ($NewLastName == "") {
        $NewLastName = $LastName;
    }
    if ($NewCountry == "") {
        $NewCountry = $Country;
    }
    if ($NewPhoneNumber == "") {
        $NewPhoneNumber = $PhoneNumber;
    }
    if ($NewAddress == "") {
        $NewAddress = $Address;
    }
    $sql = "UPDATE staff 
            SET Email = '$NewEmail', Password = '$NewPassword', FirstName = '$NewFirstName', LastName='$NewLastName',
            Country='$NewCountry', PhoneNumber=$NewPhoneNumber, Address='$NewAddress'
            WHERE StaffID = $StaffID";
    if (!mysqli_query($db,$sql)) {
        die('Error: ' . mysqli_error($db));
    }
    header("location: Staff.php?StaffID=$StaffID");
?>