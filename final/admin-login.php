<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

// If form submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get username and password from the form as variables
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Query records that have usernames and passwords that match those in the customers table
	$sql = file_get_contents('sql/attemptLogin.sql');
	$params = array(
		'username' => $username
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	// If $users is not empty
	if(!empty($users)) {
        if(password_verify($password, $user['password'])) {

        }
        else {
            // Set $user equal to the first result of $users
            $user = $users[0];
		
            // Set a session variable with a key of customerID equal to the customerID returned
            $_SESSION['emp_id'] = $user['emp_id'];

            // Redirect to the index.php file
            header('location: reservation-list.php');   
        }
		
	}
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            width: 100vw;
            height: 100vh;
        }
        
        #login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 320px;
            background-color: #FFFFFF;
            border-radius: 10px;
            text-align: center;
        }
        
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
        input {
            width: 200px;
            border: 2px solid #000000;
            padding: 8px;
            margin: 1em 0;
            box-shadow: 0px 10px 0 -2px rgba(0, 0, 0, .2);
            
            transition: .4s ease;
        }
        
        input[type="submit"]:hover {
            box-shadow: none;
            color: white;
            background-color: black;
        }

    </style>
</head>

<body>
    <div class="image-container set-full-height" style="background-image: url('assets/img/wizard.jpg')"></div>
    
    <div id="login-container">
        <h1>Admin Login</h1>
        <form method="POST">
			<input type="text" name="username" placeholder="Username" />
			<input type="password" name="password" placeholder="Password" />
			<input type="submit" value="Log In" />
		</form>
    </div>
</body>

</html>
