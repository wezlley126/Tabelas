<?php
  session_start();
  $conect = mysqli_connect('localhost:3306', 'root', '', 'biblioteca_contas') or die("ERRO NA DATABASE");
  function Limpar($value)
    {
      global $conect;
      $value = mysqli_escape_string($conect, $value);
      $value = htmlspecialchars($value);
      return $value;
    }

  $email = Limpar($_POST['email']);
  $senha = Limpar($_POST['senha']);
  $senha = md5($senha);
  $conta_existe = "SELECT * FROM `usuarios` WHERE email = '$email' and senha = '$senha'";
  $query = mysqli_query($conect, $conta_existe);
  $row = mysqli_num_rows($query);
  if ($row === 1) {
    $_SESSION['user'] = mysqli_fetch_row($query);
    echo "string";
    header('Location: /SF_camisas/Tabelas');
  }else{
    unset($_SESSION['user']);
    header('Location: SF_camisas/Tabelas');
  }

?>
