<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost", "root", "", "airline");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($db, "SELECT * FROM airport");
    while ($result = mysqli_fetch_array($query)) {
        $airport[] = $result['AirportID'];
    }
?>

<html>

<head>
</head>

<body>
    <form action="AddAirplane_php.php" method="post">
        <div id='newElem'>
            <h1>Add Airplane</h1>
            <p>
                AirportID
                <!-- query AirportID -->
                <select name="AirportID">
                    <option value="" Selected>--AirportID--</option>
                    <?php
                    for ($i = 0; $i < sizeof($airport); $i++) { ?>
                        <option> <?php echo $airport[$i] ?> </option>
                    <?php } ?>
                </select><br><br>
                <!-- AirplaneID <input type="text" name="AirplaneID"> Auto Increment -->
                Register Date <input type="date" name="RegisDate"><br><br>
                Model No. <input type="text" name="ModelNo">
                Payload <input type="text" name="Payload"><br><br>
                Status
                <select name="Status">
                    <option value="" Selected>--Status--</option>
                    <option value="n">Not Active</option>
                    <option value="a">Active</option>
                </select>
            </p>
            <hr>
            <h2>Seat</h2>

            <div id="dynamicInput[0]">
                
                Row <input type="text" name="Row[]">
                to <input type="text" name="ToRow[]">
                <select name="Class[]">
                    <option value="" Selected>--Selected Class--</option>
                    <option value="FirsstClass[]">Firsst Class</option>
                    <option value="Business[]">Business</option>
                    <option value="Economy[]">Economy</option>
                </select>
                <input type="button" value="Add" onClick="Add();">
            </div>
        </div>
        <br>
        <input type="submit" value="Add Airplane">
    </form>
</body>
<script>
    var counter = 1;
    var dynamicInput = [];

    function Add() {
        var newdiv = document.createElement('div');
        newdiv.id = dynamicInput[counter];
        newdiv.innerHTML = "Row " + "<input type='text' name='Row[]'>" +
            " to " + "<input type='text' name='ToRow[]'>" +
            "<select name='Class[]'><option value='No[]' Selected>--Selected Class--</option><option value='FirsstClass[]'>Firsst Class</option><option value='Business[]'>Business</option><option value='Economy[]'>Economy</option></select>";
        document.getElementById('newElem').appendChild(newdiv);
        counter++;
    }
</script>

</html>