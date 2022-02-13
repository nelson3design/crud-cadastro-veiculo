<?php

include 'config.php';
$uve_id= filter_input(INPUT_GET, 'uve_id');



    if($uve_id){
    
        $sql= $pdo->prepare("DELETE FROM tb_uso_veiculo WHERE uve_id= :uve_id");
        $sql->bindValue(':uve_id', $uve_id );
 
        $sql->execute();

    
     header("location: index.php");
     exit;
    
    
    }else{
        header("location: index.php");
        exit;
    }
