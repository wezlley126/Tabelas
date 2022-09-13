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

    }
  }
  $adicionar = array();
  for ($i=1; $i < $_SESSION['colunas']; $i++) {
      if (isset($_POST["adicionar$i"])) {
        echo $_POST["adicionar$i"]."<br/>";
        $adicionar[$i] = $_POST["adicionar$i"];
        $adicionar[$i] = Limpar($adicionar[$i]);
      }else{
        break;
      }
  }

  $adicionar_comando = 'INSERT INTO '.$_SESSION['tabela']." VALUES (default, '$adicionar[1]', '$adicionar[2]', '$adicionar[3]')";
  $query_adicionar = mysqli_query($conect, $adicionar_comando);
  if ($query_adicionar) {
    echo "<br/>Todos os produtos foram adicionados";
  }

  print_r($adicionar);
  echo "<br/>";

  header('Location: ../Exibir_tabela/editar_tabela.php?tabela='.$_SESSION['tabela']);
  print_r($colunas);
?>
