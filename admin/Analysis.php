<!-- import font roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<!-- import style -->
<link rel="stylesheet" type="text/css" href="StaffStyle.css">

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


<html>

<head>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="top:20%; overflow:hidden;">

    <div class="container col-md-12">
        <div class="row ">
            <div class="col-md-4 pr-5" style="margin-top:15%;">
                <h1 style="color:#ffffff; text-align:right;"><b>ANALYSIS REPORT</b></h1>
            </div>
            <div class="col-md-8 justify-content-center border-left pl-0">
                <div class="row justify-content-center">
                    <a class="button-item col-md-2" value="Search Airport" onclick="window.location.href = 'Ana_AirportTax.php'">
                        <div class="button-header"><i class="fas fa-plane-departure"></i></div>
                        <div class="button-bottom"><br>Airport Tax Static</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Flight" onclick="window.location.href = 'Ana_ClassReport.php'">
                        <div class="button-header" style="padding-top:16px;"><i class="fas fa-couch"></i></div>
                        <div class="button-bottom" style="font-size:15px;"><br>Reserved Airplane Classes</div>
                    </a>

                    <a class="button-item col-md-2" value="Analysis Form" onclick="window.location.href = 'Ana_CountStaff.php'">
                        <div class="button-header"><i class="fas fa-user-edit"></i></div>
                        <div class="button-bottom"><br>Amont Staff in Each Airport</div>
                    </a>

                    <a class="button-item col-md-2" value="Search Airport" onclick="window.location.href = 'Ana_DistantAndDuration.php'">
                        <div class="button-header"><i class="fas fa-map-marked-alt"></i></div>
                        <div class="button-bottom"><br>Most Distant and Duration Route</div>
                    </a>
                </div>
                <div class="row justify-content-center">
                    <a class="button-item col-md-2" value="Manage Airport" onclick="window.location.href = 'Ana_Income.php'">
                        <div class="button-header"><i class="fas fa-hand-holding-usd"></i></div>
                        <div class="button-bottom"><br>Income per Month</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Flight" onclick="window.location.href = 'Ana_MostFlightAirport.php'">
                        <div class="button-header"><i class="fas fa-sort-numeric-down"></i></div>
                        <div class="button-bottom"><br>Most Flight Airport</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Airplane" onclick="window.location.href = 'Ana_MostMiles.php'">
                        <div class="button-header"><i class="fas fa-poll"></i></div>
                        <div class="button-bottom"><br>Most Milespoint of Member</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Staff" onclick="window.location.href = 'Ana_MostPayment.php'">
                        <div class="button-header"><i class="fas fa-credit-card"></i></div>
                        <div class="button-bottom"><br>Most Payment method</div>
                    </a>
                </div>
                <div class="row justify-content-center">
                    <a class="button-item col-md-2" value="Manage Airport" onclick="window.location.href = 'Ana_PassengerAge.php'">
                        <div class="button-header"><i class="fas fa-users"></i></div>
                        <div class="button-bottom"><br>Age of Passenger</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Flight" onclick="window.location.href = 'Ana_Peaktime.php'">
                        <div class="button-header"><i class="fas fa-clock"></i></div>
                        <div class="button-bottom"><br>Peaktime</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Airplane" onclick="window.location.href = 'Ana_StaffAge.php'">
                        <div class="button-header"><i class="fas fa-user-tie"></i></div>
                        <div class="button-bottom"><br>Age of Staff</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Staff" onclick="window.location.href = 'Ana_FlightToday.php'">
                        <div class="button-header"><i class="fas fa-plane"></i></div>
                        <div class="button-bottom"><br>Today Flight</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>