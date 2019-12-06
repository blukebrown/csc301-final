<?php
function get($key) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	
	else {
		return '';
	}
}

function getReservations($database) {
	// Get list of reservations
	$sql = file_get_contents('sql/getReservations.sql');
	$params = array(

	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$reservations = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $reservations;
}

function searchReservations($searchTerm, $radioOption, $database) {
	$searchTerm = '%' . $searchTerm . '%';
    switch ($radioOption) {
        case 1:
            $sql = file_get_contents('sql/getArrivals.sql');
            $params = array(
                'term' => $searchTerm
            );
            break;
        case 2:
            $sql = file_get_contents('sql/getRoomTypes.sql');
            $params = array(
                'term' => $searchTerm
            );
            break;
        case 3:
            $sql = file_get_contents('sql/getLastnames.sql');
            $params = array(
                'term' => $searchTerm
            );
            break;
        case 4:
            $sql = file_get_contents('sql/getFirstnames.sql');
            $params = array(
                'term' => $searchTerm
            );
            break;
        case 5:
            $sql = file_get_contents('sql/getResIDs.sql');
            $params = array(
                'term' => $searchTerm
            );
            break;
    }
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$reservations = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $reservations;
}


?>