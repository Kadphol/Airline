<html>

<head>
</head>

<body>
    <form id="form">
        <h1>Add Airplane</h1>
        <p>
            AirportID <input type="text" name="AirportID">
            AirpotName <input type="text" name="AirportID"><br><br>
            AirplaneID <input type="text" name="AirplaneID">
            Register Date <input type="date" name="RegisDate"><br><br>
            Model No. <input type="text" name="ModelNo">
            Patload <input type="text" name="Payload"><br><br>
            Status <input type="text" name="Status">
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

        <!-------------------------------------------------------------------------------------->

    </form>

    <script>
        var counter = 1;
        var dynamicInput = [];

        function Add() {
            var newdiv = document.createElement('div');
            newdiv.id = dynamicInput[counter];
            newdiv.innerHTML = "Row" + "<input type='text' name='Row[]'>" +
                " to " + "<input type='text' name='ToRow[]'>" +
                "<select name='Class[]'><option value='No[]' Selected>--Selected Class--</option><option value='FirsstClass[]'>Firsst Class</option><option value='Business[]'>Business</option><option value='Economy[]'>Economy</option></select>";
            document.getElementById('form').appendChild(newdiv);
            counter++;
        }
    </script>

    <input type="submit" value="Add Airplane">
</body>

</html>