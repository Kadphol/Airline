<?php
    #include("config/config.php");
    $db = mysqli_connect("localhost","root","","airline");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: ".mysqli_connect_error();
    }
    $sql = "SELECT MemberID,CONCAT(FirstName,' ',LastName) AS Name,MilesPoint
            FROM Member
            ORDER BY MilesPoint DESC";
    $query = mysqli_query($db,$sql);
    $Count = 1;
?>
<!DOCTYPE html>
    <head>
        <title>Most Milespoint of Member Report</title>
    </head>
    <body>
        <div>
            <h1><b>Most Milespoint of Member</b></h1>
            <table>
                <tr>
                    <td>No.</td>
                    <td>MemberID</td>
                    <td>Name</td>
                    <td>Milespoint</td>
                </tr>
                <?php
                if($query) {
                    while($row= mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>".$Count."</td>";
                        echo "<td>".$row["MemberID"]."</td>";
                        echo "<td>".$row["Name"]."</td>";
                        echo "<td>".$row["MilesPoint"]."</td>";
                        $Count++;
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
    </body>
</html>