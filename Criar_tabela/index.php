<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="Colunas_tabela.php" method="post">
        <input type="text" name="nome_tabela" placeholder="Nome da tabela" required>
        <input type="number" name="numero_colunas" maxlength="2" min="1" oninput="this.value = Math.abs(this.value)" placeholder="Números de colunas" required>
        <input type="submit" valur="Criar">
    </form>

</body>
</html>