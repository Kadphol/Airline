<?php
    
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    
    //error_reporting(~E_NOTICE);
    $RegisDate = mysqli_real_escape_string($db, $_POST["RegisDate"]);
    $ModelNo = mysqli_real_escape_string($db, $_POST["ModelNo"]);
    $Payload = mysqli_real_escape_string($db, $_POST["Payload"]);
    $Status = mysqli_real_escape_string($db, $_POST["Status"]);
    $Row =  $_POST["Row"];
    $ToRow = $_POST["ToRow"];
    $ClassName = $_POST["Class"];
    // echo $Row[0];
    // echo $ToRow[0];

    for($i=0;$i<sizeof($Row);$i++){
        $Row[$i] = $Row[$i]."-".$ToRow[$i];
    }
    // echo $Row[1];
    // echo $ClassName[1];
    
    $sql1= "INSERT INTO airplane (RegisterDate,Payload,Status,ModelNo)
            VALUES('$RegisDate','$Payload','$Status','$ModelNo')";
    mysqli_query($db, $sql1);
    $query = mysqli_query($db, "SELECT MAX(AirplaneID) FROM airplane");
    while ($result = mysqli_fetch_array($query)) {
        $AirplaneID = $result['MAX(AirplaneID)'];
    }
    for($j=0;$j<sizeof($Row);$j++){
        $sql2= "INSERT INTO airplaneseat (Row,AirplaneID,ClassName)
                VALUES('$Row[$j]','$AirplaneID','$ClassName[$j]')";
        if (!mysqli_query($db,$sql2)) {
            die('Error: ' . mysqli_error($db));
        }
    }
    header('location: AirportInformation.php');
?>