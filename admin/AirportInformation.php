<?php
session_start();
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
$query = mysqli_query($db, "SELECT * FROM Airport");
while ($result = mysqli_fetch_array($query)) {
    if ($result['AirportID'] == $_SESSION['AirportID']) {
        $myAirportID = $result['AirportID'];
        $myAirportName = $result['AirportName'];
        $Address = $result['Address'];
        $Tax = $result['AirportTax'];
    }
}
// Route
$query1 = mysqli_query($db, "SELECT * FROM route WHERE Origin LIKE '$myAirportID' OR Destination LIKE '$myAirportID'");
if($query1) {
    while ($result1 = mysqli_fetch_array($query1)) {
        $RouteID[] = $result1['RouteID'];
        $Origin[] = $result1['Origin'];
        $Destination[] = $result1['Destination'];
        $Miles[] = $result1['Miles'];
    }
}
//Flight
$query2 = mysqli_query($db, "SELECT * FROM Flight f JOIN Route r ON f.RouteID=r.RouteID
                            WHERE Origin LIKE '$myAirportID' OR Destination LIKE '$myAirportID'");
if($query2) {
    while ($result2 = mysqli_fetch_array($query2)) {
        $FlightID[] = $result2['FlightID'];
        $DepartureDate[] = $result2['DepartureDate'];
        $ArrivalDate[] = $result2['ArrivalDate'];
        $OriginFlight[] = $result2['Origin'];
        $DestinationFlight[] = $result2['Destination'];
        $FAirplaneID[] = $result2['AirplaneID'];
        $StatusFlight[] = $result2['Status'];
    }
}
//Staff
$query3 = mysqli_query($db, "SELECT * FROM staff WHERE AirportID LIKE '$myAirportID'");
if($query3) {
    while ($result3 = mysqli_fetch_array($query3)) {
        $StaffID[] = $result3['StaffID'];
        $AirportID[] = $result3['AirportID'];
        $FirstName[] = $result3['FirstName'];
        $LastName[] = $result3['LastName'];
        $Position[] = $result3['Position'];
    }
}
//Airplane
$query4 = mysqli_query($db, "SELECT * FROM airplane");
if($query4) {
    while ($result4 = mysqli_fetch_array($query4)) {
        $AirplaneID[] = $result4['AirplaneID'];
        $RegisterDate[] = $result4['RegisterDate'];
        $ModelNo[] = $result4['ModelNo'];
        $StatusAirplane[] = $result4['Status'];
    }
}
error_reporting(0);
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

    <style>
        body {
            font-family: Arial;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        .myTable th,
        .myTable td {
            text-align: left;
            padding: 12px;
        }

        .myTable tr {
            border-bottom: 1px solid #ddd;
        }

        .myTable tr.header,
        .myTable tr:hover {
            background-color: #f1f1f1;
        }

        .myInput {
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 25%;
            font-size: 16px;
            padding: 8px 20px 8px 15px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }
    </style>
</head>

<body>
    <div class="row d-flex justify-content-center" style="margin-bottom:30%;">
        <div class="card-container col-md-8">
            <div class="card-body">



    <h1><b>Airport Information</b></h1>
    <input type="button"  class="btn btn-primary" value="<Back" onclick="window.location.href = 'WelcomeStaff.php'">
    <hr>
    <table class="table" style="border-width:0px;">
    <tr>
        <td>AirportID</td>
        <td>AirportName</td>
    </tr>
    <tr>
        <td><?php echo $myAirportID ?></td>
        <td><?php echo $myAirportName ?></td>
    </tr>
    </table>
    <h3><b>Street Address</b></h3>
    <p><?php echo $Address ?></p>
    <h3><b>Airport Tax</b></h3>
    <p><?php echo $Tax ?> THB</p>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Route')">Route</button>
        <button class="tablinks" onclick="openCity(event, 'Flight')">Flight</button>
        <button class="tablinks" onclick="openCity(event, 'Airplane')">Airplane</button>
        <button class="tablinks" onclick="openCity(event, 'Staff')">Staff</button>
    </div>

    <div id="Route" class="tabcontent">
        <p>RouteID
            <input type="text" class="myInput" onkeyup="myFunction(0)" placeholder="Search for RouteID.." class="form-control" title="Type in a name" />
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="button" value="+Add Route" class="btn btn-primary" onclick="window.location.href = 'AddRoute.php'">
        </p>
        <table class="table">
            <tr class="header">
                <th>RouteID</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Miles</th>
                <th> </th>
            </tr>
            <?php for ($i = 0; $i < sizeof($RouteID); $i++) { ?>
                <tr>
                    <td><?php echo $RouteID[$i] ?></td>
                    <td><?php echo $Origin[$i] ?></td>
                    <td><?php echo $Destination[$i] ?></td>
                    <td><?php echo $Miles[$i]; $linkAdress1 = "Route.php?RouteID=".$RouteID[$i]; ?></td>
                    <td><?php echo "<a href='$linkAdress1'>Manage</a></td>"?></td>
                </tr>
            <?php } ?>
 
        </table>
    </div>

    <div id="Flight" class="tabcontent">
        <p>FlightID
            <input type="text" class="myInput" onkeyup="myFunction(1)" class="form-control" placeholder="Search for FlightID.." title="Type in a name" />
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="button" value="+Add Flight" class="btn btn-primary" onclick="window.location.href = 'AddFlight.php'">
        </p>
        <table class="table">
            <tr class="header">
                <th>FlightID</th>
                <th>Departure Date</th>
                <th>Arrival Date</th>
                <th>Route</th>
                <th>AirplaneID</th>
                <th>Status</th>
                <th> </th>
            </tr>
            <?php for ($i = 0; $i < sizeof($FlightID); $i++) { ?>
                <tr>
                    <td><?php echo $FlightID[$i] ?></td>
                    <td><?php echo $DepartureDate[$i] ?></td>
                    <td><?php echo $ArrivalDate[$i] ?></td>
                    <td><?php echo $OriginFlight[$i]." - ".$DestinationFlight[$i] ?></td>
                    <td><?php echo $FAirplaneID[$i] ?></td>
                    <td><?php if($StatusFlight[$i]=='n'){echo "Not Active";}
                                else{echo "Active";} $linkAdress2 = "Flight.php?FlightID=".$FlightID[$i];?></td>
                    <td><?php echo "<a href='$linkAdress2'>Manage</a></td>"?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div id="Airplane" class="tabcontent">
        <p>AirplaneID
            <input type="text" class="myInput" onkeyup="myFunction(2)" class="form-control" placeholder="Search for AirplaneID.." title="Type in a name" />
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="button" value="+Add Airplane" class="btn btn-primary" onclick="window.location.href = 'AddAirplane.php'">
        </p>
        <table class="table">
            <tr class="header">
                <th>AirplaneID</th>
                <th>Register Date</th>
                <th>Model No.</th>
                <th>Status</th>
                <!-- <th> </th> -->
            </tr>
            <?php for ($i = 0; $i < sizeof($AirplaneID); $i++) { ?>
                <tr>
                    <td><?php echo $AirplaneID[$i] ?></td>
                    <td><?php echo $RegisterDate[$i] ?></td>
                    <td><?php echo $ModelNo[$i] ?></td>
                    <td><?php if($StatusAirplane[$i]=='n'){echo "Not Active";}
                                else{echo "Active";} ?></td>
                    <!-- <td>Manage</td> -->
                </tr>
            <?php } ?>
        </table>
    </div>

    <div id="Staff" class="tabcontent">
        <p>StaffID
            <input type="text" class="myInput" onkeyup="myFunction(3)" class="form-control" placeholder="Search for StaffID.." title="Type in a name" />
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="button" value="+Add Staff" class="btn btn-primary" onclick="window.location.href = 'StaffRegis.php'">
        </p>
        <table class="table">
            <tr class="header">
                <th>StaffID</th>
                <th>AirportID</th>
                <th>Name</th>
                <th>Position</th>
                <th> </th>
            </tr>
            <?php for ($i = 0; $i < sizeof($StaffID); $i++) { ?>
                <tr>
                    <td><?php echo $StaffID[$i] ?></td>
                    <td><?php echo $AirportID[$i] ?></td>
                    <td><?php echo $FirstName[$i] . " " . $LastName[$i] ?></td>
                    <td><?php echo $Position[$i]; $linkAdress3 = "Staff.php?StaffID=".$StaffID[$i];?></td>
                    <td><?php echo "<a href='$linkAdress3'>Manage</a></td>"?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    </div>
        </div>
    </div>

</body>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function myFunction(i) {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementsByClassName("myInput");
        filter = input[i].value.toUpperCase();
        console.log('i ='+i);
        table = document.getElementsByClassName("myTable");
        tr = table[i].getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>

</html>