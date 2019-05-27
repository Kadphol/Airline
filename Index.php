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
    #include("config/config.php");
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

    $query = mysqli_query($connection,"SELECT * FROM Airport");

    while ($result = mysqli_fetch_array($query)) {
        $AirportID[] = $result['AirportID'];
        $AirportName[] = $result['AirportName'];
    }
?>

<html>
<head>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body style="bottom: 0%">
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Mybooking.php">Manage Booking</a>
                    </li>
                </ul>
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

        
        <!--BODY-->
        <form action="SearchFlight.php" method="post">
            <div class="card-container col-md-8">
                <div class="card-body">
                    <h2 class="d-flex justify-content-center"><b>Search Flight</b></h2>
                    <hr>
                    <div class="form-row my-0">
                        <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6 pl-1 pr-2">
                                        <label>Departure Airport</label>
                                        <select name="DepartureAirport" class="form-control">
                                            <option value="" Selected>Departure Airport</option></option>
                                            <?php
                                            for ($i = 0; $i < sizeof($AirportName); $i++) { ?>
                                                <option> <?php echo $AirportName[$i] ?> </option>
                                            <?php } ?>
                                        </select><br><br>
                                    </div>
                                    <div class="form-group col-md-6 pl-1">
                                        <label>Arrival Airport</label>
                                        <select name="ArrivalAirport" class="form-control">
                                            <option value="" Selected>Arrival Airport</option></option>
                                            <?php
                                            for ($i = 0; $i < sizeof($AirportName); $i++) { ?>
                                                <option> <?php echo $AirportName[$i] ?> </option>
                                            <?php } ?>
                                        </select><br><br>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6 pl-3 pr-1">
                                        <label>Departure Date</label>
                                        <input type="Date" class="form-control" name="DepartureDate">
                                    </div>
                                    <div class="form-group col-md-6 pl-2">
                                        <label>Returning</label>
                                        <input type="Date" class="form-control" name="ReturnDate">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="form-row my-0">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group col-md-6 mx-0 pl-0 pr-2">
                                    <label>Number of Passenger</label>
                                    <input type="text" name="NumberPassenger" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 pl-2">
                                        <label>Class</label>
                                        <select name="Class" class="form-control">
                                            <option value="" Selected>--Selected Class--</option>
                                                  <option value="First" >First Class</option>
                                            <option value="Business">Business</option>
                                            <option value="Economy">Economy</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

<script>
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
  
</script>