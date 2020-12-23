<?php
	
	require_once ('Database.php');

	class Checked extends Database{

		public $query, $error;

		public function UpdateCheck($table, $columnValue, $where){

			if($this->Update($table, $columnValue, $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>