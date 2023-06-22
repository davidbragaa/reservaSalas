<?php include("../acoes/conexao.php") ?>

<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: dashboard.php");
  exit;
}

// login.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    
    $email = $_POST["email"];
    $senha = $_POST["senha"]; 

    // Validar o login no banco de dados (exemplo simplificado)

    // Validar credenciais
    if(empty($username_err) && empty($password_err)){
      // Prepare uma declaração selecionada
      $sql = "SELECT idprofessor, password FROM users WHERE username = :username";
      
      if($stmt->execute()){
        // Verifique se o nome de usuário existe, se sim, verifique a senha
        if($stmt->rowCount() == 1){
            if($row = $stmt->fetch()){
                $id = $row["id"];
                $username = $row["username"];
                $hashed_password = $row["password"];
                if(password_verify($password, $hashed_password)){
                    // A senha está correta, então inicie uma nova sessão
                    session_start();
                    
                    // Armazene dados em variáveis de sessão
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;                            
                    
                    // Redirecionar o usuário para a página de boas-vindas
                    header("location: dashboard.php");
                } else{
                    // A senha não é válida, exibe uma mensagem de erro genérica
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            }
          } else{
              // O nome de usuário não existe, exibe uma mensagem de erro genérica
              $login_err = "Nome de usuário ou senha inválidos.";
          }
        } else{
            echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
    }

    // Fechar declaração
    unset($stmt);
}


// Fechar conexão
unset($pdo);
}


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="David Santos">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/login.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <div class="container-fluid h-custom" id="caixa-principal">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="../img/Humaaans - 1 Character.png" class="img-fluid" alt="Sample image" id="caixa-imagem" width="100%">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" id="borda">

        <?php if (isset($erro)) {?>
          <p><?php echo $erro; ?></P>
          <?php } ?>
    
                <main class="form-signin">
                  <form action="dashboard.php" method="POST">

                    <h1 class="h3 mb-3 fw-normal">Login</h1>

                    <div class="form-floating">
                      <input type="email" class="form-control" id="floatingInput" placeholder="nome@example.com.br" autofocus>
                      <label for="floatingInput">E-mail</label>
                    </div>
                    <div class="form-floating">
                      <input type="password" class="form-control" id="floatingPassword" placeholder="Senha">
                      <label for="floatingPassword">Senha</label>
                    </div>

                    <div class="checkbox mb-4">
                      <label>
                        <input type="checkbox" value="lembrar-me"> Lembrar me
                      </label>
                    </div> 


                    <div>
                      <label>
                       <strong><label for="esqueciSenha"><a href="reset-password.php">Esqueceu sua senha?</a></label></strong>
                      </label>
                    </div>
                    
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar
                    <!-- <a href="cadastrar.php"> Entrar</a> -->
                  </button> 
                    <p>
                    <button class="w-10 btn row-4 btn-lg btn-gray">
                      <a href="cadastrar.php"> Cadastrar</a>
                      </button>
                    </p>
                    <p class="mt-5 mb-3 text-muted"> Etec Bauru &copy; 2023</p>
                  </form>
                </main>

          </div>
      </div>
    </div>
 
  </body>
</html>