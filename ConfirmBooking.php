
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
    $addonSql = mysqli_query($connection,"SELECT Description,AddOnPrice FROM AddOn WHERE AddOnName = '$AddOnName'");
    while($addon = mysqli_fetch_array($addonSql)) {
        $Description = $addon['Description'];
        $AddOnPrice = $addon['AddOnPrice'];
    }
    
    if($_SESSION['loggedIN'] == '1') {
        $mileSQL = mysqli_query($connection,"SELECT Route.Miles FROM Flight f JOIN Route r ON f.RouteID = r.RouteID WHERE f.FlightID = '$FlightID'");
        $addpoint = mysqli_fetch_array($mileSQL);
        $memSQL = mysqli_query($connection,"SELECT MilesPoint FROM Member WHERE MemberID = '$MemberID'");
        $samepoint = mysqli_fetch_array($memSQL);
        $updateMile = mysqli_query($connection,
                                    "UPDATE Member SET MilesPoint = '$samepoint + $addpoint' WHERE MemberID = '$MemberID'" );

    }

    $sql = "SELECT bo.BookingID AS BookingID,bi.PayDate AS PayDate,bi.BillingID AS BillingID,bo.SeatID AS SeatID,bi.CardNo AS CardNo,bi.AmountPaid AS AmountPaid,f.Price AS FlightPrice
            FROM Flight f JOIN Booking bo ON f.FlightID = bo.FlightID
            JOIN Billing bi ON bo.BillingID = bi.BillingID
            JOIN Member m ON bi.MemberID = m.MemberID
            WHERE f.FlightID='$FlightID' AND m.MemberID='$MemberID'";
    $query = mysqli_query($connection,$sql);
    while($row=mysqli_fetch_array($query)) {
        $BookingID = $row['BookingID'];
        $BillingID = $row['BillingID'];
        $SeatID = $row['SeatID'];
        $CardNo = $row['CardNo'];
        $PayDate = $row['PayDate'];
        $AmountPaid = $row['AmountPaid'];
        $FlightPrice = $row['FlightPrice'];
    }
    $fsql = "SELECT AirportTax
            FROM Airport
            WHERE AirportID = '$dAirportID'";
    $fquery = mysqli_query($connection,$fsql);
    while($row2=mysqli_fetch_array($fquery)) {
        $AirportTax = $row2['AirportTax'];
    }
    $CardType = $_SESSION['CardType'];
    $FirstName = $_SESSION['FirstName'];
    $LastName = $_SESSION['LastName'];
    $PassengerDOB = $_SESSION['DOB'];
    $PaymentFee = 77.88;
?>
<html>

    <head>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
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
                            <p>Subtotal 1x Passenger&emsp;<?php echo  $FlightPrice?> THB</p>
                            <h4> <b>Add-ons&Fees</b></h4>
                            <table style="width:70%">
                                <tr>
                                    <td>Add-on Price </td>
                                    <td></td>
                                    <td><?php echo $AddOnPrice ?></td>
                                    <td>THB</td>
                                </tr>
                                <tr>
                                    <td>Airport tax </td>
                                    <td></td>
                                    <td><?php echo $AirportTax?></td>
                                    <td>THB</td>
                                </tr>
                            </table>
                            <br>
                            <table style="width:70%">
                                <tr>
                                    <td>Total amount</td>
                                    <td></td>
                                    <td><?php echo $FlightPrice+$AddOnPrice+$AirportTax ?></td>
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
                                    <td><?php echo $AmountPaid ?></td>
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
                                <td><?php echo $PayDate?></td>
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
            <h4><b>Flight : <?php echo $_SESSION['dAirportName']." - ".$_SESSION['aAirportName'] ?></b></h4>
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
                <table style="width: 30%">
                    <tr>
                        <td>Name : </td>
                        <td><?php for($i=0;$i<sizeof($FirstName);$i++) {echo $FirstName[$i];} echo " "; for($i=0;$i<sizeof($LastName);$i++) {echo $LastName[$i];} ?></td>
                    </tr>
                    <!-- <tr>
                        <td>Nationality/Region : </td>
                        <td>Thailand</td>
                    </tr> -->
                    <tr>
                        <td>Date of Birth :</td>
                        <td><?php echo $PassengerDOB[0] ?></td>
                    </tr>
                </table>
                <br>
                <h4><b>Add-ons</b></h4>
                <h4><b><?php echo $AddOnName ?></b></h4>

                <p style="line-height: 15pt;">
                    <?php echo "Description: ".$Description ?><br>
                    <?php echo "Seat: ".$SeatID?>
                </p>
                <br>
                <div class="form-group col-md-5 offset-sm-3">
                <input type="submit" class="btn btn-primary mt-2 offset-sm-4" value="Confirm">    
                </div>
            </div>
            </div>
        </div>
        </form>
    </body>
</html>