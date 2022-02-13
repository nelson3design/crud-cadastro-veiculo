<?php

include '../config.php';
$vei_id= filter_input(INPUT_POST, 'vei_id');
$vei_placa= filter_input(INPUT_POST, 'vei_placa');
$vei_descricao= filter_input(INPUT_POST, 'vei_descricao');

$vei_modelo= filter_input(INPUT_POST, 'vei_modelo');



    if($vei_id && $vei_placa){
    
        $sql= $pdo->prepare("UPDATE tb_veiculo SET vei_placa=:vei_placa, vei_descricao=:vei_descricao, vei_modelo=:vei_modelo WHERE vei_id= :vei_id");
        $sql->bindValue(':vei_id', $vei_id );
        $sql->bindValue(':vei_placa', $vei_placa );
        $sql->bindValue(':vei_descricao', $vei_descricao );
        $sql->bindValue(':vei_modelo', $vei_modelo );
      
        $sql->execute();
    
     header("location: vei-index.php");
     exit;
    
    }else{
        header("location: vei-edit.php");
        exit;
    }


?>