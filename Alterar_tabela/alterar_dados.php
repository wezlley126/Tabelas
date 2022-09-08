<?php
  session_start();
  include("../Conect_Mysql/conect.php");
  $update_campo = "UPDATE ".$_SESSION['tabela']." SET ".$_POST['coluna']." = '".$_POST['novo_valor']."' WHERE id = ".$_POST['id'];
  $query_update = mysqli_query($conect, $update_campo);
  if ($query_update) {
    echo "<br/> O campo foi alterado com sucesso";
  }
  header('Location: editar_tabela.php?tabela='.$_SESSION['tabela']);
?>
