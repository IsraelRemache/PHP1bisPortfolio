<?php
	//connectie maken met database
	try
    {
        $pdoconn = new PDO('mysql:host=localhost; dbname=spotify', 'root', 'root');
    }
    catch(PDOException $e)
    {
		print_r($e->getMessage);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // zit username/email en passwoord in database?

    $sql = "SELECT * FROM users WHERE email = :username LIMIT 1";
    $query = $pdoconn->prepare($sql);
    $query->execute( array( ':username'=>$username ) );
    $results = $query->fetchAll( PDO::FETCH_ASSOC );

    foreach( $results as $result ){
        if(password_verify($password, $result['password'])){
            session_start();
            $_SESSION['username'] = $username;
            header('Location: userpage.php');
        }
        else
        {
            header('Location: index.php');
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
<div class="nav">Log in</div>
  	<div class="logo"></div>
	  <form action="" method="post">
	    <div class="user">
	      <input id="user" name="username" type="username" placeholder="Username"></input>
	    </div>
	    <div class="sep"></div>
	    <div class="password">
	      <input id="password" name="password" type="password" placeholder="Password"></input>
		</div>

		<button type="submit" id="submit" value="Log In">Log In</button>
  	  </form>
	<p>Don't have an account yet? Then <a href="register.php">register</a> now !</p>
  </div>
  </div>

  
</body>
</html>