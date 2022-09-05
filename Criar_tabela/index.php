<?php
  session_start();
  include('../Conect_mysql/conect.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="Colunas_tabela.php" method="post">
        <input type="text" name="nome_tabela" placeholder="Nome da tabela" required>
        <input type="number" name="numero_colunas" maxlength="2" min="1" oninput="this.value = Math.abs(this.value)" placeholder="Números de colunas" required>
        <input type="submit" valur="Criar">
    </form>

    <table>
      <thead>
        <tr>
          <th>Nomes de tabelas já utilizados:</th>
        </tr>
      </thead>

      <tbody>
          <?php

            $show_tabelas = "SHOW TABLES";
            $query = mysqli_query($conect, $show_tabelas);
            if ($query) {

              while ($row = mysqli_fetch_row($query)) {
                $row[0] = ucfirst($row[0]);
                @$_SESSION['nome_tabela'] = ucfirst($_SESSION['nome_tabela']);
                $exibir = (isset($_SESSION['nome_tabela']) && $row[0] == $_SESSION['nome_tabela']) ? "<tr><td style='color: blue;'>$row[0]</td></tr>" : "<tr><td>$row[0]</td></tr>" ;
                echo "$exibir";
              }
            }else{
              echo "Erro ao tentar exibir as tabelas existentes.";
            }
            echo "<br/>".@$_SESSION['nome_tabela'];
            unset($_SESSION['nome_tabela']);

          ?>
      </tbody>

    </table>

</body>
</html>
