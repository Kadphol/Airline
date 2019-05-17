<?php #Member login form
    include("config.php"); #include database config
    session_start(); #start session
    $error = "";
    if($_SERVER["REQUEST_METHOD"]=="POST") { 
        #get email and password from form
        $member_email = mysqli_real_escape_string($db,$_POST['email']);
        $member_password = mysqli_real_escape_string($db,$_POST['password']);
        #queries
        $sql = "SELECT Email FROM Member WHERE Email = '$member_email' AND Password = '$member_password'";#query to select email and password
        $result = mysqli_query($db,$sql); 
        //$row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
        $count = mysqli_num_rows($result);
        #check email and password
        if($count == 1) { #if result match email an password,table row must be 1
            $_SESSION['login_member'] = $member_email; #create session for login member
            #successful login target page
            header("location: index.php"); 
        } else { #wrong email or password
            $error = "Your Email or Password is incorrect";
        }
    }
?>
<html>
    <head>
        <title>Member login page</title>
    </head>
    <body>
        <div align = "center">
            <div style = "width:300px; border: solid 1px #333333;" align = "left">
                <div tyle = "margin:30px">
                    <form action = "" method = "post">
                        <label>Email :</label>
                        <input type = "text" name = "email"><br><br>
                        <label>Password :</label>
                        <input type = "text" name = "password"><br><br>
                        <input type = "submit" value = "Submit"><br><br>
                    </form>
                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                </div>
            </div>
        </div>
    </body>
</html>