<?php
include '../config.php';



?>


<h2>adicionar veículo</h2>
<form action="vei-add-action.php" method="POST">

    <input type="text" placeholder="Placa" name="vei_placa" required>
    <br><br>
    <input type="text" placeholder="descrição" name="vei_descricao" required>
    <br><br>

    <select name="vei_modelo" id="" required>
        <option selected disabled>Selecione o modelo...</option>
        <option value="1">Moto</option>
        <option value="2">Carro</option>
        <option value="3">Caminhão</option>
    </select>
    <br><br>

    <button type="submit">adicionar</button>

</form>