<?php 

	include_once('classes/Student.php');
	include_once('classes/StudentImd.php');
	include_once('classes/StudentIs.php');


	if( !empty( $_POST )){
		
		try {
			//new student aanmaken
			$student = new Student();

			$student->Firstname = $_POST["firstname"];
			$student->Lastname = $_POST["lastname"];
			$student->Age = $_POST["age"];
			$student->City = $_POST["city"];
			$student->Photoshop = $_POST["photoshop"];
			$student->Netwerk = $_POST["netwerk"];
			
			// Save 
			$student->Save();
			//boodschap bij sucess
			$success = "The student has been saved.";
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
	<title>Students at Thomas More</title>
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
		.insertstudent {
			width: 100%;
			display: flex;
			flex-direction: column;
		}
		.instertstudent[type=text]{
			width: 100%;
    		padding: 22px 40px;
    		margin: 8px 0;
    		box-sizing: border-box;
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

	<form action="" method="post" class="insertstudent">
		<label for="firstname">Voornaam</label>
		<input type="text" name="firstname" id="firstname">
		<label for="lastname">Achternaam</label>
		<input type="text" name="lastname" id="lastname">
		<label for="age">Leeftijd</label>
		<input type="text" name="age" id="age">
		<label for="city">Stad</label>
		<input type="text" name="city" id="city">

		<!-- StudentImd-->
		<label for="photoshop">Photoshop Kennis</label>
		<input type="text" name="photoshop" id="photoshop">

		<!-- StudentIs-->
		<label for="netwerk">Netwerk Kennis</label>
		<input type="text" name="netwerk" id="netwerk">


		<button type="submit"> Student Opslaan </button>

	</form>
	
</body>
</html>