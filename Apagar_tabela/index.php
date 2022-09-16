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
      <a class="home" href="../">home</a><br/>


      <form class="" action="" method="post">
        <input class="enviar" type="text" name="nome_tabela" value="" placeholder="Nome da tabela">
        <input class="enviar" type="text" name="nome_confirma" value="" placeholder="Confirme o nome">
        <input id="enviar" class="enviar" type="submit" name="" value="Excluir">
      </form>

      <?php
        @$nome_tabela = Limpar($_POST['nome_tabela']);
        @$nome_confirma = Limpar($_POST['nome_confirma']);

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
      <div class="tabelas_existentes">
      <?php
      $show_tabelas = "SHOW TABLES";
      $query_show_tabelas = mysqli_query($conect, $show_tabelas);
      while($row = mysqli_fetch_row($query_show_tabelas)) {
        echo "<span>$row[0]</span>";
      }
      ?>
    </div>
    <style media="screen">
      *{
        font-family: monospace, sans-serif;
      }

    .tabelas_existentes{
      padding: 0px 1rem;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(100px, auto));
      gap: 1rem;
      justify-items: center;
      text-align: center;
      border-left: 2px solid black;
      border-right: 2px solid black;
      max-width: 90%;
    }

    .div_pai{
      border: 2px solid black;
      display: grid;
      justify-items: center;
      gap: 0px;
      padding-bottom: 3rem;
      margin-top: 10%;
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

    #enviar:hover{
      background-color: red;
    }

    </style>

  </body>
</html>
