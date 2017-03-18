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
	    $sql = "SELECT * FROM artists";
	}
	catch(PDOException $e)
	{
	//print_r($e->getMessage);
	}





?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>

<header>
        <h1 class="logo">Spotify</h1>
        <nav>
            <ul>
                <li><a href="logout.php">Logout</a></li>
               
            </ul>
        </nav>
    </header>

	<section id="albums">
	
	<div class="listartist"></div>
	<div class="artist"> 
        <?php foreach ($pdoconn->query($sql) as $key => $artist): ?>
        <li><a href="album.php?album=<?php echo $key;?>"><?php echo $artist['name']; ?></a></li>
        <?php endforeach; ?>
    </div>


        
    </section>

	
</body>
</html>

