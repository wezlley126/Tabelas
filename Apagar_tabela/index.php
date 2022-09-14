<?php
  session_start();
  include("../Conect_mysql/conect.php");
?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="../">home</a><br/>

    <?php
      $show_tabelas = "SHOW TABLES";
      $query_show_tabelas = mysqli_query($conect, $show_tabelas);
      while($row = mysqli_fetch_row($query_show_tabelas)) {
        echo "$row[0]<br/>";
      }
    ?>

    <form class="" action="" method="post">
      <input type="text" name="nome_tabela" value="">
      <input type="text" name="nome_confirma" value="">
      <input type="submit" name="" value="Excluir">
    </form>

    <?php
      @$nome_tabela = Limpar($_POST['nome_tabela']);
      @$nome_confirma = Limpar($_POST['nome_confirma']);
      echo "$nome_tabela <br/> $nome_confirma";

      $tabela_existe = "SHOW TABLES LIKE '$nome_confirma'";
      $query_existe = mysqli_query($conect, $tabela_existe);
      $row_tabela = mysqli_num_rows($query_existe);

      if($nome_tabela != null && $nome_confirma != null) {
        if($nome_tabela === $nome_confirma){

          if ($row_tabela === 1) {
            $exclui_tabela = "DROP TABLE ".$nome_tabela;
            $query_exclui = mysqli_query($conect, $exclui_tabela);
            if ($query_exclui) {
              echo "<h2>A tabela $nome_tabela foi excluida.</h2>";
            }
          }else{
            echo "<h2>Nomes de tabela não coincidem!!!</h2>";
          }
      }else{
        echo "<h2>Tabela inexistente</h2>";
      }
    }else{
      echo "<h2>Tenha certeza ao deletar uma tabela, pois não podera ser recuperada.</h2>";
    }
    unset($row_tabela);
    ?>

  </body>
</html>
