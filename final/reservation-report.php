<?php
include('config.php');

include('functions.php');

$resID = get('resID');

$reservation = null;

if(!empty($resID)) {
	$sql = file_get_contents('sql/getReservation.sql');
	$params = array(
		'res_id' => $resID
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$reservations = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$reservation = $reservations[0];
} 

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$guest_firstname = $_POST['firstname'];
    $guest_lastname = $_POST['lastname'];
    $guest_email = $_POST['email'];
    $guest_phone = $_POST['phone'];
    $guest_zip = $_POST['zip'];
    $guest_card = $_POST['card'];
    
//    $guest_id = $_POST['guest_id'];

    $res_arrival = $_POST['arrival'];
    $res_dept = $_POST['departure'];
    $room_type = $_POST['roomtype'];

    // Convert HTML date to mySQL DATE format
    $arrival=date("Y-m-d H:i:s",strtotime($res_arrival));
    $departure=date("Y-m-d H:i:s",strtotime($res_dept));

    // Update Guest
    $sql = file_get_contents('sql/updateGuest.sql');
    $params = array(
        'guest_firstname' => $guest_firstname,
        'guest_lastname' => $guest_lastname,
        'guest_email' => $guest_email,
        'guest_phone' => $guest_phone,
        'guest_zip' => $guest_zip,
        'guest_card' => $guest_card,
        'guest_id' => $reservation['guest_id']
    );

    $statement = $database->prepare($sql);
    $statement->execute($params);

    //Update Reservation information
    $sql = file_get_contents('sql/updateReservation.sql');
    $params = array(
        'res_arrival' => $arrival,
        'res_dept' => $departure,
        'room_id' => $room_type,
        'res_id' => $resID
    );

    $statement = $database->prepare($sql);
    $statement->execute($params);
    
    header("location: reservation-report.php?resID=" . $reservation['res_id'] . "");
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Reservation Report</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        #wrapper {
            width: 100vw;
            /*            height: 100vh;*/
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #form-container {
            width: 75%;
            max-width: 800px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, .05);
            border: 2px solid black;
            box-shadow: 7px 7px 0 0 rgba(0, 0, 0, .8);
            padding: 2em;
        }

        form {
            display: flex;
            flex-direction: column;

        }

        .form-row {
            display: flex;
            flex-direction: row;
            margin: 10px 0;
        }

        .form-element {
            display: flex;
            flex-direction: column;
        }

        input {
            width: 200px;
            line-height: 1.5rem;
        }
        
        .submit-button {
            display: flex;
            justify-content: center;
        }
        
        input[type="submit"] {
            width: 125px;
            height: 40px;
            border: 2px solid black;
            text-transform: uppercase;
            margin-top: 2em;
        }
        
        #submit-button a {
            text-decoration: none;
            color: black;
        }
        
        #return-btn {
            width: 125px;
            height: 40px;
            border: 2px solid black;
            text-transform: uppercase;
            margin-top: 2em;
            background-color: white;
        }
        
        header {
            background-color: black;
            height: 50px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: center;
            margin-bottom: 2em;
        }

        header a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
   <header>
        <!-- print currently accessed by the current username -->
        <p>Logged in as: <?php echo $employee->emp_firstname ?></p>

        <!-- A link to the logout.php file -->
        <p>
            <a href="logout.php">Log Out</a>
        </p>
    </header>
    <div id="wrapper">
        <div id="form-container">
            <h1>Reservation Report</h1>
            <form action="" method="POST" autocomplete="off">
                <div class="form-row">
                    <div class="form-element"><label>First Name</label>
                        <input name="firstname" type="text" class="form-control" value="<?php echo $reservation['guest_firstname'] ?>"></div>
                    <div class="form-element"><label>Last Name</label>
                        <input name="lastname" type="text" class="form-control" value="<?php echo $reservation['guest_lastname'] ?>"></div>
                </div>
                <div class="form-row">
                    <div class="form-element">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" value="<?php echo $reservation['guest_email'] ?>">
                    </div>
                    <div class="form-element">
                        <label>Phone</label>
                        <input name="phone" type="tel" class="form-control" value="<?php echo $reservation['guest_phone'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-element">
                        <label>Zip Code</label>
                        <input name="zip" type="text" value="<?php echo $reservation['guest_zip'] ?>">
                    </div>
                    <div class="form-element">
                        <label>Card</label>
                        <input name="card" type="text" pattern="[0-9]{13,16}" class="form-control" value="<?php echo $reservation['guest_card'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-element">
                        <label>Reservation ID</label>
                        <input name="firstname" type="text" class="form-control" value="<?php echo $reservation['res_id'] ?>" disabled>
                    </div>
                    <div class="form-element">
                        <label>Reservation Made</label>
                        <input name="firstname" type="text" class="form-control" value="<?php echo $reservation['res_time'] ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-element">
                        <label>Room Type</label>
                        <input name="roomtype" type="text" class="form-control" value="<?php echo $reservation['room_id'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-element">
                        <label>Arrival Date</label>
                        <input name="arrival" type="date" class="form-control" value="<?php echo date('Y-m-d',strtotime($reservation['res_arrival'])) ?>">
                    </div>
                    <div class="form-element">
                        <label>Departure Date</label>
                        <input name="departure" type="date" class="form-control" value="<?php echo date('Y-m-d',strtotime($reservation['res_dept'])) ?>">
                    </div>
                </div>
                <div class="submit-button">
                    <input type="submit" class="button" value="Save Edits"/>
                </div>
                <div class="submit-button">
                    <button id="return-btn"><a href="reservation-list.php">Return to Reservations</a></button>
                </div>
            </form>
        </div>
    </div>

</body></html>
