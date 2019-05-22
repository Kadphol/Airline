<?php
    #include("admin/config/config.php");
    session_start();
    $errors = array();
    $db = mysqli_connect("localhost","root","","airline");
    echo "You have Successfully Registered.....";
    #echo $_POST["email"];
    $email = mysqli_real_escape_string($db,$_POST["email"]);
    $pwd = mysqli_real_escape_string($db,$_POST["password"]);
    $passport = mysqli_real_escape_string($db,$_POST["passport"]);
    $fname = mysqli_real_escape_string($db,$_POST["fname"]);
    $lname = mysqli_real_escape_string($db,$_POST["lname"]);
    $sex = mysqli_real_escape_string($db,$_POST["sex"]);
    $DOB = mysqli_real_escape_string($db,$_POST["DOB"]);
    $country = mysqli_real_escape_string($db,$_POST["country"]);
    $phone = mysqli_real_escape_string($db,$_POST["phone"]);

    $check_query = "SELECT * FROM Email WHERE Email = '$email' LIMIT 1";
    $result = mysqli_query($db,$check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['email'] === $email) {
          array_push($errors, "email already exists");
        }
    }

    if(count($errors)==0) {
        $pwd = md5($pwd);

        $query = "INSERT INTO Member (Email,Password,FirstName,LastName,Sex,DOB,Country,PhoneNumber,Passport)
        VALUES($email,$pwd,$fname,$lname,$sex,$DOB,$country,$phone,$passport)";
        if (!mysqli_query($db,$query)) {
            die('Error: '.mysqli_error($con));
        } else{
            $_SESSION['name'] = $fname;
            $_SESSION['success'] = "You are now loggin in";
            header('location: index.php');
        }
    }

?>