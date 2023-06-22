<?php
  require_once '../acoes/conexao.php';
  if(isset($_GET['id'])) {
    // UPDATE atualizar, editar, alterar dados
    $id = mysqli_real_escape_string($con, $_GET['id']);
    
    $sql = "SELECT idprofessor, nome, email FROM professor WHERE idprofessor = '$id'";
    $resultado = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($resultado);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="David Santos">
      <title>Editar Professor</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      
      <h2>Editar Professor</h2>
      
    </div>

      <div class="col-md-6 col-lg-12">
        <form class="needs-validation" novalidate action="acoes/update.php" method="POST" >
          <div class="row g-3">

            <input type="hidden" name="id" value="<?= $dados['idprofessor']; ?>" />

            <div class="col-sm-12">
              <label for="nome" class="form-label">Nome completo</label>
              <input type="text" class="form-control" name="nome" id="nome" value="<?= $dados['nome'] ?>" autofocus required>
              <div class="invalid-feedback">
                Digite o seu nome completo.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" name="email" id="email" value="<?= $dados['email'] ?>" required>
              <div class="invalid-feedback">
                Digite um e-mail válido.
              </div>
            </div>

          </div>

          <br>

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="bt_editar">Confirmar</button>
        </form>
      </div>
    </div>
  </main>

</div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/form-validation.js"></script>
  </body>
</html>