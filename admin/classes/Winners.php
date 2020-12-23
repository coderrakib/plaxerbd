<?php
	
	require_once ('Database.php');

	class Winners extends Database{

		public $query, $error;

		public function addwinner($tournament_id,$name,$id){

			if($this->Insert('winners',['tournament_id','player_name','freefire_id'],[$tournament_id,$name,$id])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getwinner($where = null){

			if($this->Select(['*'], 'winners', $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function updatewinner($table, $columnValue, $where){

			if($this->Update($table, $columnValue, $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function deletewinner($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>