<?php
include('config.php');
include('functions.php');

$reservations = getReservations($database);

//if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (empty($_GET["search-field"])) {
        echo $_GET["search-field"];
    }  else {
        $searchTerm = get('search-term');
        $reservations = searchReservations($searchTerm, $_GET["search-field"], $database);
    }
//}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Room Report</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
        }

        th {
            text-align: left;
        }

        table {
            border-spacing: 5px;
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

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        form input[type="text"] {
            width: 200px;
            line-height: 1.5rem;
            border: 1px solid black;
            margin: 1em 8px;
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
    <h1>Reservation Log</h1>
    <form method="GET">
        <input type="text" name="search-term" placeholder="Search term..." />
        <input type="submit" />
        <label>Search Parameter: </label>
        <input type="radio" name="search-field" value="1">Arrival Date
        <input type="radio" name="search-field" value="2">Room Type
        <input type="radio" name="search-field" value="3">Lastname
        <input type="radio" name="search-field" value="4">Firstname
        <input type="radio" name="search-field" value="5">Res_ID
    </form>
    <table style="width:100%">
        <tr>
            <th>Arrival</th>
            <th>Room Type</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Res_ID</th>
        </tr>

        <?php foreach($reservations as $reservation) : ?>
        <tr>
            <td><?php echo $reservation['res_arrival']; ?></td>
            <td><?php echo $reservation['room_id']; ?></td>
            <td><?php echo $reservation['guest_lastname']; ?></td>
            <td><?php echo $reservation['guest_firstname']; ?></td>
            <td><?php echo $reservation['res_id']; ?></td>
            <td><a href="reservation-report.php?resID=<?php echo $reservation['res_id'] ?>">Edit Reservation</a></td>
        </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>
