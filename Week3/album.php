<?php 

	session_start();


	if(isset($_SESSION['username'])){


	}
	else
	{
	    header('Location: index.php');
	}

	try
	{
	    $pdoconn = new PDO('mysql:host=localhost; dbname=spotify', 'root', 'root');

	    // de id van de artiest moet eigenlijk doorgegeven worden via de URL dus $_GET[];
	    // En dan query aanpassen met WHERE id=id dat nodig zou zijn.
	    
	    $sql = "SELECT * FROM albums";


	}
	catch(PDOException $e)
	{
		print_r($e->getMessage);
	}




?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>

	<div class="backbutton">
		<a href="userpage.php">Back to Artists</a>
	</div>

	<section id="albums">
	
	<div class="listartist"></div>
	<div class="artist"> 

        <?php foreach ($pdoconn->query($sql) as $key => $album): ?>
	        <li><h1><?php echo $album['title']; ?></h1></li>
	        <li><h2><?php echo $album['description']; ?></h2></li>
	        <img src="<?php echo $album['cover']; ?>" alt="<?php $album['title']; ?> cover">
	        <p>year: <?php echo $album['year']; ?></p>
        <?php endforeach; ?>
    </div>
	 </section>

	
</body>
</html>