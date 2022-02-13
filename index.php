<?php
include 'config.php';

$lista = [];

$sql = $pdo->query('SELECT * FROM tb_uso_veiculo');

if ($sql->rowCount() > 0) {

    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="base">
        <div class="btns">

            <button>
                <a href="veiculo/vei-index.php">veículos cadastrados</a>
            </button>

            <button>
                <a href="motorista/mot-index.php">motoristas cadastrados</a>
            </button>
        </div>

        <table border="1" width="100%">

            <tr>

                <th>Nome</th>
                <th>Placa</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>ações</th>


            </tr>

            <?php foreach ($lista as $usoveiculo) : ?>

                <tr>

                    <td data-label="Nome"><?= $usoveiculo['mot_nome'] ?></td>
                    <td data-label="Placa"><?= $usoveiculo['mot_placa'] ?></td>
                    <td data-label="Descrição"><?= $usoveiculo['mot_descricao'] ?></td>

                    <td data-label="Data"><?= $usoveiculo['use_data'] ?></td>



                    <td data-label="ações">


                        <a href="user-delete.php?uve_id=<?= $usoveiculo['uve_id']; ?>" onclick="return confirm('tem certeza de excluir esse motorista?')"><button>excluir</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</body>

</html>