<?php

include '../config.php';
$vei_id= filter_input(INPUT_GET, 'vei_id');


    if($vei_id){
    
        $sql= $pdo->prepare("DELETE FROM tb_veiculo WHERE vei_id= :vei_id");
        $sql->bindValue(':vei_id', $vei_id );
        $sql->execute();
    
     header("location: vei-index.php");
     exit;
    
    }else{
        header("location: vei-index.php");
        exit;
    }


?>