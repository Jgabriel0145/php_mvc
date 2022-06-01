<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produto</title>
    <?php include "View/css/FormProduto_css.php";?>
</head>
<body>
    
<form action="/produto/save" method="post">
        <fieldset>
            <h2>Cadastro de Produto</h2>

            <input type="hidden" value="<?= $model->id ?>" name="id" />

            <label for="nome"><strong>Nome:</strong></label>
            <input name="nome" id="nome" type="text" placeholder="Digite o nome do produto..." required value="<?= $model->nome ?>" />

            <label for="descricao"><strong>Descrição:</strong></label>
            <input name="descricao" id="descricao" type="text" placeholder="Digite a descrição do produto..." required value="<?= $model->descricao ?>" />

            <label for="preco"><strong>Preço:</strong></label>
            <input name="preco" id="preco" type="number" placeholder="Digite o preço do produto..." required value="<?= $model->preco ?>" /><br>

            <label for="id_categoria_produto"><strong>Categoria do produto:</strong></label>
                <select id="id_categoria_produto" name="id_categoria_produto" required>
                    <option value="" checked>Selecionar</option>
                    <option value="<?= $model->id_categoria_produto = 1 ?>">Limpeza</option>
                    <option value="<?= $model->id_categoria_produto = 2 ?>">Hortifruti</option>
                    <option value="<?= $model->id_categoria_produto = 3 ?>">Açougue</option>
                    <option value="<?= $model->id_categoria_produto = 4 ?>">Padaria</option>
                    <option value="<?= $model->id_categoria_produto = 5 ?>">Frios</option>
                    <option value="<?= $model->id_categoria_produto = 6 ?>">Bebidas</option>
                    <option value="<?= $model->id_categoria_produto = 7 ?>">Peixes</option>
                    <option value="<?= $model->id_categoria_produto = 8 ?>">Higiene</option>
                    <option value="<?= $model->id_categoria_produto = 9 ?>">Enlatados</option>
                    <option value="<?= $model->id_categoria_produto = 10 ?>">Mercearia</option>
                </select><br><br>
                

            <button type="submit" id="enviar">Enviar</button>

            

        </fieldset>
    </form>    
    <br><br>
    <button onclick="document.location='/'" id="voltar">Voltar</button>



</body>
</html>