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

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        * {
            box-sizing: border-box;
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

        #myTable {
            border-collapse: collapse;
            width: 60%;
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
    <h1>Airport</h1>
    <p>AirportID : <?php echo $myAirportID?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $myAirportName?></p>
    <hr>
    <br>
    <p>AirportID/AirportName&emsp;
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Airport.." title="Type in a name" />
    </p>
    <table id="myTable">
        <tr class="header">
            <th style="width:30%;">AirportID</th>
            <th style="width:60%;">Airport Name</th>
        </tr>
        <?php for ($i = 0; $i<sizeof($AirportID); $i++){?>
            <tr>
                <td><?php echo $AirportID[$i] ?></td>
                <td><?php echo $AirportName[$i] ?></td>
            </tr>
        <?php } ?>

    </table>
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