<!-- import font roboto -->
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

<!-- import style -->
<link rel="stylesheet" type="text/css" href="DefaultStyle.css">

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

<!--select seat script-->
<link rel="stylesheet" type="text/css" href="jquery.seat-charts.css">
<link rel="stylesheet" type="text/css" href="seat.css">

<!--LOGIN PHP-->
<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "airline");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['login'])) {
    $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']);

    $data = $connection->query("SELECT email FROM member WHERE email='$email' AND password='$password'");
    #$query = $connection->query("SELECT * FROM Flight WHERE email='$email' AND password='$password'");

    if ($data->num_rows > 0) {
        $_SESSION['loggedIN'] = '1';
        $_SESSION['email'] = $email;
        exit('login success...');
    } else {
        exit('please check your input');
    }
}
$_SESSION['AddOnName'] = $_GET['AddOnName'];

$FlightID =  $_SESSION['FlightID'];
$AddOnName = $_SESSION['AddOnName'];

#BOOKING GET SESSION
$dAirportID = $_SESSION['dAirportID'];
$aAirtportID = $_SESSION['aAirportID'];
$DepartureDate = $_SESSION['DepartureDate'];
$ReturnDate = $_SESSION['ReturnDate'];
$NumberOfPassenger = $_SESSION['NumberOfPassenger'];
$Class = $_SESSION['Class'];
?>

<html>

<head>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!--NAVBAR-->
    <?php
    if (isset($_SESSION['loggedIN'])) {
        ?>
        <nav class="mb-1 navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="Index.php"><b>Airlines</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Mybooking.php">Manage Booking</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php" name="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

    <?php
} else {
    ?>
        <nav class="mb-1 navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="Index.php"><b>Airlines</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" data-toggle="modal" data-target="#loginModal">Login</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <?php }
?>

    <!--SELECT SEAT-->
    <div class="card-container col-md-8 " style="height:600px; margin-bottom:10%;">
        <div class="card-body">

            <h1><b>Select Seat</b></h1>
            <hr>
            <div class="container d-flex justify-content-center">
                <div id="seat-map">
                    <div class="front-indicator" style="margin-left:55px;">Front</div>
                </div>
                <div class="booking-details">
                    <h2>Booking Details</h2>
                    <h3> Selected Seats (<span id="counter">0</span>):</h3>
                    <ul id="selected-seats">
                    </ul>
                    <br>
                    <button class="btn btn-primary" onclick="sendData()">Checkout &raquo;</button>
                    <div id="legend" style="top: 250px;"></div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

<script>
    $(document).ready(function() {
        $('#login').on('click', function() {
            var email = $('#email').val();
            var password = $('#password').val();
            if (email == '' || password == '')
                alert('Please check your inputs');

            $.ajax({
                url: 'index.php',
                method: 'POST',
                data: {
                    login: 1,
                    email: email,
                    password: password
                },
                success: function(response) {
                    $("#response").html(response);

                    if (response.indexOf('Success') >= 0)
                        window.locaiton = 'test.php';
                },
                dataType: 'text'
            })
        });
    });
</script>

<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="jquery.seat-charts.js"></script>
<script>
    var selectedClass = "<?php echo $Class ?>";
    var numberOfPassenger = "<?php echo $NumberOfPassenger ?>";
    let data

    $(document).ready(function() {
        var $cart = $('#selected-seats'),
            $counter = $('#counter'),
            $total = $('#total'),
            sc = $('#seat-map').seatCharts({
                map: [
                    'ff___ff',
                    'ff___ff',
                    '',
                    'bbb_bbb',
                    'bbb_bbb',
                    'eee_eee',
                    'eee_eee',
                    'eee_eee',
                    'eee_eee'
                ],
                seats: {
                    f: {
                        classes: 'first-class', //your custom CSS class
                        category: 'First Class'
                    },
                    b: {
                        classes: 'business-class', //your custom CSS class
                        category: 'Business Class'
                    },
                    e: {
                        classes: 'economy-class', //your custom CSS class
                        category: 'Economy Class'
                    }

                },
                naming: { //Define the ranks of other information
                    top: true,
                    columns: ['A', 'B', 'C', '', 'D', 'F', 'G'],
                    rows: ['01', '02', '', '03', '04', '05', '06', '07', '08', '09'],
                    getLabel: function(character, row, column) {
                        return row + column;
                    }
                },
                legend: {
                    node: $('#legend'),
                    items: [
                        ['f', 'available', 'First Class'],
                        ['b', 'available', 'Business Class'],
                        ['e', 'available', 'Economy Class'],
                        ['f', 'unavailable', 'Unavalible']
                    ]
                },
                click: function() {
                    if (this.status() == 'available') {
                        //let's create a new <li> which we'll add to the cart items
                        $('<li>' + this.data().category + ' Seat # ' + this.settings.label + ' <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                            .attr('id', 'cart-item-' + this.settings.id)
                            .data('seatId', this.settings.id)
                            .appendTo($cart);

                        /*
                         * Lets update the counter and total
                         *
                         * .find function will not find the current seat, because it will change its stauts only after return
                         * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                         */
                        $counter.text(sc.find('selected').length + 1);

                        return 'selected';
                    } else if (this.status() == 'selected') {
                        //update the counter
                        $counter.text(sc.find('selected').length - 1);
                        //and total
                        $total.text(recalculateTotal(sc) - this.data().price);

                        //remove the item from our cart
                        $('#cart-item-' + this.settings.id).remove();

                        //seat has been vacated
                        return 'available';
                    } else if (this.status() == 'unavailable') {
                        //seat has been already booked
                        return 'unavailable';
                    } else {
                        return this.style();
                    }
                }
            });

        //this will handle "[cancel]" link clicks
        $('#selected-seats').on('click', '.cancel-cart-item', function() {
            //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
            sc.get($(this).parents('li:first').data('seatId')).click();
            const doc = document.getElementById('seat-map')
            doc.style.pointerEvents = 'auto'
            data = sc.find('selected')

        });

        $('.seatCharts-seat').on('click', () => {
            // console.log(document.getElementsByClassName('seatCharts-seat')[0])
            const curSeat = sc.find('selected').length
            // console.log(curSeat, numberOfPassenger, sc.find('selected'))

            const doc = document.getElementById('seat-map')
            if (curSeat == numberOfPassenger) doc.style.pointerEvents = 'none'
            else doc.style.pointerEvents = 'auto'
            data = sc.find('selected')

        })

        //let's pretend some seats have already been booked

        //initial row for each class 
        var firstClassInitial = 1;
        var firstClassEnd = 2;

        var businessInitial = 3;
        var businessEnd = 4;

        var economyInitial = 5;
        var economyEnd = 8;


        if (selectedClass == 'First') { //firstclass
            for ($z = businessInitial; $z <= businessEnd; $z++) {
                $i = '0' + $z;
                sc.get([$i + '_A', $i + '_B', $i + '_C', $i + '_D', $i + '_E', $i + '_F', $i + '_G']).status('unavailable');
            }
            for ($z = economyInitial; $z <= economyEnd; $z++) {
                $i = '0' + $z;
                sc.get([$i + '_A', $i + '_B', $i + '_C', $i + '_D', $i + '_E', $i + '_F', $i + '_G']).status('unavailable');
            }
        } else if (selectedClass == 'Business') {
            for ($z = firstClassInitial; $z <= firstClassEnd; $z++) {
                $i = '0' + $z;
                sc.get([$i + '_A', $i + '_B', $i + '_C', $i + '_D', $i + '_E', $i + '_F', $i + '_G']).status('unavailable');
            }
            for ($z = economyInitial; $z <= economyEnd; $z++) {
                $i = '0' + $z;
                sc.get([$i + '_A', $i + '_B', $i + '_C', $i + '_D', $i + '_E', $i + '_F', $i + '_G']).status('unavailable');
            }
        } else {
            for ($z = firstClassInitial; $z <= firstClassEnd; $z++) {
                $i = '0' + $z;
                sc.get([$i + '_A', $i + '_B', $i + '_C', $i + '_D', $i + '_E', $i + '_F', $i + '_G']).status('unavailable');
            }
            for ($z = businessInitial; $z <= businessEnd; $z++) {

                $i = '0' + $z;
                sc.get([$i + '_A', $i + '_B', $i + '_C', $i + '_D', $i + '_E', $i + '_F', $i + '_G']).status('unavailable');
            }
        }

        function recalculateTotal(sc) {
            var total = 0;

            //basically find every selected seat and sum its price
            sc.find('selected').each(function() {
                total += this.data().price;
            });

            return total;
        }
    });


    function sendData() {
        let queryStringArr = ''
        data.seatIds.forEach((e, i) => {
            console.log(e)
            if (data.seatIds.length == i + 1) {
                queryStringArr += `${e}`
            } else {
                queryStringArr += `${e},`
            }
        })
        console.log(data.seatIds)
        const urlEndpoint = `PassengerDetail.php?data=${queryStringArr}`
        console.log(urlEndpoint)
        console.log(queryStringArr)
        window.location.replace(urlEndpoint)
        // console.log(data.seatIds)
        // return fetch('/airline/PassengerDetail.php', {
        //     method: 'GET',
        // })
    }
</script>