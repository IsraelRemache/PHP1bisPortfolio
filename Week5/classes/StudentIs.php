<?php 
	include_once("Student.php");

	class Student extends Student {
		private $m_iNetwerkKennis;

		public function __toString(){

			$output = parent::__toString();
			//variabele binnen halen van kennis ( tussen 0 en 3)
			$output = " Heeft zoveel netwerkkennis";
			return $output;
		}

	}