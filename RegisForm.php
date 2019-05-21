<?php #Validation
    // $emailErr = $passportErr = $nameErr = $phoneErr = "";
    // if($_SERVER["REQUEST_METHOD"] == "POST") {
    //     if(empty($_POST["Email"])) { #check email empty
    //         $emailErr = "*Email is required!";
    //     } else {
            
    //     }
    //     if(empty($_POST["Passport"])) { #check passport empty
    //         $passportErr = "*Passport number is required!";
    //     } else {

    //     }
    //     if(empty($_POST["FirstName"] || empty($_POST["LastName"]))) { #check name empty
    //         $nameErr = "*Name is required!";
    //     } else {

    //     }
    //     if(empty($_POST["PhoneNumber"])) { #check phone number empty
    //         $phoneErr = "*Phone number is required!";
    //     } else {
            
    //     }
    // }
?>

<html>
    <head>
        <title>Member Register</title>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <form method = "post" action = "" id="regisForm">
            <h1>Register</h1>
            <input type="email" name="Email" id="Email" placeholder="Email">
            <!--<span class = "error"><? echo $emailErr;?></span>--> <br><br> <!--show email error-->
            <input type="password" name="Password" id="Password" placeholder="Password"><br><br>
            <input type="password" name="ConPassword" id="ConPassword" placeholder="Confirm Password"><br><br>
            <input type="text" name="Passport" id="Passport" placeholder="Passport No.">
            <!--<span class = "error"><? echo $passportErr;?></span>--> <br><br> <!--show passport error-->
            <input type="text" name="FirstName" id="FirstName" placeholder="First Name">
            <input type="text" name="LastName" id="LastName" placeholder="Last Name">
            <!--<span class = "error"><? echo $nameErr;?></span>--><br><br> <!--show name error-->
            <input type="radio" name="sex" id="sex" value="m"checked>Male
            <input type="radio" name="sex" id="sex" value="f">Female<br><br>
            <p>Dath of Birth :</p>
            <input type="Date" name="DOB" id="DOB" value="DOB"><br><br>
            <select name="Country">
                <option value="" Selected>--Country--</option>
                <option value="+66">+66</option>
                <option value="+81">+81</option>
                <option value="+48">+48</option>
            </select>
            <input type="tel" name="PhoneNumber" id="PhoneNumber" placeholder="Phone Number">
            <!--<span class = "error"><? echo $phoneErr;?></span>--><br><br> <!--show phone number error-->
            <input type="submit" value="Sign Up" id="btnRegis">
        </form>
    </body>
</html>
<script type = "text/javascript">
    $(document).ready(function() {
        $("#btnRegis").click(function() {
           var email = $("#Email").val();
           $.post("MemberRegis.php",{
               email: email
           }, function(data) {
               if(data == "You have Successfully Registered.....") {
                   $("#regisForm")[0].reset();
                   alert(data);
               }
           });
        });
    });



     // $.ajax({
    //     type: "POST",
    //     url: "MemberRegis.php",
    //     dataType: 'JSON',
    //     async: false,
    //     data: $("#regisForm").serialize(),
    //     success: function(result) {
    //         console.log("something");
    //         if(result.status == 1) {
    //             alert(result.message);
    //         } else {
    //             alert(result.message);
    //         }
    //     }
    // });
</script>
