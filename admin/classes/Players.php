<?php
	
	require_once ('Database.php');

	class Players extends Database{

		public $query, $error;

		public function addplayers($name, $email, $hash_pass, $id, $bkash){

			if($this->Insert('players',['f_name','email','password','id_code','bkash'],[$name, $email, $hash_pass, $id, $bkash])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function getplayers($where = null){

			if($this->Select(['*'], 'players', $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function updatetournament($table, $columnValue, $where){

			if($this->Update($table, $columnValue, $where)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public function deletetournament($table, $where){

			if($this->Delete($table,['id','=', $where])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>