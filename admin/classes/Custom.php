<?php
	
	require_once ('Database.php');

	class Custom extends Database{

		public $query, $error;

		public function addcustom($tournament_id,$custom,$pass){

			if($this->Insert('custom',['tournament_id','custom_id','password'],[$tournament_id,$custom,$pass])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getcustom($where = null){

			if($this->Select(['*'], 'custom', $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function updatecustom($table, $columnValue, $where){

			if($this->Update($table, $columnValue, $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function deletecustom($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>