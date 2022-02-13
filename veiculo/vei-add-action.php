<?php

include '../config.php';

$vei_placa= filter_input(INPUT_POST, 'vei_placa');
$vei_descricao= filter_input(INPUT_POST, 'vei_descricao');
$vei_modelo= filter_input(INPUT_POST, 'vei_modelo');


$sql= $pdo->prepare("SELECT * FROM tb_veiculo WHERE vei_placa=:vei_placa");
$sql->bindValue(':vei_placa', $vei_placa );
$sql->execute();
if($sql->rowCount() ===0){

    if($vei_placa && $vei_descricao&& $vei_modelo){
         
        $sql= $pdo->prepare("INSERT INTO tb_veiculo (vei_placa, vei_descricao, vei_modelo) VALUES (:vei_placa, :vei_descricao, :vei_modelo)");  
        $sql->bindValue(':vei_placa', $vei_placa );
        $sql->bindValue(':vei_descricao', $vei_descricao );
        $sql->bindValue(':vei_modelo', $vei_modelo );  


        if($sql->execute()){

            if($vei_modelo==1){
                $sql = $pdo->prepare("INSERT INTO tb_moto (moto_placa, moto_desc) VALUES (:moto_placa, :moto_desc)");
                $sql->bindValue(':moto_placa', $vei_placa);
                $sql->bindValue(':moto_desc', $vei_descricao);
                $sql->execute();
            }

            if ($vei_modelo == 2) {
                $sql = $pdo->prepare("INSERT INTO tb_carro (carro_placa, carro_desc) VALUES (:carro_placa, :carro_desc)");
                $sql->bindValue(':carro_placa', $vei_placa);
                $sql->bindValue(':carro_desc', $vei_descricao);
                $sql->execute();
            }

            if ($vei_modelo == 3) {
                $sql = $pdo->prepare("INSERT INTO tb_cami (cami_placa, cami_desc) VALUES (:cami_placa, :cami_desc)");
                $sql->bindValue(':cami_placa', $vei_placa);
                $sql->bindValue(':cami_desc', $vei_descricao);
                $sql->execute();
            }
    
         
        
            header("location: vei-index.php");
            exit; 
        }
    
    
    }else{
        header("location: vei-add.php");
        exit;
    }
}else{
    header("location: vei-add.php");
    exit;
}


?>