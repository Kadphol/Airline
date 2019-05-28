<?php
error_reporting(~E_NOTICE);
session_start();
$connection = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$SplitSeat = $_SESSION['SplitSeat'];
$FlightID = $_SESSION['FlightID'];

$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$DOB = $_POST['DOB'];
$Sex = $_POST['sex'];

$_SESSION['FirstName'] = $FirstName;
$_SESSION['LastName'] = $LastName;
$_SESSION['DOB'] = $DOB;


for($i = 0; $i < sizeof($FirstName) ; $i++){
    $sql = "INSERT INTO passenger (Sex,FirstName,LastName,DOB)
    VALUES('$Sex[$i]','$FirstName[$i]','$LastName[$i]','$DOB[$i]')";
    if(!mysqli_query($connection,$sql)){
        die('Error: ' . mysqli_error($connection));
    }
}


    if(sizeof($SplitSeat)>1){
        for($j = 1; $j < sizeof($SplitSeat) ; $j++){
            $SplitMerge = json_encode($SplitSeat);
        }
        $SplitMerge = trim($SplitMerge, "[]"); 

    }
    else{
        $SplitMerge = json_encode($SplitSeat);
        $SplitMerge = trim($SplitMerge, "[]"); 
    }

    $query = mysqli_query($connection,"SELECT Seat FROM Flight WHERE FlightID='$FlightID'");
    while ($result = mysqli_fetch_array($query)) {
        $SeatQuery = $result['Seat'];
    }

    if(strlen($SeatQuery)==0){ 
        $Seat = $SplitMerge;
        echo $Seat;
    }
    else{
        $Seat = $SeatQuery.",".$SplitMerge;
        echo $Seat;
    }
   
    
  $sql2 = "UPDATE Flight 
         SET Seat = '$Seat'
         WHERE FlightID = '$FlightID'";
        if(!mysqli_query($connection,$sql2)){
         die('Error: ' . mysqli_error($connection));
     }
header('location: payment.php');
?>
