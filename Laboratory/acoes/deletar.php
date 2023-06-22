<?php
  session_start();
  require_once '../acoes/conexao.php';
  
  if(isset($_POST['bt_apagar'])) {
    // DELETE Deletar, apagar
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $sql = "DELETE FROM professor WHERE `professor`.`idprofessor` = '$id'"; 
    
    if(mysqli_query($con, $sql)) {
      $_SESSION['mensagem'] = "Registro apagado com sucesso!";
      header('Location: ../pages/dashboard.php');
    } else {
      $_SESSION['mensagem'] = "Não foi possível apagar o registro!";
      header('Location: ../pages/dashboard.php');
    }
    // FECHAR CONEXAO
    mysqli_close($con);
  }
?>

</html>