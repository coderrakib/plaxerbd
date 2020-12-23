<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $winners 	= new Winners;
   
    if($winners->deletewinner('winners', $id)){

        header("Location:winner-lists.php");
    }
?>