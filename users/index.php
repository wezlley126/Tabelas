<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="div_pai">
      <form class="" action="login.php" method="post">
        <h1>Login</h1>
        <input type="email" name="email" value="" placeholder="Email" required>
        <input type="password" name="senha" value="" placeholder="Senha" required>
        <input type="submit" name="enviar" value="Entrar">
      </form>

              <div style="text-align: center; font-size: 1.2rem;" id="weslley"><a href="https://github.com/wezlley126">© weslley</a></div>

    <style media="screen">
      *{
        margin: 0px;
        padding: 0px;
        max-width: 100%;
      }

      body, html{
          height: 100%;
      }

      form{
        display: grid;
        gap: 1rem;
        border: 2px solid black;
        padding: 3rem 2rem;
        text-align: center;
      }

      input{
        padding: 0.5rem 1rem;
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

      .div_pai{
        display: grid;
        height: 100%;
        place-content: center;
      }
    </style>

  </body>
</html>
