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


<html>
    <head>
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

<body>
    <div class="card-container col-md-8">
        <div class="card-body">
            <h1><b>Contact Details</b></h1>
            <hr>
            <div class="row">    
                <div class="col-md-5  ml-5">
                            <input type="text" class="form-control mt-1" name="FirstName" placeholder="First Name">
                            <input type="email" class="form-control mt-3" name="Email" placeholder="Email">
                </div>
                <div class="col-md-5 ml-5 mb-2">
                    <input type="text" class="form-control mt-1" name="LastName" placeholder="Last Name">
                    <input type="tel" class="form-control mt-3" name="PhoneNumber" placeholder="Phone Number">
                </div>
            </div>
        </div>
    </div>

    <div class="card-container col-md-8 mt-4">
        <div class="card-body">
            <h1><b>Booking Details</b></h1>
            <hr>
            <p>&emsp;<b>Depart Date</b><br>
             &emsp;11 June<br>
             &emsp;Bangkok-Don Mueng -> Phitsanulok<br>
             &emsp;FD 3304 / 12:05-13.05 / 1h 0m</p>
        </div>
    </div>

    <div class="card-container mt-4 col-md-8 bottom-margin">
        <div class="card-body">
            <h1><b>Payment</b></h1>
            <hr>
            <div class="row  offset-sm-1">
                <div class="col-md-5">
                        <div class="form-group">
                            <label>Credit/Debit Card</label>
                            <input type="text" name="Card" class="form-control" placeholder="Card Number">
                        </div>

                            <div class="form-row">
                                <div class="col-sm-8">
                                    <div class="form-inline"> 
                                        <select name='Month' class="form-control">
                                            <option value='' Selected>MM</option>
                                            <option value='1'>Janaury</option>
                                            <option value='2'>February</option>
                                            <option value='3'>March</option>
                                            <option value='4'>April</option>
                                            <option value='5'>May</option>
                                            <option value='6'>June</option>
                                            <option value='7'>July</option>
                                            <option value='8'>August</option>
                                            <option value='9'>September</option>
                                            <option value='10'>October</option>
                                            <option value='11'>November</option>
                                            <option value='12'>December</option>
                                        </select>
                                        <span style="width:10%; text-align: center"> / </span>
                                        <select name="Year" class="form-control">
                                            <option value='' Selected>YY</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1999">1999</option>
                                            <option value="1999">1999</option>
                                            <option value="1999">1998</option>
                                            <option value="1999">1997</option>
                                            <option value="1999">1996</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="CVV" placeholder="CVV">
                                    </div>
                                </div>
                            </div>
                  
                        <div class="form-group">
                            <input type="text" class="form-control mb-2" name="Name" placeholder="Name On Card">
                        </div>
                </div> 
                <div class="col-md-6">
                    <table class="ml-auto mr-1 mt-2">
                        <tr>
                            <td><h3 class="mb-0"><b>Total 929.00 THB</b></h3></td>
                        </tr>
                        <tr>
                            <td><em> No processing fee charged</em><br></td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>0.00</td>
                            <td>THB</td>
                        </tr>
                        <tr>
                            <td>Processing Fee</td>
                            <td>929.00</td>
                            <td>THB</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="form-group col-md-5 offset-sm-3">
                <input type="submit" class="btn btn-primary mt-2 offset-sm-4" value="Search Flight">    
            </div>
        </div>
    </div>
</body>
</html>