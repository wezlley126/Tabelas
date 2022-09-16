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
    <a class="home" href="../">Home</a>
    <div class="div_pai">

      <?php
        $show_tables = "SHOW TABLES";
        $query = mysqli_query($conect, $show_tables);
        while ($row = mysqli_fetch_row($query)) {
          echo "<a class='tabelas' href='editar_colunas.php?tabela=$row[0]'>$row[0]</a>";
        }

      ?>
    </div>

    <style media="screen">
        *{
          margin: 0px;
          padding: 0px;
          max-width: 100%;
        }

        body{
          display: grid;
        }

        a{
          text-decoration: none;
          color: black;
        }
        .div_pai{
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(100px, auto));
          justify-items: center;
          border-left: 2px solid black;
          border-right: 2px solid black;
          margin: 5% 1rem;
          font-size: 1.5rem;
        }


        .tabelas{
          width: 100%;
          padding: 1rem 0px;
          text-align: center;
          border-right: 1px solid black;
        }

        .tabelas:hover{
          background-color: black;
          color: white;
          transition: 0.2s;
        }

        .home{
          border: 2px solid black;
          padding: 0.5rem 1rem;
          margin: 1rem;
          justify-self: start;
          text-align: center;
        }

        .home:hover{
          background-color: black;
          color: white;
          transition: 0.3s;
        }

    </style>

  </body>
</html>
