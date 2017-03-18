<?php class Student {

		
		private $m_sFirstname;
		private $m_sLastname;	
		private $m_iAge;	
		private $m_sCity;	
		private $m_iImdId;	
		private $m_iIsId;

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
			} 
		}

		public function Save(){
			//connection maken (PDO)

			$conn = new PDO('mysql:host=localhost; dbname=students','root','root');

			//query schrijven
			$statement = $conn->prepare("INSERT INTO students (firstname, lastname) VALUES (:name, :lastname)");
			$statement->bindValue(":firstname", $this->m_sFirstname);
			$statement->bindValue(":lastname", $this->m_sLastname);

			//query executen
			$res = $statement->execute();

			//gelukt of niet?

			return ($res);


		}

		public function __toString(){

			$output = "<h1>" . $this->m_sFirstname . "</h1>";
			$output += "<p>" . $this->m_sLastname . "</p>";
			return $output;
		}




	}



// php word niet afgesloten om spaties tegen te gaan, want als dit (spaties) mee zou include worden dan
// kan je geen redirect meer meegeven. 