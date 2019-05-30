<!-- import font roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<!-- import style -->
<link rel="stylesheet" type="text/css" href="DefaultStyle.css">

<!-- font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['login'])) {
    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);

    $data = $connection->query("SELECT email FROM member WHERE email='$email' AND password='$password'");

    if ($data->num_rows > 0) {
        $_SESSION['loggedIN'] = '1';
        $_SESSION['email'] = $email;
        exit('login success...');
    } else {
        exit('please check your input');
    }
}


$FlightID =  $_SESSION['FlightID'];
$AddOnName = $_SESSION['AddOnName'];
$MemberID = $_SESSION['MemberID'];
$dAirportID = $_SESSION['dAirportID'];
$addonSql = mysqli_query($connection, "SELECT Description,AddOnPrice FROM AddOn WHERE AddOnName = '$AddOnName'");
while ($addon = mysqli_fetch_array($addonSql)) {
    $Description = $addon['Description'];
    $AddOnPrice = $addon['AddOnPrice'];
}

// if ($_SESSION['loggedIN'] == '1') {
//     $mileSQL = mysqli_query($connection, "SELECT r.Miles FROM Flight f JOIN Route r ON f.RouteID = r.RouteID WHERE f.FlightID = '$FlightID'");
//     $addpoint = mysqli_fetch_array($mileSQL);
//     $memSQL = mysqli_query($connection, "SELECT MilesPoint FROM Member WHERE MemberID = '$MemberID'");
//     $samepoint = mysqli_fetch_array($memSQL);
//     $updateMile = mysqli_query(
//         $connection,
//         "UPDATE Member SET MilesPoint =  MilesPoint + '$addpoint' WHERE MemberID = '$MemberID'"
//     );
// }

// $sql = "SELECT bo.BookingID AS BookingID,bi.PayDate AS PayDate,bi.BillingID AS BillingID,bo.SeatID AS SeatID,bi.CardNo AS CardNo,bi.AmountPaid AS AmountPaid,f.Price AS FlightPrice
//         FROM Flight f JOIN Booking bo ON f.FlightID = bo.FlightID
//         JOIN Billing bi ON bo.BillingID = bi.BillingID
//         JOIN Member m ON bi.MemberID = m.MemberID
//         WHERE f.FlightID='$FlightID' AND m.MemberID='$MemberID'";
// $query = mysqli_query($connection,$sql);
// while($row=mysqli_fetch_array($query)) {
//     $BookingID = $row['BookingID'];
//     $BillingID = $row['BillingID'];
//     $SeatID = $row['SeatID'];
//     $CardNo = $row['CardNo'];
//     $PayDate = $row['PayDate'];
//     $AmountPaid = $row['AmountPaid'];
//     $FlightPrice = $row['FlightPrice'];
// }


// $fsql = "SELECT AirportTax
//         FROM Airport
//         WHERE AirportID = '$dAirportID'";
// $fquery = mysqli_query($connection,$fsql);
// while($row2=mysqli_fetch_array($fquery)) {
//     $AirportTax = $row2['AirportTax'];
// }





$CardType = $_SESSION['CardType'];
$FirstName = $_SESSION['FirstName'];
$LastName = $_SESSION['LastName'];
$PassengerDOB = $_SESSION['DOB'];
$PaymentFee = $_SESSION['PaymentFee'];
$AirportTax = $_SESSION['AirportTax'];
$PayDate = $_SESSION['Today'];
$NumberofPassenger = $_SESSION['NumberOfPassenger'];
$BillingID = $_SESSION['BillingID'];


#Query Booking Information
$query = mysqli_query($connection, "SELECT * FROM Booking WHERE BillingID = '$BillingID'");
while ($result = mysqli_fetch_array($query)) {
    $BookingID = $result['BookingID'];
    $PassengerID[] = $result['PassengerID'];
    $SeatID[] = $result['SeatID'];
}

#Query Payment Information 
$paymentQuery = mysqli_query($connection,"SELECT * FROM Flight WHERE FlightID = '$FlightID'");
while ($result1 = mysqli_fetch_array($paymentQuery)) {
    $FlightPrice = $result1['Price'];
}

?>
<html>

<head>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
      <!--NAVBAR-->
      <?php
        if (isset($_SESSION['loggedIN']))
        {
        ?>
        <nav class="mb-1 navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="Index.php"><b>Airlines</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default"
                        aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php" name="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <?php
        }  
        else
        {
        ?>
        <nav class="mb-1 navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="Index.php"><b>Airlines</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                    aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" data-toggle="modal" data-target="#loginModal">Login</a>
                    </div>
                 </li>
                </ul>
            </div>
        </nav>
        <?php }
        ?>


        <!--LOGIN MODAL-->
        <div class="modal" id="loginModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <form action = "MemberLogin.php" method = "post" id = "loginform">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Email :</label>
                                <input type = "text" class="form-control" name = "email" id = "email">
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type = "Password" class="form-control" name = "password" id = "password">
                            </div>
                            <input type = "submit" class="btn btn-success" value = "login" name = "login" id = "login">      
                        </div>
                    
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a href = "RegisForm.php">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="card-container col-md-8">
        <div class="card-body text-center">
            <i class="far fa-check-circle fa-5x text-success"></i><br><br>
            <h2><strong>Payment Success!</strong></h2>
            <p>
                Billing ID : <?php echo $BillingID ?> <br>
                Booking ID : <?php echo $BookingID ?>
            </p>
        </div>
    </div>
    <br>

    <div class="card-container col-md-8 mt-0">
        <div class="card-body">
            <h3><strong>Confirmation</strong></h3>
            <hr>
            <li class="list-group-item list-group-item-success"><i class="far fa-check-circle text-success"></i> Confirmed</li>
        </div>
    </div>

    <div class="card-container col-md-8 mt-4">
        <div class="card-body">
       <?php $mileSQL = mysqli_query($connection, "SELECT r.Miles FROM Flight f JOIN Route r ON f.RouteID = r.RouteID WHERE f.FlightID = '$FlightID'");
       while ($result2 = mysqli_fetch_array($mileSQL)) {
        $addpoint = $result2['Miles'];
        }
            
            $memSQL = mysqli_query($connection, "SELECT MilesPoint FROM Member WHERE MemberID = '$MemberID'");
            while ($result3 = mysqli_fetch_array($memSQL)) {
                $samepoint = $result3['MilesPoint'];
                }
         
            $updateMile = mysqli_query(
             $connection,
            "UPDATE Member SET MilesPoint =  MilesPoint + '$addpoint' WHERE MemberID = '$MemberID'");
        ?>



            <h3><b>Billing ID : <?php echo $BillingID ?></b></h3>
            <hr>
            <div class="row mt-3">
                <div class="col-md-6 border-right">
                    <div class="container">
                        <h4><i class="far fa-check-circle text-success"></i> <b>Payment Confirmed</b></h4>
                        <!-- <p>
                                <b>Contact person</b> : Kim Namjoon<br>
                                <b>Email</b> : eiei@gmail.com
                            </p> -->
                        <h4><b>Flight</b></h4>
                        <p>Subtotal <?php echo $NumberofPassenger ?>x Passenger&emsp;<?php echo  $FlightPrice*$NumberofPassenger ?> THB</p>
                        <h4> <b>Add-ons&Fees</b></h4>
                        <table style="width:70%">
                            <tr>
                                <td>Add-on Price </td>
                                <td></td>
                                <td><?php echo $AddOnPrice*$NumberofPassenger ?></td>
                                <td>THB</td>
                            </tr>
                            <tr>
                                <td>Airport tax </td>
                                <td></td>
                                <td><?php echo $AirportTax*$NumberofPassenger ?></td>
                                <td>THB</td>
                            </tr>
                        </table>
                        <br>
                        <table style="width:100%">
                            <tr>
                                <td>Total amount</td>
                                <td></td>
                                <td><?php 
                                $Total = ($NumberofPassenger*($FlightPrice + $AddOnPrice + $AirportTax));
                                echo $Total?></td>
                                <td>THB</td>
                            </tr>
                            <tr>
                                <td>Payment fee</td>
                                <td></td>
                                <td><?php echo $PaymentFee ?></td>
                                <td>THB</td>
                            </tr>
                            <tr>
                                <td>Total Paid</td>
                                <td></td>
                                <td><?php $AmountPaid = $Total + $PaymentFee;
                                echo $AmountPaid ?></td>
                                <td>THB</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4><b>Payment Date</b></h4>
                    <table style="width:70%">
                        <tr>
                            <td>Date</td>
                            <td><?php echo $PayDate ?></td>
                        </tr>
                        <tr>
                            <td>Card Type</td>
                            <td><?php echo $CardType ?></td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td><?php echo $AmountPaid ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form action="Index.php" method="">
        <div class="card-container col-md-8 mt-4 bottom-margin">
            <div class="card-body">
                <h3><b>Booking ID : <?php echo $BookingID ?></b></h3>
                <hr>
                <h4><b>Flight : <?php echo $_SESSION['dAirportName'] . " - " . $_SESSION['aAirportName'] ?></b></h4>
                <table class="table">
                    <tr>
                        <td style="background-color:#ededed;">
                            <h4><?php echo $FlightID ?></h4>
                        </td>
                        <td>
                            <p><?php echo $_SESSION['dAirportID'] ?><br>
                                <?php echo $_SESSION['dAirportName'] ?><br>
                                <?php echo $_SESSION['DepartureDate'] ?></p>
                        </td>
                        <td>
                            <p><?php echo $_SESSION['aAirportID'] ?> <br>
                                <?php echo $_SESSION['aAirportName'] ?><br>
                                <?php echo $_SESSION['ReturnDate'] ?></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="ml-4 mt-0">
                <h4><b>Passenger Detail</b></h4>
                <?php for ($i = 0; $i < $NumberofPassenger; $i++) { ?>
                    Passenger No. <?php echo $i+1 ?>
                    <table style="width: 50%">
                        <tr>
                            <td><b>Name : </b></td>
                            <td><?php echo $FirstName[$i] . " " . $LastName[$i] ?></td>
                            <td><?php $SeatID[$i] = str_replace("_", " ", $SeatID[$i]);
                            echo "<b>Seat:</b> " . $SeatID[$i] ?></td>
                        </tr>

                        <tr>
                            <td><b>Date of Birth :</b></td>
                            <td><?php echo $PassengerDOB[$i] ?></td>
                        </tr>
                </table>
                <br>
                <?php } ?>
                <br>
                <h4><b>Add-ons</b></h4>
                <h4><b><?php
                        $AddOnName = str_replace("_", " ", $AddOnName);
                        echo $AddOnName ?></b></h4>
                <hr>
                <p style="line-height: 15pt;">

                    <?php
                    $SplitDescription = explode(',', $Description);

                    echo $SplitDescription[0] . '<br>' .
                        $SplitDescription[1] . '<br>' .
                        $SplitDescription[2] . '<br>' .
                        $SplitDescription[3] ; ?><br>
                </p>
                <div class="form-group col-md-5 mt-0 offset-sm-3">
                    <input type="submit" class="btn btn-primary mb-2 offset-sm-4" value="Confirm">
                </div>
            </div>
        </div>
        </div>
    </form>
</body>

</html>