<?php
    include("..config.php");
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_connect($db,$_POST['password']);
    if(isset($_POST['email']) && isset($_POST['password'])){
           if($email != NULL && $password != NULL)
           {
              echo "Success ".$email." ".$password;
           }
        
    };
?>