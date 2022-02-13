<?php
include '../config.php';

$info = [];
$vei_id = filter_input(INPUT_GET, 'vei_id');


if ($vei_id) {

    $sql = $pdo->prepare("SELECT * FROM tb_veiculo WHERE vei_id = :vei_id");
    $sql->bindValue(':vei_id', $vei_id);
    $sql->execute();


    if ($sql->rowCount() > 0) {

        $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("location: vei-index.php");
        exit;
    }
} else {

    header("location: vei-index.php");
    exit;
}


?>

<h2>editar usuario</h2>

<form action="vei-edit-action.php" method="POST">

    <input type="hidden" name="vei_id" value="<?= $info['vei_id']; ?>">

    <input type="text" placeholder="Placa" name="vei_placa" value="<?= $info['vei_placa']; ?>" required>
    <br><br>
    <input type="text" placeholder="descrição" name="vei_descricao" value="<?= $info['vei_descricao']; ?>" required>
    <br><br>
    <select name="vei_modelo" id="" required>
        <option selected disabled>Selecionar o modelo...</option>
        <option value="1" <?= ($info['vei_modelo'] == 1) ? "selected" : "" ?>>Moto</option>
        <option value="2" <?= ($info['vei_modelo'] == 2) ? "selected" : "" ?>>Carro</option>
        <option value="3" <?= ($info['vei_modelo'] == 3) ? "selected" : "" ?>>Caminhão</option>
    </select>
    <br><br>

    <button type="submit">salvar</button>

</form>