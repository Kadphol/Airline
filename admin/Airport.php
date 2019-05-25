<?php
    session_start();
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT AirportID, AirportName FROM airport");
    while ($result = mysqli_fetch_array($query)) {
        $AirportID[] = $result['AirportID'];
        $AirportName[] = $result['AirportName'];
        if($result['AirportID'] == $_SESSION['AirportID']){
            $myAirportID = $result['AirportID'];
            $myAirportName = $result['AirportName'];
        }
    }

?>

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
                <h1><b>Airport</b></h1>
                <li class="list-group-item list-group-item-secondary">AirportID : <?php echo $myAirportID?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $myAirportName?></li>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label class="offset-md-2 py-1"><b>AirportID/AirportName</b></label>
                    </div>
                    <div class="col-sm-8 justify-content-left">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search for Airport.." title="Type in a name" />
                    </div>
                </div>

                <table  class="table">
                    <tr>
                        <th>AirportID</th>
                        <th>Airport Name</th>
                    </tr>
                    <?php for ($i = 0; $i<sizeof($AirportID); $i++){?>
                        <tr>
                            <td><?php echo $AirportID[$i] ?></td>
                            <td><?php echo $AirportName[$i] ?></td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
    </div>
   
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td_0 = tr[i].getElementsByTagName("td")[0];
                td_1 = tr[i].getElementsByTagName("td")[1];
                if (td_0 || td_1) {
                    txtValue_0 = td_0.textContent || td_0.innerText;
                    txtValue_1 = td_1.textContent || td_1.innerText;
                    if (txtValue_0.toUpperCase().indexOf(filter) > -1 || txtValue_1.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>