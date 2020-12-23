<?php
	
	require_once ('Database.php');

	class Tournament extends Database{

		public $query, $error;

		public function addtournament($name, $t_id, $fee, $prize, $type, $map, $players, $level, $counter, $new_name, $time, $open_time){

			if($this->Insert('tournament',['tournament_name','tournament_id','entry_fee','prize','tournament_type','tournament_map','players','level','counter_code','image','start_time','open_time'],[$name, $t_id, $fee, $prize, $type, $map, $players, $level, $counter, $new_name, $time, $open_time])){
				return true;
			}

			$this->errors = $this->errors;
			return false;
		}

		public function gettournament($where = null){

			if($this->Select(['*'], 'tournament', $where)){

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