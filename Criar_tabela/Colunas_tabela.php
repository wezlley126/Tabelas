<?php
  session_start();
  include("../Conect_mysql/conect.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/Colunas_tabela.css">
</head>
<body>

  <form method="post" action="Criar_tabela.php">
          <?php
              $_SESSION['nome_tabela'] = mysqli_escape_string($conect, $_POST['nome_tabela']);
              $_SESSION['numero_colunas'] = mysqli_escape_string($conect, $_POST['numero_colunas']);

              echo $_SESSION['nome_tabela']." and ".$_SESSION['numero_colunas']." <br/>";

              for ($i=0; $i < $_SESSION['numero_colunas']; $i++) {
                echo "<input name='campo$i' type='text' placeholder='Nome do campo' required><br/>";
              }
          ?>
    <input type="submit" name="Criar_campos" value="Criar campos">
  </form>

</body>
</html>
