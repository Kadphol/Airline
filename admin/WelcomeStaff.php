
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

<body style="top:55%; overflow:hidden;">

    <div class="container col-md-12">
        <div class="row ">
            <div class="col-md-4 pr-5" style="margin-top:10%;">
                <h1 style="color:#ffffff; text-align:right;"><b>WELCOME!</b></h1>
            </div>
            <div class="col-md-8 justify-content-center border-left pl-0">
                <div class="row justify-content-center">
                    <a class="button-item col-md-2" value="Search Airport" onclick="window.location.href = 'Airport.php'">
                        <div class="button-header"><i class="fas fa-search"></i></div>
                        <div class="button-bottom"><br>Search Airport</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Flight" onclick="window.location.href = 'StaffRegis.php'">
                        <div class="button-header" style="padding-top:16px;"><i class="fas fa-registered"></i></div>
                        <div class="button-bottom" style="font-size:15px;"><br>Staff Registration</div>
                    </a>

                    <a class="button-item col-md-2" value="Analysis Form">
                        <div class="button-header"><i class="fas fa-sticky-note"></i></div>
                        <div class="button-bottom"><br>Analysis Form</div>
                    </a>

                    <a class="button-item col-md-2" value="Search Airport" onclick="window.location.href = 'StaffProfile.php'">
                        <div class="button-header"><i class="fas fa-user"></i></div>
                        <div class="button-bottom"><br>View Profile</div>
                    </a>
                </div>
                <div class="row justify-content-center">
                    <a class="button-item col-md-2" value="Manage Airport" onclick="window.location.href = 'AirportInformation.php'">
                        <div class="button-header"><i class="fas fa-tasks"></i></div>
                        <div class="button-bottom"><br>Manage Airport</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Flight" onclick="window.location.href = 'AirportInformation.php'">
                        <div class="button-header"><i class="fas fa-building"></i></div>
                        <div class="button-bottom"><br>Manage Flight</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Airplane" onclick="window.location.href = 'AirportInformation.php'">
                        <div class="button-header"><i class="fas fa-users"></i></div>
                        <div class="button-bottom"><br>Manage Airplane</div>
                    </a>

                    <a class="button-item col-md-2" value="Manage Staff" onclick="window.location.href = 'AirportInformation.php'">
                        <div class="button-header"><i class="fas fa-plane-departure"></i></div>
                        <div class="button-bottom"><br>Manage Staff</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>