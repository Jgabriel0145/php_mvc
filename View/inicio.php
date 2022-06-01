<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php 
    include "View/css/inicio_css.php";
    ?>
</head>

<body>

<div class="botoes">
    <div class="pessoa">
        <h1><strong>Pessoa</strong></h1>
        <button onclick="document.location='/pessoa/form'">Cadastrar</button>
        <button onclick="document.location='/pessoa'">Lista</button>
    </div>


    <div class="produto">
        <h1><strong>Produto</strong></h1>
        <button onclick="document.location='/produto/form'">Cadastrar</button>
        <button onclick="document.location='/produto'">Lista</button>
    </div>

    <div class="categoria">
        <h1><strong>Categoria de Produto</strong></h1>
        <button onclick="document.location='/categoriaproduto/form'">Cadastrar</button>
        <button onclick="document.location='/categoriaproduto'">Lista</button>
    </div>


    <div class="funcionario">
        <h1><strong>Funcionário</strong></h1>
        <button onclick="document.location='/funcionario/form'">Cadastrar</button>
        <button onclick="document.location='/funcionario'">Lista</button>
    </div>
</div>
</body>
</html>