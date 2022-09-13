<?php
  $conect = mysqli_connect('localhost:3306', 'root', '', 'sistema_tabelas') or die("Oh shite here we go again");

  function Limpar($value)
    {
      global $conect;
      $value = mysqli_escape_string($conect, $value);
      $value = htmlspecialchars($value);
      return $value;
    }
?>
