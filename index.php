<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="Css/astyle.css">
  </head>
  <body>
    <span class="titulos">
      <h1>Sistema organizacional de tabelas</h1>
      <h2>Selecione a opção que deseja realizar.</h2>
    </span>

    <nav aria-label="Primária" class = "opcoes">
        <span class="opcoes_icons">
          <img src="imgs/criar.png" alt="">
          <a href="/Tabelas/Criar_tabela">Criar tabela</a>
        </span>
        <span class="opcoes_icons">
          <img src="imgs/exibir.png" alt="">
          <a href="/Tabelas/Exibir_tabela">Exibir tabela</a>
        </span>
        <span class="opcoes_icons">
          <img src="imgs/alterar.png" alt="">
          <a href="/Tabelas/Novo_alterar_tabela">Alterar tabela</a>
        </span>
        <span class="opcoes_icons">
          <img src="imgs/editar_colunas.png" alt="">
          <a href="/Tabelas/Editar_colunas">Editar colunas</a>
        </span>
        <span class="opcoes_icons">
          <img src="imgs/excluir.png" alt="">
          <a href="/Tabelas/Apagar_tabela">Apagar tabela</a>
        </span>
    </nav>

        <div id="weslley"><a href="https://github.com/wezlley126">© weslley</a></div>

    <style media="screen">
            *{
              margin: 0px;
              padding: 0px;
              font-family: monospace, sans-serif;
            }

            a{
              font-size: 1.2rem;
            }

          .opcoes_icons a:hover{
            background-color: black;
            animation-name: itens;
            animation-duration: 0.3s;
          }

          .button{
            display: grid;
          }

          .home{
            text-decoration: none;
            color: red;
            border: 2px solid red;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
            margin-left: 1rem;
            justify-self: start;
          }
          .home:hover{
            background-color: black;
            transition: 0.3s;
          }

          #weslley{
            text-align: center;
            font-size: 1.2rem;
          }

          @keyframes itens {
            0%{
              background-color: white
            }
            100%{
              background-color: black;
            }
          }
    </style>

  </body>
</html>
