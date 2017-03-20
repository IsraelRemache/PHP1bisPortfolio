<?php 
	include_once("Student.php");

	class StudentIs extends Student {
		private $m_iNetwerkKennis;

		public function __toString(){

			$output = parent::__toString();
			//variabele binnen halen van kennis ( tussen 0 en 3)
			$output = "<p> En heeft " . $m_iNetwerkKennis ." Netwerk kennis </p>";
			return $output;
		}

	}