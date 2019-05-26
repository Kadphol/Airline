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

<?
    session_start();
?>
<html>
    <body style="bottom: 0%">
            <div class="card-container col-md-8">
                <div class="card-body">
                    <h2 class="d-flex justify-content-center"><b>Search Flight</b></h2>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6 pl-1 pr-2">
                                        <label>Departure Airport</label>
                                        <input type="text" name="Departure" class="form-control" id="departure_airport" placeholder="Departure Airport">
                                        <ul id="DsearchResult"></ul>
                                    </div>
                                    <div class="form-group col-md-6 pl-1">
                                        <label>Arrival Airport</label>
                                        <input type="text" name="Arrival" class="form-control" id="arrival_airport" placeholder="Arrival Airport">
                                        <ul id="AsearchResult"></ul>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6 pl-3 pr-1">
                                        <label>Departure Date</label>
                                        <input type="Date" class="form-control" name="DepartureDate">
                                    </div>
                                    <div class="form-group col-md-6 pl-2">
                                        <label>Returning</label>
                                        <input type="Date" class="form-control" name="Returning">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group col-md-6 mx-0 pl-0 pr-2">
                                    <label>Passenger</label>
                                    <select name="Passenger" class="form-control">
                                        <option value="" Selected>--Selected Type--</option>
                                        <option value="Adult">Adult</option>
                                        <option value="Child">Child</option>I
                                        <option value="Infant">Infant</option> 
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6 pl-2">
                                        <label>Class</label>
                                        <select name="Class" class="form-control">
                                            <option value="" Selected>--Selected Class--</option>
                                                  <option value="FirstClass" >First Class</option>
                                            <option value="Business">Business</option>
                                            <option value="Economy">Economy</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
            </div>
    </body>
</html>
<script>
    $(document).ready(function(){
        $("#departue_airport").keyup(function() {
            var search = $(this).val();
            if(search != "") {
                $.ajax({
                    url: 'search.php',
                    type: 'post',
                    data: {search:search},
                    dataType: 'json',
                    success: function(response) {
                        var len = response.length;
                        $("#DsearchResult").empty();
                        for( var i = 0; i<len; i++) {
                            var id = response[i]['id'];
                            var airport = response[i]['value'];
                            $("#DsearchResult").append("<li value='"+id+"'>"+airport+"</li>");
                        }
                    }
                });
            }
        });
    });
</script>