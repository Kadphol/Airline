<?php
    $db = mysqli_connect("localhost","root","","airline"); //database connect
    session_start(); //start session
    if(isset($_SESSION['MEmail'])) { //check if already logged in
        $email = $_SESSION['MEmail'];
        $query = "SELECT * FROM Member WHERE Email = '$email'";
        $result = mysqli_query($db,$query); //query profile information
        $row = mysqli_fetch_assoc($result);
        $email = $row['Email'];
        $name = $row['FirstName']." ".$row['LastName'];
        $passport = $row['Passport'];
        $miles = $row['MilesPoint'];
        $DOB = $row['DOB'];
        $phone = "(".$row['Country'].")".$row['PhoneNumber'];
    }
?>



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

    <div class="row">
        <div class="card-container col-md-8">
            <div class="card-body">
            <h1><b>Profile</b></h1>
                <h2>Account</h2>
                <hr>
                <p>
                    <b>Email</b><br>
                    &emsp;<?echo $email;?> 
                </p>
            </div>
        </div>
    </div>
    <div class="row bottom-margin">
        <div class="card-container col-md-8 mt-3">
            <div class="card-body">
                <h2>Profile</h2>
                <hr>
                <p>
                <b>Personal Info</b><br>
                    &emsp;<b>Name</b><br>
                    &emsp;<?echo $name;?><br><br>
                    &emsp;<b>Passport No.</b><br>
                    &emsp;<?echo $passport;?><br><br>
                    &emsp;<b>Milespoint</b><br>
                    &emsp;<?echo $miles;?><br><br>
                    &emsp;<b>Date of Birth</b><br>
                    &emsp;<?echo $DOB;?><br><br>
                    &emsp;<b>Phone Number</b><br>
                    &emsp;<?echo $phone;?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>