<?php
include 'conexao.php';
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

  <h3>Listagem de departamentos</h3>
  <?php
  $sql = "SELECT * FROM departamentos";
  $resultados = $conexao->query($sql);

  if ($resultados->num_rows > 0) {
  ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>NOME</th>
        <th>SIGLA</th>
      </tr>
    </thead>
    <tbody>
  <?php
    while($registro = $resultados->fetch_assoc()) {
  ?>
    <tr>
      <td><?php echo utf8_encode($registro['nome']); ?></td>
      <td><?php echo $registro['sigla']; ?></td>
    </tr>
  <?php
    }
  ?>
    </tbody>
  </table>  
  <?php
  } else {
  ?>
    <p class="alert alert-warning">Nenhum resultado encontrado</p>
  <?php
  }
  $conexao->close();
  ?>
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
