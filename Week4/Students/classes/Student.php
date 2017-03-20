<?php class Student {

		
		private $m_sFirstname;
		private $m_sLastname;	
		private $m_iAge;	
		private $m_sCity;	
		private $m_iPhotoshopKennis;	
		private $m_iNetwerkKennis;

		// LES 8 VERVOLG VANAF HIER

		public function __set($p_sProperty, $p_vValue){

			switch( $p_sProperty ){
				case "Firsname":
				// if functies toevoegen ter controle. met een exception voor fouten te detecteren.
				// fouten dus opvangen
				if ($p_vValue =="") {
					throw new Exception("Firstname cannot be empty.");


				} else {
					$this->m_sFirstname = $p_vValue;

				}


				break;

				case "Lastname":
					if ($p_vValue =="") {
					throw new Exception("Firstname cannot be empty.");


				} else {
					$this->m_sLastname = $p_vValue;

				}
				break;

				case "Age":
					if ($p_vValue < 0 || $p_vValue > 100 ) {
					throw new Exception("Enter a valide Age");


				} else {
					$this->m_iAge = $p_vValue;

				}
				break;

				case "City":
					if ($p_vValue =="") {
					throw new Exception("Enter a known City");


				} else {
					$this->m_sCity = $p_vValue;

				}
				break;

				case "Photoshop":
					if ($p_vValue < 0 || $p_vValue > 3 ) {
					throw new Exception("Skill can only be within 0 and 3");


				} else {
					$this->m_iPhotoshopKennis = $p_vValue;

				}
				break;

				case "Netwerk":
					if ($p_vValue < 0 || $p_vValue > 3 ) {
					throw new Exception("Skill can only be within 0 and 3");


				} else {
					$this->m_iNetwerkKennis = $p_vValue;

				}
				break;
			}

		}

		public function __get( $p_sProperty ){

			switch( $p_sProperty ){
				case "Firstname":
					return $this->m_sFirstname;
				break;

				case "Lastname":
					return $this->m_sLastname;
				break;

				case "Age":
					return $this->m_iAge;
				break;

				case "City":
					return $this->m_sCity;
				break;

				case "Photoshop":
					return $this->m_iPhotoshopKennis;
				break;

				case "Netwerk":
					return $this->m_iNetwerkKennis;
				break;
			} 
		}

		public function Save(){
			//connection maken (PDO)

			$conn = new PDO('mysql:host=localhost; dbname=students','root','root');

			//query schrijven
			$statement = $conn->prepare("INSERT INTO students (firstname, lastname, age, city, photoshop, netwerk) VALUES (:firstname, :lastname, :age, :city, :photoshop, :netwerk)");
			$statement->bindValue(":firstname", $this->m_sFirstname, PDO::PARAM_STR);
			$statement->bindValue(":lastname", $this->m_sLastname, PDO::PARAM_STR);
			$statement->bindValue(":age", $this->m_iAge, PDO::PARAM_INT);
			$statement->bindValue(":city", $this->m_sCity, PDO::PARAM_STR);
			$statement->bindValue(":photoshop", $this->m_iPhotoshopKennis, PDO::PARAM_INT);
			$statement->bindValue(":netwerk", $this->m_iNetwerkKennis, PDO::PARAM_INT);

			//query executen
			$res = $statement->execute();

			//gelukt of niet?

			return ($res);


		}

		public function __toString(){

			$output = "<p>" . $this->m_sFirstname . "</p>";
			$output += "<p>" . $this->m_sLastname . "</p>";
			$output += "Was Added";
			return $output;
		}




	}
