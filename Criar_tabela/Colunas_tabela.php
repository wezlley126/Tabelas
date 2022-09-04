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

              $tabela_existe = "SHOW TABLES LIKE '".$_SESSION['nome_tabela']."'";
              $query_tabela_existe = mysqli_query($conect, $tabela_existe);
              if ($query_tabela_existe) {
                $row = mysqli_num_rows($query_tabela_existe);
                if (!$row == 0) {
                  echo "O nome de tabela já está sendo usado";
                }else{
                  echo $_SESSION['nome_tabela']." Possui ".$_SESSION['numero_colunas']." colunas. <br/>";

                  for ($i=0; $i < $_SESSION['numero_colunas']; $i++) {
                    echo "<input name='campo$i' type='text' placeholder='Nome do campo' required><br/>";
                  }
                  echo "<input type='submit' name='Criar_campos' value='Criar campos'>";
                  
                }
              }else {
                echo "<br/>ERRO AO VERIFICAR SE TABELA EXISTE<br/>";
              }



          ?>

  </form>

</body>
</html>
