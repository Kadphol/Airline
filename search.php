<?php
    #include("admin/config/config.php");
    $db = new mysqli("localhost","root","","airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $searchTerm = $_POST['search'];
    
    $query = mysqli_query($db,"SELECT AirportID,CONCAT(AirportName,'(',AirportID,')') AS AirportName FROM Airport 
    WHERE AirportID LIKE '%".$searchTerm."%' OR AirportName LIKE '%".$searchTerm."%'");

    $airport = array();
    if($query -> num_rows > 0) {
        while($row = $query->fetch_assoc()){
            $data['id'] = $row['AirportID'];
            $data['value'] = $row['AirportName'];
            array_push($airport,$data);
        }
    }

    echo json_encode($airport);
?>