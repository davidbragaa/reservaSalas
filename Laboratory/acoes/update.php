<?php
    session_start();
    require_once '../acoes/conexao.php';

    if(isset($_POST['bt_editar'])) {
        
        $nome  = mysqli_real_escape_string($con, $_POST['nome']);
        $email = mysqli_real_escape_string($con, $_POST['email']);

        $id = mysqli_real_escape_string($con, $_POST['id']);

        $sql = "UPDATE professor SET nome = '$nome', email = '$email' WHERE idprofessor = '$id'";

        if(mysqli_query($con, $sql)) {
            $_SESSION['mensagem'] = "Registro editado com sucesso!";
            header('Location: ../pages/dashboard.php');
        } else {
            $_SESSION['mensagem'] = "Erro na edição do registro!";
            header('Location: ../pages/dashboard.php');
        }
        // FECHAR CONEXAO
        mysqli_close($con);
    }
