<?php
include '../config.php';

$lista = [];

$sql = $pdo->query('SELECT * FROM tb_motorista');

if ($sql->rowCount() > 0) {

    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}


?>
<html>
<link rel="stylesheet" href="../style.css">

<div class="base">
    <div class="btns">

        <button>
            <a href="mot-add.php">adicionar motorista</a>
        </button>

        <button>
            <a href="../index.php">uso</a>
        </button>
    </div>


    <table border="1" width="100%">

        <tr>

            <th>Nome</th>
            <th>CPF</th>
            <th>Habilitaçao</th>
            <th>acões</th>

        </tr>

        <?php foreach ($lista as $motorista) : ?>

            <tr>

                <td data-label="Nome"><?= $motorista['mot_nome'] ?></td>

                <td data-label="CPF"><?= $motorista['mot_cpf'] ?></td>
                <td data-label="Habilitaçao"><?= $motorista['mot_habilitacao'] ?></td>





                <td data-label="Acões">
                    <a href="mot-edit.php?mot_id=<?= $motorista['mot_id']; ?>"><button>editar</button></a>

                    <a href="mot-delete.php?mot_id=<?= $motorista['mot_id']; ?>" onclick="return confirm('tem certeza de excluir esse veìculo?')"><button>excluir</button></a>
                </td>

            </tr>
        <?php endforeach; ?>

    </table>
</div>

</html>