<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $custom 	= new Custom;
   
    if($custom->deletecustom('custom', $id)){

        header("Location:set-custom-id.php");
    }
?>