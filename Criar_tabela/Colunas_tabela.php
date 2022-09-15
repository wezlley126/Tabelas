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
<div class="div_pai">
    <form method="post" action="Criar_tabela.php">
            <?php
                $_SESSION['nome_tabela'] = Limpar($_POST['nome_tabela']);
                $_SESSION['numero_colunas'] = Limpar($_POST['numero_colunas']);

                $tabela_existe = "SHOW TABLES LIKE '".$_SESSION['nome_tabela']."'";
                $query_tabela_existe = mysqli_query($conect, $tabela_existe);
                if ($query_tabela_existe) {
                  $row = mysqli_num_rows($query_tabela_existe);
                  if (!$row == 0) {
                    echo "O nome de tabela já está sendo usado";
                  }else{
                    echo "<span class='titulo'>".$_SESSION['nome_tabela']." Possui ".$_SESSION['numero_colunas']." colunas.</span>";
                    ?>
                      <span class="aviso">Atenção: Não pode utilizar Espaços nos nomes dos campos da tabela ou colocar nome repetidos!!!</span>
                    <?php

                    for ($i=0; $i < $_SESSION['numero_colunas']; $i++) {
                      echo "<input name='campo$i' type='text' placeholder='Nome do campo' required>";
                    }
                    echo "<input type='submit' name='Criar_campos' value='Criar campos'>";

                  }
                }else {
                  echo "<br/>ERRO AO VERIFICAR SE TABELA EXISTE<br/>";
                }



            ?>

    </form>
  </div>

  <style media="screen">
    *{
      padding: 0px;
      margin: 0px;
      max-width: 100%;
    }

    .div_pai{
      display: grid;
      justify-items: center;
      text-align: center;
      margin-top: 5%;
    }

    .aviso{
      font-size: 1.2rem;
      color: red;
      margin: 0px 1rem;
    }

    .titulo{
      font-size: 1.5rem;
    }

    form{
      display: grid;
      justify-items: center;
      gap: 0.5rem;
    }

    input{
      border: 2px solid black;
      padding: 1rem;
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

  </style>

</body>
</html>
