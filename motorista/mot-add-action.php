<?php

include '../config.php';
$mot_nome= filter_input(INPUT_POST, 'mot_nome');
$mot_cpf= filter_input(INPUT_POST, 'mot_cpf');
$mot_placa= filter_input(INPUT_POST, 'mot_placa');
$mot_descricao= filter_input(INPUT_POST, 'mot_descricao');
$mot_modelo= filter_input(INPUT_POST, 'mot_modelo');
$mot_habilitacao= filter_input(INPUT_POST, 'mot_habilitacao');




$sql= $pdo->prepare("SELECT * FROM tb_motorista WHERE mot_cpf=:mot_cpf");
$sql->bindValue(':mot_cpf', $mot_cpf );
$sql->execute();
if($sql->rowCount() ===0){

    if($mot_nome && $mot_cpf){
         
        $sql= $pdo->prepare("INSERT INTO tb_motorista (mot_nome, mot_cpf, mot_placa, mot_descricao, mot_modelo, mot_habilitacao) VALUES (:mot_nome, :mot_cpf, :mot_placa, :mot_descricao, :mot_modelo, :mot_habilitacao)");  
        $sql->bindValue(':mot_nome', $mot_nome );
        $sql->bindValue(':mot_cpf', $mot_cpf );
        $sql->bindValue(':mot_descricao', $mot_descricao );
        $sql->bindValue(':mot_placa', $mot_placa );    
        $sql->bindValue(':mot_modelo', $mot_modelo ); 
        $sql->bindValue(':mot_habilitacao', $mot_habilitacao );                
         $sql->execute();

        if($sql->execute()){
           
        
                $sql = $pdo->prepare('INSERT INTO tb_uso_veiculo (mot_nome, mot_placa, mot_descricao ) VALUES (:mot_nome, :mot_placa, :mot_descricao)');
            
                $sql->bindValue(':mot_nome', $mot_nome);
                $sql->bindValue(':mot_placa', $mot_placa);
                $sql->bindValue(':mot_descricao', $mot_descricao);
                $sql->execute();
        
           
        
       
     header("location: mot-index.php");
     exit; 
        }
    }else{

      
     

        header("location: mot-add.php");
        exit;
    }
}else{
    header("location: mot-add.php");
    exit;
}


?>