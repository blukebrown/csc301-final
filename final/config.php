<?php

// Connecting to the MySQL database
$user = 'brownb23';
$password = '9c12f66d';

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_fall19_brownb23', $user, $password);

// Autoloader
function my_autoloader($class) {
    include 'classes/class.' . $class . '.php';
}

spl_autoload_register('my_autoloader');

// Start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URI']);

// if emp_id is not set in the session and current URL not login.php or guest page redirect to login page
if (!isset($_SESSION["emp_id"]) && ($current_url != 'admin-login.php' && $current_url != 'index.php' && $current_url != 'user-message.html')) {
    header("Location: admin-login.php");
}

// Else if session key emp_id is set get $employee from the database
elseif (isset($_SESSION["emp_id"])) {
	$sql = file_get_contents('sql/getEmployee.sql');
	$params = array(
		'emp_id' => $_SESSION["emp_id"]
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$employees = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$employee = new Employee($_SESSION["emp_id"], $database);
}

?>