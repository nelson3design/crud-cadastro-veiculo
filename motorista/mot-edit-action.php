<?php

include '../config.php';
$mot_id= filter_input(INPUT_POST, 'mot_id');
$mot_nome= filter_input(INPUT_POST, 'mot_nome');
$mot_cpf= filter_input(INPUT_POST, 'mot_cpf');
$mot_placa= filter_input(INPUT_POST, 'mot_placa');
$mot_descricao= filter_input(INPUT_POST, 'mot_descricao');
$mot_modelo= filter_input(INPUT_POST, 'mot_modelo');
$mot_habilitacao= filter_input(INPUT_POST, 'mot_habilitacao');




    if($mot_id){
      
        $sql= $pdo->prepare("UPDATE tb_motorista SET mot_nome=:mot_nome, mot_cpf=:mot_cpf, mot_descricao=:mot_descricao, mot_placa=:mot_placa, mot_modelo=:mot_modelo, mot_habilitacao=:mot_habilitacao WHERE mot_id= :mot_id");  
        $sql->bindValue(':mot_id', $mot_id );
        $sql->bindValue(':mot_nome', $mot_nome );
        $sql->bindValue(':mot_cpf', $mot_cpf );
        $sql->bindValue(':mot_descricao', $mot_descricao );
        $sql->bindValue(':mot_placa', $mot_placa );    
        $sql->bindValue(':mot_modelo', $mot_modelo ); 
        $sql->bindValue(':mot_habilitacao', $mot_habilitacao );                
        $sql->execute();
    
     header("location: mot-index.php");
     exit; 
    
    }else{
       
        header("location: mot-edit.php");
        exit;
    }
