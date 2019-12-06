<?php 
include('config.php');

include('functions.php');

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$guest_firstname = $_POST['firstname'];
	$guest_lastname = $_POST['lastname'];
	$guest_email = $_POST['email'];
	$guest_phone = $_POST['phone'];
	$guest_zip = $_POST['zip'];
	$guest_card = $_POST['card'];
    
    $res_arrival = $_POST['arrival'];
    $res_dept = $_POST['departure'];
    $room_type = $_POST['roomtype'];
    
    // Convert HTML date to mySQL DATE format
    $arrival=date("Y-m-d H:i:s",strtotime($res_arrival));
    $departure=date("Y-m-d H:i:s",strtotime($res_dept));
	
		// Insert Guest
		$sql = file_get_contents('sql/insertGuest.sql');
		$params = array(
			'guest_firstname' => $guest_firstname,
			'guest_lastname' => $guest_lastname,
			'guest_email' => $guest_email,
			'guest_phone' => $guest_phone,
			'guest_zip' => $guest_zip,
			'guest_card' => $guest_card
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
    
        // Save most recent guest ID
        $guest_id = $database->lastInsertID();
    
		//Insert Reservation information
        $sql = file_get_contents('sql/insertReservation.sql');
		$params = array(
            'guest_id' => $guest_id,
			'res_arrival' => $arrival,
			'res_dept' => $departure,
            'room_id' => $room_type[0]
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
    
	// Redirect to Thank You page
	header('location: user-message.html');
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Get Shit Done Bootstrap Wizard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css">

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    
    <style>
        #login-button {
            position: absolute;
            top: 16px;
            right: 16px;
            background-color: white;
            width: 100px;
            height: 24px;
            text-align: center;
        }
        
        #login-button a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <div id="login-button"><a href="admin-login.php">LOGIN</a></div>
    <div class="image-container set-full-height" style="background-image: url('assets/img/wizard.jpg')">

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <div class="card wizard-card" data-color="blue" id="wizardProfile">
                            <form action="" method="post">
                                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                <div class="wizard-header">
                                    <h3>
                                        <b>BOOK</b> YOUR ROOM <br>
                                    </h3>
                                </div>

                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#about" data-toggle="tab">Information</a></li>
                                        <li><a href="#account" data-toggle="tab">Room Type</a></li>
                                        <li><a href="#address" data-toggle="tab">Reserve</a></li>
                                    </ul>

                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="about">
                                        <div class="row">
                                            <h4 class="info-text"> Let's start with the basic information</h4>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>First Name <small>(required)</small></label>
                                                    <input name="firstname" type="text" class="form-control" placeholder="Andrew...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name <small>(required)</small></label>
                                                    <input name="lastname" type="text" class="form-control" placeholder="Smith...">
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Email <small>(required)</small></label>
                                                    <input name="email" type="email" class="form-control" placeholder="andrew@creative-tim.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Phone Number <small>(required)</small></label>
                                                    <input name="phone" type="tel" class="form-control" placeholder="123-456-7890">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Zip Code <small>(required)</small></label>
                                                    <input name="zip" type="text" pattern="[0-9]" class="form-control" placeholder="e.g. 90210" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <h4 class="info-text"> Choose a Room Type </h4>
                                        <div class="row">

                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="roomtype[]" value="1">
                                                        <div class="icon">
                                                            <i class="fas fa-crown"></i>
                                                        </div>
                                                        <h6>Single King</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="roomtype[]" value="2">
                                                        <div class="icon">
                                                            <i class="fas fa-chess-queen"></i>
                                                        </div>
                                                        <h6>Single Queen</h6>
                                                    </div>

                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="roomtype[]" value="3">
                                                        <div class="icon">
                                                            <i class="fas fa-bed"></i>
                                                        </div>
                                                        <h6>Double Queen</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="address">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text">Finalize Reservation</h4>
                                            </div>
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <div class="form-group">
                                                    <label>Arrival Date</label>
                                                    <input name="arrival" type="date" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Departure Date</label>
                                                    <input name="departure" type="date" class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Card Information</label>
                                                    <input name="card" type="text" pattern="[0-9]{13,16}" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer height-wizard">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finish' />

                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->

        <!--
    <div class="footer">
        <div class="container">
             Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>
        </div>
    </div>
-->

    </div>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets/js/gsdk-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="assets/js/jquery.validate.min.js"></script>

</html>
