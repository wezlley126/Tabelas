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
      <span>
        <form class="" action="" method="post">
          <input id="adicionar_coluna" class="home" type="submit" name="coluna_criar" value="adicionar coluna">
          <input id="apagar_coluna" class="home" type="submit" name="coluna_deletar" value="Apagar coluna">
        </form>
      </span>
      <?php
      //Parte responsável por deletar colunas;
      if (isset($_POST['coluna_deletar'])) {
          ?>
          <form class="" action="" method="post">
            <input class="home" type="text" name="coluna_dropada" value="" placeholder="Nome da coluna">
            <input id="apagar_coluna" class="home" type="submit" name="Deletar" value="Deletar">
          </form>
          <?php
        }
        if (isset($_POST['Deletar'])) {
          $coluna_dropada = Limpar($_POST['coluna_dropada']);
          $coluna_existe = "SHOW COLUMNS FROM ".$_SESSION['tabela']." LIKE '$coluna_dropada'";
          $query_coluna_existe = mysqli_query($conect, $coluna_existe);
          $row_coluna = mysqli_num_rows($query_coluna_existe);
          if($row_coluna === 1){
            if ($_POST['coluna_dropada'] == null) {
              echo "<h2 class='campo_vazio'>O campo não deve estar vázio!!</h2>";
            }else{
              if($coluna_dropada == 'id'){
                echo "<h2 class='campo_vazio'>ID não pode ser apagado</h2>";
              }else{
                $coluna_dropar = "ALTER TABLE ".$_SESSION['tabela']." DROP COLUMN ".$coluna_dropada;
                $query_coluna_drop = mysqli_query($conect, $coluna_dropar);
              }
            }
            }else{
              echo "<h2 class='campo_vazio'>Coluna inexistente!!</h2>";
            }
          }
        //Parte responsável por criar colunas;]
        if(isset($_POST['coluna_criar'])){
        ?>

        <form class="" action="" method="post">
          <input  class="home" type="text" name="coluna_criada" value="" placeholder="Nome da Coluna">
          <label class="texto_label" for="">Após qual campo a coluna sera inserida?</label>
          <select class="home" name="coluna_apos">
            <?php
              $colunas = "SHOW COLUMNS FROM ".$_SESSION['tabela'];
              $query_colunas = mysqli_query($conect, $colunas);
              echo "<option value='first'>Primeiro</option>";
              while($row = mysqli_fetch_row($query_colunas)) {
                echo "<option value='$row[0]'>$row[0]</option>";
              }
            ?>

          </select>
          <input id="adicionar_coluna" class="home" type="submit" name="criar_coluna" value="Adicionar">
        </form>
        <?php
        }
        if(isset($_POST['criar_coluna'])) {
          $nome_coluna = Limpar($_POST['coluna_criada']);
          $coluna_apos = Limpar($_POST['coluna_apos']);
          $coluna_existe = "SHOW COLUMNS FROM ".$_SESSION['tabela']." LIKE '$nome_coluna'";
          $query_coluna_existe = mysqli_query($conect, $coluna_existe);
          $row_coluna = mysqli_num_rows($query_coluna_existe);
          if($row_coluna === 0){
            if($nome_coluna == null) {
              echo "<h2 class='campo_vazio'>O campo não pode estar vázio!!</h2>";
            }else{
              if($coluna_apos == 'first'){
                $adicionar_coluna = "ALTER TABLE ".$_SESSION['tabela']." ADD COLUMN ".$nome_coluna." VARCHAR(255) ".$coluna_apos;
              }else{
                $adicionar_coluna = "ALTER TABLE ".$_SESSION['tabela']." ADD COLUMN ".$nome_coluna." VARCHAR(255) AFTER ".$coluna_apos;
              }
              $query_coluna_adicionada = mysqli_query($conect, $adicionar_coluna);
              }
            }else{
              echo "<h2 class='campo_vazio'>Coluna existente!!</h2>";
            }
          }
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
          <tbody>
            <tr>
              <?php
                //Exibe os valores dentro das colunas da tabela;
                $valor = 0;
                $exibir_linhas = "SELECT * FROM ".$tabela;
                $query_linhas = mysqli_query($conect, $exibir_linhas);
                while ($row = mysqli_fetch_row($query_linhas)) {
                  $array_lenght = count($row);
                  echo "<tr>";
                  foreach ($row as $key => $value) {
                      echo "<td class='id_value'>$value</td>";
                  }
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

          #adicionar_coluna:hover{
            background-color: green;
            color: white;
          }

          #adicionar_coluna:focus{
            background-color: green;
            color: white;
          }

          #apagar_coluna:hover{
            background-color: red;
            color: white;
          }

          #apagar_coluna:focus{
            background-color: red;
            color: white;
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

          .campo_vazio{
            margin-top: 2rem;
            margin-left: 1rem;
            color: red;
          }

          .texto_label{
            margin-left: 1rem;
          }
      </style>

  </body>
</html>
