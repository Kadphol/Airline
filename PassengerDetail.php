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
    #$query = $connection->query("SELECT * FROM Flight WHERE email='$email' AND password='$password'");

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
$aAirtportID = $_SESSION['aAirportID'];
$DepartureDate = $_SESSION['DepartureDate'];
$ReturnDate = $_SESSION['ReturnDate'];
$NumberOfPassenger = $_SESSION['NumberOfPassenger'];
$Class = $_SESSION['Class'];

#SEAT SESSION
$data = (string)$_GET['data'];
$SplitSeat = explode(',', $data);

$_SESSION['SplitSeat'] = $SplitSeat;
?>

<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Mybooking.php">Manage Booking</a>
                    </li>
                </ul>
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

    <div class="container col-md-12" style="margin-top:20%;">
    <?php
    for ($i = 1; $i <= $NumberOfPassenger; $i++) { ?>
        <div class="card-container col-md-8 mt-4">
            <div class="card-body">
                <h1><b>Passenger Detail</b></h1>
                <form action="payment.php" method="POST">
                    <p>Adult <?php echo $i ?></p>
                    <hr>
                    <div class="form-inline">
                        <input type="text" class="form-control col-md-5" name="FirstName" placeholder="First Name">
                        <input type="text" class="form-control col-md-5" name="LastName" placeholder="Last Name"><br><br>
                    </div>

                    <p class="top-form">Date of Birth</p>
                    <div class="form-inline">
                        <input type="Date" class="form-control col-md-5" name="DOB">

                        <div class="col-md-6">
                            <div class="form-inline">
                                <label class="check-space"><input type="radio" class="form-check-input" name="sex" value="m" checked>Male </label>
                                <label class="check-space"><input type="radio" class="form-check-input" name="sex" value="f">Female</label>
                            </div>
                        </div>
                    </div>
                    <br>
            </div>
        </div>
        <?php } ?>
        <div class="card-container col-md-8 mt-0" style="border-radius: 0px; margin-bottom: 10%">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </div>
        </form>
        </div>
    

</body>

</html>

<script>
    $(document).ready(function() {
        $('#login').on('click', function() {
            var email = $('#email').val();
            var password = $('#password').val();
            if (email == '' || password == '')
                alert('Please check your inputs');

            $.ajax({
                url: 'index.php',
                method: 'POST',
                data: {
                    login: 1,
                    email: email,
                    password: password
                },
                success: function(response) {
                    $("#response").html(response);

                    if (response.indexOf('Success') >= 0)
                        window.locaiton = 'test.php';
                },
                dataType: 'text'
            })
        });
    });
</script>