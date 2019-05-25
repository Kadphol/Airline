<?php
    session_start();
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

    // $Email = mysqli_real_escape_string($db, $_POST["Email"]);
    // $Password = mysqli_real_escape_string($db, $_POST["Password"]);
    
    $check = mysqli_query($db,"SELECT * FROM staff WHERE Email = '".$_POST['Email']."' AND Password = '".$_POST['Password']."'");
    if($result=mysqli_fetch_array($check)){
        $_SESSION['StaffID'] = $result['StaffID'];
        $_SESSION['AirportID'] = $result['AirportID'];
        $_SESSION['Position'] = $result['Position'];
        header('location: WelcomeStaff.php');
    }
    else{
        header('location: StaffLogin.php');
    }
?>
