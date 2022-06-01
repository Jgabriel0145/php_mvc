<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria de produto</title>
    <?php include "View/css/FormCategoria_css.php";?>
</head>
<body>
    
<form action="/categoriaproduto/save" method="post">
        <fieldset>
            <h2>Categoria de produto</h2>

            <input type="hidden" value="<?= $model->id ?>" name="id" />

            <label for="categoria"><strong>Categoria:</strong></label>
            <input name="categoria" id="categoria" type="text" placeholder="Digite a nova categoria..." required value="<?= $model->categoria ?>" />


            <button type="submit" id="enviar">Enviar</button>

        </fieldset>
    </form>    
    <br><br>
    <button onclick="document.location='/'" id="voltar">Voltar</button>



</body>
</html>