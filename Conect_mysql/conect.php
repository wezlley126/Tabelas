<?php
  if (isset($_SESSION['user'])) {
    $conect = mysqli_connect('localhost:3306', 'root', '', 'SF_camisas') or die("Oh shite here we go again");
  }else{
    header('Location: ../users');
  }

  function Limpar($value)
    {
      global $conect;
      $value = mysqli_escape_string($conect, $value);
      $value = htmlspecialchars($value);
      return $value;
    }
?>
