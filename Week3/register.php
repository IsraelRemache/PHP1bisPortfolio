<?php 
	// if gesubmit
    if( !empty( $_POST )){
        // Check of velden ingevuld zijn
        $username = $_POST['username'];

        $password = $_POST['password'];
        
        //password overschrijven met hash en options met cost van 12

        $options = [
            'cost' => 12,
        ];
        
        $password = password_hash($password, PASSWORD_DEFAULT, $options);

    
   		// connectie maken met database
   

        try
        {
            $pdoconn = new PDO('mysql:host=localhost; dbname=spotify', 'root', 'root');
        }
        catch(PDOException $e)
        {
			print_r($e->getMessage);
        }

		// insert query
		// $conn->real_escape_string gebruiken we om SQL-injectie tegen te gaan.
    	$query = "INSERT INTO users (email, password) VALUES ('" . $username . "' , '" . $password . "' ) ";
	   	$statement = $pdoconn->prepare("SELECT * from users where username = :username and
		password = :password");


	    $statement->bindParam(':username', $username);
	    $statement->bindParam(':password', $password);
	    $statement->execute();
	    $res = $pdoconn->query($query);

	    if ($res != false) {

	        session_start();
	        $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;

	        header('Location: index.php');

	    } else {

	        header('Location: registration.php');

	    }



    }



?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div class="spotiform">

<div class="screen">
<div class="nav">Register</div>
  <div class="logo"></div>
  <form action="" method="post">
    <div class="user">
      <input id="user" name="username" type="username" placeholder="Username"></input>
    </div>
    <div class="sep"></div>
    <div class="password">
      <input id="password" name="password" type="password" placeholder="Password"></input>
</div>

<button type="submit" id="submit" value="Register">Register</button>
  </form>

  <p>Already have an account? Let's <a href="index.php">login</a> then !</p>

	</div>

	</div>
	
</body>
</html>