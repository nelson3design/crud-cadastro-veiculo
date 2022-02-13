<?php
include '../config.php';

$lista = [];

$sql = $pdo->query('SELECT * FROM tb_veiculo');

if ($sql->rowCount() > 0) {

    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}


?>
<html>
<link rel="stylesheet" href="../style.css">

<div class="base">
  <div class="btns">

      <button>
          <a href="vei-add.php">adicionar veículo</a>
      </button>
      
      <button>
          <a href="../index.php">uso</a>
      </button>
  </div>
    
    <table border="1" width="100%">
    
        <tr>
    
            <th>Placa</th>
            <th>Descrição</th>
            <th>modelo</th>
            <th>acões</th>
    
        </tr>
    
        <?php foreach ($lista as $veiculo) : ?>
    
            <tr>
    
                <td data-label="Placa"><?= $veiculo['vei_placa'] ?></td>
    
                <td data-label="Descrição"><?= $veiculo['vei_descricao'] ?></td>
    
    
                <td data-label="modelo">
    
                    <?php if ($veiculo['vei_modelo'] == 1) {
                        echo "Moto";
                    } else if ($veiculo['vei_modelo'] == 2) {
                        echo "Carro";
                    } else if ($veiculo['vei_modelo'] == 3) {
                        echo "Caminhão";
                    }  ?>
    
                </td>
    
    
    
                <td data-label="modelo">
                    <a href="vei-edit.php?vei_id=<?= $veiculo['vei_id']; ?>"><button>editar</button></a>
    
                    <a href="vei-delete.php?vei_id=<?= $veiculo['vei_id']; ?>" onclick="return confirm('tem certeza de excluir esse veìculo?')"><button>excluir</button></a>
                </td>
    
            </tr>
        <?php endforeach; ?>
    
    </table>
</div>
</html>