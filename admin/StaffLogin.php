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

<body>
    <div class="row justify-content-center">
        <div class="card-container col-md-8">
            <div class="card-body">

                <h1><b>Staff Login</b></h1>
                <hr>
                <form id='login' action='StaffLogin_php.php' method='post' accept-charset='UTF-8'>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6">
                            <label for="Email"><b>Email</b></label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="Email" required>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-6">
                            <label for="Password"><b>Password</b></label>
                            <input type="Password" class="form-control" placeholder="Enter Password" name="Password" required>
                        </div>
                    </div>

                    <div class="container d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>