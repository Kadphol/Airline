
<!-- import font roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<!-- import style -->
<link rel="stylesheet" type="text/css" href="style.css">

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

<!DOCTYPE html>
<html lang="en">
<html>
    <head>
         <meta charset="utf-8"> 
         <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <div class="card-container col-md-8">
            <div class="card-body">
                <h1><b>Passenger Detail</b></h1>
                <form>
                    <p>Adult 1</p>
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
                </form>
            </div>
        </div>

        <nav class="navbar navbar-expand-sm bg-white navbar-white fixed-bottom">
            <ul class="nav navbar-nav navbar-left">
               <p class="total">Total: 245,234 BAHT</p>
            </ul>
            <ul class="nav navbar-nav navbar-right">
    	        <input type="submit" class="btn btn-secondary navbar-btn" value="Next">
            </ul>
        </nav>
    </body>
</html>
