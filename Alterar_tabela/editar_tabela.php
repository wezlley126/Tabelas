<?php
  session_start();
  include("../Conect_mysql/conect.php");
?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/editar_tabela.css">
  </head>
  <body>

    <?php
      $tabela = mysqli_escape_string($conect, $_GET['tabela']);
      echo "$tabela";
      $verifica_nome = "SHOW TABLES like '".$tabela."'";
      $query = mysqli_query($conect, $verifica_nome);
      $row = mysqli_num_rows($query);
      if ($row === 1) {
        echo "<br/>Tabela existente";
      }else{
        header('Location: index.php');
      }
    ?>
    <table>
      <thead>
        <tr>
          <?php
            $exibir_colunas = "SHOW COLUMNS FROM ".$tabela;
            $query_colunas = mysqli_query($conect, $exibir_colunas);
            while ($row = mysqli_fetch_row($query_colunas)) {
              echo "<th>$row[0]</th>";
            }
          ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
            $exibir_linhas = "SELECT * FROM ".$tabela;
            $query_linhas = mysqli_query($conect, $exibir_linhas);
            $i = 0;
            while ($row = mysqli_fetch_row($query_linhas)) {
              $array_lenght = count($row);
              echo "<tr>";
              foreach ($row as $key => $value) {
                echo "<td><input class='input_valores' type='text' value='$value'/></td>";
              }
              echo "</tr>";
            }
          ?>
        </tr>
      </tbody>
    </table>


  </body>
</html>
