<?php
    
    require_once ('config.php');

    $id = (int) $_GET['id'];

    $tournament = new Tournament;
    $tournament->gettournament(['id', '=', $id]);
    $query 		= $tournament->query;
    $result     = $query->fetch_assoc();
    $db_image   = $result['image'];

    if($tournament->deletetournament('tournament', $id)){
        
        if(isset($db_image)){
                                               
           	$path = "images/tournament/$db_image";
            unlink($path); 
        }

        header("Location:tournament-lists.php");
    }
?>