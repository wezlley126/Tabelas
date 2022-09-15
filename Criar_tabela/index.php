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
    <link rel="stylesheet" href="/Css/criar_tabela.css">
    <title>Document</title>
</head>
<body>
  <div class="div_pai">

    <div class="body_superior">
      <form action="Colunas_tabela.php" method="post">
          <h1>Criar Tabela</h1>
          <input class="ponta_ponta" type="text" name="nome_tabela" placeholder="Nome da tabela" required>
          <input class="ponta_ponta" type="number" name="numero_colunas" maxlength="2" min="1" oninput="this.value = Math.abs(this.value)" placeholder="Números de colunas" required>
          <input class="enviar_button" type="submit" valur="Criar">
          <a class="home" href="../">Home</a>
      </form>
    </div>

          <h2>Nomes de tabelas já utilizados:</h2>
          <div class="tabelas_existentes">
          <?php

            $show_tabelas = "SHOW TABLES";
            $query = mysqli_query($conect, $show_tabelas);
            if ($query) {

              while ($row = mysqli_fetch_row($query)) {
                $row[0] = ucfirst($row[0]);
                @$_SESSION['nome_tabela'] = ucfirst($_SESSION['nome_tabela']);
                $exibir = (isset($_SESSION['nome_tabela']) && $row[0] == $_SESSION['nome_tabela']) ? "<span style='color: blue;'>$row[0]</span>" : "<span>$row[0]</span>" ;
                echo "$exibir";
              }
            }else{
              echo "Erro ao tentar exibir as tabelas existentes.";
            }
            unset($_SESSION['nome_tabela']);

          ?>
        </div>
        </div>
        <style media="screen">
        *{
          margin: 0px;
          padding: 0px;
          max-width: 100%;
          font-family: monospace, sans-serif;
        }

        body{
          display: grid;
          justify-items: center;
        }

        h1{
          grid-column: 1 / -1;
        }

        .div_pai{
          margin: 5% auto;
          display: grid;
          padding: 2rem 3rem;
          gap: 3rem;
          justify-items:center;
          border: 2px solid black;
        }

        .body_superior{
          display: grid;
          grid-template-columns: auto 1fr;
          gap: 1rem;
          text-align: center;
        }

        .body_inferior{
          display: grid;
          justify-items: center;
          text-align: center;
          gap: 1rem;
        }

        .tabelas_existentes{
          padding: 0px 1rem;
          display: grid;
          grid-template-columns: repeat(5, 1fr);
          gap: 1rem;
          justify-items: center;
          text-align: center;
          border-left: 2px solid black;
          border-right: 2px solid black;
        }

        .home{
          border: 2px outset grey;
          padding: 0.4rem 1rem;
          align-self: start;
          text-decoration: none;
          color: black;
        }

        .home:hover{
          background-color: black;
          color: white;
          animation-name: botoes;
          animation-duration: 0.3s;
        }

        .home:focus{
          background-color: black;
          color: white;
          animation-name: botoes;
          animation-duration: 0.3s;
        }

        .ponta_ponta{
          grid-column: 1 / -1;
        }

        .enviar_button{
          cursor: pointer;
          background-color: #C3C3C3;
        }

        form{
          display: grid;
          grid-template-columns: 1fr 1fr;
          align-items: center;
          gap: 0.5rem;
          grid-column: 1 / -1;
        }

        input{
          border: 2px outset grey;
          padding: 0.5rem;
        }

        input:hover{
          background-color: black;
          color: white;
          animation-name: botoes;
          animation-duration: 0.3s;
        }

        input:focus{
          background-color: black;
          color: white;
          animation-name: botoes;
          animation-duration: 0.3s;
        }

        @keyframes botoes {
          0%{
            background-color: white;
            color: black;
          }
          100%{
            background-color: black;
            color: white;
          }
        }

        </style>
</body>
</html>
