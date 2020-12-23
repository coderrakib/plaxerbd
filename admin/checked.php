<?php
	
	require_once ('config.php');

	$id 	= (int) $_GET['id'];
	$value  = (int) $_GET['value'];
	$table  = (string) $_GET['table'];

	$data 	= array(

		'checked', '=', $value,
	);

	$where 	= array(
		'id', '=', $id,
	);

	$update = new Checked;

	if($update->UpdateCheck($table,$data,$where)){

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
?>