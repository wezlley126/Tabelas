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
    <div class="div_pai">
      <a class="home" href="/Tabelas">Home</a> <br>

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
        <input class="enviar" type="submit" name="enviar" value="Alterar">
      </form>

        <?php
          //Exibir os ids na tag <option>
          $exibir_ids = "SELECT id FROM $tabela";
          $query_ids = mysqli_query($conect, $exibir_ids);
          //Exibir as colunas na tag <option>
          $exibir_colunas = "SHOW COLUMNS FROM $tabela";
          $query_colunas = mysqli_query($conect, $exibir_colunas);
        ?>
      </div>
      <style media="screen">
          *{
            margin: 0px;
            padding: 0px;
            max-width: 100%;
            font-family: arial, monospace, sans-serif;
          }

          table{
            margin-left: 0px 1rem;
          }

          table{
            padding: 1rem;
            text-align: center;
          }

          input{
            text-align: center;
            padding: 0.5rem;
          }

          input:hover{
            background-color: black;
            color: white;
            transition: 0.3s;
          }

          input:focus{
            background-color: black;
            color: white;
            transition: 0.3s;
          }

          th{
            border: 2px outset black;
            padding: 0.5rem;
            background-color: #D3D3D3;
          }

          table tbody tr td{
            border: 2px outset black;
          }

          td:hover{
            background-color: black;
            color: white;
            transition: 0.3s;
          }

          table tbody tr .adicionar_linha{
            border: 2px solid red;
          }

          table .input_valores{
              padding: 0.5rem;
          }

          table tbody tr .id_value{
          }


          .div_pai{
            display: grid;
            gap: 0px;
          }

          .home{
            text-decoration: none;
            color: black;
            border: 2px solid black;
            padding: 0.5rem 1rem;
            text-align: center;
            justify-self: start;
            margin-left: 1rem;
            margin-top: 1rem;
          }

          .home:hover{
            background-color: black;
            color: white;
            transition: 0.3s;
          }

          .enviar{
            padding: 0.5rem 1.5rem;
            margin-left: 1rem;
            justify-self: center;
          }
          .enviar:hover{
            background-color: black;
            color: white;
            transition: 0.3s;
          }

          .enviar:focus{
            background-color: black;
            color: white;
            transition: 0.3s;
          }
      </style>

  </body>
</html>
