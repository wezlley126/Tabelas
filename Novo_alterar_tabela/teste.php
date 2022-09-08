<?php
  session_start();
  include("../Conect_mysql/conect.php");

  

  for ($linhas=0; $linhas < $_SESSION['linhas']; $linhas++) {
    for ($colunas=0; $colunas < $_SESSION['colunas']; $colunas++) {
      echo $_POST["linha$linhas\_coluna$colunas"]."<br/>";
    }
  }
?>
