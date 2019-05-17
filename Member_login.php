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