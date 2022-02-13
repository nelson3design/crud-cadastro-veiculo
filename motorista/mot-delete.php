<?php

include '../config.php';
$mot_id= filter_input(INPUT_GET, 'mot_id');



    if($mot_id){
    
        $sql= $pdo->prepare("DELETE FROM tb_motorista WHERE mot_id= :mot_id");
        $sql->bindValue(':mot_id', $mot_id );
 
        $sql->execute();

    
     header("location: mot-index.php");
     exit;
    
    
    }else{
        header("location: mot-index.php");
        exit;
    }


?>