<?php 
	include_once("Student.php");

	class StudentImd extends Student {
		private $m_iPhotoshopKennis;

		public function __toString(){

			$output = parent::__toString();
			//variabele binnen halen van kennis ( tussen 0 en 3)
			$output = "<p> En heeft " . $m_iPhotoshopKennis ." Photoshop kennis </p>";
			return $output;
		}

	}