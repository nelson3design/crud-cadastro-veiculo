<?php
include '../config.php';
$motos = [];

$sql = $pdo->query('SELECT * FROM tb_moto');

if ($sql->rowCount() > 0) {

  $motos = $sql->fetchAll(PDO::FETCH_ASSOC);
}

$carros = [];

$sql = $pdo->query('SELECT * FROM tb_carro');

if ($sql->rowCount() > 0) {

  $carros = $sql->fetchAll(PDO::FETCH_ASSOC);
}


$camis = [];

$sql = $pdo->query('SELECT * FROM tb_cami');

if ($sql->rowCount() > 0) {

  $camis = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>


<h2>adicionar motorista</h2>
<form action="mot-add-action.php" method="POST">

  <input type="text" placeholder="Nome" name="mot_nome" required>
  <br><br>
  <input type="number" placeholder="CPF" name="mot_cpf" required>
  <br><br>


  <select name="mot_habilitacao" id="cnh" onchange="change();" required>
    <option selected disabled>Habilitação...</option>
    <option value="a">a</option>
    <option value="ab">ab</option>
    <option value="abc">abc</option>
  </select>
  <br><br>

  <select name="mot_modelo" id="modelo" required>
    <option selected disabled>Selecione o modelo...</option>

  </select>


  <br><br>

  <select name="mot_placa" id="desc" required>
    <option selected disabled>placa...</option>

  </select>
  <br><br>
  <select name="mot_descricao" id="placa" required>
    <option selected disabled>descrição...</option>

  </select>


  <br><br>

  <button type="submit">adicionar</button>

</form>



<script>
  function change() {
    var cnh = document.getElementById('cnh').value

    var modelo = document.getElementById('modelo')
    var desc = document.getElementById('desc')
    var placa = document.getElementById('placa')


    if (cnh == '') {
      limpar()
    }

    if (cnh == 'a') {
      limpar()

      var model = document.createElement('option')
      model.value = '1'
      model.innerHTML = 'Moto'
      modelo.add(model)



      <?php foreach ($motos as $moto) : ?>
        var des = document.createElement('option')
        des.value = '<?= $moto['moto_placa'] ?>'

        des.innerHTML = '<?= $moto['moto_placa'] ?>'
        desc.add(des)
      <?php endforeach; ?>


      <?php foreach ($motos as $moto) : ?>

        var plak = document.createElement('option')
        plak.value = '<?= $moto['moto_desc'] ?>'

        plak.innerHTML = '<?= $moto['moto_desc'] ?>'
        placa.add(plak)

      <?php endforeach; ?>

    }


    if (cnh == 'ab') {
      limpar()

      var model = document.createElement('option')
      model.value = '2'
      model.innerHTML = 'Carro'
      modelo.add(model)



      <?php foreach ($carros as $carro) : ?>
        var des = document.createElement('option')
        des.value = '<?= $carro['carro_placa'] ?>'

        des.innerHTML = '<?= $carro['carro_placa'] ?>'
        desc.add(des)
      <?php endforeach; ?>


      <?php foreach ($carros as $carro) : ?>

        var plak = document.createElement('option')
        plak.value = '<?= $carro['carro_desc'] ?>'

        plak.innerHTML = '<?= $carro['carro_desc'] ?>'
        placa.add(plak)

      <?php endforeach; ?>

    }


    if (cnh == 'abc') {
      limpar()

      var model = document.createElement('option')
      model.value = '3'
      model.innerHTML = 'Caminhão'
      modelo.add(model)



      <?php foreach ($camis as $cami) : ?>
        var des = document.createElement('option')
        des.value = '<?= $cami['cami_placa'] ?>'

        des.innerHTML = '<?= $cami['cami_placa'] ?>'
        desc.add(des)
      <?php endforeach; ?>


      <?php foreach ($camis as $cami) : ?>

        var plak = document.createElement('option')
        plak.value = '<?= $cami['cami_desc'] ?>'

        plak.innerHTML = '<?= $cami['cami_desc'] ?>'
        placa.add(plak)

      <?php endforeach; ?>

    }





  }

  function limpar() {
    var limpa = document.getElementById('modelo')
    while (limpa.length) {
      limpa.remove(0)
    }

    var limpa2 = document.getElementById('desc')
    while (limpa2.length) {
      limpa2.remove(0)
    }


    var limpa3 = document.getElementById('placa')
    while (limpa3.length) {
      limpa3.remove(0)
    }

  }



  change()
</script>