<?php 

	include_once('classes/Student.php');
	include_once('classes/StudentImd.php');
	include_once('classes/StudentIs.php');


	if( !empty( $_POST )){
		
		try {
			//new student aanmaken
			$student = new Student();

			$student->Name = $_POST["name"];
			// Save 
			$artist->Save();
			//boodschap bij sucess
			$success = "The artist has been saved.";
		} 
		catch (Exception $e) {
			// boodschap bij fout
			$error = $e->getMessage();
	}

	}

	
	
	



?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.error {
			background-color: red;
			color: white;
			display: inline-block;
			padding: 0.3em;
			border-radius: 5px;
		}

		.success {
			background-color: orange;
			color: white;
			display: inline-block;
			padding: 0.3em;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	
	<?php if ( isset( $error )): ?>
		<div class="error"> <?php echo $error; ?></div>
	<?php endif; ?>

	<?php if ( isset( $success )): ?>
		<div class="success"> <?php echo $success; ?></div>
	<?php endif; ?>

	<form action="" method="post">
		<label for="firstname">Firstnaam</label>
		<input type="text" name="firstname" id="firstname">
		<label for="firstname">Lastnaam</label>
		<input type="text" name="lastname" id="lastname">
		<label for="age">Age</label>
		<input type="text" name="age" id="age">
		<label for="city">City</label>
		<input type="text" name="city" id="city">

		<!-- StudentImd-->
		<label for="photoshop">Photoshop Kennis</label>
		<input type="text" name="photoshop" id="photoshop">

		<!-- StudentIs-->
		<label for="netwerk">Netwerk Kennis</label>
		<input type="text" name="netwerk" id="netwerk">


		<button type="submit">Save Artist! </button>

	</form>
	
</body>
</html>