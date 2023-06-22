<?php
  session_start();

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="David Santos">
      <title>Cadastrar Professor</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template  -->
    <link href="../css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">

      <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Etec Bauru</a>
          <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Search">
          <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="login.php">Sair</a>
            </li>
          </ul>
      </header>



    
<div class="container">
  <main>
    <div class="py-5 text-center">
      
      <h2>Cadastrar Professor</h2>
      
    </div>

      <div class="col-md-6 col-lg-12">
        <form class="needs-validation" novalidate action="acoes/create.php" method="POST">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="nome" class="form-label">Nome completo</label>
              <input type="text" class="form-control" name="nome" id="nome" autofocus required>
              <div class="invalid-feedback">
                Digite o seu nome completo.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" name="email" id="email" required>
              <div class="invalid-feedback">
                Digite um e-mail válido.
              </div>
            </div>

            <div class="col-12">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" class="form-control" name="senha" id="senha" required>
              <div class="invalid-feedback">
                Por favor digite uma senha.
              </div>
            </div>

            <div class="col-12">
              <label for="confsenha" class="form-label">Confirma Senha</label>
              <input type="password" class="form-control" name="confsenha" id="confsenha" required>
              <div class="invalid-feedback">
                Por favor digite a confirmação da senha.
              </div>
            </div>

          </div>
            <br>
          <button class="w-100 btn btn-primary btn-lg" type="submit" name="bt_cadastrar">Cadastrar</button>

        </form>
      </div>
    </div>
  </main>

</div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/form-validation.js"></script>
  </body>
</html>