<?php
	
	require_once ('Database.php');

	class OrderByTournament extends Database{

		public $query, $error;

		public function OrderBy($where = null,$orderbycol,$orderbyvalue){

			if($this->OrderBySelect(['*'],'tournament', $where,$orderbycol,$orderbyvalue)){

				$this->query = $this->query;
				return true;
			}

			return false;
		}
	}
?>