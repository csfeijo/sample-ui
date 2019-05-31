<?php
include 'conexao.php';

// Verifica se foi postado algo para este mesmo formulario - se SIM - insere!
if (isset($_POST['operacao'])) {
  $nome = $_POST['nome'];
  $dt_nascimento = explode('/', $_POST['dt_nascimento']);
  $dt_nascimento = $dt_nascimento[2].'-'.$dt_nascimento[1].'-'.$dt_nascimento[0];
  $dt_admisssao = explode('/', $_POST['dt_admissao']);
  $dt_admisssao = $dt_admisssao[2].'-'.$dt_admisssao[1].'-'.$dt_admisssao[0];
  $salario = $_POST['salario'];
  $sexo = $_POST['sexo'];
  $id_departamento = $_POST['id_departamento'];

  $sql = "INSERT INTO funcionarios (nome, dt_nascimento, dt_admissao, salario, sexo, id_departamento) 
            VALUES ('$nome','$dt_nascimento', '$dt_admisssao', '$salario', '$sexo', '$id_departamento')";

  if (mysqli_query($conexao, $sql)) {
    header('location: listar-funcionarios.php');
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
  <h3>Cadastro de Funcionários</h3>
  <form action="" method="POST" id="form-funcionarios">
    <input type="hidden" name="operacao" id="operacao" value="criar">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" name="nome" id="nome" placeholder="nome" class="form-control" maxlength="45">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="dt_nascimento">Data de Nascimento:</label>
          <input type="text" name="dt_nascimento" id="dt_nascimento" placeholder="dd/mm/aaaa" class="form-control" maxlength="10">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="dt_admissao">Data de Admissão:</label>
          <input type="text" name="dt_admissao" id="dt_admissao" placeholder="dd/mm/aaaa" class="form-control" maxlength="10" value="<?php echo date("d/m/Y"); ?>">
        </div>
      </div>      
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label>Sexo:</label><br>
          <input type="radio" name="sexo" id="feminino" value="F" checked="checked"><label for="feminino"> Feminino</label>
          <input type="radio" name="sexo" id="masculino" value="M"><label for="masculino"> Masculino</label>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="dt_nascimento">Salário:</label>
          <input type="text" name="salario" id="salario" placeholder="2500.00" class="form-control" maxlength="8">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="departamento">Departamento:</label>
          <select name="id_departamento" id="id_departamento" class="form-control">
            <option value="00">SELECIONE</option>
          <?php
          $sql = "SELECT * FROM departamentos ORDER BY nome";
          $resultados = $conexao->query($sql);

          if ($resultados->num_rows > 0) {
            while($registro = $resultados->fetch_assoc()) {
          ?>
          <option value="<?php echo $registro['id_departamento']; ?>"><?php echo utf8_encode($registro['nome']); ?></option>
          <?php
            }
          }
          ?>
          </select>
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
