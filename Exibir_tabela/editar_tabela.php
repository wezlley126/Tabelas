<?php
  session_start();
  include("../Conect_mysql/conect.php");
?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <div class="div_pai">
      <a class="home" href="/Tabelas">Home</a> <br>
      <form class="pesquisar" action="" method="post">
          <input class="home" type="submit" name="pesquisar_true" value="Pesquisar">
      </form>

      <?php

        //Verifica se a tabela existe;
        $tabela = Limpar($_GET['tabela']);
        $_SESSION['tabela'] = $tabela;
        $verifica_nome = "SHOW TABLES like '".$tabela."'";
        $query = mysqli_query($conect, $verifica_nome);
        $row = mysqli_num_rows($query);
        if ($row === 1) {

        }else{
          header('Location: index.php');
        }
      ?>
        <table>
          <thead>
            <tr>
              <?php
                //Verifica e exibe as colunas existentes;
                $_SESSION['colunas'] = array();
                $exibir_colunas = "SHOW COLUMNS FROM ".$tabela;
                $query_colunas = mysqli_query($conect, $exibir_colunas);
                $row_quantidade = mysqli_num_rows($query_colunas);
                echo "<tr><th colspan='$row_quantidade'>$tabela</th></tr>";
                while ($row = mysqli_fetch_row($query_colunas)) {
                    echo "<th>$row[0]</th>";
                    $_SESSION['colunas'] = $row;
                }
              ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                //Exibe os valores dentro das colunas da tabela;
                $valor = 0;
                if (isset($_POST['pesquisar_true'])) {
                  if(isset($procurar)){
                    $procurar = Limpar($_POST['pesquisa']);
                  }
                    $exibir_linhas = "SELECT * FROM ".$tabela;
                }else{
                  $exibir_linhas = "SELECT * FROM ".$tabela;
                }
                $query_linhas = mysqli_query($conect, $exibir_linhas);
                while ($row = mysqli_fetch_row($query_linhas)) {
                  $array_lenght = count($row);
                  echo "<tr>";

                  for ($i=0; $i < $array_lenght; $i++) {
                      echo "<td>$row[$i]</td>";
                  }
                  /*
                  foreach ($row as $key => $value) {
                      echo "<td class='id_value'>$value</td>";
                  }
                  */
                  echo "</tr>";
                }
              ?>
            </tr>
          </tbody>
        </table>

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
          }

          th{
            border: 2px outset black;
            padding: 0.5rem;
            background-color: #D3D3D3;
          }

          table tbody tr td{
            border: 2px outset black;
            padding: 0.5rem;
            height: 50px;
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
            padding: 0.5rem;
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

          .pesquisar{
            display: flex;
            margin-left: 1rem;
            gap: 1rem;
            flex-wrap: wrap;
          }

          .pesquisar input{
            margin: 0px;
          }


          .icons{
            max-width: 40px;
          }

          .select_pesquisa{
            padding: 0.5rem 1rem;
            text-align: center;
          }

          .select_pesquisa:hover{
            background-color: black;
            color: white;
            transition: 0.3s;
          }

          .select_pesquisa:focus{
            background-color: black;
            color: white;
            transition: 0.3s;
          }

          .pesquisar_form{
            margin-left: 1rem;
            border: 2px solid black;
            background-color: red;
          }

          #tabela_dividir{
            background-color: black;
            position: absolute;
            height: 100vh;
          }
      </style>

  </body>
</html>
