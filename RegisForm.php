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
        <title>Member Register</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="card-container col-md-8 bottom-margin">
            <div class="card-body">
                <form method = "post" action = "" id="regisForm">
                    <h1><b>Register</b></h1>
                    <hr>
                    <div class="container">
                        <input type="email" class="form-control form-center col-md-5" name="Email" id="Email" placeholder="Email">
                        <input type="password" class="form-control form-center col-md-5" name="Password" id="Password" placeholder="Password">
                        <input type="password" class="form-control form-center col-md-5" name="ConPassword" id="ConPassword" placeholder="Confirm Password">
                        <input type="text" class="form-control form-center col-md-5" name="Passport" id="Passport" placeholder="Passport No.">
                        <input type="text" class="form-control form-center col-md-5" name="FirstName" id="FirstName" placeholder="First Name">
                        <input type="text" class="form-control form-center col-md-5" name="LastName" id="LastName" placeholder="Last Name">
                    </div>

                    <div class="col-md-12">
                        <div class="form-check-center">
                            <label class="check-space"><input type="radio"  class="form-check-input" name="sex" id="sex" value="m"checked> Male</label>
                            <label class="check-space"><input type="radio"  class="form-check-input" name="sex" id="sex" value="f"> Female</label>
                        </div>
                    </div>

                    <div class="form-center col-md-12">
                        <div class="form-group">
                            <label>Date of Birth :</label> 
                            <input type="Date" class="form-control col-md-5" name="DOB" id="DOB" value="DOB">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <select name="Country" class="form-control" id="Country">
                                    <option value="" Selected>--Country--</option>
                                    <option value="+66">+66</option>
                                    <option value="+81">+81</option>
                                    <option value="+48">+48</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <input type="tel" class="form-control" name="PhoneNumber" id="PhoneNumber" placeholder="Phone Number">  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center"> 
                        <input type="submit" class="btn btn-success" value="Sign Up" id="btnRegis">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>


<script type = "text/javascript">
    $(document).ready(function() { //when document ready
        $("#regisForm").submit(function(event) { //Form on submit
            event.preventDefault(); //prevent default
            var form_data = $(this).serialize(); //get form data
            $.post("MemberRegis.php", form_data, function(response) { //send post data to php file
                if(response === "success") { //when respone success
                    window.location.href = "index.php"; //redirect to index
                } else {
                    console.log("wat?") 
                }
            }); 
        });
        
    });
</script>
