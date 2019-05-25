<?php
session_start();
#include("config/config.php");
$db = mysqli_connect("localhost", "root", "", "airline");
$query = mysqli_query($db, "SELECT * FROM airport");
while ($result = mysqli_fetch_array($query)) {
    if ($result['AirportID'] == $_SESSION['AirportID']) {
        $myAirportID = $result['AirportID'];
        $myAirportName = $result['AirportName'];
        $Address = $result['Address'];
        $Tax = $result['AirportTax'];
    }
}
$query3 = mysqli_query($db, "SELECT * FROM staff");
while ($result3 = mysqli_fetch_array($query3)) {
    $StaffID[] = $result3['StaffID'];
    $AirportID[] = $result3['AirportID'];
    $FirstName[] = $result3['FirstName'];
    $LastName[] = $result3['LastName'];
    $Position[] = $result3['Position'];
}
?>
<html>

<head>
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

        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        #myTable th,
        #myTable td {
            text-align: left;
            padding: 12px;
        }

        #myTable tr {
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header,
        #myTable tr:hover {
            background-color: #f1f1f1;
        }

        #myInput {
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

    <h1>Airport Information</h1>
    <p>Edit</p>
    <hr>
    <h3>AirportID&emsp;&emsp;AirportName</h3>
    <p><?php echo $myAirportID ?>&emsp;&emsp;&emsp;&emsp;<?php echo $myAirportName ?></p>
    <h3>Street Address</h3>
    <p><?php echo $Address ?></p>
    <h3>Airport Tax</h3>
    <p><?php echo $Tax ?> THB</p>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Flight')">Flight</button>
        <button class="tablinks" onclick="openCity(event, 'Airplane')">Airplane</button>
        <button class="tablinks" onclick="openCity(event, 'Staff')">Staff</button>
    </div>

    <div id="Flight" class="tabcontent">
        <p>FlightID
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for FlightID.." title="Type in a name" />
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="button" value="+Add Flight" onclick="window.location.href = 'AddFlight.php'">
        </p>
        <table id="myTable">
            <tr class="header">
                <th>flight</th>
                <th>Route</th>
                <th>Day of Oparation</th>
                <th>AirplanID</th>
                <th>Active</th>
                <th> </th>
            </tr>
            <tr>
                <td>FD3306</td>
                <td>DMK-CMK</td>
                <td>Monday,Friday</td>
                <td>HG-4483</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
            <tr>
                <td>FD2106</td>
                <td>DMK-CMK</td>
                <td>Monday,Friday</td>
                <td>HG-4483</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
            <tr>
                <td>GG5506</td>
                <td>DMK-CMK</td>
                <td>Everyday</td>
                <td>HG-4483</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
        </table>
    </div>

    <div id="Airplane" class="tabcontent">
        <p>AirplaneID
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for AirplaneID.." title="Type in a name" />
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="button" value="+Add Airplane" onclick="window.location.href = 'AddAirplane.php'">
        </p>
        <table id="myTable">
            <tr class="header">
                <th>AirplaneID</th>
                <th>Register Date</th>
                <th>Model No.</th>
                <th>Active</th>
                <th> </th>
            </tr>
            <tr>
                <td>HG-345</td>
                <td>10-01-2010</td>
                <td>BOEING777</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
            <tr>
                <td>HG-123</td>
                <td>10-01-2010</td>
                <td>BOEING777</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
            <tr>
                <td>BB-345</td>
                <td>10-01-2010</td>
                <td>BOEING777</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
        </table>
    </div>

    <div id="Staff" class="tabcontent">
        <p>StaffID
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for StaffID.." title="Type in a name" />
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="button" value="+Add Staff" onclick="window.location.href = 'StaffRegis.php'">
        </p>
        <table id="myTable">
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
                    <td><?php echo $Position[$i] ?></td>
                </tr>
            <?php } ?>
        </table>
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

    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
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