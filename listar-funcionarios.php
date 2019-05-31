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

  <h3>Listagem de funcionários</h3>
  <?php
  $sql = "SELECT id_funcionario, nome, 
              DATE_FORMAT(dt_nascimento, '%d/%m/%Y') as dt_nascimento, 
              DATE_FORMAT(dt_admissao, '%d/%m/%Y') as dt_admissao, 
              FORMAT(salario, 2, 'de_DE') as salario,
              sexo
            FROM funcionarios ORDER BY nome";
  $resultados = $conexao->query($sql);

  if ($resultados->num_rows > 0) {
  ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-center">NOME</th>
        <th class="text-center">DT NASCIMENTO</th>
        <th class="text-center">ADMISSÃO</th>
        <th class="text-center">SEXO</th>
        <th class="text-center">SALÁRIO</th>
      </tr>
    </thead>
    <tbody>
  <?php
    while($registro = $resultados->fetch_assoc()) {
  ?>
    <tr>
      <td><?php echo utf8_encode($registro['nome']); ?></td>
      <td class="text-center"><?php echo $registro['dt_nascimento']; ?></td>
      <td class="text-center"><?php echo $registro['dt_admissao']; ?></td>
      <td class="text-center"><?php echo $registro['sexo']; ?></td>
      <td class="text-center"><?php echo $registro['salario']; ?></td>
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
