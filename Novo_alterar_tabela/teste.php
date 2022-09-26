<?php
  session_start();
  include("../Conect_mysql/conect.php");
  unset($_SESSION['adicionar_vazio']);
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

  $i = 1;
  $j = 1;
  @$GLOBALS['comando'] = 'UPDATE '.$_SESSION['tabela']." SET ";
  //$update_query = mysqli_query($conect, $GLOBALS['comando']);

  for ($i=0; $i < $_SESSION['linhas']; $i++) {
    for ($j=1; $j < $_SESSION['colunas']; $j++) {
      if ($j+1 === $_SESSION['colunas']) {
        $GLOBALS['comando'] = $GLOBALS['comando'].", $colunas[$j] = '".$tabela[$i][$j]."' WHERE id = ".$tabela[$i][0];
        //echo $GLOBALS['comando'];
        $update_query = mysqli_query($conect, $GLOBALS['comando']);
        $GLOBALS['comando'] = 'UPDATE '.$_SESSION['tabela']." SET ";
      }else{
        if($j === 1){
          $GLOBALS['comando'] = $GLOBALS['comando']." $colunas[$j] = '".$tabela[$i][$j]."'";
        }else{
          $GLOBALS['comando'] = $GLOBALS['comando'].", $colunas[$j] = '".$tabela[$i][$j]."'";
        }
      }
    }
  }

  echo "<br/>".$GLOBALS['comando'];

  for ($i=0; $i < $_SESSION['linhas']; $i++) {
    for ($j=0; $j < $_SESSION['colunas']; $j++) {

      $tabela[$i][$j] = Limpar($tabela[$i][$j]);
      if ($tabela[$i][1] == 'drop') {
        $drop_comando = "DELETE FROM ".$_SESSION['tabela']." WHERE id = ".$tabela[$i][0];
        $query_drop = mysqli_query($conect, $drop_comando);
      }
      if ($colunas != 0) {

      }

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
  $GLOBALS['adicionar_comando'] = 'INSERT INTO '.$_SESSION['tabela']." VALUES (default, ";
  for ($i=1; $i < $_SESSION['colunas']; $i++) {
    if ($adicionar[$i] == null) {
      $_SESSION['adicionar_vazio'] = 1;
    }
    if ($i+1 == $_SESSION['colunas']) {
      $GLOBALS['adicionar_comando'] = $GLOBALS['adicionar_comando']."'$adicionar[$i]'); ";
    } else {
      $GLOBALS['adicionar_comando'] = $GLOBALS['adicionar_comando']."'$adicionar[$i]' ,";
    }

  }

  if (isset($_SESSION['adicionar_vazio'])) {

  }else{

  $query_adicionar = mysqli_query($conect, $adicionar_comando);
  if ($query_adicionar) {
    echo "<br/>Todos os produtos foram adicionados";
  }
}
  print_r($adicionar);
  echo "<br/>";

  header('Location: ../Novo_alterar_tabela/editar_tabela.php?tabela='.$_SESSION['tabela']);
  print_r($colunas);
?>
