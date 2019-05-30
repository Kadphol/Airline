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

    if(isset($_POST['login'])) {
        $email = $connection->real_escape_string($_POST['email']);
        $password = $connection->real_escape_string($_POST['password']);
        
        $data = $connection->query("SELECT email FROM member WHERE email='$email' AND password='$password'");

        if($data -> num_rows > 0){
            $_SESSION['loggedIN'] = '1';
            $_SESSION['email'] = $email;
            exit('login success...');
        }
        else{
            exit('please check your input');
        }
    }

    #FROM INDEX PHP
    $DepartureAirport = $_POST['DepartureAirport'];
    $ArrivalAirport = $_POST['ArrivalAirport'];
    $DepartureDate = $_POST['DepartureDate'];
    $ReturnDate = $_POST['ReturnDate'];
    $NumberOfPassenger = $_POST['NumberPassenger'];
    $Class = $_POST['Class'];

    #CONVERT TO DAYWEEK
    $unixTimestamp = strtotime($DepartureDate);
    $dayOfWeek = date("l", $unixTimestamp);
    $DepartureDate = date("d M y", $unixTimestamp);

    #QUERY DEPARTURE AIRPORTID
    $dAirportquery = mysqli_query($connection, "SELECT AirportID FROM Airport WHERE AirportName = '$DepartureAirport'");
    while ($result1 = mysqli_fetch_array($dAirportquery)) {
        $dAirportID = $result1['AirportID'];
    }

    #QUERY ARRIVAL AIRPORTID
    $aAirportquery = mysqli_query($connection, "SELECT * FROM Airport WHERE AirportName = '$ArrivalAirport'");
    while ($result2 = mysqli_fetch_array($aAirportquery)) {
        $aAirportID = $result2['AirportID'];
    }

    #QUERY FLIGHT
    $query = mysqli_query($connection,"SELECT * FROM Flight WHERE RouteID IN 
                                      (SELECT RouteID FROM Route WHERE Origin = '$dAirportID' AND Destination = '$aAirportID')");
    while ($result = mysqli_fetch_array($query)) {
        $FlightID[] = $result['FlightID'];
        $FlightDepartureDate[] = $result['DepartureDate'];
        $FlightArrivalDate[] = $result['ArrivalDate'];
    }

      #BOOKING SESSION
      $_SESSION['dAirportID'] = $dAirportID;
      $_SESSION['aAirportID'] = $aAirportID;
      $_SESSION['DepartureDate'] = $DepartureDate;
      $_SESSION['ReturnDate'] = $ReturnDate;
      $_SESSION['NumberOfPassenger'] = $NumberOfPassenger;
      $_SESSION['Class'] = $Class;
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

        <?php
        if (sizeof($FlightID)>0)
        {?>
           
           
         <!--SEARCH FLIGHT-->
         <div class="container col-md-8 justify-content-left" style="margin-top:15%;">
            <h3><b>Departure <?php echo $DepartureAirport?> to <?php echo $ArrivalAirport ?></b></h3>
            <p><?php echo $dayOfWeek?> <?php echo $DepartureDate ?> <br></p>
         </div>

        <?php
            for ($i = 0 ; $i < sizeof($FlightID); $i++) { ?>
        <div class="card-container col-md-8 mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    <?php echo "Flight"."  ".$FlightID[$i] ?><br>
                    <b><?php echo $FlightDepartureDate[$i] ?></b> ———— <b><?php echo $FlightArrivalDate[$i] ?></b> <br>
                    <?php 
                    $date1 = new DateTime($FlightArrivalDate[$i]);
                    $date2 = new DateTime($FlightDepartureDate[$i]);
                    $interval = date_diff($date1,$date2);
                    echo $interval->format('Duration %h:%i:%s Hours');
                    ?>
                    <?php $linkAddress = "AddOn.php?FlightID=".$FlightID[$i];?>
                    </div>
                    <div class="col-md-6">
                       <?php echo "<a href='$linkAddress' class='btn btn-primary'><b>Select</b></a>"?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php
        }  
        else
        {
        ?>
        
         <div class="card-container col-md-8 mt-3" style="top:50%"> 
            <div class="card-body">
            <div class="row">
                    <div class="col-md-6">
                <h1>No Flight</h1>
                </div>
        </div>
        </div>
        </div>


        <?php } ?>

        

    </body>
</html>

<script>
    $(document).ready(function(){
        $('#login').on('click',function(){
            var email = $('#email').val();
            var password = $('#password').val();
            if(email == '' || password == '')
                alert('Please check your inputs');

            $.ajax(
                {
                    url: 'index.php',
                    method: 'POST',
                    data: {
                        login: 1,
                        email: email,
                        password: password
                    },
                    success: function (response) {
                        $("#response").html(response);
                        
                        if(response.indexOf('Success')>=0)
                            window.locaiton = 'test.php';
                    },
                    dataType: 'text'
                }
            )
        });
    });
</script>