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
    <a href="/Tabelas">Home</a> <br>

    <?php
      //Verifica se a tabela existe;
      $tabela = mysqli_escape_string($conect, $_GET['tabela']);
      $tabela = Limpar($tabela);
      $_SESSION['tabela'] = $tabela;
      $verifica_nome = "SHOW TABLES like '".$tabela."'";
      $query = mysqli_query($conect, $verifica_nome);
      $row = mysqli_num_rows($query);
      if ($row === 1) {
      }else{
        header('Location: index.php');
      }
    ?>
    <form class="" action="teste.php" method="post">
      <table>
        <span class="thead_div">
        <thead>
          <tr>
            <?php
              //Verifica e exibe as colunas existentes;
              $exibir_colunas = "SHOW COLUMNS FROM ".$tabela;
              $query_colunas = mysqli_query($conect, $exibir_colunas);
              $row_quantidade = mysqli_num_rows($query_colunas);
              echo "<tr><th colspan='$row_quantidade'>$tabela</th></tr>";
              while ($row = mysqli_fetch_row($query_colunas)) {
                  echo "<th>$row[0]</th>";
              }
            ?>
          </tr>
        </thead>
      </span>
        <tbody>
          <tr>
            <?php


              $quantidade_linhas = "SELECT * FROM $tabela";
              $quantidade_colunas = "SHOW COLUMNS FROM $tabela";
              $query_linhas = mysqli_query($conect, $quantidade_linhas);
              $query_colunas = mysqli_query($conect, $quantidade_colunas);
              //Variavel com a quantidade de linhas da tabela;
              $row_linhas = mysqli_num_rows($query_linhas);
              $row_colunas = mysqli_num_rows($query_colunas);

              //Sessions com número de linhas e colunas;
              $_SESSION['linhas'] = $row_linhas;
              $_SESSION['colunas'] = $row_colunas;
              $array_tabela = array();
              ?><tr><?php
              for ($i=0; $i < $row_colunas; $i++) {
                if ($i === 0) {
                  echo "<td class='adicionar_linha'>Adicionar</td>";
                }else{
                  echo "<td class='adicionar_linha'><input name='adicionar$i' type='text'/></td>";
                }
              }
              ?></tr><?php

              for ($linhas=0; $linhas < $row_linhas; $linhas++) {
                $array_tabela[$linhas] = mysqli_fetch_row($query_linhas);
                for ($colunas=0; $colunas < $row_colunas; $colunas++) {
                  echo "<td><input name='linha$linhas\_coluna$colunas' type='text' value='".$array_tabela[$linhas][$colunas]."'/></td>";
                  if ($colunas == $row_colunas-1) {
                    echo "</tr>";
                  }
                }
              }
            ?>
          </tr>
        </tbody>
      </table>
      <input type="submit" name="enviar" value="Alterar">
    </form>

      <?php
        //Exibir os ids na tag <option>
        $exibir_ids = "SELECT id FROM $tabela";
        $query_ids = mysqli_query($conect, $exibir_ids);
        //Exibir as colunas na tag <option>
        $exibir_colunas = "SHOW COLUMNS FROM $tabela";
        $query_colunas = mysqli_query($conect, $exibir_colunas);
      ?>

  </body>
</html>
