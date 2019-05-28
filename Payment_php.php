<?php
#error_reporting(~E_NOTICE);
session_start();
$connection = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

#POST FROM PAYMENT PHP
$Month = $_POST['Month'];
$Year = $_POST['Year'];
$CardNo = $_POST['CardNo'];
$CVV = $_POST['CVV'];
$CardType = $_POST['CardType'];

#GET SESSION
$FlightID = $_SESSION['FlightID'];
$AddOnName = $_SESSION['AddOnName'];
$dAirportID = $_SESSION['dAirportID'];
$NumberOfPassenger = $_SESSION['NumberOfPassenger'];
$MemberID = $_SESSION['MemberID'];
$SplitSeat = $_SESSION['SplitSeat'];

$FirstName = $_SESSION['FirstName']; 
$LastName = $_SESSION['LastName'];

#QUERY FLIGHT PRICE
$query = mysqli_query($connection,"SELECT * FROM Flight WHERE FlightID='$FlightID'");
while ($result = mysqli_fetch_array($query)) {
    $FlightPrice = $result['Price'];
    $FlightSeat = $result['Seat'];
}

#QUERY AddOn PRICE
$query1 = mysqli_query($connection,"SELECT * FROM AddOn WHERE AddOnName='$AddOnName'");
while ($result1 = mysqli_fetch_array($query1)) {
    $AddOnPrice = $result1['AddOnPrice'];
    $AddOnID = $result1['AddOnID'];
}

#QUERY AirportTax PRICE
$query2 = mysqli_query($connection,"SELECT AirportTax FROM Airport WHERE AirportID='$dAirportID'");
while ($result2 = mysqli_fetch_array($query2)) {
    $AirportTax = $result2['AirportTax'];
}

#PAYMENT FEE
$PaymentFee = 77.88;

#Today Date Ja
$Today = date("Y-m-d");
$ExpiredDate = $Month."/".$Year;

#INSERT TO PAYMENTMETHOD
$sql = "INSERT INTO PaymentMethod (CardNo,CardType,ExpiredDate,CVV)
    VALUES('$CardNo','$CardType','$ExpiredDate','$CVV')";
    if(!mysqli_query($connection,$sql)){
        die('Error: ' . mysqli_error($connection));
    }

#INSERT TO BILLING
$AmountPaid = ($NumberOfPassenger*($FlightPrice+$AddOnPrice+$AirportTax))+$PaymentFee;
if($_SESSION['loggedIN']){
    $sql1 = "INSERT INTO Billing (CardNo,PayDate,MemberID,AmountPaid)
    VALUES('$CardNo','$Today','$MemberID','$AmountPaid')";
    if(!mysqli_query($connection,$sql1)){
        die('Error: ' . mysqli_error($connection));
    }

}
else{
    $sql2 = "INSERT INTO Billing (CardNo,PayDate,AmountPaid)
    VALUES('$CardNo','$Today','$AmountPaid')";
    if(!mysqli_query($connection,$sql2)){
        die('Error: ' . mysqli_error($connection));
    }
}

#QUERY BillingID 
$query3 = mysqli_query($connection,"SELECT MAX(BillingID) FROM Billing");
while ($result3 = mysqli_fetch_array($query3)) {
    $BillingID = $result3['MAX(BillingID)'];
}


for ($i = 0; $i < sizeof($FirstName); $i++){

        #QUERY PASSENGER ID 
        $query0 = mysqli_query($connection,"SELECT PassengerID FROM Passenger WHERE FirstName='$FirstName[$i]' AND LastName='$LastName[$i]'");
        while ($result0 = mysqli_fetch_array($query0)) {
            $PassengerID[$i] = $result0['PassengerID'];
        }
    
    #INSERT TO BOOKING
    
    $sql3 = "INSERT INTO Booking (FlightID,PassengerID,BillingID,SeatID,AddOnID)
        VALUES('$FlightID','$PassengerID[$i]','$BillingID','$SplitSeat[$i]','$AddOnID')";
        if(!mysqli_query($connection,$sql3)){
            die('Error: ' . mysqli_error($connection));
        }
}


header('location: ConfirmBooking.php');
?>
