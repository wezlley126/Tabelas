<?php
  if (isset($_SESSION['user'])) {
    $conect = mysqli_connect('localhost:3306', 'root', '', 'sistema_tabelas') or die("Oh shite here we go again");
  }else{
    header('Location: /Tabelas/users');
  }

  function Limpar($value)
    {
      global $conect;
      $value = mysqli_escape_string($conect, $value);
      $value = htmlspecialchars($value);
      return $value;
    }
?>
