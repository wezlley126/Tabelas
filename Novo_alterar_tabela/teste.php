<?php
  session_start();
  include("../Conect_mysql/conect.php");

$tabela = array();

  for ($linhas=0; $linhas < $_SESSION['linhas']; $linhas++) {
    for ($colunas=0; $colunas < $_SESSION['colunas']; $colunas++) {
      $tabela[$linhas][$colunas] = $_POST["linha$linhas\_coluna$colunas"];
    }
  }

  $comando_columns = "SHOW COLUMNS FROM ".$_SESSION['tabela'];
  $query_columns = mysqli_query($conect, $comando_columns);
  $colunas = array();
  $i = 0;
  while($row = mysqli_fetch_row($query_columns)) {
    $colunas[$i] = $row[0];
    $i++;
  }

  unset($comando_columns, $query_columns, $row, $i);


  for ($i=0; $i < $_SESSION['linhas']; $i++) {
    for ($j=0; $j < $_SESSION['colunas']; $j++) {

      $tabela[$i][$j] = Limpar($tabela[$i][$j]);
      $comando = 'UPDATE '.$_SESSION['tabela']." SET $colunas[$j] = '".$tabela[$i][$j]."' WHERE id = ".$tabela[$i][0];
      $update_query = mysqli_query($conect, $comando);
      echo $tabela[$i][$j]."<br/>";

    }
  }
  header('Location: ../Exibir_tabela/editar_tabela.php?tabela='.$_SESSION['tabela']);
  print_r($colunas);
?>
