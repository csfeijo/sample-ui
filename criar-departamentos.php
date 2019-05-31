<?php
include 'conexao.php';

// Verifica se foi postado algo para este mesmo formulario - se SIM - insere!
if (isset($_POST['operacao'])) {
  $nome = $_POST['nome'];
  $sigla = $_POST['sigla'];

  $sql = "INSERT INTO departamentos (nome, sigla) VALUES ('$nome','$sigla')";
  if (mysqli_query($conexao, $sql)) {
    header('location: listar-departamentos.php');
  } else {
    echo 'ERRO!';
  }
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exemplo de UI - Conexão com o banco de dados</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <?php include 'menu.php'; ?>
  <h3>Cadastro de departamentos</h3>
  <form action="" method="POST" id="form-departamentos">
    <input type="hidden" name="operacao" id="operacao" value="criar">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" name="nome" id="nome" placeholder="nome" class="form-control" maxlength="50">
        </div>
      </div>
      <div class="col-sm-3">
          <div class="form-group">
            <label for="sigla">Sigla:</label>
            <input type="text" name="sigla" id="sigla" placeholder="sigla" class="form-control" maxlength="10">
          </div>
        </div>      
    </div>
    <div class="row">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-default btn-success">SALVAR</button>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-9">
        <br>
        <p id="msg" class="alert alert-danger hidden"></p>
      </div>
    </div>
  </form>
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
