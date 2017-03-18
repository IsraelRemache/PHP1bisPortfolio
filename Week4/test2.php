<?php 
	//connecteer met database
	// mysqli !!!!! NOOIT mysql
	$conn = new mysqli("localhost", "root", "root", "php1");
	if ( $conn->connect_errno ){
		die("something went wrong:" . $conn->connect_errno );
	}
	else {
		// alles users afprinten
		$query = "SELECT * FROM users";
		$result = $conn->query( $query );

		while ( $user = $result->fetch_array()){
			echo "<h1>" . $user["username"] . "</h1>";
		}
	}
?>