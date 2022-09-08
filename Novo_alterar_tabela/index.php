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

    <?php
      $show_tables = "SHOW TABLES";
      $query = mysqli_query($conect, $show_tables);
      while ($row = mysqli_fetch_row($query)) {
        echo "<a href='editar_tabela.php?tabela=$row[0]'>$row[0]</a><br/>";
      }

    ?>

  </body>
</html>
