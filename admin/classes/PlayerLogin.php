<?php
	
	require_once ('Database.php');

	class PlayerLogin extends Database{

		public $query;

		public function Login($email, $password){

			if($this->Select(['*'], 'players', ['email', '=', $email, 'password', '=',
			$password, 'status', '=', 1])){

				$this->query = $this->query;
				return true;
			}

			return false;
		}

		public static function PlayerLoged(){

			if(!isset($_SESSION['player']) && $_SESSION['player'] == ''){
				return false;
			}
			return true;
		}	
	} 
?>