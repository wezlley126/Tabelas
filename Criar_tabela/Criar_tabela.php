<?php
  session_start();
  include('../Conect_mysql/conect.php');
  $nome_tabela = $_SESSION['nome_tabela'];
  $numero_colunas = $_SESSION['numero_colunas'];
  echo "$nome_tabela";
  echo "$numero_colunas";

  $comando = "CREATE TABLE ".$_SESSION['nome_tabela']."(".$_POST['campo0']." varchar(30))";
  $query = mysqli_query($conect, $comando);
  for ($i=1; $i < $_SESSION['numero_colunas']; $i++) {
      $comando_for = "ALTER TABLE ".$_SESSION['nome_tabela']." ADD COLUMN ".$_POST["campo$i"]." varchar(30)";
      $query2 = mysqli_query($conect, $comando_for);
  }

  if ($query) {
    echo "<br/> Deu certo";
    $_SESSION['tabela_criada'] = 1;
    header("Location: /Tabelas/Criar_tabela");
  }

  if ($query2) {
    echo "<br/> Query 2 funcionando";
  }

?>
