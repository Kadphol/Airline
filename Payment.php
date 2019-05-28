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

<!--LOGIN PHP-->
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

#BOOKING GET SESSION
$dAirportID = $_SESSION['dAirportID'];
$aAirportID = $_SESSION['aAirportID'];
$DepartureDate = $_SESSION['DepartureDate'];
$ReturnDate = $_SESSION['ReturnDate'];
$NumberOfPassenger = $_SESSION['NumberOfPassenger'];
$Class = $_SESSION['Class'];

#SEAT SESSION
$SplitSeat = $_SESSION['SplitSeat'];

#QUERY AIRPORTNAME
$query = mysqli_query($connection,"SELECT AirportName FROM Airport WHERE AirportID='$dAirportID'");
while ($result = mysqli_fetch_array($query)) {
    $dAirportName = $result['AirportName'];
}

$query2 = mysqli_query($connection,"SELECT AirportName FROM Airport WHERE AirportID='$aAirportID'");
while ($result1 = mysqli_fetch_array($query2)) {
    $aAirportName = $result1['AirportName'];
}

$query3 = mysqli_query($connection,"SELECT * FROM Flight WHERE FlightID='$FlightID'");
while ($result2 = mysqli_fetch_array($query3)) {
    $FlightDepartureDate = $result2['DepartureDate'];
    $FlightArrivalDate = $result2['ArrivalDate'];
    $FlightPrice = $result2['Price'];
}

$date1 = new DateTime($FlightArrivalDate);
$date2 = new DateTime($FlightDepartureDate);
$interval = date_diff($date1,$date2);

$_SESSION['dAirportName'] = $dAirportName;
$_SESSION['aAirportName'] = $aAirportName;
$_SESSION['interval'] = $interval;


?>

<html>
    <head>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

<body style="top: 10%">
        <!--NAVBAR-->
        <?php
    if (isset($_SESSION['loggedIN'])) {
        ?>
        <nav class="mb-1 navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="Index.php"><b>Airlines</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php" name="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

    <?php
} else {
    ?>
        <nav class="mb-1 navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="Index.php"><b>Airlines</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" data-toggle="modal" data-target="#loginModal">Login</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <?php }
?>

    <div class="card-container col-md-8 mt-4">
        <div class="card-body">
            <h1><b>Booking Details</b></h1>
            <hr>
            <p>&emsp;<b>Depart Date</b><br>
             &emsp;<?php echo $DepartureDate ?><br>
             &emsp;<?php echo $dAirportName ?> -> <?php echo $aAirportName ?><br>
             &emsp;FlightID : <?php echo $FlightID ?> / <?php echo $aAirportName ?> - <?php echo $aAirportName ?> / <?php echo $interval->format('Duration %h:%i:%s Hours');?></p>
        </div>
    </div>

    <form action="Payment_php.php" method="POST">
    <div class="card-container mt-4 col-md-8 bottom-margin">
        <div class="card-body">
            <h1><b>Payment</b></h1>
            <hr>
            <div class="row  offset-sm-1">
                <div class="col-md-5">
                        <div class="form-group">
                            <label>Credit/Debit Card</label>
                            <input type="text" name="CardNo" class="form-control" placeholder="Card Number">
                        </div>

                            <div class="form-row">
                                <div class="col-sm-8">
                                    <div class="form-inline"> 
                                        <select name='Month' class="form-control">
                                            <option value='' Selected>MM</option>
                                            <option value='01'>Janaury</option>
                                            <option value='02'>February</option>
                                            <option value='03'>March</option>
                                            <option value='04'>April</option>
                                            <option value='05'>May</option>
                                            <option value='06'>June</option>
                                            <option value='07'>July</option>
                                            <option value='08'>August</option>
                                            <option value='09'>September</option>
                                            <option value='10'>October</option>
                                            <option value='11'>November</option>
                                            <option value='12'>December</option>
                                        </select>
                                        <span style="width:10%; text-align: center"> / </span>
                                        <select name="Year" class="form-control">
                                            <option value='' Selected>YY</option>
                                            <option value="18">2018</option>
                                            <option value="17">2017</option>
                                            <option value="16">2016</option>
                                            <option value="15">2015</option>
                                            <option value="14">2014</option>
                                            <option value="13">2013</option>
                                            <option value="12">2012</option>
                                            <option value="11">2011</option>
                                            <option value="10">2010</option>
                                            <option value="09">2009</option>
                                            <option value="08">2008</option>
                                            <option value="07">2007</option>
                                            <option value="06">2006</option>
                                            <option value="05">2005</option>
                                            <option value="04">2004</option>
                                            <option value="03">2003</option>
                                            <option value="02">2002</option>
                                            <option value="01">2001</option>
                                            <option value="00">2000</option>
                                            <option value="99">1999</option>
                                            <option value="98">1998</option>
                                            <option value="97">1997</option>
                                            <option value="96">1996</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="CVV" placeholder="CVV">
                                    </div>
                                </div>
                            </div>
                  
                        <div class="form-group">
                            <input type="text" class="form-control mb-2" name="CardType" placeholder="Card Type">
                        </div>
                </div> 
            <div class="form-group col-md-5 offset-sm-3">
                <input type="submit" class="btn btn-primary mt-2 offset-sm-4" value="Pay">    
            </div>
        </div>
    </div>
    </form>
</body>
</html>