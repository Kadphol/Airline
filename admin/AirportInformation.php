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
    </style>
</head>

<body>

    <h1>Airport Information</h1>
    <p>Edit</p>
    <hr>
    <h3>AirportID&emsp;&emsp;AirportName</h3>
    <p>DMK&emsp;&emsp;&emsp;&emsp;Donmueng</p>
    <h3>Street Address</h3>
    <p>3/100 The Cube Pracha Uthit B Building Soi Pracha Uthit 37</p>
    <h3>Country&emsp;&emsp;Postal Code&emsp;&emsp;&emsp;&emsp;City&emsp;&emsp;State/Province</h3>
    <p>Thailand&emsp;&emsp;&emsp;10140&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Bangkok&emsp;&emsp;Ratchaburana</p>
    <h3>Airport Tax</h3>
    <p>244.48 THB</p>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Flight')">Flight</button>
        <button class="tablinks" onclick="openCity(event, 'Airplane')">Airplane</button>
        <button class="tablinks" onclick="openCity(event, 'Staff')">Staff</button>
    </div>

    <div id="Flight" class="tabcontent">
        <p>+ Add Flight</p>
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
                <td>FD3306</td>
                <td>DMK-CMK</td>
                <td>Monday,Friday</td>
                <td>HG-4483</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
            <tr>
                <td>FD3306</td>
                <td>DMK-CMK</td>
                <td>Everyday</td>
                <td>HG-4483</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
        </table>
    </div>

    <div id="Airplane" class="tabcontent">
        <p>+ Add Airplane</p>
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
                <td>HG-345</td>
                <td>10-01-2010</td>
                <td>BOEING777</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
            <tr>
                <td>HG-345</td>
                <td>10-01-2010</td>
                <td>BOEING777</td>
                <td>A</td>
                <td>Manage</td>
            </tr>
        </table>
    </div>

    <div id="Staff" class="tabcontent">
        <p>+ Add Staff</p>
        <table id="myTable">
            <tr class="header">
                <th>Staff</th>
                <th>StaffID</th>
                <th>AirportID</th>
                <th>Name</th>
                <th>Position</th>
                <th> </th>
            </tr>
            <tr>
                <td>S12345</td>
                <td>HG-678</td>
                <td>Kiekie Eiei</td>
                <td>Staff</td>
                <td>Manage</td>
            </tr>
            <tr>
                <td>S12345</td>
                <td>HG-678</td>
                <td>Kiekie Eiei</td>
                <td>Staff</td>
                <td>Manage</td>
            </tr>
            <tr>
                <td>S12345</td>
                <td>HG-678</td>
                <td>Kiekie Eiei</td>
                <td>Staff</td>
                <td>Manage</td>
            </tr>
        </table>
    </div>

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
    </script>
</body>

</html>