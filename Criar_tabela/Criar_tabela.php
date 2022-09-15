<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../Css/criar_tabela.css">
  </head>
  <body>
    <?php
    session_start();
    include('../Conect_mysql/conect.php');
    $nome_tabela = $_SESSION['nome_tabela'];
    $numero_colunas = $_SESSION['numero_colunas'];
    echo "$nome_tabela";
    echo "$numero_colunas";

    $comando = "CREATE TABLE ".$_SESSION['nome_tabela']."( id int not null auto_increment primary key )";
    $query = mysqli_query($conect, $comando);
    for ($i=0; $i < $_SESSION['numero_colunas']; $i++) {
      $comando_for = "ALTER TABLE ".$_SESSION['nome_tabela']." ADD COLUMN ".$_POST["campo$i"]." varchar(30)";
      $query2 = mysqli_query($conect, $comando_for);
    }

    if ($query) {
      echo "<br/> Deu certo";
      $_SESSION['tabela_criada'] = 1;
      header("Location: /Tabelas/Criar_tabela");
    }

    if ($query2) {
      echo "<br/> Query 2 funcionando";
    }

    ?>

  </body>
</html>
